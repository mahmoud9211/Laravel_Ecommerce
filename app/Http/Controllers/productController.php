<?php

namespace App\Http\Controllers;

use App\Http\Requests\productrequest;
use App\Http\Traits\productupdate_trait;
use App\Http\Traits\toastermsgs_trait;
use App\Models\brand;
use App\Models\category;
use Illuminate\Http\Request;

use App\Models\product;
use Carbon\Carbon;

class productController extends Controller
{
 
    use toastermsgs_trait;
    use productupdate_trait;



    public function index()
    {
        $products = product::get();

        return view('admin.product.index',compact('products'));
    }





    public function create()
    {
        $categories = category::get();
        $brands = brand::get();

        return view ('admin.product.Addproduct',compact('categories','brands'));
    }

    public function store (productrequest $request)
    {
       $validation = $request->validated();

       if($request->file('image_one') && $request->file('image_two') && $request->file('image_three') )
       {

          $image_one = $request->file('image_one');
          $image_one_name = hexdec(uniqid()). '.' .$image_one->getClientOriginalExtension();
          $image_one_path = 'public/media/products/';
          $image_one_url = $image_one_path.$image_one_name;
          $image_one->move($image_one_path, $image_one_name);

          $image_two = $request->file('image_two');
          $image_two_name = hexdec(uniqid()). '.' .$image_two->getClientOriginalExtension();
          $image_two_path = 'public/media/products/';
          $image_two_url = $image_two_path.$image_two_name;
          $image_two->move($image_two_path, $image_two_name);

          $image_three = $request->file('image_three');
          $image_three_name = hexdec(uniqid()). '.' .$image_three->getClientOriginalExtension();
          $image_three_path = 'public/media/products/';
          $image_three_url = $image_three_path.$image_three_name;
          $image_three->move($image_three_path, $image_three_name);


          product::insert([
        
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'code' => $request->code,
            'qty' => $request->qty,
            'details' => $request->details,
            'color' => $request->color,
            'size' => $request->size,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'video_link' => $request->video_link,
            'main_slider' => $request->main_slider,
            'hot_deal' =>  $request->hot_deal,
            'best_rated' => $request->best_rated,
            'mid_slider' => $request->mid_slider,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend,
            'image_one' => $image_one_url,
            'image_two' => $image_two_url,
            'image_three' => $image_three_url,
            'status' => 1,
            'created_at' => Carbon::now()
    
    
    
           ]);
    
           return redirect()->route('admin.product.index')->with($this->insertmsg());

          


       }else{

        $image_one = $request->file('image_one');
          $image_one_name = hexdec(uniqid()). '.' .$image_one->getClientOriginalExtension();
          $image_one_path = 'public/media/products/';
          $image_one_url = $image_one_path.$image_one_name;
          $image_one->move($image_one_path, $image_one_name);

          $image_two = $request->file('image_two');
          $image_two_name = hexdec(uniqid()). '.' .$image_two->getClientOriginalExtension();
          $image_two_path = 'public/media/products/';
          $image_two_url = $image_two_path.$image_two_name;
          $image_two->move($image_two_path, $image_two_name);

        product::insert([
        
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'code' => $request->code,
            'qty' => $request->qty,
            'details' => $request->details,
            'color' => $request->color,
            'size' => $request->size,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'video_link' => $request->video_link,
            'main_slider' => $request->main_slider,
            'hot_deal' =>  $request->hot_deal,
            'best_rated' => $request->best_rated,
            'mid_slider' => $request->mid_slider,
            'hot_new' => $request->hot_new,
            'trend' => $request->trend,
            'image_one' => $image_one_url,
            'image_two' => $image_two_url,
            'status' => 1,
            'created_at' => Carbon::now()
    
    
    
           ]);
    
           return redirect()->route('admin.product.index')->with($this->insertmsg());

 }

 }

 public function deactivate ($id)
 {
     product::findOrFail($id)->update(['status' => 0]);
     return redirect()->back()->with($this->deactivatemsg());

 }

 public function activate ($id)
 {
     product::findOrFail($id)->update(['status' => 1]);
     return redirect()->back()->with($this->activatemsg());

 }

 public function delete($id)
 {
   $product = product::findOrFail($id);

   $image_one = $product->image_one;
   $image_two = $product->image_two;
   $image_three = $product->image_three;

   if($image_three !== null)
   {
       unlink($image_one);
       unlink($image_two);
       unlink($image_three);

   }else{
      
    unlink($image_one);
    unlink($image_two);

   }

   $product->delete();

   return redirect()->back()->with($this->deletemsg());

 }

 public function edit ($id)
 {
    $product = product::findOrFail($id);
    $brands= brand::get();
    $categories = category::get();

    return view ('admin.product.edit',compact('product','brands','categories'));

 }

 public function update($id,productrequest $request)

 {
     $validation = $request->validated();

  if($this->firstimage($id,$request))
  {
    return redirect()->route('admin.product.index')->with($this->updatemsg());
}
  elseif($this->secondimage($id,$request)){
    return redirect()->route('admin.product.index')->with($this->updatemsg());
  }
  elseif($this->thirdimage($id,$request)){
    return redirect()->route('admin.product.index')->with($this->updatemsg());
  }
  elseif($this->firstTwoimages($id,$request)){
    return redirect()->route('admin.product.index')->with($this->updatemsg());
  }
  elseif($this->threeimages($id,$request)){
    return redirect()->route('admin.product.index')->with($this->updatemsg());
  }
  elseif($this->withoutimages($id,$request))
  {
    return redirect()->route('admin.product.index')->with($this->updatemsg());

  }else{
    return redirect()->route('admin.product.index')->with($this->updatemsg());

  }



 }


 //for product details page in the main

 public function product_details ($id,$name)
 {
   $product = product::findOrFail($id);
   
   $pro_color = $product->color;
   $color = explode(',',$pro_color);

   $pro_size = $product->size;
   $size = explode(',',$pro_size);

   return view ('mainpages.product.product_details',compact('product','color','size'));

 }

 //product view on the modal of the cart

 public function product_view ($id){


  $product = product::with('brand','category','subcategory')->findOrFail($id);
  
  $pro_color = $product->color;
  $color = explode(',',$pro_color);

  $pro_size = $product->size;
  $size = explode(',',$pro_size);


  return response()->json([
   'product' => $product ,
   'color' => $color,
   'size' => $size
  ]);



 }


 public function product_By_search (Request $request)

 {

   $product = product::where('name','LIKE',"%$request->item%")->get();

   return view('mainpages.product.product_by_search',compact('product'));


 }

 public function product_by_subcat ($id,$name)
 {
    
  $products = product::where('subcategory_id',$id)->latest()->get();
    
  return view ('mainpages.product.product_by_subcategories',compact('products'));

 }

 public function product_by_cat ($id,$name)
 {
  $products = product::where('category_id',$id)->latest()->get();
    
  return view ('mainpages.product.product_by_category',compact('products'));

 }





}
