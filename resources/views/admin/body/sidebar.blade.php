@php
    $prefix = Request::route()->getPrefix();
    $route= Route::current()->getName();
@endphp


<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="index.html">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{ asset ('backend/images/logo-dark.png') }}" alt="">
						  <h3><b>Plumeshop</b> Admin</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
          <a href="{{ ($route == 'dashboard')? 'active':'' }}">
            <a href="{{ url('admin/dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li> 
        @php
        
        $category = (auth()->guard('admin')->user()->category == 1);
        $subcategory = (auth()->guard('admin')->user()->subcategory == 1);
        $product = (auth()->guard('admin')->user()->book == 1);
        $publisher = (auth()->guard('admin')->user()->publisher == 1);
        $author = (auth()->guard('admin')->user()->author == 1);
        $slider = (auth()->guard('admin')->user()->slider == 1);
        $coupons = (auth()->guard('admin')->user()->coupons == 1);
        $shipping = (auth()->guard('admin')->user()->shipping == 1);
        $blog = (auth()->guard('admin')->user()->blog == 1);
        $setting = (auth()->guard('admin')->user()->setting == 1);
        $returnorder = (auth()->guard('admin')->user()->returnOrder == 1);
        $review = (auth()->guard('admin')->user()->review == 1);
        $orders = (auth()->guard('admin')->user()->orders == 1);
        $stock = (auth()->guard('admin')->user()->stock == 1);
        $reports = (auth()->guard('admin')->user()->reports == 1);
        $alluser = (auth()->guard('admin')->user()->alluser == 1);
        $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
        @endphp

        
  @if($category == true) 
        <li class="treeview {{ ($prefix=='/category') ? 'active' : '' }}">
            <a href="#">
            <i data-feather="message-circle"></i>
            <span> @if (session()->get('language') == 'english')Category @else Catégorie @endif</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all.category') ? 'active' :'' }}"><a href="{{ route('all.category') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english') Categories Manages @else Gestion des Catégories @endif </a></li>
          </ul>
        </li> 
        @else 
        @endif

        @if($subcategory == true) 
        <li class="treeview {{ ($prefix=='/subcategory') ? 'active' : '' }}">
          <a href="#">
          <i data-feather="message-circle"></i>
          <span> @if (session()->get('language') == 'english') SubCategory @else Sous-Catégorie @endif </span>
          <i class="fa fa-angle-right pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{($route == 'all.subcategory') ? 'active' :'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>
            @if (session()->get('language') == 'english')SubCategories Manages @else Gestion des Sub-Catégories @endif </a></li> </a></li>
        </ul>
      </li> 
      @else 
      @endif

      @if($product == true) 
      <li class="treeview {{ ($prefix=='/book') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="message-circle"></i>
        <span> @if (session()->get('language') == 'english') Book @else Livre @endif </span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{($route == 'all.books') ? 'active' :'' }}"><a href="{{ route('all.books') }}"><i class="ti-more"></i>
          @if (session()->get('language') == 'english')Books Manages @else Gestion des Livres @endif </a></li>
      </ul>
    </li> 
    @else
    @endif

    @if($publisher == true)
    <li class="treeview {{ ($prefix=='/publisher') ? 'active' : '' }}">
      <a href="#">
      <i data-feather="message-circle"></i>
      <span> @if (session()->get('language') == 'english')Publisher @else Edition @endif </span>
      <span class="pull-right-container">
        <i class="fa fa-angle-right pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{($route == 'all.publishers') ? 'active' :'' }}"><a href="{{ route('all.publishers') }}"><i class="ti-more"></i>
        @if (session()->get('language') == 'english')Publishers Manages @else Gestion des Editions @endif </a></li>
         </ul>
  </li> 
  @else
  @endif

  @if($author == true)
  <li class="treeview {{ ($prefix=='/author') ? 'active' : '' }}">
    <a href="#">
    <i data-feather="message-circle"></i>
    <span> @if (session()->get('language') == 'english')Author @else Auteur @endif </span>
    <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{($route == 'all.authors') ? 'active' :'' }}"><a href="{{ route('all.authors') }}"><i class="ti-more"></i>
      @if (session()->get('language') == 'english')Authors Manages @else Gestion des Auteurs @endif    </a></li>
     </ul>
