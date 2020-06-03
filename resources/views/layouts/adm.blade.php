<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AlloDoc') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h4 class="my-0 mr-md-auto font-weight-normal" href="{{ url('/admin') }}" >AlloDoc</h4>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-4 text-dark" style="font-size:18px" href="{{ route('lemedecin.index') }}">Gestion des medecins</a>
          <a class="p-4 text-dark" style="font-size:18px" href="{{ route('userpatient.index')}}">Gestion des patients</a>
          <a class="p-4 text-dark" style="font-size:18px" href="/">Gestion des secretaires</a>
          <a class="p-4 text-dark" style="font-size:18px" href="/profil">Mon compte</a>

          <a class="p-4 text-dark" style="font-size:18px" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
          </a> 
       <form id="logout-form" action="{{ route('logout') }}" method="POST" >
           @csrf
       </form>

    </div>
    <main class="py-4">
        @yield('content')
    </main>
</body>