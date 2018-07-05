@extends('layouts.master')

@section('content')

<!-- Intro Section -->
	<div class="hero-section">
		<div class="hero-content">
			<div class="hero-center">
				<img src="{{asset('theme/img/big-logo.png')}}" alt="">
				<p>Get your freebie template now!</p>
			</div>
		</div>
		<!-- slider -->
		<div id="hero-slider" class="owl-carousel">
			@foreach($carouselImage as $carousel)
			<div class="item  hero-item" data-bg="{{Storage::disk('fronts')->url($carousel->name)}}"></div>
			@endforeach
		</div>
	</div>
	<!-- Intro Section -->


	<!-- About section -->
	<div class="about-section">
		<div class="overlay"></div>
		<!-- card section -->
		<div class="card-section">
			<div class="container">
				<div class="row">
					@foreach($servicesCard as $service)
					<!-- single card -->
					<div class="col-md-4 col-sm-6">
						<div class="lab-card">
							<div class="icon">
								<i class="{{$service->logo == 'logo'? 'flaticon-023-flask':$service->logo}}"></i>
							</div>
							<h2>{{$service->name}}</h2>
							<p>{{$service->description}}.</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<!-- card section end-->


		<!-- About contant -->
		<div class="about-contant">
			<div class="container">
				<div class="section-title">
					<h2>Get in <span>the Lab</span> and discover the world</h2>
				</div>
				<div class="row">
					<div class="col-md-6">
						<p>{{$texts[0]->content}}</p>
					</div>
					<div class="col-md-6">
						<p>{{$texts[1]->content}}</p>
					</div>
				</div>
				<div class="text-center mt60">
					<a href="{{route('services')}}" class="site-btn">Browse</a>
				</div>
				<!-- popup video -->
				<div class="intro-video">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<img src="{{Storage::disk('fronts')->url($YTImage->name)}}" alt="">
							<a href="https://www.youtube.com/watch?v=JgHfx2v9zOU" class="video-popup">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About section end -->


	<!-- Testimonial section -->
	<div class="testimonial-section pb100">
		<div class="test-overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-4">
					<div class="section-title left">
						<h2>What our clients say</h2>
					</div>
					<div class="owl-carousel" id="testimonial-slide">
						@foreach($clients as $client)
						@foreach($client->testimonials as $testimonial)
						<!-- single testimonial -->
						<div class="testimonial">
							<span>‘​‌‘​‌</span>
							<p>{{$testimonial->content}}</p>
							<div class="client-info">
								<div class="avatar">
									<img src="{{$client->image != 'clientImage'? Storage::disk('clients')->url($client->image):asset('theme/img/avatar/01.jpg')}}" alt="">
								</div>
								<div class="client-name">
									<h2>{{$client->name}}</h2>
									<p>{{$client->position}} {{$client->company}}</p>
								</div>
							</div>
						</div>
						@endforeach
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Testimonial section end-->


	<!-- Services section -->
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
				<a href=""{{route('services')}} class="site-btn">Browse</a>
			</div>
		</div>
	</div>
	<!-- services section end -->


	<!-- Team Section -->
	<div class="team-section spad">
		<div class="overlay"></div>
		<div class="container">
			<div class="section-title">
				<h2>Get in <span>the Lab</span> and  meet the team</h2>
			</div>
			<div class="row">
				@foreach($users as $member)
				<!-- single member -->
				<div class="col-sm-4">
					<div class="member">
						<img src="{{$member->image? Storage::disk('users')->url($member->image):asset('theme/img/team/1.jpg')}}" alt="">
						<h2>{{$member->name}}</h2>
						<h3>{{$member->position}}</h3>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- Team Section end-->


	<!-- Promotion section -->
	<div class="promotion-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<h2>Are you ready to stand out?</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.</p>
				</div>
				<div class="col-md-3">
					<div class="promo-btn-area">
						<a href="{{route('services')}}" class="site-btn btn-2">Browse</a>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Promotion section end-->
    
    @include('partials.contact')

@endsection