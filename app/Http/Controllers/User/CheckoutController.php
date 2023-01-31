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
        public function commonGetAjax($town_id){
            $common = ShipCommon::where('town_id',$town_id)->orderBy('name','ASC')->get();
                return json_encode($common);
    }  

        public function checkoutStore(Request $request){
           // dd($request->all());
           $data = array();
           $data['shipping_name'] = $request->shipping_name;
           $data['shipping_email'] = $request->shipping_email;
           $data['shipping_phone'] = $request->shipping_phone;
           $data['post_code'] = $request->post_code;
           $data['common_id'] = $request->common_id;
           $data['town_id'] = $request->town_id;
           $data['country_id'] = $request->country_id;
           $data['notes'] = $request->notes;
           $cartTotal = Cart::total();
           $carts = Cart::content();
   
   
           if ($request->payment_method == 'stripe') {
               return view('frontend.payment.stripe',compact('data','cartTotal','carts'));
           }elseif ($request->payment_method == 'card') {
               return 'card';
           }else{
                return'cash';            //    return view('frontend.payment.cash',compact('data','cartTotal'));
           }
            
   
       }// end mehtod. 

}
   

