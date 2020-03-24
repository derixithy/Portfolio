@extends('layouts.hybrid')


@section('heading')
	<div class="heading">
		<h1>@yield('page-title', 'Administation')</h1>
	</div>
@endsection


@section('main')
	@hasSection('aside')
		<div class="grid">
			<main class="column-8-12">
				@yield('content')
			</main>
			<aside class="column-4-12">
				@yield('aside')
			</aside>
		</div>
	@else
		<main>
			@yield('content')
		</main>
	@endif
@endsection