<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Blog\BlogPost;
use Illuminate\Support\Carbon;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function blogCategory(){
        $blogCategory = BlogPostCategory::all();
    return view('backend.blog.category.view', compact('blogCategory'));
    }

    public function addBlogCategory(){
        $addblogCategory = BlogPostCategory::all();
        return view('backend.blog.category.add', compact('addblogCategory'));  
    }

    public function storeBlogCategory(Request $request) {
        $request-> validate([
            'name_en' => 'required' ,
            'name_fr' => 'required' ,
            ]);
        BlogPostCategory::insert([
            'name_en' =>$request->name_en,
            'name_fr' => $request->name_fr,
            'created_at' => Carbon::now(),
            ]);
            if (session()->get('language') == 'english'){ 
            $notification = array(
            'message' => 'Category Inserted Successfully ',
            'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
            }
            $notification = array(
                'message' => 'La Catégorie a été insérée avec succès !! ',
                'alert-type' => 'success'
                );
    
                return redirect()->back()->with($notification);
    }

    public function editBlogCategory($id){

        $editBlogCategory = BlogPostCategory::find($id);
        return view('backend.blog.category.edit', compact('editBlogCategory'));
    }

    public function updateBlogCategory(Request $request){

             $blogCategory_id = $request->id;
             BlogPostCategory::findOrFail($blogCategory_id)->update([
              'name_en' => $request->name_en,
              'name_fr' => $request->name_fr,
              'updated_at' => Carbon::now(),
              
           ]);

          if (session()->get('language') == 'english'){ 
           $notification = array(
              'message' => 'Category Updated Successfully ',
              'alert-type' => 'success'
           );
            return redirect()->back()->with($notification);
                }
  
           $notification = array(
              'message' => 'La Catégorie a été modifiée avec succès !! ',
              'alert-type' => 'success'
           );
           return redirect()->back()->with($notification);
        }

        public function deleteBlogCategory($id){

            BlogPostCategory::findOrFail($id)->delete();
    
            if (session()->get('language') == 'english'){ 
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
        }
        $notification = array(
            'message' => 'La Catégorie a bien été supprimée !!',
            'alert-type' => 'success'
            
        );
            return redirect()->back()->with($notification);
    
        } // end method 

        ///////////////////////////////////////////////////////       Manage Post Blog       ////////////////////////////////////////////////////////////////////

        public function viewBlogPost(){
            $viewBlogPost = BlogPost::all();
        return view('backend.blog.post.view', compact('viewBlogPost')); 
          }

        public function addBlogPost(){
          $viewBlogPost = BlogPost::all();
          $blogCategory = BlogPostCategory::all();
        return view('backend.blog.post.add', compact('viewBlogPost', 'blogCategory')); 
        }

        public function storeBlogPost(Request $request){
            $request-> validate([
                'category_id' =>'required',
                'post_title_en' => 'required' ,
                'post_title_fr' => 'required' ,
                'post_image' => 'required' ,
                'post_details_en' => 'required' ,
                'post_details_fr' => 'required' ,
             ]);

                $image = $request->file('post_image');
                $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(300,300)->save('upload/post/'.$name_image);
                $save_url = 'upload/post/'.$name_image;

                 BlogPost::insert([
                    'category_id' =>  $request->category_id,
                    'post_title_en' =>   $request->post_title_en ,
                    'post_title_fr' =>   $request->post_title_fr ,
                    'post_image' =>   $save_url ,
                    'post_details_en' =>   $request->post_details_en ,
                    'post_details_fr' =>   $request->post_details_fr ,
                    'created_at' => Carbon::now(),
                
                    ]);
                    if (session()->get('language') == 'english'){ 
                    $notification = array(
                    'message' => 'Content Inserted Successfully ',
                    'alert-type' => 'success'
                    );
        
                return redirect()->route('view.Post')->with($notification);
                    }
                    $notification = array(
                        'message' => 'Le Contenu a été insérée avec succès !! ',
                        'alert-type' => 'success'
                        );
            
                return redirect()->route('view.Post')->with($notification);
            }
     }

        

    

