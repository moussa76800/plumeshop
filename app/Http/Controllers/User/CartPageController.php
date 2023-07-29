<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
	public function myCart()
	{
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();

		return view('frontend.wishList.myCart_view', compact('carts', 'cartQty', 'cartTotal'));
	}

	public function cartRead()
	{
		$carts = Cart::content();
		$cartQty = Cart::count();
		$cartTotal = Cart::total();

		return response()->json([
			'carts' => $carts,
			'cartQty' => $cartQty,
			'cartTotal' => $cartTotal,
		]);
	}
	


	public function cartDelete($rowId)
	{
		Cart::remove($rowId);
		if (Session::has('coupon')) {
			Session::forget('coupon');
		}
		if (session()->get('language') == 'french') {
			return response()->json(['success' => 'Votre article a bien été effacer de votre panier']);
		}
		return response()->json(['success' => 'Successfully, Remove from your Cart ']);
	}

	public function cartIncremente($rowId)
	{
		$cartItem = Cart::get($rowId);

		// Récupérer le livre associé à l'article dans le panier
		$book = Book::find($cartItem->id);

		if (!$book) {
			return response()->json(['error' => 'Le livre associé à cet article n\'existe pas.']);
		}

		// Vérifier si la quantité actuelle dans le panier atteint déjà la quantité en stock
		if ($cartItem->qty >= $book->product_qty) {
			return response()->json(['error' => 'La quantité actuelle dans le panier atteint déjà la quantité en stock.']);
		}

		// Incrémenter la quantité dans le panier
		Cart::update($rowId, $cartItem->qty + 1);

		// Mise à jour des informations sur le coupon (si applicable)
		if (Session::has('coupon')) {
			$coupon_name = Session::get('coupon')['coupon_name'];
			$coupon = Coupon::where('name', $coupon_name)->first();

			Session::put('coupon', [
				'coupon_name' => $coupon->name,
				'coupon_discount' => $coupon->coupon_discount,
				'discount_amount' => round(Cart::total() * $coupon->coupon_discount) / 100,
				'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
			]);
		}

		return response()->json('increment');
	}


	public function cartDecremente($rowId)
	{
		$cartItem = Cart::get($rowId);

		// Vérifier si l'article existe dans le panier
		if (!$cartItem) {
			return response()->json(['error' => 'L\'article n\'existe pas dans le panier.']);
		}

		// Vérifier si la quantité actuelle dans le panier est égale à 1, dans ce cas, ne pas décrémenter davantage
		if ($cartItem->qty === 1) {
			return response()->json(['error' => 'La quantité actuelle dans le panier est déjà au minimum.']);
		}

		// Décrémenter la quantité dans le panier
		Cart::update($rowId, $cartItem->qty - 1);

		// Mise à jour des informations sur le coupon (si applicable)
		if (Session::has('coupon')) {
			$coupon_name = Session::get('coupon')['coupon_name'];
			$coupon = Coupon::where('name', $coupon_name)->first();

			Session::put('coupon', [
				'coupon_name' => $coupon->name,
				'coupon_discount' => $coupon->coupon_discount,
				'discount_amount' => round(Cart::total() * $coupon->coupon_discount) / 100,
				'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100),
			]);
		}

		return response()->json('decrement');
	}
}
