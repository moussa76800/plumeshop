<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Book;
use App\Models\User;
use App\Models\Coupon;
use App\Models\ShipTown;
use App\Models\Wishlist;
use App\Models\ShipCommon;
use App\Models\ShipCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{


    public function bookAddCartAJAX(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        // Vérifier si le livre existe dans la base de données
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => "Le livre n'a pas été trouvé."]);
        }

        // Vérifier si le stock du livre est épuisé
        if ($book->product_qty <= 0) {
            return response()->json(['error' => 'Le livre est épuisé !!!']);
        }

        // Vérifier si la quantité saisie est valide
        // $requestedQuantity = $request->quantity;

        // if (!is_numeric($requestedQuantity) || $requestedQuantity <= 0) {
        //     return response()->json(['error' => 'Entrez une quantité valide !!!']);
        // }


        // Vérifier si le livre est déjà dans le panier
        if ($this->isBookInCart($id)) {
            return response()->json(['error' => 'Le livre est déja présent dans votre panier.']);
        }

        // Sélectionner le prix correct en fonction de la remise
        $price = $book->discount_price ?? $book->price;

        // Ajouter l'article au panier
        Cart::add([
            'id' => $id,
            'name' => $book->title,
            'qty' => 1,
            'price' => $price,
            'weight' => 1,
            'options' => [
                'image' => $book->image,
            ],
        ]);

        return response()->json(['success' => 'Le livre a bien été ajouté à votre panier']);
    }

    public function isBookInCart($book_id)
    {
        $cartItems = Cart::content();

        foreach ($cartItems as $item) {
            if ($item->id == $book_id) {
                return true;
            }
        }

        return false;
    }


    public function getCartQuantity($book_id)
    {
        $cartItems = Cart::content();
        $cartQuantity = 0;

        foreach ($cartItems as $item) {
            if ($item->id == $book_id) {
                $cartQuantity += $item->qty;
            }
        }

        return $cartQuantity;
    }

    public  function bookAddMiniCartAJAX()
    {
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = intval(Cart::total());

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal,
        ));
    }

    public function deleteBookMiniCartAJAX($rowId)
    {
        Cart::remove($rowId);
        if (session()->get('language') == 'french') {
            return response()->json(['success' => 'L\'article(s) a bien été supprimée de votre panier']);
        } else {
            return response()->json(['success' => 'Product(s) Remove from Cart']);
        }
    }

    public function addToWishList(Request $request, $book_id)
    {
        if (Auth::check()) {
            $book = Book::find($book_id);

            // Vérifier si le livre existe
            if (!$book) {
                return response()->json(['error' => 'Le livre n\'existe pas.']);
            }

            // Vérifier si le stock du livre est épuisé
            if ($book->product_qty <= 0) {
                $errorMessage = (session()->get('language') == 'french') ? 'Le livre est en rupture de stock.' : 'The book is out of stock.';
                return response()->json(['error' => $errorMessage]);
            }

            // Vérifier si le livre est déjà dans la wishlist de l'utilisateur
            $wishlistCount = Wishlist::where('user_id', Auth::id())->where('book_id', $book_id)->count();
            if ($wishlistCount > 0) {
                $errorMessage = 'The book is already in your wishlist.';
                return response()->json(['error' => $errorMessage]);
            }

            // Vérifier si le livre est déjà dans le panier de l'utilisateur
            $cartItem = Cart::search(function ($cartItem, $rowId) use ($book_id) {
                return $cartItem->id === $book_id;
            });

            if ($cartItem->isNotEmpty()) {
                $errorMessage = 'The book is already in your cart.';
                return response()->json(['error' => $errorMessage]);
            }

            // Ajouter le livre à la wishlist de l'utilisateur
            Wishlist::create([
                'user_id' => Auth::id(),
                'book_id' => $book_id,
            ]);

            $successMessage = 'Successfully Added On Your Wishlist';
            return response()->json(['success' => $successMessage]);
        } else {
            $errorMessage = 'Please register or log in first.';
            return response()->json(['error' => $errorMessage]);
        }
    }




    public function checkoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = intval(Cart::total());

                $user = Auth::user();
                $address = $user->address;

                // Vérifier si l'utilisateur a une adresse associée à son compte
                if ($address) {
                    $country = $address->country; // Utilisez la relation pour récupérer le pays associé à l'adresse
                } else {
                    $country = ''; // Ou vous pouvez mettre une valeur par défaut si l'adresse n'est pas définie
                }

                foreach ($carts as $cartItem) {
                    $book = Book::find($cartItem->id);
                    $book->product_qty -= $cartItem->qty;
                    $book->save();
                }


                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'address', 'country'));
            } else {

                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } else {

            $notification = array(
                'message' => 'You Need to Login First',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    }

    public function couponApply(Request $request)

    {
        $coupon_name = $request->coupon_name; // Récupère le nom du coupon à partir de la requête

        // Vérifier si le nom du coupon est vide
        if (empty($coupon_name)) {
            return response()->json(['error' => 'Coupon name is empty']);
        }

        $coupon = Coupon::where('coupon_name', $coupon_name)
            ->where('validity', '>=', Carbon::now()->format('Y-m-d'))
            ->first();

        if (auth()->check()) {
            if ($coupon) {
                $discount_amount = intval(Cart::total() * $coupon->coupon_discount / 100);
                Session::put('coupon', [
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => $discount_amount,
                    'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount / 100)
                ]);

                return response()->json([
                    'validity' => true,
                    'success' => 'Coupon Applied Successfully'
                ]);
            } else {
                return response()->json(['error' => 'Invalid Coupon']);
            }
        } else {
            return response()->json(['error' => 'Please login or register to apply a coupon.']);
        }
    }

    public function calculationTotal()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'couponName' => session()->get('coupon')['coupon_name'],
                'coupondiscount' => session()->get('coupon')['coupon_discount'],
                'discountAmount' => session()->get('coupon')['discount_amount'],
                'totalAmount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    } // end method 

    public function couponRemove()
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
            return response()->json([
                'success' => 'The coupon has been removed successfully.'
            ]);
        } else {
            return response()->json([
                'error' => 'No coupon to remove.'
            ]);
        }
    }
}
