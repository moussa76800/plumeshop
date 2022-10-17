@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($editAdminData->profile_photo_path)) ?  url('upload/admin_images/'.$editAdminData->profile_photo_path):url('upload/no_image.png') }}" height="100%" width="100%"><br><br>
               <ul class="list-group list-group-flush">
                <a href=" "class="btn btn-primary btn-sm btn-block">Home</a>
                <a href=" {{ route('user.profile') }}"class="btn btn-primary btn-sm btn-block">Profile Update</a> 
                <a href=" "class="btn btn-primary btn-sm btn-block">Change Password</a> 
                <a href=" {{ route('user.logout') }}"class="btn btn-danger btn-sm btn-block">Logout</a>            
            </ul>
               
                </div> <!-- //End col md 2 -->  

                <div class="col-md-2">

                </div> <!-- //End col md 2 -->   

                <div class="col-md-6">
<div class="card">
    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name}}</strong>Update Your Profile</h3>
                </div> <!-- //End col md 6 -->   
  <div class="card-body">
    <form method="post" accept="">
        @csrf
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="email"  id="email"name="email" class="form-control unicase-form-control text-input" >
           
		</div>
            





            </div> <!-- //End row -->   



    </div>
</div>


@endsection
    