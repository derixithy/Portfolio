<!doctype html>
<html>
<head>
	<title>@yield('page-title', 'Undefined') - Portfolio Eddie Gjaltema</title>
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/css/base.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		<div class="home hide-on-mobile">
			<a href="/"><i class="fas fa-home"></i></a>
		</div>
		<div class="menu">
			<label for="hamburger" class="burgermenu">&#9776; Portfolio</label>
			<input type="checkbox" id="hamburger"/>
			<ul class="links">
				@foreach(\App\Page::published()->get() as $page)
				<li><a href="{{ route('page', $page->name) }}" @if(isset($slug) and $slug == $page->name)class="active"@endif>{{$page->title}}</a>
				@endforeach
			</ul>
		</div>
		<div class="search hide-on-mobile">
            @guest
                    <a href="{{ route('login') }}"><i class="fas fa-fingerprint"></i></a>
            @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"><i class="fas fa-user-plus"></i></a>
                @endif
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
            @endguest
			<a href="{{ route('search') }}"><i class="fas fa-search"></i></a>
		</div>
	</nav>
	<ul class="subnav">
		@foreach( $modules as $page )
		<li><a href="{{ url('admin/'.$page->name) }}">{{ $page->title }}</a></li>
		@endforeach
	</ul>
	<div class="container">
		<div class="heading">
			<h1>@yield('page-title', 'Undefined')</h1>
		</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
		<p>&copy; Copyright 2020 - Eddie Gjaltema</p>
	</footer>
	@auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
</body>
</html>