</li> 
@else
@endif


@if($slider == true)
<li class="treeview {{ ($prefix=='/slider') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english') Slider @else Slide @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'all.sliders') ? 'active' :'' }}"><a href="{{ route('all.sliders') }}"><i class="ti-more"></i>
    @if (session()->get('language') == 'english')Sliders Manages @else Gestion des Slides @endif</a></li>
     </ul>
</li> 
@else
@endif

@if($coupons == true)
<li class="treeview {{ ($prefix=='/coupons') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english') Coupon @else Coupon @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'all.coupons') ? 'active' :'' }}"><a href="{{ route('all.coupons') }}"><i class="ti-more"></i>
    @if (session()->get('language') == 'english')Coupons Manages @else Gestion des Coupons @endif</a></li>
     </ul>
</li> 
@else
@endif

@if($shipping == true)
 <li class="treeview {{ ($prefix=='/shipping') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english')Shipping @else Expédition @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'shippingCountry') ? 'active' :'' }}"><a href="{{ route('shippingCountry') }}"><i class="ti-more"></i>
     @if (session()->get('language') == 'english')Manages of State @else Gestion des pays @endif </a></li>
     </ul>
</li>  
@else
@endif

@if($blog == true)
<li class="treeview {{ ($prefix=='/blog') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english')Manage Blog @else Gestion du Blog @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'blogCategory') ? 'active' :'' }}"><a href="{{ route('blogCategory') }}"><i class="ti-more"></i>
     @if (session()->get('language') == 'english')Categories Manages @else Gestion des Catégories @endif </a></li>
  <li class="{{($route == 'view.Post') ? 'active' :'' }}"><a href="{{ route('view.Post') }}"><i class="ti-more"></i>
    @if (session()->get('language') == 'english')Posts Manages @else Gestion de contenu  @endif</a></li>
     </ul>
</li>
 @else
@endif 

@if($setting == true) 
<li class="treeview {{ ($prefix=='/setting') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english')Manage Setting @else Gérer les Paramètres @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'site.setting') ? 'active' :'' }}"><a href="{{ route('site.setting') }}"><i class="ti-more"></i>
     @if (session()->get('language') == 'english')Site Setting @else Paramètre du site @endif </a></li>
     <li class="{{($route == 'view_seo') ? 'active' :'' }}"><a href="{{ route('view_seo') }}"><i class="ti-more"></i>
      @if (session()->get('language') == 'english')SEO Setting @else Paramètre de Référencement  @endif </a></li>
     </ul>
</li> 
@else
@endif

@if($returnorder == true)
<li class="treeview {{ ($prefix=='/return') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english')Return Orders @else Retour Commandes @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'return_request') ? 'active' :'' }}"><a href="{{ route('return_request') }}"><i class="ti-more"></i>
     @if (session()->get('language') == 'english')Return Request @else Demande de retour @endif </a></li>
     <li class="{{($route == 'all_request') ? 'active' :'' }}"><a href="{{ route('all_request') }}"><i class="ti-more"></i>
      @if (session()->get('language') == 'english')All Request @else Toutes les Demandes  @endif </a></li>
     </ul>
</li>
@else
@endif

@if($review == true)
<li class="treeview {{ ($prefix=='/messages') ? 'active' : '' }}">
  <a href="#">
    <i data-feather="message-circle"></i>
    <span> @if (session()->get('language') == 'english')Manage All Messages @else Gestion des Messages @endif </span>
    <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{($route == 'pending_review') ? 'active' :'' }}"><a href="{{ route('pending_review') }}"><i class="ti-more"></i>
      @if (session()->get('language') == 'english')Pending Review @else Avis en Attente @endif </a></li>
    <li class="{{($route == 'publish_review') ? 'active' :'' }}"><a href="{{ route('publish_review') }}"><i class="ti-more"></i>
      @if (session()->get('language') == 'english')Publish Review @else Avis Publié  @endif </a></li>
  </ul>
