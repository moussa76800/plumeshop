@extends('frontend.main_master')
@section('content')
 
@section('title')
@if(session()->get('language') == 'french') {{ $postDetail->post_title_fr }} @else {{ $postDetail->post_title_en }} @endif
@endsection

<style>
    .cat li:hover {
      background-color: yellow;
    }
    
    .cat li:active {
      background-color: yellow;
      transform: translateY(3px);
    }
    </style>
 

 <div class="">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline ">
				<li><a href="{{ '/' }} "style="color: red" ;>@if(session()->get('language') == 'french')Accueil @else Home @endif/</a></li>
				<li class='active'style="color:  #00008B;">Blog /</li>
				<li class='active' style="color:  #00008B;">@if(session()->get('language') == 'french'){{ $postDetail->post_title_en }} @else {{ $postDetail->post_title_en }} @endif</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<br>
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{ asset($postDetail->post_image) }}" alt="">
	

	<h1>@if(session()->get('language') == 'french') {{ $postDetail->post_title_fr }} @else {{ $postDetail->post_title_en }} @endif</h1>

	@if(session()->get('language') == 'english')
	<span class="date-time"> {{ Carbon\Carbon::parse($postDetail->created_at)->diffForHumans()  }}</span>
    @else
	@php
    Carbon\Carbon::setLocale('fr');
	@endphp
    <span class="date-time"> {{ Carbon\Carbon::parse($postDetail->created_at)->diffForHumans()  }}</span>
	@endif
	
 
            

	<p> @if(session()->get('language') == 'french') {!!  $postDetail->post_details_fr  !!} @else {!!  $postDetail->post_details_en  !!} @endif
	</p>



	 
		 
		 
       <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <div class="addthis_inline_share_toolbox_8tvu"></div>
            
	 
</div>







			<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4> @if(session()->get('language') == 'french')Laissez un commentaire @else Leave A Comment @endif</h4>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputName"> @if(session()->get('language') == 'french')Votre Nom @else Your Name @endif <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputEmail1"> @if(session()->get('language') == 'french')Adresse Email @else Email Address @endif <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputTitle">@if(session()->get('language') == 'french')Titre @else Title @endif <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-12">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputComments">@if(session()->get('language') == 'french')Votre Commentaires @else Your Comments @endif <span>*</span></label>
			    <textarea class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
			  </div>
			</form>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if(session()->get('language') == 'french')Envoyer un commentaire @else Submit Comment @endif </button>
		</div>
	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('frontend/assets/images/banners/banner1.jpg') }}"  style=" width: 262px;
height: 270px;">
</div>
		

		<!-- ======== ====CATEGORY======= === -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">@if(session()->get('language') == 'french') Catégorie du Blog @else Blog Category @endif </h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

            <div class="cat">
@forelse($blogcategory as $category)
	    	 <ul class="list-group">
  <a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item">@if(session()->get('language') == 'french') {{ $category->name_fr }} @else {{ $category->name_en }} @endif</li></a>
      </ul>
      
      @empty
      <h5 class="text-danger">@if (session()->get('language') == 'french')<b> Pas de contenu de Blog Trouvé dans cette catégorie !! @else No blog content found in this category</b> @endif !!</h5>
            
      @endforelse
            </div>

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ===== ======== CATEGORY : END ==== = -->	



						 
	 <!-- ========= === PRODUCT TAGS =========== === -->
<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">					
			<a class="item" title="Phone" href="category.html">Phone</a>
			<a class="item active" title="Vest" href="category.html">Vest</a>
			<a class="item" title="Smartphone" href="category.html">Smartphone</a>
			<a class="item" title="Furniture" href="category.html">Furniture</a>
			<a class="item" title="T-shirt" href="category.html">T-shirt</a>
			<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
			<a class="item" title="Sneaker" href="category.html">Sneaker</a>
			<a class="item" title="Toys" href="category.html">Toys</a>
			<a class="item" title="Rose" href="category.html">Rose</a>
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>


@endsection