@extends('layouts.schema')
@section('title')
Contactenos
@endsection

@section('content')
<!--Contactanos-->
</div>
<div class="section" style="display: flex; margin: 0 auto;">
    <section class="about2">
        <div class="img2">
        </div>
        <div class="cont2">
            <h2 class="heading2">Contáctanos</h2>
            <form action="{{ route('sendEmail') }}" method="POST" class="formulario form" id="formulario">
                @csrf
                <!-- Grupo: Nombre -->
                <div class="formulario__grupo" id="grupo__name">
                    <label for="nombre" class="formulario__label">Nombre</label>
                    <div class="formulario__grupo-input">
                        <input type="text" value="{{ old('name') }}" class="formulario__input" name="name" id="name"
                            placeholder="John Doe">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El nombre completo debe ser válido, asegurese que no ha colocado
                        simbolos extraños o numeros.</p>
                    @error('name')
                    <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo" id="grupo__email">
                    <label for="correo" class="formulario__label">Correo Electrónico</label>
                    <div class="formulario__grupo-input">
                        <input type="email" value="{{ old('email') }}" class="formulario__input" name="email" id="email"
                            placeholder="correo@correo.com">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El correo debe contener letras, numeros, puntos, guiones y guion
                        bajo.</p>
                    @error('email')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Grupo: Teléfono -->
                <div class="formulario__grupo" id="grupo__phone">
                    <label for="telefono" class="formulario__label">Teléfono</label>
                    <div class="formulario__grupo-input">
                        <input type="text" value="{{ old('phone') }}" class="formulario__input" name="phone" id="phone"
                            placeholder="ejemplo +19292141836">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El numero de telefono debe de ser válido, asegurese de agregar el
                        código postal de su país.</p>
                    @error('phone')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Grupo: descripcion -->
                <div class="formulario__grupo" id="grupo__comment">
                    <label for="comment" class="formulario__label">Descripción</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="comment" id="comment" value="{{ isset($product) ?
                            'Desearía recibir información más detallada sobre'. ' '. $product->name :
                            'Desearía recibir información más detallada sobre cascos de bebé' }}">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El campo descripcion solo debe contener numeros, letras y guion
                        bajo.</p>
                    @error('comment')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="formulario__grupo" id="grupo__email" style="margin-top: 20px;">
                    <div class="formulario__grupo-input">
                        {!! htmlFormSnippet() !!}
                    </div>
                    @error('g-recaptcha-response')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="formulario__btn">Enviar</button>
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
                    <h3>Teléfono</h3>
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
<script src="{{ asset('inicio/js/validations.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
@endsection
