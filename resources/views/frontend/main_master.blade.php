<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="csrf-token" content="{{csrf_token()}}">

<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>@yield('title')</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->

@include('frontend.body.header')
<!-- ============================================== HEADER : END ============================================== -->

@yield('content')
<!-- /#top-banner-and-menu --> 

<!-- ============================================================= FOOTER ============================================================= -->
@include('frontend.body.footer')
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script> 
<script type="text/javascript" src="{{asset('frontend/assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
	<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type' , 'info') }}"
    switch(type) {
      case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;
      
      case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
          break;
    }
   @endif
</script>

<!-- ==============================================   START TO Add to Cart Book Modal ============================================== -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><strong><span id="pname"></span> </strong></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
              <div class="card" style="width: 18rem;">
                <img src="" class="card-img-top" alt="" style="height: 200px; width: 170px;" id="pimage">
              </div>   
          </div><!-- // end col md -->

         <div class="col-md-4">
            <ul class="list-group">
                <li class="list-group-item">@if(session()->get('language') == 'french') Prix du Livre <strong class="text-danger"> € <span id="pprice"></span></strong>
                  <del id="oldprice"> € </del>
                @else Product Price : <strong class="text-danger"> $ <span id="pprice"></span></strong>
                   <del id="oldprice"> $ </del> @endif
                </li>
                <li class="list-group-item">@if(session()->get('language') == 'french')Code Article : <strong id="pcode"></strong>
                @else  Product Code : <strong id="pcode"></strong> @endif
              </li>
                <li class="list-group-item">@if(session()->get('language') == 'french') Categorie : <strong id="pcategory"></strong>
                   @else Category : <strong id="pcategory"></strong> @endif</li>
                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span> 
              <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span> 
              </li>
            </ul>
        </div><!-- // end col md -->

        <div class="col-md-4">

          <div class="form-group">
            <label for="qty">@if(session()->get('language') == 'french')Quantité @else Quantity @endif</label>
            <input type="number" class="form-control" id="qty" value="1" min="1" >
          </div> <!-- // end form group -->
          <BR>
            <br>
            <BR>
              <br>
<div>
        <input type="hidden" id="book_id">
        <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()" >@if(session()->get('language') == 'french')Ajouter au Panier @else Add to Cart @endif</button>
</div>
           </div><!-- // end col md -->
              </div> <!-- // end row -->
      </div> <!-- // end modal Body -->
          </div>
  </div>
</div>
<!-- ==============================================   END TO Add to Cart Book Modal ============================================== -->

<!-- ==============================================  START  Book View With Modal ====================================================== -->
<script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
   
function bookView(id){
   //alert(id)
    
    $.ajax({
        type: 'GET',
        url: '/book/view/modal/'+id ,
        dataType:'json',
        success:function(data){
             //console.log(data)
             @if(session()->get('language') == 'french')$('#pname').text(data.book.name_fr) @else $('#pname').text(data.book.name_en) @endif;
            $('#pprice').text(data.book.prix);
            $('#pcode').text(data.book.product_code);
            @if(session()->get('language') == 'french')$('#pcategory').text(data.book.category_book.name_fr) @else $('#pcategory').text(data.book.category_book.name_en) @endif ;
            $('#pimage').attr('src','/'+ data.book.product_thambnail);
            $('#book_id').val(id);
            $('#qty').val(1);

            // Product Price 
            if (data.book.discount_price == null) {
                $('#pprice').text('');
                 $('#oldprice').text('');
                $('#pprice').text(data.book.prix);
            }else{
                $('#pprice').text(data.book.prix - data.book.discount_price);
                $('#oldprice').text(data.book.prix);
            } // end producut price 

            // Start Stock opiton
            if (data.book.product_qty > 0) {
                $('#aviable').text('');
                $('#stockout').text('');
                @if(session()->get('language') == 'french') $('#aviable').text('Disponible') @else $('#aviable').text('Aviable') @endif;
            }else{
                $('#aviable').text('');
                $('#stockout').text('');
                @if(session()->get('language') == 'french') $('#stockout').text('Epuisée') @else $('#stockout').text('Stockout')@endif;
            }
        }
   })
   } 

  </script>
  <!--  ==============================================  START  Book View With Modal ====================================================== -->


  <!--  ==============================================     START Add To Cart Book   ====================================================== -->
  <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })

   function addToCart(){

        var book_name =  @if(session()->get('language') == 'french') $('#pname').text() @else (session()->get('language') == 'english') $('#pname').text() @endif ;
        var id = $('#book_id').val();
        var quantity = $('#qty').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            data:{
                 quantity:quantity, book_name:book_name
            },
            url: "/book/cart/"+id,
            success:function(data){
              miniCart()
                $('#closeModel').click();
                // console.log(data)

                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
                  
            }
              })
    }
  </script> 
   <!--  ===============================================           END Add To Cart Book        ====================================================== -->

    <!--  ==============================================     START View and ADD to Mini-Cart   ====================================================== -->
 
   <script type="text/javascript">

