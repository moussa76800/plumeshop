<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AllUserController extends Controller
{
    public Function myOrder(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_view',compact('orders'));
    }

    public function OrderDetail($order_id){

    	$order = Order::with('common','town','country','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('book')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('frontend.user.order.order_detail',compact('order','orderItem'));

    } 
}
