<?php

namespace App\Http\Controllers;

use App\Mail\invoice_mail;
use App\Models\order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\order_item;
use Illuminate\Support\Facades\Mail;

class cashController extends Controller
{
    public function cash_payment (Request $request)
    {

        
        if(Auth::check())
        {
        	if(Session::has('coupon'.auth()->id()))

    	{
          $total_amount = Session('coupon'.auth()->id())['total_amount'];
          
    	}
    	else
    	{
    		$total_amount = \Cart::session(auth()->id())->getTotal();

    	}

        

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
            'payment_type' => 'Cash On delivery',
            'payment_method' => 'Cash On delivery',
            'transaction_id' => mt_rand(),
            'currency' => 'usd',
            'amount' => $total_amount,
            'order_number' => mt_rand(),
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

            
            $carts = \Cart::session(auth()->id())->getContent();

 foreach($carts as $cart)

 {

    order_item::create([
     
     'order_id' => $order_id,
     'product_id' => $cart->id,
     'color' => $cart->attributes->color,
     'size' => $cart->attributes->size,
     'qty' => $cart->quantity,
     'price' => $cart->price,
     'created_at' => Carbon::now()


 	]);

     if (Session::has('coupon'.auth()->id()))

          {
              Session::forget('coupon'.auth()->id());
              \Cart::session(auth()->id())->remove($cart->id);
          }else{
            \Cart::session(auth()->id())->remove($cart->id);

          }
 }

// $product_id = \Cart::session(auth()->id())->getContent();

          
         
         
         $notification = array('message' => 'Your Order is sent successfully',
         
            'alert-type' => 'success'  );
         
         return Redirect()->to('/')->with($notification);
        
    }
    }
}
