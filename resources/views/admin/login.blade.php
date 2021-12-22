<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('backend/images/favicon.ico')}}">

    <title> Admin - Log in </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">	

</head>
<body class="hold-transition theme-primary bg-gradient-primary">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
				<div class="row justify-content-center no-gutters">
					<div class="col-lg-4 col-md-5 col-12">
						<div class="content-top-agile p-10">
							<h2 class="text-white">Admin sign in Page</h2>
						</div>
						<div class="p-30 rounded30 box-shadowed b-2 b-dashed">

              @if(Session::has('error'))

              <div class="alert alert-warning" role="alert">
                {{session::get('error')}}
               </div>
 
 
              @endif


							<form action="{{route('admin.login')}}" method="post">
								@csrf
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
										</div>
										<input type="text" id="login" name="login" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email address or Phone number">

                    @error('login')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

									</div>
								</div>
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
										</div>
										<input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">

                 
									</div>

                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

								</div>
								  <div class="row">
								
									<!-- /.col -->
									<div class="col-6">
									 <div class="fog-pwd text-right">
									 	
									
									  </div>
									</div>
									<!-- /.col -->
									<div class="col-12 text-center">
									  <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
									</div>
									<!-- /.col -->
								  </div>
							</form>														

					
							
							<div class="text-center">
								<p class="mt-15 mb-0 text-white">Don't have an account? <a href="{{route('admin.register')}}" class="text ml-3" style="color: white">Sign Up</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="{{asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>	

</body>
</html>
