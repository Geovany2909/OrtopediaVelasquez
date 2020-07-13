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
        <form class="form">
            <h2>AGREGAR USUARIOS</h2>
            <p type="Nombre:">
                <input placeholder="Ingrese su nombre aqui..">
            </p>
            <p type="Usuario:">
                <input placeholder="Ingrese su nombre de usuario..">
            </p>
            <p type="Email:">
                <input placeholder="Ingrese su correo..">
            </p>
            <p type="Seleccione una imagen">
                <input type="file" name="photo" id="inFile">
                <div class="image-preview" id="imagePreview">
                    <img src="" alt="Image Preview" class="image">
                    <span class="default-text">Image Preview</span>
                </div>
            </p>
            <p type="Ingrese contraseña">
                <input type="password" name="" id="password" placeholder="Ingrese contraseña">
                <div id="toggle" onclick="showHide();"></div>
            </p>
            <p type="Confirmar Contraseña:">
                <input type="password" name="" id="password2" placeholder="Confirme contraseña">
                <div id="toggle2" onclick="showHide2();"></div>
            </p>
            <div class="move">
                <button type="submit">Guardar</button>
                <button type="submit">Cancelar</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('inicio/js/showPassword.js') }}"></script>
@endsection
@endauth
