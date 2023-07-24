<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    
    public function authorView() {

        $authors = Author::get();
        return view('backend.author.author_view' , compact('authors'));
       }
    
       public function authorAdd() {
    
        return view('backend.author.author_add');
       }
    
       public function authorStore(Request $request){
    
          $request-> validate([
          'name_en' => 'required' ,
          
          ]);
    
          Author::insert([
             'name' => strtolower((str_replace(' ','-',$request->name_en))),
          ]);
    
          $notification = array(
             'message' => 'author Inserted Successfully ',
             'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);
    
       }
    
       public function authorEdit($id){
    
        $author = Author::find($id);
        return  view('backend.author.author_edit',compact('author'));
    
       }
    
       public function authorUpdate(Request $request){
    
        
          $author_id = $request->id;

             Author::findOrFail($author_id)->update([
            'name' => strtolower((str_replace(' ','-',$request->name_en))),
            
         ]);
           
       
             $notification = array(
                'message' => 'author Modified Successfully ',
                'alert-type' => 'success'
             );
       
             return redirect()->back()->with($notification);
          
          }
       
    
         public function authorDelete($id) {
            
                $author = Author::find($id);
                
                Author::findOrFail($id)->delete();
                
                $author->books()->delete(); 

                $notification = array(
                    'message' => 'author Deleted with his books Successfully ',
                    'alert-type' => 'success'
                );
                return redirect()-> route('all.authors')->with($notification);
                
            
            }
    }



