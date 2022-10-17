<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    public function SubCategoryView() {

        $subCategory = SubCategory::latest()->get();
        return view('backend.subCategory.subCategory_view' , compact('subCategory'));
       }
    
       public function SubCategoryAdd() {
        $categories = Category::orderBy('name_en','ASC')->get();
        return view('backend.subcategory.subcategory_add', compact('categories'));
       }
    
       public function SubCategoryStore(Request $request){
    
          $request-> validate([
        'category_id' =>'required',
          'name_en' => 'required' ,
          'name_fr' => 'required' ,
          
          ]);
    
          
          SubCategory::insert([
            'category_id'=> $request->category_id,
             'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
             'name_fr' => str_replace(' ','-',$request->name_fr),
             
          ]);
    
          $notification = array(
             'message' => 'Category Inserted Successfully ',
             'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);
    
       }
    
       public function subCategoryEdit($id){

        $categorie = Category::orderBy('name_en','ASC')->get();
        $subCategory = SubCategory::findOrFail($id);
        return  view('backend.subcategory.subcategory_edit',compact('subCategory', 'categorie'));
    
       }
    
       public function subCategoryUpdate(Request $request){
    
        
          $category_id = $request->id;
       
             Category::findOrFail($category_id)->update([
                'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
                'name_fr' => str_replace(' ','-',$request->name_fr),
               
             ]);
       
             $notification = array(
                'message' => 'Category Inserted Successfully ',
                'alert-type' => 'success'
             );
       
             return redirect()->back()->with($notification);
          
          
       }
    
       public function subCategoryDelete($id) {
    
          $category = Category::find($id);
          
    
          Category::findOrFail($id)->delete();
    // OU $category->delete();
             $notification = array(
             'message' => 'Category Deleted Successfully ',
             'alert-type' => 'success'
          );
          return redirect()-> route('all.subcategory')->with($notification);
    
       }
}
