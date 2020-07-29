@guest
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('inicio/css/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('inicio/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
    <title>Register</title>
</head>

<body>
    <section>
        <div class="container">
            <div class="user singinBx">
                <div class="imgBx">
                    <img src="{{ asset('inicio/img/ortopediaMovil.jpeg') }}">
                </div>
                <div class="formBx">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h2>Iniciar sesion</h2>

                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nombre Completo">
                        @error('name')
                        <p style="color: red;">
                            {{ $message }}
                        </p>
                        @enderror

                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" value="{{ old('email') }}" required autocomplete="email"
                            autofocus placeholder="Correo">
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

                        <input id="password-confirm" type="password" class="" name="password_confirmation" required
                            autocomplete="new-password" placeholder="Confirmar contraseña">

                        <input style="margin-left: 30%;" type="submit" value="{{ __('Register') }}">
                        <p class="signup">Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesion</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
@endguest
