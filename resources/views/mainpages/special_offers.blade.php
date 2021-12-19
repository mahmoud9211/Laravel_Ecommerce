<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Offers</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
        <div class="item">
          <div class="products special-product">

@php 

$best_rated = DB::table('products')->where('status',1)->where('best_rated',1)->latest()->limit(3)->get();

@endphp


          @foreach($best_rated as $b)
            <div class="product">
              <div class="product-micro">
                <div class="row product-micro-row">
                  <div class="col col-xs-5">
                    <div class="product-image">
                      <div class="image"> <a href="{{url('/product/details').'/'.$b->id.'/'.$b->name}}"> <img src="{{asset($b->image_one)}}" alt=""> </a> </div>
                      <!-- /.image --> 
                      
                    </div>
                    <!-- /.product-image --> 
                  </div>
                  <!-- /.col -->
                  <div class="col col-xs-7">
                    <div class="product-info">
                      <h3 class="name"><a href="{{url('/product/details').'/'.$b->id.'/'.$b->name}}">{{$b->name}}</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="product-price"> <span class="price">

                        @if($b->discount_price == null)

                         $ {{$b->selling_price}} 

                         @else 
                         
                         $ {{$b->discount_price}} 
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

            @endforeach

          </div>
        </div>
 

      </div>
    </div>
    <!-- /.sidebar-widget-body --> 
  </div>