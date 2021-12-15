@extends('mainpages.master')

@section('title')
{{'Dashboard'}}
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
<a href="{{route('user.orders')}}" class="btn btn-primary btn-block">Orders</a>
<a href="{{route('user.logout')}}" class="btn btn-danger btn-block">Logout</a>


</ul>
</div>

<div class="col-md-8">

	<div class="card text-center">
		<h3> Hi <span class="text-danger">{{optional(Auth::user())->name}}</span> to the dashboard page! </h3>

	</div>



</div>

<div class="col-md-1">



</div>



</div>
</div>

</div>











@endsection