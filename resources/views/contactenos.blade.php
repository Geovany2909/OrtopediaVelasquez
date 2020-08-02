@extends('layouts.schema')
@section('title')
Contactenos
@endsection

@section('content')
<!--Contactanos-->
</div>
<div class="section" style="display: flex; margin: 0 auto;">
    <section class="about2">
        <div class="img2"></div>
        <div class="cont2">
            <h2 class="heading2">Contactanos</h2>
            <form action="{{ route('sendEmail')}}" method="post" class="form"">
                @csrf
                <div class=" inputBx">
                    <input value="{{ old('name') }}" type="text"  name="name" placeholder="Nombre completo">
                    @error('name')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputBx">
                    <input value="{{ old('email') }}" type="text" name="email" placeholder="Correo Electronico">
                    @error('email')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputBx">
                    <input value="{{ old('phone') }}" type="text" name="phone" placeholder="Telefono">
                    @error('phone')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputBx">
                    <input value="{{ old('comment') }}" type="text" name="comment" placeholder="Comentario">
                    @error('comment')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputBx">
                    {!! htmlFormSnippet() !!}
                    @error('g-recaptcha-response')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inputBx">
                    <input type="submit" value="Enviar Ahora">
                </div>
            </form>
    </div>
</section>
</div>
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
@section('js')
<script>

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
@endsection

