<!-- Page header -->
	<div class="page-top-section">
		<div class="overlay"></div>
		<div class="container text-right">
			<div class="page-info">
				<h2>
					@if(Route::currentRouteName()== 'services')
					Services
					@elseif(Route::currentRouteName()== 'contact')
					Contact
					@else
					Blogs
					@endif
				</h2>
				<div class="page-links">
					<a href="{{route('welcome')}}">Home</a>
					@if(Route::currentRouteName()== 'services')
					<span>Services</span>
					@elseif(Route::currentRouteName()== 'contact')
					<span>Contact</span>
					@else
					<span>Blogs</span>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- Page header end-->