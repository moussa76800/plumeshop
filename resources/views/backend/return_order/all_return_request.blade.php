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
				  <h3 class="box-title">@if (session()->get('language') == 'english')All Return Orders List @else Liste de toutes les commandes de retour @endif
                  </h3>
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
								<th>@if (session()->get('language') == 'french') Paimement @else Reason @endif </th>
								<th>@if (session()->get('language') == 'french') Statut @else Status @endif </th>
								<th>Action</th>
								 
							</tr>
						</thead>
						<tbody>
	 @foreach($allRequests as $item)
	 <tr>
		<td> {{ $item->order_date }}  </td>
		<td> {{ $item->invoice_no }}  </td>
		<td> ${{ $item->shippingMethod->amount }}  </td>
		<td> {{ $item->shippingMethod->payment_method }} </td>
		<td> {{ $item->orderStatus->return_reason }}  </td>
		<td>
		@if($item->orderStatus->return_order == 1)
        <span class="badge badge-pill badge-primary">@if (session()->get('language') == 'french')En Attente @else Pending @endif </span>
       @elseif($item->orderStatus->return_order == 2)
       <span class="badge badge-pill badge-success">@if (session()->get('language') == 'french')Succès @else Success @endif </span>
		@endif

		  </td>

		<td width="25%">
  <span class="badge badge-success">Return Success </span>
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