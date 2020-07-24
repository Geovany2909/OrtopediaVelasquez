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
    <h1>Dashboard/Usuarios</h1>
</div>
@section('buscar')
{{ Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'pone-la-clase-que-queras-para-el-form']) }}
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
                        IMAGE
                    </th>
                    <th>
                        NOMBRE
                    </th>
                    <th>
                        EMAIL
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
                @foreach ($users as $user)
                @if ($user->id != auth()->user()->id)
                <tr>
                    <td><img src="/images/users/{{ $user->photo }}" alt="" width="150" height="130"></td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans()}}</td>
                    <td>{{ $user->updated_at->diffForHumans()}}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="action green"><i
                                class="fa fa-pencil-square" aria-hidden="true"></i></a>
                        <a href="{{ route('users.show', $user->id) }}" class="action red"><i class="fa fa-trash"
                                aria-hidden="true"></i></a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
</div>
@endsection
@endauth
