<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blog\BlogPost;
use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;

class HomeBlogController extends Controller
{
    public function viewHomeBlog(){
        $blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::with('category')->latest()->get();
    	return view('frontend.blog.blog_list',compact('blogpost','blogcategory'));
    } 

    public function HomeBlogDetail($id){
        $blogcategory = BlogPostCategory::latest()->get();
        $postDetail = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details',compact('postDetail','blogcategory'));
    }

    public function HomeBlogCatPost($category_id){

    	$blogcategory = BlogPostCategory::latest()->get();
    	$blogpost = BlogPost::where('category_id',$category_id)->orderBy('id','DESC')->get();
    	return view('frontend.blog.blog_cat_list',compact('blogpost','blogcategory'));

    }
}
