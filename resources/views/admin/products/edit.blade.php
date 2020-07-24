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
            <input type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="Precio">
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
        <p style="color: red;">
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
