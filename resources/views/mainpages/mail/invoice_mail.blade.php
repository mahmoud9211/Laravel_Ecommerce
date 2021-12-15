<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  
  <ul>
  	<li> Invoice no: {{ $data['invoice_no'] }}  </li>
  	<li> Total Amount : {{ $data['amount'] }} </li>
  	<li> Payment Type : {{ $data['payment_method'] }} </li>
  	<li> Tracking Code : {{ $data['tracking_status'] }} </li>

  </ul>


</body>
</html>