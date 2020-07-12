<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('inicio/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    <title>Reiniciar Contraseña</title>
    <style>
        .button {
            background-color:rgb(8, 124, 124);
            /* Green */
            border: transparent;
            color: white;
            border-radius: 5%;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button2 {
            padding: 10px 24px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="{{ asset('inicio/img/ortopediaMovil.jpeg') }}">
                </div>
                <div class="formBx">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus
                            >
                        @error('email')
                        <p style="color: red;">
                            {{ $message }}
                        </p>
                        @enderror

                        <button type="submit" class="button button2">{{ __('Send Password Reset Link') }}</button>
                        <p class="signup" style="text-align: center;"><a href="{{ route('login') }}">Regresar</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @include("sweetalert::alert");
</body>
</html>
