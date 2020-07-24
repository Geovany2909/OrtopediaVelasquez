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
    <section class="about" style="margin-left: 30%;">
        <div class="img"  style="width: 100%;"">
            <img src="/images/products/{{ $viewOnlyProduct->photo }}" alt="casco">
        </div>
    </section>
    <div style="text-align: center;">
        <p>{{ $viewOnlyProduct->category }}</p>
        <p>{{ $viewOnlyProduct->description }}</p>
    </div>
    @endif
</div>
@section('js')

@endsection
@endsection
