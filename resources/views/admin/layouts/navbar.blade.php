<section id="sideMenu">
    <h3 class="tittle">Ortopedia<span> Velasquez</span></h3>
    <nav>
        <a href="{{ route('home') }}" class="active"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
        <a href="{{ route('products.index') }}"><i class="fa fa-folder-open" aria-hidden="true"></i>Admin Producto</a>
        <a href="{{ route('galery') }}"><i class="fa fa-picture-o" aria-hidden="true"></i>
            Galeria</a>
        <a href="{{ route('products.create') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i>Agregar Producto</a>
        <a href="{{ route('users.index') }}"><i class="fa fa-address-card-o" aria-hidden="true"></i>Admin
            Usuarios</a>
        <a href="{{ route('users.create') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Agregar Usuarios</a>
        <a href="{{ route('userInfo', auth()->user()->id) }}"><i class="fa fa-cog"
                aria-hidden="true"></i>Configuracion</a>
    </nav>
</section>


<header>
    <div class="search-area">
        @yield('buscar')
    </div>
    <div class="user-area">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            <div class="user-img"></div>
        </a>
    </div>
</header>
