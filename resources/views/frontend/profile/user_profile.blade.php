@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <img class="card-img-top" style="border-radius: 50%" src="{{ (!empty($editAdminData->profile_photo_path)) ? url('upload/admin_images/'.$editAdminData->profile_photo_path) : url('upload/no_image.png') }}" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href=" " class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href=" " class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div> <!-- //End col md 2 -->

            <div class="col-md-2"></div> <!-- //End col md 2 -->

            <div class="col-md-6">
                <div class="card">
                   
                    <div class="card-body">
                        <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name}}</strong> Update Your Profile</h3>
                        <form method="POST" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="street_name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                <input type="email" id="email" name="email" class="form-control unicase-form-control text-input" value="{{ Auth::user()->email }}" >
                            </div>
                            <div class="form-group">
                                <label for="address">Téléphone</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-header  text-center">
                                    <h4 class="card-title">Address Details</h4>
                                </div>
                            <div class="form-group">
                                    <label for="street_name">Nom de la rue</label>
                                    <input type="text" id="street_name" name="street_name" class="form-control">
                            </div>
                            <div class="form-group">
                                   <label for="street_number">Numéro de la rue</label>
                                    <input type="text" id="street_number" name="street_number" class="form-control">
                            </div>
                            <div class="form-group">
                                    <label for="city">Ville</label>
                                    <input type="text" id="city" name="city" class="form-control">
                            </div>
            @php
            $countries = App\Models\ShipCountry::all();
                @endphp
                        <div class="form-group">
                            <label class="info-title" for="country_id">Country <span>*</span></label>
                            <select id="country_id" name="country_id" class="form-control">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>   
                            @enderror
                        </div>
                           
                        <div class="form-group">
                            <button type="submit"  class="btn btn-warning">Update</button>
                </div>
            </form>
                    </div>
                </div> <!-- //End col md 6 -->
            </div>
        </div>
    </div>
</div>

@endsection
