@extends('mainpages.master')


@section('content')


@section('title')
Stripe
@endsection

<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>



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
                <li><strong>Coupon discount amount :$ {{session()->get('coupon'.auth()->id())['coupon_discount_amount']}}</strong></li>
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


<form action="{{route('stripe.payment')}}" method="post" id="payment-form">
                            @csrf
                        <div class="form-row">
                            <label for="card-element">
                            Credit or debit card
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


<script type="text/javascript">
    // Create a Stripe client.
var stripe = Stripe('pk_test_51JcSoMAiUUkaE9KMJFwx1N0TN5V7oDDgyS8kXHtXSsZb6dVDLLQrPQOdQGShd2agGhdwQepbbHRN3U9gJ2xrVlq100lqCk7KCM');
// Create an instance of Elements.
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};
// Create an instance of the card Element.
var card = elements.create('card', {style: style});
// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');
// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});
// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});
// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);
  // Submit the form
  form.submit();
}
</script>














@endsection
