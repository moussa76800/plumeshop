<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminUserController extends Controller
{
    public function allAdminRole(){
        $adminuser = Admin::where('type',2)->latest()->get();
    	return view('backend.rôle.admin_role_all',compact('adminuser'));
    }
    public function addAdminRole(){
            return view('backend.rôle.admin_role_add');
    }

    public function storeAdminRole(Request $request){

    	$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = 'upload/admin_images/'.$name_gen;

	Admin::insert([
		'name' => $request->name,
		'email' => $request->email,
		'password' => Hash::make($request->password),
		'phone' => $request->phone,
		'category' => $request->category,
        'subcategory' => $request->subcategory,
        'publisher' => $request->publisher,
        'author' => $request->author,
		'book' => $request->product,
		'slider' => $request->slider,
		'coupon' => $request->coupons,

		'shipping' => $request->shipping,
		'blog' => $request->blog,
		'setting' => $request->setting,
		'returnOrder' => $request->returnorder,
		'review' => $request->review,

		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
		'type' => 2,
		'profile_photo_path' => $save_url,
		'created_at' => Carbon::now(),
    	]);

        if (session()->get('language') == 'english'){
	    $notification = array(
			'message' => 'Admin User Created Successfully',
			'alert-type' => 'success'
		);
    }
    $notification = array(
        'message' => " Le nouveau Administrateur a été enregistré avec succès ",
        'alert-type' => 'success'
    );
		return redirect()->route('all_admin')->with($notification);
    }

    public function editAdminRole($id){
        $adminuser = Admin::findOrFail($id);
    	return view('backend.rôle.admin_role_edit',compact('adminuser'));
    }

    public function updateAdminRole(Request $request){
    	
    	$admin_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('profile_photo_path')) {

    	unlink($old_img);
    	$image = $request->file('profile_photo_path');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
    	$save_url = 'upload/admin_images/'.$name_gen;

	Admin::findOrFail($admin_id)->update([
		'name' => $request->name,
		'email' => $request->email,
		'phone' => $request->phone,
		'category' => $request->category,
        'subcategory' => $request->subcategory,
		'book' => $request->product,
        'publisher' => $request->publisher,
        'author' => $request->author,
		'slider' => $request->slider,
		'coupon' => $request->coupons,
		'shipping' => $request->shipping,
		'blog' => $request->blog,
		'setting' => $request->setting,
		'returnOrder' => $request->returnorder,
		'review' => $request->review,
		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
		'type' => 2,
		'profile_photo_path' => $save_url,
		'created_at' => Carbon::now(),

    	]);

	    $notification = array(
			'message' => 'Admin User Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all_admin')->with($notification);

    	}else{

    	Admin::findOrFail($admin_id)->update([
		'name' => $request->name,
		'email' => $request->email,
		 
		'phone' => $request->phone,
		'brand' => $request->brand,
		'category' => $request->category,
		'product' => $request->product,
		'slider' => $request->slider,
		'coupons' => $request->coupons,

		'shipping' => $request->shipping,
		'blog' => $request->blog,
		'setting' => $request->setting,
		'returnorder' => $request->returnorder,
		'review' => $request->review,

		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
		'type' => 2,
		'created_at' => Carbon::now(),
    	]);

        if (session()->get('language') == 'english'){
	    $notification = array(
			'message' => 'Admin User Updated Successfully',
			'alert-type' => 'info'
		);
    }
    $notification = array(
        'message' => 'L\'Administrateur à été mofifié avec succès !!',
        'alert-type' => 'info'
    );

		return redirect()->route('all_admin')->with($notification);
        }
    } // end method 


 	public function deleteAdminRole($id){

 		$adminimg = Admin::findOrFail($id);
 		$img = $adminimg->profile_photo_path;
 		unlink($img);

 		Admin::findOrFail($id)->delete();
         if (session()->get('language') == 'english'){
 		 $notification = array(
			'message' => 'Admin User Deleted Successfully',
			'alert-type' => 'succes'
		);
    }
    $notification = array(
        'message' => 'L\'Administrateur à été supprimé avec succès !!',
        'alert-type' => 'succes'
    );

		return redirect()->back()->with($notification);

 	} // end method 
}
