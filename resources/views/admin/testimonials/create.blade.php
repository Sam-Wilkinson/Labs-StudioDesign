@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<form method="POST" action="{{route('testimonials.store')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <input type="hidden" name="client" value="{{$client}}">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach 
            </ul>
        </div>
    @endif
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