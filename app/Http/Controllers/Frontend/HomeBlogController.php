<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Message;
use App\Models\BlogMessage;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog\BlogPostCategory;

class HomeBlogController extends Controller
{
    public function viewHomeBlog()
    {
        $blogcategory = BlogPostCategory::all();
        $blogpost = BlogPost::with('category')->latest()->get();
        return view('frontend.blog.blog_list', compact('blogpost', 'blogcategory'));
    }

    public function HomeBlogDetail($id)
    {
        $blogcategory = BlogPostCategory::all();
        $postDetail = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details', compact('postDetail', 'blogcategory'));
    }

    public function HomeBlogCatPost($category_id)
    {

        $blogcategory = BlogPostCategory::all();
        $blogposte = BlogPost::where('category_id', $category_id)->orderBy('id', 'DESC')->get();
        return view('frontend.blog.blog_cat_list', compact('blogposte', 'blogcategory'));
    }
    public function blogMessageStore(Request $request)
    {
        $post = $request->post_id;

        $request->validate([
            'content' => 'required',
            'comment' => 'required',
        ]);

        // Créer le message avec les données fournies par le formulaire
        $message = Message::create([
            'blog_id' => $post,
            'subject' => $request->content,
            'content' => $request->comment,
            'user_id' => Auth::id(),
            'status' => 0,
            'created_at' => Carbon::now(),
        ]);

        // Lier le modèle Message au modèle BlogPost en utilisant la clé étrangère
        $blogPost = BlogPost::find($post);
        $blogPost->messages()->save($message);

        $notification = array(
            'message' => 'The Blog\'s Message Will Approve By Admin',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
