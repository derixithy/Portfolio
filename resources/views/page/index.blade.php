@extends('layouts.admin')

@section('page-title', $page->title)

@if($projects)
@section('main')
	<main class="grid">
		<article class="column-12-12 margin-huge-bottom">
			<p class="padding-small-bottom">{{$page->content}}</p>
		</article>

		<ul>
		@foreach($pages as $page)
			<li>{{$page->title}}</li>
		@endforeach
		</ul>
	</main>
@endsection
@endif
@section('content')
<article>
	{{ $page->content }}
</article>
@endsection