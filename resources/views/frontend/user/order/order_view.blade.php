@extends('frontend.main_master')
@section('content')

<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user.user_sidebar')

             <div class="col-md-2">
             </div>

       <div class="col-md-8">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Total</label>
                </td>

                <td class="col-md-3">
                  <label for="">@if (session()->get('language') == 'french')Paiement @else Payment @endif</label>
                </td>


                <td class="col-md-2">
                  <label for="">@if (session()->get('language') == 'french')Facture @else Invoice @endif</label>
                </td>

                 <td class="col-md-2">
                  <label for="">@if (session()->get('language') == 'french')Achat @else Order @endif</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Action </label>
                </td>
                
              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
									<label>${{ $order->shippingMethod->amount ?? '' }}</label>
								</td>
								<td class="col-md-3">
									<label>{{ $order->shippingMethod->payment_method ?? '' }}</label>
								</td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

                
                <td class="col-md-2">
                  <label for=""> 
                      <span class="badge badge-pill badge-warning">
                          <!-- Utilisez la variable $orderStatus pour afficher le texte correspondant à l'état -->
                          @if ($aa = $order->orderStatus)
                              @if (!is_null($aa->pending_date))
                                  <span class="badge badge-pill badge-warning" style="background: #800080;">En Attente</span>
                              @elseif (!is_null($aa->processing_date))
                                  <span class="badge badge-pill badge-warning" style="background: #FFA500;">Traîtement</span>
                              @elseif (!is_null($aa->shipped_date))
                                  <span class="badge badge-pill badge-warning" style="background: #808080;">Expédition</span>
                              @elseif (!is_null($aa->delivered_date))
                                  <span class="badge badge-pill badge-warning" style="background: #418DB9;">Délivrer</span>
                              @elseif (!is_null($aa->cancel_date))
                                  <span class="badge badge-pill badge-warning" style="background: red;">Annuler</span>
                              @elseif ($aa->return_date == 1)
                                  <span class="badge badge-pill badge-warning" style="background: #008000;">Retour demandé</span>
                              @elseif (!is_null($aa->return_reason))
                                  <span class="badge badge-pill badge-warning" style="background: #418DB9;">Retour Raison</span>
                              @else
                                  <span class="badge badge-pill badge-warning" style="background: #418DB9;">Statut inconnu</span>
                              @endif
                          @else
                              <span class="badge badge-pill badge-warning" style="background: #418DB9;">Aucun statut</span>
                          @endif
                      </span>
                  </label>
              </td>
              

         <td class="col-md-1">
          <a href="{{ url('user/order_detail/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>@if (session()->get('language') == 'french') Voir @else  View @endif</a>

           <a target="_blank" href=" {{ url('user/invoice_download/'.$order->id ) }} " class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i>@if (session()->get('language') == 'french') Facture @else Invoice @endif </a>
          
        </td>
                
              </tr>
              @endforeach

            </tbody>
            
          </table>
          
        </div>
   
       </div> <!-- / end col md 8 -->

		 
		</div> <!-- // end row -->
		
	</div>
	
</div>
 

@endsection