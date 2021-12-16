@extends('mainpages.master')


@section('content')


@section('title')
Cart
@endsection

<div class="body-content">
	<div class="container">
	
		<div class="row" id="full-cart">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item" style="text-align: center;">Product Image</th>
					<th class="cart-description item" style="text-align: center;">Name</th>
					<th class="cart-product-name item"style="text-align: center;">color</th>
					<th class="cart-edit item" style="text-align: center;">size</th>
					<th class="cart-qty item" style="text-align: center;">Quantity</th>
					<th class="cart-sub-total item" style="text-align: center;">Unit Price</th>
					<th class="cart-total last-item" style="text-align: center;">Remove</th>
				</tr>
				
			</thead>
			<tbody id="cartpage">

				

				
				
				
			</tbody>
		</table>
	</div>
</div>
</div>

<div class="col-md-4 col-sm-12 estimate-ship-tax">
</div>




<div class="col-md-4 col-sm-12 estimate-ship-tax">

	@if(Session::has('coupon'.auth()->id()))

	@else
	<table class="table" id="couponField">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Discount Code</span>
					<p>Enter your coupon code if you have one..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_id">
						</div>
						<div class="clearfix pull-right">
							<button type="submit" onclick="applyCoupon()" class="btn-upper btn btn-primary">APPLY COUPON</button>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
	@endif
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead id="calc">
			



		</thead>
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a type="submit" href="{{route('checkout')}}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			




</div>

<div class="empty-cart" style="display:none">

<h1  class="text-danger" style="text-align: center">Your cart is empty! </h1>

<div>

	<img src="{{asset('frontend/assets/images/shopping_cart.jpg')}}" style="margin-left: 350px;width:400px;height:400px;">
	<br>
	<div>
<a href="{{url('/')}}" class="btn btn-warning" style="margin-left:500px;"> continue shopping </a>
</div>

</div>




</div>






















@endsection