<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_item;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ordersController extends Controller
{
    public function orders()
    {
       $orders = order::where('status',0)->get();

       return view ('admin.orders.new_orders',compact('orders'));

    }

    public function order_details ($id)
    {
        $order = order::find($id);
        $order_details = order_item::where('order_id',$id)->get();

        return view('admin.orders.order_det',compact('order','order_details'));
    }

    public function paid_orders ()
    {
        $orders = order::where('status',1)->get();

        return view ('admin.orders.new_orders',compact('orders'));

    }

    public function progress_orders ()
    {
        $orders = order::where('status',2)->get();

        return view ('admin.orders.new_orders',compact('orders'));

    }

    public function delivered_orders ()
    {
        $orders = order::where('status',3)->get();

        return view ('admin.orders.new_orders',compact('orders'));

    }

   public function payment_accepted ($id)
   {
     order::where('id',$id)->update(['status' => 1]);
   
      $msg =([
          'message' => 'Payment accepted',
          'alert-type' => 'success'
      ]);

      return redirect()->route('admin.paid.orders')->with($msg);
   }

   public function  order_progress ($id)
   {
     order::where('id',$id)->update(['status' => 2]);
   
      $msg =([
          'message' => 'Sent To Delivery Process',
          'alert-type' => 'success'
      ]);

      return redirect()->route('admin.progress.orders')->with($msg);
   }


   public function   delivery_done ($id)
   {
     order::where('id',$id)->update(['status' => 3]);

     $products = order_item::where('order_id',$id)->get();

     foreach($products as $pro)
     {
         product::where('id',$pro->product_id)->update([
          
            'qty' =>  product::find($pro->product_id)->qty - $pro->qty
  
         ]);
     }

     order::findOrFail($id)->update([
        'delivered_date' => Carbon::now()
     ]);
   
      $msg =([
          'message' => 'Delivery Done successfully',
          'alert-type' => 'success'
      ]);

      return redirect()->route('admin.delivered.orders')->with($msg);
   }

   public function  order_cancel ($id)
   {
     order::where('id',$id)->update(['status' => 4]);
   
      $msg =([
          'message' => 'Order Cancelled!',
          'alert-type' => 'info'
      ]);

      return redirect()->back()->with($msg);
   }

   public function requests_page ()

   {
       $requests = order::where('return_status',0)->where('status',3)->get();
       return view ('admin.orders.return_requests',compact('requests'));
   }

   public function accept_request ($id)

   {
       order::findOrFail($id)->update([
          'return_status' => 1
       ]);

       $msg =([
        'message' => 'Order Return Request Accepted',
        'alert-type' => 'success'
    ]);

    return redirect()->back()->with($msg);
   }

   public function reject_request ($id)

   {
    order::findOrFail($id)->update([
        'return_status' => 2
     ]);

     $msg =([
      'message' => 'Order Return Request Rejected',
      'alert-type' => 'error'
  ]);

  return redirect()->back()->with($msg);


   }

   

  

  
}
