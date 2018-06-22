@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
    @include('partials.feedback-partials.notification')
@stop

@section('content')
    <!-- page section -->
    <div class="page-section spad">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 blog-posts">
                    <!-- Single Post -->
                    <div class="single-post">
                        <div class="post-thumbnail">
                            <img src="{{$blog->image? Storage::disk('blogs')->url($blog->image):Storage::disk('blogs')->url('BlogNoImage.png')}}" alt="">
                            <div class="post-date">
                                <h2>03</h2>
                                <h3>{{$blog->created_at}}</h3>
                            </div>
                        </div>
                        <div class="post-content">
                            <h2 class="post-title">{{$blog->name}}</h2>
                            <div class="post-meta">
                                @if($blog->user != null)
                                    <a href="">{{$blog->user->name}}</a>
                                @else
                                @foreach($users as $user)
                                <a>{{$user->name}}</a>
                                @endforeach
                                @endif
                                <a href="">
                                    @foreach($blog->tags as $tag)
                                    {{$tag->name}},
                                    @endforeach
                                </a>
                                <a href="">{{$commentsNum}} Comment @if($commentsNum >1)s @endif</a>
                            </div>
                            <p>{!! $blog->content !!}</p>
                        </div>
                        <!-- Post Author -->
                        @if($blog->user == null)
                        @foreach($users as $user)
                        <div class="author">
                            <div class="avatar">
                                <img src="{{$user->image? Storage::disk('users-thumb')->url($user->image):Storage::disk('users-thumb')->url('UserNoImage.png')}}" alt="">
                            </div>
                            <div class="author-info">
                                <h2>{{$user->name}}, <span>Author</span></h2>
                                <p>{!! $blog->description !!} </p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="author">
                            <div class="avatar">
                                <img src="{{$blog->user->image? Storage::disk('users-thumb  ')->url($blog->user->image):Storage::disk('users-thumb')->url('UserNoImage.png')}}" alt="">
                            </div>
                            <div class="author-info">
                                <h2>{{$blog->user->name}}, <span>Author</span></h2>
                                <p>{!! $blog->description !!} </p>
                            </div>
                        </div>
                        @endif
                        <!-- Post Comments -->
                        <div class="comments">
                            <h2>Comments ({{$commentsNum}})</h2>
                            <ul class="comment-list">
                                @foreach($blog->comments as $comment)
                                <li>
                                    <div class="avatar">
                                        @if($blog->user == null)
                                        @foreach($users as $user)
                                        <img src="{{$user->image? Storage::disk('users-tiny')->url($user->image):Storage::disk('users-tiny')->url('UserNoImage.png')}}" alt="">
                                        @endforeach
                                        @else
                                        <img src="{{$blog->user->image? Storage::disk('users-tiny')->url($blog->user->image):Storage::disk('users-tiny')->url('UserNoImage.png')}}" alt="">
                                        @endif
                                    </div>
                                    <div class="commetn-text">
                                        <h3>{{$comment->name}} | {{$comment->created_at}}</h3>
                                        <p>{{$comment->message}} </p>
                                    </div>
                                    <form action="{{route('comments.destroy',['comment' => $comment->id])}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Archive</button>
                                    </form>
                                </li>
                                @endforeach
                            </ul>
                            <h2>Leave a comment</h2>
                            <form class="form-class" action="{{route('comments.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <input type="hidden" value="{{$blog->id}}" name="blog">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <button type="submit" class="site-btn">send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Sidebar area -->
                <div class="col-md-4 col-sm-5 sidebar">
                    <!-- Single widget -->
                    <div class="widget-item">
                        <h2 class="widget-title">The blogs Category</h2>
                        <ul>
                            @if($blog->category != null)
                            
                            <li><a href="#">{{$blog->category->name}}</a></li>
                            
                            @else
                            <li><a href="#">There is no category for this blog</a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- Single widget -->
                    <div class="widget-item">
                        <h2 class="widget-title">The blogs Tags</h2>
                        <ul class="tag">
                            @if($blog->tags != null)
                            @foreach($blog->tags as $tag)
                            <li><a href="">{{$tag->name}}</a></li>
                            @endforeach
                            @else 
                            <li><a href="">There are no tags for this blog</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="widget-item">
                            <h2 class="widget-title">Blog Modifications</h2>
                            <ul class="tag">
                                <a class="btn btn-warning text-dark d-inline" href="{{route('blogs.edit',['blog' => $blog->id])}}">Edit</a>
                                <form action="{{route('blogs.destroy',['blog' => $blog->id])}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Archive</button>
                                </form>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page section end-->
@endsection