@auth
@extends('admin.layouts.schema')

@section('title')
Crear Producto
@endsection

@section('css')
{{-- <style>
    body {
        margin: 0
    }

    .formCreate {
        width: 340px;
        height: 440px;
        background: #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 0 40px -10px #000;
        margin: calc(50vh - 220px) auto;
        padding: 20px 30px;
        max-width: calc(100vw - 40px);
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
        position: relative
    }

    h2 {
        margin: 10px 0;
        padding-bottom: 10px;
        width: 220px;
        color: #78788c;
        border-bottom: 3px solid #78788c
    }

    .form-input-css {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        background: none;
        outline: none;
        resize: none;
        border: 0;
        font-family: 'Montserrat', sans-serif;
        transition: all .3s;
        border-bottom: 2px solid #bebed2
    }


    .form-input-css:focus {
        border-bottom: 2px solid #78788c
    }

    p:before {
        content: attr(type);
        display: block;
        margin: 28px 0 0;
        font-size: 14px;
        color: #5a5a5a
    }

    button {
        float: right;
        padding: 8px 12px;
        margin: 8px 0 0;
        font-family: 'Montserrat', sans-serif;
        border: 2px solid #78788c;
        background: 0;
        color: #5a5a6e;
        cursor: pointer;
        transition: all .3s
    }

    button:hover {
        background: #78788c;
        color: #fff
    }


    span {
        margin: 0 5px 0 15px
    }
</style> --}}
@endsection
@section('content')
{{-- <form class="formCreate">
    <h2>Crear Productos</h2>
    <p type="Name:"><input  class="form-input-css" placeholder="Write your name here.."></input></p>
    <p type="Email:"><input class="form-input-css"  placeholder="Let us know how to contact you back.."></input></p>
    <p type="Message:"><input class="form-input-css" placeholder="What would you like to tell us.."></input></p>
    <button>Send Message</button>
</form> --}}
@endsection
@endauth
