<div class="navigation">
    <ul>
        <li>
            <a href="{{ route('inicio') }}">
                <span class="icon">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </span>
                <span class="title">Principal</span>
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}">
                <span class="icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </span>
                <span class="title">Inicio</span>
            </a>
        </li>
        <li>
            <a href="{{ route('products.index') }}">
                <span class="icon"><i class="fa fa-folder-open-o" aria-hidden="true"></i></span>
                <span class="title">Admin Products</span>
            </a>
        </li>
        <li>
            <a href="{{ route('galery') }}">
                <span class="icon"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
                <span class="title">Galery</span>
            </a>
        </li>
        <li>
            <a href="{{ route('products.create') }}">
                <span class="icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></span>
                <span class="title">Agregar Producto</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}">
                <span class="icon"><i class="fa fa-users" aria-hidden="true"></i></span>
                <span class="title">Admin Usuarios</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.create') }}">
                <span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span>
                <span class="title">Agregar Usuarios</span>
            </a>
        </li>
        <li>
            <a href="{{ route('userInfo', auth()->user()->id) }}">
                <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                <span class="title">Configuracion</span>
            </a>
        </li>
        <li>
            <a href="href=" {{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class=" icon">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                </span>
                <span class="title">Sing Out</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</div>
<div class="toggle" onclick="toggleMenu()"></div>


<header>
    <div class="search-area">
        @yield('buscar')
    </div>
</header>
