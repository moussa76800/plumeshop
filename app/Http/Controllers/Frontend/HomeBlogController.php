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
    $request->validate([
        'content' => 'required',
        'comment' => 'required',
    ]);

    // Créer le message
    $message = Message::create([
        'subject' => $request->content,
        'content' => $request->comment,
        'user_id' => Auth::id(),
        'created_at' => Carbon::now(),
    ]);

    // Créer le blogMessage lié
    $message->blogMessage()->create([
        'status' => 0,
    ]);

    $notification = array(
        'message' => 'The Blog\'s Message Will Approve By Admin',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}


    // public function blogMessageStore(Request $request)
    // {
    //     $request->validate([
    //         'content' => 'required',
    //         'comment' => 'required',
    //     ]);

    //     // Récupérer le post à partir de l'ID envoyé depuis le formulaire
    //     $post = BlogPost::find($request->post_id);

    //     // Vérifier si le post existe
    //     if (!$post) {
    //         return redirect()->back()->with('error', 'Post not found.');
    //     }

    //     // Créer le message et l'associer au post
    //     $message = $post->messages()->create([
    //         'subject' => $request->content,
    //         'content' => $request->comment,
    //         'user_id' => Auth::id(),
    //         'created_at' => Carbon::now(),
    //     ]);

    //     // Votre logique de validation et envoi de notification ici si nécessaire

    //     return redirect()->back()->with('success', 'Message sent successfully.');
    // }
}
