<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Book_Author;
use Illuminate\Http\Request;

class BookAuthorController extends Controller
{
    
   public function bookAuthorView() {

    $booksAuthors = Book_Author::latest()->get();
    $book = Book::latest()->get();
    $authors = Author::latest()->get();
   
    return view('backend.book_Author.book_Author_view' , compact('booksAuthors', 'book', 'authors'));
   }

   public function bookAuthorAdd()
    {

      $books = Book::latest()->get();
      $authors = Author::latest()->get();
    return view('backend.book_Author.book_Author_add',compact('books', 'authors'));
   }

   public function bookAuthorStore(Request $request){

      $request-> validate([
      'book_id' => 'required' ,
      'author_id' => 'required' 
      
      ]);

      Book_Author::insert([
         
         'book_id' => $request->book_id ,
         'author_id' => $request->author_id
         
      ]);

      $notification = array(
         'message' => 'Book_Author Inserted Successfully ',
         'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);

   }

   public function bookAuthorEdit($id){

    $book_Author =Book_Author::find($id);
    $books = Book::latest()->get();
    $authors = Author::latest()->get();
    return  view('backend.book_Author.book_Author_edit',compact('book_Author', 'books', 'authors'));

   }

   public function bookAuthorUpdate(Request $request){

    
      $book_Author_id = $request->id;
   
         Book_Author::findOrFail($book_Author_id)->update([
            
            'book_id' => $request->book_id ,
            'author_id' => $request->author_id
            
         ]);
   
         $notification = array(
            'message' => 'book_Author Modified Successfully ',
            'alert-type' => 'success'
         );
   
         return redirect()->back()->with($notification);
      
   
      }
   

   public function bookAuthorDelete($id) {

      // $book_Author= Book_Author::find($id);
                    
      Book_Author::findOrFail($id)->delete();
      $notification = array(
         'message' => 'book_Author Deleted  Successfully ',
         'alert-type' => 'success'
      );
      return redirect()-> route('all.bookAuthor')->with($notification);
     } 
}

