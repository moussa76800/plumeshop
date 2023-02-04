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
                  <label for=""> ${{ $order->amount }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

         <td class="col-md-2">
          <label for=""> 

    @if($order->status == 'pending')        
        <span class="badge badge-pill badge-warning" style="background: #800080;">@if (session()->get('language') == 'french')En Attente @else Pending @endif </span>
        @elseif($order->status == 'confirm')
         <span class="badge badge-pill badge-warning" style="background: #0000FF;">@if (session()->get('language') == 'french')Confirmé @else Confirm @endif </span>

          @elseif($order->status == 'processing')
         <span class="badge badge-pill badge-warning" style="background: #FFA500;">@if (session()->get('language') == 'french')Traîtement @else Processing @endif </span>

          @elseif($order->status == 'picked')
         <span class="badge badge-pill badge-warning" style="background: #808000;">@if (session()->get('language') == 'french')Choix @else Picked @endif </span>

          @elseif($order->status == 'shipped')
         <span class="badge badge-pill badge-warning" style="background: #808080;">@if (session()->get('language') == 'french')Expédition @else Shipped @endif </span>

          @elseif($order->status == 'delivered')
         <span class="badge badge-pill badge-warning" style="background: #008000;">@if (session()->get('language') == 'french')Délivrer @else Delivered @endif </span>

          @if($order->return_order == 1) 
           <span class="badge badge-pill badge-warning" style="background:red;">@if (session()->get('language') == 'french')Retour demandé @else Return Requested @endif </span>

          @endif

         @else
  <span class="badge badge-pill badge-warning" style="background: #FF0000;">@if (session()->get('language') == 'french')Annuler @else Cancel @endif </span>

      @endif
            </label>
        </td>

         <td class="col-md-1">
          <a href="{{ url('user/order_detail/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>@if (session()->get('language') == 'french')Voir @else  View @endif</a>

           <a target="_blank" href=" {{ url('user/invoice_download/'.$order->id ) }} " class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i>@if (session()->get('language') == 'french')Facture @else Invoice @endif </a>
          
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