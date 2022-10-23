<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use Faker\Calculator\Isbn;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function BookView() {

        $book= Book::latest()->get();
       
        return view('backend.book.book_view' , compact('book'));
       }
    
       public function bookAdd() { 

         $subCategories = SubCategory::latest()->get();
                return view('backend.book.book_add',compact('subCategories'));
       }
    
       public function bookStore(Request $request){


       
          $request-> validate([
            'name_en'  ,
            'name_fr'  ,
            'ISBN'  ,
            'prix'  ,
            'date_Publication'  ,
            'langue'  ,
            'product_code',
            'product_qty' ,
            'short_descp_en'  ,
            'short_descp_fr'  ,
            'product_thambnail'  ,
            'special_offer'  ,
            'long_descp_en' ,
            'long_descp_fr' ,
            'status' ,
            'subCategory_id' ,
            'publisher_id'  ,
            'categoryBook_id'  ,
            'image'    ,
          
          ]);

         
          $image = $request->file('image');
          $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
          Image::make($image)->resize(300,300)->save('upload/category/'.$name_image);
          $save_url = 'upload/category/'.$name_image;

        $reponse=Http::get('https://www.googleapis.com/books/v1/volumes?q='.$request->ISBN);
        dd($reponse);
          Book::insert([

             'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
             'name_fr' => str_replace(' ','-',$request->name_fr),
             'ISBN' => $request->ISBN,
             'prix' => $request->prix,
             'datePublication' =>$request-> date_Publication ,
             'langue' =>$request->langue ,
             'product_code' => $request->ISBN,
             'product_qty' => $request->product_code,
             'short_descp_en' =>$request-> short_descp_en ,
             'short_descp_fr' =>$request-> short_descp_en ,
             'product_thambnail' => $request->product_thambnail ,
             'special_offer' => $request->special_offer ,
             'long_descp_fr' => $request->long_descp_fr,
             'long_descp_en' =>$request-> short_descp_en ,
             'status' => $request->status ,
             'subCategory_id' => $request->subCategory_id ,
             'publisher_id' => $request->publisher_id ,
             'categoryBook_id' => $request->categoryBook_id ,
             'image' => $save_url,
          ]);
          
    
          $notification = array(
             'message' => 'Category Inserted Successfully ',
             'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification,[
            'reponse' => $reponse,
          ]);
    
       }
    
    //    public function CategoryEdit($id){
    
    //     $category = Category::find($id);
    //     return  view('backend.category.category_edit',compact('category'));
    
    //    }
    
    //    public function CategoryUpdate(Request $request){
    
        
    //       $category_id = $request->id;
    //         $old_img = $request->old_image;
    
    //       if ($request->file('image') ) {
    //           unlink($old_img);
    //          $image = $request->file('image');
    //          $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //          Image::make($image)->resize(300,300)->save('upload/category/'.$name_image);
    //          $save_url = 'upload/category/'.$name_image;
       
    //          Category::findOrFail($category_id)->update([
    //             'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
    //             'name_fr' => str_replace(' ','-',$request->name_fr),
    //             'image' => $save_url,
    //          ]);
       
    //          $notification = array(
    //             'message' => 'Category Inserted Successfully ',
    //             'alert-type' => 'success'
    //          );
       
    //          return redirect()->back()->with($notification);
          
    //       }else {
    
    //          $image = $request->file('image');
    //          $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //          Image::make($image)->resize(300,300)->save('upload/category/'.$name_image);
    //          $save_url = 'upload/category/'.$name_image;
       
    //          Category::findOrFail($category_id)->update([
    //             'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
    //             'name_fr' => str_replace(' ','-',$request->name_fr),
                
    //          ]);
       
    //          $notification = array(
    //             'message' => 'Category Inserted Successfully ',
    //             'alert-type' => 'success'
    //          );
    //          return redirect()->back()->with($notification);
       
    //       }
    //    }
    
    //    public function CategoryDelete($id) {
    
    //       $category = Category::find($id);
    //             $img = $category->image;
    //             unlink($img);
    //             $category->subCategories()->delete();
    
    //       Category::findOrFail($id)->delete();
    // // OU $category->delete();
    //          $notification = array(
    //          'message' => 'Category Deleted with subCategory Successfully ',
    //          'alert-type' => 'success'
    //       );
    //       return redirect()-> route('all.category')->with($notification);
    
    //    }
}
