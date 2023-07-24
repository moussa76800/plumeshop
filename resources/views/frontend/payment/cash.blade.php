@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
@if (session()->get('language') == 'french')Paiement Cash @else Cash's Payment @endif
@endsection

 


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">@if (session()->get('language') == 'french')Accueil @else Home @endif</a></li>
				<li class='active'>@if (session()->get('language') == 'french')Paiement en Cash @else Cash's Payment @endif</li>
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
		    	<h4 class="unicase-checkout-title">@if (session()->get('language') == 'french')Votre montant d'achat @esle Your Shopping Amount @endif </h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">			 
<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>@if(session()->get('language') == 'french')Sous-Total : @else SubTotal : @endif </strong> ${{ $cartTotal }} <hr>

<strong> @if (session()->get('language') == 'french')Coupon : @else Coupon Name : @endif</strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>@if (session()->get('language') == 'french')Ristourne du Coupon : @else Coupon Discount :@endif </strong> ${{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong>Total : </strong> ${{ session()->get('coupon')['total_amount'] }} 
 <hr>
		 	@else

<strong>>@if(session()->get('language') == 'french')Sous-Total : @else SubTotal : @endif </strong> ${{ $cartTotal }} <hr>

<strong>Total : </strong> ${{ $cartTotal }} <hr>
		 	@endif 

		 </li>
							</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div> <!--  // end col md 6 -->


	<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">@if(session()->get('language') == 'french')Sélectionner votre méthode de Paiement : @else Select Payment Method : @endif</h4>
		    </div>

<form action="{{ route('cash.order') }}" method="post" id="payment-form">
                            @csrf
        <div class="form-row">

          <img src="{{ asset('frontend/assets/images/payments/cash.png') }}">

            <label for="card-element">
           
      <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
      <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
      <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
      <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
      <input type="hidden" name="address" value="{{ $data['address'] }}">
      <input type="hidden" name="city" value="{{ $data['city'] }}">
      <input type="hidden" name="country" value="{{ $data['country'] }}">
      <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 

            </label>
             
           
          
           
        </div>
        <br>
        <button class="btn btn-primary">@if(session()->get('language') == 'french')Payer @else Submit Payment @endif</button>
        </form>
		    
 

		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->
 </div><!--  // end col md 6 -->

</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		
</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection