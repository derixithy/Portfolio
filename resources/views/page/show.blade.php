@extends('layouts.hybrid')

@section('page-title', $page->title)
@section('cover', $page->cover)

@section('content')
	<article>
		<div class="text">
			{!! nl2br($page->content) !!}
		</div>
	</article>
@if($projects)
	<div class="margin-bottom-huge"></div>
	<div class="grid">
		@foreach($page->projects as $project)
		<div class="@if( $loop->first ) column-6-12 @else column-3-12 @endif mobile-column-3-6">
			<a href="{{ route('project', [$slug, $project->name]) }}" class="muted">
				<div class="post">
					<div class="card hover">
						<div class="poster">
							<img src="{{ $project->image }}" />
						</div>
						<div class="title">
							<span>{{ $project->title }}</span>
						</div>
					</div>
					<ul class="tags">
						<li><a href="#">php</a></li><li><a href="#">javascript</a></li><li><a href="#">html</a></li><li><a href="#">css</a></li>
					</ul>
				</div>
			</a>
		</div>
		@endforeach
	</div>
@endif
@endsection