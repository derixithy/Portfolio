@extends('layouts.prototype')

@section('css')
@parent
.project { margin-bottom: 1em;}
.poster {
	background-size:cover;
	height: 8em;
	border-radius: 5px;
	box-shadow: 0px 5px 5px -4px rgba(65,65,65,.5);
}
.project:hover .poster {
	box-shadow: 0px 5px 5px -4px #414141;
}
.title { text-align: center; padding-top:3em; }
.title span {
	font-size: 2em;
	color: white;
	text-shadow: 2px 2px #414141;
}
.tags { list-style-type: none; padding-left: 0px; }
.tags li { display: inline; margin-right: 16px; }
.tags li a { margin-left: 5px; }
@endsection

@if($projects)
@section('append')
	<div class="margin-bottom-huge"></div>
	<div grid>
		@foreach($projects as $project)
		<div class="project" @if( $loop->first ) column="twelve" @else column="six" @endif>
			<a href="{{ route('project', [$slug, $project->name]) }}" class="muted">
				<div class="post">
					<div class="card hover">
						<div class="poster" style="background-image: url({{$project->cover ? '/cover/'.basename($project->cover) : 'img/cover.jpg'}})">
							<div class="title">
								<span>{{ $project->title }}</span>
							</div>
						</div>
					</div>
					<ul class="tags">
						@foreach( $project->tags as $tag)
						<li class="icon icon-label">
							<a href="{{route('tag', $tag->name)}}">{{$tag->title}}</a>
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