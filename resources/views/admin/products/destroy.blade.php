@auth
@extends('admin.layouts.schema')
@section('title')
Galery
@endsection
@section('css')
<style>
    .glow-on-hover {
        width: 220px;
        height: 50px;
        border: none;
        outline: none;
        color: #fff;
        background: #111;
        cursor: pointer;
        position: relative;
        z-index: 0;
        border-radius: 10px;
    }

    .glow-on-hover:before {
        content: '';
        background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
        position: absolute;
        top: -2px;
        left: -2px;
        background-size: 400%;
        z-index: -1;
        filter: blur(5px);
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        animation: glowing 20s linear infinite;
        opacity: 0;
        transition: opacity .3s ease-in-out;
        border-radius: 10px;
    }

    .glow-on-hover:active {
        color: #000
    }

    .glow-on-hover:active:after {
        background: transparent;
    }

    .glow-on-hover:hover:before {
        opacity: 1;
    }

    .glow-on-hover:after {
        z-index: -1;
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: #111;
        left: 0;
        top: 0;
        border-radius: 10px;
    }

    @keyframes glowing {
        0% {
            background-position: 0 0;
        }

        50% {
            background-position: 400% 0;
        }

        100% {
            background-position: 0 0;
        }
    }
</style>
@endsection

@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Eliminar </p>
</div>
<div class="cards" style="margin-left: 30%; margin-top: 10%;">
    <div class="col-md-4">
        <div class="card" style="width: 200%; height: 50%;">
            <div class="user-img">
                <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'doctor.png' }}"
                    width="150" alt="">
            </div>
            <span class="user-name">{{ $product->name }}</span>
            <span class="user-tittle">{{ $product->category }}</span>
            <hr>
            <div class="col-md-3" >
                <span class="education">Precio</span>
            </div>
            <div class="col-md-9">
                <span style="font-size: 11px" class="schools">{{ $product->price }}</span>
            </div>
        </div>
        {!! Form::open(['method'=>'DELETE', 'action'=>['productsController@destroy', $product->id]]) !!}
        @csrf
        <button type="submit" class="glow-on-hover" style="margin-left: 45%;">
            Delete Product
        </button>
        {!! Form::close() !!}
    </div>
</div>
@endsection
@endauth
