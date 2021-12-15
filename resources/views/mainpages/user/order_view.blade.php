@extends('mainpages.master')

@section('title')
{{'orders'}}
@endsection

@section('content')

<div class="body-content">
<div class="container">

<div class="row">

<div class="col-md-3">


	

<ul>

<a href="{{route('dashboard')}}" class="btn btn-primary btn-block">Home</a>
<a href="" class="btn btn-primary btn-block">Profile Update</a>
<a href="{{route('user.change.password')}}" class="btn btn-primary btn-block">Change password</a>
<a href="{{'user.orders'}}" class="btn btn-primary btn-block">Orders</a>
<a href="{{route('user.logout')}}" class="btn btn-danger btn-block">Logout</a>


</ul>
</div>

<div class="col-md-4">
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Phone : {{$order->phone}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">Email : {{$order->email}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">country : {{$order->country}}</th>
          
        </tr>
    
         <tr>
          <th scope="col">city : {{$order->city}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">Address : {{$order->address}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">Post Code : {{$order->post_code}} </th>
          
        </tr>
    
         <tr>
          <th scope="col">Order Date : {{$order->order_date}} </th>
          
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    
    
    
    
    
    
    
    
    
    </div>
    
    
    
    <div class="col-md-4">
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name : {{$order->name}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">Payment type : {{$order->payment_type}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">Transaction ID : {{$order->transaction_id}} </th>
          
        </tr>
    
         <tr>
          <th scope="col">Invoice no : {{$order->invoice_no}} </th>
          
        </tr>
    
        <tr>
          <th scope="col">Total : $ {{$order->amount}}</th>
          
        </tr>
    
        <tr>
            @if($order->status == 0)
          <th scope="col">Status : <span class="badge badge-danger"> Pendeng </span> </th>
          @elseif($order->status == 1)
          <th scope="col">Status : <span class="badge badge-success"> Payment Accepted </span> </th>
          @elseif($order->status == 2)
          <th scope="col">Status : <span class="badge badge-warning"> In Progress </span> </th>
          @elseif($order->status == 3)
          <th scope="col">Status : <span class="badge badge-primary"> Delivered </span> </th>
          @else
          <th scope="col">Status : <span class="badge badge-dark"> Cancelled </span> </th>
          @endif
          
        </tr>
    
        
      </thead>
      <tbody>
        
      </tbody>
    </table>
    
    
    
    
    
    
    
    
    
    </div>
    
    <div class="col-md-1">
    
    
    
    </div>
    
    
    <div class="col-md-10">
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Code</th>
          <th scope="col">Color</th>
          <th scope="col">Size</th>
          <th scope="col">Qty</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>
         @foreach( $order_items as $order_det)
        <tr>
          
          <td><img src= "{{asset($order_det->product->image_one)}}" style="width:100px;height:110px;"></td>
         <td>{{$order_det->product->name}}</td>
         <td>{{$order_det->product->code}}</td>
          <td>{{$order_det->color}}</td>
          <td>{{$order_det->size}}</td>
           <td>{{$order_det->qty}}</td>
            <td>${{$order_det->price}}</td>
    
          
          
     
        </tr>
       @endforeach
      </tbody>
    </table>
    
    
    
    
    
    </div>

</div>
</div>

</div>























@endsection