function miniCart() {
  $.ajax({
            type: 'GET',
            url: '/book/mini/cart',
            dataType:'json',
            success:function(response){
            //   <"pre">
            // console.log(response);
            //   <"/pre">
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts, function(key,value){
                    miniCart += `<div class="cart-item product-summary">
          <div class="row">
            <div class="col-xs-4">
              <div class="image"><a href="detail.html"><img src="/${value.options.image}"></a></div>
            </div>
            <div class="col-xs-7">
              <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
              <div class="price"> ${value.price} * ${value.qty} </div>
            </div>
            <div class="col-xs-1 action"> 
            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
          </div>
        </div>
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>`
        });
                
                $('#miniCart').html(miniCart);
            }
        })
      }
  miniCart();

   
   </script>
 
 <!--  ==============================================     END View and ADD to Mini-Cart   ====================================================== -->

 <!--  ==============================================     START DELETE Book to Mini-Cart   ====================================================== -->
 <script type="text/javascript">

      function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/removeBook/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }



</script>
 <!--  ==============================================     START DELETE Book to Mini-Cart   ====================================================== -->

  <!--  ==============================================     START ADD WISHLIST Book    ====================================================== -->
<script  type="text/javascript">

function addToWishList(book_id){
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '/addToWishList/'+book_id,
        success:function(data){
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
        }
    })
} 
</script>
<!--  ==============================================     END  ADD WISHLIST Book    ====================================================== -->
<!--  ==============================================     lOAD WISHLIST Book    ====================================================== -->

<script type="text/javascript">

  function wishList() {
    $.ajax({
              type: 'GET',
              url: '/user/getWishList',
              dataType:'json',
              success:function(response){
              //   <"pre">
              // console.log(response);
              //   <"/pre">
                
                  var rows = ""
                  $.each(response, function(key,value){
                    rows += `<tr>
                    <td class="col-md-2"><img src="/${value.book.product_thambnail} " alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${ @if(session()->get('language') == 'french')value.book.name_fr @else value.book.name_en  @endif}</a></div>
                         
                        <div class="price">
                        ${value.book.discount_price == null
                            ? `${value.book.prix}`
                            :
                            `${ value.book.prix - value.book.discount_price} <span>${value.book.prix}</span>`
                        }
                            
                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.book_id}" onclick="bookView(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishListRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
        });
                  
                  $('#wishList').html(rows);
              }
          })
        }
    wishList();
     </script>
   <!--  ==============================================     END  LOAD WISHLIST Book    ====================================================== -->
<!--  ==============================================     START DELETE Book to WishList   ====================================================== -->
<script type="text/javascript">

  function wishListRemove(id){
    $.ajax({
        type: 'GET',
        url: '/user/removeWishList/'+id,
        dataType:'json',
        success:function(data){
        wishList();
         // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message 
        }
    });
}
</script>
<!--  ==============================================     START DELETE Book to WishList   ====================================================== -->
<script type="text/javascript">

function miniCart() {
  $.ajax({
            type: 'GET',
            url: '/book/mini/cart',
            dataType:'json',
            success:function(response){
            //   <"pre">
            // console.log(response);
            //   <"/pre">
                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts, function(key,value){
                    miniCart += `<div class="cart-item product-summary">
          <div class="row">
            <div class="col-xs-4">
              <div class="image"><a href="detail.html"><img src="/${value.options.image}"></a></div>
            </div>
            <div class="col-xs-7">
              <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
              <div class="price"> ${value.price} * ${value.qty} </div>
            </div>
            <div class="col-xs-1 action"> 
            <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
          </div>
        </div>
        <!-- /.cart-item -->
        <div class="clearfix"></div>
        <hr>`
        });
                
                $('#miniCart').html(miniCart);
            }
        })
      }
  miniCart();

   
   </script>
 
 <!--  ==============================================     END View and ADD to Mini-Cart   ====================================================== -->

 <!--  ==============================================     START DELETE Book to Mini-Cart   ====================================================== -->
 <script type="text/javascript">

      function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/removeBook/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }



</script>
 <!--  ==============================================      END DELETE Book to Mini-Cart   ====================================================== -->

  <!--  ==============================================     START ADD WISHLIST Book    ====================================================== -->
<script  type="text/javascript">

function addToWishList(book_id){
    $.ajax({
        type: "POST",
        dataType: 'json',
        url: '/addToWishList/'+book_id,
        success:function(data){
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
        }
    })
} 
</script>
<!--  ==============================================     END  ADD WISHLIST Book    ====================================================== -->
<!--  ==============================================     lOAD WISHLIST Book    ====================================================== -->

<script type="text/javascript">

  function wishList() {
    $.ajax({
              type: 'GET',
              url: '/user/getWishList',
              dataType:'json',
              success:function(response){
              //   <"pre">
              // console.log(response);
              //   <"/pre">
                
                  var rows = ""
                  $.each(response, function(key,value){
                    rows += `<tr>
                    <td class="col-md-2"><img src="/${value.book.product_thambnail} " alt="imga"></td>
                    <td class="col-md-7">
                        <div class="product-name"><a href="#">${ @if(session()->get('language') == 'french')value.book.name_fr @else value.book.name_en  @endif}</a></div>
                         
                        <div class="price">
                        ${value.book.discount_price == null
                            ? `${value.book.prix}`
                            :
                            `${ value.book.prix - value.book.discount_price} <span>${value.book.prix}</span>`
                        }
                            
                        </div>
                    </td>
        <td class="col-md-2">
            <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="${value.book_id}" onclick="bookView(this.id)"> Add to Cart </button>
        </td>
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.id}" onclick="wishListRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
        });
                  
                  $('#wishList').html(rows);
              }
          })
        }
    wishList();
     </script>
   <!--  ==============================================     END  LOAD WISHLIST Book    ====================================================== -->
