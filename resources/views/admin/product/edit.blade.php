@extends('admin.master_admin')

@section('title')
{{'Update Product'}}
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@section('content')

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="d-flex align-items-center">
    <div class="mr-auto">
    <h3 class="page-title">Add Product</h3>
    <div class="d-inline-block align-items-center">
    
    </div>
    </div>
    </div>
    </div>	  
    
    <!-- Main content -->
    <section class="content">
    
    <!-- Basic Forms -->
    <div class="box">
    <div class="box-header with-border">
    <h4 class="box-title">Update Product</h4>
    
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="row">
    <div class="col">
    <form method="post" action="{{route('admin.product.update',$product->id)}}" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
    <div class="col-12">
    
    <div class="row"> <!-- first col start !-->
    
    
    <div class="col-4">
    
    <div class="form-group">
          <div class="controls">
        <label for="select"> Brand <span class="text-danger">*</span> </label>
        <select name="brand_id" id="select" class="form-control" >
    
                <option value="" disabled="" selected="">Select Brand</option>
        @foreach ($brands as $val)
    
        <option value="{{$val->id}}" {{$val->id == $product->brand_id ? 'selected' : ''}}>{{$val->name}}</option>
        @endforeach	
    
    
        </select>


@error('brand_id')

<span class="text-danger">{{$message}} </span>

