@extends('admin.master_admin')

@section('title')
{{'dashboard'}}
@endsection

@section('content')


<div class="container-full">

<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-xl-2 col-6">
<div class="box overflow-hidden pull-up">
<div class="box-body">							
<div class="icon bg-primary-light rounded w-60 h-60">
<i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
</div>
<div>

	@php 
$total = DB::table('orders')->get()->count();
	@endphp

<p class="text-mute mt-20 mb-0 font-size-16">Total Orders</p>
<h3 class="text-white mb-0 font-weight-500">{{$total}} </h3>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-6">
<div class="box overflow-hidden pull-up">
<div class="box-body">							
<div class="icon bg-warning-light rounded w-60 h-60">
<i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
</div>
<div>

	@php 
	$pending = DB::table('orders')->where('status',0)->get()->count();
		@endphp

<p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
<h3 class="text-white mb-0 font-weight-500">{{$pending}} </h3>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-6">
<div class="box overflow-hidden pull-up">
<div class="box-body">							
<div class="icon bg-info-light rounded w-60 h-60">
<i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
</div>
<div>

	@php 
	$progress = DB::table('orders')->where('status',1)->where('status',2)->get()->count();
		@endphp

<p class="text-mute mt-20 mb-0 font-size-16">Orders in Progress</p>
<h3 class="text-white mb-0 font-weight-500"> {{$progress}} </h3>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-6">
<div class="box overflow-hidden pull-up">
<div class="box-body">							
<div class="icon bg-danger-light rounded w-60 h-60">
<i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
</div>
<div>

	@php 
	$Cancelled = DB::table('orders')->where('status',4)->get()->count();
		@endphp

<p class="text-mute mt-20 mb-0 font-size-16">Cancelled Orders</p>
<h3 class="text-white mb-0 font-weight-500">{{$Cancelled}} </h3>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-6">
<div class="box overflow-hidden pull-up">
<div class="box-body">							
<div class="icon bg-success-light rounded w-60 h-60">
<i class="text-success mr-0 font-size-24 mdi mdi-phone-outgoing"></i>
</div>
<div>

	@php 
	$done = DB::table('orders')->where('status',3)->get()->count();
		@endphp


<p class="text-mute mt-20 mb-0 font-size-16">Orders Done</p>
<h3 class="text-white mb-0 font-weight-500">{{$done}} </h3>
</div>
</div>
</div>
</div>






</div>
</section>
<!-- /.content -->
</div>

@endsection