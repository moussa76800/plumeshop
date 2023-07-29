@extends('admin.admin_master')

@section('admin')
    <section class="content">
        <div class="container">
            <div class="card">
                <div class="card-header text-center bg-primary text-white">
                    <h1 class="card-title">Détails du livre</h1>
                </div>
                

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>{{ $book->title }}</h3><br>
                            <p><strong>ISBN:</strong> {{ $book->ISBN }}</p>
                            <p><strong>Nombre de pages:</strong> {{ $book->num_pages }}</p>
                            <p><strong>Date de publication:</strong> {{ $book->datePublication }}</p>
                            <p><strong>Langue:</strong> {{ $book->langue }}</p>
                            <p><strong>Prix:</strong> {{ $book->price }} €</p>

                            @if ($book->discount_price)
                            <p style="color: red;">Ce livre est en offre spéciale !</p>
                            @endif

                            @if ($book->special_offer)
                            <p style="color: red;">Ce livre est en offre spéciale !</p>
                            @endif

                            @if ($book->featured)
                            <p style="color: red;">Ce livre est en offre spéciale !</p>
                            @endif

                            <p><strong>Description:</strong> {{ $book->long_descp }}</p>

                            <p>
                                <strong>Catégorie:</strong> {{ $book->categoryBook->name }}
                                <br>
                                <strong>Sous-catégorie:</strong> {{ optional($book->subCategory)->name }}
                            </p>

                            <p><strong>Editeur:</strong> {{ $book->publisher->name }}</p>
                        </div>

                        <div class="col-md-6">
                            <div class="text-center">
                                @if ($book->image)
                                    <img src="{{ $book->image }}" alt="{{ $book->title }}" class="img-thumbnail img-fluid" style="max-width: 200px; height: auto;">
                                @else
                                    <p>Image non disponible</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
