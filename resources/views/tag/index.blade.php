@extends('layouts.admin')

@section('page-title', 'Tag beheer')

@if($tags)
	@section('content')
    <table class="width-card-wide margin-level-auto">
        <thead>
            <tr>
                <th class="max-width">Title</th>
                <th></th>
                <th><a class="color-bg muted" href="{{route('tag.create')}}"><span class="icon icon-sheet"></span></a></th>
            </tr>
        </thead>
			@foreach($tags as $tag)
			<tr>
				<td>{{$tag->title}}</td>
				<td><a class="muted" href="{{route('tag.edit', [$tag->id])}}">Wijzig</a></td>
				<td><a class="muted" href="{{route('tag.show', [$tag->id])}}">Bekijk</a></td>
			</tr>
			@endforeach
        </table>
	@endsection
@endif