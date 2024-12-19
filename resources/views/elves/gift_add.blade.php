@extends('layouts.app')

@section('scss')
    <script>
        const gifts = @json($gifts);
        const imageList = @json(scandir(storage_path('app/public/gifts/')));
        const categories = @json($categories);
    </script>
    @vite(['resources/js/elf/gift_add.js'])
@endsection

@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <div class="row mb-2">
            <p>
                D'après nos informations,
                {{ $child->first_name . ' ' . $child->last_name }}
                <span class="text-{{ $average > 10 ? 'success' : 'danger' }}">
                    a été {{$average > 10 ? 'gentil' : 'méchant'}} cette année ! (Moyenne : {{ $average }}).
                </span><br>
                C'est maintenant à toi de décider quel cadeau {{ $child->gender == "male" ? 'il' : 'elle' }} aura mérité cette année.
            </p>
        </div>
        <div class="row">
            <p>
                Comme {{ $child->gender == "male" ? 'il' : 'elle' }} a été {{ $average > 10 ? 'gentil' : 'méchant' }}, voici la liste des cadeaux qui correspondent :
            </p>
            <form method="POST" action="{{ route('child_gift_store') }}">
                @csrf
                <label for="gift" class="form-label">Cadeau :</label>
                <select name="gift" id="gift-select" class="form-control">
                    @foreach($gifts as $gift)
                        <option value="{{ $gift->id }}">{{ $gift->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="child_id" value="{{ $child->id }}">
                <div class="card my-2 p-0">
                    <div class="card-header d-flex justify-content-center align-items-center">
                        <picture>
                            <source srcset="" type="image/avif" id="gift-avif">
                            <source srcset="" type="image/webp" id="gift-webp">
                            <img src="" alt="Default Gift Picture"
                                 class="card-img-top img-fluid " style="max-width: 500px;" loading="lazy" id="gift-jpg"/>
                        </picture>
                    </div>
                    <div class="card-body">
                        <p class="my-0"><strong>Nom : </strong><span id="gift-name"></span></p>
                        <p class="my-0"><strong>Description : </strong><span id="gift-description"></span></p>
                        <p class="my-0"><strong>Categorie : </strong><span id="gift-category"></span></p>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Attribuer le cadeau</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger ms-3">Retour</a>
            </form>
        </div>
    </div>
@endsection
