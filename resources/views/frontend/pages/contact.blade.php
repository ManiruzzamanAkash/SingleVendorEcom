@extends('frontend.layouts.master')

@section('content')
<!-- contact start-->
<section class="contact-page">
	<div class="container">
		<div class="row section-b-space">
			<div class="col-lg-7 map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50059.12775918716!2d72.78534673554945!3d21.16564923510817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1533793756956"   allowfullscreen></iframe>
			</div>
			<div class="col-lg-5">
				<div class="contact-right">
					<ul>
						<li>
							<div class="contact-icon">
								<img src="../assets/images/icon/call.png" alt="call" class="blur-up lazyload">
								<h6>Contact Us</h6>
							</div>
							<div class="media-body">
								<p>123-456-7898</p>
								<p>123-456-7898</p>
							</div>
						</li>
						<li>
							<div class="contact-icon">
								<img src="../assets/images/icon/location.png" alt="location">
								<h6>Address</h6>
							</div>
							<div class="media-body">
								<p>Megamart Demo Store Demo Store India-3654123</p>
							</div>
						</li>
						<li>
							<div class="contact-icon">
								<img src="../assets/images/icon/mail.png" alt="mail">
								<h6>Mail</h6>
							</div>
							<div class="media-body">
								<p>Support@Mycart.Com</p>
								<p>info@Mycart.Com</p>
							</div>
						</li>
						<li>
							<div class="contact-icon">
								<img src="../assets/images/icon/fax.png" alt="fax">
								<h6>Fax</h6>
							</div>
							<div class="media-body">
								<p>123456798</p>
								<p>123455</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<form class="theme-form contact-form">
					<div class="form-row">
						<div class="col-md-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" placeholder="Enter Your name" required="">
						</div>
						<div class="col-md-6">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" placeholder="Email" required="">
						</div>
						<div class="col-md-12">
							<label for="review">Phone number</label>
							<input type="text" class="form-control" id="review" placeholder="Enter your number" required="">
						</div>
						<div class="col-md-12">
							<label for="review">Write Your Message</label>
							<textarea class="form-control" placeholder="Write Your Message" id="exampleFormControlTextarea1" rows="6"></textarea>
						</div>
						<div class="col-md-12">
							<button class="btn btn-theme theme-btn-sm" type="submit">Send Your Message</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!-- contact End -->

@endsection
