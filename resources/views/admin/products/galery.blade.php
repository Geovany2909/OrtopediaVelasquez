@auth
@extends('admin.layouts.schema')
@section('title')
Galery
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/galery.css') }}">
@endsection

@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Bienvenido a Ortopedia Velasquez Admin</p>
</div>
<main>
    <div class="main-menu">
        @forelse ($products as $product)
        <a href="#">
            <div class="option">
                <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'doctor.png' }}" width="150" alt="">
                <h2 >{{ $product->name }}</h2>
            </div>
        </a>
        @empty
        @section('empty')
        <h2 style="color: red"> No hay productos</h2>
        @endsection
        @endforelse
    </div>
</main>
@endsection
@endauth
