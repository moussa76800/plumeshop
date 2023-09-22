@extends('frontend.main_master')
@section('content')
 
@section('title')
 {{ $postDetail->post_title }} 
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
 

 <<section class="page-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}" style="color: red;">@if (session()->get('language') == 'french')Accueil @else Home @endif</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li><a href="{{ url('/blog') }}" style="color: #00008B;">Blog</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li style="color: #00008B;">{{ $postDetail->category->name }}</li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li class="active">{{ $postDetail->post_title }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<br>
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{ asset($postDetail->post_image) }}" alt="">
	

	<h1> {{ $postDetail->post_title }} </h1>

	@if(session()->get('language') == 'english')
	<span class="date-time"> {{ Carbon\Carbon::parse($postDetail->created_at)->diffForHumans()  }}</span>
    @else
	@php
    Carbon\Carbon::setLocale('fr');
	@endphp
    <span class="date-time"> {{ Carbon\Carbon::parse($postDetail->created_at)->diffForHumans()  }}</span>
	@endif
	
 
            

	<p>  {!!  $postDetail->post_details  !!} 
	</p>

		 
       <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <div class="addthis_inline_share_toolbox_8tvu"></div>
            
	 
</div>


<div class="blog-write-comment outer-bottom-xs outer-top-xs">
    <form role="form" class="cnt-form" method="post" action="{{ route('blogMessage_store') }}">
        @csrf
        <input type="hidden" name="post_id" value="{{ $postDetail->id }}">

        <div class="row">
            <div class="col-md-12">
                <h4>@if(session()->get('language') == 'french')Laissez un commentaire @else Leave A Comment @endif</h4>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label class="info-title" for="exampleInputTitle">@if(session()->get('language') == 'french')Titre @else Title @endif <span>*</span></label>
                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputTitle" name="content" placeholder="The Sujet" required>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="info-title" for="exampleInputComments">@if(session()->get('language') == 'french')Votre Commentaires @else Your Comments @endif <span>*</span></label>
                    <textarea class="form-control unicase-form-control" id="exampleInputComments" name="comment" placeholder="Your Comments" required></textarea>
                </div>
            </div>

            <div class="col-md-12 outer-bottom-small m-t-20">
                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if(session()->get('language') == 'french')Envoyer un commentaire @else Submit Comment @endif</button>
            </div>
        </div>
    </form>
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
  <a href="{{  route('blog.category.post',$category->id) }}"><li class="list-group-item"> {{ $category->name }}</li></a>
      </ul>

      
      @empty
      <h5 class="text-danger">@if (session()->get('language') == 'french')<b> Pas de contenu de Blog Trouvé dans cette catégorie !! @else No blog content found in this category</b> @endif !!</h5>
            
      @endforelse
            </div>

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ===== ======== CATEGORY : END ==== = -->	

						 
				</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>


@endsection