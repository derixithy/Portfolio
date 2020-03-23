@extends('layouts.admin')

@section('page-title', $title)

@section('content')
<form class="form" method="POST" action="{{ route('page.store') }}">
	@csrf
	<div class="grid">
		<div class="column-12-12">
			@text([
				'title' => __('Title'),
				'name' => 'title',
				'focus' => true,
				'required' => true,
			])
		</div>
		<div class="column-4-6">
			@textarea([
				'title' => __('Content'),
				'name' => 'content',
				'required' => true,
			])
		</div>
		<div class="column-2-6">
			<ul>
			@button([
				'title' => 'Upload cover'
			])
		</ul>
		</div>
	</div>
</form>
@endsection
@section('aside')
	<ul class="menu">
		<li class="title">Menu</li>
		<li>delete</li>
		<li>draft</li>
@endsection

@section('footer')
	@parent('footer')

<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
@endsection