<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ShipCommon;
use App\Models\ShipCountry;
use App\Models\ShipTown;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ShippingController extends Controller
{
    public Function addressView(){
        $common = Address::latest()->get();
        return view('backend.ship.common.common_view',compact('common'));
    }


///////////////////////////////////////  COUNTRY  ////////////////////////////////////////////////////


public Function countryView(){
    $countries = ShipCountry::orderBy('id','DESC')->get();
    return view('backend.ship.country.country_view',compact('countries'));
}

public function addCountry(){

    return view('backend.ship.country.add_country');
}

public function countryStore(Request $request){

    $request-> validate([
      'name' => 'required' ,
    ]);

      ShipCountry::insert([
         'name' =>$request->name,
        
         ]);

    if (session()->get('language') == 'english'){ 
      $notification = array(
        'message' => 'Country Inserted Successfully ',
         'alert-type' => 'success'
      );
          return redirect()->back()->with($notification);
    } 
       $notification = array( 
         'message' => 'Le pays a été enregistré avec succès ',
         'alert-type' => 'success'
      );
          return redirect()->back()->with($notification);
    }




















}