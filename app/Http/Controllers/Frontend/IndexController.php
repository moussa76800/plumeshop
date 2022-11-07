<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\SubCategory;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class IndexController extends Controller
{
  public function index(){

    $books = Book::where('status' , 1)->orderBy('id' ,'DESC')->limit(6)->get();
    $categories = Category::orderBy('name_en' , 'ASC')->get();
    $sliders = Slider::where('status' , 1)->orderBy('id' ,'DESC')->limit(3)->get();

        return view('frontend.index',compact('categories','sliders', 'books'));
  }

  public function UserLogout(){
    Auth::logout();
    return Redirect()->route('login');
}

 public function UserProfile(){
  $id = Auth::user()->id;
  $user = User::find($id);
   return view('frontend.profile.user_profile', compact('user'));
 }

 public function UserProfileStore(Request $request){

  $Data = User::find(Auth::user()->id);
            $Data->name = $request->name;
            $Data->email = $request->email;
            $Data->phone = $request->phone;
            
            if($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/user_images/'.$Data->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/user_images'), $filename);
                $Data['profile_photo_path']= $filename;
            }
            $Data->save();

            $notification = array(
                'message' => 'User Profile Updated Successfully' ,
                'alert-type' => 'success'
            );

                return redirect()->route('dashboard')->with($notification);
}

  public function UserChangePassword() {
    $id = Auth::user()->id;
    $user = User::find($id);

        return view('frontend.profile.change_password', compact('user'));
               }

               public function UserUpdatePassword(Request $request){

                $validateData = $request->validate([
                    'oldpassword' => 'required' ,
                    'password'    => 'required|confirmed' ,

                ]);

                $hashedPassword = Auth::user()->password;
                if (Hash::check($request-> oldpassword , $hashedPassword )) {
                  $user = User::find(Auth::id());
                  $user -> password = Hash::make($request->password);
                  $user->save();
                 
                  Auth::logout();
                   return redirect()->route('user.logout');
                }else{
                    return redirect()->back();
                }
            }

  public function bookDetail( $id, $slug ) {
    $book = Book::findOrFail($id);
    $multiImgs = MultiImg::where('booK_id' , $id )->get();
    return view('frontend.book.book_detail', compact('book' , 'multiImgs'));


  }




}
 


