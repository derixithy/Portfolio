@extends('layouts.admin')

@section('page-title', 'Wijzigen')

@section('content')
<form class="form" method="POST" action="{{ route('page.update', $page->id) }}">
	@method('patch')
	@csrf
	<div class="grid">
		<div class="column-9-12">
			@text([
				'title' => __('Title'),
				'name' => 'title',
				'focus' => true,
				'required' => true,
				'value' => $page->title,
			])
		</div>
		<div class="column-3-12">
			@text([
				'title' => __('Slug'),
				'name' => 'name',
				'required' => true,
				'value' => $page->name,
			])
		</div>
	</div>
	<div class="grid">
		<div class="column-12-12">
			@textarea([
				'title' => __('Inhoud'),
				'name' => 'content',
				'required' => true,
				'value' => $page->content,
			])
		</div>
		<div class="offset-8-12 column-2-12">
			@button([
				'title' => 'Verwijder',
				//'type' => 'warning',
				'href' => route('page.destroy', $page)
			])
		</div>
		<div class="column-2-12">
			@submit([
				'title' => 'Opslaan'
			])
		</div>
	</div>
</form>
@endsection
@section('aside')
	<ul class="menu">
		<li class="title">Status</li>
		@switch( $page->status)
			@case('DRAFT')
				<li>
					<a onclick="event.preventDefault(); document.getElementById('public').submit();">Publiceer</a>
				</li>
				<li>
					<a onclick="event.preventDefault(); document.getElementById('destroy').submit();">Verwijderen</a>
				</li>
				@break

			@case('DELETED')
				<li>
					<a onclick="event.preventDefault(); document.getElementById('public').submit();">Publiceer</a>
				</li>
				<li>
					<a onclick="event.preventDefault(); document.getElementById('draft').submit();">Concept</a>
				</li>
				@break

			@default
				<li>
					<a onclick="event.preventDefault(); document.getElementById('draft').submit();">Concept</a>
				</li>
				<li>
					<a onclick="event.preventDefault(); document.getElementById('destroy').submit();">Verwijderen</a>
				</li>
				@break
		@endswitch
		<li class="title">Status</li>
		<li><a href=""></li>
@endsection

@section('footer')
	@parent('footer')
<form id="public" method="POST" action="{{ route('page.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'PUBLISHED'
	])

	@hidden([
		'name' => 'name',
		'value' => $page->name,
	])
	@hidden([
		'name' => 'title',
		'value' => $page->title,
	])
	@hidden([
		'name' => 'content',
		'value' => $page->content,
	])
</form>
<form id="draft" method="POST" action="{{ route('page.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'DRAFT'
	])

	@hidden([
		'name' => 'name',
		'value' => $page->name,
	])
	@hidden([
		'name' => 'title',
		'value' => $page->title,
	])
	@hidden([
		'name' => 'content',
		'value' => $page->content,
	])
</form>
<form id="destroy" method="POST" action="{{ route('page.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'DELETED'
	])

	@hidden([
		'name' => 'name',
		'value' => $page->name,
	])
	@hidden([
		'name' => 'title',
		'value' => $page->title,
	])
	@hidden([
		'name' => 'content',
		'value' => $page->content,
	])
</form>
@endsection