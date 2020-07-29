<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('inicio/css/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('inicio/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="{{ asset('inicio/img/ortopediaMovil.jpeg') }}">
                </div>
                <div class="formBx">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Iniciar sesion</h2>

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo">
                        @error('email')
                        <p style="color: red;">
                            {{ $message }}
                        </p>
                        @enderror

                        <input id="password" type="password" class="@error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Contrasena">
                        @error('password')
                        <p style="color: red;">
                            {{ $message }}
                        </p>
                        @enderror

                        <input style="margin-left: 30%;" type="submit" value="Ingresar">
                        <p class="signup">No tienes cuenta? <a href="{{ route('register') }}">Registrate</a></p>
                        <br>
                        @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
