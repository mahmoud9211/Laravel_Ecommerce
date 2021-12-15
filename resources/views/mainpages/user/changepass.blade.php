@extends('mainpages.master')
@section('title')
{{'Change Password'}}
@endsection
@section('content')

<div class="body-content">
    <div class="container">
    
        @php
        $user = DB::table('users')->find(Auth::id());
        @endphp
    
    
    <div class="row">
    
    <div class="col-md-3">
    
    <img class="card-img-top" src="{{(!empty($user->profile_photo_path)) ? url('uploads/'.$user->profile_photo_path) : url ('storage/noimg.png') }}" width="200px" height="200px">
    
    <ul>
    
    <a href="{{route('dashboard')}}" class="btn btn-primary btn-block">Home</a>
    <a href="" class="btn btn-primary btn-block">Profile Update</a>
    <a href="" class="btn btn-primary btn-block">Change password</a>
    <a href="" class="btn btn-primary btn-block">Orders</a>
    
    <a href="{{route('logout')}}" class="btn btn-danger btn-block">Logout</a>
    
    
    </ul>
    </div>
    
    <div class="col-md-8">
    
        <div class="card text-center">
    
           <form class="register-form outer-top-xs" method="POST" action="{{route('user.update.password')}}" >
            @csrf
            <div class="form-group">
                <label class="info-title" for="current_password">Current Password <span>*</span></label>
                <input type="password" class="form-control unicase-form-control text-input" id="current_password" name="current_password">
                  @error('current_password')
                 
                 <span class="text-input"> {{$message}} </span>
    
                  @enderror
    
            </div>
    
            <div class="form-group">
                <label class="info-title" for="password">New Password <span>*</span></label>
                <input type="password" class="form-control unicase-form-control text-input" id="password" name="password">
    
                 @error('password')
                 
                 <span class="text-input"> {{$message}} </span>
    
                  @enderror
            </div>
    
            <div class="form-group">
                <label class="info-title" for="password_confirmation">Confirm Password <span>*</span></label>
                <input type="password" class="form-control unicase-form-control text-input" id="password_confirmation" name="password_confirmation">
            </div>
            
    
            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
        </form>    
    
    
        </div>
    
    
    
    </div>
    
    <div class="col-md-1">
    
    
    
    </div>
    
    
    
    </div>
    </div>
    
    </div>

















@endsection