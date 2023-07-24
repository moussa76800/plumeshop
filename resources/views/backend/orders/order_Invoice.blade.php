<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: green;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks h1 {
        text-align:center;
        font-size: 16px;
        font-weight: bold;
        font-family: serif;
        
    }
</style>

</head>
@if (session()->get('language') == 'english')
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: green; font-size: 26px;"><strong>PlumeShop</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Plumeshop Head Office
               Email:support@PlumeShop.be <br>
               Mobile: 1245454545 <br>
               Bruxelles 1000, <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>
  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
           <strong>Name:</strong> {{ $order->user->name }}<br>
           <strong>Email:</strong> {{ $order->user->email }} <br>
           <strong>Phone:</strong> {{ $order->user->phone }} <br>
           @php
            $adress = $order->user->adress->street_name ,$order->user->adress->street_number , $order->user->adress->city ;
            $state = $order->user->adress->country->name;
           @endphp
            
           <strong>Address:</strong> {{ $adress}}, ({{ $state }}) <br>
           
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: green;">Invoice:</span> #{{ $order->invoice_no}}</h3>
            Order Date: {{ $order->order_date }} <br>
             Delivery Date: {{ $order->delivered_date }} <br>
            Payment Type : {{ $order->payment_method }} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Products</h3>
  <table width="100%">
    <thead style="background-color: green; color:#FFFFFF;">
      <tr class="font">
        <th>Image</th>
        <th>Product Name</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
      </tr>
    </thead>
    <tbody>
     @foreach($orderItem as $item)
      <tr class="font">
        <td align="center">
            <img src="{{ public_path($item->book->image)  }}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center"> {{ $item->book->name }}</td>
        <td align="center">{{ $item->book->product_code }}</td>
        <td align="center">{{ $item->qty }}</td>
        <td align="center">${{ $item->price }}</td>
        <td align="center">${{ $item->price * $item->qty }} </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: green;">Subtotal : </span>${{ $order->amount }}</h2>
            <h2><span style="color: green;">Total : </span> ${{ $order->amount }}</h2>
            {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Client's signature :</h5>
    </div>
    <br>
    <br>
    <br>
    <br>
    <div class="thanks mt-3">
    <h1>Thanks For Buying Products..!!</h1>
      </div>

      @else

      <body>

        <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
          <tr>
              <td valign="top">
                <!-- {{-- <img src="" alt="" width="150"/> --}} -->
                <h2 style="color: green; font-size: 26px;"><strong>PlumeShop</strong></h2>
              </td>
              <td align="right">
                  <pre class="font" >
                     Plumeshop Siège Social
                     Email:support@PlumeShop.be <br>
                     GSM: 1245454545 <br>
                     Bruxelles 1000, <br>
                    
                  </pre>
              </td>
          </tr>
      
        </table>
      
      
        <table width="100%" style="background:white; padding:2px;""></table>
        <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
          <tr>
              <td>
                <p class="font" style="margin-left: 20px;">
                 <strong>Nom:</strong> {{ $order->user->name }}<br>
                 <strong>Email:</strong> {{ $order->user->email }} <br>
                 <strong>Phone:</strong> {{ $order->user->phone }} <br>
                 @php
            $adress = $order->user->adress->street_name ,$order->user->adress->street_number , $order->user->adress->city ;
            $state = $order->user->adress->country->name;
           @endphp
                  
                  <strong>Address:</strong> {{ $adress}}, ({{ $state }}) <br>
               </p>
              </td>
              <td>
                <p class="font">
                  <h3><span style="color: green;">Invoice:</span> #{{ $order->invoice_no}}</h3>
                   Date d'Achat: {{ $order->order_date }} <br>
                   Date de Livraison: {{ $order->delivered_date }} <br>
                   Type de Paiement : {{ $order->payment_method }} </span>
               </p>
              </td>
          </tr>
        </table>
        <br/>
      <h3>Produits</h3>
        <table width="100%">
          <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
              <th>Image</th>
              <th>Nom</th>
              <th>Code</th>
              <th>Quantité</th>
              <th>Prix Unitaire </th>
              <th>Total </th>
            </tr>
          </thead>
          <tbody>
           @foreach($orderItem as $item)
            <tr class="font">
              <td align="center">
                  <img src="{{ public_path($item->book->image)  }}" height="60px;" width="60px;" alt="">
              </td>
              <td align="center"> {{ $item->book->name }}</td>
              <td align="center">{{ $item->book->product_code }}</td>
              <td align="center">{{ $item->qty }}</td>
              <td align="center">${{ $item->price }}</td>
              <td align="center">${{ $item->price * $item->qty }} </td>
            </tr>
            <br>
            @endforeach
            
          </tbody>
        </table>
        <br>
        <table width="100%" style=" padding:0 10px 0 10px;">
          <tr>
              <td align="right" >
                  <h2><span style="color: green;">Sous-Total : </span>${{ $order->amount }}</h2>
                  <h2><span style="color: green;">Total : </span> ${{ $order->amount }}</h2>
                  {{-- <h2><span style="color: green;">Full Payment PAID</h2> --}}
              </td>
          </tr>
        </table>
        
        <div class="authority float-right mt-5">
            <p>-----------------------------------</p>
            <h5>Signature du client:</h5>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <div class="thanks mt-3">
          <h1>Merci, pour votre achat ..!!</h1>
            </div>
    @endif
</body>
</html>