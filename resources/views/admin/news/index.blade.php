@extends('adminlte::page')

@section('title', 'Blogs')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <h1>Newsletter Emails</h1>
@stop

@section('content')
<div class="row">
    @foreach($emails as $email)
    <div class="col-3 py-2   border-bottom row">
        <p class="col-9 ">{{$email->email}}</p>
        <form action="{{route('newsemails.destroy',['newsemail' => $email->id])}}" method="POST" class=" p-0 col-3">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Archive</button>
            </form>
    </div>
    @endforeach
</div>
@stop