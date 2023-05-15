<?php

namespace App\Http\Controllers\User;

use App\Models\Review;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ReviewController extends Controller
{
    
// public function reviewStore(Request $request){
//     $book = $request->book_id;

//     $request->validate([

//         'summary' => 'required',
//         'comment' => 'required',
//     ]);

//     Review::insert([
//         'book_id' => $book,
//         'user_id' => Auth::id(),
//         'comment' => $request->comment,
//         'summary' => $request->summary,
//         'created_at' => Carbon::now(),

//     ]);
//     if (session()->get('language') == 'english'){
//     $notification = array(
//         'message' => 'Review Will Approve By Admin',
//         'alert-type' => 'success'
//     );
//     }
//     $notification = array(
//         'message' => "L/'examen sera approuvé par l'administrateur",
//         'alert-type' => 'success'
//     );
//     return redirect()->back()->with($notification);
// } 

    public function reviewStore(Request $request)
    {
        $book = $request->book_id;

        $request->validate([
            'summary' => 'required',
            'comment' => 'required',
        ]);

        $message = Message::create([
            'subject' => $request->summary,
            'content' => $request->comment,
            'created_at' => Carbon::now(),
            
        ]);

        $review = Review::create([
            'book_id' => $book,
            'user_id' => Auth::id(),
            'message_id' => $message->id,
            'rating' => $request->quality,
            'status'=> 0,
            'created_at' => Carbon::now(),
    
        ]);

        if (session()->get('language') == 'english') {
            $notification = array(
                'message' => 'Review Will Approve By Admin',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => "L'examen sera approuvé par l'administrateur",
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);
    }


    public function pendingReview(){
        $reviews = Review::with('message')->where('status', 0)->orderBy('id', 'DESC')->get();
        return view('backend.review.pending_review', compact('reviews'));
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
    $reviewPublish = Review::with('message')->where('status',1)->orderBy('id','DESC')->get();
    	return view('backend.review.publish_review',compact('reviewPublish'));
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












