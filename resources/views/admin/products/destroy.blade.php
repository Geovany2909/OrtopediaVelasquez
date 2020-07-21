@auth
@extends('admin.layouts.schema')
@section('title')
Galery
@endsection
@section('css')
<style>
    .main-menu {
        width: 100%;
        margin: auto;
        margin-top: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .main-menu a{
        cursor: default;
    }

    .main-menu .option{
        width: 300px;
        height: 400px;
        margin: 20px;
        background: #fff;
        text-align: center;
        border-radius: 5px;
        cursor: pointer;
        transition: all 300ms;
    }

    .option img{
        width: 100%;
        height: 50%;
    }

    .option div{
        background-color: #fff;
    }

    .option h2{
        font-size: 30px;
        margin-top: 10px;
        font-weight: 600;
        letter-spacing: 1px;
        color: #006992;
    }

    .option div{
        margin-top: 20px;
    }

    .option p{
        margin-top: 10px;
        font-size: 18px;
        color: #5a5a6e;
        font-weight: 300;
    }

    .option p span{
        font-size: 18px;
        padding: 5px;
        background: #eca400;
        color: #fff;
        font-weight: 300;
    }

    .option button{
        margin-top: 10px;
        margin-bottom: 10px;
        padding:8px 25px;
        font-family:'Montserrat',sans-serif;
        border:2px solid #6FA61C;
        background:0;
        color:#5a5a6e;
        cursor:pointer;
        transition:all .3s;
    }

    .option button:hover{
        background:#6FA61C;
        color:#fff
    }
</style>
@endsection

@section('content')
    <div class="heading">
        <h1>Dashboard/Eliminar</h1>
    </div>
    <div class="main-menu">
        <div class="option">
            <img class="imagen" src="/images/products/{{ $product->photo ? $product->photo : 'ortesis.jpg' }}">
            <h2>{{ $product->name }}</h2>
            <div>
                <p>{{ $product->category }}</p>
                <p>Precio: <span>$ {{ $product->price }}</span></p>
                {!! Form::open(['method'=>'DELETE', 'action'=>['productsController@destroy', $product->id]]) !!}
                @csrf
                <button type="submit">Eliminar Producto</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@endauth
