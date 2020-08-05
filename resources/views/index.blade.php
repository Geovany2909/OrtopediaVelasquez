@extends('layouts.schema')
@section('title')
Inicio
@endsection
@section('navbar')
@guest
<a href="{{ count($user) > 0 ? route('login') : route('register') }}">
    {{ count($user) > 0 ? '' : 'Registrar' }}
</a>
@endguest
@endsection
@section('content')

        <div class="section">
            <div class="bienvenida">
                <img class="home__img" src="{{ asset('inicio/img/logo.png') }}" alt="">
                <p class="home__txt"> <span>Ortopedia</span> Velasquez </p>
                <hr class="home__txt">
                <p class="home__text"> Carrer de l'Engenier José Sirera 2 Avenida Cr Tomás Sala con Calle Soria. 46017 València Valencia</p>
                <hr class="home__txt">
                <p class="home__text"> 960 05 57 68</p>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="informacion">
        <div class="title home__text">
            <p>Estamos comprometidos con tu bienestar!!</p>
        </div>
        <div class="box home__data">
            Venta de Camas articuladas y accesorios para la Movilidad Reducida. Calidad y servicio. Ayudas técnicas.
            Soluciones personalizadas. Tipos: Sillas de ruedas, Andador, Camas articuladas, Sillas eléctricas, Grúas
            elevadoras, Rampas, Ayudas de baño.
        </div>
        <div class="box home__data">
            ¿Estás buscando una de las mejores ortopedias en Valencia? Sin duda somos una ortopedia técnica
            especializada en ayudas para la movilidad y el cuidado de enfermos en todos los casos; y una referencia
            dentro del sector de ortopedias baratas en Valencia.
        </div>
        <div class="box home__data">
            En Ortopedia Velásquez estamos comprometidos con tu bienestar por encima de todo y para ello nos hemos
            especializado en atender las necesidades de nuestros clientes que hayan sufrido lesiones, algún accidente, o
            bien padezcan una enfermedad o cualquier secuela a posterior o problema de salud que pueda interferir ello
            en su capacidad de movilidad.
        </div>
    </div>
</div>

<div class="section">
    <div class="informacion">
        <div class="title">
            <p class="home__text">Nos hemos especializado también en ayudas técnicas para lesiones deportivas</p>
            <p class="home__text">Las lesiones más habituales que se producen al hacer deporte son las siguientes:</p>
        </div>
        <div class="content">
            <div class="box-p home__data">
                <p>Tendinitis Rotulina</p>
            </div>
            <div class="box-p home__data">
                <p>Cintilla ilitobial</p>
            </div>
            <div class="box-p home__data">
                <p>Fascitis plantar</p>
            </div>
            <div class="box-p home__data">
                <p>Sindrome del piramidal</p>
            </div>
            <div class="box-p home__data">
                <p>Hombro inestable</p>
            </div>
            <div class="box-p home__data">
                <p>Epicondilitis</p>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
