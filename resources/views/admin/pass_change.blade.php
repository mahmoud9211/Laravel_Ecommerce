@extends('admin.master_admin')
@section('content')

@section('title')
{{'Change Password'}}
@endsection

<div class="card">
    <div class="card-body">

        <h4> Change Password </h4>
<br>
<br>

@if(Session::has('error'))

<div class="alert alert-warning" role="alert">
  {{session::get('error')}}
 </div>


@endif

<form action= "{{route('admin.Passwordchange')}}" method="post">
  @csrf
  <div class="form-group">
    <label for="current_password">Current Password</label>
    <input type="password" name="oldpass" class="form-control" id="current_password" >

      @error('oldpass')
     
     <span class="text-danger"> {{$message}} </span>

    @enderror

  </div>
  
   <div class="form-group">
    <label for="password">New Password</label>
    <input type="password" name="password" class="form-control" id="password">

     @error('password')
     
     <span class="text-danger"> {{$message}} </span>

    @enderror

  </div>
  
 

  <div class="form-group">
    <label for="password_confirmation">Confirm New Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >

  </div>


  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>

</form>

    </div>
</div>
















@endsection