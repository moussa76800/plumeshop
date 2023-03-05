@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">

	 <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">@if (session()->get('language') == 'english')Edit Admin User @else Modifier des données de l'Administrateur @endif </h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
	 <form method="post" action="{{ route('admins_roles_update') }}" enctype="multipart/form-data" >
	 	@csrf
        
         <input type="hidden" name="id" value="{{ $adminuser->id }}">	
         <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">
					  <div class="row">
						<div class="col-12">

			<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>@if (session()->get('language') == 'english')Admin User Name @else name @endif  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="name" class="form-control"  value="{{ $adminuser->name }}" > </div>
	</div>
					
				</div> <!-- end cold md 6 -->



				<div class="col-md-6">

	  <div class="form-group">
		<h5>Email  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="email" name="email" class="form-control"  value="{{ $adminuser->email }}" > </div>
	</div>
					
				</div> <!-- end cold md 6 --> 
				
			</div>	<!-- end row 	 -->	




	<div class="row">
				<div class="col-md-6">

	 <div class="form-group">
		<h5>@if (session()->get('language') == 'english')Admin User Phone @else Tel @endif  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}" ></div>
	</div>
					
				</div> <!-- end cold md 6 -->
				
			</div>	<!-- end row 	 -->	







	 <div class="row">

				<div class="col-md-6">
		<div class="form-group">
		<h5>@if (session()->get('language') == 'english')Admin User Image @else Image @endif <span class="text-danger">*</span></h5>
		<div class="controls">
 <input type="file" name="profile_photo_path" class="form-control"   id="image"> </div>
	</div>
				</div><!-- end cold md 6 --> 

				<div class="col-md-6">
	<img id="showImage"  style="width: 100px; height: 100px;" src="{{ url($adminuser->profile_photo_path )}}">				

				</div><!-- end cold md 6 -->  
			</div><!-- end row 	 -->	



	 <hr>
 


	<div class="row">

<div class="col-md-4">
			<div class="form-group">
			 
		<div class="controls">
			
			<fieldset>
				<input type="checkbox" id="checkbox_2" name="category" value="1" {{ $adminuser->category == 1 ? 'checked' : '' }}>
				<label for="checkbox_2">@if (session()->get('language') == 'english')Category @else Categorie @endif</label>
			</fieldset>

            <fieldset>
				<input type="checkbox" id="checkbox_3" name="subcategory"value="1" {{ $adminuser->subcategory == 1 ? 'checked' : '' }}>
				<label for="checkbox_3">@if (session()->get('language') == 'english')Sub-Category @else Sous-Category @endif</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->product == 1 ? 'checked' : '' }}>
				<label for="checkbox_4">@if (session()->get('language') == 'english')Product @else Produit @endif</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_5" name="publisher" value="1" {{ $adminuser->publisher == 1 ? 'checked' : '' }}>
				<label for="checkbox_5">@if (session()->get('language') == 'english')publisher @else Edition @endif</label>
			</fieldset>
            <fieldset>
				<input type="checkbox" id="checkbox_6" name="auteur" value="1" {{ $adminuser->author == 1 ? 'checked' : '' }}>
				<label for="checkbox_6">@if (session()->get('language') == 'english')Author @else Auteur @endif</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_7" name="slider" value="1"{{ $adminuser->slider == 1 ? 'checked' : '' }}>
				<label for="checkbox_7">@if (session()->get('language') == 'english')Slider @else Slide @endif</label>
			</fieldset>
		</div>
	</div>
</div>



<div class="col-md-4">
			<div class="form-group">
			 
		<div class="controls">
            <fieldset>
				<input type="checkbox" id="checkbox_8" name="coupons" value="1"{{ $adminuser->coupon == 1 ? 'checked' : '' }}>
				<label for="checkbox_8">Coupons</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_9" name="shipping" value="1" {{ $adminuser->shipping == 1 ? 'checked' : '' }}>
				<label for="checkbox_9">@if (session()->get('language') == 'english')Shipping @else Expédition @endif</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_10" name="blog" value="1" {{ $adminuser->blog == 1 ? 'checked' : '' }}>
				<label for="checkbox_10">Blog</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_11" name="setting" value="1" {{ $adminuser->setting == 1 ? 'checked' : '' }}>
				<label for="checkbox_11">@if (session()->get('language') == 'english')Setting @else Paramètre @endif</label>
			</fieldset>


			<fieldset>
				<input type="checkbox" id="checkbox_12" name="returnorder" value="1" {{ $adminuser->returnorder == 1 ? 'checked' : '' }}>
				<label for="checkbox_12">@if (session()->get('language') == 'english')Return Order @else Retour Commande @endif</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_13" name="review" value="1" {{ $adminuser->review == 1 ? 'checked' : '' }}>
				<label for="checkbox_13">@if (session()->get('language') == 'english')Review @else Commentaire @endif	</label>
			</fieldset>
		</div>
	</div>
</div>




<div class="col-md-4">
	<div class="form-group">
		 
		<div class="controls">
			<fieldset>
				<input type="checkbox" id="checkbox_14" name="orders" value="1" {{ $adminuser->orders == 1 ? 'checked' : '' }}>
				<label for="checkbox_14">@if (session()->get('language') == 'english')Orders @else Commande @endif</label>
			</fieldset>
			<fieldset>
				<input type="checkbox" id="checkbox_15" name="stock" value="1"{{ $adminuser->stock == 1 ? 'checked' : '' }}>
				<label for="checkbox_15">Stock</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_16" name="reports" value="1"{{ $adminuser->reports == 1 ? 'checked' : '' }}>
				<label for="checkbox_16">@if (session()->get('language') == 'english')Reports @else Rapports @endif</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_17" name="alluser" value="1" {{ $adminuser->alluser == 1 ? 'checked' : '' }}>
				<label for="checkbox_17">@if (session()->get('language') == 'english')Alluser @else Utilisateur @endif</label>
			</fieldset>

			<fieldset>
				<input type="checkbox" id="checkbox_18" name="adminuserrole" value="1"{{ $adminuser->adminuserrole == 1 ? 'checked' : '' }}>
				<label for="checkbox_18">@if (session()->get('language') == 'english')Admins.Role @else Admins.Rôle @endif </label>
			</fieldset>
		</div>
			</div>
		</div>
						</div>


	
	  

			 <div class="text-xs-right">
	<input type="submit" class="btn btn-rounded btn-primary mb-5 " @if (session()->get('language') == 'english')value="Add Admin User" @else value="Valider"  @endif>					 
						</div>
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
 


	  </div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>


@endsection