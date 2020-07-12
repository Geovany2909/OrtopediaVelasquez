@guest
@extends('layouts.schema')
@section('title')
Contactenos
@endsection
@section('css')
@endsection
@section('content')
<!--Contactanos-->
<div class="section">
    <section class="cont">
        <h2 class="heading">Puedes comunicarte o encontrarnos en</h2>
        <div class="contact-info">
            <div class="card">
                <i class="icon fas fa-envelope"></i>
                <div class="card-content">
                    <h3>Comunicate</h3>
                    <span>ortopediavelasquez@gmail.com</span>
                </div>
            </div>

            <div class="card">
                <i class="icon fas fa-phone"></i>
                <div class="card-content">
                    <h3>Telefono</h3>
                    <span>Telf: 640231023</span>
                </div>
            </div>

            <div class="card">
                <i class="icon fas fa-map-marker-alt"></i>
                <div class="card-content">
                    <h3>Ubicacion</h3>
                    <span>2 Avenida Cr Tomás Sala con Calle Soria. 46017 València Valencia</span>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="section">
    <section class="about">
        <div class="img2"></div>
        <div class="cont2">
            <h2 class="heading2">Contactanos</h2>
            <form action="{{ route('sendEmail')}}" method="post" class="form"">
                @csrf
                <div class=" inputBx">
                        <input type="text" name="name" placeholder="Nombre completo">
                </div>
                <div class="inputBx">
                    <input type="text" name="email" placeholder="Correo Electronico">
                </div>
                <div class="inputBx">
                    <input type="text" name="phone" placeholder="Telefono">
                </div>
                <div class="inputBx">
                    <textarea name="comment" placeholder="Comentario"></textarea>
                </div>
                <div class="inputBx">
                    <input type="submit" name="" value="Enviar Ahora">
                </div>

        </form>
</div>
</section>
</div>
@endsection
@endguest
