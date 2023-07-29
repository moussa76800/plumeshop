<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    public function returnRequest(){
        $orders = Order::with('orderStatus')->where('return_order', 1)
        ->orderBy('id', 'DESC')
        ->get();        
       return view('backend.return_order.return_request',compact('orders')); 
    }

    public function requestApprove($order_id){
        DB::table('orders')
    ->join('order_status', 'orders.id', '=', 'order_status.order_id')
    ->where('orders.id', $order_id)
    ->update(['order_status.return_reason' => 2]);
        // Order::where('id',$order_id)->update(['return_order' => 2]);

        if (session()->get('language') == 'french'){
    	$notification = array(
            'message' => 'Le retour a bien été approuvé',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    $notification = array(
        'message' => 'The return has been approved',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}

    public function requestViewAll(){
    //    $allRequests =  Order::where('return_order',2)->orderBy('id','DESC')->get();
    $allRequests = Order::join('order_status', 'orders.id', '=', 'order_status.order_id')
                        ->where('order_status.return_order', 2)
                        ->orderBy('orders.id', 'DESC')
                        ->get();
       return view('backend.return_order.all_return_request',compact('allRequests'));  
    }
}
