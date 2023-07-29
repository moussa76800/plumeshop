<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use Illuminate\Support\Carbon;
use PhpParser\Node\Stmt\Else_;
use App\Http\Controllers\Controller;
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

        // Vérifier si le montant total est zéro ou null
    if ($total_amount === 0 || $total_amount === null) {
        $notification = [
            'message' => 'Le montant total est invalide. Veuillez ajouter des articles à votre panier.',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($notification);
    }
        
        
        \Stripe\Stripe::setApiKey('');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'PlumeShop',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
    
        $user = User::find(Auth::id());

        $order = new Order([
            
            'notes' => $request->notes,
            'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            
        ]);

        $user->orders()->save($order);

        $shippingMethod = new ShippingMethod([
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
        ]);

        $order->shippingMethod()->save($shippingMethod);
    
        $orderStatus = new OrderStatus([
            'pending_date'=>'pending',
            'created_at'=>now(),	
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
            'name' => $order->name,
            'email' => $order->email,
        ];

        Mail::to($request->email)->send(new OrderMail($data));

        $notification = [
            'message' => 'Votre achat a bien été enregistré',
            'alert-type' => 'success',
        ];

        return redirect()->route('dashboard')->with($notification);
    }
}




//         $order_id = Order::insertGetId([
//             'user_id' => Auth::id(),
//             'name' => $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'notes' => $request->notes,
            
   
//             'payment_type' => 'Stripe',
//             'payment_method' => 'Stripe',
//             'payment_type' => $charge->payment_method,
//             'transaction_id' => $charge->balance_transaction,
//             'currency' => $charge->currency,
//             'amount' => $total_amount,
//             'order_number' => $charge->metadata->order_id,
   
//             'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
//             'order_date' => Carbon::now()->format('d F Y'),
//             'order_month' => Carbon::now()->format('F'),
//             'order_year' => Carbon::now()->format('Y'),
//             'status' => 'pending',
//             'created_at' => Carbon::now(),	 
//            ]);

//           // Start Send Email 
//      $invoice = Order::findOrFail($order_id);
//      $data = [
//          'invoice_no' => $invoice->invoice_no,
//          'amount' => $total_amount,
//          'name' => $invoice->name,
//          'email' => $invoice->email,
//      ];

//      Mail::to($request->email)->send(new OrderMail($data));

//  // End Send Email 
//         $carts = Cart::content();
//         foreach ($carts as $cart) {
//             OrderItem::insert([
//                 'order_id' => $order_id, 
//                 'book_id' => $cart->id,
//                 'qty' => $cart->qty,
//                 'price' => $cart->price,
//                 'created_at' => Carbon::now(),
   
//             ]);
//         }
//         if (Session::has('coupon')) {
//             Session::forget('coupon');
//         }
   
//         Cart::destroy();

//         if  (session()->get('language') == 'french'){
   
//         $notification = array(
//                'message' => 'Votre Achat a bien été enregistré',
//                'alert-type' => 'success'
//            );
   
//            return redirect()->route('dashboard')->with($notification);
//         }else{
//         $notification = array(
//             'message' => 'Your Order Place Successfully',
//             'alert-type' => 'success'
//         );

//         return redirect()->route('dashboard')->with($notification);
//     }
//        } // end method 
   
//  }

 //       $order = Order::create([
    //             'user_id' => Auth::id(),
    //             'notes' => $request->notes,
    //             'invoice_no' => 'EOS' . mt_rand(10000000, 99999999),
    //             'order_date' => Carbon::now()->format('d F Y'),
    //             'order_month' => Carbon::now()->format('F'),
    //             'order_year' => Carbon::now()->format('Y'),
    //             'status' => 'pending',
    //         ]);
        
    //         $order->shippingMethod()->create([
    //             'payment_type' => 'Stripe',
    //             'payment_method' => 'Stripe',
    //             'transaction_id' => $charge->balance_transaction,
    //             'currency' => $charge->currency,
    //             'amount' => $total_amount,
    //             'order_number' => $charge->metadata->order_id,
    //         ]);
        
    //         $order->orderStatus()->create();
    
            
        
    //          $carts = Cart::content();
    //         foreach ($carts as $cart) {
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'book_id' => $cart->id,
    //                 'qty' => $cart->qty,
    //                 'price' => $cart->price,
    //             ]);}        // }
        
    //         if (Session::has('coupon')) {
    //             Session::forget('coupon');
    //         }
        
    //         Cart::destroy();
        
    //         $data = [
    //             'invoice_no' => $order->invoice_no,
    //             'amount' => $total_amount,
    //             'name' => $order->name,
    //             'email' => $order->email,
    //         ];
        
    //         Mail::to($request->email)->send(new OrderMail($data));
        
    //         $notification = [
    //             'message' => 'Votre achat a bien été enregistré',
    //             'alert-type' => 'success',
    //         ];
        
    //         return redirect()->route('dashboard')->with($notification);
    //     }
    // }