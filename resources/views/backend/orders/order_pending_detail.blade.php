@extends('admin.admin_master')
@section('admin')


  <!-- Content Wrapper. Contains page content -->
  @if (session()->get('language') == 'english')
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
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th> Shipping Phone : </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Shipping Email : </th>
               <th> {{ $order->email }} </th>
            </tr>

             <tr>
              <th> Common : </th>
               <th> {{ $order->common->name }} </th>
            </tr>

             <tr>
              <th> Town : </th>
               <th> {{ $order->town->name }} </th>
            </tr>

             <tr>
              <th> State : </th>
               <th>{{ $order->country->name }} </th>
            </tr>

            <tr>
              <th> Post Code : </th>
               <th> {{ $order->post_code }} </th>
            </tr>

            <tr>
              <th> Order Date : </th>
               <th> {{ $order->order_date }} </th>
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
              <th>  Name : </th>
               <th> {{ $order->user->name }} </th>
            </tr>

             <tr>
              <th>  Phone : </th>
               <th> {{ $order->user->phone }} </th>
            </tr>

             <tr>
              <th> Payment Type : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

             <tr>
              <th> Tranx ID : </th>
               <th> {{ $order->transaction_id }} </th>
            </tr>

             <tr>
              <th> Invoice  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Order Total : </th>
               <th>${{ $order->amount }} </th>
            </tr>

            <tr>
              <th> Order : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>


            <tr>
              <th>  </th>
               <th> 
                @if($order->status == 'pending')
               <a href="{{ route('pendingToConfirmed',$order->id) }}" class="btn btn-outline-success text-white btn mb-2" id="confirmed">Confirmer la Commande</a>

                @elseif($order->status == 'confirmed')
               <a href="{{ route('confirmToProcessing',$order->id) }}"  class="btn btn-outline-success text-white btn mb-2" id="processing">Commande en Traîtement</a>
              @elseif($order->status == 'processing')
               <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>

               @elseif($order->status == 'picked')
               <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped Order</a>

               @elseif($order->status == 'shipped')
            <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a> 

               @endif 

                 </th>
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
                  <label for=""><img src="{{ asset($item->book->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

               <td width="20%">
                  <label for=""> {{ $item->book->name_en }}</label>
                </td>


                <td width="10%">
                  <label for=""> {{ $item->book->product_code }}</label>
                </td>

                <td width="10%">
                  <label for=""> {{ $item->qty }}</label>
                </td>

         <td width="10%">
                  <label for=""> ${{ $item->price }}  $ {{ $item->price * $item->qty}} </label>
                </td>

                <td width="10%">
                    <label for="">$ {{ $item->price * $item->qty}}  </label>
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
@else

<div class="container-full">
    <!-- Content Header (Page header) -->
     
    
<div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Details de l'achat</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Details de l'achat</li>
                             
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
                <h4 class="box-title"><strong> Détails de l'expédition</strong> </h4>
              </div>
              

<table class="table">
        <tr>
          <th> Nom : </th>
           <th> {{ $order->name }} </th>
        </tr>

         <tr>
          <th> GSM : </th>
           <th> {{ $order->phone }} </th>
        </tr>

         <tr>
          <th> Email : </th>
           <th> {{ $order->email }} </th>
        </tr>

         <tr>
          <th> Commune : </th>
           <th> {{ $order->common->name }} </th>
        </tr>

         <tr>
          <th> Ville : </th>
           <th> {{ $order->town->name }} </th>
        </tr>

         <tr>
          <th> Pays : </th>
           <th>{{ $order->country->name }} </th>
        </tr>

        <tr>
          <th>Code Postal : </th>
           <th> {{ $order->post_code }} </th>
        </tr>

        <tr>
          <th>Date d'achat : </th>
           <th> {{ $order->order_date }} </th>
        </tr>
         
       </table>



            </div>
          </div> <!--  // cod md -6 -->


<div class="col-md-6 col-12">
            <div class="box box-bordered border-primary">
              <div class="box-header with-border">
                <h4 class="box-title"><strong>Details de(s) l'achat(s)</strong><span class="text-danger"> Facture : {{ $order->invoice_no }}</span></h4>
              </div>
               

<table class="table">
        <tr>
          <th>  Nom : </th>
           <th> {{ $order->user->name }} </th>
        </tr>

         <tr>
          <th>  GSM : </th>
           <th> {{ $order->user->phone }} </th>
        </tr>

         <tr>
          <th>Type de Paiement : </th>
           <th> {{ $order->payment_method }} </th>
        </tr>

         <tr>
          <th> Tranx ID : </th>
           <th> {{ $order->transaction_id }} </th>
        </tr>

         <tr>
          <th> Facture  : </th>
           <th class="text-danger"> {{ $order->invoice_no }} </th>
        </tr>

         <tr>
          <th>Total des Achats : </th>
           <th>${{ $order->amount }} </th>
        </tr>

        <tr>
          <th> Achat : </th>
           <th>   
            <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
        </tr>


        <tr>
          <th>  </th>
           <th> 
           
                @if($order->status == 'pending')
               <a href="{{ route('pendingToConfirmed',$order->id) }}" class="btn btn-outline-success text-white btn mb-2" id="confirmed">Confirmer la Commande</a>

                @elseif($order->status == 'confirmed')
               <a href="{{ route('confirmToProcessing',$order->id) }}"  class="btn btn-outline-success text-white btn mb-2" id="processing">Commande en Traîtement</a>
              @elseif($order->status == 'processing')
               <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>

               @elseif($order->status == 'picked')
               <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped Order</a>

               @elseif($order->status == 'shipped')
            <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a> 

               @endif 

             </th>
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
              <label for=""> Nom du produit</label>
            </td>

         <td width="10%">
              <label for=""> Code du produit</label>
            </td>


          

              <td width="10%">
              <label for=""> Quantité</label>
            </td>

           <td width="10%">
              <label for=""> Prix</label>
            </td>
            <td width="10%">
                <label for=""> Total</label>
              </td>
            
          </tr>


          @foreach($orderItem as $item)
   <tr>
           <td width="10%">
              <label for=""><img src="{{ asset($item->book->product_thambnail) }}" height="50px;" width="50px;"> </label>
            </td>

           <td width="20%">
              <label for=""> {{ $item->book->name_en }}</label>
            </td>


            <td width="10%">
              <label for=""> {{ $item->book->product_code }}</label>
            </td>


            <td width="10%">
              <label for=""> {{ $item->qty }}</label>
            </td>

     <td width="10%">
              <label for=""> ${{ $item->price }}   </label>
            </td>
            <td width="10%">
                <label for="">  $ {{ $item->price * $item->qty}}  </label>
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

@endif

@endsection
