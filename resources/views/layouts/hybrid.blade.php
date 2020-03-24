<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<base href="/">
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
    <link rel="stylesheet" type="text/css" href="css/icons.css">
	<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script-->
	@yield('head')
</head>
<body>


	<nav>
		<div class="home hide-on-mobile">
			<a href="{{ url('/') }}">
				<i class="icon icon-home"></i>
			</a>
		</div>
		<div class="menu">
			<label for="hamburger" class="burgermenu title">&#9776; {{ config('app.name', 'Laravel') }}</label>
			<input type="checkbox" id="hamburger"/>
			<ul class="links">
				@foreach($menu as $link)
				<li>
					<a href="{{ route('page', $link->name) }}" @if(Route::currentRouteName() == 'page' and $page->name == $link->name) ) class="active"@endif>{{$link->title}}</a>
				@endforeach
			</ul>
		</div>
		<div class="search hide-on-mobile">
			<a href="{{ route('search') }}" class="muted">
				<i class="icon icon-magnifying"></i>
			</a>
		</div>
	</nav>
	@auth
		<ul class="subnav margin-bottom-none">
			@foreach( $modules as $name => $title)
			<li><a href="{{ route($name.'.index') }}" @if(Route::currentRouteName() == $name.'.index') class="active" @endif>{!! $title !!}</a></li>
			@endforeach
		</ul>
	@endauth


	@section('heading')
		<div class="container">
			<div class="cover @yield('cover-size', '')">
				<img src="@yield('cover', 'img/werkkamer.jpg')" alt="heading">
			</div>
			<div class="heading">
				<h1>@yield('page-title', 'Undefined')</h1>
			</div>
		</div>
	@show


	@include('shared.errors')


	@section('main')
		<main>

			@error('title')
				<div class="alert alert-danger">{{ $message }}</div>
			@enderror

			@yield('content')
		</main>
	@show


	@section('footer')
		<footer>
			<p>&copy; Copyright 2020 - Eddie Gjaltema @auth - <a href="{{ route('logout') }}" class="muted">{{__('logout')}}</a> @else - <a href="{{ route('login') }}" class="muted">{{__('login')}}</a> @endauth</p>
		</footer>
	@show


	@auth
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth


<script type="text/javascript">
	@yield('javascript')
	@hasSection('textarea')
		//auto expand textarea
		function resize(h) {
		    h.style.height = "20px";
		    h.style.height = (h.scrollHeight)+"px";
		}

		var textareas = document.getElementsByTagName("textarea");

		function init() {
			for (i = 0; i < textareas.length; i++) {
				var textarea = textareas[i];
				resize(textarea);
			}
		}

		init();
	@endif
</script>

</body>
</html>
