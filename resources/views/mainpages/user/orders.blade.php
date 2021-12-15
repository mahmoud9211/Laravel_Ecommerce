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



<div class="col-md-8">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Total</th>
          <th scope="col">Payment</th>
          <th scope="col">Invoice</th>
          <th scope="col">Status</th>
          <th scope="col" style="width: 30%;">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach($orders as $order)
        <tr>
          
          <td>{{$order->order_date}}</td>
          <td>${{$order->amount}}</td>
          <td>{{$order->payment_method}}</td>
          <td>{{$order->invoice_no}}</td>

          @if($order->status == 0)
          <td><span class="badge badge-danger">Pending</span></td>
          @elseif($order->status == 1)
    <td scope="col"> <span class="badge badge-success"> Payment Accepted </span> </td>
    @elseif($order->status == 2)
    <td scope="col"> <span class="badge badge-warning"> In Progress </span> </td>
    @elseif($order->status == 3 && $order->return_status == 0)
    <td scope="col"><span class="badge badge-success"> Delivered </span> 
      <span class="badge badge-info"> Your return request is sent </span> </td>

      @elseif($order->status == 3 && $order->return_status == 1)
      <td scope="col"><span class="badge badge-success"> Delivered </span> 
        <span class="badge badge-info"> Your return request is Accepted </span> </td>

        @elseif($order->status == 3 && $order->return_status == 2)
        <td scope="col"><span class="badge badge-success"> Delivered </span> 
          <span class="badge badge-info"> Your return request is Rejected </span> </td>

    @elseif($order->status == 3)
    <td scope="col"><span class="badge badge-success"> Delivered </span> </td>
   
    @else
    <td scope="col"><span class="badge badge-dark"> Cancelled </span> </td>
    @endif
          <td><a href="{{route('user.order.view',$order->id)}}" title="view" class="btn btn-primary"><i class="fa fa-eye"></i></a>

            @if($order->status == 3)
              <a target="blank" href="{{route('user.invoice.download',$order->id)}}" title="download invoice" class="btn btn-info"><i class="fa fa-download"></i></a>
              @else
              @endif
                 
              @if($order->status == 0)
              <a href="{{route('user.order.cancel',$order->id)}}" class="btn btn-danger">Cancel Order</a>
               @elseif($order->status == 3 && $order->order_return == 0)
               <a href="" class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
               data-toggle="modal" data-target="#return{{$order->id}}">Return Order Request</a>
               @else 
               @endif

              

          </td>



         


        </tr>

        <div class="modal" id="return{{$order->id}}">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content modal-content-demo">
          <div class="modal-header">
          <h6 class="modal-title">Order Return Request</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
          
          
          <form  action="{{route('user.order.return.request',$order->id)}}"  method="post">
          
          @csrf
          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
              <input type="hidden" value="{{$order->id}}" name="id">
          <label for="exampleInputEmail1">Reasons about your request</label>
          <textarea class="form-control" name="return_reason"> </textarea>
        </div>
          </div>
          
        
          
          <div class="modal-footer">
          <button class="btn ripple btn-primary" type="submit">Send</button>
          <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Cancel</button>
          </div>
          
          
          </form>
          
          
          
          </div>
          
          </div>
          </div>
          </div>


        @endforeach
      </tbody>
    </table>	
    
    
    
    </div>
    
    <div class="col-md-1">
    
    
    
    </div>
    
    
    
    </div>
    </div>
    
    </div>
    
    
    









@endsection