<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{

	public function PendingOrders(){
		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending',compact('orders'));
	} 
    public function PendingOrderDetail($order_id){
		$order = Order::with('common','town','country','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('book')->where('order_id',$order_id)->orderBy('id','DESC')->get();
          return view('backend.orders.order_pending_detail',compact('order','orderItem'));
		} 
    public function confirmedOrders(){
        $orders = Order::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('backend.orders.confirmed',compact('orders'));
    } 
    
    public function processingOrders(){
        $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('backend.orders.processing',compact('orders'));
    } 
    public function pickedOrders(){
        $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('backend.orders.picked',compact('orders'));
    } 
    public function shippedOrders(){
        $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('backend.orders.shipped',compact('orders'));
    } 
    public function deliveredOrders(){
        $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('backend.orders.delivered',compact('orders'));
    } 
    public function cancelOrders(){
        $orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
        return view('backend.orders.cancel',compact('orders'));
    } 
    
// Admin Update All Statut :

// Pending To confirm
public function pendingToConfirmOrder($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'confirmed']);

    if (session()->get('language') == 'french'){
    $notification = array(
          'message' => 'La Commande est Confirmée avec Succès',
          'alert-type' => 'success'
      );
    return redirect()->route('pending')->with($notification);
    }
    $notification = array(
        'message' => 'Order Confirm Successfully',
        'alert-type' => 'success'
    );
  return redirect()->route('pending')->with($notification);
  } 

  // Confirm To Processing
  public function ConfirmToProcessingOrder($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'processing']);

    if (session()->get('language') == 'french'){
    $notification = array(
          'message' => 'La Commande est Traîtement ',
          'alert-type' => 'success'
      );
    return redirect()->route('confirmed')->with($notification);
    }
    $notification = array(
        'message' => 'Order Processing',
        'alert-type' => 'success'
    );
  return redirect()->route('confirmed')->with($notification);
  } 

  // Processing To Picked
  public function ProcessingToPickedOrder($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'picked']);

    if (session()->get('language') == 'french'){
    $notification = array(
          'message' => 'La Commande est Préparée ',
          'alert-type' => 'success'
      );
    return redirect()->route('picked')->with($notification);
    }
    $notification = array(
        'message' => 'Order Picked',
        'alert-type' => 'success'
    );
  return redirect()->route('picked')->with($notification);
  } 

   //  Picked To Shipped
   public function PickedToShippedOrder($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'shipped']);

    if (session()->get('language') == 'french'){
    $notification = array(
          'message' => 'La Commande est expédiée ',
          'alert-type' => 'success'
      );
    return redirect()->route('shipped')->with($notification);
    }
    $notification = array(
        'message' => 'Order Shipped',
        'alert-type' => 'success'
    );
  return redirect()->route('shipped')->with($notification);
  } 

   //  Shipped To Delivered
   public function ShippedToDeliveredOrder($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'delivered']);

    if (session()->get('language') == 'french'){
    $notification = array(
          'message' => 'La Commande est Délivrée ',
          'alert-type' => 'success'
      );
    return redirect()->route('delivered')->with($notification);
    }
    $notification = array(
        'message' => 'Order Delivered',
        'alert-type' => 'success'
    );
  return redirect()->route('delivered')->with($notification);
  } 

   //   Delivered To Cancel
   public function DeliveredToCancelOrder($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'cancel']);

    if (session()->get('language') == 'french'){
    $notification = array(
          'message' => 'La Commande est Supprimée ',
          'alert-type' => 'success'
      );
    return redirect()->route('delivered')->with($notification);
    }
    $notification = array(
        'message' => 'Order Canceled',
        'alert-type' => 'success'
    );
  return redirect()->route('delivered')->with($notification);
  } 

  public function AdminInvoiceDownload($order_id){

    $order = Order::with('common','town','country','user')->where('id',$order_id)->first();
    $orderItem = OrderItem::with('book')->where('order_id',$order_id)->orderBy('id','DESC')->get();
     
    $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
    ]);
    return $pdf->download('invoice.pdf');

  }
        

}
