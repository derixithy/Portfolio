@extends('layouts.admin')

@section('page-title', 'Wijzigen')

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
.hide-two:nth-child(2) {
	display: none;
}

form.background {
	background: inherit;
	border: none;
}
@endsection

@section('content')
<form method="POST" id="post" class="tabcontent width-card-wide" action="{{ route('project.update', $page->id) }}" style="display:block;">
	@method('patch')
	@csrf
		<div grid>
			<div column="six">
				@text([
					'title' => __('Title'),
					'name' => 'title',
					'focus' => true,
					'required' => true,
					'value' => $page->title,
				])
			</div>
			<div column="three">
				<label for="parent">Ouder</label>
				<select id="parent" name="parent">
					@foreach( \App\Page::list()->get() as $item )
						<option value="{{$item->name}}" @if($item->name == $page->parent)selected="selected" @endif>{{$item->title}}</option>
					@endforeach
				</select>
			</div>
			<div column="three">
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
<form method="POST" id="upload" class="tabcontent width-card-wide" action="{{ route('project.update', $page->id) }}"  enctype="multipart/form-data">
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
<form method="POST" id="placement" class="tabcontent width-card-medium" action="{{ route('project.update', $page->id) }}">
	@method('patch')
	@csrf
		<div class="width-max" grid>
			<div column="eight">
				<select id="parent" name="parent">
					@foreach( \App\Page::list()->get() as $item )
						<option value="{{$item->name}}" @if($item->name == $page->name) selected @endif>{{$item->title}}</option>
					@endforeach
				</select>
			</div>
			<div column="two">
	@submit([
		'title' => 'Update',
		'class' => 'margin-left-small float-right',
	])
		</div>
	</div>
</form>
<div id="tags" class="tabcontent width-card-medium">
		<div class="width-max" grid>
			@foreach( \App\Tag::list()->get() as $item )
				<div column="four">
					{{$item->title}}
				</div>
				<div column="eight">
					<form class="background" method="POST" action="{{ route('project.update', $page->id) }}">
						@foreach($page->tags as $tag)
							@if( $tag->id == $item->id)
						@submit([
							'title' => 'Verwijder',
							'name' => 'delete',
							'class' => 'margin-left-small float-right hide-two',
							'type' => 'alert',
						])
							@endif
						@endforeach
						@submit([
							'title' => 'Toevoegen',
							'name' => 'add',
							'class' => 'margin-left-small float-right hide-two',
						])
						@hidden([
							'name' => 'tag',
							'value' => $item->id
						])
						@method('patch')
						@csrf
					</form>
				</div>
			@endforeach
		</div>
</div>
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
		<li class="tablink hide" onclick="openTab(event, 'post')">Post</li>
		<li class="tablink" onclick="openTab(event, 'upload')">Cover</li>
		<li class="tablink" onclick="openTab(event, 'placement')">Ouder</li>
		<li class="tablink" onclick="openTab(event, 'tags')">Tags</li>
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

	links = document.getElementsByClassName('tablink')
	for (i = 0; i < links.length; i++) {
		links[i].className = links[i].className.replace(" hide", "");
	}

	switchTab($tab);

	$event.currentTarget.className += " hide";
}

function switchTab( $tab ) {
	tabs = document.getElementsByClassName('tabcontent');
	for (i = 0; i < tabs.length; i++) {
		tabs[i].style.display = "none";
	}

	document.getElementById( $tab ).style.display = "block";
}
(function(){
	if (window.location.hash)

		switchTab(window.location.hash)
})
</script>
@endsection