@extends('layouts.prototype')

@section('page-title', $page->title)
@section('cover', url('cover/'.basename($page->cover)))


@section('css')
@parent
.tags { list-style-type: none; padding-left: 0px; }
.tags li { display: inline; margin-right: 16px; }
.tags li a { margin-left: 5px; }
@endsection

@section('content')
	<article>
		<div class="text">
			@markdown($page->content)
		</div>
		<span class="tags">
			<ul class="tags">
				@foreach( $page->tags as $tag)
				<li class="icon icon-label">
					<a href="{{route('tag', $tag->name)}}">{{$tag->title}}</a>
				</li>
				@endforeach
			</ul>
		</span>
	</article>
@endsection