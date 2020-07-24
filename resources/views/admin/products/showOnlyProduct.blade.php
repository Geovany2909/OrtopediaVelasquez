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

            <p type="Si desea cambiar, Seleccione una imagen.">
                <input type="file" name="photo" id="inFile" accept="image/*">
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
                <button type="submit" id="edit">Editar</button>
                <a class="a" href="{{ route('galery') }}">Cancelar</a>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('inicio/js/imagePreview.js') }}"></script>
@endsection
@endauth
