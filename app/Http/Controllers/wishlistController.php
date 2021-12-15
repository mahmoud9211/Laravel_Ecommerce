<?php

namespace App\Http\Controllers;

use App\Http\Traits\toastermsgs_trait;
use App\Models\order;
use App\Models\wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class wishlistController extends Controller
{

    use toastermsgs_trait;
    public function Add_To_Wishlist (Request $request,$id)

    {

        $exists = wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();



        if(Auth::check())
   
        {
         if(!$exists)
         {
   
            wishlist::insert([
   
           'user_id' => Auth::id(),
           'product_id' => $id,
           'created_at' => Carbon::now(),
   
          ]);
   
          return response()->json(['success' => 'Product is added to your wishlist']);
   
         }
   
         else
   
         {
                  return response()->json(['error' => 'Product is already in your wishlist']);
   
         }
   
   
   
         
        }
        else
   
        {
      return response()->json(['error' => 'Login first to add to your wishlist']);
   
   
        }
       

}


public function wishlistCount()
{

  $data = wishlist::where('user_id',Auth::id())->get();

  $count = count($data);

  return response()->json($count);

}

public function wishlistPage ()
{
   if(Auth::check())
   {

       return view('mainpages.wishlist.wishlist');
   }else{

     return redirect()->route('login')->with($this->signinfirst());

   }



}

public function wishlistget ()

{
    $wishlist = wishlist::where('user_id',Auth::id())->with('product')->get();

    return response()->json($wishlist);
}

public function wishlistremove ($id)
{
    wishlist::findOrFail($id)->delete();

    return response()->json(['success' => 'Removed Successfully from your wishlist']);

}
















}
