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
{!! htmlScriptTagJsApi() !!}
</head>

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <nav>
                    <ul id="MenuItems">
                        <li><a href="{{ route('inicio') }}" class="active">Portada</a></li>
                        <li><a href="{{ route('saberMas') }}">Saber mas</a></li>
                        <li><a href="{{ route('galeryPrincipal') }}">Galeria</a></li>
                        <li><a href="{{ route('products') }}">Productos</a></li>
                        <li><a href="{{ route('contacts') }}">Contacto</a></li>
                        <li>
                            @yield('navbar')
                            @auth
                            <a href="{{ route('home') }}">Home</a>
                            @endauth
                        </li>
                    </ul>
                </nav>
            <img src="{{asset('inicio/img/menu.png')}}" alt="" class="menu-icon" onclick="menutoggle()">
            </div>
        @yield('content')
        @include('layouts.footer')

        <script>
            var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle() {
                if (MenuItems.style.maxHeight == "0px") {
                    MenuItems.style.maxHeight = "200px";
                }
                else{
                    MenuItems.style.maxHeight = "0px";
                }
            }
        </script>
</body>
@yield('js')
@include('sweetalert::alert')

</html>
