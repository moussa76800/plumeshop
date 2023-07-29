@extends('frontend.main_master')
@section('content')
@section('title')
@if (session()->get('language') == 'french') Accueil @else Home  @endif 
@endsection
 
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row"> 
        <!-- ============================================== SIDEBAR ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
          
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.common.vertical_menu')
          <!-- ================================== TOP NAVIGATION : END ================================== --> 
          <div id="menu-lateral">
        </div>
       
        <style>
        function toggleMenu() {
  var menu = document.getElementById("menu-lateral");
  if (menu.style.display === "none") {
    menu.style.display = "block";
  } else {
    menu.style.display = "none";
  }
}
 </style>
        
          <!-- ============================================== HOT DEALS ============================================== -->
           {{-- <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">hot deals</h3>
            <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
              <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image"> <img src="{{ asset('frontend/assets/images/hot-deals/p25.jpg') }}" alt=""> </div>
                    <div class="sale-offer-tag"><span>49%<br>
                      off</span></div>
                    <div class="timing-wrapper">
                      <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                      </div>
                      <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  
                  <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price"> $600.00 </span> <span class="price-before-discount">$800.00</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </div>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
              </div>
              <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image"> <img src="{{ asset('frontend/assets/images/hot-deals/p5.jpg') }}" alt=""> </div>
                    <div class="sale-offer-tag"><span>35%<br>
                      off</span></div>
                    <div class="timing-wrapper">
                      <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span class="value">Days</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                      </div>
                      <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  
                  <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price"> $600.00 </span> <span class="price-before-discount">$800.00</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </div>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
              </div>
              <div class="item">
                <div class="products">
                  <div class="hot-deal-wrapper">
                    <div class="image"> <img src="{{ asset('frontend/assets/images/hot-deals/p10.jpg') }}" alt=""> </div>
                    <div class="sale-offer-tag"><span>35%<br>
                      off</span></div>
                    <div class="timing-wrapper">
                      <div class="box-wrapper">
                        <div class="date box"> <span class="key">120</span> <span class="value">Days</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                      </div>
                      <div class="box-wrapper">
                        <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                      </div>
                      <div class="box-wrapper hidden-md">
                        <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.hot-deal-wrapper -->
                  
                  <div class="product-info text-left m-t-20">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"> <span class="price"> $600.00 </span> <span class="price-before-discount">$800.00</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <div class="add-cart-button btn-group">
                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                      </div>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
              </div>
            </div>
            <!-- /.sidebar-widget --> 
          </div> --}}
          <!-- ============================================== HOT DEALS: END ============================================== --> 
          
          <!-- ============================================== SPECIAL OFFER ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title"> @if (session()->get('language') == 'french') Offre Speciale @else Special Offer @endif </h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                <div class="item">
                  <div class="products special-product">
                    @foreach ($special_offer as $book)
                        
                   
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"><a href=" {{ url('book/detail/'.$book->id.'/'.$book->title ) }}" ><img src="{{ asset( $book->image) }}" alt=""> </a> </div>
                              <!-- /.image --> 
                               
                            <div>
                              @if ($book->special_offer == 1) 
                                @if ($book->discount_price != NULL) 
                                  @php
                                    $amount = $book->price - $book->discount_price;
                                    $discount = ($amount / $book->price) * 100;
                                  @endphp
                                  <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else 
                                
                                @endif
                              @endif
                            </div>
                                      
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"> <a href="{{ url('book/detail/'.$book->id.'/'.$book->title ) }}">
                                {{ $book->title }}
                                            </a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price}} @else $ {{ $book->price }} @endif  </span> </div>
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
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
          <!-- ============================================== PRODUCT TAGS ============================================== -->
          {{-- <div class="sidebar-widget product-tag wow fadeInUp">
            <h3 class="section-title">Product tags</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="tag-list"> <a class="item" title="Phone" href="category.html">Phone</a> <a class="item active" title="Vest" href="category.html">Vest</a> <a class="item" title="Smartphone" href="category.html">Smartphone</a> <a class="item" title="Furniture" href="category.html">Furniture</a> <a class="item" title="T-shirt" href="category.html">T-shirt</a> <a class="item" title="Sweatpants" href="category.html">Sweatpants</a> <a class="item" title="Sneaker" href="category.html">Sneaker</a> <a class="item" title="Toys" href="category.html">Toys</a> <a class="item" title="Rose" href="category.html">Rose</a> </div>
              <!-- /.tag-list --> 
            </div>
            <!-- /.sidebar-widget-body --> 
          </div> --}}
          <!-- /.sidebar-widget --> 
          <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
          <!-- ============================================== SPECIAL DEALS ============================================== -->
          
          {{-- <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">Special Deals</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p28.jpg') }}"  alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p15.jpg') }}"  alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p26.jpg') }}"  alt="image"> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p18.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p17.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p16.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
                <div class="item">
                  <div class="products special-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p15.jpg') }}" alt="images">
                                <div class="zoom-overlay"></div>
                                </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p14.jpg') }}"  alt="">
                                <div class="zoom-overlay"></div>
                                </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p13.jpg') }}" alt="image"> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Shirt</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div> --}}
          <!-- /.sidebar-widget --> 
          <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
          <!-- ============================================== NEWSLETTER ============================================== -->
          <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
            <h3 class="section-title">Newsletters</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <p>Sign Up for Our Newsletter!</p>
              <form>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                </div>
                <button class="btn btn-primary">Subscribe</button>
              </form>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div>
          <!-- /.sidebar-widget --> 
          <!-- ============================================== NEWSLETTER: END ============================================== --> 
          
          <!-- ============================================== Testimonials============================================== -->
           <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
            <div id="advertisement" class="advertisement">
              <div class="item">
                <div class="avatar"><img src="{{ asset('frontend/assets/images/testimonials/member1.png') }}" alt="Image"></div>
                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                <div class="clients_author">John Doe <span>Abc Company</span> </div>
                <!-- /.container-fluid --> 
              </div>
              <!-- /.item -->
              
             
              
            </div>
            <!-- /.owl-carousel --> 
          </div> 
          
          <!-- ============================================== Testimonials: END ============================================== -->
          
          {{-- <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>--}}
        </div> 
        <!-- /.sidemenu-holder --> 
        <!-- ============================================== SIDEBAR : END ============================================== --> 
        
        <!-- ============================================== CONTENT ============================================== -->
        <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
          <!-- ========================================== SECTION – HERO ========================================= -->

         
          <div id="hero">
            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                @foreach($sliders as $slider)
                    @if($slider->title =="Plumeshop,la vraie librairie.")
                        <div class="item" style="background-image: url({{$slider->slider_img}});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left" >
                                    <div class="big-text fadeInDown-1" style="color: white; font-size: 5rem; font-weight: bold;">{{ $slider->title }}</div>
                                    <div class="excerpt fadeInDown-2 hidden-xs" style="color: white; font-size: 3rem;"> <span><b>{{ $slider->description }}.</b></span> </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="{{ route('slide_plumeshop') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">En Savoir Plus</a>
                                    </div>
                                </div>
                                <!-- /.caption --> 
                            </div>
                            <!-- /.container-fluid --> 
                        </div>
                        <!-- /.item -->
                    @elseif($slider->title =="Blog")
                        <div class="item" style="background-image: url({{$slider->slider_img}});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="big-text fadeInDown-1" style="color: white; font-size: 5rem; font-weight: bold;">{{ $slider->title }}</div>
                                    <div class="excerpt fadeInDown-2 hidden-xs" style="color: white; font-size: 3rem;"> <span><b>{{ $slider->description }}.</b></span> </div>
                                    <div class="button-holder fadeInDown-2">
                                        <a href="{{ url('/blog') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">En Savoir Plus</a>
                                    </div>
                                </div>
                                <!-- /.caption --> 
                            </div>
                            <!-- /.container-fluid --> 
                        </div>
                        <!-- /.item --> 
                    @else
                        {{-- style="text-align: center; color:white;" --}}
                        <div class="item" style="background-image: url({{$slider->slider_img}});">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="big-text fadeInDown-1" style="color: white; font-size: 5rem; font-weight: bold;">{{ $slider->title }}</div>
                                    <div class="excerpt fadeInDown-2 hidden-xs" style="color: white; font-size: 3rem;"> <span><b>{{ $slider->description }}.</b></span> </div>
                                    <div class="button-holder fadeInDown-3">
                                        <a href="{{ url('/subCategory/book/3/comics') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">En Savoir Plus</a>
                                    </div>
                                </div>
                                <!-- /.caption --> 
                            </div>
                            <!-- /.container-fluid --> 
                        </div>
                        <!-- /.item --> 
                    @endif
                @endforeach
            </div>
            <!-- /.owl-carousel --> 
        </div>
        
          
          <!-- ========================================= SECTION – HERO : END ========================================= --> 
          
          <!-- ============================================== INFO BOXES ============================================== -->
          {{-- <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
              <div class="row">
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">money back</h4>
                      </div>
                    </div>
                    <h6 class="text">30 Days Money Back Guarantee</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="hidden-md col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">free shipping</h4>
                      </div>
                    </div>
                    <h6 class="text">Shipping on orders over $99</h6>
                  </div>
                </div>
                <!-- .col -->
                
                <div class="col-md-6 col-sm-4 col-lg-4">
                  <div class="info-box">
                    <div class="row">
                      <div class="col-xs-12">
                        <h4 class="info-box-heading green">Special Sale</h4>
                      </div>
                    </div>
                    <h6 class="text">Extra $5 off on all items </h6>
                  </div>
                </div>
                <!-- .col --> 
              </div>
              <!-- /.row --> 
            </div> --}}
            <!-- /.info-boxes-inner -->           
          {{-- </div> --}}
          <!-- /.info-boxes --> 
          <!-- ============================================== INFO BOXES : END ============================================== --> 
          <!-- ============================================== SCROLL TABS ============================================== -->
          
          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left"> @if (session()->get('language') == 'french') Nouveaux @else New Books @endif</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if (session()->get('language') == 'french')Tout @else All @endif</a></li>
                @foreach($categories as $category)
                <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">{{ $category->name}}</a></li>
                @endforeach
                {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
                <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
              </ul>
              <!-- /.nav-tabs --> 
            </div>
            <div class="tab-content outer-top-xs">
              <div class="tab-pane in active" id="all">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                    @foreach ($newBook as $book)
                      <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"><a href=" {{ url('book/detail/'.$book->id.'/'.$book->title) }}" ><img src="{{  asset($book->image) }}"></a></div>
                            <!-- /.image -->
                            
                            <div>
                              @if ($book->newBook == 1) 
                                @if ($book->discount_price != NULL) 
                                  @php
                                    $amount = $book->price - $book->discount_price;
                                    $discount = ($amount / $book->price) * 100;
                                  @endphp
                                  <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else 
                                
                                @endif
                              @endif
                            </div>
                            
                            
                              
              </div>
                          <!-- /.product-image -->

                          
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('book/detail/'.$book->id.'/'.$book->title) }}">
                               {{ $book->title }}
                                          </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            @if ($book->discount_price == NULL)
                        <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price }} @else $ {{ $book->price }} @endif </span> </div>
                                @else
                        <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $amount }} </span> <span class="price-before-discount">  €  {{ $book->price }}</span> @else
                          $ {{$amount  }} </span> <span class="price-before-discount">  $  {{ $book->price }} @endif </div>
                      @endif
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                  <button class="btn btn-primary icon" type="button" title="wishlist" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button>
                                {{-- <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
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
                    <!-- /.item -->
                    @endforeach
                 </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              <!-- /.tab-pane -->
            

            
             @foreach($categories as $category)
              
                <div class="tab-pane " id="category{{ $category->id }}">
                  <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  
                      {{-- @php
                      $catwiseBook = App\Models\Book::where('categoryBook_id',$category->id)->orderBy('id','DESC')->get(); 
                    @endphp --}}
                    @php
                    $catwiseBook = App\Models\Book::where('categoryBook_id', $category->id)
                                                ->where('status', 1)
                                                // ->whereNull('discount_price')
                                                ->orderBy('id', 'DESC')
                                                ->get();
                @endphp
                        
                      
                        @forelse ($catwiseBook as $book)

                                               
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image"><a href=" {{ url('book/detail/'.$book->id.'/'.$book->title) }}" ><img src="{{  asset($book->image) }}"></a></div>
                              <!-- /.image -->
                              
                               
                              <div>
                                @if ($book->newBook == 1) 
                                  @if ($book->discount_price != NULL) 
                                    @php
                                      $amount = $book->price - $book->discount_price;
                                      $discount = ($amount / $book->price) * 100;
                                    @endphp
                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                  @else 
                                  
                                  @endif
                                @endif
                              </div>
                              
                                    
                    </div>
                            <!-- /.product-image -->
                            
                            <div class="product-info text-left">
                              <h3 class="name"><a href="detail.html">{{ $book->title }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($book->discount_price == NULL)
                                  <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price }}@else ${{ $book->price }} @endif </span> </div>
                                      @else
                              <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $amount}} </span> <span class="price-before-discount">  €  {{ $book->price }}</span> @else
                                $ {{$amount  }} </span> <span class="price-before-discount">  $  {{ $book->price }} @endif </div>
                            @endif
                              <!-- /.product-price --> 
                              
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                   <li>
                                    <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button>
                                 
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
                      <!-- /.item -->

                      @empty
                      <h5 class="text-danger">@if (session()->get('language') == 'french') Pas de Livre Trouvé dans cette catégorie !! @else No product Found in this Categrory @endif !!</h5>
                            
                      @endforelse

                    </div>
                    <!-- /.home-owl-carousel --> 
                  </div>
                  <!-- /.product-slider --> 
                </div>
                <!-- /.tab-pane -->
              @endforeach
            
             
            </div>
            <!-- /.tab-content --> 
          </div>
          <!-- /.scroll-tabs --> 
            
            
          <!-- ============================================== SCROLL TABS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class=" col-sm-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="frontend/assets/images/banners/2.webp" alt=""> </div>
                </div>
                <!-- /.wide-banner --> 
              </div>
              <!-- /.col -->
             
            </div>
            <!-- /.row --> 
          </div>  --}}
          <!-- /.wide-banners --> 
          
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 

          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          

          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left"> @if (session()->get('language') == 'french')Prochainement @else Futures Books @endif</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="">
                <li class="active"><a data-transition-type="backSlide" href="#allFeatured" data-toggle="tab">@if (session()->get('language') == 'french')Tout @else All @endif</a></li>
                @foreach($categories as $category)
                <li><a data-transition-type="backSlide" href="#categoryFeatured{{$category->id}}" data-toggle="tab">{{ $category->name }}</a></li>
                @endforeach
                {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
                <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
              </ul>
              <!-- /.nav-tabs --> 
            </div>
            <div class="tab-content outer-top-xs">
              <div class="tab-pane in active" id="allFeatured">
                <div class="product-slider">
                  <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                    @foreach ($featured  as $book)
                      <div class="item item-carousel">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            <div class="image"> <a href="  {{ url('book/detail/'.$book->id.'/'.$book->title ) }}"><img src="{{  asset($book->image) }}"></a></div>
                            <!-- /.image -->
                            
                            <div>
                              @if ($book->featured == 1) 
                                @if($book->discount_price != NULL) 
                                  @php
                                    $amount = $book->price - $book->discount_price;
                                    $discount = ($amount / $book->price) * 100;
                                  @endphp
                                  <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                @else 
                                  <div class="tag featured blue"><span></span></div>
                                @endif
                              @endif
                            </div>
                            
                                          
                          </div> 
                          <!-- /.product-image -->

                          
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href="{{ url('book/detail/'.$book->id.'/'.$book->title ) }}">
                              {{ $book->title }} 
                                          </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="description"></div>

                            @if ($book->discount_price == NULL)
                        <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price }} @else $ {{ $book->price }} @endif </span> </div>
                                @else
                        <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price - $book->discount_price }} </span> <span class="price-before-discount">  €  {{ $book->prix }}</span> @else
                          $ {{$book->price - $book->discount_price  }} </span> <span class="price-before-discount">  $  {{ $book->price}} @endif </div>
                      @endif
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                </li>
                                 <li>
                                  <button class="btn btn-primary icon" type="button" title="Wislist" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button></li>
                                {{-- <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li> --}}
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
                    <!-- /.item -->
                     @endforeach
                 </div>
                  <!-- /.home-owl-carousel --> 
                </div>
                <!-- /.product-slider --> 
              </div>
              <!-- /.tab-pane -->
           

            
             @foreach($categories as $category)
              
                <div class="tab-pane " id="categoryFeatured{{ $category->id }}">
                  <div class="product-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  
                      @php
                    $catwiseBook = App\Models\Book::where('categoryBook_id', $category->id)
                                                ->where('status', 1)
                                                ->Where('featured', 1)
                                                ->orderBy('id', 'DESC')
                                                ->get();
                     @endphp
                        
                      
                        @forelse ($catwiseBook as $book)

                                               
                      <div class="item item-carousel">
                        <div class="products">
                          <div class="product">
                            <div class="product-image">
                              <div class="image"><a href="  {{ url('book/detail/'.$book->id.'/'.$book->title ) }}" ><img src="{{  asset($book->image) }}"></a></div>
                              <!-- /.image -->
                              
