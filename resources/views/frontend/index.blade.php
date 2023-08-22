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
          
         
          
        </div>
        <!-- /.homebanner-holder --> 
        <!-- ============================================== CONTENT : END ============================================== --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
  </div>





@endsection

