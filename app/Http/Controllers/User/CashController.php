<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon; 
use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CashController extends Controller
{
    public function CashOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        $user = User::find(Auth::id());

        $order = new Order([
            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'notes' => $request->notes,
        ]);
        $user->orders()->save($order);

        $shippingMethod = new ShippingMethod([
            'payment_type' => 'Cash',
            'payment_method' => 'Cash',
            'currency' =>  '€',
            'amount' => $total_amount,
        ]);
        $order->shippingMethod()->save($shippingMethod);

        $orderStatus = new OrderStatus([    
            'pending_date' => now(),
        ]);
        $order->orderStatus()->save($orderStatus);

        $carts = Cart::content();

        foreach ($carts as $cart) {
            $orderItem = new OrderItem([
                'book_id' => $cart->id,
                'qty' => $cart->qty,
                'price' => $cart->price,
            ]);

            $order->orderItems()->save($orderItem);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $data = [
            'invoice_no' => $order->invoice_no,
            'amount' => $total_amount,
            'name' => $user->name,
            'email' => $user->email,
        ];

        Mail::to($user->email)->send(new OrderMail($data));

        if (session()->get('language') == 'french') {
            $notification = [
                'message' => 'Votre Achat a bien été enregistré',
                'alert-type' => 'success'
            ];

            return redirect()->route('dashboard')->with($notification);
        }
    }
}
