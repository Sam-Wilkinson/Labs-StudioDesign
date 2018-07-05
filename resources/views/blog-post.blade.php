@extends('layouts.master')


	@include('partials.page-header')


	@section('content')
	<!-- page section -->
	<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Single Post -->
					<div class="single-post">
						<div class="post-thumbnail">
							<img src="{{$blog->image? Storage::disk('blogs')->url($blog->image):asset('theme/img/blog/blog-1.jpg')}}" alt="">
							<div class="post-date">
								<h2>{{$blog->created_at->format('d')}}</h2>
								<h3>{{$blog->created_at->format('M Y')}}</h3>
							</div>
						</div>
						<div class="post-content">
							<h2 class="post-title">{{$blog->name}}</h2>
							<div class="post-meta">
									<a href="{{route('userblogs',['user'=>$blog->user->id])}}">{{$blog->user->name}}</a>
									@foreach($blog->tags as $tag)
									<a href="{{route('tagblogs',['tag'=>$tag->id])}}">{{$tag->name}}</a>
									@endforeach
									@php($commentsNum = count($comments))
									<a href="">{{$commentsNum}} Comment {{$commentsNum == 1? '':'s'}}</a>
							</div>
							{!!$blog->content!!}
						</div>
						<!-- Post Author -->
						<div class="author">
							<div class="avatar">
								<img src="{{$blog->user->image? Storage::disk('users-thumb')->url($user->image):asset('theme/img/avatar/03.jpg')}}" alt="">
							</div>
							<div class="author-info">
								<h2>{{$blog->user->name}}, <span>Author</span></h2>
								<p>{{$blog->description}}</p>
							</div>
						</div>
						<!-- Post Comments -->
						<div class="comments">
							<h2>Comments ({{$commentsNum}})</h2>
							<ul class="comment-list">
								@foreach($comments as $comment)
								<li>
									<div class="avatar">
										@if($comment->image == null)
										<img src="{{Storage::disk('randomImages')->url('random'.rand(1,6).'.jpg')}}" alt="">
										@else
										<img src="{{Storage::disk('users-tiny')->url($comment->image)}}" alt="">
										@endif
									</div>
									<div class="commetn-text">
										<h3>{{$comment->name}} | {{$comment->created_at->format('d M')}}, {{$comment->created_at->format('Y')}}</h3>
										<p>{{$comment->message}} </p>
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						<!-- Comment Form -->
						<div class="row">
							<div class="col-md-9 comment-from">
								<h2>Leave a comment</h2>
								<form class="form-class" method="POST" action="{{route('comment', ['blog' => $blog->id])}}">
									@csrf
									@method('POST')
									<div class="row">
										<div class="col-sm-6">
											<input type="text" name="name" placeholder="Your name">
										</div>
										<div class="col-sm-6">
											<input type="text" name="email" placeholder="Your email">
										</div>
										<div class="col-sm-12">
											<textarea name="message" placeholder="Message"></textarea>
											<button type="submit" class="site-btn">send</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
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
							<div id="instafeed"></div>
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
