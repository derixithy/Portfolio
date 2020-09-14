@extends('layouts.prototype')

@section('page-title', $page->title)
@section('cover', 'cover/'.basename($page->cover))

@section('css')
@parent
.project img { width: 100%; max-height: 100%; }
.tags { list-style-type: none; }
@endsection

@section('content')
	<article>
		<div class="text">
			@markdown($page->content)
		</div>
	</article>
@if($projects)
	<div class="margin-bottom-huge"></div>
	<div grid>
		@foreach($page->projects as $project)
		<div class="project" @if( $loop->first ) column="six" @else column="three" @endif>
			<a href="{{ route('project', [$slug, $project->name]) }}" class="muted">
				<div class="post">
					<div class="card hover">
						<div class="poster">
							<img src="{{$project->cover ? '/cover/'.basename($project->cover) : 'img/cover.jpg'}}" style="width:100%; max-height:100%"/>
						</div>
						<div class="title">
							<span>{{ $project->title }}</span>
						</div>
					</div>
					<ul class="tags">
						@foreach( $project->tags as $tag)
						<li><a href="{{$tag->url}}">{{$tag->title}}</a></li>
						@endforeach
					</ul>
				</div>
			</a>
		</div>
		@endforeach
	</div>
@endif
@endsection