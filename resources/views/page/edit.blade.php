@extends('layouts.admin')

@section('page-title', 'Wijzigen')

@section('content')
<form method="POST" id="post" action="{{ route('page.update', $page->id) }}">
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
<form method="POST" id="post" action="{{ route('page.update', $page->id) }}"  enctype="multipart/form-data">
	@method('patch')
	@csrf
		<div grid>
			<div column="twelve">
				<img src="{{url('cover/'.basename($page->cover))}}" style="max-width: 100%" />
			</div>
			<div column="twelve">
	@input([
		'type' =>'file',
		'required' => true,
		'name' =>'cover',
	])
	@submit([
		'title' => 'Upload',
		'class' => 'margin-left-small float-right',
	])
		</div>
	</div>
</form>
@endsection
@section('aside')
	<ul class="menu">
		<li class="title">Status</li>
		@if( $page->status != 'PUBLISHED' )
			<li>
				<a href="#" onclick="event.preventDefault(); updateStatus('PUBLISHED');">Publiek</a>
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
<form id="update" method="POST" style="display: none;" action="{{ route('page.update', $page->id) }}">
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

// Save page on ctrl+s
document.addEventListener('keydown', e => {
  if (e.ctrlKey && e.key === 's') {
    e.preventDefault();
    document.getElementById('post').submit();
  }
</script>
@endsection