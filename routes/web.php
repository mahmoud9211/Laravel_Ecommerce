<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\brandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\couponController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\hyperpayController;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\stripeController;
use App\Http\Controllers\PaypalPaymentController;









/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('admin/login',[AdminController::class,'create'])->name('Login_form');
Route::post('admin/login/owner',[AdminController::class,'login'])->name('admin.login');




Route::get('admin/register',[AdminController::class,'register_page'])->name('admin.register');
Route::post('admin/registration',[AdminController::class,'registration'])->name('admin.registration');







Route::prefix('admin')->middleware('Admin')->group(function(){

   
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout')->middleware('Admin');



    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('Admin');




    Route::get('/password/change',[AdminController::class,'password_page'])->name('admin.password.change');

    Route::post('/Passwordchange',[AdminController::class,'passwordchange'])->name('admin.Passwordchange');

    //category

    Route::get('/category',[categoryController::class,'catpage'])->name('admin.category');

    Route::post('/category/store',[categoryController::class,'cat_store'])->name('admin.category.store');

    Route::post('/category/update',[categoryController::class,'cat_update'])->name('admin.category.update');

    Route::get('/category/delete/{id}',[categoryController::class,'cat_delete'])->name('admin.category.delete');


//Brand
    Route::get('/brand',[brandController::class,'brandpage'])->name('admin.brand');

    Route::post('/brand/store',[brandController::class,'brand_store'])->name('admin.brand.store');

    Route::post('/brand/update',[brandController::class,'brand_update'])->name('admin.brand.update');

    Route::get('/brand/delete/{id}',[brandController::class,'brand_delete'])->name('admin.brand.delete');

    //sub category

    Route::get('/subcategory',[subcategoryController::class,'index'])->name('admin.subcategory');

    Route::post('/subcategory/store',[subcategoryController::class,'store'])->name('admin.subcategory.store');

    Route::post('/subcategory/update',[subcategoryController::class,'update'])->name('admin.subcategory.update');

    Route::get('/subcategory/delete/{id}',[subcategoryController::class,'destroy'])->name('admin.subcategory.delete');

    Route::get('/subcategory/ajax/{category_id}',[subcategoryController::class,'get_subcat_by_ajax']);


   //coupon

   Route::get('/coupon',[couponController::class,'index'])->name('admin.coupon');

   Route::post('/coupon/store',[couponController::class,'store'])->name('admin.coupon.store');

   Route::post('/coupon/update',[couponController::class,'update'])->name('admin.coupon.update');

   Route::get('/coupon/delete{id}',[couponController::class,'delete'])->name('admin.coupon.delete');

   //product

   Route::get('/product',[productController::class,'create'])->name('admin.product');

   Route::post('/product/store',[productController::class,'store'])->name('admin.product.store');

   Route::get('/product/index',[productController::class,'index'])->name('admin.product.index');

   Route::get('/product/deactive/{id}',[productController::class,'deactivate'])->name('admin.product.deactive');

   Route::get('/product/active/{id}',[productController::class,'activate'])->name('admin.product.active');

   Route::get('/product/delete/{id}',[productController::class,'delete'])->name('admin.product.delete');

   Route::get('/product/edit/{id}',[productController::class,'edit'])->name('admin.product.edit');

   Route::post('/product/update/{id}',[productController::class,'update'])->name('admin.product.update');

   //orders

   Route::get('/orders',[ordersController::class,'orders'])->name('admin.orders');

   Route::get('/paid/orderes',[ordersController::class,'paid_orders'])->name('admin.paid.orders');

   Route::get('/progress/orders',[ordersController::class,'progress_orders'])->name('admin.progress.orders');

   Route::get('/delivered/orders',[ordersController::class,'delivered_orders'])->name('admin.delivered.orders');



   Route::get('/order/details/{id}',[ordersController::class,'order_details'])->name('admin.order.details');

   Route::get('/order/payment/accepted/{id}',[ordersController::class,'payment_accepted'])->name('admin.order.payment.accepted');

   Route::get('/order/progress/{id}',[ordersController::class,'order_progress'])->name('admin.order.progress');

   Route::get('/delivery/done/{id}',[ordersController::class,'delivery_done'])->name('admin.delivery.done');

   Route::get('/order/cancel/{id}',[ordersController::class,'order_cancel'])->name('admin.order.cancel');

   Route::get('/return/orders',[ordersController::class,'requests_page'])->name('admin.return.orders');

   Route::get('/accept/request{id}',[ordersController::class,'accept_request'])->name('admin.accept.request');

   Route::get('/reject/request{id}',[ordersController::class,'reject_request'])->name('admin.reject.request');


   

   

   //reports

   Route::get('/reports/today',[reportController::class,'today_report'])->name('admin.reports.today');

   Route::get('/reports/month',[reportController::class,'monthly_report'])->name('admin.reports.month');

   Route::get('/reports/search',[reportController::class,'search_report'])->name('admin.reports.search');

   Route::post('/report/month/search',[reportController::class,'search_month'])->name('admin.report.month.search');

   Route::post('/report/year/search',[reportController::class,'search_year'])->name('admin.report.year.search');

   Route::post('/report/date/search',[reportController::class,'search_date'])->name('admin.report.date.search');

//Roles for admins

Route::get('/create/user',[roleController::class,'create_user_page'])->name('admin.create.user');

Route::post('/create/new/user',[roleController::class,'create_user'])->name('admin.create.new.user');

Route::get('/all/users',[roleController::class,'all_user'])->name('admin.all.users');

Route::get('/users/edit{id}',[roleController::class,'user_edit'])->name('admin.users.edit');

Route::post('/update/user{id}',[roleController::class,'user_update'])->name('admin.update.user');

Route::get('/user/delete{id}',[roleController::class,'user_delete'])->name('admin.user.delete');

//contact

Route::get('/contact/messages',[contactController::class,'contact_messages'])->name('admin.contact.messages');

Route::get('/message/view{id}',[contactController::class,'message_view'])->name('admin.message.view');



















   
   


   



   
   

   

   
   
    
   
   
   









});

