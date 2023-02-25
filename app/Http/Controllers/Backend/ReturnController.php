<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function returnRequest(){
       $orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
       return view('backend.return_order.return_request',compact('orders')); 
    }

    public function requestApprove($order_id){
        Order::where('id',$order_id)->update(['return_order' => 2]);

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
       $allRequests =  Order::where('return_order',2)->orderBy('id','DESC')->get();
       return view('backend.return_order.all_return_request',compact('allRequests'));  
    }
}