@enderror
    


    </div>
    </div>
    
    </div>
    
    
    
    <div class="col-4">
    
    
    <div class="form-group">
          <div class="controls">
        <label for="select"> Category <span class="text-danger" >*</span> </label>
        <select name="category_id" id="select" class="form-control" >
    
                <option value="" disabled="" selected="">Select Category</option>
        @foreach ($categories as $val)
    
        <option value="{{$val->id}}" {{$val->id == $product->category_id ? 'selected' : ''}}>{{$val->name}}</option>
        @endforeach	
    
    
        </select>

        @error('category_id')

        <span class="text-danger">{{$message}} </span>
        
        @enderror

    </div>
    </div>
    
    
    
    
    </div>
    
    
    <div class="col-4">
    
    <div class="form-group">
          <div class="controls">
        <label for="select"> Sub Category <span class="text-danger">*</span> </label>
        <select name="subcategory_id" id="select" class="form-control" >
    
                <option value="" disabled="" >Select sub Category</option>
                <option value="{{$product->subcategory_id}}" selected=""> {{$product->subcategory->name}} </option>
        
    
    
        </select>

        @error('subcategory_id')

        <span class="text-danger">{{$message}} </span>
        
        @enderror

    </div>
    </div>
    
    
    
    
    </div>
    
    
    </div> <!-- end of first col !-->
    
    
    <div class="row"> <!-- start of second col !-->
    
    
    <div class="col-4">
    <div class="form-group">
        <label >Product Name <span class="text-danger">*</span></label>
        <div class="controls">
            <input type="text" name="name" class="form-control" value="{{$product->name}}"  > </div>

            @error('name')

            <span class="text-danger">{{$message}} </span>
            
            @enderror
    </div>
    </div>

    <div class="col-4">
    
        <div class="form-group">
            <label >Product Code <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="code" class="form-control" value="{{$product->code}}"  > </div>

                @error('code')

                <span class="text-danger">{{$message}} </span>
                
                @enderror
        </div>
        
        </div>

        <div class="col-4">
            <div class="form-group">
                <label >Product quantity <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="text" name="qty" class="form-control" value="{{$product->qty}}"  > </div>

                    @error('qty')

                    <span class="text-danger">{{$message}} </span>
                    
                    @enderror
            </div>
            </div>


    
    
    
    
    </div> <!-- end of second col !-->
    
    
    
    <div class="row"> <!-- start of third col !-->
    
        <div class="col-3">
            <div class="form-group">
                <label >Product size <span class="text-danger"></span>(for clothes)</label>
                <div class="controls">
            <div class="tags-default">
            <input type="text" name="size" value="large,medium" data-role="tagsinput" value="{{$product->size}}"  /> </div></div>
            
            </div>
            </div>

            <div class="col-3">
    
                <div class="form-group">
                    <label >Product color <span class="text-danger">*</span></label>
                    <div class="controls">
                <div class="tags-default">
                <input type="text" name="color" value="black" data-role="tagsinput" value="{{$product->color}}" /> </div></div>
                @error('color')

                    <span class="text-danger">{{$message}} </span>
                    
                    @enderror 
                </div>
                
                </div>

                <div class="col-3">
    
                    <div class="form-group">
                    <label >Product Selling Price <span class="text-danger">*</span></label>
                    <div class="controls">
                        <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}"  > </div>

                        @error('selling_price')

                        <span class="text-danger">{{$message}} </span>
                        
                        @enderror 
                </div>
                
                
                </div>

                <div class="col-3">
    
                    <div class="form-group">
                    <label >Discount Price $ <span class="text-danger"></span></label>
                    <div class="controls">
                        <input type="text" name="discount_price" class="form-control" value="{{$product->discount_price}}"> </div>

                        @error('discount_price')

                        <span class="text-danger">{{$message}} </span>
                        
                        @enderror 
                </div>
                
                
                </div>



 
    </div>  <!-- end of third col !-->
    
    
    <div class="row"> <!-- start of fourth col !-->
    
    
        <div class="col-12">
    
            <div class="form-group">
                <label >Product details <span class="text-danger">*</span></label>
                <div class="controls">
                    <textarea id="editor1" name="details" rows="10" cols="80" >
                        {{$product->details}}
                     </textarea>

                     @error('details')

                     <span class="text-danger">{{$message}} </span>
                     
                     @enderror 

                 </div>  
            </div>
            
            </div>
    
   
 
    </div>  <!-- end of fourth col !-->
    
    <div class="row"> <!-- start of fifth col !-->
    
    
        <div class="col-12">
            <div class="form-group">
              <label class="form-control-label">Video Link <span class="tx-danger">(optional)</span></label>
              <input class="form-control" name="video_link" placeholder="Video Link" $value="{{$product->video_link}}" >
            </div>
          </div>
    
   
    
   
    
    
    </div>
      <!-- end of fifth col !-->
    
      <div class="row"> <!-- start of six col !-->
    
    
        <div class="col-4">
            <div class="form-group">
                <label >Main thumbnail <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="file" onChange="viewImage(this)" name="image_one" class="form-control"  > </div>
                    <input type="hidden" name="old_image_one" value="{{$product->image_one}}">
                    <img src="{{asset($product->image_one)}}" id="old1">
                    <img src="" id="preview">

                    
                    @error('image_one')

                    <span class="text-danger">{{$message}} </span>
                    
                    @enderror 
            </div>
            </div>
    
    
    
    <div class="col-4">
    
        <div class="form-group">
        <label >Image two <span class="text-danger">*</span></label>
        <div class="controls">
            <input type="file" onChange="viewImage2(this)" name="image_two" class="form-control"  > </div>

            <input type="hidden" name="old_image_two" value="{{$product->image_two}}">
                    <img src="{{asset($product->image_two)}}">

            <img src="" id="preview1" id="old2">

            @error('image_two')

                    <span class="text-danger">{{$message}} </span>
                    
                    @enderror 

    </div>
    
    
    </div>

    <div class="col-4">
    
        <div class="form-group">
        <label >image three <span class="text-danger"></span></label>
        <div class="controls">
            <input type="file" name="image_three" onChange="viewImage3(this)" class="form-control"  > </div>

            <input type="hidden" name="old_image_three" value="{{$product->image_three}}">
                    <img src="{{$product->image_three == null ? '' : asset($product->image_three)}}">

            <img src="" id="preview2" id="old3">

            @error('image_three')

                    <span class="text-danger">{{$message}} </span>
                    
                    @enderror 

    </div>
    
    
    </div>
    
    
    </div>   <!-- end of six col !-->
    

    <hr>
    
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_1" name="main_slider" value="1" {{$product->main_slider == 1 ? 'checked' : ''}} >
                    <label for="checkbox_1">Main Slider</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_2" name="hot_deal" value="1" {{$product->hot_deal == 1 ? 'checked' : ''}}>
                    <label for="checkbox_2">Hot Deal</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_3" name="best_rated" value="1" {{$product->best_rated == 1 ? 'checked' : ''}}>
                    <label for="checkbox_3">Best Rated</label>
                </fieldset>
                
    </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_4" name="trend" value="1" {{$product->trend == 1 ? 'checked' : ''}}>
                    <label for="checkbox_4">Trend Product</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_5" name="mid_slider" value="1" {{$product->mid_slider == 1 ? 'checked' : ''}}>
                    <label for="checkbox_5">Mid Slider</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_6" name="hot_new" value="1" {{$product->hot_new == 1 ? 'checked' : ''}}>
                    <label for="checkbox_6">Hot New</label>
                </fieldset>
                
    </div>
    </div>
    
    </div>
    </div>
    <div class="text-xs-right">
    <button type="submit" class="btn btn-rounded btn-info">Update Product</button>
    </div>
    </form>
    
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
    </section>
    <!-- /.content -->
    </div>


    <script>

        $(document).ready(function(){
        
           $('select[name="category_id"]').on('change',function(){
        
           let category_id = $(this).val();
        
           if(category_id){
             
             $.ajax({
              type : 'get',
              dataType : 'json',
              url : '/admin/subcategory/ajax/' + category_id,
        
              success:function(data){
        
                $('select[name="subcategory_id"]').empty();
        
                $.each(data,function(key,value){
               
        
              $('select[name="subcategory_id"]').append('<option value= "'+value.id +'">' +value.name+ '</option>');
        
        
                });
        
              }
             
        
             });
            
        
           }
        
        
           }) 
        
        
        
        
        });
        
        
        
        
        </script>


<script type="text/javascript">
  

    function viewImage(input)
    {
    
    
    if (input.files && input.files[0])
    
    {
      var reader = new FileReader();
    
      reader.onload = function(e)
      {
          $('#old1').hide();
          
       $('#preview').attr('src',e.target.result);
    
    
      };
    
      reader.readAsDataURL(input.files[0]);
    }
    
    }
    
    
    
    
    </script>

<script type="text/javascript">
  

    function viewImage2(input)
    {
    
    
    if (input.files && input.files[0])
    
    {
      var reader = new FileReader();
    
      reader.onload = function(e)
      {
        $('#old2').hide();
       $('#preview1').attr('src',e.target.result);
    
    
      };
    
      reader.readAsDataURL(input.files[0]);
    }
    
    }
    
    
    
    
    </script>

<script type="text/javascript">
  

    function viewImage3(input)
    {
    
    
    if (input.files && input.files[0])
    
    {
      var reader = new FileReader();
    
      reader.onload = function(e)
      {
        $('#old3').hide();
       $('#preview2').attr('src',e.target.result);
    
    
      };
    
      reader.readAsDataURL(input.files[0]);
    }
    
    }
    
    
    
    
    </script>





























@endsection