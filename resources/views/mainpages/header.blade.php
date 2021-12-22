<header class="header-style-1"> 

<div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="{{route('wishlist')}}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="{{route('cart.page')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            @guest
            <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Sign up / Sign in</a></li>
            @else 

            
            <li><a href="{{url('dashboard')}}"><i class="icon fa fa-user"></i>My Account</a></li>

            <li><a href="{{route('user.contact')}}"><i class="icon fa fa-user"></i>Contact</a></li>





            @endguest

          </ul>
        </div>
        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            
            

          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{url('/')}}"> <img src="{{asset('frontend/assets/images/logo.png')}}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form method="get" action="{{route('product.by.search')}}" >
              @csrf
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">

                  @php 
$categories = DB::table('categories')->get(); 
@endphp

                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories<b class="caret"></b></a>
                   
                   
                    <ul class="dropdown-menu" role="menu" >
                      @foreach($categories as $cat)
                      
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('cats',$cat->id)}}">{{$cat->name}}</a></li>
                      @endforeach
                    </ul>
                    
                  </li>
                </ul>
            
               
                <input class="search-field" name="item" id="item" value="{{request()->input('item')}}" placeholder="Search here..." />
                <button class="search-button" type="submit" ></button> </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count" id="cartQty"><span class="count"></span></div>
              <div class="total-price-basket"> <span class="lbl">cart -</span> <span class="total-price"> <span class="sign">$</span><span class="value" id="total_price"></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
                

           <div id="addmini">
           </div>

                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">Sub Total :</span><span class='price' id="total_price">$</span> </div>
                  <div class="clearfix"></div>

                
                   
                 
                  <a href="{{route('cart.page')}}" class="btn btn-upper btn-primary btn-block m-t-20" id="ctpage">Go to Cart</a>

                 

                  <a  href="{{url('/')}}" class="btn btn-upper btn-primary btn-block m-t-20" id="hmpage" >Keep Shopping</a>                <!-- /.cart-total--> 
              
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">

                <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>

               
                @foreach($categories as $cat)
                <li class="dropdown mega-menu"> 
                <a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$cat->name}}  </a>
               
                @php 
$subcategories = DB::table('subcategories')->where('cat_id',$cat->id)->get();
 @endphp
               
               
                <ul class="dropdown-menu container">
                 
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                          @foreach($subcategories as $subcat)
                          <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                           <a href="{{route('subcats',$subcat->id)}}"> <h2 class="title">{{$subcat->name}}</h2> </a>
                            <ul class="links">
                              @php 
                              $products = DB::table('products')->where('subcategory_id',$subcat->id)->get();
                              @endphp

                              @foreach($products as $pro)
                              <li><a href="{{url('/product/details').'/'.$pro->id.'/'.$pro->name}}">{{$pro->name}}</a></li>
                            @endforeach
                            </ul>
                          </div>
                          @endforeach
                          <!-- /.col -->
        
                        
                      <!-- /.yamm-content --> </li>
                      
                     
                  </ul>
                  
                </li>
                @endforeach
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
</header>