@extends('layouts.admin')

@section('page-title', 'Nieuw pagina')

@section('content')
<div class="grid">
	<div class="offset-1-6 column-4-6">
		<form class="form" id="post" method="POST" action="{{ route('page.store') }}">
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



@section('footer')
	@parent('footer')
<script type="text/javascript">
// Save page on ctrl+s
document.addEventListener('keydown', e => {
  if (e.ctrlKey && e.key === 's') {
    e.preventDefault();
    document.getElementById('post').submit();
  }
</script>
@endsection