@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

                    @include('frontend.common.user.user_sidebar')        


                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            
                                <h3 class="text-center"><span class="text-danger">USER'S INFORMATION</h3>
                                <hr>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-14">
                                        <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                                        <p><strong>Téléphone :</strong> {{ Auth::user()->phone }}</p>                              
                                        @if($user->address)
                                        <p><strong>Adresse :</strong></p>
                                        <p>{{ $user->address->street_number }}, {{ $user->address->street_name }}</p>
                                        <p>{{ $user->address->city }}</p>
                                    @else
                                        <p><strong>Adresse :</strong> Pas d'adresse enregistrée.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection


    