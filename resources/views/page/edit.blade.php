@extends('layouts.admin')

@section('page-title', $title)

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
				'title' => __('Content'),
				'name' => 'content',
				'required' => true,
				'value' => $page->content,
			])
		</div>
		<div class="column-12-12">
			@submit([
				'title' => 'Opslaan'
			])
		</div>
	</div>
</form>
@endsection
@section('aside')
	<ul class="menu">
		<li class="title">Menu</li>
		<li>change cover</li>
		<li>delete</li>
		<li>draft</li>
@endsection

@section('footer')
	@parent('footer')
@endsection