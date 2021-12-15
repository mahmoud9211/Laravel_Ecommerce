<?php

namespace App\Http\Controllers;

use App\Http\Requests\couponrequest;
use App\Http\Traits\toastermsgs_trait;
use Illuminate\Http\Request;
use App\Models\coupon;
use Carbon\Carbon;

class couponController extends Controller
{
    use toastermsgs_trait;

    public function index()
    {
        $coupons = coupon::get();

        return view ('admin.coupon.coupon',compact('coupons'));
    }

    public function store (couponrequest $request)
    {
        $validation = $request->validated();

        coupon::insert([
            'coupon_name' => $request->coupon_name,
          'coupon_discount' => $request->coupon_discount,
          'validity' => $request->validity,
          'status' => 1,
          'created_at' => Carbon::now()

        ]);

        return redirect()->back()->with($this->insertmsg());




    }

    public function update(couponrequest $request)
    {
        $validation = $request->validated();

        
        coupon::findOrFail($request->id)->update([

            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'validity' => $request->validity,
            'created_at' => Carbon::now()

       
        ]);

        $validity = coupon::findOrFail($request->id)->validity;

        if($validity < Carbon::now())
        {
            coupon::findOrFail($request->id)->update([
                
                'status' => 0
             
            ]);
        }else{
            coupon::findOrFail($request->id)->update([
                
                'status' => 1
             
            ]);
        }

        return redirect()->back()->with($this->updatemsg());



    }


    public function delete($id){

        coupon::findOrFail($id)->delete();
        return redirect()->back()->with($this->deletemsg());

    }
    
}
