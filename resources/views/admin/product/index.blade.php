@extends('admin.master_admin')

@section('title')
{{'Products'}}
@endsection

@section('content')

<section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Products</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Product Name</th>
                <th> Image </th>
                <th>Category</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th> Selling Price</th>
                <th> Discount</th>
                <th>Status</th>
                <th style="text-align: center" >Action</th>
            </tr>
        </thead>
        <tbody>
            @php 
            {$i = 1;}   
            @endphp
            @foreach($products as $val)
            <tr>
                <td>{{$val->code}}</td>
                <td>{{$val->name}}</td>
                <td><img src="{{asset($val->image_one)}}"> </td>
                <td>{{$val->category->name}}</td>
                <td>{{$val->brand->name}}</td>
                <td>{{$val->qty}}</td>
                <td>{{$val->selling_price}} $</td>
                
               
    
    
                @if($val->discount_price == NULL)
                <td><span class="badge badge-pill badge-light">NO Discount</span></td>
                @else
    
                @php
                  
                  $discount = (($val->selling_price - $val->discount_price) / $val->selling_price ) * 100;
    
                    
                @endphp
                 <td class=""><span class="badge badge-pill badge-dark">{{round($discount)}} %</span></td>
    
                @endif
    
                @if($val->status == 1)
    
        <td ><span class="badge badge-success">Active</span> </td>
         
    
    
                @else
    
                <td ><span class="badge badge-danger">Inactive</span> </td>
    
    
                @endif
    
    
    
    
    
    
                <td ><a title="edit" href="{{route('admin.product.edit',$val->id)}}" class="btn btn-sm btn-info" > <i class="fa fa-edit" ></i> </a><a title="delete" href="{{route('admin.product.delete',$val->id)}}" class="btn btn-sm btn-danger" id="del" ><i class="fa fa-trash"></i></a>
    
                @if($val->status == 1)
                 
                 <a title="De Active" href="{{route('admin.product.deactive',$val->id)}}" class="btn btn-sm btn-danger" ><i class="fa fa-arrow-down"></i></a>
    
                @else
    
                <a title="Activate" href="{{route('admin.product.active',$val->id)}}" class="btn btn-sm btn-success" ><i class="fa fa-arrow-up"></i></a>
    
                @endif
    
    
                </td>
                
                
            </tr>
            @endforeach
    
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
    
    
    
    </div>
    </div>
    
    
    </section>





















@endsection