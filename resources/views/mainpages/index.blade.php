@extends('mainpages.master')


@section('content')


@section('title')
 Home Page
@endsection



      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        @include('mainpages.sidebar')
        <!-- ================================== TOP NAVIGATION ================================== -->
    
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->



       @include('mainpages.hotdeals')
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->


       @include('mainpages.special_offers')
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->


        




        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
            <form method="post" action="{{url('/subscripe')}}">
              @csrf
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="subscription_email" placeholder="Subscribe to our newsletter">

                @error('email')

          <span class="text-danger"> {{$message}} </span>

                @enderror

              </div>
              <button class="btn btn-primary" type="submit" class="btn btn-primary">Subscribe</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
   
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        <div class="home-banner"> <img src="{{asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

        @php 
        $slider = \App\Models\brand::where('slider_status',1)->latest()->limit(3)->get();
        @endphp

     @foreach ($slider as $s)
            <div class="item" style="background-image: url({{asset($s->slider)}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">Top Brands</div>
                  <div class="big-text fadeInDown-1"> {{$s->name}}  </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span></span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="{{url('brands/products'.'/'.$s->id.'/'.$s->name)}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>

            @endforeach
            <!-- /.item -->
            
            
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
   
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">New Products</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              @php 
$categories = DB::table('categories')->get(); 
@endphp
                   @foreach($categories as $cat)
              <li><a data-transition-type="backSlide" href="#{{$cat->id}}" data-toggle="tab">{{$cat->name}}</a></li>
              @endforeach
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
           
            <div class="tab-pane in active" id="all">

              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @php 
                    $products = DB::table('products')->where('status',1)->get();
                    @endphp

                    @foreach($products as $pro )
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image"> 
                          <div class="image">
                         

                              <a href="{{url('/product/details').'/'.$pro->id.'/'.$pro->name}}"><img  src="{{$pro->image_one}}" style="width: 170px;height:160px;" alt=""></a>
                            </div>

                     @if($pro->discount_price == null)
                       <div class="tag new"><span> new </span></div>
                      
                     @else
              @php 
           $discount = (($pro->selling_price - $pro->discount_price ) / $pro->selling_price) * 100;
              @endphp

                

                     <div class="tag new"><span> % {{round( $discount)}} </span> </div>

@endif
                        
                        </div>
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('/product/details').'/'.$pro->id.'/'.$pro->name}}">{{$pro->name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> 
                            @if($pro->discount_price == null)
  
                          <span class="price"> {{$pro->selling_price}} </span> 

                          @else
                           <span class="price">{{$pro->discount_price}}  </span>

                         <span class="price-before-discount"> ${{$pro->selling_price}} </span>  
                         @endif
                         </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <form method="get" action="{{route('wishlist.add')}}">
                          @csrf
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">

                                <button data-toggle="modal" data-target="#exampleModal" id="{{$pro->id}}" class="btn btn-primary icon" onclick="productview(this.id)" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>

                           
                           
                           <input type="hidden" name="id" value="{{$pro->id}}">
                              <button type="submit"  class="btn btn-primary icon"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button> 
                              

                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                      </form>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
              
                  
                  @endforeach
                  
                </div>
               
              </div>
           
            </div>

            @foreach($categories as $val)
            <div class="tab-pane" id="{{$val->id}}">

              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                   @php
       $probycat = DB::table('products')->where('category_id',$val->id)->where('status',1)->get();
            @endphp
                  @foreach($probycat as $pro)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{url('/product/details').'/'.$pro->id.'/'.$pro->name}}"><img  src="{{asset($pro->image_one)}}" style="width: 170px;height:160px;"  alt=""></a> </div>
 
                      @if($pro->discount_price == NULL) <div class="tag new"><span> new </span></div>
                      
                      @else 

                     @php
              
                $discount = (($pro->selling_price - $pro->discount_price) / $pro->selling_price ) * 100;

                
                     @endphp

                     <div class="tag new"><span> %{{round($discount)}} </span> </div>

                      @endif

                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('/product/details').'/'.$pro->id.'/'.$pro->name}}">{{$pro->name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> ${{$pro->selling_price}} </span> 
                         @if($pro->discount_price == NULL) <span class="price-before-discount"> No Dsicount </span>
                         @else <span class="price-before-discount"> ${{$pro->discount_price}} </span>  
                         @endif
                         </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>

                  
            
                  @endforeach
                  
                </div>

              </div>
           
            </div>
            @endforeach

           
            
           

            




          </div>


          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner1.jpg')}}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner2.jpg')}}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        
   @php 
   $featured = DB::table('products')->where('status',1)->where('mid_slider',1)->latest()->limit(8)->get();
   @endphp


         @foreach($featured as $f)
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="{{asset($f->image_one)}}" alt=""></a> </div>
                    <!-- /.image -->
                    
                    @if($f->discount_price == null)
                    <div class="tag new"><span> new </span></div>
                   
                  @else
           @php 
        $discount = (($f->selling_price - $f->discount_price ) / $f->selling_price) * 100;
           @endphp

             

                  <div class="tag new"><span> % {{round( $discount)}} </span> </div>

@endif

                      


                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html"> {{$f->name}}
                    </a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price">
                      @if($f->discount_price == null)
                       <span class="price"> ${{$f->selling_price}} </span> 
                       @else
                       <span class="price-before-discount"> ${{$f->selling_price}} </span>
                       <span class="price"> ${{$f->discount_price}} </span>
                      @endif
                   </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                        
                         <button data-toggle="modal" data-target="#exampleModal" id="" class="btn btn-primary icon"  type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                         

                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>

            @endforeach
            <!-- /.item -->
            

            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>


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


<!-- End modal   -->













        
 



        









        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== BEST SELLER ============================================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">

              @php 
     
              $best_seller = \App\Models\order_item::with('product')->groupBy('product_id')->limit(8)->get();
         
              @endphp


              @foreach($best_seller as  $b)
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{url('/product/details').'/'.$b->product->id.'/'.$b->product->id}}"> <img src="{{asset($b->product->image_one)}}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{url('/product/details').'/'.$b->product->id.'/'.$b->product->id}}">{{$b->product->name}}</a></h3>
                            
                            <div class="product-price"> <span class="price"> 
                              @if($b->product->discount_price == null)
                              $ {{$b->product->selling_price}}
                              @else 
                              $ {{$b->product->discount_price}}
                              @endif

                            </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
  
                 
                </div>
              </div>
              @endforeach
  
  
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
  
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
   
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
@endsection