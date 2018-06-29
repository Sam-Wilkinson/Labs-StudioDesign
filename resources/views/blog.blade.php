@extends('layouts.master')

@section('content')

	@include('partials.page-header')


	<!-- page section -->
	<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Post item -->
					@foreach($blogs as $blog)
					<div class="post-item">
						<div class="post-thumbnail">
							<img src="{{$blog->image? Storage::disk('blogs')->url($blog->image):asset('theme/img/blog/blog-1.jpg')}}" alt="">
							<div class="post-date">
								<h2>03</h2>
								<h3>{{$blog->created_at}}</h3>
							</div>
						</div>
						<div class="post-content">
							<h2 class="post-title">{{$blog->name}}</h2>
							<div class="post-meta">
								<a href="{{route('userblogs',['user'=>$blog->user->id])}}">{{$blog->user->name}}</a>
								@foreach($blog->tags as $tag)
								<a href="{{route('tagblogs',['tag'=>$tag->id])}}">{{$tag->name}}</a>
										@endforeach
								@php($commentsNum = count($blog->comments))
								<a href="">{{$commentsNum}} Comment {{$commentsNum == 1? '':'s'}}</a>
							</div>
							<p>{{$blog->description}}</p>
							<a href="{{route('blogpost',['blog' => $blog->id])}}" class="read-more">Read More</a>
						</div>
					</div>
					@endforeach
					<!-- Pagination -->
					{!!$blogs->links();!!}
				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar">
					<!-- Single widget -->
					<div class="widget-item">
						<form action="{{route('searchblogs')}}" class="search-form" method="GET">
							@csrf
							@method('GET')
							<input type="text" placeholder="Search" name="name">
							<button class="search-btn"><i class="flaticon-026-search"></i></button>
						</form>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Categories</h2>
						<ul>
							@foreach($categories as $category)
							<li><a href="{{route('categoryblogs',['category'=>$category->id])}}">{{$category->name}}</a></li>
							@endforeach		
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Instagram</h2>
						<ul class="instagram">
							<li><img src="{{asset('theme/img/instagram/1.jpg')}}" alt=""></li>
							<li><img src="{{asset('theme/img/instagram/2.jpg')}}" alt=""></li>
							<li><img src="{{asset('theme/img/instagram/3.jpg')}}" alt=""></li>
							<li><img src="{{asset('theme/img/instagram/4.jpg')}}" alt=""></li>
							<li><img src="{{asset('theme/img/instagram/5.jpg')}}" alt=""></li>
							<li><img src="{{asset('theme/img/instagram/6.jpg')}}" alt=""></li>
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Tags</h2>
						<ul class="tag">
							@foreach($tags as $tag)
							<li><a href="{{route('tagblogs',['tag'=>$tag->id])}}">{{$tag->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- Single widget -->
					<div class="widget-item">
						<h2 class="widget-title">Quote</h2>
						<div class="quote">
							<span class="quotation">‘​‌‘​‌</span>
							<p>{{$testimonial->content}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->


	@include('partials.newsletter')

@endsection