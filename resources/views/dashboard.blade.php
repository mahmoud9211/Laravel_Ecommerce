@extends('mainpages.master')

@section('title')
{{'Dashboard'}}
@endsection

@section('content')

<div class="body-content">
<div class="container">

<div class="row">

@include('mainpages.user_sidemenue')

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