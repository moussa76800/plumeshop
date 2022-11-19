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

        if ($book->discount_price == NULL) {
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
                        if (session()->get('language') == 'french'){ 
                            return response()->json([
                        'success' => 'Le livre a bien été ajouter à votre panier' ]);
                        }else{
                            return response()->json([
                        'success' =>'succesfully Added on your Cart' ]) ;
                        }
     } else {
            Cart::add([
                'id' => $id, 
                'name' => $request->book_name, 
                'qty' =>$request->quantity, 
                'price' => $book->prix - $book->discount_price ,
                'weight' => 1  ,
                'options' => [
    				'image' => $book->product_thambnail,
                    ],
                ]);
                        if (session()->get('language') == 'french'){ 
                            return response()->json([
                        'success' => 'Le livre a bien été ajouter à votre panier' ]);
                        }else{
                            return response()->json([
                        'success' =>'succesfully Added on your Cart' ]) ;
                        }
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
                    
                        if (session()->get('language') == 'french') {
                            return  response()->json([
                            'success' => 'L\'article(s) a bien été ajoutée de votre liste de souhaits'
                        ]);
                     }else{
                        return  response()->json([
                            'success' => 'Successfully Added On Your Wishlist'
                        ]);
                } 
                }else {
                    if (session()->get('language') == 'french') {
                         return response()->json(['error' => 'L\'article sélectionné est déja dans votre liste de souhaits']);
                    }
                    return response()->json(['error' => 'This Product has Already on Your Wishlist']);
            }
         } else {
            if (session()->get('language') == 'french') {
                return response()->json(['error' => 'Veuilez vous enregistrer ou vous connectez !!']);
            }
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

        public function checkoutCreate(){
            if (Auth::check()) {
                if (Cart::total() > 0) {
    
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
    
            // $divisions = ShipDivision::orderBy('division_name','ASC')->get();
            return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal'));
                    
                }else{
    
                $notification = array(
                'message' => 'Shopping At list One Product',
                'alert-type' => 'error'
            );
    
            return redirect()->to('/')->with($notification);
    
                }
    
                
            }else{
    
                 $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );
    
            return redirect()->route('login')->with($notification);
    
            }
    
        } // end method 
        }


   

