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
        background-color: thistle;
        border-radius: 20%;
    }
</style>
@endsection
@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Usuarios Admin</p>
</div>
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
                @forelse ($users as $user)
                    @if ($user->id != auth()->user()->id)
                    <tr>
                        <td><img src="/images/users/{{ $user->photo }}" alt="" width="150"></td>
                        <td> {{ $user->name }}</td>
                        <td>    {{ $user->email }}</td>
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
                @empty
                @section('empty')
                <h1 style="color: red;">NO HAY USUARIOS</h1>
                @endsection
                @endforelse
            </tbody>
        </table>

        {{ $users->links() }}

    </div>
</div>
@endsection
@endauth
