@extends('layouts.web')

@section('page-title', $page->title)
@section('cover', $page->cover)

@if($projects)
@section('main')
	<main class="grid">
		<article class="column-12-12 margin-huge-bottom">
			<p class="padding-small-bottom">{{$page->content}}</p>
		</article>

		@foreach($projects as $project)
		<article class="@if( $loop->first ) column-6-12 @else column-3-12 @endif mobile-column-3-6">
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
		</article>
		@endforeach
	</main>
@endsection
@endif
@section('content')
<article>
	{{ $page->content }}
</article>
@endsection