</li>

<li class="treeview {{ ($prefix=='/blogmessages') ? 'active' : '' }}">
  <a href="#">
    <i data-feather="message-circle"></i>
    <span> Manage Blog Messages  </span>
    <span class="pull-right-container">
      <i class="fa fa-angle-right pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li class="{{($route == 'pending_blogMessage') ? 'active' :'' }}"><a href="{{ route('pending_blogMessage') }}"><i class="ti-more"></i>
     Pending Blog's Messages  </a></li>
    <li class="{{($route == 'publish_blogMessage') ? 'active' :'' }}"><a href="{{ route('publish_blogMessage') }}"><i class="ti-more"></i>
     Publish Blog's Messages </a></li>
  </ul>
</li>

@else
@endif  

		 
        <li class="header nav-small-cap"> @if (session()->get('language') == 'english')User Interface @else Interface Utilisateur @endif</li>
		  
        @if($orders == true)
        <li class="treeview  {{ ($prefix=='/orders') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span> @if (session()->get('language') == 'english')Orders Area @else Zone de Commandes  @endif </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'pending') ? 'active' :'' }}"><a href="{{ route('pending') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Pending Orders @else   Commande en Attente @endif </a></li> 
                 <li class="{{($route == 'processing') ? 'active' :'' }}"><a href="{{ route('processing') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Processus Orders @else Commande en Taitement  @endif </a></li> 
                 <li class="{{($route == 'shipped') ? 'active' :'' }}"><a href="{{ route('shipped') }}"><i class="ti-more"></i> 
              @if (session()->get('language') == 'english')Shipped Orders @else Commande Expédiée  @endif </a></li> 
                 <li class="{{($route == 'delivered') ? 'active' :'' }}"><a href="{{ route('delivered') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Delivered Orders @else Commande Délivrée  @endif </a></li> 
               <li class="{{($route == 'cancel') ? 'active' :'' }}"><a href="{{ route('cancel') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Cancel Orders @else Commande Supprimée  @endif </a></li> 
      </ul>
        </li>
        @else
        @endif
		
        @if($reports == true)
        <li class="treeview  {{ ($prefix=='/reports') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span> @if (session()->get('language') == 'english')Reports Area @else Rapports Commandes  @endif </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all_Reports') ? 'active' :'' }}"><a href="{{ route('all_Reports') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Orders Reports @else  Rapports des commandes  @endif </a></li> 
      </ul>
        </li>
        @else
        @endif

        @if($stock == true)
        <li class="treeview  {{ ($prefix=='/stock') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span> @if (session()->get('language') == 'english')Manage Stock @else Gestion du Stok  @endif </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'stock') ? 'active' :'' }}"><a href="{{ route('stock') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Product Stock @else  Stock des Livres  @endif </a></li> 
      </ul>
        </li>
        @else
        @endif

        @if($alluser == true)
        <li class="treeview  {{ ($prefix=='/allUsers') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span> @if (session()->get('language') == 'english')All Users @else Utilisateurs  @endif </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all_Users') ? 'active' :'' }}"><a href="{{ route('all_Users') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')All Users @else Utilisateurs  @endif </a></li>  
      </ul>
        </li>
        @else
        @endif

        @if($adminuserrole == true)
        <li class="treeview  {{ ($prefix=='/adminuserrole') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span> @if (session()->get('language') == 'english')Admins.Role @else Rôle Administrateurs  @endif </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all_admin') ? 'active' :'' }}"><a href="{{ route('all_admin') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Administrators @else Administrateurs  @endif </a></li>   
      </ul>
        </li>
        @else
        @endif
        
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>