@extends('layouts.app')

@section('scss')
@vite(['resources/sass/home.scss', 'resources/js/noelEgg.js'])
@endsection

@section('content')

<body>
    <div class="content-overlay py-5">
        <section class="blokken container col-12 text-center">
            <h1 class="welcome-title display-4 fw-bold mb-4">
                Bienvenue sur la Liste de Vœux du Père Noël !
            </h1>
            <p class="welcome-text lead mb-3">
                Ce site officiel du Père Noël permet aux parents d'inscrire leurs enfants pour qu'ils reçoivent un cadeau spécial à Noël.
                En quelques étapes simples, partagez des informations essentielles sur votre enfant et ses réalisations.
            </p>
            <p class="welcome-text lead mb-3">
                Une fois les informations ajoutées, le Père Noël confiera à ses lutins la mission de choisir le cadeau parfait, adapté aux accomplissements et préférences de votre enfant.
            </p>
            <p class="welcome-text final-message lead fw-semibold">
                Offrez à votre famille la magie authentique de Noël grâce à cette plateforme unique !
            </p>
        </section>
    </div>
    <div class="hero-image-container">
        <img class="hero" src="{{ asset('/storage/fonts/Santa_font.jpg') }}" alt="font">
        <a href="{{ route('children.create') }}" class="btn">Inscrire mon enfant</a>
    </div>

    <!-- Contents -->


    <div class="row card-main">
        @foreach($gifts as $gift)
        <div class="card container col-md-6 col-sm-12">


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
            @if($gift->good)
            <div class="card__content col-md-6 col-md-6 col-sm-12" style="background-color: green; color: white;">
                <div class="card__content-inner">
                    <div class="card__title">{{ $gift->name }}</div>
                    <div class="card__title">Bon cadeau</div>
                    <div class="card__description">{{ Str::limit($gift->description, 50) }}</div>
                </div>
            </div>
            @else
            <div class="card__content col-md-6 col-sm-12" style="background-color:red; color: white;">
                <div class="card__content-inner">
                    <div class="card__title">{{ $gift->name }}</div>
                    <div class="card__title">Pauvre cadeau</div>
                    <div class="card__description">{{ Str::limit($gift->description, 50) }}</div>
                </div>
            </div>
            @endif

        </div>
        @endforeach
    </div>



</body>
@endsection
