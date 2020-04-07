@extends('layouts.admin')

@section('page-title', 'Pagina beheer')

@if($pages)
	@section('content')
    <table class="width-card-wide margin-level-auto">
        <thead>
            <tr>
                <th class="max-width">Title</th>
                <th>Status</th>
                <th></th>
                <th><a class="color-bg" href="{{route('page.create')}}"><span class="icon icon-sheet"></span></a></th>
            </tr>
        </thead>
			@foreach($pages as $page)
			<tr>
				<td>{{$page->title}}</td>
				<td>{{__('page.'.$page->status)}}</td>
				<td>
					<a class="muted" href="{{route('page.edit', [$page->id])}}">Wijzig</a>
				</td>
				<td>
					<a class="muted" href="{{route('page.show', [$page->id])}}">Bekijk</a>
				</td>
			</tr>
			@endforeach
        </table>
	@endsection
@endif