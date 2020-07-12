@auth
@extends('admin.layouts.schema')
@section('title')
Galery
@endsection

@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Bienvenido a Ortopedia Velasquez Admin</p>
</div>
<div class="cards">
    @forelse ($products as $product)
    <div class="col-md-4">
        <div class="card">
            <div class="user-img">
                <img class="imagen" src="/images/doctor.png" width="150" alt="">
            </div>
            <span class="user-name">{{ $product->name }}</span>
            <span class="user-tittle">{{ $product->category }}</span>
            <hr>
            <div class="col-md-3">
                <span class="education">Precio</span>
            </div>
            <div class="col-md-9">
                <span style="font-size: 11px" class="schools">{{ $product->price }}</span>
            </div>
        </div>
    </div>
    @empty
    @section('empty')
    <h2 style="color: red"> No hay productos</h2>
    @endsection
    @endforelse
</div>
@endsection
@endauth
