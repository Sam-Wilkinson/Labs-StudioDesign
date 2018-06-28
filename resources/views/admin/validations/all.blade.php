@extends('adminlte::page')

@section('title', 'Validation')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <div class="row justify-content-center border-bottom">
        <h1>Blogs & Comments</h1>
    </div>
@stop

@section('content')
<div class="">
    <h2>Blogs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>User</th> 
                <th>Created At</th>
                <th>Blog</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{$blog->name}}</td>
                @if($blog->user != null)
                    <td>{{$blog->user->name}}</td>
                @else
                    <td>User was Deleted</td>
                @endif
                <td>{{$blog->created_at}}</td>
                <td>
                    <a href="{{route('blogs.show',['blog'=>$blog->id])}}" class="btn btn-success">GO</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-100"></div>
    <h2>Comments</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Message</th>
                <th>Created At</th>
                <th>Comment</th>
            </tr>
        </thead>
        <tbody>
            @forEach($comments as $comment)
            <tr>
                <td>{{$comment->name}}</td>
                <td>{{$comment->message}}</td>               
                <td>{{$comment->created_at}}</td>
                <td>
                    <a href="{{route('blogs.show',['blog'=>$comment->blog->id])}}" class="btn btn-success">GO</a>
                </td>
            </tr>
            @endforEach
        </tbody>
    </table>
</div>
@stop