<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('inicio/css/dashboard.css') }}">
    @yield('css')
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    @include('admin.layouts.navbar')

    <section id="content-area">
        @yield('content')
        <div>
            @yield('empty')
        </div>
    </section>

</body>
<script>
  const lang = navigator.language;
  let date = new Date();

  let dayNumber = date.getDate();
  let month = date.getMonth();
  let dayName = date.toLocaleDateString(lang,{weekday: 'long'});
  let monthName = date.toLocaleDateString(lang, {month: 'long'});
  let year = date.getFullYear();

  document.getElementById('monthName').innerHTML = monthName;
  document.getElementById('dayName').innerHTML = dayName;
  document.getElementById('dayNumber').innerHTML = dayNumber;
  document.getElementById('year').innerHTML = year;
</script>
@yield('js')
@include('sweetalert::alert')

</html>
