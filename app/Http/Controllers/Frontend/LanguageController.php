<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    

public function languageEnglish(){
    session()->get('language');
    session()->forget('language');
    Session::put('language' , 'english');
    return redirect()->back();
}

public function languageFrench(){
    session()->get('language');
    session()->forget('language');
    Session::put('language' , 'french');
    return redirect()->back();
}

}
