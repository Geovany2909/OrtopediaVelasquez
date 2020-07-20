@auth
@extends('admin.layouts.schema')
@section('title')
Galery
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/galery.css') }}">
<link rel="stylesheet" href="{{ asset('inicio/css/paginate.css') }}">
@endsection

@section('content')
<div class="heading">
    <h1>Dashboard/Galeria</h1>
</div>
<main>
    @section('buscar')
        {{ Form::open(['route' => 'galery', 'method' => 'GET', 'class' => 'pone-la-clase-que-queras-para-el-form']) }}
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="name" placeholder="Buscar por nombre">
        <button type="submit" style="display: none"></button>
        {{ Form::close() }}
    @endsection
    <div class="main-menu">
        @forelse ($products as $product)
        <a href="{{ route('showOnlyProduct', $product->id) }}">
            <div class="option">
                <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'ortesis.jpg' }}" height="100" width="150" alt="">
                <h2 >{{ $product->name }}</h2>
            </div>
        </a>
        @empty
        @section('empty')
        <h2 style="color: red; text-align: center;">En este momento no hay productos</h2>
        @endsection
        @endforelse
    </div>
    {{ $products->links() }}
</main>
@endsection
@endauth
