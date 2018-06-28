@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <h1> Add a Blog</h1>
@stop

@section('content')
<form method="POST" action="{{route('blogs.update',['blog'=>$blog->id])}}" enctype="multipart/form-data">
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
    
    <div class="p-1 my-1">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control border {{$errors->has('name')? 'border-danger': ''}}" value="{{old('name',$blog->name)}}" aria-describedby="helpId">
    </div>

    <div class="p-1 my-1">
        <label for="">Description</label>
        <textarea class="form-control border {{$errors->has('description')? 'border-danger': ''}}" name="description" id="description" rows="3" placeholder="">{{old('description',$blog->description)}}</textarea>
    </div>

    <div class="p-1 my-1">
        <label for="">Content</label>
        <textarea class="form-control border {{$errors->has('content')? 'border-danger': ''}}" name="content" id="content" rows="3" placeholder="">{{old('content',$blog->content)}}</textarea>
    </div>
    
    <div class="custom-file my-3 p-1">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image" >Choose file</label>
    </div>

    <div class="p-1 my-1">
        <label for="">Category</label>
        @foreach($categories as $category)
            <div class="border bg-light p-3 mx-2">
                <input type="radio" id="category" name="category" value="{{$category->id}}"
                {{old('category', $blog->category->id==$category->id? 'checked' : '')}}>
                <label for="coding">{{$category->name}}</label> 
            </div>
        @endforeach
        @can('admin-only')
        <div class="border bg-light p-3 mx-2">
            <a class="text-dark" href="{{route('categories.create')}}">Create a Category</a>
        </div>
        @endcan
    </div>  

    <div class="p-1 my-3">
        <label for="">Tags</label>
        @foreach($tags as $tag)
        <div class="border bg-light d-inline p-3 mx-2">
            <input type="checkbox" id="technologies" name="tags[]" value="{{$tag->id}}"
            @foreach($blog->tags as $blogtags){{old('tags',
                $blogtags->id==$tag->id? 'checked' : '')}}
            @endforeach>
            <label for="coding">{{$tag->name}}</label>
        </div>
        @endforeach
        @can('admin-only')
        <div class="border bg-light d-inline p-3 mx-2">
            <a href="{{route('tags.create')}}">Create a Tag</a>
        </div>
        @endcan
    </div>

    
    <button class="btn btn-success mt-3 pull-right" type="submit">Update</button>
</form>

@stop

@section('js')
<script>
    CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'content' );
</script>
@endsection