<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ShipCommon;
use App\Models\ShipCountry;
use App\Models\ShipTown;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
    public function bookAddCartAJAX( Request $request , $id) {

		if(Session::has('coupon')) {
			Session::forget('coupon');
		}

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
                'price' => ($book->prix - $book->discount_price) ,
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

    public function couponApply(Request $request){
       
        if(session()->get('language') == 'french'  ){
            $coupon = Coupon::where('name_fr', $request->coupon_name)->where('validity', '>=' , Carbon::now()->format('Y-m-d'))->first();
                Session::put('coupon',[
                   'coupon_name' => $coupon->name_fr ,
                   'coupon_discount' => $coupon->coupon_discount ,
                   'discount_amount' => round((Cart::total() * $coupon->coupon_discount)/100) ,
                   'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount/100)) 
                ]);
                return response()->json(array(
                    'success' => 'Le Couponde réduction a bien été appliqué..'
                ));
        }else if(session()->get('language') == 'english'  ) { 
                $coupon = Coupon::where('name_en', $request->coupon_name)->where('validity', '>=' , Carbon::now()->format('Y-m-d'))->first();
                Session::put('coupon',[
                    'coupon_name' => $coupon->name_en ,
                    'coupon_discount' => $coupon->coupon_discount ,
                    'discount_amount' => round((Cart::total() * $coupon->coupon_discount)/100) ,
                    'total_amount' => round(Cart::total() - (Cart::total() * $coupon->coupon_discount/100)) 
                ]);
                return response()->json(array(
                    'success' => 'Coupon Applied Successfully'
                ));
         }else{
                return response()->json(['error' => 'Invalid Coupon']);
            }
    }

        public function checkoutCreate(){
            if (Auth::check()) {
                if (Cart::total() > 0) {
    
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
    
            $common = ShipCommon::orderBy('name','ASC')->get();
            $town = ShipTown::orderBy('name','ASC')->get();
            $country = ShipCountry::orderBy('name','ASC')->get();
            return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal', 'common', 'town' , 'country'));
                    
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


        public function calculationTotal(){
            if (Session::has('coupon')) {
                return response()->json(array(
                    'subtotal' => Cart::total(),
                    'couponName' => session()->get('coupon')['coupon_name'],
                    'coupondiscount' => session()->get('coupon')['coupon_discount'],
                    'discountAmount' => session()->get('coupon')['discount_amount'],
                    'totalAmount' => session()->get('coupon')['total_amount'],
                ));
            }else{
                return response()->json(array(
                    'total' => Cart::total(),
                ));
    
            }
        } // end method 

        public function couponRemove(){
            Session::forget('coupon');
            if (session()->get('language') == 'french'){
            return response()->json([
                'success' => 'Le Coupon a bien été supprimé'
            ]);
        }
        return response()->json([
        'success' => 'The coupon Remove Successufully'
    ]);
    }
        }       


   

    