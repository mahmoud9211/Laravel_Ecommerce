<?php

namespace App\Http\Controllers;

use App\Models\country;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class checkoutController extends Controller
{
    public function checkout()
    {
        if(Auth::check())
        {
             if(Cart::total() > 0)
             {

                $content = Cart::content();
                $cart_total = Cart::total();
                $country = country::get();

                return view ('mainpages.checkout.checkout',compact('content','cart_total','country'));

             }else{

                $msg = ([
                    'message' => 'Your Cart is empty  , Please Continue Shopping',
                    'alert-type' => 'info'
                ]);
               
                 return redirect()->to('/')->with($msg);

             }
             
         


        }else{

            $msg = ([
                'message' => 'Please Sign in first',
                'alert-type' => 'error'
            ]);
           
             return redirect()->to('login')->with($msg);


        }
    }

    public function checkout_proceed (Request $request)
    {

    //dd($request->all());

    $data = array();

    $data['shipping_name']  = $request->shipping_name;
    $data['shipping_email'] = $request->shipping_email;
    $data['shipping_phone'] = $request->shipping_phone;
    $data['post_code']      = $request->post_code;
    $data['notes']  = $request->notes;
    $data['country']  = $request->country_name;
    $data['city']  = $request->city;
    $data['address']  = $request->address;
    $subtotal = Cart::total();

    if ($request->payment_method == 'stripe')

    {
      return view ('mainpages.payment_methods.stripe',compact('data','subtotal'));
    }
    else if ($request->payment_method == 'paypal')

    {
       //return view ('mainpages.payment_methods.paypal',compact('data','subtotal'));
       
       $url = "https://eu-test.oppwa.com/v1/checkouts";
	$data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                "&amount=" . $subtotal.
                "&currency=EUR" .
                "&paymentType=DB";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
    $res = json_decode($responseData, true);

    $view = view('mainpages.payment_methods.paypal')->with(['responseData' => $res ])
        ->renderSections();

    return response()->json([
        'status' => true,
        'content' => $view['main']
    ]);



    }

    }

   
}
