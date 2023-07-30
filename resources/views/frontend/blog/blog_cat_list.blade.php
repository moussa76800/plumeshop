@extends('frontend.main_master')
@section('content')
 
@section('title')
@if (session()->get('language') == 'french')
    Blog Category Page
@else
    Page des categories du Blog
@endif 
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

<div class="container">
    <div class="breadcrumb-inner">
        <ul class="list-inline ">
            <li><a href="{{ '/' }}" style="color: red;">@if(session()->get('language') == 'french')Accueil @else Home @endif/</a></li>
            <li class='active' style="color:  #00008B;">Blog /</li>
            @foreach($blogposte as $post)
                <li class='active' style="color:  #00008B ;">{{ $post->category->name }}</li>
            @endforeach
        </ul>
    </div><!-- /.breadcrumb-inner -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="blog-page">
                <div class="col-md-9">
                    <br>
                    @forelse($blogposte as $blog)
                        <div class="blog-post  wow fadeInUp">
                            <a href="{{ route('post.details',$blog->id) }}">
                                <img class="img-responsive" style="width:800px; height:500px;" src="{{ asset($blog->post_image) }}" alt="">
                            </a>
        
                            <h1><a href="{{ route('post.details',$blog->id) }}">{{ $blog->post_title }}</a></h1>
                            @if(session()->get('language') == 'english')
                                <span class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                            @else
                                @php
                                Carbon\Carbon::setLocale('fr');
                                @endphp
                                <span class="date-time">{{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</span>
                            @endif
                            <p>
                                @if(session()->get('language') == 'french')
                                    {!! Str::limit($blog->post_details, 240) !!}
                                @endif
                            </p>
                            <br>
                            <a href="{{ route('post.details',$blog->id) }}" class="btn btn-upper btn-primary read-more">
                                @if(session()->get('language') == 'french')
                                    Lire plus
                                @else
                                    Read more
                                @endif
                            </a>
                        </div>
                    @empty
                        <h5 class="text-danger">
                            @if (session()->get('language') == 'french')
                                <b>Pas de contenu de Blog Trouvé dans cette catégorie !!</b>
                            @else
                                No blog content found in this category
                            @endif
                        </h5>
                    @endforelse
        
                    <div class="clearfix blog-pagination filters-container wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
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
                            </div><!-- /.pagination-container -->
                        </div><!-- /.text-right -->
                    </div><!-- /.filters-container -->
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
                            <img src="{{ asset('frontend/assets/images/banners/banner1.jpg') }}" style="width: 262px; height: 270px;">
                        </div>
                        
                        <!-- CATEGORY WIDGET -->
                        <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                            <h3 class="section-title">
                                @if(session()->get('language') == 'french')
                                    Categorie
                                @else
                                    Blog Category
                                @endif
                            </h3>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="accordion">
                                    <div class="cat">
                                        @forelse($blogcategory as $category)
                                            <ul class="list-group">
                                                <a href="{{ route('blog.category.post',$category->id) }}">
                                                    <li class="list-group-item">
                                                        {{ $category->name }}
                                                    </li>
                                                </a>
                                            </ul>
                                        @empty
                                            <h5 class="text-danger">
                                                @if (session()->get('language') == 'french')
                                                    <b>Pas de contenu de Blog Trouvé dans cette catégorie !!</b>
                                                @else
                                                    No blog content found in this category
                                                @endif
                                            </h5>
                                        @endforelse
                                    </div>
                                </div><!-- /.accordion -->
                            </div><!-- /.sidebar-widget-body -->
                        </div><!-- /.sidebar-widget -->
                        <!-- CATEGORY WIDGET : END -->
        
                        <!-- PRODUCT TAGS -->
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
                        <!-- PRODUCT TAGS : END -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
