@extends('layouts.app')

@section('scss')
@vite(['resources/sass/home.scss'])
@endsection

@section('content')

<body>
    <div class="content-overlay">
        <h1 class="m-0 p-2">Bienvenue sur la Liste de Vœux du Père Noël !</h1>
        <p>Bienvenue sur le site officiel du Père Noël ! Ici, les parents peuvent inscrire leurs enfants afin qu'ils reçoivent un cadeau spécial du Père Noël pour Noël.</p>
        <p>Grâce à cette plateforme, vous pouvez ajouter les informations de votre enfant à la liste du Père Noël, lui permettant de préparer quelque chose de magique pour eux. Commencez facilement en fournissant quelques détails essentiels sur votre enfant et ses réalisations cette année.</p>
        <p>Une fois que votre enfant est ajouté à la liste, le Père Noël examinera les informations et enverra une demande à ses fidèles lutins. Ces derniers choisiront avec soin un cadeau en fonction des accomplissements, du comportement et des préférences de votre enfant.</p>
        <p class=" m-0 p-4">Ce site vous permet de faire vivre à votre famille la vraie magie de Noël !</p>

    </div>
    <div class="hero-image-container">
        <img class="hero" src="{{ asset('/storage/fonts/Santa_font.jpg') }}" alt="font">
        <a href="{{ route('children.create') }}" class="btn">Inscrire mon enfant</a>
    </div>

    <!-- Contents -->
    <div class="row card-main">
        @foreach($gifts as $gift)
        <div class="card">
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
            <div class="card__content">
                <div class="card__content-inner">
                    <div class="card__title">{{ $gift->name }}</div>
                    @if($gift->good)
                    <div class="card__title text-success">Bon cadeau</div>
                    @else
                    <div class="card__title text-danger">Pauvre cadeau</div>
                    @endif
                    <div class="card__description ">{{ Str::limit($gift->description, 50) }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</body>
@endsection