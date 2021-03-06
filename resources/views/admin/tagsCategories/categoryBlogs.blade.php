@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <h1>{{$category->name}} Blogs</h1>
@stop

@section('content')
<div>
    <a href="{{route('blogs.create')}}" class="btn btn-success pull-right">Create New Blog</a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>User</th> 
                <th>Created At</th>
                <th>Validated</th>
                <th>Content</th>
            </tr>
        </thead>
        <tbody>
            @forEach($category->blogs as $blog)
            <tr>
                <td>{{$blog->name}}</td>
                @if($blog->user != null)
                    <td>{{$blog->user->name}}</td>
                @else
                    <td>User was Deleted</td>
                @endif
                <td>{{$blog->created_at}}</td>
                @if($blog->validated == null)
                <td>no</td>
                @elseif($blog->validated == true)
                <td>yes</td>
                @else
                <td>rejected</td>
                @endif
                <td>
                    <a href="{{route('blogs.show',['blog'=>$blog->id])}}" class="btn btn-success">GO</a>
                </td>
            </tr>
            @endforEach
        </tbody>
    </table>
@stop