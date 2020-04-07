@extends('layouts.admin')

@section('page-title', 'Wijzigen')
@section('cover', url('cover/'.basename($page->cover)))

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

<form method="POST" id="post" class="tabcontent" action="{{ route('page.update', $page->id) }}" style="display:block;">
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
<form method="POST" id="upload" class="tabcontent" action="{{ route('page.update', $page->id) }}"  enctype="multipart/form-data">
	@method('patch')
	@csrf
		<div grid>
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
		<li class="tablink hide" onclick="openTab(event, 'post')">Post</li>
		<li class="tablink" onclick="openTab(event, 'upload')">Cover</li>
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
});

function openTab($event, $tab) {
	var tabs, links;
	$event.preventDefault();

	tabs = document.getElementsByClassName('tabcontent');
	for (i = 0; i < tabs.length; i++) {
		tabs[i].style.display = "none";
	}

	links = document.getElementsByClassName('tablink')
	for (i = 0; i < links.length; i++) {
		links[i].className = links[i].className.replace(" hide", "");
	}

	document.getElementById( $tab ).style.display = "block";
	$event.currentTarget.className += " hide";
}
</script>
@endsection