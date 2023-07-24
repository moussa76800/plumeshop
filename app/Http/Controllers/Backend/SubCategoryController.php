<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;


class SubCategoryController extends Controller
{
    public function SubCategoryView() {

        $subCategory = SubCategory::get();
        return view('backend.subCategory.subCategory_view' , compact('subCategory'));
       }

       public function GetSubCategory($category_id){
         $subcat = SubCategory::where('category_id', $category_id)->get('name');
         return json_encode($subcat);
       }
                # code...
       
    
       public function SubCategoryAdd() {
        $categories = Category::orderBy('name','ASC')->get();
        return view('backend.subcategory.subcategory_add', compact('categories'));
       }
    
       public function SubCategoryStore(Request $request){
    
          $request-> validate([
          'category_id' =>'required',
          'name' => 'required' ,
          
          ]);
    
          
          SubCategory::insert([
            'category_id'=> $request->category_id,
             'name' => strtolower((str_replace(' ','-',$request->name))),
             
          ]);
    
          $notification = array(
             'message' => 'SubCategory Inserted Successfully ',
             'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);
    
       }
    
       public function subCategoryEdit($id){

        $categorie = Category::orderBy('name','ASC')->get();
        $subCategory = SubCategory::findOrFail($id);
        return  view('backend.subcategory.subcategory_edit',compact('subCategory', 'categorie'));
    
       }
    
       public function subCategoryUpdate(Request $request){
    
        
          $subcategory_id = $request->id;
       
             SubCategory::findOrFail($subcategory_id)->update([
                'name' => strtolower((str_replace(' ','-',$request->name))),
               
             ]);
       
             $notification = array(
                'message' => 'SubCategory Inserted Successfully ',
                'alert-type' => 'success'
             );
       
             return redirect()->back()->with($notification);
          
          
       }
    
       public function subCategoryDelete($id) {
    
          SubCategory::findOrFail($id)->delete();
    // OU $category->delete();
             $notification = array(
             'message' => 'SubCategory Deleted Successfully ',
             'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
    
       }
}
