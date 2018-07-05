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
						@if($errors->any())
						<div>
							<p class="text-danger">There seems to be a problem with the form, please try again</p>
						</div>
						@endif
						<div class="row">
							<div class="col-sm-6">
								<input type="text" name="name" class="border {{$errors->has('name')? 'border-danger': ''}}" placeholder="Your name" value="{{old('name')}}">
							</div>
							<div class="col-sm-6">
								<input type="text" class="border {{$errors->has('email')? 'border-danger': ''}}" name="email" placeholder="Your email" value="{{old('email')}}">
							</div>
							<div class="col-sm-12">
								<input type="text" class=" border {{$errors->has('subject')? 'border-danger': ''}}" name="subject" placeholder="Subject" value="{{old('subject')}}">
								<textarea name="message" class="border {{$errors->has('message')? 'border-danger': ''}}" placeholder="Message">{{old('message')}}</textarea>
								<button type="submit" class="site-btn">send</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact section end-->