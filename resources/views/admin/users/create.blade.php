@auth
@extends('admin.layouts.schema')
@section('title')
Crear Usuario
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/add.css') }}">
@endsection
@section('content')

<div class="col-md-12">
    <div class="row">
        {!! Form::open(['action'=>'usersController@store', 'files'=>true, 'class'=>'form']) !!}
        @csrf
        <h2>AGREGAR USUARIOS</h2>
        <p type="Nombre:">
            <input name="name" type="text" placeholder="Ingrese su nombre aqui.." value="{{ old('name') }}"
                class="@error('name') is-invalid @enderror">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <br>
        <p type="Email:">
            <input name="email" value="{{ old('email') }}" placeholder="Ingrese su correo.."
                class="@error('email') is-invalid @enderror">
        </p>
        @error('email')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione una imagen">
            <input type="file" name="photo" id="inFile" value="{{ old('name') }}" accept="image/*"
                class="@error('photo') is-invalid @enderror">
            <div class="image-preview" id="imagePreview">
                <img src=""  class="image" width="100">
                <span class="default-text">Image Preview</span>
            </div>
        </p>

        @error('photo')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Ingrese contraseña">
            <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"
                placeholder="Ingrese contraseña">
            <div id="toggle" onclick="showHide();"></div>
        </p>

        @error('password')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Confirmar Contraseña:">
            <input type="password" name="repeat_password" id="password2"
                class="@error('repeat_password') is-invalid @enderror " placeholder="Confirme contraseña">
            <div id="toggle2" onclick="showHide2();"></div>
        </p>

        @error('repeat_password')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <div class="move">
            <button type="submit">Guardar</button>
            <button type="submit">Cancelar</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('inicio/js/showPassword.js') }}"></script>
<script src="{{ asset('inicio/js/imagePreview.js') }}"></script>
@endsection
@endauth
