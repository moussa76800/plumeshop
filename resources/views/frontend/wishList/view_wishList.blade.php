@extends('frontend.main_master')
@section('content')

@section('title')
@if (session()->get('language') == 'french')Liste des souhaits @else  WishList Page  @endif 
@endsection




<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title"@if (session()->get('language') == 'french') Ma liste des souhaits @else  My Wishlist  @endif ></th>
				</tr>
			</thead>
			<tbody id="wishlist">

                <div class="breadcrumb">
                    <div class="container">
                        <div class="breadcrumb-inner">
                            <ul class="list-inline list-unstyled">
                                 <li><a href="{{ url('/') }}">@if (session()->get('language') == 'french') Accueil @else  Home  @endif</a></li> 
                                <li class='active'> @if (session()->get('language') == 'french') Ma liste des souhaits @else  My Wishlist  @endif</li>
                            </ul>
                        </div><!-- /.breadcrumb-inner -->
                    </div><!-- /.container -->
                </div><!-- /.breadcrumb -->
                
               
                                <tr>
                                    <td class="col-md-2"><img src="assets/images/products/p1.jpg" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">Floral Print Buttoned</a></div>
                                        <div class="rating">
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star rate"></i>
                                            <i class="fa fa-star non-rate"></i>
                                            <span class="review">( 06 Reviews )</span>
                                        </div>
                                        <div class="price">
                                            $400.00
                                            <span>$900.00</span>
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <a href="#" class="btn-upper btn btn-primary">Add to cart</a>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <a href="#" class=""><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>			</div><!-- /.row -->
                        </div><!-- /.sigin-in-->
                       
                </div><!-- /.body-content -->
				
				 
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>

</div>







@endsection