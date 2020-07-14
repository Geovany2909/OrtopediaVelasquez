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
            <input type="text" value="{{ old('name') }}" name="name" class="@error('name') is-invalid @enderror" id=""
                placeholder="Nombre del Porducto">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione la categoria:">
            <select name="category" id="" class="@error('category') is-invalid @enderror">
                @if(old('category'))
                <option value="{{ old('category') }}">{{ old('category') }}</option>
                @else
                <option>Seleccione una opcion</option>
                @endif
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
            <input type="text"  name="price" class="@error('price') is-invalid @enderror" id=""
                value="{{ old('price') }}" placeholder="Precio">
        </p>

        @error('price')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione una imagen">
            <input type="file" name="photo" class="@error('photo') is-invalid @enderror" required accept="image/*"
                value="{{ old('photo') }}" id="inFile">
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
            <textarea name="description" class="@error('description') is-invalid @enderror"
                rows="3">{{ old('description') }}</textarea>
        </p>

        @error('description')
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
<script src="{{ asset('inicio/js/imagePreview.js') }}"></script>
@endsection
@endauth
