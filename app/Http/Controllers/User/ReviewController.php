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
        'quality' => 'required|integer|between:1,5', // Valide uniquement les valeurs entre 1 et 5
    ]);

    // Créer d'abord la critique
    $review = Review::create([
        'book_id' => $book,
        'rating' => $request->quality,
        'created_at' => Carbon::now(),
    ]);

    // Ensuite, créer le message et associer la critique au message
    $message = Message::create([
        'subject' => $request->summary,
        'content' => $request->comment,
        'user_id' => Auth::id(),
        'status' => 0,
        'review_id' => $review->id, 
        'created_at' => Carbon::now(),
    ]);
    $notification = array(
        'message' => "L'examen sera approuvé par l'administrateur",
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}



public function pendingReview(){
    $reviews = Review::join('messages', 'messages.review_id', '=', 'reviews.id')
                     ->where('messages.status', 0)
                     ->orderBy('reviews.id', 'DESC')
                     ->get();

    return view('backend.review.pending_review', compact('reviews'));
}


    

public function reviewApprove($id)
{
    // Trouvez le message par son ID
    $message = Message::find($id);

    if ($message) {
        // Mettez à jour le statut du message
        $message->update(['status' => 1]);

        $notification = array(
            'message' => 'Review Approved Successfully',
            'alert-type' => 'success'
        );
    } else {
        // Gérez le cas où le message n'a pas été trouvé
        $notification = array(
            'message' => 'Message not found',
            'alert-type' => 'error'
        );
    }

    return redirect()->back()->with($notification);
}

public function publishReview(){
    $reviewPublish = Review::join('messages', 'messages.review_id', '=', 'reviews.id')
    ->where('messages.status', 1)
    ->orderBy('reviews.id', 'DESC')
    ->get();
    	return view('backend.review.publish_review',compact('reviewPublish'));
}

public function deleteReview($id){
    Message::findOrFail($id)->delete();

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












