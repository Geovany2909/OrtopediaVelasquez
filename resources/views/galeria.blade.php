@extends('layouts.schema')
@section('name')
@endsection
@section('title')
Galeria
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/galery2.css') }}">
<style>

</style>
@endsection
@section('content')
<!-- Productos -->
<div class="section">
    <section class="prod">
        <h2 class="heading">Galeria</h2>
        <div class="main-menu">
            @foreach ($products as $product)
            <div>
                <a href="javascript:void(0);" onclick="fun_edit({{$product -> id}})">
                    <div class="option">
                        <img src="/images/products/{{ $product->photo }}" id="nodoCopia">
                    </div>
                </a>
            </div>
            @endforeach

            {{-- Modal de la imagen --}}
            <div id="tvesModal" class="modalContainer">
                <div class="modal-content">
                    <span class="close">×</span>
                    <h1 id="nombre"></h1>
                    <img id="imagen">
                </div>
            </div>
        </div>
    </section>
</div>
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function fun_edit(id)
    {
    $.get('/galery/' + id, function (data) {
        let modal = document.getElementById("tvesModal");
        let span = document.getElementsByClassName("close")[0];
        let body = document.getElementsByTagName("body")[0];

        $("#nombre").text(data.name);
        $("#imagen").attr('src', 'images/products/'+ data.photo);
        
        modal.style.display = "block";
        body.style.position = "static";
        body.style.height = "100%";
        body.style.overflow = "hidden";

        span.onclick = function() {
        modal.style.display = "none";

        body.style.position = "inherit";
        body.style.height = "auto";
        body.style.overflow = "visible";
        }

        window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";

                    body.style.position = "inherit";
                    body.style.height = "auto";
                    body.style.overflow = "visible";
                }
            }
      });
    }
</script>
@endsection
@endsection
