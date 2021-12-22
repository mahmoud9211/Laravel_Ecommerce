@extends('mainpages.master')

@section('content')


<div class="breadcrumb">
  <div class="container">
    <div class="breadcrumb-inner">
    
    </div>
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'> 
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('mainpages.sidebar')
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter"> 


       @php
       
       $cat = DB::table('categories')->get();

       @endphp   	
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">shop by</h3>
              <div class="widget-header">
                <h4 class="widget-title">Category</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">

                	@foreach($cat as $val)
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#{{$val->id}}" data-toggle="collapse" class="accordion-toggle collapsed">

                  {{$val->name}} 
                 
                 </a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="{{$val->id}}" style="height: 0px;">

                    	@php
       $subcat = DB::table('subcategories')->where('cat_id',$val->id)->get();
                    	@endphp
                     @foreach( $subcat as $sub)
                      <div class="accordion-inner">
                        <ul>
                      <a href="{{route('subcats',$sub->id)}}">   	{{$sub->name}}
                      
                          </a></li>
                         
                        </ul>
                      </div>
                      @endforeach
                      <!-- /.accordion-inner --> 
                    </div>
                    <!-- /.accordion-body --> 
                  </div>

                  @endforeach
                  <!-- /.accordion-group -->
  
                  
                </div>
                <!-- /.accordion --> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>
           
            
 
            
            <!-- ============================================== Testimonials: END ============================================== -->
            
          </div>
          <!-- /.sidebar-filter --> 
        </div>
        <!-- /.sidebar-module-container --> 
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{{asset('frontend/assets/images/banners/cat-banner-1.jpg')}}" alt="" class="img-responsive"> </div>
            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> Big Sale </div>
                <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </div>
              </div>
              <!-- /.caption --> 
            </div>
            <!-- /.container-fluid --> 
          </div>
        </div>
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                </ul>
              </div>
              <!-- /.filter-tabs --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
         
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-3 col-md-6 no-padding">

                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">



                	@foreach($products as $val)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{url('/product/details').'/'.$val->id.'/'.$val->name}}"><img  src="{{asset($val->image_one)}}" alt=""></a> </div>
                          <!-- /.image -->
                          @if($val->discount_price == NULL )
                          <div class="tag new"><span>new</span></div>
                          @else
                           @php
                       $discount = (($val->selling_price - $val->discount_price) / $val->selling_price) * 100;
                      @endphp
                     <div class="tag hot">
                      <span>%{{round($discount)}}</span></div>

                      @endif





                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{url('/product/details').'/'.$val->id.'/'.$val->name}}">{{$val->name}}</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price">
                            @if($val->discount_price == NULL)

                     <span class="price"> ${{$val->selling_price}} </span>
                      @else
                     <span class="price"> ${{$val->discount_price}} </span> <span class="price-before-discount">$ {{$val->selling_price}}</span> 
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

                                <button data-toggle="modal" data-target="#exampleModal" id="{{$val->id}}" class="btn btn-primary icon" onclick="productview(this.id)" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>

                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>


                                


                              </li>

                           
                           
                           <input type="hidden" name="id" value="{{$val->id}}">
                              <button type="submit"  class="btn btn-primary icon"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button> 
                              
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
                  <!-- /.item -->
                  @endforeach


                  <!-- /.item -->
                  
                  
                  <!-- /.item -->
                  
                  
                  <!-- /.item -->
                  
                  
                  <!-- /.item -->
                  
                  
                  <!-- /.item --> 
                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
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







            <div class="tab-pane "  id="list-container">
              <div class="category-product">

              	@foreach($products as $result)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <a href="{{url('/product/details').'/'.$result->id.'/'.$result->name}}"> <img src="{{asset($result->image_one)}}" alt=""></a> </div>
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="{{url('/product/details').'/'.$result->id.'/'.$result->name}}">{{$result->name}}</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price">
                             @if($result->discount_price == NULL )

                     <span class="price"> ${{$result->selling_price}} </span>
                      @else
                     <span class="price"> ${{$result->discount_price}} </span> <span class="price-before-discount">$ {{$result->selling_price}}</span> 
                    @endif


                              
                             </div>
                            <!-- /.product-price -->
                            <form method="get" action="{{route('wishlist.add')}}">
                              @csrf

                            <div class="description m-t-10">{{strip_tags($result->details)}}</div>
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button data-toggle="modal" data-target="#exampleModal" id="{{$result->id}}" class="btn btn-primary icon" onclick="productview(this.id)" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>

  
                                    <input type="hidden" name="id" value="{{$result->id}}">
                                    <button type="submit"  class="btn btn-primary icon"  title="Wishlist"> <i class="icon fa fa-heart"></i> </button>                                 </ul>
                              </div>
                              <!-- /.action --> 
                            </div>
                            <!-- /.cart --> 
                            
                          </div>
                          <!-- /.product-info --> 
                        </div>
                        <!-- /.col --> 
                      </div>
    @if($result->discount_price == NULL )

                      <div class="tag new"><span>new</span></div>

                      @else

                      @php
                       $discount = (($result->selling_price - $result->discount_price) / $result->selling_price) * 100;
                      @endphp
                     <div class="tag hot">
                      <span>%{{round($discount)}}</span></div>

                      @endif
                    </div>
                    <!-- /.product-list --> 
                  </div>
                  <!-- /.products --> 
                </div>
                @endforeach
                <!-- /.category-product-inner -->
                

                <!-- /.category-product-inner --> 
                
              </div>
              <!-- /.category-product --> 
            </div>
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">

              
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    </div>
</div>



        



@endsection