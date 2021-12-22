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
        if(!Auth::guard('admin')->check())
        {
            return view ('admin.login');
        }

        return redirect()->route('admin.dashboard');
        
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
        
   if(is_null($admin)){

    return redirect()->back()->with('error','Invalid email or password');
   }else {


    if( 
        Auth::guard('admin')->attempt(['email' => $admin->email, 'password' => $request->password ]) 
        ||
        Auth::guard('admin')->attempt(['phone' => $admin->phone, 'password' => $request->password ]))
   
           {
              return redirect()->route('admin.dashboard');
           }else{
               return redirect()->back()->with('error','Invalid email or password');
           }


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

    public function profile ()

    {
        $admin = admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view ('admin.profile.profile',compact('admin'));
    }

    public function profile_edit ()
    {
        $admin = admin::where('id',Auth::guard('admin')->user()->id)->first();
        return view ('admin.profile.profile_edit',compact('admin'));

    }

    public function profile_update (Request $request)
    {

        $photo = $request->file('photo');
        if($photo)
        {
           // unlink($old_logo);
            $name =hexdec(uniqid());
            $image_ext = $photo->getClientOriginalExtension();
            $image_name = $name.'.'.$image_ext;
            $upload_path = 'public/media/brands/';
            $image_url = $upload_path.$image_name;
            $photo->move($upload_path, $image_name);
            
            admin::where('id',Auth::guard('admin')->user()->id)->update([

                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'photo' => $image_url
               
    
            ]);

        }else{

            admin::where('id',Auth::guard('admin')->user()->id)->update([

                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                
               
    
            ]);




        }

        return redirect()->route('admin.profile');

       


    }
}
