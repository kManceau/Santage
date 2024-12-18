@extends('layouts.app')

@section('scss')
    @vite(['resources/sass/home.scss'])
@endsection

@section('content')

<body>
    <div class="content-overlay">
        <h1>Welcome!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum augue nec lorem viverra, a tincidunt elit viverra.</p>
        <p>Proin euismod, eros id consequat varius, velit magna sagittis mi, sit amet tincidunt sapien mi at ligula.</p>
        <p>Praesent vitae quam nec eros feugiat dictum. Curabitur auctor ut nisi vitae pharetra. Integer ut sapien a nibh efficitur fermentum.</p>
        <p>Mauris nec erat non erat tempus porttitor. Vivamus sollicitudin ultricies lorem, non elementum neque malesuada sed.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum augue nec lorem viverra, a tincidunt elit viverra.</p>
    </div>
    <div class="hero-image-container">
        <img class="hero" src="{{ asset('/storage/fonts/Santa_font.jpg') }}" alt="font">
        <a href="{{ route('children.create') }}" class="btn">Inscrire mon enfant</a>
    </div>

    <!-- Контент -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 content-overlay">
        @foreach($gifts as $gift)


        <div class="card">
            <picture>
                <source srcset="/storage/gifts/{{$gift->id}}.avif" type="image/avif">
                <source srcset="/storage/gifts/{{$gift->id}}.webp" type="image/webp">
                <img src="/storage/gifts/{{$gift->id}}.jpg" alt="Picture of {{$gift->name}}"
                    class="card-img-top img-fluid rounded-3" style="max-height: 300px; object-fit: cover; object-position: center;" loading="lazy" />
            </picture>
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
