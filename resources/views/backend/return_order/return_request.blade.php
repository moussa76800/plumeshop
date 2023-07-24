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
				  <h3 class="box-title">@if (session()->get('language') == 'french') Liste des Retours de Commandes @else Return Orders List @endif</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date </th>
								<th>@if (session()->get('language') == 'french') Facture @else Invoice @endif  </th>
								<th>@if (session()->get('language') == 'french') Montant @else Amount @endif </th>
								<th>@if (session()->get('language') == 'french') Paimement @else Payment @endif </th>
								<th>@if (session()->get('language') == 'french') Statut @else Status @endif </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($orders as $item)
	 <tr>
		<td> {{ $item->order_date }}  </td>
		<td> {{ $item->invoice_no }}  </td>
		<td>@if (session()->get('language') == 'french')€ {{ $item->shippingMethod->amount }} @else ${{ $item->shippingMethod->amount }} @endif $ {{ $item->shippingMethod->amount }}  </td>

		<td> {{ $item->shippingMethod->payment_method }}  </td>
		<td>
		@if($item->return_order == 1)
      <span class="badge badge-pill badge-primary">@if (session()->get('language') == 'french')En Attente @else Pending @endif </span>
       @elseif($item->return_order == 2)
       <span class="badge badge-pill badge-success">@if (session()->get('language') == 'french')Succès @else Success @endif </span>
		@endif

		  </td>

		<td width="25%">
  <a href="{{ route('return_approve',$item->id) }}" class="btn btn-danger">@if (session()->get('language') == 'french')Approuver @else Approve @endif </a>

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