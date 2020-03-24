@extends('layouts.admin')

@section('page-title', 'Nieuw pagina')

@section('content')
<div class="grid">
	<div class="offset-1-6 column-4-6">
		<form class="form" method="POST" action="{{ route('page.store') }}">
			@csrf
			<div class="grid">
				<div class="column-9-12">
					@text([
						'title' => __('Title'),
						'name' => 'title',
						'focus' => true,
						'required' => true,
					])
				</div>
				<div class="column-3-12">
					@text([
						'title' => __('Slug'),
						'name' => 'name',
						'required' => true,
					])
				</div>
			</div>
			<div class="grid">
				<div class="column-12-12">
					@textarea([
						'title' => __('Inhoud'),
						'name' => 'content',
						'required' => true,
					])
				</div>
				<div class="offset-10-12 column-2-12">
					@submit([
						'title' => 'Opslaan'
					])
				</div>
			</div>
		</form>
	</div>
</div>
@endsection
