@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('flaticonCSS')
<link rel="stylesheet" href="{{asset('theme/css/flaticon.css')}}"/>
@stop

@section('content_header')
    @include('partials.feedback-partials.notification')
    <div class="row">
        <h1 class="col-4">Services</h1>
        <div class="col-4 offset-4">
            <a href="{{route('services.create')}}" class="btn btn-success">Create</a>
        </div>
    </div>
@stop

@section('content')
<div class="services-section spad">
	<div class="row">
        @foreach($services as $service)
        <!-- single service -->
        <a href="{{route('services.show',['service' => $service->id])}}" class="col-md-4 col-sm-6">
		    <div class="">
		        <div class="service">
				    <div class="icon">
                        <i class="{{$service->logo == 'logo'? 'flaticon-023-flask':$service->logo}}  text-dark"></i>
				    </div>
				    <div class="service-text">
					    <h2>{{$service->name}}</h2>
					    <p>{{$service->description}}</p>
                    </div>
			    </div>
            </div>
        </a>
        @endforeach
    </div>
	<div class="row justify-content-center">
            {{ $services->links() }}
	</div>
	</div>
@stop

