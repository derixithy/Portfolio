@extends('layouts.prototype')


@section('heading')
	<div class="heading">
		<h1>@yield('page-title', 'Administation')</h1>
	</div>
@endsection


@section('main')
	@hasSection('aside')
		<div grid>
			<main column="six" offset="two">
				@yield('content')
			</main>
			<aside columns="four">
				@yield('aside')
			</aside>
		</div>
	@else
		<main>
			@yield('content')
		</main>
	@endif
@endsection