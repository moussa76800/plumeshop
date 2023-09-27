@extends('frontend.main_master')
@section('content')
@section('title')
   @if (session()->get('locale') == 'fr') Accueil @else Home  @endif 
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
          /* Style pour la pop-up */
          .popup {
              display: none;
              position: fixed;
              top: 50%;
              left: 50%;
              transform: translate(-50%, -50%);
              background-color: #f0f0f0; /* Couleur de fond légèrement grise */
              box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.4); /* Ombre plus prononcée */
              padding: 20px;
              max-width: 400px;
              width: 90%; /* Légèrement réduit pour plus de style */
              text-align: center;
              z-index: 1000;
              border-radius: 10px; /* Coins arrondis */
          }
      
          /* Style pour le contenu de la pop-up */
          .popup-content {
              text-align: center;
              color: #333; /* Couleur du texte plus foncée */
          }
      
          /* Style pour le titre de la pop-up */
          .popup h2 {
              font-size: 24px; /* Taille de police plus grande pour le titre */
              margin-bottom: 20px; /* Espace entre le titre et les options */
          }
      
          /* Style pour les boutons radio */
          .popup label {
              display: block;
              margin: 10px 0;
              font-size: 18px; /* Taille de police légèrement plus grande pour les options */
          }
      
          /* Style pour le bouton de validation */
          .popup button {
              background-color: #007BFF;
              color: #fff;
              border: none;
              padding: 12px 24px;
              cursor: pointer;
              font-size: 18px; /* Taille de police légèrement plus grande pour le bouton */
              border-radius: 5px; /* Coins arrondis pour le bouton */
              transition: background-color 0.3s ease; /* Animation de changement de couleur au survol */
          }
      
          /* Style pour le bouton de validation au survol */
          .popup button:hover {
              background-color: #0056b3; /* Couleur légèrement plus foncée au survol */
          }

         

      </style>
      
    
      <!-- Pop-up -->
<div id="popup" class="popup">
  <div class="popup-content">
      <h2>Quelle est votre humeur aujourd'hui ?</h2>
      <label>
          <input type="radio" name="humeur" value="heureux"> Heureux
      </label>
      <label>
          <input type="radio" name="humeur" value="triste"> Triste
      </label>
      <label>
          <input type="radio" name="humeur" value="en colère"> En colère
      </label>
      <label>
          <input type="radio" name="humeur" value="calme"> Calme
      </label>
      <button onclick="selectionnerHumeur()">Valider</button>
      <button onclick="fermerPopup()">Annuler</button> <!-- Bouton d'annulation -->
  </div>
