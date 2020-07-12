@auth
@extends('admin.layouts.schema')
@section('title')
Crear Productos
@endsection
@section('css')
<style>
    .pagination li {
        vertical-align: top;
        display: inline;
        font-size: 1.2em;
        padding: 0.5em;
    }

    li a {
        color: #000;
        width: 100%;
        border-radius: 20%;
    }
</style>
@endsection
@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Productos Admin</p>
</div>
<div class="col-md-12">
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th>
                        NOMBRE
                    </th>
                    <th>
                        PRECIO
                    </th>
                    <th>
                        DESCRIPCION
                    </th>
                    <th>
                        CATEGORIA
                    </th>
                    <th>
                        CREADO
                    </th>
                    <th>
                        ACTUALIZADO
                    </th>
                    <th>
                        ACCION
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $p)
                <tr>
                    <td><span class="logo">{{ $p->id }}</span> {{ $p->name }}</td>
                    <td>${{ $p->price }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $p->category }}</td>
                    <td>{{ $p->created_at->diffForHumans()}}</td>
                    <td>{{ $p->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('products.edit', $p->id) }}" class="action green"><i
                                class="fa fa-pencil-square" aria-hidden="true"></i></a>
                        <a href="{{ route('products.show', $p->id) }}" class="action red"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                @section('empty')
                <h2 class="color:red;"> No Hay productos</h2>
                @endsection
                @endforelse

            </tbody>
        </table>

        {{ $products->links() }}

    </div>
</div>
@endsection
@endauth
