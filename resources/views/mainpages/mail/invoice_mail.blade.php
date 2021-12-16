<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  
  <ul>
  	<li> Invoice no: {{ $data['invoice_no'] }}  </li>

	  @if(Session::has('coupon'.auth()->id()))
	  <li> Payment Type : $ {{session()->get('coupon'.auth()->id())['total_amount']}} </li>
	  @else

  	<li> Total Amount : $ {{ $data['amount'] }} </li>

	  @endif
  	<li> Payment Type : {{ $data['payment_method'] }} </li>
   
  	<li> Tracking Code : {{ $data['tracking_status'] }} </li>

  </ul>


</body>
</html>