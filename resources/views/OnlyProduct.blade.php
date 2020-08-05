@extends('layouts.schema')
@section('title')
Cascos de bebe
@endsection
@section('content')
<!-- Aca el codigo de esta seccion -->
<div class="section">
    <section class="about">
        <h1 class="tituloP">Cascos para niños</h1>

        <ul class="galeria">
            <li><a href="#img1"><img src="/inicio/img/1.jpg"></a></li>
            <li><a href="#img2"><img src="/inicio/img/cascos/2.jpg"></a></li>
            <li><a href="#img3"><img src="/inicio/img/cascos/3.jpg"></a></li>
            <li><a href="#img4"><img src="/inicio/img/cascos/4.jpg"></a></li>
            <li><a href="#img5"><img src="/inicio/img/cascos/5.jpg"></a></li>
            <li><a href="#img6"><img src="/inicio/img/cascos/6.jpg"></a></li>
            <li><a href="#img7"><img src="/inicio/img/cascos/7.jpg"></a></li>
            <li><a href="#img8"><img src="/inicio/img/cascos/8.jpg"></a></li>
            <li><a href="#img9"><img src="/inicio/img/cascos/9.jpg"></a></li>
            <li><a href="#img10"><img src="/inicio/img/cascos/10.jpg"></a></li>
        </ul>

        <div class="modal" id="img1">
            <div class="imagen">
                <a href="#img10">&#60;</a>
                <a href="#img2"><img src="/inicio/img/1.jpg"></a>
                <a href="#img2">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img2">
            <div class="imagen">
                <a href="#img1">&#60;</a>
                <a href="#img3"><img src="/inicio/img/cascos/2.jpg"></a>
                <a href="#img3">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img3">
            <div class="imagen">
                <a href="#img2">&#60;</a>
                <a href="#img4"><img src="/inicio/img/cascos/3.jpg"></a>
                <a href="#img4">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img4">
            <div class="imagen">
                <a href="#img3">&#60;</a>
                <a href="#img5"><img src="/inicio/img/cascos/4.jpg"></a>
                <a href="#img5">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>
        <div class="modal" id="img5">
            <div class="imagen">
                <a href="#img4">&#60;</a>
                <a href="#img6"><img src="/inicio/img/cascos/5.jpg"></a>
                <a href="#img6">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img6">
            <div class="imagen">
                <a href="#img5">&#60;</a>
                <a href="#img7"><img src="/inicio/img/cascos/6.jpg"></a>
                <a href="#img7">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img7">
            <div class="imagen">
                <a href="#img6">&#60;</a>
                <a href="#img8"><img src="/inicio/img/cascos/7.jpg"></a>
                <a href="#img8">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img8">
            <div class="imagen">
                <a href="#img7">&#60;</a>
                <a href="#img9"><img src="/inicio/img/cascos/8.jpg"></a>
                <a href="#img9">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>
        <div class="modal" id="img9">
            <div class="imagen">
                <a href="#img8">&#60;</a>
                <a href="#img10"><img src="/inicio/img/cascos/9.jpg"></a>
                <a href="#img10">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>

        <div class="modal" id="img10">
            <div class="imagen">
                <a href="#img9">&#60;</a>
                <a href="#img1"><img src="/inicio/img/cascos/10.jpg"></a>
                <a href="#img1">></a>
            </div>
            <a class="cerrar" href="">X</a>
        </div>
    </section>
    <div class="button" style="margin-left: 30%;">
        <a href="{{ route('contactsCascos') }}" class="btn btn3">Contactarme con el administrador</a>
    </div>
</div>
@section('js')

@endsection
@endsection
