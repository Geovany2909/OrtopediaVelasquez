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
        <div class="row">
            <div class="col-2" oncontextmenu="return false;">
                <img src="/images/products/{{ $lastProduct->photo }}" alt="casco">
            </div>
            <div class="col-2">
                <h2 class="heading">{{ $lastProduct->name }}</h2>
                <p class="txt">
                    {{ $lastProduct->description }}
                </p>
                <br>
                <a href="{{ route('viewOnlyProduct', $lastProduct->id) }}" class="btn btn3">MAS INFO</a>
            </div>
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
                        <a href="javascript:void(0);" oncontextmenu="return false;">
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
