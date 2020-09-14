@extends('layouts.admin')

@section('page-title', 'Tag Wijzigen')

@section('css')
	@parent

.tabcontent, .hide {
	display: none;
}
.tablink {
	cursor: pointer;
}
.tablink:hover {
	text-decoration: underline;
}
@endsection

@section('content')
<form method="POST" id="post" class="tabcontent width-card-wide" action="{{ route('tag.update', $tag->id) }}" style="display:block;">
	@method('patch')
	@csrf
		<div grid>
			<div column="two">
				@text([
					'title' => __('Slug'),
					'name' => 'name',
					'required' => true,
					'value' => $tag->name,
				])
			</div>
			<div column="six">
				@text([
					'title' => __('Title'),
					'name' => 'title',
					'focus' => true,
					'required' => true,
					'value' => $tag->title,
				])
			</div>
			<div column="two">
				<label for="projects">{{__('Projects')}}</label>
				<span>{{$tag->projects->count()}}</span>
			</div>
			<div column="two">
				<label for="projects">{{__('Pages')}}</label>
				<span>{{$tag->pages->count()}}</span>
			</div>
		</div>
	@submit([
		'title' => 'Opslaan',
		'class' => 'margin-left-small float-right',
	])
	@submit([
		'title' => 'Opslaan en bekijken',
		'type' => 'notify',
		'class' => 'float-right',
		'name' => 'view'
	])
	<div class="clearfix"></div>
</form>
@endsection