@extends('layouts.prototype')

@section('page-title', $page->title)
@section('cover', url('cover/'.basename($page->cover)))

@section('content')
	<article>
		<div class="text">
			@markdown($page->content)
		</div>
	</article>
@endsection