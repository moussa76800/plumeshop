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


    // public function addCommon(){
    //     $towns = ShipTown::orderBy('id','DESC')->get();
    //     return view('backend.ship.common.add_common', compact('towns'));
    // }


    // public function commonStore(Request $request){
    //     $request-> validate([
    //      'town_id' => 'required' ,
    //       'name' => 'required' ,
    //     ]);
    //           ShipCommon::insert([
    //         'town_id' => $request->town_id,
    //          'name' => $request->name,
    //          'created_at'=>Carbon::now(),
    //                      ]);
    //     if (session()->get('language') == 'english'){ 
    //       $notification = array(
    //         'message' => 'Common Inserted Successfully ',
    //          'alert-type' => 'success'
    //       );
    //           return redirect()->back()->with($notification);
    //     } 
    //        $notification = array( 
    //          'message' => 'La commune a été enregistrée avec succès  ',
    //          'alert-type' => 'success'
    //       );
    //           return redirect()->back()->with($notification);
    //     }

    //     public function commonEdit($id){
    //         $town = ShipTown::orderBy('name','ASC')->get();
    //         $common = ShipCommon::find($id);
    //         return  view('backend.ship.common.common_edit',compact('town','common'));
        
    //        }
        

    //        public function commonUpdate(Request $request){
    //                 $town_id = $request->id;
    //                 ShipCommon::findOrFail($town_id)->update([
    //                 'name' =>$request->name,
                   
    //              ]);    
    //                 if (session()->get('language') == 'english'){ 
    //                     $notification = array(
    //                     'message' => 'Common Updated Successfully ',
    //                     'alert-type' => 'success'
    //                     );
    //                         return redirect()->back()->with($notification);
    //                 } 
    //                     $notification = array( 
    //                     'message' => 'La commune a été modifiée avec succès  ',
    //                     'alert-type' => 'success'
    //                     );
    //                         return redirect()->back()->with($notification);
    //                 }
        
    //        public function commonDelete($id) {
            
    //           ShipCommon::findOrFail($id)->delete();
    //           if (session()->get('language') == 'english'){ 
    //             $notification = array(
    //             'message' => 'Common Deleted Successfully with  ',
    //             'alert-type' => 'success'
    //             );
    //                 return redirect()->back()->with($notification);
    //         } 
    //             $notification = array( 
    //             'message' => 'La commune a été supprimée avec succès  ',
    //             'alert-type' => 'success'
    //             );
    //                 return redirect()->back()->with($notification);
    //         }
    



    ////////////////////////////////////////  TOWN   /////////////////////////////////////

    // public Function townView(){
    //     $towns = ShipTown::orderBy('id','DESC')->get();
    //     return view('backend.ship.town.town_view',compact('towns'));
    // }

    // public function addTown(){
    //     $countries = ShipCountry::orderBy('id','DESC')->get();
    //     return view('backend.ship.town.add_town',compact('countries') );
    // }

    // public function townStore(Request $request){

    //     $request-> validate([
    //       'country_id' => 'required',
    //       'name' => 'required' ,
         
    //     ]);
    
    //       ShipTown::insert([
    //         'country_id' => $request->country_id,
    //          'name' =>$request->name,
    //         'created_at'=>Carbon::now(),
            
    //          ]);

    //     if (session()->get('language') == 'english'){ 
    //       $notification = array(
    //         'message' => 'Town Inserted Successfully ',
    //          'alert-type' => 'success'
    //       );
    //           return redirect()->back()->with($notification);
    //     } 
    //        $notification = array( 
    //          'message' => 'La ville a bien été enregistré avec succès ',
    //          'alert-type' => 'success'
    //       );
    //           return redirect()->back()->with($notification);
    //     }

    //     public function townEdit($id){
    //         $countries = ShipCountry::orderBy('name','ASC')->get();
    //         $town = ShipTown::findOrFail($id);
    //         return  view('backend.ship.town.town_edit',compact('countries', 'town'));
        
    //        }
        

    //     public function townUpdate(Request $request){
    //         $country_id = $request->id;
    //         ShipTown::findOrFail($country_id)->update([
    //         'name' =>$request->name,
           
    //      ]);    
    //         if (session()->get('language') == 'english'){ 
    //             $notification = array(
    //             'message' => 'TownUpdated Successfully ',
    //             'alert-type' => 'success'
    //             );
    //                 return redirect()->back()->with($notification);
    //         } 
    //             $notification = array( 
    //             'message' => 'La Ville a bien été modifiée avec succès  ',
    //             'alert-type' => 'success'
    //             );
    //                 return redirect()->back()->with($notification);
    //         }

    //         public function townDelete($id) {
            
    //             $town = ShipTown::find($id);
    //             ShipTown::findOrFail($id)->delete();
    //             $town->common()->delete();

    //             if (session()->get('language') == 'english'){ 
    //                 $notification = array(
    //                 'message' => 'Town Deleted with Common Successfully ',
    //                 'alert-type' => 'success'
    //                 );
    //                     return redirect()->back()->with($notification);
    //             } 
    //                 $notification = array( 
    //                 'message' => 'La Ville et ses communes ont bien été supprimés avec succès  ',
    //                 'alert-type' => 'success'
    //                 );
    //                     return redirect()->back()->with($notification);
    //             }



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