<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    
public function reviewStore(Request $request){
    $book = $request->book_id;

    $request->validate([

        'summary' => 'required',
        'comment' => 'required',
    ]);

    Review::insert([
        'book_id' => $book,
        'user_id' => Auth::id(),
        'comment' => $request->comment,
        'summary' => $request->summary,
        'created_at' => Carbon::now(),

    ]);
    if (session()->get('language') == 'english'){
    $notification = array(
        'message' => 'Review Will Approve By Admin',
        'alert-type' => 'success'
    );
    }
    $notification = array(
        'message' => "L/'examen sera approuvé par l'administrateur",
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);

} 

}











