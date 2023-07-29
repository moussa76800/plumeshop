@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
 
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		 
        
<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title"> Order Details </h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">@ Order Details </li>
								 
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>



		<!-- Main content -->
		<section class="content">
		  <div class="row">
			   
		 
<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong> </h4>
				  </div>
				  

<table class="table">
            <tr>
              <th> Name : </th>
              <th> {{ $order->user->name }} </th>
           </tr>

            <tr>
             <th> Phone: </th>
              <th> {{ $order->user->phone }} </th>
           </tr>

            <tr>
             <th> Email: </th>
              <th> {{ $order->user->email }} </th>
           </tr>

            <tr>
             <th> Address : </th>
              <th> {{ $order->user->address->street_name }}, {{ $order->user->address->street_number}} </th>
           </tr>

            <tr>
             <th> City : </th>
              <th> {{ $order->user->address->city}} </th>
           </tr>

            <tr>
             <th> Country : </th>
              <th>{{ $order->user->address->Country->name}} </th>
           </tr>
             
           </table>
 


				</div>
			  </div> <!--  // cod md -6 -->


<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
				  </div>
				   

<table class="table">
  <tr>
    <th> Order Date : </th>
     <th> {{ $order->order_date }} </th>
  </tr>
   <tr>
    <th> Payment Type : </th>
     <th> {{ $order->shippingMethod->payment_method }} </th>
  </tr>

    <tr>
    <th> Invoice  : </th>
     <th class="text-danger"> {{ $order->invoice_no }} </th>
  </tr>

   <tr>
    <th> Price Total : </th>
     <th>{{ $order->shippingMethod->amount }} </th>
  </tr>

  <tr>
    <tr>
      <th> Order : </th>
      <th>   
          <span class="badge badge-pill badge-warning" style="background: #418DB9;">
              @if ($order->orderStatus)
                  @if ($order->orderStatus->pending_date)
                      En Attente
                  @elseif ($order->orderStatus->processing_date)
                      Traîtement
                  @elseif ($order->orderStatus->shipped_date)
                      Expédition
                  @elseif ($order->orderStatus->delivered_date)
                      Délivrer
                  @elseif ($order->orderStatus->cancel_date)
                      Annuler
                  @elseif ($order->orderStatus->return_date)
                      Retour demandé
                  @elseif ($order->orderStatus->return_reason)
                      Retour Raison
                  @else
                      Statut inconnu
                  @endif
              @else
                  Aucun statut
              @endif
          </span>
      </th>
  </tr>
  
  <tr>
      <th>  </th>
      <th> 
          @if ($order->orderStatus)
              @if ($order->orderStatus->pending_date)
                  <a href="{{ route('pendingToProcessing',$order->id) }}" class="btn btn-outline-success text-white btn mb-2" id="processing">Order Processing</a>
              @elseif ($order->orderStatus->processing_date)
                  <a href="{{ route('processingToShipped',$order->id) }}"  class="btn btn-outline-success text-white btn mb-2" id="shipped">Shipped Order</a>
              @elseif ($order->orderStatus->shipped_date)
                  <a href="{{ route('shippedToDelivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>
              @endif
          @endif
      </th>
  </tr>
  
  </tr>  
           </table>
				</div>
			  </div> <!--  // cod md -6 -->





<div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					 
				  </div>



 <table class="table">
            <tbody>
  
              <tr>
                <td width="10%">
                  <label for=""> Image</label>
                </td>

                 <td width="20%">
                  <label for=""> Product Name </label>
                </td>

             <td width="10%">
                  <label for=""> Product Code</label>
                </td>

                  <td width="10%">
                  <label for=""> Quantity </label>
                </td>

               <td width="10%">
                  <label for=""> Price </label>
                </td>

                <td width="10%">
                    <label for=""> Total </label>
                  </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
               <td width="10%">
                  <label for=""><img src="{{ asset($item->book->image) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item->book->title }}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item->book->product_code }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

                
         <td width="10%">
                  <label for=""> ${{ $item->book->price }}   </label>
                </td>

                <td width="10%">
                    <label for="">$ {{intval ($item->book->price) * $item->qty}}  </label>
                  </td>
                
                
              </tr>
              @endforeach

            </tbody>
            
          </table>
        </div>
    </div>  <!--  // cod md -12 -->

</div>
<!-- /. end row -->
</section>
<!-- /.content -->

</div>

@endsection
