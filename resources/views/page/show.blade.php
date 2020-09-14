@extends('project.listing')

@section('page-title', $page->title)
@section('cover', 'cover/'.basename($page->cover))


@section('content')
	<article>
		<div class="text">
			@markdown($page->content)
		</div>
	</article>
@endsection
