<?php

namespace App\Http\Controllers;

use App\Http\Requests\brandrequest;
use Illuminate\Http\Request;
use App\Models\brand;
use Carbon\Carbon;
use App\Http\Traits\toastermsgs_trait;

class brandController extends Controller
{
    
  use toastermsgs_trait;

    public function brandpage ()
    {
        $brands = brand::get();

        return view ('admin.brand.brand',compact('brands'));

    }

    public function brand_store(brandrequest $request)
    {
      $validation = $request->validated();

      $logo = $request->file('logo');
      if($logo){
         $name = hexdec(uniqid());
         $image_ext = $logo->getClientOriginalExtension();
         $image_name = $name.'.'.$image_ext;
         $upload_path = 'public/media/brands/';
         $image_url = $upload_path.$image_name;
         $logo->move($upload_path, $image_name);

      }

      brand::insert([

        'name' => $request->name,
        'logo' => $image_url

      ]);


      return redirect()->back()->with($this->insertmsg());
    }

    public function brand_update (brandrequest $request){

        $validation = $request->validated();

        $logo = $request->file('logo');

        $old_logo = $request->old_logo;

        if($logo){
            unlink($old_logo);
            $name =hexdec(uniqid());
            $image_ext = $logo->getClientOriginalExtension();
            $image_name = $name.'.'.$image_ext;
            $upload_path = 'public/media/brands/';
            $image_url = $upload_path.$image_name;
            $logo->move($upload_path, $image_name);

            brand::findOrFail($request->id)->update([
              'name' => $request->name,
              'logo' => $image_url,
              'updated_at' => Carbon::now()
            ]);

            

           

             return redirect()->back()->with($this->updatemsg());


        }else{

            brand::findOrFail($request->id)->update([

             'name' => $request->name
            ]);
            
      
            return redirect()->back()->with($this->updatemsg());

        }

    }

    public function brand_delete ($id)
    {
       $data = brand::find($id);

       $image = $data->logo;

       unlink($image);

       brand::find($id)->delete();

      

       return redirect()->back()->with($this->deletemsg());

    }
}
