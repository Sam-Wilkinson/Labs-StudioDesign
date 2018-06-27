@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <div class="row">
        <h1 class="col-4">Texts</h1>
    </div>
@stop

@section('content')
<div class="section-contant">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="section-title ">
            <h2 class="text-dark">Get in <span>the Lab</span> and discover the world</h2>
        </div>
        <div class="row">
            <div class="col-md-6 ">
                <form method="POST" action="{{route('texts.update',['text'=>$texts[0]->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                    <textarea class="form-control editor1 border {{$errors->has('text')? 'border-danger': ''}}" name="text" id="text1" rows="5" placeholder="">
                        {{$texts[0]->content}}</textarea>
                </form>
            </div>
            <div class="col-md-6">
                <form method="POST" action="{{route('texts.update',['text'=>$texts[1]->id])}}">
                    @csrf
                    @method('PUT')
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                    <textarea class="form-control editor2 border {{$errors->has('text')? 'border-danger': ''}}" name="text" id="text" rows="5" placeholder=""> {{$texts[1]->content}}</textarea>  
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
        // Turn off automatic editor creation first.
        CKEDITOR.disableAutoInline = true;
        CKEDITOR.inline( 'editor1' );
        CKEDITOR.inline( 'editor2' );
</script>
@endsection
