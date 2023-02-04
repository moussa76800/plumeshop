@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
            <div class="row">
               			 @include('frontend.common.user.user_sidebar')        
            </div> <!-- //End col md 2 -->  

                <div class="col-md-2">
                </div> <!-- //End col md 2 -->   

                <div class="col-md-6">
<div class="card">
    <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name}}</strong> , Welcome To Plumeshop's Library</h3>
                </div> <!-- //End col md 6 -->   
            </div> <!-- //End row -->   



    </div>
</div>


@endsection
    