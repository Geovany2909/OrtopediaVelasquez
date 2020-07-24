@extends('layouts.schema')
@section('name')
@endsection
@section('title')
Productos
@endsection
@section('content')
<!-- Informacion introductoria -->
<div class="section">
    @if ($lastProduct)
    <section class="about">
        <div class="img">
            <img src="/images/products/{{ $lastProduct->photo }}" alt="casco">
        </div>
        <div class="cont">
            <h2 class="heading">{{ $lastProduct->name }}</h2>
            <p class="txt">
                {{ $lastProduct->description }}
            </p>
            <br>
            <a href="#" class="btn btn3">MAS INFO</a>
        </div>
    </section>
    @endif
</div>

<!-- Productos -->
<div class="section">
    <section class="prod">
        <h2 class="heading">Productos Disponibles</h2>
        <div class="container">
            @foreach ($products as $p)
                <div class="prodBx">
                    <div>
                        <a href="#">
                            <img src="/images/products/{{ $p->photo }}" >
                        </a>
                        <h2>{{ $p->name }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
