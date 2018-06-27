@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    @include('partials.feedback-partials.notification')
    <div class="row">
        <h1 class="col-4">Products</h1>
        <div class="col-4 offset-4">
            <a href="{{route('products.create')}}" class="btn btn-success">Create</a>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 col-sm-6">
            <div class="sv-card">
                <div class="card-img">
                    <img src=" {{$product->image == 'image'? asset('theme/img/card-1.jpg'):Storage::disk('products')->url($product->image)}}" alt="">
                </div>
                <div class="card-text">
                    <h2>{{$product->name}}</h2>
                    <p>{!! $product->description !!}</p>
                    <div class="row justify-content-around">
                        <div>
                            <a class="btn btn-warning text-dark" href="{{route('products.edit',['product' => $product->id])}}">Edit</a>
                        </div>
                        <form action="{{route('products.destroy',['product' => $product->id])}}" method="POST" class="d-inline col-4">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Archive</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@stop
