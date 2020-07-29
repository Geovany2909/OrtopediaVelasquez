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
            @foreach ($products as $product)
            <div oncontextmenu="alert('No tienes permisos para descargar'); return false;">
                <a href="javascript:void(0);" onclick="fun_galery({{$product -> id}})">
                    <div class="option">
                        <img src="/images/products/{{ $product->photo }}" >
                    </div>
                </a>
            </div>
            @endforeach

            {{-- Modal de la imagen --}}
            <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                    <span class="close">×</span>
                    <img oncontextmenu="return false;" id="imagen">
                    <h3 id="description"></h3>
                </div>
            </div>
        </div>
    </section>
</div>
@section('js')
<script src="{{ asset('inicio/js/homeGalery.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection
@endsection
