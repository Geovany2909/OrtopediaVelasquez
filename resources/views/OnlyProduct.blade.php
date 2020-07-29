@extends('layouts.schema')
@section('title')
Img
@endsection
@section('css')

@endsection
@section('content')
<!-- Aca el codigo de esta seccion -->
<div class="section">
    @if ($viewOnlyProduct)
    <section class="about">
        <div>
            <img src="/images/products/{{ $viewOnlyProduct->photo }}" alt="casco">
        </div>
        <div>
            <h2>{{ $viewOnlyProduct->name}}</h2>
            <p>{{ $viewOnlyProduct->category }}</p>
            <p>{{ $viewOnlyProduct->description }}</p>
        </div>
    </section>
    @endif
</div>
@section('js')

@endsection
@endsection
