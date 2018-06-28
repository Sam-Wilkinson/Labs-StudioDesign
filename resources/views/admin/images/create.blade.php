@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<form method="POST" action="{{route('images.store')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="p-1 my-2">
            <div class="border bg-light p-3 mx-2">
                <input type="radio" id="location" name="location" value="carousel">
                <label for="coding"> Carousel</label>
            </div>
            <div class="border bg-light p-3 mx-2">
                <input type="radio" id="location" name="location" value="youtube">
                <label for="coding"> Youtube</label>
            </div>
    </div>
    
    <div class="custom-file my-3 p-1">
        <input type="file" class="custom-file-input" id="name" name="name">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>

    <button class="btn btn-success mt-3 pull-right" type="submit">Create</button>
</form>
@stop