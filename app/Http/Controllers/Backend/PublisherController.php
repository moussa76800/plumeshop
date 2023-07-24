<?php

namespace App\Http\Controllers\Backend;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublisherController extends Controller
{
    
    public function publisherView() {

        $publishers = Publisher::get();
        return view('backend.publisher.publisher_view' , compact('publishers'));
       }
    
       public function publisherAdd() {
    
        return view('backend.publisher.publisher_add');
       }
    
       public function publisherStore(Request $request){
    
          $request-> validate([
          'name_en' => 'required' ,
          
          ]);
    
          Publisher::insert([
             'name' => strtolower((str_replace(' ','-',$request->name_en))),
             
          ]);
    
          $notification = array(
             'message' => 'Publisher Inserted Successfully ',
             'alert-type' => 'success'
          );
    
          return redirect()->back()->with($notification);
    
       }
    
       public function publisherEdit($id){
    
        $publisher = Publisher::find($id);
        return  view('backend.publisher.publisher_edit',compact('publisher'));
    
       }
    
       public function publisherUpdate(Request $request){
    
        
          $publisher_id = $request->id;

          Publisher::findOrFail($publisher_id)->update([
            'name' => strtolower((str_replace(' ','-',$request->name_en))),
            
         ]);
           
       
             $notification = array(
                'message' => 'Publisher Inserted Successfully ',
                'alert-type' => 'success'
             );
       
             return redirect()->back()->with($notification);
          
          }
       
    
       public function publisherDelete($id) {
    
          $publisher = Publisher::find($id);
                
                
            
         if(Publisher::findOrFail($id)->delete());
          
         $publisher->books()->delete(); 

          $notification = array(
             'message' => 'Publisher Deleted  Successfully ',
             'alert-type' => 'success'
          );
          return redirect()-> route('all.publishers')->with($notification);
         
    
       }
    }

