@extends('layouts.schema')
@section('name')
@endsection
@section('title')
Productos
@endsection
@section('content')
<!-- Informacion introductoria -->
<section>
    <div class="row">
        <div class="col-2" oncontextmenu="return false;">
            <img class="home__img" src="/inicio/img/1.jpg" alt="casco">
        </div>
        <div class="col-2">
            <h2 class="tit heading">Cascos para niños</h2>
            <p class="txt">
                Si estás buscando los mejores cascos a medida en Valencia, los encontrarás con Ortopedia Velásquez.
                Contamos con un amplia experiencia ofreciendo atención personalizada y asesoramiento profesional.
                Disponemos de un amplio catálogo de productos de primera calidad, entre ellos destacamos los cascos de
                ortopedia infantil hechos totalmente a medida.
                Los cascos que ofrecemos están elaborados a partir de un escáner 3D del cráneo del bebé, y su función es
                la de corregir la forma del cráneo y ayudarlo a desarrollarse con normalidad.
            </p>
            <br>
            <div class="button">
                <a href="{{ route('viewOnlyProduct') }}" class="btn btn3">MAS INFO</a>
            </div>
        </div>
    </div>
</section>
</div>
</div>
<!-- Productos -->
<section class="prod">
    <div class="row row-2">
        <h2 class="tit">Productos Disponibles</h2>
        <h2 id="numeros">{{ count($products) }} Elementos en total</h2>
        <form action="javascript:void(0)">
            <select class="input" id="category">
                <option disabled>Seleccione una opcion</option>
                <option value="all">Todas las categorias</option>
                <option value="Ortesis">{{ old('category', 'Ortesis') }}</option>
                <option value="Ortesis inferior">Ortesis inferior</option>
                <option value="Protesis Superior">Protesis Superior</option>
                <option value="Protesis Inferior">Protesis Inferior</option>
            </select>
        </form>
    </div>
    <div class="row" id="oculto">
        @forelse ($products as $p)
        <form action="{{ route('contactsName',$p->name) }}">
            <div class="col-4 work__img">
                <img  oncontextmenu="return false;" src="/images/products/{{ $p->photo }}">
                <h4>{{ $p->name }}</h4>
                <button type='submit'>Mas Información</button>
            </div>
        </form>
        @empty
        <p style="text-align: center; color:red;">Aun no hay productos registrados</p>
        @endforelse
    </div>
    <div id="activar" style="">
        <div class="row iterar">
        </div>
    </div>
    <h1 id="mensaje" style="display: none; color:red;">No hay productos con esta categoria</h1>
</section>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('inicio/js/productsCategory.js') }}"></script>
@endsection
@endsection
