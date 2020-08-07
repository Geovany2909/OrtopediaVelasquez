@auth
@extends('admin.layouts.schema')

@section('title')
Crear Producto
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/add.css') }}">
@endsection

@section('content')
<div class="col-md-12">
    <div class="row">
        {!! Form::open(['action'=>'productsController@store','files'=>'true', 'class'=>'form']) !!}
        @csrf
        <h2>AGREGAR PRODUCTOS</h2>
        <p type="Nombre del Producto:">
            <input type="text" value="{{ old('name') }}" name="name" placeholder="Nombre del producto">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione la categoría:">
            <select name="category">
                <option value="{{ old('category', '')}}">{{ old('category',"Seleccione una categoría") }}</option>
                <option value="Ortopedia técnica">Ortopedia técnica</option>
                <option value="Protésis">Protésis</option>
                <option value="Ayudas técnicas y movilidad">Ayudas técnicas y movilidad</option>
                <option value="Ortesis del deporte">Ortesis del deporte</option>
                <option value="Prótesis mamarias">Prótesis mamarias</option>
                <option value="Ortopedia deportiva">Ortopedia deportiva</option>
                <option value="Scooter plegable transformer">Scooter plegable transformer</option>
                <option value="Cascos para niños">Cascos para niños</option>
            </select>
        </p>

        @error('category')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Precio:">
            <input type="text"  name="price" value="{{ old('price') }}" placeholder="Ejemplo 20.20">
        </p>

        @error('price')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione una imágen">
            <input type="file" name="photo" required accept="image/*" value="{{ old('photo') }}" id="inFile">
            <div class="image-preview" id="imagePreview">
                <img src="" class="image" width="150">
                <span class="default-text" style="margin: 0 auto;">Vista Previa</span>
            </div>
        </p>

        @error('photo')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Descripción del producto">
            <textarea  name="description"rows="3" placeholder="descripción">
                {{ old('description') }}
            </textarea>
        </p>

        @error('description')
        <p style="color: red; margin-bottom: 15px;">
            {{ $message }}
        </p>
        @enderror

        <div class="move">
            <button type="submit">Guardar</button>
            <a class="a" href="{{ route('home') }}">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('inicio/js/imagePreview.js') }}"></script>
@endsection
@endauth
