<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class cartController extends Controller
{
    

    public function check()
    {
        $data = \Cart::getContent();
        return response()->json($data);
    }




    public function insertTocart(Request $request,product $product)
    {

        $product = product::find($product->id);


        if (!Auth::check())
        
        {

            if (Session::has('coupon'))

            {
              Session::forget('coupon');
            }

            if($product->discount_price == null)
            {
    
                \Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' =>$product->selling_price,
                    'quantity' => $request->qty,
                    'attributes' => array('image' => $product->image_one,
                    'size' => $request->size,
                    'color' => $request->color),
                    'associatedModel' => $product
                ));
    
                   
    
                      return response()->json([
                          'success' => 'Added Successfully to Cart'
                      ]);
    
            }else{
    
                \Cart::add(array(
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' =>$product->discount_price,
                    'quantity' => $request->qty,
                    'attributes' => array('image' => $product->image_one,
                    'size' => $request->size,
                    'color' => $request->color),
                    'associatedModel' => $product
                ));

      


                return response()->json([
                    'success' => 'Added Successfully to Cart'
                ]);



        } 
    } else {

        if (Session::has('coupon'.auth()->id()))

        {
          Session::forget('coupon'.auth()->id());
        }
            
        if($product->discount_price == null)
        {

            \Cart::session(auth()->id())->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' =>$product->selling_price,
                'quantity' => $request->qty,
                'attributes' => array('image' => $product->image_one,
                'size' => $request->size,
                'color' => $request->color),
                'associatedModel' => $product
            ));

               

                  return response()->json([
                      'success' => 'Added Successfully to Cart'
                  ]);

        }else{

          

            \Cart::session(auth()->id())->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' =>$product->discount_price,
                'quantity' => $request->qty,
                'attributes' => array('image' => $product->image_one,
                'size' => $request->size,
                'color' => $request->color),
                'associatedModel' => $product
            ));
       



            return response()->json([
                'success' => 'Added Successfully to Cart'
            ]);



    } }

       


    }



    public function minicart ()
    {

        if(!Auth::check())

        {

            $content = \Cart::getContent();
            $sub_total = \Cart::getSubTotal();
            $total = \Cart::getTotal(); 
            $count = \Cart::getTotalQuantity();
    
            return response()->json([
                'content' => $content,
                'stotal' => $sub_total,
                'total' => $total,
                'count' => $count
            ]);
        }else
        {


            $content = \Cart::session(auth()->id())->getContent();
            $sub_total = \Cart::session(auth()->id())->getSubTotal();
            $total = \Cart::session(auth()->id())->getTotal(); 
            $count = \Cart::session(auth()->id())->getTotalQuantity();
    
            return response()->json([
                'content' => $content,
                'stotal' => $sub_total,
                'total' => $total,
                'count' => $count
            ]);
        }

       
    }

    public function remove_cart($id)
    {
        if(!Auth::check())
        {
            \Cart::remove($id);

           
      if(Session::has('coupon'))
      {
        Session::forget('coupon');
      }

            return response()->json(['success' => 'Removed Successfully']);

        }else{

            \Cart::session(auth()->id())->remove($id);

            if(Session::has('coupon'.auth()->id()))
            {
              Session::forget('coupon'.auth()->id());
            }

            return response()->json(['success' => 'Removed Successfully']);

        }
       
    }


    public function cart_page ()

    {
      

            return view ('mainpages.cart.cart');

        
       
    }

    public function increament($id)
    {
        if(!Auth::check())

        {
            $data = \Cart::get($id);
       
            \Cart::update($id, array(
                'quantity' => +1 
                
              ));
    
    
            if(Session::has('coupon'))
    
         {
    
          $coupon = coupon::where('coupon_name',Session::get('coupon')['coupon_name'])->first();
    
          Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->coupon_discount,
            'coupon_discount_amount' => round( \Cart::getTotal() * $coupon->coupon_discount / 100),
            'total_amount' => round( \Cart::getTotal() - \Cart::getTotal() * $coupon->coupon_discount / 100 )
    
           ]);
    
         
         }
    
    
          return response()->json([
    
              'success' => 'Your Cart is updated',
          ]);

        }else {


            $data = \Cart::session(auth()->id())->get($id);
       
            \Cart::session(auth()->id())->update($id, array(
                'quantity' => +1 
                
              ));
    
    
            if(Session::has('coupon'))
    
         {
    
          $coupon = coupon::where('coupon_name',Session::get('coupon')['coupon_name'])->first();
    
          Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->coupon_discount,
            'coupon_discount_amount' => round( \Cart::session(auth()->id())->getTotal() * $coupon->coupon_discount / 100),
            'total_amount' => round( \Cart::session(auth()->id())->getTotal() - \Cart::session(auth()->id())->getTotal() * $coupon->coupon_discount / 100 )
    
           ]);
    
         
         }
    
    
          return response()->json([
    
              'success' => 'Your Cart is updated',
          ]);





        }
       
    



    }

    public function decreament($id)
    {

       if(!Auth::check())
       {

        $data = \Cart::get($id);
        \Cart::update($id,[
            'quantity' =>  -1
        ] );

      if(Session::has('coupon'))

      {
 
       $coupon = coupon::where('coupon_name',Session::get('coupon')['coupon_name'])->first();
 
       Session::put('coupon',[
         'coupon_name' => $coupon->coupon_name,
         'coupon_discount' => $coupon->coupon_discount,
         'coupon_discount_amount' => round( \Cart::getTotal() * $coupon->coupon_discount / 100),
         'total_amount' => round( \Cart::getTotal() - \Cart::getTotal() * $coupon->coupon_discount / 100 )
 
        ]);
 
      
      }
 
 
       return response()->json([
 
           'success' => 'Your Cart is updated',
       ]);




       }else{

        $data = \Cart::session(auth()->id())->get($id);
        \Cart::session(auth()->id())->update($id,[
            'quantity' =>  -1
        ] );

      if(Session::has('coupon'))

      {
 
       $coupon = coupon::where('coupon_name',Session::get('coupon')['coupon_name'])->first();
 
       Session::put('coupon',[
         'coupon_name' => $coupon->coupon_name,
         'coupon_discount' => $coupon->coupon_discount,
         'coupon_discount_amount' => round( \Cart::session(auth()->id())->getTotal() * $coupon->coupon_discount / 100),
         'total_amount' => round( \Cart::session(auth()->id())->getTotal() - \Cart::session(auth()->id())->getTotal() * $coupon->coupon_discount / 100 )
 
        ]);
 
      
      }
 
 
       return response()->json([
 
           'success' => 'Your Cart is updated',
       ]);





       }
        


    }

    public function applycoupon (Request $request)
    {
        if(!Auth::check())
        {

            $coupon = coupon::where('coupon_name',$request->coupon)->first();

            if($coupon)
            {
    
                Session::put('coupon',[
                 'coupon_name' => $coupon->coupon_name,
                 'coupon_discount' => $coupon->coupon_discount,
                 'coupon_discount_amount' => round(\Cart::getTotal() * $coupon->coupon_discount / 100),
                 'total_amount' => round(\Cart::getTotal() - \Cart::getTotal()  * $coupon->coupon_discount / 100 )
    
                ]);
    
                return response()->json(array(
                    'success' => ' Coupon Applied successfully',
                    'validity' => true
                           ));
    
    
            }else{
                 
                return response()->json([
                    'error' => 'Invalid Coupon'
                ]);
    
    
            }



        }else{


            $coupon = coupon::where('coupon_name',$request->coupon)->first();

            if($coupon)
            {
    
                Session::put('coupon'.auth()->id(),[
                 'coupon_name' => $coupon->coupon_name,
                 'coupon_discount' => $coupon->coupon_discount,
                 'coupon_discount_amount' => round(\Cart::session(auth()->id())->getTotal() * $coupon->coupon_discount / 100),
                 'total_amount' => round(\Cart::session(auth()->id())->getTotal() - \Cart::session(auth()->id())->getTotal()  * $coupon->coupon_discount / 100 )
    
                ]);
    
                return response()->json(array(
                    'success' => ' Coupon Applied successfully',
                    'validity' => true
                           ));
    
    
            }else{
                 
                return response()->json([
                    'error' => 'Invalid Coupon'
                ]);
    
    
            }





        }

  
    }


    public function cart_calc ()
    {

        if(!Auth::check())
        {

            if (Session::has('coupon'))
        {
            return response()->json([

             'sub_total' => \Cart::getSubTotal(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'coupon_discount_amount' => session()->get('coupon')['coupon_discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount']
                ]);



        }else

        {
            return response()->json(['total' => \Cart::getTotal()]);
        }




        }else {

            if (Session::has('coupon'.auth()->id()))
        {
            return response()->json([

             'sub_total' => \Cart::session(auth()->id())->getSubTotal(),
                'coupon_name' => session()->get('coupon'.auth()->id())['coupon_name'],
                'coupon_discount' => session()->get('coupon'.auth()->id())['coupon_discount'],
                'coupon_discount_amount' => session()->get('coupon'.auth()->id())['coupon_discount_amount'],
                'total_amount' => session()->get('coupon'.auth()->id())['total_amount']
                ]);



        }else

        {
            return response()->json(['total' => \Cart::session(auth()->id())->getTotal()]);
        }





        }
    }


    public function coupon_remove()
    {
        if(!Auth::check())
        {

            Session::forget('coupon');

      return response()->json(['success' => 'coupon removed']);


        }else {

            
            Session::forget('coupon'.auth()->id());

      return response()->json(['success' => 'coupon removed']);


        }
    }
}
