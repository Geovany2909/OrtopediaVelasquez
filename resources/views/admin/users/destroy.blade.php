@auth
@extends('admin.layouts.schema')
@section('title')
Eliminar
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('inicio/css/destroy.css') }}">
@endsection

@section('content')
<div class="heading">
    <h1>Dashboard/Eliminar</h1>
</div>
<div class="main-menu">
    <div class="option">
        <img class="imagen" src="/images/users/{{ $user->photo ? $user->photo : 'doctor.png' }}">
        <h2>{{ $user->name }}</h2>
        <div>
            <p>{{ $user->email }}</p>
            <p>Creado: <span class="span1">{{ date('d-M-Y', strtotime($user->created_at ))}}</span></p>
            {!! Form::open(['method'=>'DELETE', 'action'=>['usersController@destroy', $user->id]]) !!}
            @csrf
            <button type="submit">Eliminar ususario</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@endauth
