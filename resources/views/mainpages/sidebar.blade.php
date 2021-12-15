
@php 
$categories = DB::table('categories')->get(); 
@endphp

    <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">

              @foreach($categories as $cat)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="" aria-hidden="true"></i>
             
                {{$cat->name}}

              </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
 @php 
$subcategories = DB::table('subcategories')->where('cat_id',$cat->id)->get();
 @endphp

                   
                    <div class="row">
                     
                    @foreach($subcategories as $subcats)
                      <div class="col-sm-12 col-md-3">
                     <a href="">  <h2 class="title">
                        {{$subcats->name}}
                         </h2> </a>

@php 
$products = DB::table('products')->where('subcategory_id',$subcats->id)->where('status',1)->get();
@endphp
                        @foreach($products as $pro)
                        <ul class="links list-unstyled">
                          <li><a href="">
                          {{$pro->name}}
                          </a></li>
                          
                        </ul>
                    @endforeach
                      </div>

                      <!-- /.col --> 
                      @endforeach
                    </div>
                    
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>

             @endforeach
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>