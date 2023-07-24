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
        $blogCategory =BlogPostCategory::all();
    return view('backend.blog.category.view', compact('blogCategory'));
    }

    public function addBlogCategory(){
        $addblogCategory = BlogPostCategory::all();
        return view('backend.blog.category.add', compact('addblogCategory'));  
    }

    public function storeBlogCategory(Request $request) {
        $request-> validate([
            'name_en' => 'required' ,
            ]);
        BlogPostCategory::insert([
            'name' =>$request->name_en,
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
              'name' => $request->name_en,    
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

           $blog= BlogPostCategory::findOrFail($id);
           $blog->delete();
           $blog->posts()->delete();
          
    
            if (session()->get('language') == 'english'){ 
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

            }else{ 
            $notification = array(
                'message' => 'La Catégorie a bien été supprimée !!',
                'alert-type' => 'success'
                
            );
           return redirect()->back()->with($notification);

        }
        

        } // end method 

        ///////////////////////////////////////////////////////       Manage Post Blog       ////////////////////////////////////////////////////////////////////

        public function viewBlogPost(){
            $viewPost = BlogPost::all();
        return view('backend.blog.post.view', compact('viewPost')); 
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
                'post_image' => 'required' ,
                'post_details_en' => 'required' ,

             ]);

             $image = $request->file('post_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
    	$save_url = 'upload/post/'.$name_gen;
                 BlogPost::insert([
                    'category_id' =>  $request->category_id,
                    'post_title' =>   $request->post_title_en ,
                    'post_image' =>   $save_url ,
                    'post_details' =>   $request->post_details_en ,
                    'created_at' => Carbon::now(),
                    ]);

                    if (session()->get('language') == 'english'){ 
                    $notification = array(
                    'message' => 'Content Inserted Successfully ',
                    'alert-type' => 'success'
                    );
                return redirect()->back()->with($notification);
                    }
                    $notification = array(
                        'message' => 'Le Contenu a été insérée avec succès !! ',
                        'alert-type' => 'success'
                        );
                return redirect()->back()->with($notification);
            }

            public function editBlogPost($id){
                $editBlogPost = BlogPost::find($id);
                $blogCategory = BlogPostCategory::orderBy('name','ASC')->get();
              return view('backend.blog.post.edit', compact('editBlogPost', 'blogCategory')); 
              }

              public function updateBlogPost(Request $request){ 

              $editBlogPost_id = $request->id;
              $old_img = $request->old_image;
        
            //   if (file_exists( $old_img )){ 
                if ($request->file('post_image')  ) {
                    // unlink($old_img);
                    $image = $request->file('post_image');
                    $name_image = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    // Image::make($image)->resize(300,300)->save('upload/post/'.$name_image);
                    Image::make($image)->resize(780,433)->save('upload/post/'.$name_image);
                    $save_url = 'upload/post/'.$name_image;
            
                    BlogPost::findOrFail( $editBlogPost_id)->update([
                        'category_id' =>  $request->category_id,
                        'post_title' =>   $request->post_title_en ,
                        'post_image' =>   $save_url ,
                        'post_details' =>   $request->post_details_en,
                        'created_at' => Carbon::now(),
                    ]);
                                if (session()->get('language') == 'english'){ 
                                $notification = array(
                                    'message' => 'Post Updated Successfully ',
                                    'alert-type' => 'success'
                                );
                                return redirect()->back()->with($notification);
                                }
                                $notification = array(
                                    'message' => 'Le contenu a bien été effacé ',
                                    'alert-type' => 'success'
                                );
                                return redirect()->back()->with($notification);
                }else {
            
                    BlogPost::findOrFail($editBlogPost_id)->update([
                        'category_id' =>  $request->category_id,
                        'post_title' =>   $request->post_title_en ,
                        'post_details' =>   $request->post_details_en ,
                        'created_at' => Carbon::now(), 
                    ]);
                                if (session()->get('language') == 'english'){
                                $notification = array(
                                        'message' => 'Post Updated Successfully ',
                                    'alert-type' => 'success'
                                );
                                return redirect()->back()->with($notification);
                            }
                                $notification = array(
                                    'message' => 'Le contenu a bien été effacé ',
                                    'alert-type' => 'success'
                                );
                                return redirect()->back()->with($notification);
            }
            }
        //     $notification = array(
        //         'message' => "Il n\'y a pas d'image ",
        //         'alert-type' => 'danger'
        // );
        // return redirect()->back()->with($notification);
        //    }
        
    

           public function deleteBlogPost($id){

            BlogPost::findOrFail($id)->delete();
    
                if (session()->get('language') == 'english'){ 
                $notification = array(
                'message' => 'Post Deleted Successfully ',
                'alert-type' => 'success'
            );
          return redirect()->back()->with($notification);
        }
                $notification = array(
                    'message' => 'Le Contenu a été effacée avec succès !! ',
                    'alert-type' => 'success'
                );
          return redirect()->back()->with($notification);
       }

            }
     

        

    

