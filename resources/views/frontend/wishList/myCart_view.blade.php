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
                        <th class="cart-product-name item">Product Name</th>
                        <th class="cart-qty item">Quantity</th>
                        <th class="cart-sub-total item">Subtotal</th>
                        <th class="cart-total last-item">Delete</th>
                    </tr>
                </thead><!-- /thead -->
			<tbody id="cartPage">
                            </tbody>
                        </table>
                    </div>
                    </div>
              
                
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                    </div>
                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                    </div> 

             
                       
                    <tbody>
                         

                            <div class="col-4 col-sm-12 cart-shopping-total">
                                <table class="table">
                                        <thead id="total">
                                        </thead>     
                                           
                    </tbody>
                                       
                                        <tr>
                                            <td>
                                                <div class="cart-checkout-btn pull-right">
                                 <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">@if (session()->get('language') == 'french') PAIEMENT @else PROCED TO CHECKOUT  @endif</a>
                                                     
                                                </div>
                                            </td>
                                        </tr>    
                                </table><!-- /table -->
                                       
                                  
                        {{-- </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->  --}}
                
            
            </div><!-- /.row -->
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