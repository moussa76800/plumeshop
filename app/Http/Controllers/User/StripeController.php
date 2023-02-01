<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Else_;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function stripeOrder(Request $request){


        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }
        
       
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51LakgQG89EAKe7W6yRk8ky7UGTaHGqZBEokNq6079IoYb8kdtu4EvOKcNtvRfFxPWXOjkhXTKKqpOx07XQzuoMbX00pV9fUh6z'
        );

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'PlumeShop',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);
        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'common_id' => $request->common_id,
            'town_id' => $request->town_id,
            'country_id' => $request->country_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
   
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
   
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

