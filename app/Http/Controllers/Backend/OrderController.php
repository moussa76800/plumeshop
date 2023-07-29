<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as FacadesDB;

class OrderController extends Controller
{


public function PendingOrders()
{
    $orders = Order::with('shippingMethod', 'orderStatus', 'user')
                   ->whereHas('orderStatus', function ($query) {
                       $query->where('pending_date', 'pending');
                   })
                   ->orderBy('id', 'DESC')
                   ->get();

    return view('backend.orders.pending', compact('orders'));
}


    public function PendingOrderDetail($order_id){
		$order = Order::with('user.address.country','user')->where('id',$order_id)->first();
    $orderItem = OrderItem::with('book')->where('order_id',$order_id)->orderBy('id','DESC')->get();
          return view('backend.orders.order_pending_detail',compact('order','orderItem'));
		} 
    
    public function processingOrders(){
      $orders = Order::with('shippingMethod', 'orderStatus', 'user')->whereHas('orderStatus', function ($query){$query->where('processing_date','processing');
      })->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing',compact('orders'));
    } 
  
    public function shippedOrders(){
      $orders = Order::with('shippingMethod', 'orderStatus', 'user')->whereHas('orderStatus', function ($query){$query->where('shipped_date','shipped');
      })->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped',compact('orders'));
    } 
    public function deliveredOrders(){
      $orders = Order::with('shippingMethod', 'orderStatus', 'user')->whereHas('orderStatus', function ($query){$query->where('delivered_date','delivered');
      })->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered',compact('orders'));
    } 
    public function cancelOrders(){
      $orders = Order::with('shippingMethod', 'orderStatus', 'user')->whereHas('orderStatus', function ($query){$query->where('cancel_date','cancel');
      })->orderBy('id', 'DESC')->get();;
        return view('backend.orders.cancel',compact('orders'));
    } 
    
// Admin Update All Statut :

public function pendingToProcessOrder($order_id) {
  $orderStatus = OrderStatus::where('order_id', $order_id)->first();

  if ($orderStatus) {
      $orderStatus->pending_date = null;
      $orderStatus->processing_date = 'processing';
      $orderStatus->save();
  }
      $notification = array(
          'message' => 'Order by Processing',
          'alert-type' => 'success'
      );

      return redirect()->route('pending')->with($notification);
  }

// Processing To Shipped
public function ProcessingToShippedOrder($order_id){
  $orderStatus = OrderStatus::where('order_id', $order_id)->first();

  if ($orderStatus) {
      $orderStatus->processing_date = null;
      $orderStatus->shipped_date= 'shipped';
      $orderStatus->save();
  }
      $notification = array(
          'message' => 'Order Shipped',
          'alert-type' => 'success'
      );

      return redirect()->route('processing')->with($notification);
  }


// Shipped To Delivered
public function ShippedToDeliveredOrder($order_id){
  $orderStatus = OrderStatus::where('order_id', $order_id)->first();

  if ($orderStatus) {
      $orderStatus->shipped_date = null;
      $orderStatus->delivered_date = 'delivered';
      $orderStatus->save();
  }
      $notification = array(
          'message' => 'Order Delivered',
          'alert-type' => 'success'
      );

      return redirect()->route('shipped')->with($notification); 
     }

// Delivered To Cancel
public function DeliveredToCancelOrder($order_id){
  $orderStatus = OrderStatus::where('order_id', $order_id)->first();

  if ($orderStatus) {
      $orderStatus->delivered_date = null;
      $orderStatus->cancel_date = 'cancel';
      $orderStatus->save();
  }
      $notification = array(
          'message' => 'Order Canceled',
          'alert-type' => 'error'
      );

      return redirect()->route('delivered')->with($notification);
  }


  public function AdminInvoiceDownload($order_id)
{
    $order = Order::with('user.address.country', 'user.address', 'user')->where('id', $order_id)->first();
    $orderItem = OrderItem::with('book')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
     
    // Concaténation de l'adresse de l'utilisateur
    $address = $order->user->address->street_name . ', ' . $order->user->address->street_number . ', ' . $order->user->address->city;
    
    $pdf = PDF::loadView('backend.orders.order_invoice', compact('order', 'orderItem', 'address'))->setPaper('a4')->setOptions([
        'tempDir' => public_path(),
        'chroot' => public_path(),
    ]);

    return $pdf->download('invoice.pdf');
}


//   public function getSalesReportAjax(Request $request)
// {
//   $pending = Order::where('status','pending')->get();

//     return response()->json($pending);
// }
public function getSalesReportAjax(Request $request)
{
    $pending = Order::whereHas('orderStatus', function ($query) {
                    $query->where('pending_date', 'pending');
                })->get();

    return response()->json($pending);
}
    

}
