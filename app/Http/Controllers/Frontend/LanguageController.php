<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    

    public function languageEnglish()
    {
        session()->forget('locale');
        session()->put('locale', 'en'); // Assurez-vous que 'en' correspond à votre code de langue pour l'anglais.
        return redirect()->back();
    }
    
    public function languageFrench()
    {
        session()->forget('locale');
        session()->put('locale', 'fr'); // Assurez-vous que 'fr' correspond à votre code de langue pour le français.
        return redirect()->back();
    }

}
