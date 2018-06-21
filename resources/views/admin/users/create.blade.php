@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
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

    <div class="p-1 my-2">
            <label for="">Email</label>
            <input type="email" name="email" id="email" class="form-control border {{$errors->has('email')? 'border-danger': ''}}" value="{{old('email')}}" aria-describedby="helpId">
        </div>

    <div class=" p-1 my-2">
        <label for="">Position</label>
        <input type="text" name="position" id="position" class="form-control border {{$errors->has('position')? 'border-danger': ''}}" value="{{old('position')}}" aria-describedby="helpId">
    </div>

    <div class="p-1 my-2">
            <label for="">Password</label>
            <input type="password" name="password" id="password" class="form-control border {{$errors->has('password')? 'border-danger': ''}}" aria-describedby="helpId">
        </div>
    <div class="p-1 my-2">
            <label for="">Password</label>
            <input type="password" name="password_confirmation" id="password" class="form-control border {{$errors->has('password')? 'border-danger': ''}}" aria-describedby="helpId">
    </div>


    
    <div class="custom-file my-3 p-1">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>

    <button class="btn btn-success mt-3 pull-right" type="submit">Create</button>
</form>
@stop