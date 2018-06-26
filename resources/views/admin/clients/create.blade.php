@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
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

    <div class="p-1 my-2">
            <label for="">Company</label>
            <input type="text" name="company" id="company" class="form-control border {{$errors->has('company')? 'border-danger': ''}}" value="{{old('company')}}" aria-describedby="helpId">
        </div>

    <div class=" p-1 my-2">
        <label for="">Position</label>
        <input type="text" name="position" id="position" class="form-control border {{$errors->has('position')? 'border-danger': ''}}" value="{{old('position')}}" aria-describedby="helpId">
    </div>
    
    <div class="custom-file my-3 p-1">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose file</label>
    </div>

    <label for="">Testimonial</label>
    <textarea class="form-control border {{$errors->has('testimonial')? 'border-danger': ''}}" name="testimonial" id="testimonial" rows="3" placeholder="">{{old('testimonial')}}</textarea>
</div>

    <button class="btn btn-success mt-3 pull-right" type="submit">Create</button>
</form>
@stop

@section('js')
<script>
    CKEDITOR.replace( 'testimonial' );
</script>
@endsection