

@extends('mainpages.master')

@section('content')

@section('title')
 
{{('Products by search')}}


@endsection



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Compare</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
    <div class="product-comparison">
		<div>
			<h1 class="page-title text-center heading-title">{{$product->count()}} result(s) for : {{request()->input('item')}}</h1>
			<div class="table-responsive">
				<table class="table compare-table inner-top-vs">

                    @foreach($product as $pro)
					<tr>
						<th>Products</th>
						<td>
							<div class="product">
								<div class="product-image">
									<div class="image">
										<a href="detail.html">
										    <img alt="" src="{{asset($pro->image_one)}}">
										</a>
									</div>

									<div class="product-info text-left">
										<h3 class="name"><a href="detail.html">{{$pro->name}}</a></h3>
										<div class="action">
										    <a class="lnk btn btn-primary" href="#">Add To Cart</a>
										</div>

									</div>
								</div>
							</div>
						</td>

						

					

					</tr>

					<tr>
						<th>Price</th>
						<td>
							<div class="product-price">
                                @if($pro->discount_price == null)
								<span class="price"> ${{$pro->selling_price}} </span>
                                @else
                                <span class="price"> ${{$pro->discount_price}}</span>
								<span class="price-before-discount">${{$pro->selling_price}}</span>
                                @endif
							</div>
						</td>

						


						
					</tr>

					<tr>
						<th>Description</th>
						<td><p class="text">{{strip_tags($pro->details)}}<p></td>
						
					</tr>

					<tr>
						 <th>Availability</th>
	                     <td><p class="in-stock">In Stock</p></td>
	                    
					</tr>

				

                    @endforeach
				</table>
			</div>
            </div>
		</div>
	</div>
</div>

@endsection