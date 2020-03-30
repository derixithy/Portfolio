@extends('layouts.prototype')


@section('heading')
	<div class="heading">
		<h1>@yield('page-title', 'Administation')</h1>
	</div>
@endsection


@section('main')
	@hasSection('aside')
		<div grid>
			<main column="eight" offset="one">
				<section>
	                <header>
	                    <h2>@yield('page-title', 'Undefined')</h2>
	                </header>
	                
					@yield('content')
				</section>
			</main>
			<aside class="margin-top-large padding-top-medium" columns="three">
				@yield('aside')
			</aside>
		</div>
	@else
		<main>
			<section>
                <header>
                    <h2>@yield('page-title', 'Undefined')</h2>
                </header>

				@yield('content')
			</section>
		</main>
	@endif
@endsection