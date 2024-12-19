@section('scss')
@vite(['resources/sass/header.scss'])
@endsection

<nav class="navbar navbar-expand-lg navbar-red navbar-dark">
    <div class="wrapper">

    </div>
    <div class="container-fluid all-show">
        <a class="navbar-brand" href="{{ url('/') }}"><strong>Santage</strong> </a>
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link inscription rounded p-1" href="{{ route('children.create') }}">{{ __('Inscrire mon enfant') }}</s></a>
        </li>
        @endif
        @else
        @auth
        <li class="nav-item dropdown d-flex align-items-center">
            <picture>
                <source srcset="/storage/users/{{ Auth::user()->id }}.avif" type="image/avif">
                <source srcset="/storage/users/{{ Auth::user()->id }}.webp" type="image/webp">
                <img src="/storage/users/{{ Auth::user()->id }}.jpg"
                    alt="Picture of {{ Auth::user()->id }}"
                    class="rounded-circle me-2"
                    style="width: 40px; height: 40px; object-fit: cover; object-position: center;"
                    loading="lazy" />
            </picture>
            <a id="navbarDropdown" class="nav-link inscription rounded" href="{{ route('users.edit', Auth::user()->id) }}"
                style="text-transform: uppercase;"
                role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
        </li>
        @endauth
        @endif
        <li class="nav-item dropdown">
            <button type="button" class="btn btn-danger rounded" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <ul class="list-unstyled mb-2">
                    @guest
                    @if (Route::has('login'))
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="dropdown-item">
                        <a class="nav-link" aria-current="page" href="{{ route('children.index') }}">{{ __('Children') }}</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('gifts.index') }}">{{ __('Cadeau') }}</a>
                    </li>
                    @if (Auth::user()->role === 'elf')
                    <li class="dropdown-item">
                        <a class="nav-link" href="#">{{ __('Voir mes enfants') }}</a>
                    </li>
                    @elseif (Auth::user()->role === 'santa')
                    <li class="dropdown-item">
                        <a class="nav-link" href="#">{{ __('Attribuer un lutin aux enfants') }}</a>
                    </li>
                    @endif
                    @endguest

                    @auth
                    <div class="dropdown-divider">

                    </div>
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('users.edit', Auth::user()) }}">{{ __('Modifier le profil') }}</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Se deconnecter') }}
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
            @endauth
            </ul>
    </div>
    </li>

    </div>

    </div>
</nav>