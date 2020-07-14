@auth
@extends('admin.layouts.schema')
@section('title')
Home
@endsection
@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Bienvenido a Ortopedia Velasquez Admin</p>
</div>

<div class="cards" style="margin-top: 5%;">
    <div class="col-md-4">
        <div class="card">
            <div class="user-img">
                <img class="imagen" src="/images/users/{{ auth()->user()->photo ? auth()->user()->photo : 'doctor.png' }}"
                    width="150" alt="">
            </div>
            <span class="user-name">{{ auth()->user()->name }}</span>
            <span class="user-tittle">Administrador General</span>
            <hr>
            <div class="col-md-3">
                <span class="education">Email</span>
            </div>
            <div class="col-md-9">
                <span style="font-size: 11px" class="schools">{{ auth()->user()->email }}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="calendar">
                <p id="monthName"></p>
                <p id="dayName"></p>
                <p id="dayNumber"></p>
                <p id="year"></p>
            </div>
        </div>
    </div>
</>
@endsection
@endauth
