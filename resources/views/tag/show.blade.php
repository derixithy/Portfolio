@extends('project.listing')

@section('page-title', "Tagged: $page->title")

@section('content')
@if( $pages->count() < 0)
	<article>
		<span class="tags">
			@foreach($page->pages as $tag)
			<a href="/tagged/{{$tag->name}}">{{ $tag->title }}</a>
			@endforeach
		</span>
	</article>
@endif
@endsection