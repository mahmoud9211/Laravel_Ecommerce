<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\subcategory;
use App\Models\category;
use App\Http\Requests\subcategoryRequest;
use App\Http\Traits\toastermsgs_trait;



class subcategoryController extends Controller
{
   use toastermsgs_trait;

    public function index()
    {
        $subcategories = subcategory::get();

        $cat = category::get();

        return view ('admin.subcategory.subcategory',compact('subcategories','cat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(subcategoryRequest $request)
    {
       $validation = $request->validated();
       
       subcategory::insert([
        'name' => $request->name,
        'cat_id' => $request->cat_id

       ]);

       return redirect()->back()->with($this->insertmsg());


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(subcategoryRequest $request)
    {
        $validation = $request->validated();
       
        subcategory::findOrFail($request->id)->update([
         'name' => $request->name,
         'cat_id' => $request->cat_id
 
        ]);
 
        return redirect()->back()->with($this->updatemsg());

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        subcategory::findOrFail($id)->delete();
        return redirect()->back()->with($this->deletemsg());

    }

    public function get_subcat_by_ajax ($category_id){
    
        $data = subcategory::where('cat_id',$category_id)->get();

        return json_encode($data);


    }
}
