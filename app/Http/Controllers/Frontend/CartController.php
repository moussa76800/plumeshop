<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

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
}