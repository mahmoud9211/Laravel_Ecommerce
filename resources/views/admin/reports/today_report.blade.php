@extends('admin.master_admin')

@section('title')
{{'Today Orders'}}
@endsection

@section('content')

<section class="content">
    <div class="row">
    <div class="col-md-12">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Today Orders</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Payment Type</th>
                <th>Transaction id</th>
                <th> Total </th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
               
            </tr>
        </thead>
        <tbody>
    
            @foreach($orders as $val)
            <tr>
                <td>{{$val->payment_type}}</td>
                <td>{{$val->transaction_id}}</td>
                <td>${{$val->amount}} </td>
                <td>{{$val->order_date}}</td>
                 @if($val->status == 0)
                <td><span class="badge badge-danger">Pending</span></td>
                @elseif($val->status == 1)
          <td scope="col"> <span class="badge badge-success"> Payment Accepted </span> </td>
          @elseif($val->status == 2)
          <td scope="col"> <span class="badge badge-warning"> In Progress </span> </td>
          @elseif($val->status == 3)
          <td scope="col"><span class="badge badge-primary"> Delivered </span> </td>
          @else
          <td scope="col"><span class="badge badge-dark"> Cancelled </span> </td>
          @endif

                <td ><a title="edit" href="{{route('admin.order.details',$val->id)}}" class="btn btn-sm btn-info" >View </a>
    
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