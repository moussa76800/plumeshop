<?php

namespace App\Http\Controllers\backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class CouponController extends Controller
{
    
    public function couponView(){
        $coupons = Coupon::orderBy('id','ASC')->get();
        return view('backend.coupon.coupon_view', compact('coupons'));
    }

    public function couponAdd(){
        $coupons = Coupon::orderBy('id','ASC')->get();
        return view('backend.coupon.coupon_add', compact('coupons'));
    }

    public function couponStore(Request $request){
      $request->validate([
        'name_en'=>'required' ,
        'name_fr'=>'required' ,
        'coupon_discount'=>'required' ,
        'validity'=>'required' ,
        'created_at' ,
      ]); 
      
      Coupon::insert([
        'name_en'=>$request->name_en, 
        'name_fr'=> $request->name_fr, 
        'coupon_discount'=> $request->coupon_discount, 
        'validity'=> $request->validity, 
        'created_at'=> Carbon::now(), 
      ]);
        if(session()->get('language') == 'french'){   
                $notification = array(
                        'message' => 'Le Coupon de réduction a été inséré avec succès ',
                        'alert-type' => 'success'
                    );

                    return redirect()->back()->with($notification);

                    }
                    $notification = array(
                        'message' => 'Coupon Inserted Successfully',
                        'alert-type' => 'success'
                    );

                    return redirect()->back()->with($notification);
                }
}
