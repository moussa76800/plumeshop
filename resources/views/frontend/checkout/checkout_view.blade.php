@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
@if (session()->get('language') == 'french') Verification @else  Checkout  @endif 
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
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
	 
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
			 <div class="col-md-6 col-sm-6 already-registered-login">
		 <h4 class="checkout-subtitle"><b>>@if (session()->get('language') == 'french')adresse d'expédition @else Shipping Address @endif</b></h4>
					 
	<form class="register-form" action="{{ route('checkout.store') }}" method="POST">
		@csrf


		<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>@if (session()->get('language') == 'french')Nom @else Shipping Name</b>@endif  <span>*</span></label>
	    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required="">
	  </div>  <!-- // end form group  -->
	 

<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>Email </b> <span>*</span></label>
	    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->email }}" required="">
	  </div>  <!-- // end form group  -->


<div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>@if (session()->get('language') == 'french')Telephone @else Phone</b>@endif  <span>*</span></label>
	    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required="">
	  </div>  <!-- // end form group  -->


	  <div class="form-group">
	    <label class="info-title" for="exampleInputEmail1"><b>@if (session()->get('language') == 'french')Code @else Post Code </b>@endif <span>*</span></label>
	    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
	  </div>  <!-- // end form group  -->

	 
	 
				</div>	
				<!-- guest-login -->


 


				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					 

					<div class="form-group">
						<h5><b>@if (session()->get('language') == 'french') Pays @else State</b> @endif <span class="text-danger">*</span></h5>
						<div class="controls">
							<select name="country_id" class="form-control" required="" >
								<option value="" selected="" disabled="">@if (session()->get('language') == 'french')Sélectionnez le pays @else Select State @endif</option>
								@foreach($country as $item)
								<option value="{{ $item->id }}">{{ $item->name }}</option>	
											@endforeach
							</select>
							@error('country_id') 
						 <span class="text-danger">{{ $message }}</span>
						 @enderror 
						 </div>
							 </div> <!-- // end form group -->

							 <div class="form-group">
								<h5><b>@if (session()->get('language') == 'french') Ville @else Town </b> @endif <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="town_id" class="form-control" required="" >
										<option value="" selected="" disabled="">@if (session()->get('language') == 'french')Sélectionnez la ville @else Select Town @endif</option>
										@foreach($town as $item)
										<option value="{{ $item->id }}">{{ $item->name }}</option>	
													@endforeach
									</select>
									@error('town_id') 
								 <span class="text-danger">{{ $message }}</span>
								 @enderror 
								 </div>

									 </div> <!-- // end form group -->
						<div class="form-group">
							<h5><b>@if (session()->get('language') == 'french') Commune @else Common </b>@endif <span class="text-danger">*</span></h5>
							<div class="controls">
								<select name="common_id" class="form-control" required="" >
									<option value="" selected="" disabled="">@if (session()->get('language') == 'french')Sélectionnez la commune @else Select Common @endif</option>
									@foreach($common as $item)
						<option value="{{ $item->id }}">{{ $item->name }}</option>	
									@endforeach
								</select>
								@error('common_id') 
							<span class="text-danger">{{ $message }}</span>
							@enderror 
							</div>
								</div> <!-- // end form group -->


		


		
				 
					 
    <div class="form-group">
	 <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
	     <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
	  </div>  <!-- // end form group  -->



					



					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- End checkout-step-01  -->
				</div><!-- /.checkout-steps -->
				</div>

				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">c	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">@if (session()->get('language') == 'french')Progression de la vérification @else Your Checkout Progress @endif</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

					@foreach($carts as $item)
					<li> 
						<strong>@if (session()->get('language') == 'french')Couverture : @else Cover :@endif </strong>
						<img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
					</li>
					<li> 
						<strong>Qty: </strong>
						  {{ $item->qty }} 
                    </li>
                     <li> 
						 <strong>@if (session()->get('language') == 'french')Titre : @else Title : @endif </strong>
						 {{ $item->name }}
					</li>
                   -------------------------------------------------------------
                    @endforeach 
<hr>
		 <li>
		 	@if(Session::has('coupon'))

<strong>@if (session()->get('language') == 'french') Sous-Total : @else SubTotal: @endif</strong> ${{ $cartTotal }} <hr>

<strong>@if (session()->get('language') == 'french') Nom du Coupon :@else Coupon Name: @endif </strong> {{ session()->get('coupon')['coupon_name'] }}
( {{ session()->get('coupon')['coupon_discount'] }} % )
 <hr>

 <strong>@if (session()->get('language') == 'french') Ristourne du Coupon : @else Coupon Discount : @endif   </strong> ${{ session()->get('coupon')['discount_amount'] }} 
 <hr>

  <strong> Total :  </strong> ${{ session()->get('coupon')['total_amount'] }} 
 <hr>
		 	@else

<strong>@if (session()->get('language') == 'french') Sous-Total : @else SubTotal: @endif </strong> ${{ $cartTotal }} <hr>

<strong>Total : </strong> ${{ $cartTotal }} <hr>
		 	@endif 
		 </li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --> </div>

	<div class="col-md-4">
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



 
<script type="text/javascript">
 $(document).ready(function() {
        $('select[name="town_id"]').on('change', function(){
            var town_id = $(this).val();
            if(town_id) {
                $.ajax({
                    url: "{{  url('/common/ajax') }}/"+town_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                    	$('select[name="common_id"]').empty(); 
                       var d =$('select[name="common_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="common_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
	});

	
   </script>


@endsection