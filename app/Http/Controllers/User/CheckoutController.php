<?php

namespace App\Http\Controllers\User;

use App\Models\ShipTown;
use App\Models\ShipCommon;
use App\Models\ShipCountry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{


    public function checkoutStore(Request $request)
    {
        $user = $request->user();

         
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['country_id'] = $request->country;
        $data['notes'] = $request->notes;
        $cartTotal = intval(Cart::total());
        $carts = Cart::content();

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data','cartTotal','carts'));
        } elseif ($request->payment_method == 'card') {
            return 'card';
        } else {
            return view('frontend.payment.cash', compact('data','cartTotal','carts'));          //    return view('frontend.payment.cash',compact('data','cartTotal'));
        }
    }
}
