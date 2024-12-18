@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <div class="bg-white rounded-lg shadow-sm p-5">
                <h3 class="mb-4">Liste des Cadeau</h3>

                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <a href="{{ route('gifts.create')}}" class="btn btn-primary btn-sm mb-4">Créer un cadeau</a>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($gifts as $gift)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                @if(file_exists(storage_path('app/public/gifts/' . $gift->id . '.avif')))
                                    <picture>
                                        <source srcset="/storage/gifts/{{$gift->id}}.avif" type="image/avif">
                                        <source srcset="/storage/gifts/{{$gift->id}}.webp" type="image/webp">
                                        <img src="/storage/gifts/{{$gift->id}}.jpg" alt="Picture of {{$gift->name}}"
                                             class="card-img-top img-fluid rounded-3" style="max-height: 300px; object-fit: cover; object-position: center;" loading="lazy" />
                                    </picture>
                                @else
                                    <picture>
                                        <source srcset="/storage/gifts/default.avif" type="image/avif">
                                        <source srcset="/storage/gifts/default.webp" type="image/webp">
                                        <img src="/storage/gifts/default.jpg" alt="Default Gift Picture"
                                             class="card-img-top img-fluid rounded-3" style="max-height: 300px; object-fit: cover; object-position: center;" loading="lazy" />
                                    </picture>
                                @endif
                                <p class="card-text"><strong>{{ $gift->name }}</strong> </p>
                                <p class="card-text"><strong>Catégorie:</strong> {{ $gift->category->name }}</p>
                                <h5 class="card-title">{{ $gift->title }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($gift->description, 100) }}</p>

                                <!-- Условие для отображения текста в зависимости от good -->
                                @if($gift->good)
                                <p class="text-success"><strong>Bon cadeau</strong></p>
                                @else
                                <p class="text-danger"><strong>Pauvre cadeau</strong></p>
                                @endif
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('gifts.edit', $gift->id)}}" class="btn btn-primary btn-sm">Editer</a>
                                <form action="{{ route('gifts.destroy', $gift->id)}}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                @if($gifts->isEmpty())
                <p class="text-center mt-4">Aucun produit trouvé.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
