@extends('layouts.schema')
@section('name')
@endsection
@section('title')
Productos
@endsection
@section('content')
<!-- Informacion introductoria -->
    @if ($lastProduct)
        <section>
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
    </div>
</div>
    @endif

    <!-- Productos -->
    <section class="prod">
        <div class="row row-2">
            <h2>Productos Disponibles, <a href="javascript:void(0)"><small>{{ count($products) }}  Elementos en total</small></a></h2>
            <form action="javascript:void(0)">
                <select id="category">
                    <option value="">Seleccione una opcion</option>
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
            <div class="col-4">
                <img src="/images/products/{{ $p->photo }}">
                <h4>{{ $p->name }}</h4>
            </div>
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
