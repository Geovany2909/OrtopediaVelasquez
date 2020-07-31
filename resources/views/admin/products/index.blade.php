@auth
@extends('admin.layouts.schema')
@section('title')
Crear Productos
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/paginate.css') }}">
@endsection
@section('content')
<div class="heading">
    <h1>Dashboard/Productos</h1>
</div>
@section('buscar')
{{ Form::open(['route' => 'products.index', 'method' => 'GET', 'class' => 'pone-la-clase-que-queras-para-el-form']) }}
<i class="fa fa-search" aria-hidden="true"></i>
<input type="text" name="name" placeholder="Buscar por nombre">
<button type="submit" style="display: none">Buscar</button>
{{ Form::close() }}
@endsection

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
                <h2 style="color: red;text-align: center;margin-right: 20%;">En este momento no hay productos</h2>
                @endsection
                @endforelse

            </tbody>
        </table>

        {{ $products->links() }}

    </div>
</div>
@endsection
@endauth
