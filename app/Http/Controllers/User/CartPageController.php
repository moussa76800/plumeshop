<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
		if  (session()->get('language') == 'french'){ 
		return response()->json(['success' => 'Votre article a bien été effacer de votre panier']);
	}
		return response()->json(['success' => 'Successfully, Remove from your Cart ']);
}
public function cartIncremente($rowId){
	$row = Cart::get($rowId);
	Cart::update($rowId, $row->qty+1);
		return response()->json('increment');
	}

	public function cartDecremente($rowId){
		$row = Cart::get($rowId);
		Cart::update($rowId, $row->qty-1);
			return response()->json('decrement');
		
	}
}
