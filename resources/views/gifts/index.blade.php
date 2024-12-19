@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row mb-3">
            <p class="h1">Voici la liste des cadeaux</p>
        </div>
            <div class="row mb-3">
                <form class="row g-3 align-items-center" action="{{ route('gifts.index') }}" method="GET">
                    <label for="gift" class="form-label my-0">Choisis un cadeau :</label>
                    <div class="col">
                        <select name="gift" id="gift-select" class="form-select">
                            @foreach($allGifts as $gift)
                                <option value="{{ $gift->id }}">{{ $gift->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="search-gift-edit-button" class="btn btn-primary">Editer</button>
                    </div>
                    <div class="col-auto">
                        <button type="button" id="search-gift-delete-button" class="btn btn-danger">Supprimer</button>
                    </div>
                </form>
            </div>

            <div class="row">
                <p>Trier les cadeaux : </p>
                <div class="d-flex justify-content-start mb-3">
                    <button class="btn btn-primary me-2" onclick="sortPosts('name', 'asc')">Nom (Croissant)</button>
                    <button class="btn btn-primary me-2" onclick="sortPosts('name', 'desc')">Nom (Decroissant)</button>
                    <button class="btn btn-primary me-2" onclick="sortPosts('good', 'desc')">Type (Bon)</button>
                    <button class="btn btn-primary me-2" onclick="sortPosts('good', 'asc')">Type (Mauvais)</button>
                </div>
            </div>

        <div class="row">
            @foreach ($gifts as $gift)
                <div class="col-md-4 mb-4">
                    <div class="card my-2 p-0 {{ $gift->good ? 'text-success' : 'text-danger' }}">
                        <div class="card-header d-flex justify-content-center align-items-center">
                            @if(file_exists(storage_path('app/public/gifts/' . $gift->id . '.avif')))
                                <picture>
                                    <source srcset="/storage/gifts/{{$gift->id}}.avif" type="image/avif" class="img-fluid">
                                    <source srcset="/storage/gifts/{{$gift->id}}.webp" type="image/webp" class="img-fluid">
                                    <img src="/storage/gifts/{{$gift->id}}.jpg" alt="Picture of {{$gift->name}}"
                                         class="card-img-top img-fluid " style="max-height: 250px; object-fit: cover; object-position: center;" loading="lazy" />
                                </picture>
                            @else
                                <picture>
                                    <source srcset="/storage/gifts/default.avif" type="image/avif">
                                    <source srcset="/storage/gifts/default.webp" type="image/webp">
                                    <img src="/storage/gifts/default.jpg" alt="Default Gift Picture"
                                         class="card-img-top img-fluid " style="max-height: 250px; object-fit: cover; object-position: center;" loading="lazy" />
                                </picture>
                            @endif
                        </div>
                        <div class="card-body">
                            <p class="my-0"><strong>Nom : </strong>{{ $gift->name }}</p>
                            <p class="my-0"><strong>Description : </strong>{{ $gift->description }}</p>
                            <p class="my-0"><strong>Categorie : </strong>{{ $gift->category->name }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center my-4">
            <div class="col-md-5">
                {{ $gifts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script>
        function sortPosts(column, direction) {
            window.location.href = `?sort_column=${column}&sort_direction=${direction}`;
        }
    </script>
@endsection
