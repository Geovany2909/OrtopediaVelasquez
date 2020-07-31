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
    <input type="text" name="name" placeholder="Buscar por nombre">
    <i class="fa fa-search" aria-hidden="true"></i>
    <button type="submit" style="display: none"></button>
    {{ Form::close() }}
    @endsection
    <div class="main-menu">
        @forelse ($products as $product)
            <a href="javascript:void(0);" class="cards" onclick="fun_galeryAdmin('{{ $product->id }}')">
                <div class="option">
                    <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'ortesis.jpg' }}"
                        height="100" width="150" alt="">
                    <h2>{{ $product->name }}</h2>
                </div>
            </a>
        @empty
            @section('empty')
                <h2 style="color: red; text-align: center;margin-right: 20%;">En este momento no hay productos</h2>
            @endsection
        @endforelse
    </div>
    {{ $products->links() }}
    {{-- Modal --}}
    <div id="tvesModal" class="modalContainer">
        <div class="modal-content">
            <span class="close">×</span>
        <form id="form" enctype="multipart/form-data" method="POST">
            @csrf @method('patch')
            <p type="Si desea cambiar, Seleccione una imagen.">
                <input type="file" name="photo" id="inFile" accept="image/*" oninput="validarInput()">
                <div class="image-preview" id="imagePreview">
                    <img id="imagen" alt="Image Preview"
                        width="200" class="image">
                    <span style="display: none;" class="default-text">Sin foto actual</span>
                </div>

            </p>
            @error('photo')
            <p style="color: red;">
                {{ $message }}
            </p>
            @enderror
            <div id="error">

            </div>
            <div class="move">
                <button style="display: none;" type="submit" id="edit">Editar</button>
                <a class="a" href="{{ route('galery') }}">Cancelar</a>
            </div>
        </form>
        </div>
    </div>

</main>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('inicio/js/homeGalery.js') }}"></script>
<script src="{{ asset('inicio/js/imagePreview.js') }}"></script>
@endsection
@endauth
