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
                <h2>The Team</h2>
                <a class="btn btn-default" href="{{route('users.create')}}">Create a new Team Member</a>
            </div>
        <div class="row">
            <!-- single member -->
            @foreach($users as $user)
            <div class="col-sm-4 mb-5">
                <a href="{{route('users.show',['user'=>$user->id])}}">
                    <div class="member">
                        <img src="{{$user->image? Storage::disk('users')->url($user->image):}}" alt="">
                        <h2>{{$user->name}}</h2>
                        <h3>{{$user->position}}</h3>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop