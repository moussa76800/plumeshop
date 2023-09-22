@extends('frontend.main_master')
@section('content')
 
@section('title')
@if (session()->get('language') == 'french')Blog Page @else Blog @endif 
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
				<li class='active'style="color:  #00008B;">Blog </li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">



				@foreach($blogpost as $blog)
					<div class="blog-post  wow fadeInUp">
	<a href="blog-details.html"><img class="img-responsive"  style="width:800px; height:500px;"  src="{{ asset($blog->post_image) }}" alt=""></a>

	<h1><a href="blog-details.html">  {{ $blog->post_title }}</a></h1>
    @if(session()->get('language') == 'english')
	<span class="date-time"> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>
    @else
	@php
    Carbon\Carbon::setLocale('fr');
	@endphp
    <span class="date-time"> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans()  }}</span>
	@endif
	<p> {!! Str::limit($blog->post_detail, 240 )  !!} </p>

      <br>
	<a href="{{ route('post.details',$blog->id) }}" class="btn btn-upper btn-primary read-more">@if(session()->get('language') == 'french')Lire plus @else read more @endif</a>
   

</div>
 @endforeach


<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
						
	<div class="text-right">
         <div class="pagination-container">
	<ul class="list-inline list-unstyled">
		<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
		<li><a href="#">1</a></li>	
		<li class="active"><a href="#">2</a></li>	
		<li><a href="#">3</a></li>	
		<li><a href="#">4</a></li>	
		<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
	</ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->    </div><!-- /.text-right -->

</div><!-- /.filters-container -->				</div>
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
	<h3 class="section-title">@if(session()->get('language') == 'french') Categorie @else Blog Category @endif</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">
			<div class="cat">
 @forelse($blogcategory as $category)
	    	 <ul class="list-group">
  <a href="{{ route('blog.category.post',$category->id) }}"><li class="list-group-item"> {{ $category->name }} </li></a>

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

@endsection