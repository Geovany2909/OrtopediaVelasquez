<!DOCTYPE html>
<html lang=" {{  str_replace('_', '-', app()->getLocale()) }}"">

<head>
    <meta charset=" UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('inicio/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('inicio/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('inicio/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('inicio/img/logo.png') }}">
@yield('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
    .dropbtn {
        background-color: white;
        color: black;
        padding: 16px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }


</style>
{!! htmlScriptTagJsApi() !!}
</head>

<body>

    <div id="fullpage">
        <nav class="menu">
            <a href="{{ route('inicio') }}" class="active">Portada</a>
            <a href="{{ route('saberMas') }}">Saber mas</a>
            <a href="{{ route('galeryPrincipal') }}">Galeria</a>
            <a href="{{ route('products') }}">Productos</a>
            <a href="{{ route('contacts') }}">Contacto</a>
            @yield('navbar')
            @auth
            <a href="{{ route('home') }}">Home</a>
            @endauth
        </nav>
        @yield('content')
        @include('layouts.footer')
    </div>
</body>
@yield('js')
@include('sweetalert::alert')

</html>
