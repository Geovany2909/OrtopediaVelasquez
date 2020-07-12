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
</head>

<body>
    <section>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="{{ asset('inicio/img/ortopediaMovil.jpeg') }}">
                </div>
                <div class="formBx">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
                        @error('email')
                        <p style="color: red;">
                            {{ $message }}
                        </p>
                        @enderror

                        <input id="password" type="password" class="@error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Contraseña">
                        @error('password')
                        <p style="color: red;">
                            {{ $message }}
                        </p>
                        @enderror

                        <input id="password-confirm" type="password" class="" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirmar contraseña">

                        <input style="margin-left: 30%;" type="submit" value="{{ __('Reset Password') }}">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
