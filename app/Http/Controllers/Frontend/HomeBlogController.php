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
    	$blogpost = BlogPost::latest()->get();
    	return view('frontend.blog.blog_list',compact('blogpost','blogcategory'));

    } 
}
