@extends('admin.master_admin')

@section('title')
{{'Create User'}} 
@endsection

@section('content')

<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="d-flex align-items-center">
    <div class="mr-auto">
    <h3 class="page-title">Edit User</h3>
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
    <h4 class="box-title">Edit User</h4>
    
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div class="row">
    <div class="col">
    <form method="post" action="{{route('admin.update.user',$user->id)}}" >
    @csrf
    
    <div class="row">
    <div class="col-12">
    
    <div class="row"> <!-- first col start !-->
    
    
    <div class="col-6">
    
    <div class="form-group">
          <div class="controls">
        <label for="select"> Name <span class="text-danger">*</span> </label>
            <input type="text" name="name" class="form-control" value="{{$user->name}}"  > </div>
    
    


@error('name')

<span class="text-danger">{{$message}} </span>

@enderror
    


    </div>
    </div>
    
    
    
    
    <div class="col-6">
    
    
    <div class="form-group">
          <div class="controls">
        <label for="select"> Email <span class="text-danger" >*</span> </label>

        <input type="text" name="email" class="form-control" value="{{$user->email}}"  > 

        
        @error('email')

        <span class="text-danger">{{$message}} </span>
        
        @enderror

    </div>
    </div>
    
    
    
    
    </div>
    
    </div>
    <div class="row">
    <div class="col-6">
    
    <div class="form-group">
          <div class="controls">
        <label for="select"> Password <span class="text-danger">*</span> </label>
        <input type="password" name="password" class="form-control" value="{{$user->password}}"  > 


        @error('password')

        <span class="text-danger">{{$message}} </span>
        
        @enderror

    </div>
    </div>
    
    
    
    
    </div>
    
    
    
    
    
    
    <div class="col-6">
    <div class="form-group">
        <label >Phone <span class="text-danger">*</span></label>
        <div class="controls">
            <input type="text" name="phone" class="form-control" value="{{$user->phone}}"  > </div>

            @error('phone')

            <span class="text-danger">{{$message}} </span>
            
            @enderror
    </div>
    </div>

  

   


    
    
    
    
    </div> 
    
    
    

    
 
    

    

    <hr>
    
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_1" name="categories" value="1" {{$user->categories == 1 ? 'checked' : ''}}>
                    <label for="checkbox_1">categories</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_2" name="products" value="1" {{$user->products == 1 ? 'checked' : ''}}>
                    <label for="checkbox_2">products</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_3" name="reports" value="1" {{$user->reports == 1 ? 'checked' : ''}}>
                    <label for="checkbox_3">reports</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_8" name="contact_messages" value="1" {{$user->contact_messages == 1 ? 'checked' : ''}}>
                    <label for="checkbox_8">contact_messages</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_9" name="status" value="1" {{$user->status == 1 ? 'checked' : ''}}>
                    <label for="checkbox_9">status</label>
                </fieldset>
                
    </div>
    </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_4" name="coupon" value="1" {{$user->coupon == 1 ? 'checked' : ''}}>
                    <label for="checkbox_4">coupon</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_5" name="orders" value="1" {{$user->orders == 1 ? 'checked' : ''}}>
                    <label for="checkbox_5">orders</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_6" name="user_roles" value="1"  {{$user->user_roles == 1 ? 'checked' : ''}}>
                    <label for="checkbox_6">user_roles</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_7" name="order_return_request" value="1" {{$user->order_return_request == 1 ? 'checked' : ''}}>
                    <label for="checkbox_7">order_return_request</label>
                </fieldset>
                
    </div>
    </div>
    
    </div>
    </div>
    <div class="text-xs-right">
    <button type="submit" class="btn btn-rounded btn-info">Add User</button>
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




















@endsection