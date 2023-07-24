<?php

namespace App\Http\Controllers\User;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function myCart(){
		    	
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();
		
        return view('frontend.wishList.myCart_view', compact('carts','cartQty','cartTotal'));
    		
    }

    public function cartRead(){
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();

    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,
    	));
    }

public function cartDelete($rowId){
		Cart::remove($rowId);
		if(Session::has('coupon')) {
			Session::forget('coupon');
		}
		if  (session()->get('language') == 'french'){ 
		return response()->json(['success' => 'Votre article a bien été effacer de votre panier']);
	}
		return response()->json(['success' => 'Successfully, Remove from your Cart ']);
}
public function cartIncremente($rowId){
	$row = Cart::get($rowId);
	Cart::update($rowId, $row->qty+1);

	if (Session::has('coupon')) {

		$coupon_name = Session::get('coupon')['coupon_name'];
		$coupon = Coupon::where('name',$coupon_name)->first();

	  
		Session::put('coupon',[
			'coupon_name' => $coupon->name,
			'coupon_discount' => $coupon->coupon_discount ,
			'discountAmount' => round(Cart::total() * $coupon->coupon_discount)/100 ,
			'totalAmount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100) 
		]);
	}
		return response()->json('increment');
	}

	public function cartDecremente($rowId){
		$row = Cart::get($rowId);
		Cart::update($rowId, $row->qty-1);

		if (Session::has('coupon')) {

			$coupon_name = Session::get('coupon')['coupon_name'];
			$coupon = Coupon::where('name',$coupon_name)->first();
	
		    Session::put('coupon',[
				'coupon_name' => $coupon->name ,
				'coupon_discount' => $coupon->coupon_discount ,
				'discount_amount' => round((Cart::total() * $coupon->coupon_discount)/100) ,
				'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount/100)) 
			]);
		}
			return response()->json('decrement');
		
	}
}
