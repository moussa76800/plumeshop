<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Carbon as SupportCarbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    


public function sliderView() {
    $sliders = Slider::latest()->get();
    return view('backend.slider.slider_view',compact('sliders'));
}

public function sliderAdd(){
   
    return view('backend.slider.slider_add');
}

public function sliderStore(Request $request){ 
    $request->validate([
        'slider_img'  => 'required' ,
        'title'       => 'required' ,
        'description' => 'required' ,
        'created_at'  ,
    ]);
    $image = $request->file('slider_img');
    $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(300,300)->save('upload/slider/'.$name_image);
    $save_url = 'upload/slider/'.$name_image;
    
    Slider::insert([
        'slider_img'  => $save_url,
        'title'       => $request->title ,
        'description' => $request->description ,
        'created_at' => now(),
    ]);
    $notification = array(
        'message' => 'Slider Inserted Successfully ',
        'alert-type' => 'success'
     );
     return redirect()-> route('all.sliders')->with($notification);
}

public function sliderEdit($id) {
        $slider = Slider::find($id);
        return view('backend.slider.slider_edit', [ 'slider'=> $slider]);
} 

public function sliderUpdate(Request $request){

    $slider_id = $request->id;
    $old_img = $request->old_image;

    if ($request->file('slider_img')) {
        if($request->file('slider_img') > 0){ 
        // unlink($old_img);
       $image = $request->file('slider_img');
       $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(300,300)->save('upload/slider/'.$name_image);
       $save_url = 'upload/slider/'.$name_image;
 
       Slider::findOrFail($slider_id)->update([
        'slider_img'  => $save_url,
        'title'       => $request->title ,
        'description' => $request->description ,
        'updated_at' => now(),
    ]);
    $notification = array(
        'message' => 'Slider Updated Successfully ',
        'alert-type' => 'success'
     );
     return redirect()-> route('all.sliders')->with($notification);

    }else {
        $notification = array(
            'message' => 'No Image ',
            'alert-type' => 'warning'
         );
   
         return redirect()->back()->with($notification);

    }
    }else {

      
       Slider::findOrFail($slider_id)->update([
        'title'       => $request->title ,
        'description' => $request->description ,
        'updated_at' => now(),
    ]);
    $notification = array(
        'message' => 'Slider Updated Successfully ',
        'alert-type' => 'success'
     );
     return redirect()-> route('all.sliders')->with($notification);
}
}

public function SliderDelete($id) {

        $slider = Slider::find($id);
        $img = $slider->slider_img;
        unlink($img);
        
        Slider::findOrFail($id)->delete();

        $notification = array(
        'message' => 'Category Deleted  Successfully ',
        'alert-type' => 'success'
        );
        return redirect()-> route('all.sliders')->with($notification);
    } 

    public function inactiveSlider($id){
                  
        Slider::findOrFail($id)->update([
           'status' => 0 ,
        ]);
         $notification = array(
        'message' => 'Slider is Inactive ',
        'alert-type' => 'warning'
  );
     return redirect()->back()->with($notification);
  }


  public function activeSlider($id){
           
     Slider::findOrFail($id)->update([
        'status' => 1 ,
     ]);
     
        $notification = array(
        'message' => 'Slider is active ',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        }


    }

