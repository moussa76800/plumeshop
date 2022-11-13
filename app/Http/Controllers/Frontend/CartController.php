<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use SebastianBergmann\CodeUnit\FunctionUnit;

class CartController extends Controller
{
    
    public function bookAddCartAJAX( Request $request , $id) {

        $book = Book::findOrFail($id);

        if ($book->discount_price == NULL &&  (session()->get('language') == 'french') ) {
            Cart::add([
                'id' => $id, 
                'name' => $request->book_name, 
                'qty' =>$request->quantity, 
                'price' => $book->prix ,
                'weight' => 1  ,
                'options' => [
    				'image' => $book->product_thambnail,
                ],
               ]);
                    return response()->json([
                'success' => 'Le livre a bien été ajouter à votre panier' ]);
         }else if($book->discount_price == NULL &&  (session()->get('language') == 'english') ) {
                     return response()->json([
                'success' =>'succesfully Added on your Cart' ]) ;
        } else if ($book->discount_price != NULL &&  (session()->get('language') == 'french') ) {
            Cart::add([
                'id' => $id, 
                'name' => $request->book_name, 
                'qty' =>$request->quantity, 
                'price' => $book->prix ,
                'weight' => 1  ,
                'options' => [
    				'image' => $book->product_thambnail,
                ],
                
               ]);
                     return response()->json([
                'success' => 'Le livre a bien été ajouter à votre panier' ]);
                } else {
            Cart::add([
                'id' => $id, 
                'name' => $request->book_name, 
                'qty' =>$request->quantity, 
                'price' => $book->prix ,
                'weight' => 1  ,
                'options' => [
    				'image' => $book->product_thambnail,
                ],
                
            ]);
                     return response()->json([
                'success' =>'succesfully Added on your Cart' ]) ;
             }     
    }

    public  function bookAddMiniCartAJAX() {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal =Cart::total();

        return response()->json(array(
            'carts' => $carts ,
            'cartQty' => $cartQty ,
            'cartTotal' => round($cartTotal) ,
        ));
    }

    public function deleteBookMiniCartAJAX ($rowId){
        Cart::remove($rowId);
        if(session()->get('language') == 'french' ){ 
            return response()->json(['success' => 'L\'article(s) a bien été supprimée de votre panier']);
    	}else { 
            return response()->json(['success' => 'Product(s) Remove from Cart']);
             }
        }

        public Function AddBookToWishListAJAX( Request $request , $book_id){
                if (Auth::check()) {
                    $exists = Wishlist::where('user_id' , Auth::id())->where('book_id', $book_id)->first();
                    if (!$exists) {
                    Wishlist::insert([
                        'user_id' => Auth::id(), 
                        'book_id' => $book_id, 
                        'created_at' => Carbon::now(), 
                    ]);
                    
                    return response()->json([
                        'success' => 'Successfully Added On Your Wishlist'
                    ]); 
                }else {
                   return response()->json(['error' => 'This Product has Already on Your Wishlist']);
                }
         } else {

            return response()->json(['error' => 'At First Login Your Account']);

        }
}

}