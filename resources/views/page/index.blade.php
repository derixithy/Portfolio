@extends('layouts.admin')

@section('page-title', $title)

@if($pages)
	@section('content')
		<div class="grid">
			@foreach($pages as $page)
				<div class="column-9-12 mobile-column-4-6">{{$page->title}}</div>
				<div class="column-2-12 mobile-column-1-6">{{$page->status}}</div>
				<div class="column-1-12 mobile-column-1-6">
					<a class="muted" href="{{route('page.edit', [$page->id])}}">Wijzig</a>
				</div>
			@endforeach
		</div>
	@endsection
	@if(count($deleted) < 0)
		@section('aside')
			<ul class="menu">
				<li class="title">Verwijderd</li>
				@foreach($deleted as $page)
					<li>$page->title</li>
				@endforeach
		@endsection
	@endif
@endif