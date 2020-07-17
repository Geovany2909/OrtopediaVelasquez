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
    <h1>Dashboard</h1>
    <p>Bienvenido a Ortopedia Velasquez Admin</p>
</div>
<main>
    @section('buscar')
        {{ Form::open(['route' => 'galery', 'method' => 'GET', 'class' => 'pone-la-clase-que-queras-para-el-form']) }}
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="name">
        <button type="submit" style="display: none"></button>
        {{ Form::close() }}
    @endsection
    <div class="main-menu">
        @forelse ($products as $product)
        <a href="{{ route('showOnlyProduct', $product->id) }}">
            <div class="option">
                <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'ortesis.jpg' }}" width="150" alt="">
                <h2 >{{ $product->name }}</h2>
            </div>
        </a>
        @empty
        @section('empty')
        <h2 style="color: red; text-align: center;"> No hay productos</h2>
        @endsection
        @endforelse
    </div>
    {{ $products->links() }}
</main>
@endsection
@endauth
