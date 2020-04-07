@extends('layouts.admin')

@section('page-title', 'Project beheer')

@if($pages)
	@section('content')
    <table class="width-card-wide margin-level-auto">
        <thead>
            <tr>
                <th class="max-width">Title</th>
                <th>Ouder</th>
                <th>Status</th>
                <th></th>
                <th><a class="color-bg muted" href="{{route('project.create')}}"><span class="icon icon-sheet"></span></a></th>
            </tr>
        </thead>
			@foreach($pages as $page)
			<tr>
				<td>{{$page->title}}</td>
				<td><a href="{{route('page', $page->parent)}}">{{$page->parent}}</a></td>
				<td>{{__('project.'.$page->status)}}</td>
				<td><a class="muted" href="{{route('project.edit', [$page->id])}}">Wijzig</a></td>
				<td><a class="muted" href="{{route('project.show', [$page->id])}}">Bekijk</a></td>
			</tr>
			@endforeach
        </table>
	@endsection
@endif