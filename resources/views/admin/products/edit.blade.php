@auth
@extends('admin.layouts.schema')

@section('title')
Editar Producto
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/add.css') }}">
@endsection
@section('content')
<div class="col-md-12">
    <div class="row">
        {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update', $product->id],'files'=>true, "class"=>"form"])!!}
        @csrf
        <h2>EDITAR PRODUCTO</h2>
        <p type="Nombre del Producto:">
            <input type="text" value="{{ old('name', $product->name) }}" name="name" placeholder="Nombre del Producto">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione la categoria:">
            <select name="category">
                <option value="{{ old('category', $product->category) }}">{{old('category', $product->category)}}</option>
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
            <input type="text" name="price" value="{{ old('price', $product->price) }}" placeholder="Precio">
        </p>

        @error('price')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Descripcion del producto">
            <textarea name="description" placeholder="Descripcion">
                {{ old('description',  $product->description) }}
            </textarea>
        </p>

        @error('description')
        <p style="color: red; margin-bottom: 15px;">
            {{ $message }}
        </p>
        @enderror

        <div class="move">
            <button type="submit">Editar</button>
            <a class="a" href="{{ route('products.index') }}">Cancelar</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@endauth
