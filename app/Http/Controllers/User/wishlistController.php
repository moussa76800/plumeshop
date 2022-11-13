<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;

class wishlistController extends Controller
{
    public Function wishListRead() {
        return view('frontend.wishList.view_wishList');
}

}