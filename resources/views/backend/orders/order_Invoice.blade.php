<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .header h2 {
      color: #336699;
      font-size: 28px;
    }

    .contact-info {
      background-color: #f7f7f7;
      padding: 10px;
      border-radius: 5px;
    }

    .info-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .info-table td {
      padding: 10px;
    }

    .info-table p {
      margin: 0;
    }

    .info-table h3 {
      color: #336699;
      font-size: 20px;
      margin-top: 0;
    }

    .products-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    .products-table th, .products-table td {
      border: 1px solid #dddddd;
      padding: 10px;
      text-align: center;
    }

    .products-table th {
      background-color: #336699;
      color: #ffffff;
    }

    .subtotal {
      text-align: right;
      color: #336699;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2><strong>PlumeShop</strong></h2>
      <div class="contact-info">
        <pre>
          Plumeshop Head Office
          Email: support@PlumeShop.be
          Mobile: 1245454545
          Bruxelles 1000
        </pre>
      </div>
    </div>

    <table class="info-table">
      <tr>
        @php
        $address = $order->user->address->street_name . ', ' . $order->user->address->street_number;
        $city = $order->user->address->city;
        $state = $order->user->address->country->name;
              @endphp
        <td>
          <p><strong>Name:</strong> {{ $order->user->name }}</p>
          <p><strong>Email:</strong> {{ $order->user->email }}</p>
          <p><strong>Phone:</strong> {{ $order->user->phone }}</p>
          <p><strong>Address:</strong> {!! $address !!}</p>
          <p><strong>City:</strong> {!! $city !!}</p>
          <p><strong>State:</strong> {!! $state !!}</p>
        </td>
        <td>
          <p>
            <h3>Invoice: #{{ $order->invoice_no }}</h3>
            <strong>Order Date:</strong> {{ $order->order_date }}<br>
            <strong>Delivery Date:</strong> {{ $order->orderStatus->delivered_date }}<br>
            <strong>Payment Type:</strong> {{ $order->shippingMethod->payment_method }}
          </p>
        </td>
      </tr>
    </table>

    <h3>Products</h3>
    <table class="products-table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Product Name</th>
          <th>Code</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orderItem as $item)
          <tr>
            <td align="center">
              <img src="{{ public_path($item->book->image) }}" height="60px" width="60px" alt="Product Image">
            </td>
            <td align="center">{{ $item->book->title }}</td>
            <td align="center">{{ $item->book->product_code }}</td>
            <td align="center">{{ $item->qty }}</td>
            <td align="center">${{ $item->price }}</td>
            <td align="center">${{  $order->shippingMethod->amount }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="subtotal">
      <h2><span style="color: green;">Subtotal:</span> ${{ $order->shippingMethod->amount }}</h2>
      <h2><span style="color: green;">Total:</span> ${{ $order->shippingMethod->amount }}</h2>
    </div>
  </div>

  <div class="authority float-right mt-5">
    <hr style="border: 1px solid #ddd; width: 100%; margin-top: 10px;">
    <h5 style="text-align: center; margin-top: 5px;">Client's signature:</h5>
  </div>
 
  <div class="thanks mt-3" style="text-align: center;">
    <h1 style="color: #336699;">Thanks For Buying Products..!!</h1>
  </div>
  
  
</body>
</html>