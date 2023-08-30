@extends('frontend.main_master')
@section('content')
@section('title')
@if (session()->get('language') == 'french'){{ $book->name_fr }} - Détail du Livre @else {{ $book->title }} - Book Detail @endif
@endsection

<div class="breadcrumb">
<div class="container">
<div class="breadcrumb-inner">
<ul class="list-inline list-unstyled">
<li><a href="#">Home</a></li>
{{-- <li><a href="#">Clothing</a></li>
<li class='active'>Floral Print Buttoned</li> --}}
</ul>
</div><!-- /.breadcrumb-inner -->
</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
<div class='container'>
<div class='row single-product'>
<div class='col-md-3 sidebar'>
<div class="sidebar-module-container">







<


</div>
</div><!-- /.sidebar -->
<div class='col-md-9'>
<div class="detail-block">
<div class="row  wow fadeInUp">

<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
<div class="product-item-holder size-big single-product-gallery small-gallery">




<div class="single-product-gallery-thumbs gallery-thumbs">

<div id="owl-single-product-thumbnails">
<div class="item">
<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide">
<img class="img" width="200" alt="" src="{{asset($book->image) }}" data-echo="{{asset($book->image) }}" />
</a>
</div>


</div><!-- /#owl-single-product-thumbnails -->



</div><!-- /.gallery-thumbs -->

</div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
<div class='col-sm-6 col-md-7 product-info-block'>
<div class="product-info">
<h1 class="name" id="pname">{{ $book->title }} </h1>

<div class="rating-reviews m-t-20">
<div class="row">
	<div class="col-sm-3">
		<div class="rating rateit-small"></div>
	</div>
	<div class="col-sm-8">
		<div class="reviews">
			<a href="#" class="lnk">(13 Reviews)</a>
		</div>
	</div>
</div><!-- /.row -->		
</div><!-- /.rating-reviews -->

<div class="stock-container info-container m-t-10">
    <div class="row">
        <div class="col-sm-2">
            <div class="stock-box">
                <span class="label">Availability:</span>
            </div>
        </div>
        <div class="col-sm-10">
            <div class="stock-box">
                @if ($book->product_qty > 0)
                    <span class="value text-success">In Stock</span> 
					(<span>{{$book->product_qty}}</span> pieces)
                @else
                    <span class="value text-danger">Out of Stock</span>
                @endif
            </div>
        </div>
    </div><!-- /.row -->	
</div><!-- /.stock-container -->

<div class="description-container m-t-20">
{{ $book->long_descp }}
</div><!-- /.description-container -->

<div class="price-container info-container m-t-20">
<div class="row">
	

	<div class="col-sm-6">
		<div class="price-box">
			@if ($book->discount_price == NULL)
				<span class="price">@if (session()->get('language') == 'french') € {{ $book->price }} @else $ {{ $book->price }} @endif</span>
			@else
			
				<span class="price">@if (session()->get('language') == 'french') € {{ $book->price - $book->discount_price }} @else
				$ {{$book->price - $book->discount_price  }} </span> @endif</span>
				<span class="price-strike">@if (session()->get('language') == 'french') € {{ $book->price }} @else $ {{ $book->price }} @endif</span>
			@endif
		
			
			
		</div>
	</div>


</div><!-- /.row -->
</div><!-- /.price-container -->

<div class="quantity-container info-container">
<div class="row">
	
	<div class="col-sm-2">
		<span class="label">Qty :</span>
	</div>
	
	<div class="col-sm-2">
		<div class="cart-quantity">
			<div class="quant-input">
				{{-- <div class="arrows">
					<div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
					<div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				</div> --}}
				<input type="text" id="qty" value="1" min="1" max="{{ $book->product_qty }}">
			</div>
		</div>
	</div>
	<input type="hidden"  id="book_id" value="{{ $book->id }}" min="1">
	<div class="col-sm-7">
		<div class="input-group-append">
			<button type="button"  onclick="addToCart()"class="btn btn-primary">
				<i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART
			</button>
			<button class="btn btn-danger icon" type="button" title="Wishlist" id="{{ $book->id }}" onclick="addToWishList(this.id)">
				<i class="fa fa-heart"></i> Wishlist
			</button>
		</div>
	</div>
	
	
	

	
