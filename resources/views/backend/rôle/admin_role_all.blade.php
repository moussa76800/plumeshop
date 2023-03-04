@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">@if (session()->get('language') == 'english')Total Admin User @else Liste des Administrateurs @endif </h3>
<a href="{{ route('add_admin') }}" class="btn btn-danger" style="float: right;">@if (session()->get('language') == 'english')Add Admin User @else Ajouter un Admin. @endif</a>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image  </th>
								<th>@if (session()->get('language') == 'english')Name @else Nom @endif  </th>
								<th>Email </th> 
								<th>@if (session()->get('language') == 'english')Access @else Accès @endif </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($adminuser as $item)
	 <tr>
		<td> <img src="{{ asset($item->profile_photo_path) }}" style="width: 50px; height: 50px;">  </td>
		<td> {{ $item->name }}  </td>
		<td>  {{ $item->email  }}  </td>

		<td>

			@if($item->category == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Category @else Catégorie @endif</span>
			@else
			@endif

            @if($item->category == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Sub-Category @else Sous-Catégorie @endif</span>
			@else
			@endif

			@if($item->product == 1)
			<span class="badge btn-primary">Article </span>
			@else
			@endif

            @if($item->category == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Publisher @else Editeur @endif</span>
			@else
			@endif

            @if($item->category == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Author @else Author @endif</span>
			@else
			@endif


			@if($item->slider == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Slider @else Slide @endif</span>
			@else
			@endif


			@if($item->coupons == 1)
			<span class="badge btn-primary">Coupons</span>
			@else
			@endif


			@if($item->shipping == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Shipping @else Expédition @endif</span>
			@else
			@endif


			@if($item->blog == 1)
			<span class="badge btn-primary">Blog</span>
			@else
			@endif


			@if($item->setting == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Setting @else Paramètre @endif</span>
			@else
			@endif


			@if($item->returnorder == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Return Order @else Retour de Commande @endif</span>
			@else
			@endif


			@if($item->review == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Review @else Commentaire @endif</span>
			@else
			@endif


			@if($item->orders == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Order @else Commande @endif</span>
			@else
			@endif

			@if($item->stock == 1)
			<span class="badge btn-primary">Stock</span>
			@else
			@endif

			@if($item->reports == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Report @else Rapport @endif</span>
			@else
			@endif

			@if($item->alluser == 1)
			<span class="badge btn-primary">@if (session()->get('language') == 'english')Alluser @else Utilisateurs @endif</span>
			@else
			@endif

			@if($item->adminuserrole == 1)
			<span class="badge btn-primary>@if (session()->get('language') == 'english')Admins.Roles @else Admins.Rôles @endif</span>
			@else
			@endif
 

		  </td>
		 

		<td width="25%">
 <a href="{{ route('edit_admins',$item->id) }}" class="btn btn-warning" title="Edit Data"><i class="fa fa-pencil"></i> </a>
 

 <a href="{{ route('delete_admins',$item->id) }}" class="btn btn-danger" title="Delete" id="delete">
	
 	<i class="fa fa-trash"></i></a>
		</td>
							 
	 </tr>
	  @endforeach
						</tbody>
						 
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->

 

 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection