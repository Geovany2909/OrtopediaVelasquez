@extends('layouts.schema')
@section('name')
@endsection
@section('title')
Galeria
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/galery2.css') }}">
@endsection
@section('content')
<!-- Productos -->
<div class="section">
    <section class="prod">
        <h2 class="heading">Galeria</h2>
        <div class="main-menu">
            @foreach ($products as $p)
            <a href="#">
                <div class="option">
                    <img src="/images/products/{{ $p->photo }}" >
                </div>
            </a>
            @endforeach
        </div>
    </section>
</div>
@endsection
