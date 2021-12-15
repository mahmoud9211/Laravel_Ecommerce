<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view ('admin.login');
    }

    public function dashboard()
    {
        return view ('admin.index');
    }


    public function login (Request $request)
    {

        $validation = $request->validate([
          'login' => 'required',
          'password' => 'required'
        ],
          
       ['login.required' => 'Please Type your Email or Phone no.'
       ] 
      
    );

        $admin = admin::where('email',$request->login)->orWhere('phone',$request->login)->first();
        

     if(Auth::guard('admin')->attempt(['phone' => $admin->phone, 'password' => $request->password ]) ||
     Auth::guard('admin')->attempt(['email' => $admin->email, 'password' => $request->password ]) )

        {
           return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error','Invalid email or password');
        }
  
    }

    public function logout()
    {
       Auth::guard('admin')->logout();
       
       return redirect()->route('Login_form');
    }

    public function register_page ()
    {
        return view ('admin.register');
    }

    public function registration (Request $request)
    {
        $validation = $request->validate([
          'name' => 'required|regex:/^[a-zA-Z]+$/u',
          'email' => 'required|unique:admins|email',
          'phone' => 'required|unique:admins|integer',
          'password' => 'required|confirmed',
          'password_confirmation' => 'required',
        ]);

        admin::insert([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'created_at' => Carbon::now(),
          'phone' => $request->phone
        ]);

        return redirect()->route('Login_form');

    }

    public function password_page ()
    {
        return view('admin.pass_change');
    }

    public function passwordchange (Request $request)
    {
        

        $validation = $request->validate([
         'oldpass' => 'required',
         'password' => 'required|confirmed',
         
        
        ]); 

        $admin_pass = Auth::guard('admin')->user()->password;

        if(Hash::check($request->oldpass,$admin_pass))
        {
            if(Hash::check($request->password,$admin_pass))
            {
                return redirect()->back()->with("error","New password Can't be the same like Current password!");
            }else{

                $admin = admin::find(Auth::guard('admin')->user()->id);

            $admin->password = Hash::make($request->password);

            $admin->save();

           

            Auth::guard('admin')->logout();
       
            return redirect()->route('Login_form');

            }
            


         }else{

            return redirect()->back();
         }
    }
}
