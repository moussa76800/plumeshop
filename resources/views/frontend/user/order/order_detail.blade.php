@extends('frontend.main_master')
@section('content')


@if (session()->get('language') == 'english')
<div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user.user_sidebar')

      <div class="col-md-4">
        <div class="card">
          <div class="card-header"><h4><b>Shipping Details :</b></h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th> Shipping Name : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th>Shipping Phone: </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th> Shipping Email: </th>
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
              <th> Country : </th>
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
          
        </div>
        
      </div> <!-- // end col md -5 -->



<div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4><b> Order Details :</b> <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
            <br><br>
             </div>
   
         <div class="card-body" style="background: #E9EBEC;">
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
              <th> Invoice  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Order Total : </th>
               <th>{{ $order->amount }} </th>
            </tr>

            <tr>
              <th> Order : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>
           </table>
         </div>  
        </div>
      </div> <!-- // 2ND end col md -5 -->

      <div class="row">
<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Image</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Product Name </label>
                </td>

                <td class="col-md-3">
                  <label for=""> Product Code</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Quantity </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Price </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Total </label>
                </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ asset($item->book->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $item->book->name_en }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $item->book->product_code }}</label>
                </td>

        

                 <td class="col-md-2">
                  <label for=""> {{ $item->qty }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> ${{ $item->price }}  </label>
                </td>

                <td class="col-md-2">
                  <label for="">  $ {{ $item->price * $item->qty}} </label>
                </td>


{{-- @php 
$file = App\Models\Product::where('id',$item->product_id)->first();
@endphp

             <td class="col-md-1">
              @if($order->status == 'pending')  
              <strong>
 <span class="badge badge-pill badge-success" style="background: #418DB9;"> No File</span>  </strong> 
                
              @elseif($order->status == 'confirm')  

<a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">  
  <strong>
 <span class="badge badge-pill badge-success" style="background: #FF0000;"> Download Ready</span>  </strong> </a> 
              @endif 


                </td>--}}


              </tr>
              @endforeach

            </tbody>
            
          </table>
          
        </div>
 
         
       </div> <!-- / end col md 8 --> 
        
      </div> <!-- // END ORDER ITEM ROW -->

       @if($order->status !== "delivered")
      
      @else

      @php 
      $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
      @endphp


      @if($order)
      <form action="{{ route('return.order',$order->id) }}" method="post">
        @csrf 

  <div class="form-group">
    <label for="label"> Order Return Reason:</label>
    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Return Reason</textarea>    
  </div>

  <button type="submit" class="btn btn-danger">Order Return</button>

</form>
   @else

   <span class="badge badge-pill badge-warning" style="background: red">You Have send return request for this product</span>
   
   @endif

  @endif 
<br><br>

		</div> <!-- // end row -->
		
	</div>
	
</div>
 @else

 <div class="body-content">
	<div class="container">
		<div class="row">
			 @include('frontend.common.user.user_sidebar')

      <div class="col-md-4">
        <div class="card">
          <div class="card-header"><h4><b>Détails d'expédition :</b></h4></div>
         <hr>
         <div class="card-body" style="background: #E9EBEC;">
           <table class="table">
            <tr>
              <th>Nom : </th>
               <th> {{ $order->name }} </th>
            </tr>

             <tr>
              <th>GSM: </th>
               <th> {{ $order->phone }} </th>
            </tr>

             <tr>
              <th>Email: </th>
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
              <th>Date de l'achat : </th>
               <th> {{ $order->order_date }} </th>
            </tr>
             
           </table>


         </div> 
          
        </div>
        
      </div> <!-- // end col md -5 -->



<div class="col-md-5">
        <div class="card">
          <div class="card-header"><h4><b> Détail(s) de(s) achat(s) :</b> <span class="text-danger"> Commande : {{ $order->invoice_no }}</span></h4>
            <br><br>
             </div>
   
         <div class="card-body" style="background: #E9EBEC;">
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
              <th> Type de paiement : </th>
               <th> {{ $order->payment_method }} </th>
            </tr>

              <tr>
              <th> Commande  : </th>
               <th class="text-danger"> {{ $order->invoice_no }} </th>
            </tr>

             <tr>
              <th> Total  : </th>
               <th>{{ $order->amount }} </th>
            </tr>

            <tr>
              <th> Achat : </th>
               <th>   
                <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
            </tr>
           </table>
         </div>  
        </div>
      </div> <!-- // 2ND end col md -5 -->

      <div class="row">
<div class="col-md-12">

        <div class="table-responsive">
          <table class="table">
            <tbody>
  
              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Image</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Nom </label>
                </td>

                <td class="col-md-3">
                  <label for="">Code de l'article</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Quantité </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Prix </label>
                </td>

                <td class="col-md-1">
                  <label for=""> Total </label>
                </td>
                
              </tr>


              @foreach($orderItem as $item)
       <tr>
                <td class="col-md-1">
                  <label for=""><img src="{{ asset($item->book->product_thambnail) }}" height="50px;" width="50px;"> </label>
                </td>

                <td class="col-md-3">
                  <label for=""> {{ $item->book->name_en }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $item->book->product_code }}</label>
                </td>

        

                 <td class="col-md-2">
                  <label for=""> {{ $item->qty }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> ${{ $item->price }}  </label>
                </td>

                <td class="col-md-2">
                  <label for="">  $ {{ $item->price * $item->qty}} </label>
                </td>


{{-- @php 
$file = App\Models\Product::where('id',$item->product_id)->first();
@endphp

             <td class="col-md-1">
              @if($order->status == 'pending')  
              <strong>
 <span class="badge badge-pill badge-success" style="background: #418DB9;"> No File</span>  </strong> 
                
              @elseif($order->status == 'confirm')  

<a target="_blank" href="{{ asset('upload/pdf/'.$file->digital_file) }}">  
  <strong>
 <span class="badge badge-pill badge-success" style="background: #FF0000;"> Download Ready</span>  </strong> </a> 
              @endif 


                </td>--}}


              </tr>
              @endforeach

            </tbody>
            
          </table>
          
        </div>
 
         
       </div> <!-- / end col md 8 --> 
        
      </div> <!-- // END ORDER ITEM ROW -->

      @if($order->status !== "delivered")
      
      @else

       @php 
      $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
      @endphp 


      @if($order)
      <form action="{{ route('return.order',$order->id) }}" method="post">
        @csrf 

  <div class="form-group">
    <label for="label"> LA RAISON DU RETOUR DE LA COMMANDE : </label>
    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">La raison du retour</textarea>    
  </div>

  <button type="submit" class="btn btn-danger">Retour de l'achat</button>

</form>
   @else

   <span class="badge badge-pill badge-warning" style="background: red"> Vous avez déja envoyé une demande de retour pour ce produit !!!</span>
   
   @endif

  @endif 
<br><br>

		</div> <!-- // end row -->
		
	</div>
	
</div>
@endif

@endsection
