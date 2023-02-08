@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  @if (session()->get('language') == 'english')
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Order List</h3>
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
		<td> ${{ $item->amount }}  </td>

		<td> {{ $item->payment_method }}  </td>
		
		<td> <span class="badge badge-pill badge-primary">{{ $item->status }} </span>  </td>

		<td width="25%">
 <a href="{{ route('pending.detail',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>

 <a target="_blank" href="{{ route('invoice.download',$item->id) }}" class="btn btn-danger" title="Invoice Download">
 	<i class="fa fa-download"></i></a>
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
  

@else

<div class="container-full">
    <!-- Content Header (Page header) -->
     

    <!-- Main content -->
    <section class="content">
      <div class="row">
           
     

        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Liste des Commandes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date </th>
                            <th>Facture </th>
                            <th>Montant </th>
                            <th>Paiement </th>
                            <th>Status </th>
                            <th>Action</th>
                             
                        </tr>
                    </thead>
                    <tbody>
                       
 @foreach($orders as $item)
 
 <tr>
    <td> {{ $item->order_date }}  </td>
    <td> {{ $item->invoice_no }}  </td>
    <td> ${{ $item->amount }}  </td>

    <td> {{ $item->payment_method }}  </td>
    
    <td> 
        @if($item->status == 'pending')        
        <span class="badge badge-pill badge-warning" style="background: #800080;">@if (session()->get('language') == 'french')En Attente @else Pending @endif </span>
        @elseif($item->status == 'confirmed')
         <span class="badge badge-pill badge-warning" style="background: #0000FF;">@if (session()->get('language') == 'french')Confirmation @else Confirm @endif </span>

          @elseif($item->status == 'processing')
         <span class="badge badge-pill badge-warning" style="background: #FFA500;">@if (session()->get('language') == 'french')Traîtement @else Processing @endif </span>

          @elseif($item->status == 'picked')
         <span class="badge badge-pill badge-warning" style="background: #808000;">@if (session()->get('language') == 'french')Préparation @else Picked @endif </span>

          @elseif($item->status == 'shipped')
         <span class="badge badge-pill badge-warning" style="background: #808080;">@if (session()->get('language') == 'french')Expédition @else Shipped @endif </span>

          @elseif($item->status == 'delivered')
         <span class="badge badge-pill badge-warning" style="background: #008000;">@if (session()->get('language') == 'french')Délivrer @else Delivered @endif </span>

          @if($item->return_order == 1) 
           <span class="badge badge-pill badge-warning" style="background:red;">@if (session()->get('language') == 'french')Retour demandé @else Return Requested @endif </span>

          @endif

         @else
  <span class="badge badge-pill badge-warning" style="background: #FF0000;">@if (session()->get('language') == 'french')Annuler @else Cancel @endif </span>

      @endif

    <td width="25%">
<a href="{{ route('pending.detail',$item->id) }}" class="btn btn-info" title="Voir Details"><i class="fa fa-eye"></i> </a>

<a target="_blank" href="{{ route('invoice.download',$item->id) }}" class="btn btn-danger" title="Télécharger Facture">
 <i class="fa fa-download"></i></a>
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

  @endif


@endsection