<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeUnit\FunctionUnit;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class wishlistController extends Controller
{
    public Function wishList() {
        return view('frontend.wishList.view_wishList');
}

    public function wishListRead() {
        $wishlist = Wishlist::with('book')->where('user_id', Auth::id())->latest()->get(); 
            return response()->json($wishlist);             
    }

        public function wishListDelete($id){
         Wishlist::where('user_id', Auth::id())->where('id' , $id)->delete();
         if(session()->get('language') == 'french' ){ 
            return response()->json(['success' => 'L\'article(s) a bien été supprimée de votre liste de souhaits']);
    	}else { 
            return response()->json(['success' => ' Successfully Product Remove from wishLish']);
             }
       
        }
}