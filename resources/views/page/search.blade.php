@if( $projects )
@extends('project.listing')
@endif

@section('css')
@parent
.tags { list-style-type: none; padding-left: 0px; }
.tags li { display: inline; margin-right: 16px; }
.tags li a { margin-left: 5px; }
@endsection

@section('page-title', 'Zoeken')


@section('content')
	<article>
		<div class="text">
			<form method="get">
				@csrf

				@text([
					'name' => 'find',
					'focus' => true,
					'required' => true,
					'value' => $search,
					'placeholder' => 'Type hier om te zoeken...'
				])
			</form>
			@if ( $search)
				@if( $projects->count() > 0 )
					<p>{{$projects->count()}} project gevonden.</p>
				@else
					<p>Geen projecten gevonden, probeer een ander zoekwoord of een van de volgende tags.</p>
					<ul class="tags">
						@foreach( \App\Tag::get() as $tag )
						<li class="icon icon-label"><a href="{{route('tag', $tag->name)}}">{{$tag->title}}</a></li>
						@endforeach
					</ul>
				@endif
			@else
				<p>Typ om te zoeken of probeer een van de volgende tags.</p>
				<ul class="tags">
					@foreach( \App\Tag::get() as $tag )
					<li class="icon icon-label"><a href="{{route('tag', $tag->name)}}">{{$tag->title}}</a></li>
					@endforeach
				</ul>
			@endif
		</div>
	</article>
@endsection
