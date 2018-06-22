@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @include('partials.feedback-partials.notification')
@stop

@section('content')
<div class="row justify-space-around">
    <div class="col-5 text-center">
        <div class="row my-1">
            <div class="col-5"></div>
            <h2 class="col-2">Tags</h2>
            <div class="col-3"></div>
            <a class="btn btn-success justify-self-end"href="{{route('tags.create')}}">Create</a>
        </div>
        <ul class="list-group">
            @foreach($tags as $tag)
            <li class="list-group-item">
                <div class="row justify-content-around">
                    <h4 class="col-8"><a href="{{route('tags.show',['tag'=>$tag->id])}}">{{$tag->name}}</a></h4>
                    <div class="col-2">
                        <a class="btn btn-warning" href="{{route('tags.edit',['tag'=>$tag->id])}}">Edit</a>
                    </div>
                    <form method="POST" class="col-2" action="{{route('tags.destroy',['tag'=>$tag->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Archive</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-5 text-center">
        <div class="row my-1">
            <div class="col-5"></div>
            <h2 class="col-2">Categories</h2>
            <div class="col-3"></div>
            <a class="btn btn-success"href="{{route('categories.create')}}">Create</a>
        </div>
        <ul class="list-group">
            @foreach($categories as $category)
            <li class="list-group-item">
                <div class="row justify-content-around">
                    <h4 class="col-8"><a href="{{route('categories.show',['category'=>$category->id])}}">{{$category->name}}</a></h4>
                    <div class="col-2">
                        <a class="btn btn-warning" href="{{route('categories.edit',['category'=>$category->id])}}">Edit</a>
                    </div>
                    <form method="POST" class="col-2" action="{{route('categories.destroy',['category'=>$category->id])}}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Archive</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@stop