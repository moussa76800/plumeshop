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
          <a href="index.html">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
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
        <li class="treeview {{ ($prefix=='/subcategory') ? 'active' : '' }}">
          <a href="#">
          <i data-feather="message-circle"></i>
          <span> @if (session()->get('language') == 'english') SubCategory @else Sous-Catégorie @endif </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{($route == 'all.subcategory') ? 'active' :'' }}"><a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>
            @if (session()->get('language') == 'english')SubCategories Manages @else Gestion des Sub-Catégories @endif </a></li> </a></li>
        </ul>
      </li> 
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

<li class="treeview {{ ($prefix=='/bookAuthor') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span>Pivot Book/Author</span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'all.bookAuthor') ? 'active' :'' }}"><a href="{{ route('all.bookAuthor') }}"><i class="ti-more"></i>Pivot Book/Authors Manages</a></li>
     </ul>
</li> 

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

<li class="treeview {{ ($prefix=='/shipping') ? 'active' : '' }}">
  <a href="#">
  <i data-feather="message-circle"></i>
  <span> @if (session()->get('language') == 'english')Shipping @else Expédition @endif </span>
  <span class="pull-right-container">
    <i class="fa fa-angle-right pull-right"></i>
  </span>
</a>
<ul class="treeview-menu">
  <li class="{{($route == 'shippingCommon') ? 'active' :'' }}"><a href="{{ route('shippingCommon') }}"><i class="ti-more"></i>
     @if (session()->get('language') == 'english')Commons Manages @else Gestion des Communes @endif </a></li>
  <li class="{{($route == 'shippingTown') ? 'active' :'' }}"><a href="{{ route('shippingTown') }}"><i class="ti-more"></i>
    @if (session()->get('language') == 'english')Town Manages @else Gestion des Villes @endif</a></li>
  <li class="{{($route == 'shippingCountry') ? 'active' :'' }}"><a href="{{ route('shippingCountry') }}"><i class="ti-more"></i> 
    @if (session()->get('language') == 'english')States Manages @else Gestion des Pays @endif </a></li>
     </ul>
</li> 

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
  {{-- <li class="{{($route == 'shippingCountry') ? 'active' :'' }}"><a href="{{ route('shippingCountry') }}"><i class="ti-more"></i> 
    @if (session()->get('language') == 'english')States Manages @else Gestion des Pays @endif </a></li> --}}
     </ul>
</li> 
  
    
		  
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
            <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
            <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
          </ul>
        </li>
		
        <li class="treeview">
          <a href="#">
            <i data-feather="file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
          </ul>
        </li> 		  
		 
        <li class="header nav-small-cap"> @if (session()->get('language') == 'english')User Interface @else Interface Utilisateur @endif</li>
		  
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
                 <li class="{{($route == 'confirmed') ? 'active' :'' }}"><a href="{{ route('confirmed') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Confirmed Orders @else Commande Confirmée  @endif </a></li> 
                 <li class="{{($route == 'processing') ? 'active' :'' }}"><a href="{{ route('processing') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Processus Orders @else Commande en Taitement  @endif </a></li> 
                 <li class="{{($route == 'picked') ? 'active' :'' }}"><a href="{{ route('picked') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Picked Orders @else  Commande Preparée @endif </a></li> 
                 <li class="{{($route == 'shipped') ? 'active' :'' }}"><a href="{{ route('shipped') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Shipped Orders @else Commande Expédiée  @endif </a></li> 
                 <li class="{{($route == 'delivered') ? 'active' :'' }}"><a href="{{ route('delivered') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Delivered Orders @else Commande Délivrée  @endif </a></li> 
               <li class="{{($route == 'cancel') ? 'active' :'' }}"><a href="{{ route('cancel') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Cancel Orders @else Commande Supprimée  @endif </a></li> 
      </ul>
        </li>
		
        <li class="treeview  {{ ($prefix=='/reports') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="grid"></i>
            <span> @if (session()->get('language') == 'english')Reports Area @else Rapports des Commandes  @endif </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{($route == 'all_Reports') ? 'active' :'' }}"><a href="{{ route('all_Reports') }}"><i class="ti-more"></i>
              @if (session()->get('language') == 'english')Orders Reports @else  Rapports des commandes  @endif </a></li> 
      </ul>
        </li>

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