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
        {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@update',$product->id],'files'=>true, "class"=>"form"])!!}
        @csrf
        <h2>EDITAR ESTE PRODUCTO</h2>
        <p type="Nombre del Producto:">
            <input type="text" value="{{ $product->name }}" name="name" class="@error('name') is-invalid @enderror"
                id="" placeholder="Nombre del Porducto">
        </p>

        @error('name')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Seleccione la categoria:">
            <select name="category" id="" class="@error('category') is-invalid @enderror">
                <option value="{{ $product->category }}">{{ $product->category }}</option>
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
            <input type="number" name="price" class="@error('price') is-invalid @enderror" id=""
                value="{{ $product->price }}" placeholder="Precio">
        </p>

        @error('price')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        @error('photo')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <p type="Descripcion del producto">
            <textarea name="description" id="" class="@error('description') is-invalid @enderror"
                placeholder="Descripcion">
                {{ $product->description }}
            </textarea>
        </p>

        @error('description')
        <p style="color: red;">
            {{ $message }}
        </p>
        @enderror

        <div class="move">
            <button type="submit">Editar</button>
            <button type="submit"><a href="{{ route('products.index') }}">Cancelar</a></button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@endauth
