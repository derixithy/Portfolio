@extends('layouts.web')

@section('page-title', $page->title)
@section('cover', $page->cover)

@if($page->name == 'portfolio')
@section('main')
	<main class="grid">
		<article class="column-12-12 margin-huge-bottom">
			<p class="padding-small-bottom">{{$page->content}}</p>
		</article>


		<article class="column-6-12 mobile-column-3-6">
			<a href="projects/portfolio.html" class="muted">
				<div class="post">
					<div class="card hover">
						<div class="poster">
							<img src="https://via.placeholder.com/225x140/1985a1/e8eddf?Text=Project 1" />
						</div>
						<div class="title">
							<span>Portfolio</span>
						</div>
					</div>
					<ul class="tags">
						<li><a href="#">php</a></li><li><a href="#">javascript</a></li><li><a href="#">html</a></li><li><a href="#">css</a></li>
					</ul>
				</div>
			</a>
		</article>

		<article class="column-3-12 mobile-column-3-6">
			<a href="project1.html" class="muted">
				<div class="post">
					<div class="card hover">
						<div class="poster">
							<img src="" />
						</div>
						<div class="title">
							<span>Title</span>
						</div>
					</div>
					<ul class="tags">
						<li><a href="#">php</a></li><li><a href="#">javascript</a></li><li><a href="#">html</a></li><li><a href="#">css</a></li>
					</ul>
				</div>
			</a>
		</article>
	</main>
@endsection
@endif
@section('content')
<article>
	{{ $page->content }}
</article>
@endsection