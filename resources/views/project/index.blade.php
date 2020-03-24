@extends('layouts.admin')

@section('page-title', 'Projecten')

@if($pages)
	@section('content')
		<div class="grid">
			@foreach($pages as $page)
				<div class="column-8-12 mobile-column-4-6">{{$page->title}}</div>
				<div class="column-2-12 mobile-column-1-6">{{__('project.'.$page->status)}}</div>
				<div class="column-1-12 mobile-column-1-6">
					<a class="muted" href="{{route('project.edit', [$page->id])}}">Wijzig</a>
				</div>
				<div class="column-1-12 mobile-column-1-6">
					<a class="muted" href="{{route('project.show', [$page->id])}}">Bekijk</a>
				</div>
			@endforeach
		</div>
	@endsection
@endif