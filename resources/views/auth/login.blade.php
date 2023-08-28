
@extends('frontend.main_master')
@section('content')

    

<!-- ============================================== login ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	
	
    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
        @csrf


		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'french')Email  @else User Email @endif <span>*</span></label>
		    <input type="text"  id="email"name="email" class="form-control unicase-form-control text-input" >
            @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>   
           @enderror
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">@if(session()->get('language') == 'french') Mot de Passe @else Password  @endif<span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input"  >
            @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>   
           @enderror
		</div>
		<div class="radio outer-xs">
		  	
		  	<a href="{{ route('password.request') }}" class="forgot-password pull-right">@if(session()->get('language') == 'french') Mot de Pass Oublié ? @else Forgot your Password ? @endif</a>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if(session()->get('language') == 'french') Se Connecter @else Login @endif</button>
	</form>	
    <br>
    <br>
    
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
	<h4 class="checkout-subtitle">@if(session()->get('language') == 'french') Inscription @else Create a new account @endif</h4>

	<form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'french') Nom @else Name @endif <span>*</span></label>
		    <input type="text" id="name" name="name" class="form-control unicase-form-control text-input" >
            @error('name')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>   
            @enderror
		</div>
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">@if(session()->get('language') == 'french') Email @else Email Address @endif <span>*</span></label>
	    	<input type="email"  id="email" name="email"  class="form-control unicase-form-control text-input"  >
            @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>   
           @enderror
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'french')Tél @else Phone Number @endif <span>*</span></label>
		    <input type="text" id="phone" name="phone" class="form-control unicase-form-control text-input"  >
            @error('phone')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>   
           @enderror
		</div>
		
		
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'french')Mot de Passe @else Password @endif <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input"  >
            @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>   
           @enderror
		</div>
         <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'french')Confirmez Mot de Passe @else Confirm Password @endif <span>*</span></label>
		    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control unicase-form-control text-input"  >
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
           </span>   
           @enderror
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">@if(session()->get('language') == 'french')S'Enregistrer @else Sign Up @endif</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		    @endsection



