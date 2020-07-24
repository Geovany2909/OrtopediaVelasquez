@auth
@extends('admin.layouts.schema')
@section('title')
Eliminar
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/destroy.css') }}">
@endsection

@section('content')
    <div class="heading">
        <h1>Dashboard/Eliminar</h1>
    </div>
    <div class="main-menu">
        <div class="option">
            <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'ortesis.jpg' }}">
            <h2>{{ $product->name }}</h2>
            <div>
                <p>{{ $product->category }}</p>
                <p>Precio: <span class="span2">$ {{ $product->price }}</span></p>
                {!! Form::open(['method'=>'DELETE', 'action'=>['productsController@destroy', $product->id]]) !!}
                @csrf
                <button type="submit">Eliminar Producto</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@endauth
