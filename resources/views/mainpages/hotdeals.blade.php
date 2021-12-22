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
                <button data-toggle="modal" data-target="#exampleModal" id="{{$pro->id}}" class="btn btn-primary icon" onclick="productview(this.id)" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
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



   <!-- Start modal   -->

   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><strong id="pname"></strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemodal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         
      <div class="row">
       
       <div class="col-md-4">
  
        <div class="card" style="width: 18rem;">
    <img src="" id="pimg" class="card-img-top" alt="" style="width: 180px;height: 200px;">
   
  </div>
         
  
       </div>
  
        <div class="col-md-4">
  
          <ul class="list-group">
    <li class="list-group-item">Product Price : <span id="pprice"></span>
      $ <del id="oldprice"> </del> <span id="dollar">$</span> </li>
    <li class="list-group-item">Brand : <span id="brand"></span></li>
    <li class="list-group-item">Category : <span id="cat"></span></li>
    <li class="list-group-item">Product Code: <span id="code"></span></li>
      <li class="list-group-item">Stock: <span id="stock"> </span> </li>
  
  </ul>
  
       </div>
  
       <div class="col-md-4">
  
        <div class="form-group">
      <label for="color">Choose Color</label>
      <select class="form-control" id="exampleFormControlSelect1" name="color" id="color">
       
      </select>
    </div>
         
          <div class="form-group" id="sizeD">
      <label for="size">Choose Size</label>

      <select class="form-control" id="exampleFormControlSelect1" name="size" id="size">
       

      </select>
    </div>
  
    <div class="form-group">
      <label for="qty">Quantity</label>
      <input type="number" class="form-control" id="qty" value='1' min="1">
    </div>
  
    <input type="hidden" id="product_id">
  
      <button type="submit" onclick="addToCart()" class="btn btn-primary mb-2">Add to cart</button>
  
  
       </div>
  
  
  </div>
        </div>
       
      </div>
    </div>
  </div>
