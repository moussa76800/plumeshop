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
				  <h3 class="box-title">@if (session()->get('language') == 'french')Liste des commandes en attente @else Pending Orders List @endif 

                  </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Date </th>
								<th>Invoice </th>
								<th>Amount </th>
								<th>Payment </th>
								<th>Status </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($orders as $item)
	 <tr>
		<td> {{ $item->order_date }}  </td>
		<td> {{ $item->invoice_no }}  </td>
		<td> ${{ $item->shippingMethod->amount }}  </td>
		<td> {{ $item->shippingMethod->payment_method }}  </td>
		<td>
			<span class="badge badge-pill badge-primary">
				@if ($item->orderStatus)
					@php
						$orderStatus = $item->orderStatus;
						$status = '';
						switch (true) {
							case !is_null($orderStatus->pending_date):
								$status = 'En Attente';
								break;
							case !is_null($orderStatus->processing_date):
								$status = 'Traîtement';
								break;
							case !is_null($orderStatus->shipped_date):
								$status = 'Expédition';
								break;
							case !is_null($orderStatus->delivered_date):
								$status = 'Délivrer';
								break;
							case !is_null($orderStatus->cancel_date):
								$status = 'Annuler';
								break;
							case !is_null($orderStatus->return_date):
								$status = 'Retour demandé';
								break;
							case !is_null($orderStatus->return_reason):
								$status = 'Retour Raison';
								break;
							default:
								$status = 'Statut inconnu';
								break;
						}
					@endphp
					<span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $status }}</span>
				@else
					<span class="badge badge-pill badge-warning" style="background: #418DB9;">Aucun statut</span>
				@endif
			</span>
		</td>
		

		<td width="25%">
           <a href="{{ route('pending.detail',$item->id) }}" class="btn btn-success" title="View Order"><i class="fa fa-eye"></i> </a>
 
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