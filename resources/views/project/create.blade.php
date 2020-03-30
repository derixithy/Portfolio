@extends('layouts.admin')

@section('page-title', 'Nieuw project')

@section('content')
	<form class="form" method="POST" action="{{ route('project.store') }}">
		@csrf
		<div grid>
			<div column="eight">
				@text([
					'title' => __('Title'),
					'name' => 'title',
					'focus' => true,
					'required' => true,
				])
			</div>
			<div column="four">
				@text([
					'title' => __('Slug'),
					'name' => 'name',
					'required' => true,
				])
			</div>
		</div>
		@textarea([
			'title' => __('Inhoud'),
			'name' => 'content',
			'required' => true,
		])
		@submit([
			'title' => 'Opslaan',
			'class' => 'float-right',
		])
		<div class="clearfix"></div>
	</form>
@endsection
