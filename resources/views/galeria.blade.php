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
        <h2 class="titulo tit">Galería</h2>
        <div class="main-menu">
            @forelse ($products as $product)
            <div oncontextmenu="alert('No tienes permisos para descargar'); return false;">
                <a href="javascript:void(0);" onclick="fun_galery({{$product -> id}})">
                    <div class="option work__img">
                        <img  src="/images/products/{{ $product->photo }}" >
                    </div>
                </a>
            </div>
            @empty
            <h2 style="color: red; ">Aún no hay productos registrados</h2>
            @endforelse

            {{-- Modal de la imagen --}}
            <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                    <span class="close">×</span>
                    <img class="zoom" id="imagen">
                    <h4 id="description"></h4>
                </div>
            </div>
        </div>

        <br>
        <h2 class="titulo tit">Videos</h2>
        <div class="main-menu">
            <div>
                <a href="#">
                    <div class="option work__img">
                        <iframe src="https://s3-eu-west-1.amazonaws.com/qdqvideos/videos/015/015888558/40d591fc-e756-5845-88c2-eeea6fefe165.mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="option work__img">
                        <iframe src="https://s3-eu-west-1.amazonaws.com/qdqvideos/videos/015/015888558/40d591fc-e756-5845-88c2-eeea6fefe165.mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </a>
            </div>
            <div>
                <a href="#">
                    <div class="option work__img">
                        <iframe src="https://s3-eu-west-1.amazonaws.com/qdqvideos/videos/015/015888558/40d591fc-e756-5845-88c2-eeea6fefe165.mp4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </a>
            </div>
        </div>
    </section>
</div>
@section('js')
<script src="{{ asset('inicio/js/homeGalery.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@endsection
@endsection
