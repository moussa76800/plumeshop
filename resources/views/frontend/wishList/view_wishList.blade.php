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
			<tbody id="wishList">

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