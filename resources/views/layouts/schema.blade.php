<!DOCTYPE html>
<html lang=" {{  str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('inicio/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('inicio/css/footer.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('inicio/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.min.css">
</head>

<body>

    <div id="fullpage">
        <nav class="menu">
            <a href="{{ route('inicio') }}" class="active">Portada</a>
            <a href="#">Saber mas</a>
            <a href="#">Galeria</a>
            <a href="{{ route('products') }}">Productos</a>
            <a href="{{ route('contacts') }}">Contacto</a>
            @yield('navbar')
        </nav>
        @yield('content')
        @include('layouts.footer')
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.extensions.min.js"></script>
@yield('js')
<script>
    var fp = new fullpage('#fullpage',{
        navigation: true,
    });
</script>
@include('sweetalert::alert')

</html>
