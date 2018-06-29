<!-- Contact section -->
	<div class="contact-section spad fix" id="contact">
		<div class="container">
			<div class="row">
				<!-- contact info -->
				<div class="col-md-5 col-md-offset-1 contact-info col-push">
					<div class="section-title left">
						<h2>Contact us</h2>
					</div>
					<p>{{$contacts[0]->content}}</p>
					<h3 class="mt60">{{$contacts[1]->content}}</h3>
					<p class="con-item">{{$contacts[2]->content}}34 <br> {{$contacts[3]->content}}</p>
					<p class="con-item">{{$contacts[4]->content}}</p>
					<p class="con-item">{{$contacts[5]->content}}</p>
				</div>
				<!-- contact form -->
				<div class="col-md-6 col-pull">
					<form class="form-class" id="con_form" action="{{route('contactform')}}" method="POST">
						@csrf
						@method('POST')
						<div class="row">
							<div class="col-sm-6">
								<input type="text" name="name" placeholder="Your name">
							</div>
							<div class="col-sm-6">
								<input type="text" name="email" placeholder="Your email">
							</div>
							<div class="col-sm-12">
								<input type="text" name="subject" placeholder="Subject">
								<textarea name="message" placeholder="Message"></textarea>
								<button type="submit" class="site-btn">send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->