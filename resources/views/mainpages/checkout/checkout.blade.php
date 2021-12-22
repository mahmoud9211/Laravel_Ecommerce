@extends('mainpages.master')


@section('content')


@section('title')
Checkout
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="" class="" >
	          <span>1</span>Checkout Method
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 guest-login">
					
                <form action="{{route('checkout.proceed')}}" method="post">
                	@csrf
                  
                  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
					    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Auth::user()->name}}">
					  </div>

					  <div class="form-group">
					    <label class="info-title"  for="exampleInputEmail1">Email<span>*</span></label>
					    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Auth::user()->email}}">
					  </div>

					  <div class="form-group">
					    <label class="info-title"  for="exampleInputEmail1">Phone <span>*</span></label>
					    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Auth::user()->phone}}">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Post Code<span>*</span></label>
					    <input type="number" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="post code">
					  </div>



                 
				</div>
			
				<div class="col-md-6 col-sm-6 already-registered-login">

					<div class="form-group">
						<div class="controls">
						<label for="select"> Select Division <span class="text-danger">*</span> </label>
						<select name="country_name" id="select" class="form-control" required="" >
						
						<option value="" disabled="" selected="">Select Division</option>
						@foreach ($country as $val)
						
						<option value="{{$val->name}}">{{$val->name}}</option>
						@endforeach	
						
						
						</select>
						</div>
						</div>

       <div class="form-group">
<div class="controls">

    <label class="info-title" for="exampleInputEmail1">City<span>*</span></label>
    <input type="text" name="city" class="form-control unicase-form-control text-input" id="exampleInputEmail1">

</div>
</div>

       <div class="form-group">
<div class="controls">
<label for="select"> Address in details <span class="text-danger">*</span> </label>

<textarea name="address" required="" class="form-control"  ></textarea>

</div>
</div>

<div class="form-group">
	<label >Notes <span class="text-danger">*</span></label>
	<div class="controls">
		<textarea name="notes" required="" class="form-control"  ></textarea>  </div>
</div>







			
					  
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->

					  	<!-- checkout-step-06  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                   
                 @foreach($content as $items)

					<li><strong>Image</strong> <img src="{{asset($items->attributes->image)}}" style="width:100px;height:100px;"></li>


					<li><strong>QTY: {{$items->qty}}</strong> ||<strong>Color: {{$items->attributes->color}}</strong> || <strong>Size: {{$items->attributes->size}}</strong> || <strong>Price: $ {{$items->price}}</strong> </li>
					

				@endforeach
                     
                     @if(Session::has('coupon'.auth()->id()))
                   <li><strong>Coupon name : {{session()->get('coupon'.auth()->id())['coupon_name']}}</strong></li>
                <li><strong>Coupon discount :% {{session()->get('coupon'.auth()->id())['coupon_discount']}}</strong></li>
                <li><strong>Coupon discount amount :$ {{session()->get('coupon'.auth()->id())['coupon_discount_amount']}}</strong></li>
                <li><strong>GrandTotal :$ {{session()->get('coupon'.auth()->id())['total_amount']}}</strong></li>
					<li><strong></strong></li>

					@else
					<hr>

					 <li><strong>Subtotal : ${{$cart_total}}</strong></li>
					 <hr>
					<li><strong>Grandtotal : ${{$cart_total}}</strong></li>


					@endif

				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>






				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Select your Payment Method</h4>
		    </div>
<div class="row">

	<div class="col-md-4">

		<label>Cash </label>
		<input type="radio" name="payment_method" value = "cash">
		<img src="{{asset('frontend/assets/images/payments/12.jpg')}}" >
    
    </div>

    <div class="col-md-4">

    	<label>stripe</label>
		<input type="radio" name="payment_method" value = "stripe">
		<img src="{{asset('frontend/assets/images/payments/4.png')}}" >
  
    </div>

    <div class="col-md-4">

    	<label>card</label>
		<input type="radio" name="payment_method" value = "card">
		<img src="{{asset('frontend/assets/images/payments/3.png')}}" >
  
    </div>
<br>



</div>
<button type="submit" class="btn-upper btn btn-primary checkout-page-button" style="margin-top: 30px;">Submit</button>
		</div>

	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>

			</div><!-- /.row -->


				</form>




		</div><!-- /.checkout-box -->
</div>
</div>





@endsection
