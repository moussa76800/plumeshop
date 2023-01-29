@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
@if (session()->get('language') == 'french') Paiement par Stripe @else  Stripe Payment  @endif 
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
		<div class="checkout-box ">
			<div class="row">
				

				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
    	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">@if (session()->get('language') == 'french')Montant d'Achat @else Your Shopping Amount @endif</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

<hr>
		 <li>
		 	@if(Session::has('coupon'))

             {{-- @foreach($carts as $item)
             <li> 
                 <strong>@if (session()->get('language') == 'french')Couverture : @else Cover :@endif </strong>
                 <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
             </li>
             <li> 
                 <strong>Qty: </strong>
                   {{ $item->qty }} 
             </li>
             <br>
              <li> 
                  <strong>@if (session()->get('language') == 'french')Titre : @else Title : @endif </strong>
                  {{ $item->name }}
             </li>
            -------------------------------------------------------------
             @endforeach  --}}
             <br>

             <strong>@if (session()->get('language') == 'french') Sous-Total : @else SubTotal: @endif</strong> ${{ $cartTotal }} <hr>

             <strong>@if (session()->get('language') == 'french') Nom du Coupon :@else Coupon Name: @endif </strong> {{ session()->get('coupon')['coupon_name'] }}
             ( {{ session()->get('coupon')['coupon_discount'] }} % )
              <hr>
             
              <strong>@if (session()->get('language') == 'french') Ristourne du Coupon : @else Coupon Discount : @endif   </strong> ${{ session()->get('coupon')['discount_amount'] }} 
              <hr>
             
               <strong> Total :  </strong> ${{ session()->get('coupon')['total_amount'] }} 
              <hr>
                          @else
                          {{-- @foreach($carts as $item)
                          <li> 
                              <strong>@if (session()->get('language') == 'french')Couverture : @else Cover :@endif </strong>
                              <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
                          </li>
                          <li> 
                              <strong>Qty: </strong>
                                {{ $item->qty }} 
                          </li>
                          <br>
                           <li> 
                               <strong>@if (session()->get('language') == 'french')Titre : @else Title : @endif </strong>
                               {{ $item->name }}
                          </li>
                         -------------------------------------------------------------
                          @endforeach  --}}
             <br>
             {{-- <strong>@if (session()->get('language') == 'french') Sous-Total : @else SubTotal: @endif </strong> ${{ $cartTotal }} <hr> --}}
             
             <strong>Total : </strong> ${{ $cartTotal }} <hr>
		 	@endif 
		 </li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>

	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">@if (session()->get('language') == 'french')Sélectionner un moyen de paiement @else Select Payment Method @endif</h4>
		    </div>


		    <div class="row">
		    	<div class="col-md-4">
		   <label for="">Stripe</label> 		
       <input type="radio" name="payment_method" value="stripe">
       <img src="{{ asset('frontend/assets/images/payments/4.png') }}">		    		
		    	</div> <!-- end col md 4 -->

		    	<div class="col-md-4">
		    		<label for="">@if (session()->get('language') == 'french')Carte Bancaire @else Card @endif</label> 		
       <input type="radio" name="payment_method" value="card">	
		<img src="{{ asset('frontend/assets/images/payments/3.png') }}">    		
		    	</div> <!-- end col md 4 -->

		    	<div class="col-md-4">
		    		<label for="">Cash</label> 		
       <input type="radio" name="payment_method" value="cash">	
		  <img src="{{ asset('frontend/assets/images/payments/6.png')}}"  style="height: 30px; width: 70px;">  		
		    	</div> <!-- end col md 4 -->

				 	
			</div> <!-- // end row  -->
<hr>
  <button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if (session()->get('language') == 'french')Paiement @else Payment Step @endif</button>


		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>



 



</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- === ===== BRANDS CAROUSEL ==== ======== -->
 







<!-- ===== == BRANDS CAROUSEL : END === === -->	
</div><!-- /.container -->
</div><!-- /.body-content -->



 



@endsection