<!--  ==============================================     START DELETE Book to WishList   ====================================================== -->
<script type="text/javascript">

  function wishListRemove(id){
    $.ajax({
        type: 'GET',
        url: '/user/removeWishList/'+id,
        dataType:'json',
        success:function(data){
        wishList();
         // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message 
        }
    });
}
</script>
<!--  ==============================================     START DELETE  User's Book to WishList   ====================================================== -->

<!--  ==============================================     lOAD User's Book to his Cart    ====================================================== -->

<script type="text/javascript">

  function cart() {
    $.ajax({
              type: 'GET',
              url: '/user/getCart',
              dataType:'json',
              success:function(response){
              //   <"pre">
              // console.log(response);
              //   <"/pre">
                
                  var rows = ""
                  $.each(response.carts, function(key,value){
                    rows += `<tr>
                  
                    <td><img src="/${value.options.image} " alt="imga" style="width:70px; height:70px;"></td>
                    <td>
                        <div class="product-name"><a href="#">${ @if(session()->get('language') == 'french')value.name @else value.name @endif}</a></div>
                         
                        <div class="price">
                           ${value.price}
                        </div>
                    </td>

                    <td>
                         <button type="submit" class="btn btn-danger btn-sm"id="${value.rowId}" onclick="cartDecrement(this.id)"> - </button>
                        <input type="text" value="${value.qty}" min="1" max="100" disabled="" style= "width:30px; height:30px;">
                        <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)"> + </button>   
                      </td>
                      <td>
                          <strong> $ ${value.subtotal}</strong>
                      </td>

                    <td>
                        <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
                    </td>
                </tr>
                `
                
        });
                  
                  $('#cartPage').html(rows);
              }
          })
        }
    cart();
     </script>
   <!--  ==============================================     END  lOAD User's Book to his Cart    ====================================================== -->

   <!--  ==============================================     START DELETE User's Book to his Cart   ====================================================== -->
<script type="text/javascript">

  function cartRemove(id){
    $.ajax({
        type: 'GET',
        url: '/user/removeCart/'+id,
        dataType:'json',
        success:function(data){
        cart();
        miniCart();
         // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message 
        }
    });
}
</script>
<!--  ==============================================      DELETE User's Book to his Cart  ====================================================== -->

 <!--  ==============================================     START  Cart Increment   ====================================================== -->
 <script type="text/javascript">

    function cartIncrement(rowId){
      $.ajax({
          type: 'GET',
          url: '/cartIncrement/'+rowId,
          dataType:'json',
          success:function(data){
                total();
                cart();
                miniCart();        
          }
      });
  }
  </script>
  <!--  ==============================================      END Cart Increment  ====================================================== -->

   <!--  ==============================================     START  Cart Decrement   ====================================================== -->
 <script type="text/javascript">

    function cartDecrement(rowId){
      $.ajax({
          type: 'GET',
          url: '/cartDecrement/'+rowId,
          dataType:'json',
          success:function(data){
            total();
                cart();
                miniCart();        
          }
      });
  }
  </script>
  <!--  ==============================================      END Cart Decrement  ====================================================== -->

    <!--  ==============================================     START  Cart Total (Page myCart_view)  ====================================================== -->
 <script type="text/javascript">
function total(){
  $.ajax({
    type:'GET',
    url:"{{ url('/totalCalculation') }}" ,
    dataType: 'json',
    success:function(data){
      $('#total').html(
        `<tr>
                <th>
                    <div class="cart-grand-total">
                        Grand Total<span class="inner-left-md">$ ${data.cartTotal}</span>
                    </div>
                </th>
            </tr>`                           
      )
    }
  })
}
total();

</script>
  <!--  ==============================================      END Cart  Cart Total (Page myCart_view)  ====================================================== -->
body>
</html>