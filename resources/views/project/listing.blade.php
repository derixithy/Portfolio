@extends('layouts.prototype')

@section('css')
@parent
.poster { background-size:cover; height: 8em;}
.tags { list-style-type: none; padding-left: 0px; }
.tags li { display: inline; }
.tags li a { margin-left: 5px; }
@endsection

@if($projects)
@section('append')
	<div class="margin-bottom-huge"></div>
	<div grid>
		@foreach($projects as $project)
		<div class="project" @if( $loop->first ) column="six" @else column="three" @endif>
			<a href="{{ route('project', [$slug, $project->name]) }}" class="muted">
				<div class="post">
					<div class="card hover">
						<div class="poster" style="background-image: url({{$project->cover ? '/cover/'.basename($project->cover) : 'img/cover.jpg'}})">
						</div>
						<div class="title">
							<span>{{ $project->title }}</span>
						</div>
					</div>
					<ul class="tags">
						@foreach( $project->tags as $tag)
						<li class="icon icon-label">
							<a href="{{$tag->url}}">{{$tag->title}}</a>
						</li>
						@endforeach
					</ul>
				</div>
			</a>
		</div>
		@endforeach
	</div>
	@endsection
@endif