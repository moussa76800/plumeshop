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
				  <h3 class="box-title">@if (session()->get('language') == 'english')Pending All Reviews @else Avis en Attente @endif </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
                        @if (session()->get('language') == 'english')
						<thead>
							<tr>
								<th>Summary  </th>
								<th>Comment </th>
								<th>User </th>
								<th>Product  </th>
								<th>Rating </th>
								<th>Status </th>
								<th>Action</th>
								 
							</tr>
						</thead>
                        @else
                        <thead>
							<tr>
								<th>Résumé</th>
								<th>Commentaire</th>
								<th>Utilisateur </th>
								<th>Produit </th>
								<th>Notation </th>
								<th>Status </th>
								<th>Action</th>
								 
							</tr>
						</thead>
                        @endif

						<tbody>
	 @foreach($reviewPublish as $item)
	 <tr>
		<td> {{ $item->message->subject }}  </td>
		<td> {{ $item->message->content }}  </td>
		<td>  {{ $item->user->name }}  </td>
		<td> {{ $item->book->name_en }}  </td>
		<td> {{ $item->rating }}  </td>
		<td>
		
       @if($item->status == 1)
       <span class="badge badge-pill badge-success">@if (session()->get('language') == 'english')Publish  @else Publié @endif </span>
		@endif

		  </td>

		<td width="25%">
  <a href="{{ route('delete_review',$item->id) }}" class="btn btn-danger" id="delete">@if (session()->get('language') == 'english')Delete  @else Supprimer @endif </a>
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
