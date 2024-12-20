<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/christmas-5" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mountains of Christmas" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/dismissAlert.js'])
    @yield('scss')
    @vite(['resources/sass/header.scss'])
</head>

<body class="d-flex flex-column min-vh-100">
    @include('elements.header')

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('elements.footer')
</body>
</html>

