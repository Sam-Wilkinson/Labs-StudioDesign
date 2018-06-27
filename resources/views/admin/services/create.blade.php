@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('flaticonCSS')
<link rel="stylesheet" href="{{asset('theme/css/flaticon.css')}}"/>
@stop

@section('content_header')
    @include('partials.feedback-partials.notification')
@stop

@section('content')
<form method="POST" action="{{route('clients.store')}}" enctype="multipart/form-data">
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
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control border {{$errors->has('name')? 'border-danger': ''}}" value="{{old('name')}}" aria-describedby="helpId">
    </div>

    <label for="">Description</label>
    <textarea class="form-control border {{$errors->has('description')? 'border-danger': ''}}" name="description" id="description" rows="3" placeholder="">{{old('description')}}</textarea>

    <label for="">logo</label>
    input type="text" name="name" id="name" class="form-control border {{$errors->has('name')? 'border-danger': ''}}" value="{{old('name')}}" aria-describedby="helpId">

    <button class="btn btn-success mt-3 pull-right" type="submit">Create</button>
</form>

@stop