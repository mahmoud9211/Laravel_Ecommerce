@extends('admin.master_admin')

@section('title')
{{'Coupons'}}
@endsection

@section('content')


<div class="row">
    <div class="col-md-8">
    <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Coupons</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Coupon Name</th>
                <th>Coupon Discount (%)</th>
                <th>Validity</th>
                <th>Status</th>
                <th width="30%">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($coupons as $val)
            <tr>
                <td>{{$val->coupon_name}}</td>
         <td>% {{$val->coupon_discount}}</td>
                <td>{{Carbon\Carbon::parse($val->validity)->format('D, d F Y')}}</td>
    
    
    
               @if($val->validity >= Carbon\Carbon::now()->format('Y-m-d'))
    
               <td><span class="badge badge-success">Valid</span></td>
    
    
               @else
    
               <td><span class="badge badge-danger ">Invalid</span></td>
    
               @endif
    
    
    
                <td>
         
                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
            data-toggle="modal" data-target="#edit{{$val->id}}" ><i class="fa fa-edit"></i></a>
  
            <a class=" btn btn-sm btn-danger" data-effect="effect-scale"
            href="{{route('admin.coupon.delete',$val->id)}}" id="del"><i class=" fa fa-trash"></i></a>
    
             
                </td>
                
            </tr>

            
        <div class="modal" id="edit{{$val->id}}">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
            <div class="modal-header">
            <h6 class="modal-title">Coupon update</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            
            
            <form  action="{{route('admin.coupon.update')}}"  method="post">
            
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Coupon Name</label>
                <input type="text" name ="coupon_name" class="form-control" value="{{$val->coupon_name}}">
              <input type="hidden" name="id" value="{{$val->id}}">
              </div>
              
              
            
             <div class="form-group">
                <label for="exampleFormControlTextarea1">Discount(%)</label>
                    <input type="text"  name ="coupon_discount" class="form-control" value="{{$val->coupon_discount}}">
        
              </div>
            
               <div class="form-group">
                <label for="exampleFormControlTextarea1">Validity</label>
                    <input type="date"  name ="validity" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" value="{{$val->validity}}">
            @error('validity')
                 
                 <span class="text-danger"> {{$message}} </span>
            
               @enderror
              </div>

              <div class="modal-footer">
                <button class="btn ripple btn-primary" type="submit">Update</button>
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
    </div>
    </div>
    </div>
    
    
    <div class="col-md-4">
    
        <div class="box">
    <div class="box-header with-border">
    <h3 class="box-title">Add Coupon</h3>
    </div>
    <div class="box-body">
        
    
    <form action= "{{route('admin.coupon.store')}}" method="post">
      @csrf
      <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        <input type="text" name ="coupon_name" class="form-control">
    
        @error('coupon_name')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>
      
      
    
     <div class="form-group">
        <label for="exampleFormControlTextarea1">Discount(%)</label>
            <input type="text"  name ="coupon_discount" class="form-control">
    @error('coupon_discount')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>
    
       <div class="form-group">
        <label for="exampleFormControlTextarea1">Validity</label>
            <input type="date"  name ="validity" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
    @error('validity')
         
         <span class="text-danger"> {{$message}} </span>
    
       @enderror
      </div>
    
    
      <div>
    <a href=""><button type="submit" class="btn btn-info">Add Coupon</button> </a>
      </div>
    
    </form>
    
    
    
    </div>
    </div>
    </div>
    </div>
    </div>
    
    
    </section>





















@endsection