{{--  
                              @php
                              $amount = $book->price - $book->discount_price;
                              $discount = ($amount/$book->price) * 100;
                              @endphp  --}}

                      
                      
                              <div>
                                @if ($book->featured == 1) 
                                  @if($book->discount_price != NULL) 
                                    @php
                                      $amount = $book->price - $book->discount_price;
                                      $discount = ($amount / $book->price) * 100;
                                    @endphp
                                    <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                  @else 
                                    <div class="tag featured blue"><span></span></div>
                                  @endif
                                @endif
                              </div>
                              

                                    
                    </div> 
                            <!-- /.product-image -->
                            
                            <div class="product-info text-left">
                              <h3 class="name"><a href="detail.html">{{ $book->title }}</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="description"></div>
                              @if ($book->discount_price == NULL)
                                  <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price }}@else ${{ $book->price }} @endif </span> </div>
                                      @else
                              <div class="product-price"> <span class="price">@if (session()->get('language') == 'french') € {{ $book->price - $book->discount_price}} </span> <span class="price-before-discount">  €  {{ $book->price }}</span> @else
                                $ {{$book->price - $book->discount_price  }} </span> <span class="price-before-discount">  $  {{ $book->price }} @endif </div>
                            @endif
                              <!-- /.product-price --> 
                              
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                                  </li>
                                   <li>
                                    <button class="btn btn-primary icon" type="button" title="Wislist" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button></li>
                                  {{-- <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>  --}}
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
                      <!-- /.item -->

                      @empty
                      <h5 class="text-danger">@if (session()->get('language') == 'french') Pas de Livre Trouvé dans cette catégorie !! @else No product Found in this Category @endif !!</h5>
                            
                      @endforelse

                    </div>
                    <!-- /.home-owl-carousel --> 
                  </div>
                  <!-- /.product-slider --> 
                </div>
                <!-- /.tab-pane -->
              @endforeach
            
             
            </div>
            <!-- /.tab-content --> 
          </div>
          <!-- /.scroll-tabs --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          <!-- ============================================== WIDE PRODUCTS ============================================== -->
          {{-- <div class="wide-banners wow fadeInUp outer-bottom-xs">
            <div class="row">
              <div class="col-md-12">
                <div class="wide-banner cnt-strip">
                  <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
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
          </div> --}}
          <!-- /.wide-banners --> 
          <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
          <!-- ============================================== BEST SELLER ============================================== -->
          
          {{-- <div class="best-deal wow fadeInUp outer-bottom-xs">
            <h3 class="section-title">Best seller</h3>
            <div class="sidebar-widget-body outer-top-xs">
              <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p20.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p21.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p22.jp') }}g" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p23.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p24.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="frontend/assets/images/products/p25.jpg" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
                <div class="item">
                  <div class="products best-product">
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p26.jpg') }}" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
                              <!-- /.product-price --> 
                              
                            </div>
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-micro-row --> 
                      </div>
                      <!-- /.product-micro --> 
                      
                    </div>
                    <div class="product">
                      <div class="product-micro">
                        <div class="row product-micro-row">
                          <div class="col col-xs-5">
                            <div class="product-image">
                              <div class="image"> <a href="#"> <img src="{{ asset('frontend/assets/images/products/p27.jp') }}g" alt=""> </a> </div>
                              <!-- /.image --> 
                              
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col2 col-xs-7">
                            <div class="product-info">
                              <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                              <div class="rating rateit-small"></div>
                              <div class="product-price"> <span class="price"> $450.99 </span> </div>
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
              </div>
            </div>
            <!-- /.sidebar-widget-body --> 
          </div> --}}
          <!-- /.sidebar-widget --> 
          <!-- ============================================== BEST SELLER : END ============================================== --> 
          
          <!-- ============================================== BLOG SLIDER ============================================== -->
          <section class="section latest-blog outer-bottom-vs wow fadeInUp">
            <h3 class="section-title">Blog </h3>

            <div class="blog-slider-container outer-top-xs">
              <div class="owl-carousel blog-slider custom-carousel">
                
  
    @foreach($blogpost as $blog)
                <div class="item">
                  <div class="blog-post">
                    <div class="blog-post-image">
                      <div class="image"> <a href="blog.html"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                    </div>
                    <!-- /.blog-post-image -->
                    
                    <div class="blog-post-info text-left">
                      <h3 class="name"><a href="#">@if(session()->get('language') == 'french') {{ $blog->post_title_fr}} @else {{ $blog->post_title_en }} @endif</a></h3>
  
  
                      @if(session()->get('language') == 'english')
                      <span class="date-time"> <i>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</i></span>
                        @else
                      @php
                        Carbon\Carbon::setLocale('fr');
                      @endphp
                        <span class="date-time"><i> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</i></span>
                      @endif

                      <p class="text">@if(session()->get('language') == 'french') {!! Str::limit($blog->post_details_fr, 100 )  !!} @else {!! Str::limit($blog->post_details_en, 100 )  !!} @endif</p>
                    
                      <a href="{{ route('post.details',$blog->id) }}" class="lnk btn btn-primary">@if(session()->get('language') == 'french')Lire Plus @else Read more @endif</a> </div>
                    <!-- /.blog-post-info --> 
                    
                  </div>
                  <!-- /.blog-post --> 
                </div>
                <!-- /.item -->
            @endforeach 
               
                
              </div>
              <!-- /.owl-carousel --> 
            </div>
            <!-- /.blog-slider-container --> 
          </section>
          <!-- /.section --> 
          <!-- ============================================== BLOG SLIDER : END ============================================== --> 
          
          <!-- ============================================== FEATURED PRODUCTS ============================================== -->
          {{-- <section class="section wow fadeInUp new-arriavls">
            <h3 class="section-title">New Arrivals</h3>
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p19.jpg') }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
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
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p28.jpg') }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag new"><span>new</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
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
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p30.jpg') }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag hot"><span>hot</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
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
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p1.jpg') }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag hot"><span>hot</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
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
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p2.jpg') }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
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
              <!-- /.item -->
              
              <div class="item item-carousel">
                <div class="products">
                  <div class="product">
                    <div class="product-image">
                      <div class="image"> <a href="detail.html"><img  src="{{ asset('frontend/assets/images/products/p3.jpg') }}" alt=""></a> </div>
                      <!-- /.image -->
                      
                      <div class="tag sale"><span>sale</span></div>
                    </div>
                    <!-- /.product-image -->
                    
                    <div class="product-info text-left">
                      <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                      <div class="rating rateit-small"></div>
                      <div class="description"></div>
                      <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                      <!-- /.product-price --> 
                      
                    </div>
                    <!-- /.product-info -->
                    <div class="cart clearfix animate-effect">
                      <div class="action">
                        <ul class="list-unstyled">
                          <li class="add-cart-button btn-group">
                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
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
              <!-- /.item --> 
            </div>
            <!-- /.home-owl-carousel --> 
          </section> --}}
          <!-- /.section --> 
          <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
          
        </div>
        <!-- /.homebanner-holder --> 
        <!-- ============================================== CONTENT : END ============================================== --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      {{-- <div id="brands-carousel" class="logo-slider wow fadeInUp">
        <div class="logo-slider-inner">
          <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand1.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item m-t-10"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand2.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand3.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand4.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand5.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand6.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand2.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand4.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand1.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item-->
            
            <div class="item"> <a href="#" class="image"> <img data-echo="frontend/assets/images/brands/brand5.png" src="frontend/assets/images/blank.gif" alt=""> </a> </div>
            <!--/.item--> 
          </div>
          <!-- /.owl-carousel #logo-slider --> 
        </div>
        <!-- /.logo-slider-inner --> 
        
      </div> --}}
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
    </div>
    <!-- /.container --> 
  </div>





@endsection

