@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <div class="row">
        <h1 class="col-4">Front Images</h1>
        <div class="col-4 offset-4">
            <a href="{{route('images.create')}}" class="btn btn-success">Add</a>
        </div>
    </div>
@stop

@section('content')
<div id="carouselExampleControls" class="carousel slide mb-5" data-ride="carousel">
    <h2>Carrousel Images</h2>
    <div class="carousel-inner">
        @php($i = 0)
        @foreach($carousels as $carousel)
            <div class="carousel-item {{$i == 0? 'active':''}}">
                <img class="d-block w-100" src="{{Storage::disk('fronts')->url($carousel->name)}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <form action="{{route('images.destroy',['image'=>$carousel->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Archive</button>
                    </form> 
                </div>
            </div>
            @php($i++)
        @endforeach    
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="container">
    <div class="row">
        <h2>Youtube Image</h2>
            <div class="col-md-8 col-md-offset-2">
                <img src="{{Storage::disk('fronts')->url($youtube[0]->name)}}" alt="">
            </div>
        </div>
    </div>

@stop