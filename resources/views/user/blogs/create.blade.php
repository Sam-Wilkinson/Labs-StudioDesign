@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <h1> Add a Blog</h1>
@stop

@section('content')
<form method="POST" action="{{route('blogs.store')}}" enctype="multipart/form-data">
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
    
    <div class="border border-dark p-1 my-1">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control border {{$errors->has('name')? 'border-danger': ''}}" value="{{old('name')}}" aria-describedby="helpId">
    </div>

    <div class="border border-dark p-1 my-1">
        <label for="">Description</label>
        <textarea class="form-control border {{$errors->has('description')? 'border-danger': ''}}" name="description" id="description2" rows="3" placeholder="">{{old('description')}}</textarea>
    </div>

    <div class="custom-file my-3 p-1">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image" >Choose file</label>
    </div>

    <div class="border border-dark p-1 my-1">
    <label for="">URL of Project</label>
        <input type="url" name="URL" id="URL" class="form-control border {{$errors->has('URL')? 'border-danger': ''}}" value="{{old('URL')}}" aria-describedby="helpId">
    </div>

    <div class="border border-dark p-1 my-1">
        <label for="">Date of Project</label>
        <input type="date" name="date" id="date" class="form-control border {{$errors->has('date')? 'border-danger': ''}}" value="{{old('date')}}" aria-describedby="helpId">
    </div>

    <div class="border border-dark p-1 my-1">
        <label for="">Technology</label>
        @foreach($technologies as $tech)
        <div>
            <input type="checkbox" id="technologies" name="technologies[]" value="{{$tech->id}}">
            <label for="coding">{{$tech->name}}</label>
        </div>
        @endforeach
    </div>

    <div class="border border-dark p-1 my-1">
        <label for="">Client</label>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Client List
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($clients as $client)
                    <input type="radio" id="client" name="client" value="{{$client->id}}">{{$client->name}}<br>
                @endforeach
            </div>
        </div>
    </div>  
    <button class="btn btn-success mt-3 pull-right" type="submit">Create</button>
</form>

@stop

@section('js')
<script>
    CKEDITOR.replace( 'description2' );
</script>
@endsection