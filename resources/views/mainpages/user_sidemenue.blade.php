<div class="col-md-3">


	@if(optional(Auth::user())->photo == null)

	<img src="{{asset('frontend/assets/images/profile/user.jpg')}}" style="width: 220px; height : 200px;">


	@else 

	<img src="{{ asset(optional(Auth::user())->photo) }}" style="width: 220px; height : 200px;">

	@endif
<br>
<br>

<ul>

<a href="{{route('dashboard')}}" class="btn btn-primary btn-block">Home</a>
<a href="{{route('user.profile.update')}}" class="btn btn-primary btn-block">Profile Update</a>
<a href="{{route('user.change.password')}}" class="btn btn-primary btn-block">Change password</a>
<a href="{{route('user.orders')}}" class="btn btn-primary btn-block">Orders</a>
<a href="{{route('user.logout')}}" class="btn btn-danger btn-block">Logout</a>


</ul>
</div>