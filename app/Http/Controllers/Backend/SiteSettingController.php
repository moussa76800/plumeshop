<?php

namespace App\Http\Controllers\Backend;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Seo;
use Intervention\Image\Facades\Image;

class SiteSettingController extends Controller
{
    public function siteSetting(){
     $setting = SiteSetting::find(1);
     return view('backend.setting.site_update',compact('setting'));  
    }

    public function updateSetting(Request $request,$setting){

        $site_settings = SiteSetting::find($setting);
    
    if ($request->file('logo')) {
        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        if ($image->getClientOriginalExtension() == 'svg') {
            $save_url = 'upload/logo/' . $name_gen;
            $image->move(public_path('upload/logo'), $name_gen);
        } else {
            Image::load($image)->resize(139, 36)->save('upload/logo/' . $name_gen);
            $save_url = 'upload/logo/' . $name_gen;
        }
        $site_settings->logo = $save_url;
    }

    $site_settings->phone_one = $request->phone_one;
    $site_settings->phone_two = $request->phone_two;
    $site_settings->email = $request->email;
    $site_settings->company_name = $request->company_name;
    $site_settings->company_address = $request->company_address;
    $site_settings->facebook = $request->facebook;
    $site_settings->twitter = $request->twitter;
    $site_settings->linkedin = $request->linkedin;
    $site_settings->youtube = $request->youtube;
    
    $site_settings->save();
    if (session()->get('language') == 'french'){
        $notification = array(
            'message' => 'Les paramètres ont été modifiés avec succès !!',
            'alert-type' => 'success'
        ); 
        return redirect()->back()->with($notification);  
    }
        $notification = array(
            'message' => 'Setting\'s Site Updated Successfully',
            'alert-type' => 'success'
        );
    
    return redirect()->back()->with($notification);
    }

     public function seoSettingView(){
       

            $seo = Seo::find(1);
            return view('backend.setting.seo_update',compact('seo'));
        }
     
    
        public function seoSettingUpdate(Request $request){
    
            $seo_id = $request->id;
    
            Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author' => $request->meta_author,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'google_analytics' => $request->google_analytics,		 
            ]);
            if (session()->get('language') == 'french'){
                $notification = array(
                    'message' => 'Les paramètres de Référencements ont été modifiés avec succès !!',
                    'alert-type' => 'success'
                ); 
                return redirect()->back()->with($notification);  
            }
                $notification = array(
                    'message' => 'Setting SEO Updated Successfully',
                    'alert-type' => 'success'
                );
            
            return redirect()->back()->with($notification);
            }
    }
    

