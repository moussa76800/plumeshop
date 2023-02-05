<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
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

        

}
