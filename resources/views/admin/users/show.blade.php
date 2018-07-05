@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @include('partials.feedback-partials.notification')
@stop

@section('content')
<div class="team-section spad">
    <div class="overlay"></div>
    <div class="container">
        <div class="section-title">
            <div class="row justify-content-center">
                <div>
                    <h2>{{$user->name}}</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- single member -->
            <div class="col-sm-4 mb-5">
                <div class="member">
                    <img src="{{$user->image? Storage::disk('users')->url($member->image):asset('theme/img/team/1.jpg')}}" alt="">
                    <h2>{{$user->email}}</h2>
                    <h2>{{$user->position}}</h2>
                    <div>
                        <form method="POST" class="d-inline mx-1" action="{{route('users.destroy',['user'=>$user->id])}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Archive</button>
                        </form>
                        <a class="btn btn-default mx-1" href="{{route('users.edit',['user'=>$user->id])}}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <h2 class="text-center">Blogs</h2>
            <div class="row ">
            @foreach($user->blogs as $blog)
            <a href="" class="col-sm-4 h-100">
                <div class="card-group h-100">
                    <div class="card">
                      <img class="card-img-top" src="{{$blog->image? Storage::disk('blogs')->url($blog->image):asset('theme/img/blog/blog-1.jpg')}}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{$blog->name}}</h5>
                        <p class="card-text">{{$blog->description}}</p>
                      </div>
                      <div class="card-footer d-flex justify-content-around">
                        <small class="text-muted ">{{$blog->created_at}}</small>
                        <small class="badge badge-light ">Comments Count</small>
                      </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@stop