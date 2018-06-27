@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <div class="row">
        <h1 class="col-4">Clients and Testimonials</h1>
        <div class="col-4 offset-4">
            <a href="{{route('clients.create')}}" class="btn btn-success">Create</a>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    <!-- Collapse number -->
@php($i = 1)
@foreach($clients as $client)
<!-- Clients testimonial number -->
@php($t= 1)
<div class="card col-3 mx-5 my-3" style="width: 18rem;">
    <div class="card-header row justify-content-between ">
        <div class="col-4">
            <a class="btn btn-warning text-dark" href="{{route('clients.edit',['client' => $client->id])}}">Edit</a>
        </div>
        <form action="{{route('clients.destroy',['client' => $client->id])}}" method="POST" class="d-inline col-4">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Archive</button>
        </form>
    </div>
    <div class="card-body">
        <div class="row">
            <h5 class="card-title col-6">{{$client->name}}</h5>
            <img class="card-img-top col-6" src="{{$client->image? Storage::disk('clients')->url($client->image):Storage::disk('clients')->url('ClientNoImage.png')}}" alt="Client Image">
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$client->company}}</li>
            <li class="list-group-item">{{$client->position}}</li>
        </ul>
    </div>
        @foreach($client->testimonials as $testimonial)
        <div class="accordion" id="accordionExample">
            <div class="card-body">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        Testimonial #{{$t}}
                        </button>
                    </h5>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
                    <div class="card-body">{!! $testimonial->content !!}</div>
                </div>
            </div>
        </div>
    @php($i++)
    @php($t++)
    @endforeach
    <div class="accordion" id="accordionExample">
        <div class="card-body">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <a href="{{route('testimonials.show',['client'=>$client->id])}}" class="text-dark">
                        Add another testimonial
                    </a>
                </h5>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
@stop
