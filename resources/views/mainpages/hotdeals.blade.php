<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">hot deals</h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

      @php 
     $hotdeals = DB::table('products')->where('status',1)->where('hot_deal',1)->
     where('discount_price','!=',null)->latest()->limit(3)->get();
      @endphp
   
   @foreach($hotdeals as $pro)
      <div class="item">
        <div class="products">
          <div class="hot-deal-wrapper">
            <div class="image"> <img src="{{asset($pro->image_one)}}" alt=""> </div>

            @php 
            $discount = (($pro->selling_price - $pro->discount_price) / $pro->selling_price) * 100;
            @endphp

            <div class="sale-offer-tag"><span>{{round($discount)}}%<br>
              off</span></div>
     
          </div>
          <!-- /.hot-deal-wrapper -->
          
          <div class="product-info text-left m-t-20">
            <h3 class="name"><a href="{{url('/product/details').'/'.$pro->id.'/'.$pro->name}}">{{$pro->name}}</a></h3>
            <div class="rating rateit-small"></div>
            <div class="product-price"> <span class="price"> ${{$pro->discount_price}} </span> <span class="price-before-discount">${{$pro->selling_price}}</span> </div>
            <!-- /.product-price --> 
            
          </div>
          <!-- /.product-info -->
          
          <div class="cart clearfix animate-effect">
            <div class="action">
              <div class="add-cart-button btn-group">
                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
              </div>
            </div>
            <!-- /.action --> 
          </div>
          <!-- /.cart --> 
        </div>
      </div>
 
      @endforeach
  
    </div>
    <!-- /.sidebar-widget --> 
  </div>