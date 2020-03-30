@extends('layouts.admin')

@section('page-title', 'Wijzigen')

@section('content')
<form method="POST" action="{{ route('project.update', $page->id) }}">
	@method('patch')
	@csrf
		<div grid>
			<div column="eight">
				@text([
					'title' => __('Title'),
					'name' => 'title',
					'focus' => true,
					'required' => true,
					'value' => $page->title,
				])
			</div>
			<div column="four">
				@text([
					'title' => __('Slug'),
					'name' => 'name',
					'required' => true,
					'value' => $page->name,
				])
			</div>
		</div>
	@textarea([
		'title' => __('Inhoud'),
		'name' => 'content',
		'required' => true,
		'value' => $page->content,
	])
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
@section('aside')
	<ul class="menu">
		<li class="title">Status</li>
		@if( $page->status != 'ACTIVE' )
			<li>
				<a href="#" onclick="event.preventDefault(); updateStatus('ACTIVE');">Bezig</a>
			</li>
		@endif
		@if( $page->status != 'INACTIVE' )
			<li>
				<a href="#" onclick="event.preventDefault(); updateStatus('INACTIVE');">Gestopt</a>
			</li>
		@endif
		@if( $page->status != 'DONE' )
			<li>
				<a href="#" onclick="event.preventDefault(); updateStatus('DONE');">Klaar</a>
			</li>
		@endif
		@if( $page->status != 'DRAFT' )
			<li>
				<a href="#" onclick="event.preventDefault(); updateStatus('DRAFT');">Concept</a>
			</li>
		@endif
		@if( $page->status != 'DELETED' )
			<li>
				<a href="#" onclick="event.preventDefault(); updateStatus('DELETED');">Verwijderen</a>
			</li>
		@endif
		<li class="title">Wijzig</li>
		<li><a href="#">Cover</a></li>
		<li><a href="#">Tags</a></li>
	</ul>
@endsection

@section('footer')
	@parent('footer')
<form id="update" method="POST" style="display: none;" action="{{ route('project.update', $page->id) }}">
	@csrf
	@method('patch')

	@hidden([
		'name' => 'status',
		'value' => 'ACTIVE'
	])
</form>
<script type="text/javascript">
	function updateStatus($status) {
		 document.getElementById('status').value = $status;
		 document.getElementById('update').submit();
	}
</script>
@endsection