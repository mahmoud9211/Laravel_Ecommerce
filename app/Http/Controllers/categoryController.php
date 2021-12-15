<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Http\Requests\categoryrequest;
use Carbon\Carbon;
use App\Http\Traits\toastermsgs_trait;

class categoryController extends Controller
{

    use toastermsgs_trait;
    public function catpage(){
        $categories = category::get();
        return view ('admin.category.category',compact('categories'));
    }

    public function cat_store (categoryrequest $request)
    {
        $validated = $request->validated();

       category::insert([
        
            'name' => $request->name

        ]);

        return redirect()->back()->with($this->insertmsg());

    }

    public function cat_update (categoryrequest $request)
    {
        $validated = $request->validated();

        category::findOrFail($request->id)->update([
          'name' => $request->name,
          'updated_at' => Carbon::now()
        ]);

       

        return redirect()->back()->with($this->updatemsg());


    }


    public function cat_delete ($id)
    {
        category::findOrFail($id)->delete();

     

        return redirect()->back()->with($this->deletemsg());

    }
}
