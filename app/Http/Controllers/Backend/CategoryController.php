<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
   public function CategoryView() {

    $category = Category::latest()->get();
    return view('backend.category.category_view' , compact('category'));
   }

   public function CategoryAdd() {

    return view('backend.category.category_add');
   }

   public function CategoryStore(Request $request){

      $request-> validate([
      'name_en' => 'required' ,
      'name_fr' => 'required' ,
      'image'   => 'required' ,
      ]);

      $image = $request->file('image');
      $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
      Image::make($image)->resize(300,300)->save('upload/category/'.$name_image);
      $save_url = 'upload/category/'.$name_image;

      Category::insert([
         'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
         'name_fr' => str_replace(' ','-',$request->name_fr),
         'image' => $save_url,
      ]);

      $notification = array(
         'message' => 'Category Inserted Successfully ',
         'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

   }

   public function CategoryEdit($id){

    $category = Category::find($id);
    return  view('backend.category.category_edit',compact('category'));

   }

   public function CategoryUpdate(Request $request){

    
      $category_id = $request->id;
      $old_img = $request->old_image;

      if ($request->file('image') ) {
         // unlink($old_img);
         $image = $request->file('image');
         $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(300,300)->save('upload/category/'.$name_image);
         $save_url = 'upload/category/'.$name_image;
   
         Category::findOrFail($category_id)->update([
            'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
            'name_fr' => str_replace(' ','-',$request->name_fr),
            'image' => $save_url,
         ]);
   
         $notification = array(
            'message' => 'Category Updated Successfully ',
            'alert-type' => 'success'
         );
   
         return redirect()->back()->with($notification);
      
      }else {

         $image = $request->file('image');
         $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(300,300)->save('upload/category/'.$name_image);
         $save_url = 'upload/category/'.$name_image;
   
         Category::findOrFail($category_id)->update([
            'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
            'name_fr' => str_replace(' ','-',$request->name_fr),
            
         ]);
   
         $notification = array(
            'message' => 'Category Updated Successfully ',
            'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
   
      }
   }
      public function CategoryDelete($id){

         Category::findOrFail($id)->delete();
  
         $notification = array(
           'message' => 'Category Deleted Successfully',
           'alert-type' => 'success'
        );
  
        return redirect()->back()->with($notification);
  
      } // end method 
   }

   

