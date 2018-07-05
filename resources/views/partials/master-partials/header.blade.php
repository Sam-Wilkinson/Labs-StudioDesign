<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="{{asset('theme/img/logo.png')}}" alt=""><!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive"><i class="fa fa-bars"></i></div>
		@if(session('message'))
		<div>
			<div class="col-md-3 col-sm-6 text-center">
				<div class="fact "
					<div class="fact-text">
						<h2>Thank you!</h2>
						<h4>{{session('message')}}</h4 >
					</div>
				</div>
			</div>
		</div>
		@endif
		<nav>
			<ul class="menu-list">
				<li class="{{Route::currentRouteName()=='welcome'? 'active':''}}">
					<a href="{{route('welcome')}}">Home</a>
				</li>
				<li class="{{Route::currentRouteName()=='services'? 'active':''}}">
					<a href="{{route('services')}}">Services</a>
				</li>
				<li class="{{Route::currentRouteName()=='blogs'? 'active':''}}{{Route::currentRouteName()=='blogpost'? 'active':''}}">
					<a href="{{route('blogs')}}">Blog</a>
				</li>
				<li class="{{Route::currentRouteName()=='contact'?'active':''}}">
					<a href="{{route('contact')}}">Contact</a>
				</li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->