</div><!-- /.row -->
</div><!-- /.quantity-container -->
<hr>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_inline_share_toolbox_8tvu"></div>





</div><!-- /.product-info -->
</div><!-- /.col-sm-7 -->
</div><!-- /.row -->
</div>

<div class="product-tabs inner-bottom-xs  wow fadeInUp">
<div class="row">
<div class="col-sm-3">
<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
<li><a data-toggle="tab" href="#review">REVIEW</a></li>
<li><a data-toggle="tab" href="#tags">TAGS</a></li>
</ul><!-- /.nav-tabs #product-tabs -->
</div>
<div class="col-sm-9">

<div class="tab-content">

<div id="description" class="tab-pane in active">
	<div class="product-tab">
		<p class="text">{!! $book->long_descp !!}</p>
	</div>	
</div><!-- /.tab-pane -->

<div id="review" class="tab-pane">
	<div class="product-tab">
												
		<div class="product-reviews">
			<h4 class="title">@if (session()->get('language') == 'english')Customer Reviews @else Avis des clients @endif</h4>
			
			
			
					<div class="reviews">
						@foreach ($review as $item)
						@if($item->status == 0)

						@else
						<div class="review">

							<div class="row">
								<div class="col-md-3">
								<img style="border-radius: 50%" src="{{ (!empty($item->user->profile_photo_path)) ?  url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.png') }}" 
								width="40px;" height="40px;"><b> {{ $item->user->name }}</b>
								</div>
								<div class="col-md-3">
								</div>
							</div> <!-- EndRow -->
								<div class="review-title">
									<span class="summary">{{ $item->message->summary }}</span>
										
									<span class="date"><i class="fa fa-calendar"></i><span>
										@if(session()->get('language') == 'english') 
									{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} 
										@else
										@php
									Carbon\Carbon::setLocale('fr');
									@endphp
		
									{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} @endif</span></span>
									</div>
								
									
										<div class="text">{{ $item->message->content}}</div>
						</div>
						@endif
						@endforeach
					</div><!-- /.reviews -->
			
		</div><!-- /.product-reviews -->	
		

		
		<div class="product-add-review">
			<h4 class="title">Write your own review</h4>
			<div class="review-table">
				<div class="review-table">
					<div class="table-responsive">
						<table class="table">	
							<thead>
								<tr>
									<th class="cell-label">&nbsp;</th>
									<th>1 star</th>
									<th>2 stars</th>
									<th>3 stars</th>
									<th>4 stars</th>
									<th>5 stars</th>
								</tr>
							</thead>	
							<tbody>
								<tr>
									<td class="cell-label">Quality</td>
									<td><input type="radio" name="quality" class="radio" value="1"></td>
									<td><input type="radio" name="quality" class="radio" value="2"></td>
									<td><input type="radio" name="quality" class="radio" value="3"></td>
									<td><input type="radio" name="quality" class="radio" value="4"></td>
									<td><input type="radio" name="quality" class="radio" value="5"></td>
								</tr>
								
							</tbody>
						</table><!-- /.table .table-bordered -->
					</div><!-- /.table-responsive -->
				</div><!-- /.review-table -->	
			</div><!-- /.review-table -->
			
			<div class="review-form">
				
					@guest
						@if (session()->get('language') == 'english')
						<p> <b> For Add Product Review. You Need to Login First,  <a href="{{ route('login') }}">Login Here</a>
						@else <p> <b>Pour ajouter un avis de produit, tu dois d'abord te connecter,  <a href="{{ route('login') }}">Se connecter ici</a> </b> 
						@endif	</p>
					@else

					<div class="form-container">
					<form role="form" class="cnt-form" method="post" action="{{route('review_store')}}">
						
						@csrf
						<input type="hidden" name="book_id" value="{{$book->id}}">
						<div class="row">
							<div class="col-sm-6">
								
								<div class="form-group">
									<label for="exampleInputSummary">@if (session()->get('language') == 'english')Summary @else Résumé @endif <span class="astk">*</span></label>
									<input type="text" name="summary" class="form-control txt" id="exampleInputSummary" placeholder="">
								</div><!-- /.form-group -->
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="exampleInputReview">@if (session()->get('language') == 'english')Review @else Avis
										@endif  <span class="astk">*</span></label>
									<textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
								</div><!-- /.form-group -->
							</div>
						</div><!-- /.row -->
						
						<div class="action text-right">
							<button type = "submit" class="btn btn-primary btn-upper">@if (session()->get('language') == 'english')SUBMIT REVIEW @else SOUMETTRE L'AVIS @endif</button>
						</div><!-- /.action -->

					</form><!-- /.cnt-form -->
				</div><!-- /.form-container -->
				@endguest

			</div><!-- /.review-form -->

		</div><!-- /.product-add-review -->										
		
	</div><!-- /.product-tab -->
