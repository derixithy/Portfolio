@extends('layouts.admin')

@section('page-title', 'Wijzigen')

@section('content')
<form method="POST" action="{{ route('page.update', $page->id) }}">
	@method('patch')
	@csrf
	@text([
		'title' => __('Title'),
		'name' => 'title',
		'focus' => true,
		'required' => true,
		'value' => $page->title,
	])
	@text([
		'title' => __('Slug'),
		'name' => 'name',
		'required' => true,
		'value' => $page->name,
	])
	@textarea([
		'title' => __('Inhoud'),
		'name' => 'content',
		'required' => true,
		'value' => $page->content,
	])
	@button([
		'title' => 'Verwijder',
		//'type' => 'warning',
		'href' => route('page.destroy', $page)
	])
	@submit([
		'title' => 'Opslaan'
	])
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
		<li class="title">Wijzig</li>
		<li><a href="#">Cover</a></li>
		<li><a href="#">Tags</a></li>
	</ul>
@endsection

@section('footer')
	@parent('footer')
<form id="public" method="POST" style="display: none;" action="{{ route('page.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'PUBLISHED'
	])
</form>
<form id="draft" method="POST" style="display: none;" action="{{ route('page.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'DRAFT'
	])
</form>
<form id="destroy" method="POST" style="display: none;" action="{{ route('page.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'DELETED'
	])
</form>
@endsection