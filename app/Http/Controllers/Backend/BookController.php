<?php

namespace App\Http\Controllers\Backend;

use App\Models\Book;
use Faker\Calculator\Isbn;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Expr\BinaryOp\Mul;

class BookController extends Controller
{





    public function BookView() {

        $book= Book::latest()->get();
       
        return view('backend.book.book_view' , compact('book'));
       }


      public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->input('query');
        $books = Book::search($query)->get();

        if (! $books->count()) {
            return back()->withErrors(['Aucun résultat trouvé']);
        }

        return view('books.search', ['books' => $books]);
    }
// }
//         $query = $request->input('query');
//         $type = $request->input('type');
//         $books = null;
//         if ($type === 'title') {
//             $books = Book::where('title', 'like', '%' . $query . '%')->get();
//         } elseif ($type === 'author') {
//             $books = Book::whereHas('authors', function ($query) use ($request) {
//                 $query->where('name', 'like', '%' . $request->input('query') . '%');
//             })->get();
//         } elseif ($type === 'publisher') {
//             $books = Book::where('publisher', 'like', '%' . $query . '%')->get();
//         } elseif ($type === 'category') {
//          $books = Book::whereHas('categories', function ($query) use ($request) {
//             $query->where('name', 'like', '%' . $request->input('query') . '%');
//         })->get();
//     }
//     return view('books.search', ['books' => $books]);
// }

    
       public function bookAdd() { 

         $categories = Category::latest()->get();
         $publishers = Publisher::All();
         $subCategories = SubCategory::latest()->get();
                return view('backend.book.book_add',compact('subCategories', 'categories' , 'publishers'));
       }
    
       public function bookStore(Request $request){

         // $products=Http::get('https://www.googleapis.com/books/v1/volumes?q='.$request->input('ISBN'))->json();

         // $request-> validate([
         // 'name_en' ,
         // 'name_fr',
         // 'ISBN' ,
         // 'prix' ,
         // 'datePublication' ,
         // 'langue' ,
         // 'product_code' ,
         // 'product_qty' ,
         //  'discount_price' ,
         // 'short_descp_en' ,
         // 'short_descp_fr' ,
         // 'product_thambnail' ,
         // 'special_offer' ,
         // 'featured' ,
         // 'long_descp_en',
         // 'long_descp_fr',
         // 'status' ,
         // 'categoryBook_id' ,
         // 'subCategory_id'  ,
         // 'publisher_id'  ,
         // 'created_at',
          
         //  ]);

         
                 $image = $request->file('product_thambnail');
                 $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                 Image::make($image)->resize(917,1000)->save('upload/book/thambnail/'.$name_image);
                 $save_url = 'upload/book/thambnail/'.$name_image;

        // $reponse=Http::get('https://www.googleapis.com/books/v1/volumes?q='.$request->ISBN);
        
                    $bookID = Book::insertGetId ([
                   'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
                   'name_fr' => str_replace(' ','-',$request->name_fr),
                   'ISBN' => $request->ISBN,
                   'prix' => $request->prix,
                   'datePublication' =>$request-> date_Publication ,
                   'langue' =>$request->langue ,
                   'product_code' => $request->product_code,
                   'product_qty' => $request->product_qty,
                   'discount_price' => $request->discount_price,
                   'short_descp_en' =>$request-> short_descp_en ,
                   'short_descp_fr' =>$request-> short_descp_fr ,
                   'product_thambnail' => $save_url,
                   'special_offer' => $request->special_offer ,
                   'featured'  => $request->featured ,
                   'long_descp_en' =>$request->long_descp_en ,
                   'long_descp_fr' => $request->long_descp_fr,
                   'status' => 1 ,
                   'categoryBook_id' => $request->category_id ,
                   'subCategory_id' => $request->subCategory_id ,
                   'publisher_id' => $request->publisher_id ,
                   'created_at' => Carbon::now(),
                   
                ]);
   
                $images = $request->file('multi_img');
                foreach($images as $img) {
   
                  $make_img = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                  Image::make($img)->resize(917,1000)->save('upload/book/multi_image/'.$make_img);
                  $uploadPath= 'upload/book/multi_image/'.$make_img;

                  MultiImg::insert([
                      'book_id' => $bookID,
                     'photo_name' => $uploadPath,
                     'created_at' => Carbon::now(),
                  ]);
   
                }
          
                $notification = array(
                   'message' => 'Book Inserted Successfully ',
                   'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
               }

       public function bookEdit($id){

        $multiImgs =MultiImg::where('book_id',$id)->get();
        $book = Book::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $publishers = Publisher::all();
        return  view('backend.book.book_edit', compact('book','categories', 'subCategories', 'publishers','multiImgs'));
    
       }
    
       public function bookUpdate(Request $request){
    
        
                $book_id = $request->id;
           
                Book::findOrFail($book_id)->update([
                'name_en' => strtolower((str_replace(' ','-',$request->name_en))),
                'name_fr' => str_replace(' ','-',$request->name_fr),
                'ISBN' => $request->ISBN,
                'prix' => $request->prix,
                'datePublication' =>$request-> date_Publication ,
                'langue' =>$request->langue ,
                'product_code' => $request->product_code,
                'product_qty' => $request->product_qty,
                'discount_price' => $request->discount_price,
                'short_descp_en' =>$request-> short_descp_en ,
                'short_descp_fr' =>$request-> short_descp_fr ,
                'special_offer' => $request->special_offer ,
                'featured'  => $request->featured ,
                'long_descp_en' =>$request->long_descp_en ,
                'long_descp_fr' => $request->long_descp_fr,
                'status' => 1 ,
                'subCategory_id' => $request->subCategory_id ,
                'categoryBook_id' => $request->categoryBook_id ,
                'publisher_id' => $request->publisher_id ,
                'updated_at' => Carbon::now(),
                

                
             ]);
                  
             $notification = array(
                'message' => 'Book Updated without Image Successfully ',
                'alert-type' => 'success'
             );
             return redirect()->route('all.books')->with($notification);
       
          }

          public function MultiImageUpdate(Request $request){

            $imgs = $request->multi_img;
           
            //  if(!empty($imgs)){
                foreach ($imgs as $id => $img) {
                

                 $imgDel = MultiImg::findOrFail($id);
                  unlink($imgDel->photo_name);
                 
                 $make_imge = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                 Image::make($img)->resize(917,1000)->save('upload/book/multi_image/'.$make_imge);
                 $uploadPath = 'upload/book/multi_image/'.$make_imge;

                 MultiImg::where('id' , $id)->update([
                  'photo_name' => $uploadPath ,
                  'updated_at'=> Carbon::now(),
                 ]);
               }

            $notification = array(
               'message' => 'Book Updated  Multi-Image Successfully ',
               'alert-type' => 'success'
            );
         
            return redirect()->back()->with($notification);
                }
         // } else { 
         //       $notification = array(
         //          'message' => 'Book No Multi-Image !!!! ',
         //          'alert-type' => 'warning'
         //       );
         //       return redirect()->back()->with($notification);
         // }
      

      public function  thambnailUpdate(Request $request){
          
         $pro_id = $request->id;
         $old_img = $request->old_img;
         unlink($old_img);

         $image = $request->file('product_thambnail');
                 $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                 Image::make($image)->resize(917,1000)->save('upload/book/thambnail/'.$name_image);
                 $save_url = 'upload/book/thambnail/'.$name_image;

                 Book::findOrFail($pro_id)->update([
                  'product_thambnail' => $save_url ,
                  'updated_at'=> Carbon::now(),
                 ]);

            $notification = array(
               'message' => 'Book Updated Sample Image Successfully ',
               'alert-type' => 'success'
            );
         
            return redirect()->back()->with($notification);
                }



          public function GetBook($book_id){
            $book = SubCategory::where('book_id', $book_id)->orderBy('name_en','ASC')->get();
            return json_encode($book);
          }
       
   
    
         public function bookDelete($id) {
    
            $book = Book::find($id);
            unlink($book->product_thambnail);
              
            Book::findOrFail($id)->delete();

            $images=MultiImg::where('book_id' , $id)->get();
               foreach($images as $img){
                  unlink($img->photo_name);
                  MultiImg::where('book_id' , $id)->delete();
               }
  
            $notification = array(
               'message' => 'Book Deleted  Successfully ',
               'alert-type' => 'success'
            );
            return redirect()-> route('all.books')->with($notification);
           
     }

            public function bookDeleteMulti($id) {
            
               $bookMulti = MultiImg::findOrFail($id);
               unlink($bookMulti->photo_name);

               MultiImg::findOrFail($id)->delete();

            $notification = array(
               'message' => 'Book Multi Image Deleted  Successfully ',
               'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
         }

               public function inactiveBook($id){
                  
                  Book::findOrFail($id)->update([
                     'status' => 0 ,
                  ]);
               $notification = array(
                  'message' => 'Book is Inactive ',
                  'alert-type' => 'warning'
            );
               return redirect()->back()->with($notification);
            }


            public function activeBook($id){
                     
               Book::findOrFail($id)->update([
                  'status' => 1 ,
               ]);
               
            $notification = array(
            'message' => 'Book is active ',
            'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
            }

            public function stockProduct(){
               $book = Book::latest()->get();
               return view('backend.book.book_stock' ,compact('book'));
           }



          

}
