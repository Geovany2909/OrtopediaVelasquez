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
            <input type="text" value="{{ old('name') }}" name="name" placeholder="Nombre del Producto">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione la categoria:">
            <select name="category">
                <option value="{{ old('category', '')}}">{{ old('category',"Seleccione una categoria") }}</option>
                <option value="Ortesis">Ortesis</option>
                <option value="Ortesis inferior">Ortesis inferior</option>
                <option value="Protesis Superior">Protesis Superior</option>
                <option value="Protesis Inferior">Protesis Inferior</option>
            </select>
        </p>

        @error('category')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Precio:">
            <input type="text"  name="price" value="{{ old('price') }}" placeholder="Precio">
        </p>

        @error('price')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione una imagen">
            <input type="file" name="photo" required accept="image/*" value="{{ old('photo') }}" id="inFile">
            <div class="image-preview" id="imagePreview">
                <img src="" class="image" width="150">
                <span class="default-text" style="margin: 0 auto;">Image Preview</span>
            </div>
        </p>

        @error('photo')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Descripcion del producto">
            <textarea name="description"rows="3">
                {{ old('description') }}
            </textarea>
        </p>

        @error('description')
        <p style="color: red;">
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
