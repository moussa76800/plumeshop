<?php

namespace App\Http\Controllers\backend;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;

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
        'name_en'=>'required',
        'coupon_discount'=>'required' ,
        'validity'=>'required' ,
        'created_at' ,
      ]); 
      
      Coupon::insert([
        'name'=>$request->name_en,  
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

                }else{ 
                $notification = array(
                    'message' => 'Coupon Inserted Successfully',
                    'alert-type' => 'success'
                );

                    return redirect()->back()->with($notification);
                }
            }

                public function couponEdit($id){
                    $coupon = Coupon::find($id);
                return view('backend.coupon.coupon_edit', [ 'coupon'=> $coupon]);
                }

                public function couponUpdate(Request $request){
                  $coupon_id = $request->id;
                Coupon::findOrFail($coupon_id)->update([
                    'name'=>$request->name_en,  
                    'coupon_discount'=> $request->coupon_discount, 
                    'validity'=> $request->validity, 
                    'updated_at'=> Carbon::now(),   
                ]);
                if(session()->get('language') == 'french'){   
                    $notification = array(
                            'message' => 'Le Coupon de réduction a été modifié avec succès ',
                            'alert-type' => 'success'
                        );
    
                        return redirect()->back()->route('all.coupons')->with($notification);
    
                        }
                        $notification = array(
                            'message' => 'The Coupon Updated Successfully',
                            'alert-type' => 'success'
                        );
    
                        return redirect()->route('all.coupons')->with($notification);

                }

                public function couponDelete($id){
                
                    Coupon::findOrFail($id)->delete();
                    if(session()->get('language') == 'french'){   
                        $notification = array(
                                'message' => 'Le Coupon de réduction a été supprimé avec succès ',
                                'alert-type' => 'success'
                            );
        
                            return redirect()->back()->route('all.coupons')->with($notification);
        
                            }
                            $notification = array(
                                'message' => 'The Coupon Deleted Successfully',
                                'alert-type' => 'success'
                            );
        
                            return redirect()->route('all.coupons')->with($notification);
                    }

                    public function inactiveCoupon($id){
                  
                        Coupon::findOrFail($id)->update([
                           'status' => 0 ,
                        ]);
                        if(session()->get('language') == 'french'){   
                            $notification = array(
                                    'message' => 'Le Coupon de réduction est inactif ',
                                    'alert-type' => 'warning'
                                );
            
                                return redirect()->route('all.coupons')->with($notification);
            
                                }else{ 
                            $notification = array(
                            'message' => 'The Coupon is Inactive ',
                            'alert-type' => 'warning'
                    );
                                 return redirect()->route('all.coupons')->with($notification);
                
                  }
                }
                
                
                  public function activeCoupon($id){
                           
                     Coupon::findOrFail($id)->update([
                        'status' => 1 ,
                     ]);
                     if(session()->get('language') == 'french'){   
                        $notification = array(
                                'message' => 'Le Coupon de réduction est actif ',
                                'alert-type' => 'success'
                            );
                            return redirect()->route('all.coupons')->with($notification);
        
                            }else{ 
                        $notification = array(
                        'message' => 'The Coupon is active ',
                        'alert-type' => 'success'
                );
                            return redirect()->route('all.coupons')->with($notification);
              }
}
}
