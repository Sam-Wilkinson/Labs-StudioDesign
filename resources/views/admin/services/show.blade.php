@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('flaticonCSS')
<link rel="stylesheet" href="{{asset('theme/css/flaticon.css')}}"/>
@stop

@section('content_header')
    @include('partials.feedback-partials.notification')
@stop

@section('content')
<div class="services-section spad">
	<div class="row">
        <!-- single service -->
		    <div class="col-md-4 col-sm-6">
		        <div class="service">
				    <div class="icon">
                        <i class="flaticon-023-flask text-dark"></i>
				    </div>
				    <div class="service-text">
					    <h2>{{$service->name}}</h2>
					    <p>{{$service->description}}</p>
                    </div>
			    </div>
            </div>
	    <div class="text-center">
                        <div class="col-4 mb-5">
                            <a class="btn btn-warning text-dark" href="{{route('services.edit',['service' => $service->id])}}">Edit</a>
                        </div>
                        <form action="{{route('services.destroy',['service' => $service->id])}}" method="POST" class="d-inline col-4">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Archive</button>
                        </form>
		</div>
	</div>
</div>
@stop
