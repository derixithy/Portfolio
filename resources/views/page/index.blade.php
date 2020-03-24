@extends('layouts.admin')

@section('page-title', 'Pagina\'s')

@if($pages)
	@section('content')
	<div class="grid form">
		<div class="column-12-12 float-right">
			@button([
				'title' => 'Nieuw',
				'type' => 'accent',
				'href' => route('page.create')
			])
		</div>
	</div>
		<div class="grid">
			@foreach($pages as $page)
				<div class="column-8-12 mobile-column-4-6">{{$page->title}}</div>
				<div class="column-2-12 mobile-column-1-6">{{__('page.'.$page->status)}}</div>
				<div class="column-1-12 mobile-column-1-6">
					<a class="muted" href="{{route('page.edit', [$page->id])}}">Wijzig</a>
				</div>
				<div class="column-1-12 mobile-column-1-6">
					<a class="muted" href="{{route('page.show', [$page->id])}}">Bekijk</a>
				</div>
			@endforeach
		</div>
	@endsection
@endif