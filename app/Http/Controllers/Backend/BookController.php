<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use Faker\Calculator\Isbn;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function BookView() {

        $book= Book::latest()->get();
       
        return view('backend.book.book_view' , compact('book'));
       }
    
       public function bookAdd() { 

         $categories = Category::latest()->get();
         $publishers = Publisher::All();
         $subCategories = SubCategory::latest()->get();
                return view('backend.book.book_add',compact('subCategories', 'categories' , 'publishers'));
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
          Image::make($image)->resize(300,300)->save('upload/book/'.$name_image);
          $save_url = 'upload/book/'.$name_image;

        // $reponse=Http::get('https://www.googleapis.com/books/v1/volumes?q='.$request->ISBN);
        
          Book::insert([

             'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
             'name_fr' => str_replace(' ','-',$request->name_fr),
             'ISBN' => $request->ISBN,
             'prix' => $request->prix,
             'datePublication' =>$request-> date_Publication ,
             'langue' =>$request->langue ,
             'product_code' => $request->product_code,
             'product_qty' => $request->product_qty,
             'short_descp_en' =>$request-> short_descp_en ,
             'short_descp_fr' =>$request-> short_descp_fr ,
             'product_thambnail' => $request->product_thambnail ,
             'special_offer' => $request->special_offer ,
             'long_descp_en' =>$request->long_descp_en ,
             'long_descp_fr' => $request->long_descp_fr,
             'status' => $request->status ,
             'subCategory_id' => $request->subCategory_id ,
             'categoryBook_id' => $request->category_id ,
             'publisher_id' => $request->publisher_id ,
             'image' => $save_url,
          ]);
          
    
          $notification = array(
             'message' => 'Book Inserted Successfully ',
             'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);
    
       }
    
       public function CategoryEdit($id){
    
        $category = Category::find($id);
        return  view('backend.category.category_edit',compact('category'));
    
       }
    
       public function bookUpdate(Request $request){
    
        
           $book_id = $request->id;
            $old_img = $request->old_image;
    
          if ($request->file('image') ) {
              unlink($old_img);
             $image = $request->file('image');
             $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(300,300)->save('upload/book/'.$name_image);
             $save_url = 'upload/book/'.$name_image;
       
             Category::findOrFail($book_id)->update([
                'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
                'name_fr' => str_replace(' ','-',$request->name_fr),
                'ISBN' => $request->ISBN,
                'prix' => $request->prix,
                'datePublication' =>$request-> date_Publication ,
                'langue' =>$request->langue ,
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'short_descp_en' =>$request-> short_descp_en ,
                'short_descp_fr' =>$request-> short_descp_fr ,
                'product_thambnail' => $request->product_thambnail ,
                'special_offer' => $request->special_offer ,
                'long_descp_en' =>$request->long_descp_en ,
                'long_descp_fr' => $request->long_descp_fr,
                'status' => $request->status ,
                'subCategory_id' => $request->subCategory_id ,
                'categoryBook_id' => $request->category_id ,
                'publisher_id' => $request->publisher_id ,
                'image' => $save_url,
             ]);
       
             $notification = array(
                'message' => 'Book Inserted Successfully ',
                'alert-type' => 'success'
             );
       
             return redirect()->back()->with($notification);
          
          }else {
    
             $image = $request->file('image');
             $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(300,300)->save('upload/book/'.$name_image);
             $save_url = 'upload/book/'.$name_image;
       
             Category::findOrFail($book_id)->update([
                'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
                'name_fr' => str_replace(' ','-',$request->name_fr),
                'ISBN' => $request->ISBN,
                'prix' => $request->prix,
                'datePublication' =>$request-> date_Publication ,
                'langue' =>$request->langue ,
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'short_descp_en' =>$request-> short_descp_en ,
                'short_descp_fr' =>$request-> short_descp_fr ,
                'product_thambnail' => $request->product_thambnail ,
                'special_offer' => $request->special_offer ,
                'long_descp_en' =>$request->long_descp_en ,
                'long_descp_fr' => $request->long_descp_fr,
                'status' => $request->status ,
                'subCategory_id' => $request->subCategory_id ,
                'categoryBook_id' => $request->category_id ,
                'publisher_id' => $request->publisher_id ,
                'image' => $save_url,
                
             ]);
       
             $notification = array(
                'message' => 'Book Inserted Successfully ',
                'alert-type' => 'success'
             );
             return redirect()->back()->with($notification);
       
          }
       }
   
    
         public function bookDelete($id) {
    
            $book = Book::find($id);
              
            Book::findOrFail($id)->delete();
  
            $notification = array(
               'message' => 'Book Deleted  Successfully ',
               'alert-type' => 'success'
            );
            return redirect()-> route('all.books')->with($notification);
           
      
}
}