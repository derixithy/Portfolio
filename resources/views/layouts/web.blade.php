<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('page-title', 'Undefined') - {{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/base.css') }}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

    <!-- Icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		<div class="home hide-on-mobile">
			<a href="{{ url('/') }}"><i class="fas fa-home"></i></a>
		</div>
		<div class="menu">
			<label for="hamburger" class="burgermenu">&#9776; {{ config('app.name', 'Laravel') }}</label>
			<input type="checkbox" id="hamburger"/>
			<ul class="links">
				@foreach($menu as $page)
				<li><a href="{{ route('page', $page->name) }}" @if(isset($slug) and $slug == $page->name)class="active"@endif>{{$page->title}}</a>
				@endforeach
			</ul>
		</div>
		<div class="search hide-on-mobile">
            @auth
                    <a href="{{ route('page.index') }}"><i class="fas fa-lock"></i></a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
            @endauth
			<a href="{{ route('search') }}"><i class="fas fa-search"></i></a>
		</div>
	</nav>
	<div class="container">
		<div class="cover @yield('cover-size', '')">
			<img src="@yield('cover', 'img/werkkamer.jpg')" alt="heading">
		</div>
		<div class="heading">
			<h1>@yield('page-title', 'Undefined')</h1>
		</div>
@include('shared.errors')
@section('main')
		<main>

			@error('title')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror

			@yield('content')
		</main>
@show
	</div>
	<footer>
		<p>&copy; Copyright 2020 - Eddie Gjaltema @guest - <a href="{{ route('login') }}" class="muted">login</a> @endguest</p>
	</footer>
	@auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</body>
</html>
