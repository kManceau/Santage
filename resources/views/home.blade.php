@extends('layouts.app')

@section('content')
<body>
    <div class="hero-image-container">
        <img class="hero" src="{{ asset('/storage/fonts/Santa_font.jpg') }}" alt="font">
        <a href="{{ route('children.create') }}" class="btn">Inscrire mon enfant</a>
    </div>
    
    <!-- Контент -->
    <div class="content-overlay">
        <h1>Welcome!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum augue nec lorem viverra, a tincidunt elit viverra.</p>
        <p>Proin euismod, eros id consequat varius, velit magna sagittis mi, sit amet tincidunt sapien mi at ligula.</p>
        <p>Praesent vitae quam nec eros feugiat dictum. Curabitur auctor ut nisi vitae pharetra. Integer ut sapien a nibh efficitur fermentum.</p>
        <p>Mauris nec erat non erat tempus porttitor. Vivamus sollicitudin ultricies lorem, non elementum neque malesuada sed.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum augue nec lorem viverra, a tincidunt elit viverra.</p>
    </div>
</body>
@endsection
