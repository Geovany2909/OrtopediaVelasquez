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
        <div class="img" oncontextmenu="return false;">
            <img src="/images/products/{{ $lastProduct->photo }}" alt="casco">
        </div>
        <div class="cont">
            <h2 class="heading">{{ $lastProduct->name }}</h2>
            <p class="txt">
                {{ $lastProduct->description }}
            </p>
            <br>
            <a href="{{ route('viewOnlyProduct', $lastProduct->id) }}" class="btn btn3">MAS INFO</a>
        </div>
    </section>
    @endif
</div>

<!-- Productos -->
<div class="section">
    <section class="prod">
        <h2 class="heading">Productos Disponibles</h2>
        <form action="javascript:void(0)">
            <i class="fa fa-search" aria-hidden="true"></i>
            <select id="category">
                <option value="">Seleccione una opcion</option>
                <option value="all">Todas las categorias</option>
                <option value="Ortesis">{{ old('category', 'Ortesis') }}</option>
                <option value="Ortesis inferior">Ortesis inferior</option>
                <option value="Protesis Superior">Protesis Superior</option>
                <option value="Protesis Inferior">Protesis Inferior</option>
            </select>
        </form>
        <div class="container" id="oculto">
            @forelse ($products as $p)
            <div class="prodBx">
                <div>
                    <img src="/images/products/{{ $p->photo }}">
                    <h2>{{ $p->name }}</h2>
                </div>
            </div>
            @empty
            <p style="text-align: center; color:red;">No hay productos con esta categoria</p>
            @endforelse
        </div>
        <div class="container iterar">
        </div>
        <h1 id="mensaje" style="display: none; color:red;">No hay productos con esta categoria</h1>
    </section>
</div>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    let mensaje = $('#mensaje');
    $.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$("#category").change(function (e) {
    document.getElementById('oculto').style.display = 'none';
    let mensaje = $("#mensaje");
    $('.iterar').html("");
    let category = $(this).val();

    if(category === "all"){
        $.get("/products", function (data) {
        if(data.length === 0){
            mensaje.css("display", "block");
        }else{
            $.each(data, function(i, item) {
                mensaje.css("display", "none");
                myString =
                    `<div class='prodBx'>
                        <div>
                            <img src='/images/products/${item.photo}'>
                            <h2>${item.category}</h2>
                        </div>
                    </div>`;
                $('.iterar').append(myString);

            });
        }
    });
    }else{
        $.get("/products/" + category, function (data) {
            if(data.length === 0){
                mensaje.css("display", "block");
            }else{
                $.each(data, function(i, item) {
                    mensaje.css("display", "none");
                    myString =
                        `<div class='prodBx'>
                            <div>
                                <img src='/images/products/${item.photo}'>
                                <h2>${item.category}</h2>
                            </div>
                        </div>`;
                    $('.iterar').append(myString);

                });
            }
        });
    }
});

</script>
@endsection
@endsection