</div>


           
          
          <!-- ============================================== SPECIAL OFFER ============================================== -->
          
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
            <h3 class="section-title">  @if (session()->get('locale') == 'fr') Offre Speciale @else Special Offer @endif </h3>
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
                              <div class="product-price"> <span class="price"> @if (session()->get('locale') == 'fr') € {{ $book->price}} @else $ {{ $book->price }} @endif  </span> </div>
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
                <div class="item" style="background-image: url({{$slider->slider_img}});">
                    <div class="container-fluid">
                        <div class="caption bg-color vertical-center text-left">
                            <div class="big-text fadeInDown-1" style="color: white; font-size: 5rem; font-weight: bold;"> {{ trans("categories.{$slider->title}") }}</div>
                            <div class="excerpt fadeInDown-2 hidden-xs" style="color: white; font-size: 3rem;"> <span><b> {{ trans("categories.{$slider->description}") }}</b></span> </div>
                            <div class="button-holder fadeInDown-3">
                                @if($slider->title =="Plumeshop, la vraie librairie.")
                                    <a href="{{ url('/a_propos') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">  @if (session()->get('locale') == 'fr')En Savoir Plus @else Learn more @endif</a>
                                @elseif($slider->title =="Pour tous les âges")
                                    <a href="{{ url('/subCategory/book/3/comics') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button"> @if (session()->get('locale') == 'fr')En Savoir Plus @else Learn more @endif</a>
                                @else
                                    <a href="{{ url('/blog') }}" class="btn-lg btn btn-uppercase btn-primary shop-now-button"> @if (session()->get('locale') == 'fr')En Savoir Plus @else Learn more @endif</a>
                                @endif
                            </div>
                        </div>
                        <!-- /.caption -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.item -->
                @endforeach
            </div>
            <!-- /.owl-carousel -->
        </div>
        
          
          <!-- ========================================= SECTION – HERO : END ========================================= --> 
          
         
          <!-- ============================================== SCROLL TABS ============================================== -->
          
          <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
            <div class="more-info-tab clearfix ">
              <h3 class="new-product-title pull-left">    @if (session()->get('locale') == 'fr') Nouveaux @else New Books @endif</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="">
                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">   @if (session()->get('locale') == 'fr')Tout @else All @endif</a></li>
                @foreach($categories as $category)
                <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">  {{ trans("categories.{$category->name}") }}</a></li>
                @endforeach
               
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
                        <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $book->price }} @else $ {{ $book->price }} @endif </span> </div>
                                @else
                        <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $amount }} </span> <span class="price-before-discount">  €  {{ $book->price }}</span> @else
                          $ {{$amount  }} </span> <span class="price-before-discount">  $  {{ $book->price }} @endif </div>
                      @endif
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" type="button" title=" @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button"> @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif</button>
                                </li>
                                  <button class="btn btn-primary icon" type="button" title="@if (session()->get('locale') == 'fr')Liste des Souhaits @else Wislist @endif" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button>
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
                                  <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $book->price }}@else ${{ $book->price }} @endif </span> </div>
                                      @else
                              <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $amount}} </span> <span class="price-before-discount">  €  {{ $book->price }}</span> @else
                                $ {{$amount  }} </span> <span class="price-before-discount">  $  {{ $book->price }} @endif </div>
                            @endif
                              <!-- /.product-price --> 
                              
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" type="button" title=" @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button"> @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif</button>
                                  </li>
                                   <li>
                                    <button class="btn btn-primary icon" type="button" title="@if (session()->get('locale') == 'fr')Liste des Souhaits @else Wislist @endif" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button>
                                 
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
                      <h5 class="text-danger">   @if (session()->get('locale') == 'fr') Pas de Livre Trouvé dans cette catégorie !! @else No product Found in this Categrory @endif !!</h5>
                            
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
              <h3 class="new-product-title pull-left">    @if (session()->get('locale') == 'fr')Prochainement @else Futures Books @endif</h3>
              <ul class="nav nav-tabs nav-tab-line pull-right" id="">
                <li class="active"><a data-transition-type="backSlide" href="#allFeatured" data-toggle="tab">   @if (session()->get('locale') == 'fr')Tout @else All @endif</a></li>
                @foreach($categories as $category)
                <li><a data-transition-type="backSlide" href="#categoryFeatured{{$category->id}}" data-toggle="tab">  {{ trans("categories.{$category->name}") }}</a></li>
                @endforeach
                
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
                        <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $book->price }} @else $ {{ $book->price }} @endif </span> </div>
                                @else
                        <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $book->price - $book->discount_price }} </span> <span class="price-before-discount">  €  {{ $book->prix }}</span> @else
                          $ {{$book->price - $book->discount_price  }} </span> <span class="price-before-discount">  $  {{ $book->price}} @endif </div>
                      @endif
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                              <ul class="list-unstyled">
                                <li class="add-cart-button btn-group">
                                  <button class="btn btn-primary icon" type="button" title= @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                  <button class="btn btn-primary cart-btn" type="button"> @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif </button>
                                </li>
                                 <li>
                                  <button class="btn btn-primary icon" type="button" title=" @if (session()->get('locale') == 'fr')Liste des Souhaits @else Wishlist @endif" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button></li>
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
                                  <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $book->price }}@else ${{ $book->price }} @endif </span> </div>
                                      @else
                              <div class="product-price"> <span class="price">   @if (session()->get('locale') == 'fr') € {{ $book->price - $book->discount_price}} </span> <span class="price-before-discount">  €  {{ $book->price }}</span> @else
                                $ {{$book->price - $book->discount_price  }} </span> <span class="price-before-discount">  $  {{ $book->price }} @endif </div>
                            @endif
                              <!-- /.product-price --> 
                              
                            </div>
                            <!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                              <div class="action">
                                <ul class="list-unstyled">
                                  <li class="add-cart-button btn-group">
                                    <button class="btn btn-primary icon" type="button" title=" @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button"> @if (session()->get('locale') == 'fr')Ajouter au Panier @else Add to cart @endif</button>
                                  </li>
                                   <li>
                                    <button class="btn btn-primary icon" type="button" title=" @if (session()->get('locale') == 'fr')Liste des Souhaits @else Wishlist @endif" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button></li>
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
                      <h5 class="text-danger">   @if (session()->get('locale') == 'fr') Pas de Livre Trouvé dans cette catégorie !! @else No product Found in this Category @endif !!</h5>
                            
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
                      <h3 class="name"><a href="#">  {{ trans("categories.{$blog->post_title}") }} </a></h3>
  
  
                      @if(session()->get('language') == 'english')
                      <span class="date-time"> <i>{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</i></span>
                        @else
                      @php
                        Carbon\Carbon::setLocale('fr');
                      @endphp
                        <span class="date-time"><i> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</i></span>
                      @endif

                      <p class="text">{!! Str::limit(trans("categories.{$blog->post_details}"), 100 ) !!}</p>

                    
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


  <script>

      // Fonction pour afficher la pop-up si le cookie n'existe pas
      function afficherPopup() {
          // Vérifiez si le cookie de la pop-up existe
          if (document.cookie.indexOf("popupShown=true") === -1) {
              const popup = document.getElementById("popup");
              popup.style.display = "block";
          }
      }

      // Fonction pour fermer la pop-up sans sélection
      function fermerPopup() {
          const popup = document.getElementById("popup");
          popup.style.display = "none";
      }
        
        // Définissez un cookie pour indiquer que la pop-up a été affichée et expire après 10 minutes
      var expirationDate = new Date();
      expirationDate.setTime(expirationDate.getTime() + (5 * 60 * 1000)); // 10 minutes
      document.cookie = "popupShown=true; expires=" + expirationDate.toUTCString() + "; path=/";
        
        // Fonction pour sélectionner l'humeur et masquer la pop-up
      function selectionnerHumeur() {
          let selectedHumeur = "";
          const humeurButtons = document.getElementsByName("humeur");

          for (const button of humeurButtons) {
              if (button.checked) {
                  selectedHumeur = button.value;
                  break;
              }
          }
          
         
            // Rediriger l'utilisateur vers la sous-catégorie en fonction de sa sélection
            switch (selectedHumeur) {
                case "heureux":
                    window.location.href = "http://127.0.0.1:8000/subCategory/book/3/comics"; // Remplacez "/sous-categorie-heureux" par l'URL de votre sous-catégorie correspondante.
                    break;
                case "triste":
                    window.location.href = "http://127.0.0.1:8000/subCategory/book/6/french's-literature";
                    break;
                case "en colère":
                    window.location.href = "http://127.0.0.1:8000/subCategory/book/5/fantastic";
                    break;
                case "calme":
                    window.location.href = "http://127.0.0.1:8000/subCategory/book/8/french-cooking";
                    break;
                default:
                    // Gérer le cas où aucune humeur n'est sélectionnée
                    break;
            }
          }
        
        
        // Afficher la pop-up lorsque la page se charge
        window.onload = afficherPopup;


        // JavaScript pour gérer le changement de thème
            const themeSelector = document.querySelector(".theme-selector");
            const body = document.body;

            themeSelector.addEventListener("change", function (event) {
                const selectedTheme = event.target.value;

                // Appliquez la classe de thème sélectionnée au corps de la page
                body.dataset.theme = selectedTheme;

                // Stockez le thème dans un cookie (facultatif)
                document.cookie = `theme=${selectedTheme}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
            });

            // Vérifiez si un thème est déjà stocké dans un cookie (facultatif)
            const storedTheme = document.cookie.replace(/(?:(?:^|.*;\s*)theme\s*=\s*([^;]*).*$)|^.*$/, "$1");

            if (storedTheme) {
                body.dataset.theme = storedTheme;
            }
          </script>





@endsection