Route::prefix('user')->middleware('auth')->group(function(){

 route::get('/logout',[userController::class,'logout'])->name('user.logout');


route::get('/change/password',[userController::class,'create'])->name('user.change.password');

route::post('/update/password',[userController::class,'update_password'])->name('user.update.password');

route::get('/orders',[userController::class,'orders'])->name('user.orders');

route::get('/orders/view{id}',[userController::class,'order_view'])->name('user.order.view');

route::get('/order/cancel{id}',[userController::class,'order_cancel'])->name('user.order.cancel');

route::post('/order/return/request{id}',[userController::class,'order_return_request'])->name('user.order.return.request');

route::get('/contact',[userController::class,'contact_page'])->name('user.contact');

route::post('/contact/message',[userController::class,'contact_message'])->name('user.contact.message');

route::get('/invoice/download{id}',[userController::class,'download_invoice'])->name('user.invoice.download');















});

route::post('/wishlist/add/{id}',[wishlistController::class,'Add_To_Wishlist']);

route::get('wishlistCount',[wishlistController::class,'wishlistCount']);

route::get('wishlist',[wishlistController::class,'wishlistPage'])->name('wishlist');

route::get('wishlist/show',[wishlistController::class,'wishlistget']);

route::get('wishlist/remove/{id}',[wishlistController::class,'wishlistremove']);









route::get('addToCart/{product}',[cartController::class,'Add_To_Cart']);

route::post('add/to/cart/{product}',[cartController::class,'insertTocart']);

route::get('minicart',[cartController::class,'minicart']);

route::get('remove/cart/{id}',[cartController::class,'remove_cart']);

route::get('cart/page',[cartController::class,'cart_page'])->name('cart.page');

route::get('icreament/{id}',[cartController::class,'increament']);

route::get('decreament/{id}',[cartController::class,'decreament']);

route::post('apply/coupon',[cartController::class,'applycoupon']);

route::get('cart/calculation/',[cartController::class,'cart_calc']);

route::get('coupon/remove',[cartController::class,'coupon_remove']);


//checkout
route::get('checkout',[checkoutController::class,'checkout'])->name('checkout');

route::post('checkout/proceed',[checkoutController::class,'checkout_proceed'])->name('checkout.proceed');

route::post('stripe/payment',[stripeController::class,'stripe_payment'])->name('stripe.payment');



















route::get('check',[cartController::class,'check']);

//product details

route::get('product/details/{id}/{name}',[productController::class,'product_details']);

route::get('product/view/{id}',[productController::class,'product_view']);

//search

route::get('product/by/search',[productController::class,'product_By_search'])->name('product.by.search');


//socialite

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


























Route::get('/', function () {
    return view('mainpages.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
