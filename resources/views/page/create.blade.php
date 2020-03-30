@extends('layouts.admin')

@section('page-title', 'Nieuw pagina')

@section('content')
<div class="grid">
	<div class="offset-1-6 column-4-6">
		<form class="form" method="POST" action="{{ route('page.store') }}">
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
	</div>
</div>
@endsection