</div><!-- /.tab-pane -->

<div id="tags" class="tab-pane">
	<div class="product-tag">
		
		<h4 class="title">Product Tags</h4>
		<form role="form" class="form-inline form-cnt">
			<div class="form-container">
	
				<div class="form-group">
					<label for="exampleInputTag">Add Your Tags: </label>
					<input type="email" id="exampleInputTag" class="form-control txt">
					

				</div>

				<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
			</div><!-- /.form-container -->
		</form><!-- /.form-cnt -->

		<form role="form" class="form-inline form-cnt">
			<div class="form-group">
				<label>&nbsp;</label>
				<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
			</div>
		</form><!-- /.form-cnt -->

	</div><!-- /.product-tab -->
</div><!-- /.tab-pane -->

</div><!-- /.tab-content -->
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.product-tabs -->

<!-- ============================================== UPSELL PRODUCTS ============================================== -->

<section class="section featured-product wow fadeInUp">
<h3 class="section-title">@if (session()->get('language') == 'french') Livre Aditionnelle @else Releted Books @endif</h3>
<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">



	@foreach($relatedBook as $book)
		
	<div class="item item-carousel">
		<div class="products">
			
<div class="product">		
	<div class="product-image">
		<div class="image">
			<a href="{{ url('book/detail/'.$book->id.'/'.$book->title ) }}"><img  src="{{ asset($book->image) }}" alt=""></a>
		</div><!-- /.image -->			

					<div class="tag sale"><span>sale</span></div>            		   
	</div><!-- /.product-image -->


<div class="product-info text-left">
<h3 class="name"><a href="{{ url('book/detail/'.$book->id.'/'.$book->title ) }}"> {{ $book->title }}</a></h3>
<div class="rating rateit-small"></div>
<div class="description"></div>




@if ($book->discount_price == NULL)
<div class="product-price">	
<span class="price">
	@if (session()->get('language') == 'french') € {{ $book->price }} @else $ {{ $book->price }} @endif</span> 
</div>
<!-- /.product-price -->
@else

<div class="product-price">	
<span class="price">
	@if (session()->get('language') == 'french') € {{ $book->discount_price }} @else $ {{ $book->discount_price }} @endif</span>
<span class="price-before-discount">@if (session()->get('language') == 'french') € {{ $book->price }} @else $ {{ $book->price }} @endif</span> 							
</div><!-- /.product-price -->
@endif

</div><!-- /.product-info -->
<div class="cart clearfix animate-effect">
<div class="action">
<ul class="list-unstyled">
	<li class="add-cart-button btn-group">
		<button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $book->id }}" onclick="bookView(this.id)"><i class="fa fa-shopping-cart"></i> </button>
		<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
	  </li>
	
	<li class="lnk wishlist">
		<button class="btn btn-primary icon" type="button" title="wishlist" id="{{ $book->id }}" onclick="addToWishList(this.id)"><i class="fa fa-heart"></i> </button>
		
	</li>

	{{-- <li class="lnk">
		<a class="add-to-cart" href="detail.html" title="Compare">
			<i class="fa fa-signal"></i>
		</a>
	</li> --}}
</ul>
</div><!-- /.action -->
</div><!-- /.cart -->
</div><!-- /.product -->

</div><!-- /.products -->
</div><!-- /.item -->

@endforeach





</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->

<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

</div><!-- /.col -->
<div class="clearfix"></div>
</div><!-- /.row -->
</div>


<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>

@endsection





