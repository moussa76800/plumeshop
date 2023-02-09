<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    
        public function AdminProfile() {
                $adminData = Admin::find(1);
                    return view('admin.admin_profile_view', compact('adminData'));


        }

        public function AdminProfileEdit(){
            $editAdminData = Admin::find(1);
                    return view('admin.admin_profile_edit', compact('editAdminData'));

        }

        public function AdminProfileStore(Request $request) {
            $storeAdminData = Admin::find(1);
            $storeAdminData->name = $request->name;
            $storeAdminData->email = $request->email;
            
            if($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/admin_images/'.$storeAdminData->profile_photo_path));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'), $filename);
                $storeAdminData['profile_photo_path']= $filename;
            }
            $storeAdminData->save();

            $notification = array(
                'message' => 'Admin Profile Updated Successfully' ,
                'alert-type' => 'success'
            );

                return redirect()->route('admin.profile')->with($notification);

     }

            public function AdminChangePassword(){
                return view('admin.admin_change_password');
            }

            public function AdminUpdateChangePassword(Request $request){

                $validateData = $request->validate([
                    'oldpassword' => 'required' ,
                    'password'    => 'required|confirmed' ,

                ]);

                $hashedPassword = Admin::find(1)->password;
                if (Hash::check($request-> oldpassword , $hashedPassword )) {
                  $admin = Admin::find(1);
                  $admin -> password = Hash::make($request->password);
                  $admin->save();
                 
                  Auth::logout();
                   return redirect()->route('admin.logout');
                }else{
                    return redirect()->back();
                }
            }

            public function allUsers(){
                $users = User::All();
            return view('backend.user.all_Users' , compact('users'));
            }
}
