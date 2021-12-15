<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\userChangePassRequest;
use App\Http\Traits\toastermsgs_trait;
use App\Models\contact;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;


class userController extends Controller
{

    use toastermsgs_trait;

    public function create()
    {
        return view ('mainpages.user.changepass');
    }

    public function update_password (userChangePassRequest $request)
    {
        $validation = $request->validated();

        if(Hash::check($request->current_password,Auth::user()->password))
        {
           
           User::find(Auth::user()->id)->update([
             'password' => Hash::make($request->password)
           ]);

           Auth::logout();
           return redirect()->route('login')->with($this->userpasschanged());
         

        }else{

            return redirect()->back()->with($this->userpasserror());
        }




    }



    public function logout()

    {
        Auth::logout();

        return redirect()->route('login');
    }


    public function orders ()
    {
        $orders = order::where('user_id',Auth::id())->get();

        return view('mainpages.user.orders',compact('orders'));
    }

    public function order_view ($id)

    {
        $order = order::where('user_id',Auth::id())->where('id',$id)->first();

        $order_items = order_item::where('order_id',$id)->get();

        return view('mainpages.user.order_view',compact('order','order_items'));


    }

    public function order_cancel ($id)

{
  order::FindOrFail($id)->update([
      'status' => 4
  ]);

  $msg = ([
    'message' => 'Order is Cancelled!',
    'alert-type' => 'warning'
  ]);

  return redirect()->back()->with($msg);
}



public function order_return_request(Request $request,$id)

{


     order::find($id)->update([


        'order_return' => 1,
        'return_status' => 0,
        'return_reason' => $request->return_reason

     ]);

     $msg = ([
        'message' => 'Your Request is sent',
        'alert-type' => 'Success'
      ]);
    
      return redirect()->back()->with($msg);
}

public function contact_page ()

{
    return view('mainpages.user.contact');
}

public function contact_message (Request $request)
{
   contact::insert([
     
    'name' => $request->name,
    'email' => $request->email,
    'title' => $request->title,
    'message' => $request->message

   ]);

   $msg = ([
     'message' => 'Your Message Sent Successfully',
     'alert-type' => 'success'
   ]);

   return redirect()->back()->with($msg);

}

public function download_invoice ($id)

{
  $order = order::where('user_id',Auth::id())->where('id',$id)->first();

  $order_items = order_item::where('order_id',$id)->get();

 // return view('mainpages.user.invoice_download',compact('order','order_items'));

 $pdf = PDF::loadView('mainpages.user.invoice_download', compact('order','order_items'));
 return $pdf->download('invoice.pdf');



}







}
