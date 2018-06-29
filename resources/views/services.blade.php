@extends('layouts.master')

@section('content')

	@include('partials.feedback-partials.notification')

	@include('partials.page-header')

	<!-- services section -->
	<div class="services-section spad">
		<div class="container">
			<div class="section-title dark">
				<h2>Get in <span>the Lab</span> and see the services</h2>
			</div>
			<div class="row">
				@foreach($services as $service)
				<!-- single service -->
				<div class="col-md-4 col-sm-6">
					<div class="service">
						<div class="icon">
							<i class="{{$service->logo == 'logo'? 'flaticon-023-flask':$service->logo}}"></i>
						</div>
						<div class="service-text">
							<h2>{{$service->name}}</h2>
							<p>{{$service->description}}.</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="text-center">
				{!!$services->links();!!}
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- features section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and  discover the world</h2>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 features">
				@foreach($phoneServices1 as $service)
				<!-- feature item -->
					<div class="icon-box light left">
						<div class="service-text">
							<h2>{{$service->name}}</h2>
							<p>{{$service->description}}</p>
						</div>
						<div class="icon">
							<i class="{{$service->logo == 'logo'? 'flaticon-023-flask':$service->logo}}"></i>
						</div>
					</div>
					@endforeach
				</div>
				<!-- Devices -->
				<div class="col-md-4 col-sm-4 devices">
					<div class="text-center">
						<img src="{{asset('theme/img/device.png')}}" alt="">
					</div>
				</div>
				<div class="col-md-4 col-sm-4 features">
					@foreach($phoneServices2 as $service)
					<!-- feature item -->
						<div class="icon-box light left">
							<div class="service-text">
								<h2>{{$service->name}}</h2>
								<p>{{$service->description}}</p>
							</div>
							<div class="icon">
								<i class="{{$service->logo == 'logo'? 'flaticon-023-flask':$service->logo}}"></i>
							</div>
						</div>
					@endforeach
				</div>
			</div>
			<div class="text-center mt100">
				<a href="#contact" class="site-btn">Contact</a>
			</div>
		</div>
	</div>
	<!-- features section end-->


	<!-- services card section-->
	<div class="services-card-section spad">
		<div class="container">
			<div class="row">
				@foreach($products as $product)
				<!-- Single Card -->
				<div class="col-md-4 col-sm-6">
					<div class="sv-card">
						<div class="card-img">
							<img src="{{$product->image == 'image'? asset('theme/img/card-1.jpg'):Storage::disk('products')->url($product->image)}}" alt="">
						</div>
						<div class="card-text">
							<h2>{{$product->name}}</h2>
							<p>{{$product->description}}.</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- services card section end-->


	@include('partials.newsletter')

	@include('partials.contact')

@endsection