@extends('mainpages.master')


@section('content')


@section('title')
Cash On Delivery
@endsection





<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Shopping Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                   

                     
                     @if(Session::has('coupon'.auth()->id()))
                     <li><strong>Sub Total : $ {{$subtotal}}</strong></li>
                     <hr>
                   <li><strong>Coupon name : {{session()->get('coupon'.auth()->id())['coupon_name']}}</strong></li>
                   <hr>
                <li><strong>Coupon discount :% {{session()->get('coupon'.auth()->id())['coupon_discount']}}</strong></li>
                <hr>
                <li><strong>Coupon discount amount :$ {{session()->get('coupon'.auth()->id())['discount_amount']}}</strong></li>
                <hr>
                <li><strong>GrandTotal :$ {{session()->get('coupon'.auth()->id())['total_amount']}}</strong></li>
					<li><strong></strong></li>

					@else
					<hr>

					 <li><strong>Subtotal : ${{$subtotal}}</strong></li>
					 <hr>
					<li><strong>Grandtotal : ${{$subtotal}}</strong></li>


					@endif

				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>






				<div class="col-md-6">


<form action="{{route('cash.payment')}}" method="post" id="payment-form">
                            @csrf
                        <div class="form-row">
                            <label for="card-element">
                                  <img src="{{asset('frontend/assets/images/payments/14.jpg')}}" >

                            </label>

                            <input type="hidden" name="name" value="{{$data['shipping_name']}}"> 
                            <input type="hidden" name="email" value="{{$data['shipping_email'] }}">
                            <input type="hidden" name="phone" value="{{$data['shipping_phone'] }}">
                            <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                            <input type="hidden" name="notes" value="{{$data['notes'] }}">
                            <input type="hidden" name="country" value="{{$data['country'] }}">
                            <input type="hidden" name="city" value="{{$data['city'] }}">
                            <input type="hidden" name="address" value="{{$data['address'] }}">
                           
                             
                            <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <br>
                        <button class="btn btn-primary">Submit Payment</button>
                        </form>




			</div>

			</div><!-- /.row -->


				</form>




		</div><!-- /.checkout-box -->
</div>
</div>
















@endsection
