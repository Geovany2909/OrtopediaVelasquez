
@extends('admin.layouts.schema')
@section('title')
Home
@endsection
@section('css')
<style>
    .headText{
        margin-bottom: 5%;
        color: black;
    }
    .carta {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        background-color: #fff;
        transition: 0.3s;
        width: 80%;
        margin: 0 auto;
        margin-top: 10%;
    }

    .carta:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .contenedor {
        padding: 2px 16px;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 2px 2px;
        cursor: pointer;
    }

    .button:hover {opacity: 1; background-color: cyan;}

    .button1 { background-color: white; color: black;border: 2px solid #008CBA;}
</style>
@endsection

@section('content')
<div class="heading">
    <h1>Dashboard</h1>
    <p>Bienvenido a Ortopedia Velasquez Admin</p>
</div>
<div class="carta">
    <div class="contenedor">
        <h4 class="headText">{{ __('Verify Your Email Address') }}</h4>
        @if (session('resent'))
        <div style="background: green;">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}
            {{-- <button type="submit" style="background-color: deepskyblue; ">{{ __('click here to request another') }}</button>.
            --}}
            <button type="submit" class="button button1">
                <span>{{ __('click here to request another') }}!!</span>
            </button>
        </form>
    </div>
</div>
@endsection
