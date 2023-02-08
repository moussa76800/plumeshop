<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;


class CashController extends Controller
{
     public function CashOrder(Request $request){


    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}
	  // dd($charge);

     $order_id = Order::insertGetId([
        'user_id' =>Auth::id(),
        'common_id' => $request->common_id,
        'town_id' => $request->town_id,
        'country_id' => $request->country_id,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'post_code' => $request->post_code,
        'notes' => $request->notes,

     	'payment_type' => 'Cash ',
     	'payment_method' => ' Cash',
     	 
     	'currency' =>  '€',
     	'amount' => $total_amount,
     	 

     	'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'pending',
     	'created_at' => Carbon::now(),	 

     ]);

     // Start Send Email 
     $invoice = Order::findOrFail($order_id);
     $data = [
         'invoice_no' => $invoice->invoice_no,
         'amount' => $total_amount,
         'name' => $invoice->name,
         'email' => $invoice->email,
     ];

     Mail::to($request->email)->send(new OrderMail($data));

 // End Send Email 
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'book_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
        	]);
     }


     if (Session::has('coupon')) {
        Session::forget('coupon');
    }

    Cart::destroy();

    if  (session()->get('language') == 'french'){

    $notification = array(
           'message' => 'Votre Achat a bien été enregistré',
           'alert-type' => 'success'
       );

       return redirect()->route('dashboard')->with($notification);
    }else{
    $notification = array(
        'message' => 'Your Order Place Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('dashboard')->with($notification);
}
   } // end method 





}