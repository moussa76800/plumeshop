@php
$setting = App\Models\SiteSetting::find(1);
@endphp


<header class="header-style-1"> 
  
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
      <div class="container">
        <div class="header-top-inner">
          <div class="cnt-account">
            <ul class="list-unstyled">
    <li><a href="{{ route('wishList') }}"><i class="icon fa fa-heart"></i>@if (session()->get('locale') == 'fr') Liste des Souhaits @else WishList @endif</a></li>

    <li><a href="{{ route('myCart') }}"><i class="icon fa fa-shopping-cart"></i>
        @if (session()->get('locale') == 'fr') Mon panier @else My Cart @endif
    </a></li>

    <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>
        @if (session()->get('locale') == 'fr') Verifier @else Checkout @endif
    </a></li>

    <li><a href="{{ route('order_tracking') }}" type="button" data-toggle="modal" data-target="#ordertraking"><i class="icon fa fa-check"></i>
        @if (session()->get('locale') == 'fr') Suivi de commande @else Order Tracking @endif
    </a></li>

    <li>
        @auth
            <a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>
                @if (session()->get('locale') == 'fr') Mon compte @else My account @endif
            </a>
        @else
            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                @if (session()->get('locale') == 'fr') S'identifier/S'enregistrer @else Login/Register @endif
            </a>
        @endauth
    </li>
</ul>

</div>
<!-- /.cnt-account -->

<div class="cnt-block">
<ul class="list-unstyled list-inline">

    <li class="dropdown dropdown-small">
        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
            @if (session()->get('locale') == 'fr') Langue @else Language @endif
        </span><b class="caret"></b></a>
        <ul class="dropdown-menu">
            @if (session()->get('locale') == 'fr')
            <li><a href="{{ route('english') }}">English</a></li>
            @else
                <li><a href="{{ route('french') }}">Français</a></li>
            @endif
        </ul>
    </li>
</ul>

            <!-- /.list-unstyled --> 
          </div> 
          <!-- /.cnt-cart -->
          <div class="clearfix"></div>
        </div>
        <!-- /.header-top-inner --> 
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.header-top --> 
    <!-- ============================================== TOP MENU : END ============================================== -->
    <style>
      .logo img {
        width: 90%;
        height: auto;
}
    </style>
    <div class="main-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
            <!-- ============================================================= LOGO ============================================================= -->
            <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
            <!-- /.logo --> 
            <!-- ============================================================= LOGO : END ============================================================= --> </div>
          <!-- /.logo-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
            <!-- /.contact-row --> 
            <!-- ============================================================= SEARCH AREA ============================================================= -->
            <div class="search-area">
              <form method="post" action="{{ route('search_book') }}">
                @csrf
                <div class="control-group">
                  
                  <input class="search-field"  id="search" name="search"  
                  @if (session()->get('locale') == 'fr')placeholder="Rechercher..." @else placeholder="To Research ..." @endif />
                  <button class="search-button" type="submit"></button>  </div>
              </form>
              <div id="searchBooks"></div>
            </div>
            <!-- /.search-area --> 
            <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
          <!-- /.top-search-holder -->
          
          <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
            
            <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
              <div class="items-cart-inner">
                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                <div class="total-price-basket">
                  @if (session()->get('locale') == 'fr')<span class="lbl"> panier -  <span class="total-price"> <span class="sign"> €</span>
                   @else cart --</span> <span class="total-price"> <span class="sign">$ @endif</span><span class="value" id="cartSubTotal"></span> </span> </div>
              </div>
              </a>
              <ul class="dropdown-menu">
                <li>
                <!--  START Mini-Cart With AJAX -->
                <div id="miniCart">

                </div> 

                <!--  END Mini-Cart With AJAX --> 

                    <div class="clearfix cart-total">
                    <div class="pull-right"> @if (session()->get('locale') == 'fr') <span class="text">Sous-Total :</span>@else <span class="text">Sub Total :</span> @endif<span class='price' id="cartSubTotal"></span> </div>
                    <div class="clearfix"></div>
                    <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20"> @if (session()->get('language') == 'french')Verification @else Checkout @endif</a> </div>
                  <!-- /.cart-total--> 
                  
                </li>
              </ul>
              <!-- /.dropdown-menu--> 
            </div>
            <!-- /.dropdown-cart --> 
            
            <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
          <!-- /.top-cart-row --> 
        </div>
        <!-- /.row --> 
        
      </div>
      <!-- /.container --> 
      
    </div>
    <!-- /.main-header --> 
    
    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
      <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
          <div class="navbar-header">
         <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
         <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                <div class="nav-outer">
                    <ul class="nav navbar-nav">
                        <li class="dropdown yamm-fw">
                            <a href="{{ url('/') }}" >
                              @if (session()->get('locale') == 'fr')Accueil @else Home @endif
                            </a>
                        </li>
                        <li class="dropdown yamm-fw">
                            <a href="{{ url('/aPropos') }}">
                              @if (session()->get('locale') == 'fr') A-propos @else About-Us @endif
                            </a>
                        </li>
                        <li class="dropdown yamm-fw">
                            <a href="{{ url('/donnate/book') }}" >
                              @if (session()->get('locale') == 'fr') Donnez vos livres @else Donnate your Books @endif
                            </a>
                        </li>
                        <!-- ... Autres éléments de navigation ... -->
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->
        </div>
        
    </div>
    <!-- /.yamm -->
  </div>
  <!-- /.container -->
</div>
<!-- /.header-nav -->

    
    <!-- ============================================== NAVBAR : END ============================================== --> 
    
<!-- Order Traking Modal -->
<div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@if (session()->get('language') == 'french')  Suivez Maintenant @endifTrack Votre Commande @else  Track Now @endifTrack Your Order @endif </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         
        <form method="post" action="{{ route('order_tracking') }}">
          @csrf
         <div class="modal-body">
          <label> @if (session()->get('locale') == 'fr')Code Facture @else Invoice Code @endif</label>
          <input type="text" name="code" required="" class="form-control" @if (session()->get('language') == 'french')placeholder="Numéro de facture de votre commande " @else placeholder="Your Order Invoice Number" @endif>           
         </div>

         <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> @if (session()->get('locale') == 'fr')Suivre maintenant @else Track Now @endif </button>
          
        </form> 


      </div>
       
    </div>
  </div>
</div>
 

  </header>