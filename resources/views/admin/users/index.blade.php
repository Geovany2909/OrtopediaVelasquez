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
    {{ Form::open(['route' => 'users.index', 'method' => 'GET', 'class' => 'form-buscar']) }}
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
                        FOTO
                    </th>
                    <th>
                        NOMBRE
                    </th>
                    <th>
                        CORREO
                    </th>
                    <th>
                        CREADO&nbsp;&nbsp;&nbsp;&nbsp;
                    </th>
                    <th>
                        ACTUALIZADO
                    </th>
                    <th>
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if ($user->id != auth()->user()->id)
                        <tr>
                            <td><img src="/images/users/{{ $user->photo }}" alt="" width="130" height="130"></td>
                            <td> {{ $user->name }}</td>
                            <td> {{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans()}}</td>
                            <td>{{ $user->updated_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="action green"><i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="{{ route('users.show', $user->id) }}" class="action red"><i class="fa fa-trash-o"
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
