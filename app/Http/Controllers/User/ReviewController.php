<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;

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

public function pendingReview(){
    $review = Review::where('status',0)->orderBy('id','DESC')->get();
    	return view('backend.review.pending_review',compact('review'));
}

public function reviewApprove($id){
    Review::where('id',$id)->update(['status' => 1]);
    if (session()->get('language') == 'english'){
    	$notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );
    }
    $notification = array(
        'message' => "L\'avis a été approuvé avec succès " ,
        'alert-type' => 'success'
    );

        return redirect()->back()->with($notification);
}

public function publishReview(){
    $review = Review::where('status',1)->orderBy('id','DESC')->get();
    	return view('backend.review.publish_review',compact('review'));
}

public function deleteReview($id){
    Review::findOrFail($id)->delete();

    if (session()->get('language') == 'english'){
    $notification = array(
        'message' => 'Review Delete Successfully',
        'alert-type' => 'success'
    );
}
$notification = array(
    'message' => "L\'avis de l\'utilisateur à bien été supprimé",
    'alert-type' => 'success'
);


    return redirect()->back()->with($notification);

}
}













