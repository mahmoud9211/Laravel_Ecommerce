@extends('mainpages.master')

@section('title')
{{'Profile Update'}}
@endsection

@section('content')


<div class="body-content">
<div class="container">

<div class="row">

    @include('mainpages.user_sidemenue')


<div class="col-md-8">

	<div class="card text-center">

       <form class="register-form outer-top-xs" method="POST" action="{{route('user.profile.update.process')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="info-title" for="email">Email <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="email" name="email" value="{{optional(Auth::user())->email}}" required >
        </div>
        <div class="form-group">
            <label class="info-title" for="name">Name <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="name" name="name" value="{{optional(Auth::user())->name}}" required  >
        </div>

        <div class="form-group">
            <label class="info-title" for="phone">Phone <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" id="phone" name="phone" value="{{optional(Auth::user())->phone}}" required  >
        </div>

        <div class="form-group">
            <label class="info-title" for="profile_photo_path">Photo <span>*</span></label>
            <input type="file" class="form-control unicase-form-control text-input"  name="photo">
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