<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class roleController extends Controller
{
    public function create_user_page ()

    {
        return view ('admin.roles.create_user');
    }

    public function create_user (Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|unique:admins|email',
            'phone' => 'required|unique:admins',
            'password' => 'required'
          ]);

          admin::insert([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'password' => Hash::make($request->password),
           'status' => 2,
           'categories' => $request->categories,
           'products' => $request->products,
           'reports' => $request->reports,
           'coupon' => $request->coupon,
           'orders' => $request->orders,
           'user_roles' => $request->user_roles

          ]);

          $msg = ([
              'message' => 'User Created Successfully',
              'alert-type' => 'success'
          ]);

          return redirect()->back()->with($msg);
    }

    public function all_user ()

    {
      $users = admin::where('status',2)->get();
      return view ('admin.roles.all_users',compact('users'));

    }

    public function user_edit($id)
    {
        $user = admin::findOrFail($id);

        return view ('admin.roles.edit_user',compact('user'));
    }

    public function user_update (Request $request,$id)
    {

        

          admin::findOrFail($id)->update([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'password' => Hash::make($request->password),
           'status' => 2,
           'categories' => $request->categories,
           'products' => $request->products,
           'reports' => $request->reports,
           'coupon' => $request->coupon,
           'orders' => $request->orders,
           'user_roles' => $request->user_roles

          ]);

          $msg = ([
              'message' => 'User info Updated Successfully',
              'alert-type' => 'success'
          ]);

          return redirect()->route('admin.all.users')->with($msg);

    }

    public function user_delete ($id)
    {
        admin::findOrFail($id)->delete();

        $msg = ([
            'message' => 'User deleted Successfully',
            'alert-type' => 'success'
        ]);

        return redirect()->back()->with($msg);



    }
}
