@extends('layouts.admin')

@section('page-title', $title)

@if($pages)
@section('content')
	<main class="grid">

		<ul>
		@foreach($pages as $page)
			<li>{{$page->title}}</li>
		@endforeach
		</ul>
	</main>
@endsection
@endif