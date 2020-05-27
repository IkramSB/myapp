<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'AlloDoc') }}</title>
<link rel="icon" type="image/png" href="/img/favicon.png" />
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
<h4 class="my-0 mr-md-auto font-weight-normal" >AlloDoc</h4>
<nav class="my-2 my-md-0 mr-md-3">
<a class="p-4 text-dark" style="font-size:18px" href="/dossier">Mes patients</a>
<a class="p-4 text-dark" style="font-size:18px" href="/rdv">Mes rendez-vous</a>
<a class="p-4 text-dark" style="font-size:18px" href="/profil">Mon compte</a>
<a class="p-4 text-dark" style="font-size:18px" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
          </a> 
       <form id="logout-form" action="{{ route('logout') }}" method="POST" >
           @csrf
       </form>

</nav>
</div>
<img src="icon.png" width="100" height="100">
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
<h1 class="display-4">CALENDRIER</h1>
<p class="lead">Mes rendez-vous</p>
</div>
<div class="container">
<div class="card-deck mb-3 text-center">
<div class="card mb-4 shadow-sm">
<div class="card-header">
<h4 class="my-0 font-weight-normal">LUNDI</h4>
</div>
<div class="card-body">
<h1 small class="text-muted">5 rendez-vous</small></h1>
<ul class="list-unstyled mt-3 mb-4">
<li>Email support</li>
<li>Help center access</li>
</ul>
<button type="button" class="btn btn-lg btn-block btn-primary">Plus d'infos</button>
</div>
</div>
<div class="card mb-4 shadow-sm">
<div class="card-header">
<h4 class="my-0 font-weight-normal">MARDI</h4>
</div>
<div class="card-body">
<h1 small class="text-muted">3 rendez-vous</small></h1>
<ul class="list-unstyled mt-3 mb-4">
<li>Email support</li>
<li>Help center access</li>
</ul>
<button type="button" class="btn btn-lg btn-block btn-primary">Plus d'infos</button>
</div>
</div>
<div class="card mb-4 shadow-sm">
<div class="card-header">
<h4 class="my-0 font-weight-normal">MERCREDI</h4>
</div>
<div class="card-body">
<h1 small class="text-muted">3 rendez-vous</small></h1>
<ul class="list-unstyled mt-3 mb-4">
<li>Email support</li>
<li>Help center access</li>
</ul>
<button type="button" class="btn btn-lg btn-block btn-primary">Plus d'infos</button>
</div>
</div>
</div>
<div class="container">
<div class="card-deck mb-3 text-center">
<div class="card mb-4 shadow-sm">
<div class="card-header">
<h4 class="my-0 font-weight-normal">JEUDI</h4>
</div>
<div class="card-body">
<h1 small class="text-muted">3 rendez-vous</small></h1>
<ul class="list-unstyled mt-3 mb-4">
<li>Email support</li>
<li>Help center access</li>
</ul>
<button type="button" class="btn btn-lg btn-block btn-primary">Plus d'infos</button>
</div>
</div>
<div class="card mb-4 shadow-sm">
<div class="card-header">
<h4 class="my-0 font-weight-normal">VENDREDI</h4>
</div>
<div class="card-body">
<h1 small class="text-muted">4 rendez-vous</small></h1>
<ul class="list-unstyled mt-3 mb-4">
<li>Email support</li>
<li>Help center access</li>
</ul>
<button type="button" class="btn btn-lg btn-block btn-primary">Plus d'infos</button>
</div>
</div>
<div class="card mb-4 shadow-sm">
<div class="card-header">
<h4 class="my-0 font-weight-normal">SAMEDI</h4>
</div>
<div class="card-body">
<h1 small class="text-muted">6 rendez-vous</small></h1>
<ul class="list-unstyled mt-3 mb-4">
<li>Email support</li>
<li>Help center access</li>
</ul>
<button type="button" class="btn btn-lg btn-block btn-primary">Plus d'infos</button>
</div>
</div>
</div>
<main class="py-4">
@yield('content')
</main>
</body>