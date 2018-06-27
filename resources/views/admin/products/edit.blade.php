@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<form method="POST" action="{{route('products.update',['product'=>$product->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
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
        <input type="text" name="name" id="name" class="form-control border {{$errors->has('name')? 'border-danger': ''}}" value="{{old('name',$product->name)}}" aria-describedby="helpId">
    </div>

    <div>
        <label for="">Description</label>
        <textarea class="form-control border {{$errors->has('description')? 'border-danger': ''}}" name="description" id="description" rows="3" placeholder="">{{old('description',$product->description)}}</textarea>
    </div>
    
    <div class="custom-file my-3 p-1">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>

    <button class="btn btn-success mt-3 pull-right" type="submit">Update</button>
</form>
@stop

@section('js')
<script>
    CKEDITOR.replace( 'description' );
</script>
@endsection