@extends('layouts.schema')
@section('name')
@endsection
@section('title')
Galeria
@endsection
@section('content')
<!-- Productos -->
<div class="section">
    <section class="prod">
        <h2 class="heading">Galeria</h2>
        <div class="container">
            @foreach ($products as $p)
                <div class="prodBx">
                    <div>
                        <a href="#">
                            <img src="/images/products/{{ $p->photo }}" >
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection
