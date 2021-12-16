<?php

namespace App\Http\Controllers;

use App\Models\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class checkoutController extends Controller
{
    public function checkout()
    {
        if(Auth::check())
        {
             if(\Cart::session(auth()->id())->getTotal() > 0)
             {

                $content = \Cart::session(auth()->id())->getContent();
                $cart_total = \Cart::session(auth()->id())->getTotal();
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
    $subtotal = \Cart::session(auth()->id())->getTotal();

    if ($request->payment_method == 'stripe')

    {
      return view ('mainpages.payment_methods.stripe',compact('data','subtotal'));
    }
    else if ($request->payment_method == 'paypal')

    {
       return view ('mainpages.payment_methods.paypal',compact('data','subtotal'));
       
   



    }

    }

   
}
