@extends('frontend.main_master')
@section('content')

@section('title')
@if (session()->get('language') == 'french') Mon Panier @else  My Cart  @endif 
@endsection


<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                 <li><a href="{{ url('/') }}">@if (session()->get('language') == 'french') Accueil @else Home  @endif</a></li> 
                <li class='active'>@if (session()->get('language') == 'french') Mon Panier @else My Cart  @endif</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
			<div class="row ">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="cart-image">Image</th>
                        <th class="cart-product-name item">@if (session()->get('language') == 'french')Nom Article @else Product Name @endif</th>
                        <th class="cart-qty item">@if (session()->get('language') == 'french')Quantité @else Quantity @endif</th>
                        <th class="cart-sub-total item">@if (session()->get('language') == 'french')Sous-Total @else Subtotal @endif</th>
                        <th class="cart-total last-item">@if (session()->get('language') == 'french')Supprimer @else Delete @endif</th>
                    </tr>
                </thead><!-- /thead -->
			<tbody id="cartPage">
                            </tbody>
                        </table>
                    </div>
                    </div>
              
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    </div>
                   
                
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        @if(Session::has('coupon'))
                        @else
                        <table class="table" id="couponField">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">@if (session()->get('language') == 'french')Code Coupon @else Discount Code @endif</span>
                                        <p>@if (session()->get('language') == 'french')Entrer votre code coupon.. @else Enter your coupon code if you have one.. @endif</p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input" placeholder="@if (session()->get('language') == 'french')Indiquer votre coupon.. @else Your Coupon.. @endif" id="coupon_name">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">@if (session()->get('language') == 'french')Appliquer le Coupon @else APPLY COUPON @endif</button>
                                            </div>
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                        @endif
                    </div><!-- /.estimate-ship-tax -->
                    
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalField">
                               
                            </thead><!-- /thead -->
                            <tbody>
                                    <tr>
                                        <td>
                                            <div class="cart-checkout-btn pull-right">
                                                <A href="{{ route('checkout')}}" type="submit" class="btn btn-primary checkout-btn">@if (session()->get('language') == 'french')Vérification @else PROCCED TO CHECKOUT @endif</a>
                                               
                                            </div>
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                
            
            </div><!-- /.row -->
                        </div><!-- /.sigin-in-->
                       
                </div><!-- /.body-content -->
				
				 
			</tbody>
           
		</table>
	</div>
</div>			
</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>

</div>







@endsection