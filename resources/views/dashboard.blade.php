@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

                    @include('frontend.common.user.user_sidebar')        

                    <div class="col-md-2">
                    </div> <!-- //End col md 2 -->   

                <div class="col-md-6">
                            <div class="card">
                    <h3 class="text-center"><span>@if(session()->get('language') == 'french') Bienvenue dans ton Dashboard, </span><strong class="text-danger">{{ Auth::user()->name}}</strong></h3>
                    @else Welcome To Dashboard,  </span><strong>{{ Auth::user()->name}}</strong>@endif</h3>
                            </div>
                </div> <!-- //End col md 6 -->   
        </div> <!-- //End row -->   
    </div>
</div>


@endsection
    