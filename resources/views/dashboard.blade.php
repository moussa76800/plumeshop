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
                            @if (session()->get('locale') == 'fr')
                                <h3 class="text-center"><span class="text-danger">Information de l'utilisateur</h3>
                                <hr>
                            
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-14">
                                        <p><strong>Nom :</strong> {{ Auth::user()->name }}</p>
                                        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                                        <p><strong>Téléphone :</strong> {{ Auth::user()->phone }}</p>                              
                                        @if( Auth::user()->address)
                                        <p><strong>Adresse :</strong>
                                        {{ Auth::user()->address->street_number }}, {{ Auth::user()->address->street_name }} - 
                                        {{ Auth::user()->address->city }}</p>
                                        <p>{{ Auth::user()->address->country->name }}</p> 
                                    @else
                                        <p><strong>Adresse :</strong> Pas d'adresse enregistrée.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        @else 

                        <h3 class="text-center"><span class="text-danger">User's Information</h3>
                            <hr>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-14">
                                    <p><strong>Name :</strong> {{ Auth::user()->name }}</p>
                                    <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                                    <p><strong>phone :</strong> {{ Auth::user()->phone }}</p>                              
                                    @if( Auth::user()->address)
                                    <p><strong>Address :</strong>
                                    {{ Auth::user()->address->street_number }}, {{ Auth::user()->address->street_name }} - 
                                    {{ Auth::user()->address->city }}</p>
                                    <p>{{ Auth::user()->address->country->name }}</p> 
                                @else
                                    <p><strong>Address :</strong> Pas d'adresse enregistrée.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                  

                </div>
            </div>


@endsection


    