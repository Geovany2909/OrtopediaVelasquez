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
                    <p class="formulario__input-error">El nombre completo debe ser válido, asegurese que no ha colocado simbolos extraños o numeros.</p>
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
                            placeholder="+31636363634 o (123) 456-7890">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El numero de telefono debe de ser válido, asegurese de agregar el código postal de su país.</p>
                    @error('phone')
                    <span style="color:red; font-size:14px;">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Grupo: descripcion -->
                <div class="formulario__grupo" id="grupo__description">
                    <label for="nombre" class="formulario__label">Descripción</label>
                    <div class="formulario__grupo-input">
                        @if(isset($product))
                        <input type="text" class="formulario__input" name="comment" id="description"
                            value="{{ 'Desearía recibir información más detallada sobre'. ' '. $product->name }}">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        @else
                        <input type="text" value="{{ old('comment','Desearía recibir información más detallada sobre cascos de bebé') }}"
                            class="formulario__input" name="comment" id="description">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        @endif
                        @error('comment')
                        <span style="color:red; font-size:14px;">{{ $message }}</span>
                        @enderror
                    </div>
                    <p class="formulario__input-error">El campo descripcion solo debe contener numeros, letras y guion
                        bajo.</p>
                </div>
                <div class="formulario__grupo" id="grupo__email">
                    <div class="formulario__grupo-input" style="margin-top:15px;">
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
<script>
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	name: /^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/, // Letras y espacios, pueden llevar acentos.
	email: /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i,
	phone: /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im, // 7 a 14 numeros.
    description: /^[a-zA-ZÀ-ÿ\s]{1,500}$/
}

const campos = {
	name: false,
	email: false,
	phone: false,
    description: false,
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "name":
			validarCampo(expresiones.name, e.target, 'name');
		break;
		case "email":
			validarCampo(expresiones.email, e.target, 'email');
		break;
		case "phone":
			validarCampo(expresiones.phone, e.target, 'phone');
		break;
        case "description":
			validarCampo(expresiones.description, e.target, 'description');
		break;
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

// formulario.addEventListener('submit', (e) => {
// 	e.preventDefault();

// 	const terminos = document.getElementById('terminos');
// 	if(campos.name && campos.email && campos.phone && campos.description ){
// 		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
// 		setTimeout(() => {
// 			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
// 		}, 5000);

// 		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
// 			icono.classList.remove('formulario__grupo-correcto');
// 		});
// 	} else {
// 		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
// 	}
// });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
@endsection
