@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('flaticonCSS')
<link rel="stylesheet" href="{{asset('theme/css/flaticon.css')}}"/>
@stop

@section('content_header')
    @include('partials.feedback-partials.notification')
@stop

@section('content')
<div class="row">
    <form method="POST" action="{{route('services.store')}}" enctype="multipart/form-data" class="col-md-7">
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
        <input type="text" name="logo" id="logo" class="form-control border {{$errors->has('logo')? 'border-danger': ''}}" value="{{old('logo')}}" aria-describedby="helpId" placeholder="Copy the name of the logo you want here">

        <button class="btn btn-success mt-3 pull-right" type="submit">Create</button>
    </form>
    <div clas=" w-25">
            <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @forEach($logos as $logo)
                <tr>
                    <td> <i class="{{$logo->name}}"></i></td>
                    <td>{{$logo->name}}</td>
                </tr>
                @endforEach
            </tbody>
        </table>
        {{ $logos->links() }}
    </div>
</div>

@stop