<?php

namespace App\Http\Controllers\User;

use App\Models\Book;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class wishlistController extends Controller
{
    public function wishList()
    {
         $wishlist = Wishlist::with('book')->where('user_id', Auth::id())->latest()->get();
        return view('frontend.wishList.view_wishList',compact('wishlist'));
        // return view('frontend.wishList.view_wishList');
    }

    

    public function wishListRead()
{
    $wishlist = Wishlist::with('book')->where('user_id', Auth::id())->latest()->get();
    return response()->json($wishlist);
}
       

public function wishListDelete($id) {
    $wishlist = Wishlist::where('user_id', Auth::id())->where('id', $id)->first();

    if (!$wishlist) {
        // La liste de souhaits est vide
        if (session()->get('language') == 'french') {
            return response()->json(['error' => 'Votre liste de souhaits est vide.']);
        } else {
            return response()->json(['error' => 'Your wishlist is empty.']);
        }
    }
    
    $wishlist->delete();

    // Vérifier si la liste de souhaits est vide après la suppression du livre
    $remainingItems = Wishlist::where('user_id', Auth::id())->count();

    if ($remainingItems == 0) {
        // La liste de souhaits est vide après la suppression
        if (session()->get('language') == 'french') {
            return response()->json(['success' => 'L\'article(s) a bien été supprimée de votre liste de souhaits. Votre liste de souhaits est maintenant vide.']);
        } else {
            return response()->json(['success' => 'Successfully removed product from wishlist. Your wishlist is now empty.']);
        }
    }

    // La liste de souhaits n'est pas vide après la suppression
    if (session()->get('language') == 'french') {
        return response()->json(['success' => 'L\'article(s) a bien été supprimée de votre liste de souhaits']);
    } else {
        return response()->json(['success' => 'Successfully removed product from wishlist']);
    }
}


}