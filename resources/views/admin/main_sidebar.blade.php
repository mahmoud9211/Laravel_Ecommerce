
@php

$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp



<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="../images/logo-dark.png" alt="">
						  <h3><b>Sunny</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{($route == 'dashboard') ? 'active' : ' '}}">
          <a href="{{url('admin/dashboard')}}" >
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        @if(Auth::guard('admin')->user()->categories == 1)

        <li class="treeview {{($prefix == 'admin/category') ? 'active' : ' '}} ">
          <a href="#">
            <i data-feather="mail"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($prefix == 'admin/category') ? 'active' : ' '}}"><a href="{{route('admin.category')}}"><i class="ti-more"></i>All Categories</a></li>
            <li class="{{($prefix == 'admin/subcategory') ? 'active' : ' '}}" ><a href="{{route('admin.subcategory')}}"><i class="ti-more"></i>Sub-Categories</a></li>
            <li class="{{($prefix == 'admin/brand') ? 'active' : ' '}}" ><a href="{{route('admin.brand')}}"><i class="ti-more"></i>ٍBrands</a></li>
          </ul>
        </li>
        @else
        @endif

        @if(Auth::guard('admin')->user()->products == 1)
        <li class="treeview {{($prefix == 'admin/product') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($prefix == '/product') ? 'active' : ' '}}" ><a href="{{route('admin.product')}}"><i class="ti-more"></i>Add Products</a></li>
            <li><a href="{{route('admin.product.index')}}"><i class="ti-more"></i>All Products</a></li>
          </ul>
        </li> 
        @else 
        @endif 

        @if(Auth::guard('admin')->user()->reports == 1)

         <li class="treeview {{($prefix == '/reports') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($prefix == '/reports') ? 'active' : ' '}}" ><a href="{{route('admin.reports.today')}}"><i class="ti-more"></i>Today Orders</a></li>
            <li class="{{($prefix == '/reports') ? 'active' : ' '}}" ><a href="{{route('admin.reports.month')}}"><i class="ti-more"></i>Monthly Orders</a></li>
            <li class="{{($prefix == '/reports') ? 'active' : ' '}}" ><a href="{{route('admin.reports.search')}}"><i class="ti-more"></i> Orders by search</a></li>


          </ul>
        </li>
        @else 
        @endif 


        @if(Auth::guard('admin')->user()->coupon == 1)

         <li class="treeview {{($prefix == '/coupon') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Coupon</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($prefix == '/coupon') ? 'active' : ' '}}" ><a href="{{route('admin.coupon')}}"><i class="ti-more"></i> Coupons</a></li>
          </ul>
        </li>
        @else 
        @endif
        @if(Auth::guard('admin')->user()->orders == 1)

        <li class="treeview {{($prefix == '/orders') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($prefix == '/orders') ? 'active' : ' '}}" ><a href="{{route('admin.orders')}}"><i class="ti-more"></i>Pending Orders</a></li>
            <li class="{{($prefix == '/orders') ? 'active' : ' '}}" ><a href="{{route('admin.paid.orders')}}"><i class="ti-more"></i>Paid Orders</a></li>
            <li class="{{($prefix == '/orders') ? 'active' : ' '}}" ><a href="{{route('admin.progress.orders')}}"><i class="ti-more"></i>Orders in Progress</a></li>
            <li class="{{($prefix == '/orders') ? 'active' : ' '}}" ><a href="{{route('admin.delivered.orders')}}"><i class="ti-more"></i>Delivered Orders</a></li>


          </ul>

        </li> 
        @else
        @endif

        @if(Auth::guard('admin')->user()->order_return_request == 1)

        <li class="treeview {{($prefix == '/return') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Return Orders Requests</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{($prefix == '/return') ? 'active' : ' '}}" ><a href="{{route('admin.return.orders')}}"><i class="ti-more"></i>Requests</a></li>
         
          </ul>

        </li> 

        @else 
        @endif


        
        @if(Auth::guard('admin')->user()->user_roles == 1)
        <li class="treeview {{($prefix == '/orders') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Admin Roles</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($prefix == '/role') ? 'active' : ' '}}" ><a href="{{route('admin.create.user')}}"><i class="ti-more"></i>Create admin</a></li>
            <li class="{{($prefix == '/role') ? 'active' : ' '}}" ><a href="{{route('admin.all.users')}}"><i class="ti-more"></i>All admins</a></li>
        


          </ul>

        </li> 
        @else
        @endif   


  @if(Auth::guard('admin')->user()->contact_messages == 1)

        <li class="treeview {{($prefix == '/return') ? 'active' : ' '}}">
          <a href="#">
            <i data-feather="file"></i>
            <span>Contact Messages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{($prefix == '/contact') ? 'active' : ' '}}" ><a href="{{route('admin.contact.messages')}}"><i class="ti-more"></i>Messages</a></li>
         
          </ul>

        </li> 

        @else 
        @endif
		 

        
      </ul>
    </section>
	

  </aside>