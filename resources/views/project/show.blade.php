@extends('layouts.prototype')

@section('page-title', $page->title)
@section('cover', url('cover/'.basename($page->cover)))

@section('content')
	<article>
		<div class="text">
			@markdown($page->content)
		</div>
		<span class="tags">
			@foreach($page->tags as $tag)
			<a href="/tagged/{{$tag->name}}">{{ $tag->title }}</a>
			@endforeach
		</span>
	</article>
@endsection