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
        {!! Form::model($product,['method'=>'PATCH','action'=>['productsController@updateOnlyProduct',$product->id],'files'=>true, "class"=>"form"])!!}
        @csrf

        <p type="Seleccione una imagen">
            <input type="file" name="photo" id="inFile" accept="image/*"
                class="@error('photo') is-invalid @enderror">
            <div class="image-preview" id="imagePreview">
                <img src="/images/products/{{ $product->photo ? $product->photo : '' }}" alt="Image Preview"
                    width="200" class="image">
                <span style="display: none;" class="default-text">Sin foto actual</span>
            </div>

        </p>
        @error('photo')
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
@section('js')
<script src="{{ asset('inicio/js/imagePreview.js') }}"></script>
@endsection
@endauth
