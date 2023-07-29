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
				  <h3 class="box-title">@if (session()->get('language') == 'english')Product Stock List @else Liste du Stock des Livres @endif <span class="badge badge-pill badge-danger"> {{ count($book) }} </span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Image </th>
								<th>@if (session()->get('language') == 'english')Product @else Article @endif En</th>
								<th>@if (session()->get('language') == 'english')Product Price @else Prix @endif </th>
								<th>@if (session()->get('language') == 'english')Quantity @else Quantité @endif </th>
								<th>@if (session()->get('language') == 'english')Discount @else Réduction @endif </th>
								<th>@if (session()->get('language') == 'english')Status @else Statut @endif </th>
								 
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($book as $item)
	 <tr>
		<td> <img src="{{ asset($item->image) }}" style="width: 60px; height: 50px;">  </td>
		<td>{{ $item->title }}</td>
		 <td>{{ $item->price }} @if (session()->get('language') == 'english')$ @else € @endif</td>
		 <td>{{ $item->product_qty }}@if (session()->get('language') == 'english')piece(s) @else Piéce(s) @endif </td>

		 <td> 
		 	@if($item->discount_price == NULL)
		 	<span class="badge badge-pill badge-danger">@if (session()->get('language') == 'english')No Discount @else Pas de Réduction @endif</span>

		 	@else
		 	@php
		 	$amount = $item->price - $item->discount_price;
		 	$discount =($amount/$item->price) * 100;
		 	@endphp
   <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

		 	@endif



		 </td>

		 <td>
		 	@if($item->status == 1)
		 	<span class="badge badge-pill badge-success"> Active </span>
		 	@else
           <span class="badge badge-pill badge-danger"> InActive </span>
		 	@endif

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