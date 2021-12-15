<?php

namespace App\Http\Traits;
use App\Models\product;
use Carbon\Carbon;

trait productupdate_trait {

    public function firstTwoimages($id,$request)
    {
        $product = product::findOrFail($id);

        $new_image_one = $request->file('image_one');
        $new_image_two = $request->file('image_two');
        $new_image_three = $request->file('image_three');
   
        $old_image_one = $product->image_one;
        $old_image_two = $product->image_two;
        $old_image_three = $product->image_three;

        if ($new_image_one && $new_image_two )
        { 
            unlink($old_image_one);
            $image_one_name = hexdec(uniqid()). '.' .$new_image_one->getClientOriginalExtension();
            $image_one_path = 'public/media/products/';
            $image_one_url = $image_one_path.$image_one_name;
            $new_image_one->move($image_one_path, $image_one_name);
  
            unlink($old_image_two);
            $image_two_name = hexdec(uniqid()). '.' .$new_image_two->getClientOriginalExtension();
            $image_two_path = 'public/media/products/';
            $image_two_url = $image_two_path.$image_two_name;
            $new_image_two->move($image_two_path, $image_two_name);

            product::findOrFail($id)->update([
        
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
                'updated_at' => Carbon::now()
                   ]);
                 }

              //   return redirect()->back()->with($this->updatemsg());





    }



    public function firstimage($id,$request)
    {
        $product = product::findOrFail($id);

        $new_image_one = $request->file('image_one');
        $new_image_two = $request->file('image_two');
        $new_image_three = $request->file('image_three');
   
        $old_image_one = $product->image_one;
        $old_image_two = $product->image_two;
        $old_image_three = $product->image_three;

        if ($new_image_one)
        {
            unlink($old_image_one);

            $image_one_name = hexdec(uniqid()). '.' .$new_image_one->getClientOriginalExtension();
            $image_one_path = 'public/media/products/';
            $image_one_url = $image_one_path.$image_one_name;
            $new_image_one->move($image_one_path, $image_one_name);
  
           
           

            product::findOrFail($id)->update([
        
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
                'image_two' => $old_image_two,
                'status' => 1,
                'updated_at' => Carbon::now()
                   ]);
                 }


               //  return redirect()->back()->with($this->updatemsg());
     




    }



    public function secondimage($id,$request)
    {
        $product = product::findOrFail($id);

        $new_image_one = $request->file('image_one');
        $new_image_two = $request->file('image_two');
        $new_image_three = $request->file('image_three');
   
        $old_image_one = $product->image_one;
        $old_image_two = $product->image_two;
        $old_image_three = $product->image_three;

        if ($new_image_two)
        {
            unlink($old_image_two);
            $image_two_name = hexdec(uniqid()). '.' .$new_image_two->getClientOriginalExtension();
            $image_two_path = 'public/media/products/';
            $image_two_url = $image_two_path.$image_two_name;
            $new_image_two->move($image_two_path, $image_two_name);
  
           
           

            product::findOrFail($id)->update([
        
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
                'image_one' => $old_image_one,
                'image_two' =>  $image_two_url,
                'status' => 1,
                'updated_at' => Carbon::now()
                   ]);
                 }

               //  return redirect()->back()->with($this->updatemsg());






}


public function thirdimage($id,$request)
{
    $product = product::findOrFail($id);

    $new_image_one = $request->file('image_one');
    $new_image_two = $request->file('image_two');
    $new_image_three = $request->file('image_three');

    $old_image_one = $product->image_one;
    $old_image_two = $product->image_two;
    $old_image_three = $product->image_three;

    if ($new_image_three)
    {
        unlink($old_image_three);
        
          $image_three_name = hexdec(uniqid()). '.' .$new_image_three->getClientOriginalExtension();
          $image_three_path = 'public/media/products/';
          $image_three_url = $image_three_path.$image_three_name;
          $new_image_three->move($image_three_path, $image_three_name);
       
       

        product::findOrFail($id)->update([
    
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
            'image_one' => $old_image_one,
            'image_two' =>  $old_image_two,
            'image_three' => $image_three_url,
            'status' => 1,
            'updated_at' => Carbon::now()
               ]);
             }

            // return redirect()->back()->with($this->updatemsg());







}

public function threeimages($id,$request)
{
    $product = product::findOrFail($id);

    $new_image_one = $request->file('image_one');
    $new_image_two = $request->file('image_two');
    $new_image_three = $request->file('image_three');

    $old_image_one = $product->image_one;
    $old_image_two = $product->image_two;
    $old_image_three = $product->image_three;

    if ($new_image_one && $new_image_two && $new_image_three  )
    {
        unlink($old_image_one);
        $image_one_name = hexdec(uniqid()). '.' .$new_image_one->getClientOriginalExtension();
        $image_one_path = 'public/media/products/';
        $image_one_url = $image_one_path.$image_one_name;
        $new_image_one->move($image_one_path, $image_one_name);

        unlink($old_image_two);
        $image_two_name = hexdec(uniqid()). '.' .$new_image_two->getClientOriginalExtension();
        $image_two_path = 'public/media/products/';
        $image_two_url = $image_two_path.$image_two_name;
        $new_image_two->move($image_two_path, $image_two_name);
        unlink($old_image_three);
        $image_three_name = hexdec(uniqid()). '.' .$new_image_three->getClientOriginalExtension();
          $image_three_path = 'public/media/products/';
          $image_three_url = $image_three_path.$image_three_name;
          $new_image_three->move($image_three_path, $image_three_name);

        product::findOrFail($id)->update([
    
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
            'updated_at' => Carbon::now()
               ]);

            }

          //  return redirect()->back()->with($this->updatemsg());


     





}


public function withoutimages($id,$request)
{
    $product = product::findOrFail($id);

   

    $old_image_one = $product->image_one;
    $old_image_two = $product->image_two;
    $old_image_three = $product->image_three;

   

        product::findOrFail($id)->update([
    
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
            'image_one' => $old_image_one,
            'image_two' => $old_image_two,
            'image_three' => $old_image_three,
            'status' => 1,
            'updated_at' => Carbon::now()
               ]);

            //   return redirect()->back()->with($this->updatemsg());

             




}









}