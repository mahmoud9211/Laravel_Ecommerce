<?php

namespace App\Http\Controllers;

use App\Mail\invoice_mail;
use App\Models\order;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\order_item;
use Illuminate\Support\Facades\Mail;


class stripeController extends Controller
{
    public function stripe_payment (Request $request)
    {

        if(Auth::check())
        {
        	if(Session::has('coupon'))

    	{
          $total_amount = Session('coupon')['total_amount'];
          
    	}
    	else
    	{
    		$total_amount = Cart::total();

    	}

        $token = $_POST['stripeToken'];

    	\Stripe\Stripe::setApiKey('sk_test_51JcSoMAiUUkaE9KMb29YCt0C80clRsLLcb9l47Z5HZtKjFmHngDZsh1vc5mmXUSkJxnCceRoLso1mgfffOOVHohC00Hc3mbwDk');

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'Mahmoud Website',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
          ]);

          $order_id = order::insertGetId([

            'user_id' => Auth::id(),
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' => 'stripe',
            'payment_method' => 'stripe',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_no' =>'EOS'.mt_rand(1000000000,9999999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' =>  Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 0,
            'tracking_status' => mt_rand(),
            'created_at' => Carbon::now()
           
            ]);



        //mail


$invoice = order::find($order_id);
        $data = ([
  'name' => $request->name,
  'email' => $request->email,
  'phone' => $request->phone,
  'invoice_no' => $invoice->invoice_no,
  'amount' => $total_amount,
  'payment_method' => $invoice->payment_method,
  'tracking_status' => $invoice->tracking_status

]);

        
        Mail::to($request->email)->send(new invoice_mail($data));

            
            $carts = Cart::content();

 foreach($carts as $cart)

 {

    order_item::create([
     
     'order_id' => $order_id,
     'product_id' => $cart->id,
     'color' => $cart->options->color,
     'size' => $cart->options->size,
     'qty' => $cart->qty,
     'price' => $cart->price,
     'created_at' => Carbon::now()


 	]);
 }

          if (Session::has('coupon'))

          {
              Session::forget('coupon');
              Cart::destroy();
          }else{
            Cart::destroy();

          }
         
         
         $notification = array('message' => 'Payment completed Successfully',
         
            'alert-type' => 'success'  );
         
         return Redirect()->route('dashboard')->with($notification);
        
    }
}




}
