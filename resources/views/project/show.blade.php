@extends('layouts.hybrid')

@section('page-title', $page->title)
@section('cover', $page->cover)

@section('content')
	<article>
		<div class="text">
			{!! nl2br($page->content) !!}
		</div>
	</article>
@endsection