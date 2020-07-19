@auth
@extends('admin.layouts.schema')
@section('title')
Editar Usuario
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/add.css') }}">
@endsection
@section('content')

<div class="col-md-12">
    <div class="row">
        {!! Form::model($user,['method'=>'PATCH','action'=>['usersController@update', $user->id],'files'=>true,
        "class"=>"form"])!!}
        @csrf
        <h2>EDITAR USUARIO</h2>
        <p type="Nombre:">
            <input name="name" type="text" placeholder="Ingrese su nombre aqui.." value="{{ old('name', $user->name) }}"
                class="@error('name') is-invalid @enderror">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Email:">
            <input name="email" value="{{ old('email', $user->email) }}" style="background-color: rgb(243, 243, 243);"
                placeholder="Ingrese su correo.." class="@error('email') is-invalid @enderror">
        </p>
        @error('email')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Confirmar Email:">
            <input name="repeat_email" value="{{ old('repeat_email') }}" placeholder="Confirme su correo.."
                class="@error('repeat_email') is-invalid @enderror">
        </p>
        @error('repeat_email')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione una imagen">
            <input type="file" name="photo" id="inFile" accept="image/*" class="@error('photo') is-invalid @enderror">
            <div class="image-preview" id="imagePreview">
                <img src="/images/users/{{ $user->photo ? $user->photo : 'doctor.png' }}" alt="Image Preview"
                    width="200" class="image">
                <span style="display: none;" class="default-text">Sin foto actual</span>
            </div>

        </p>

        @error('photo')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror


        <div class="move">
            <button type="submit">Guardar</button>
            <button type="button"><a href="{{ route('products.index') }}">Cancelar</a></button>
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
