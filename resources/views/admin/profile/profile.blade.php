@extends('admin.master_admin')

@section('title')
{{'profile'}}
@endsection
@section('content')


			
     
		  
       
  
  
  <!-- Content Wrapper. Contains page content -->
  
		
         
		
			  <div class="col-12">
				  


				  

					  <div class="box-body text-center pb-50">
						<a href="#">

							
      @if(Auth::guard('admin')->user()->photo == null)

      <img src="{{asset('frontend/assets/images/profile/noimg.png')}}" style="width: 200px;height:200px;">

      @else 

      <img src="{{ asset(Auth::guard('admin')->user()->photo) }}" style="width: 200px;height:200px;">

      @endif

						</a>
						<h4 class="mt-2 mb-0"><a class="hover-primary text-white glyphicon glyphicon-user" href="#">{{($admin->name) }}</a></h4>
						<span><i class="glyphicon glyphicon-envelope"></i>{{$admin->email}} </span>
						<div>	<a href="{{route('admin.profile.edit')}}" class="btn btn-success"> Edit Profile </a> </div>

					  </div>

					
					</div>	

					
					
				 
				 

@endsection				