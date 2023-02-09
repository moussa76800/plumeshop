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
		
		<td>   
            @if($item->status == 'pending')        
            <span class="badge badge-pill badge-warning" style="background: #800080;">Pending  </span>
            @elseif($item->status == 'confirmed')
             <span class="badge badge-pill badge-warning" style="background: #0000FF;">Confirmed  </span>
    
              @elseif($item->status == 'processing')
             <span class="badge badge-pill badge-warning" style="background: #FFA500;">Processing </span>
    
              @elseif($item->status == 'picked')
             <span class="badge badge-pill badge-warning" style="background: #808000;">Picked  </span>
    
              @elseif($item->status == 'shipped')
             <span class="badge badge-pill badge-warning" style="background: #808080;">Shipped </span>
    
              @elseif($item->status == 'delivered')
             <span class="badge badge-pill badge-warning" style="background: #008000;">Delivered </span>
    
              @if($item->return_order == 1) 
               <span class="badge badge-pill badge-warning" style="background:red;">Return Requested  </span>
    
              @endif
    
             @else
      <span class="badge badge-pill badge-warning" style="background: #FF0000;">Cancel  </span>
    
          @endif
    
        <td width="25%">
    <a href="{{ route('pending.detail',$item->id) }}" class="btn btn-info" title="Voir Details"><i class="fa fa-eye"></i> </a>
    
    <a target="_blank" href="{{ route('invoice.download',$item->id) }}" class="btn btn-danger" title="Télécharger Facture">
     <i class="fa fa-download"></i></a>
        </td> </td>

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
        <span class="badge badge-pill badge-warning" style="background: #800080;">En Attente  </span>
        @elseif($item->status == 'confirmed')
         <span class="badge badge-pill badge-warning" style="background: #0000FF;">Confirmation  </span>

          @elseif($item->status == 'processing')
         <span class="badge badge-pill badge-warning" style="background: #FFA500;">Traîtement  </span>

          @elseif($item->status == 'picked')
         <span class="badge badge-pill badge-warning" style="background: #808000;">Préparation  </span>

          @elseif($item->status == 'shipped')
         <span class="badge badge-pill badge-warning" style="background: #808080;">Expédition  </span>

          @elseif($item->status == 'delivered')
         <span class="badge badge-pill badge-warning" style="background: #008000;">Délivrer</span>

          @if($item->return_order == 1) 
           <span class="badge badge-pill badge-warning" style="background:red;">Retour demandé  </span>

          @endif

         @else
  <span class="badge badge-pill badge-warning" style="background: #FF0000;">Annuler  </span>

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