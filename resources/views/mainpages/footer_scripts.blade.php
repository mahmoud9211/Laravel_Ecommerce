<script src="{{asset('frontend/assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/echo.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/jquery.rateit.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/lightbox.min.js')}}" ></script> 
<script src="{{asset('frontend/assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/wow.min.js')}}"></script> 
<script src="{{asset('frontend/assets/js/scripts.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>



  <script type="text/javascript">

    @if(Session::has('message'))
let type = "{{Session::get('alert-type','info')}}";

switch (type)
{
  case 'info' : toastr.info("{{Session::get('message')}}");
   break;
  case 'success' : toastr.success("{{Session::get('message')}}");
     break;


  case 'warning' : toastr.warning("{{Session::get('message')}}");
     break;


  case 'error' : toastr.error("{{Session::get('message')}}");
     break;

}
@endif



  </script>




<!-- Start Add to wishlist -->

<script type="text/javascript">
  
  function addToWishList(id)
  
  {
  

     $.ajax({
       type : 'get',
       url : '/wishlist/add/' + id,
       dataType : 'json',
       success:function(data){
  
        viewWishlist();

        const message =  Swal.mixin({
  message : true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

if($.isEmptyObject(data.error))

 {
  message.fire({

    type : 'success',
    icon : 'success',
    title : data.success,
  })

 } else

{
 message.fire({

   type : 'error',
   icon : 'error',
   title : data.error,

})

}

       }
  
     })
  
  }


</script>

<!-- End Add to wishlist -->

<script>

function viewWishlist()
{
  
  $.ajax({
  
    type : 'GET',
    url : '/wishlist/show',
    dataType : 'json',

    success:function(data){
       
      var wishlist = " ";
      

    $.each(data,function(key,value){
     
       wishlist += `<tr>
					<td class="col-md-2"><img src="/${value.product.image_one}" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name"><a href="#">${value.product.name}</a></div>

						<div class="price">
							$ ${value.product.discount_price == null ? `${value.product.selling_price}`:
              `${value.product.discount_price}
              <span>$ ${value.product.selling_price}</span>`
            }
							
						</div>
					</td>
					<td class="col-md-2">
            <button data-toggle="modal" data-target="#exampleModal" id="${value.product.id}" class="btn btn-primary icon" onclick="productview(this.id)" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>



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





					</td>
					<td class="col-md-1 close-btn">
						<a id="${value.id}" onclick="RemoveWishlist(this.id)" class=""><i class="fa fa-times"></i></a>
					</td>

				</tr>`
     

    });

    $('#wishlistview').html(wishlist);

    }


  });

}

viewWishlist();



</script>

<script>
function RemoveWishlist(id)
{
 $.ajax({

type : 'get',
url : '/wishlist/remove/' + id,
dataType : 'json',

success:function (data){
  viewWishlist();
  const message =  Swal.mixin({
  message : true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

if($.isEmptyObject(data.error))

 {
  message.fire({

    type : 'success',
    icon : 'success',
    title : data.success,
  })

 } else

{
 message.fire({

   type : 'error',
   icon : 'error',
   title : data.error,

})

}



}

 });



}


</script>


<script>


function productview(id)
{
  $.ajax({

type : 'get',
url : '/product/view/' + id,
dataType : 'json',

success:function(data){

$('#pname').text(data.product.name);
$('#pimg').attr('src',data.product.image_one);
$('#brand').text(data.product.brand.name);
$('#cat').text(data.product.category.name);
$('#code').text(data.product.code);
$('#product_id').val(id);


if(data.product.discount_price == null){
 
 $('#pprice').text(data.product.selling_price);
 $('#oldprice').hide();
 $('#dollar').hide();

}else{
  $('#oldprice').show();
  $('#dollar').show();

  $('#pprice').text(data.product.discount_price);
  $('#oldprice').text(data.product.selling_price);

}

if(data.product.qty > 0){

$('#stock').text('Available');

}else{
  $('#stock').text('Not Available');

}

$('select[name="color"]').empty();        
    $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+' </option>')
    }) 



var d = $('select[name="size"]').empty();
$.each(data.size,function(key,value){
$('select[name="size"]').append('<option value="'+ value +'">' +value+ '</option>');


});

if(data.size == "")
{
  $('#sizeD').hide();
}else{

  $('#sizeD').show();
}




}




  });






}


</script>


<!-- start Add to cart -->
<script>

  function addToCart()
  {
    let id = $('#product_id').val();
   let product_name = $('#pname').text();
   let qty = $('#qty').val();
  // let color = $('#color option:selected').text();
  let color= $('select[name=color] option').filter(':selected').val();

  // let size = $('#size option:selected').text();
  let size= $('select[name=size] option').filter(':selected').val();


   $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

   $.ajax({
 
    type : 'post',
    dataType : 'json',
    data:{
      product_name:product_name,qty:qty,color:color,size:size,id:id
    },
    url : '/add/to/cart/' + id,

    success:function(responses)
    {
      miniCart();

      $('#closemodal').click();

      const message =  Swal.mixin({
  message : true,
  position: 'top-end',
  icon: 'success',
  showConfirmButton: false,
  timer: 3000
})

 if($.isEmptyObject(responses.error))

 {
  message.fire({

    type : 'success',
    title : responses.success,
  })

 }

 else

 {
  message.fire({

    type : 'error',
    title : responses.error, 
  })


 }


    }



   });



  }




</script>
  <!-- start Add to cart -->

    <!-- start minicart -->

<script>

function miniCart()
{
  $.ajax({
  type : 'get',
  url : '/minicart',
  dataType : 'json',
  
  success:function(data){

$('#cartQty').text(data.count);
$('span[id= "total_price"]').text(data.total);

let mini = "";

$.each(data.content,function(key,value){

mini += `<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.attributes.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">$ ${value.price} * ${value.quantity}</div>
                    </div>
                    <div class="col-xs-1 action"> <button id="${value.id}" onclick="removeCart(this.id)" ><i class="fa fa-trash"></i></button> </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`


});

$('#addmini').html(mini);


  }


  });

}
miniCart();


</script>
        <!-- end minicart -->



        <!-- start view cart page -->

<script>

  function viewCartPage()
  {
   $.ajax({
  type : 'get',
  url : '/minicart',
  dataType : 'json',
  
  success:function(data)
  {
   
  
  
    let cart = "";
  
    $.each(data.content,function(key,value){
      
      cart +=  `<tr>
            <td class="col-md-2"><img src="/${value.attributes.image}" alt="imga" style="width:100px;height:100px"></td>
            <td class="col-md-2" style="text-align: center;">
              <div class="product-name"><a href="#">${value.name}</a></div>
              <div class="price">
              $${value.price}
              </div>
            </td>
  
            <td class="col-md-2" style="text-align: center;">
              <strong>${value.attributes.color} </strong>
            </td>
  
            <td class="col-md-2" style="text-align: center;">
              <strong>${value.attributes.size == null ? `--` : `${value.attributes.size}`} </strong>
            </td>
  
            <td class="col-md-2" style="text-align: center;">
            <button type="submit" class="btn btn-success btn-sm" id="${value.id}" onclick="increment(this.id)">+</button>
              <input type="text" min="1" value="${value.quantity}"style="width:30px;text-align:center;">
                 ${value.quantity > 1 ?
                 `<button type="submit" class="btn btn-danger btn-sm" id="${value.id}" onclick="decrement(this.id)">-</button>`
                 : `<button type="submit" class="btn btn-danger btn-sm" disabled>-</button>`
                  }
              
            </td>
  
            <td class="col-md-1">
              <strong>${value.price}</strong>
            </td>
            
  
            <td class="col-md-1 close-btn">
              <button id="${value.id}" onclick="removeCart(this.id)" class=""><i class="fa fa-times"></i></button>
            </td>
          </tr>`
    
  
  
    });
  
    $('#cartpage').html(cart);
  
    
  
  }
  
  
   });
  
  
  }
  
  viewCartPage();
  
  
  
  
  </script>
  <!-- end view cart page -->









<script>
function removeCart (id)
{
  $.ajax({
 type : 'get',
 url : '/remove/cart/' +id,
 dataType : 'json',

 success:function(data){

  calculation();
  miniCart();
  viewCartPage();
  $('#couponField').show();
          $('#coupon_id').val('');
      


  const message =  Swal.mixin({
  message : true,
  position: 'top-end',
  icon: 'success',
  showConfirmButton: false,
  timer: 3000
})

 if($.isEmptyObject(data.error))

 {
  message.fire({

    type : 'success',
    title : data.success,
  })

 }

 else

 {
  message.fire({

    type : 'error',
    title : data.error,

})

}


 }

  })
}

</script>



<script>

function increment (id)
{
  $.ajax({

   type : 'get',
   url : '/icreament/' + id,
   dataType : 'json',
   success:function(data){
    viewCartPage();
    miniCart();
    calculation();


   
   }

  });

}



function decrement (id)
{
  $.ajax({

   type : 'get',
   url : '/decreament/' + id,
   dataType : 'json',
   success:function(data){
    viewCartPage();
    miniCart();
    calculation();


   
   }

  });

}





  </script>

<script>

function applyCoupon()
{
  let coupon = $('#coupon_id').val();

  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $.ajax({

  
   type : 'post',
   url : '/apply/coupon/',
   data :{coupon:coupon},
   dataType : 'json',

   success:function(data){

    calculation();
  if(data.validity == true)
  {
      $('#couponField').hide();

  }

     const message =  Swal.mixin({
  message : true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
})

 if($.isEmptyObject(data.error))

 {
  message.fire({

    type : 'success',
    icon : 'success',
    title : data.success,
  })

 }

 else

 {
  message.fire({

    type : 'error',
    icon : 'error',
    title : data.error,

})

}



   }

  });

}




  </script>

  <script>

function calculation()
{

  $.ajax({
    type : 'get',
    url : '/cart/calculation/',
    dataType : 'json',

    success:function(data){

      if(data.total)
      {

       $('#calc').html(`<tr>
        <th>
          <div class="cart-sub-total">
            Subtotal<span class="inner-left-md">$${data.total}</span>
          </div>
          <div class="cart-grand-total">
            Grand Total<span class="inner-left-md">$${data.total}</span>
          </div>
        </th>
      </tr>`
      );

      }else if(data.total == 0){



      //  $('#full-cart').hide();
       // $('.empty-cart').show();

       $('#full-cart').css("display","none");
       $('.empty-cart').css("display","block");



     } else{

        $('#calc').html(
  `<tr>
        <th>
          <div class="cart-sub-total">
            Subtotal<span class="inner-left-md">$${data.sub_total}</span>
          </div>

          <div class="cart-sub-total">
            Coupon name :<span class="inner-left-md" id="coup_name">  ${data.coupon_name}</span>
            <button type="submit" onclick="couponRemove()" ><i class="fa fa-times-circle"></i> </button>
          </div>

           <div class="cart-sub-total">
            Coupon discount :<span class="inner-left-md"> %  ${data.coupon_discount}</span>
          </div>

           <div class="cart-sub-total">
            Discount Amount :<span class="inner-left-md"> $${data.coupon_discount_amount}</span>
          </div>

          <div class="cart-grand-total">
            Grand Total<span class="inner-left-md">$${data.total_amount}</span>
          </div>
        </th>
      </tr>`

      );





      }


    }

  })

}

calculation();


  </script>

  <script>

    function couponRemove()
    {
       $.ajax({
         type : 'get',
         url : '/coupon/remove',
         dataType : 'json',
         success:function(data)
         {
          calculation();
          $('#couponField').show();
          $('#coupon_id').val('');



         }


       });



    }





    </script>






