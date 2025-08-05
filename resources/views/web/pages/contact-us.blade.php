@extends('web.layouts.app')
@section('title','Contact Us | AIIMS Raebareli')
@section('content')
   
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Contact Us</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Contact Us</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
        <!--Contact-->
            <div class="sptb bg-white">
                <div class="container">
                    <div class="row">
                        <h3 class="widget-title fs-16 mt-6">Support Number & Email ID</h3>
                        <hr class="widget-hr">
                        <div class="row">
					<div class="col-lg-12">
						<div class="card ">
							<div class="card-body">
								<div class="support">
									<div class="row text-white">
										<div class="col-xl-4 col-lg-12 col-md-12 border-end">
											<div class="support-service bg-primary">
												<i class="fa fa-phone"></i>
												<h6>+91 0535-2700020</h6>
												<p>Support number</p>
											</div>
										</div>
										<div class="col-xl-4 col-lg-12 col-md-12 border-end">
											<div class="support-service bg-success">
												<i class="fa fa-clock-o"></i>
												<h6>Mon-Sat(09:00 - 17:00)</h6>
												<p>Working Hours!</p>
											</div>
										</div>
										<div class="col-xl-4 col-lg-12 col-md-12">
											<div class="support-service bg-danger">
												<i class="fa fa-envelope-o"></i>
												<h6>itsection@aiimsrbl.edu.in</h6>
												<p>Support email id</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-body">
								<div class="support">
									<div class="row text-white">
										<div class="col-xl-8 col-lg-12 col-md-8">
											<div class="support-service bg-dark br-2">
												<i class="fa fa-map-marker"></i>
												<h6>AIIMS (All India Institute of Medical Sciences) </h6>
												<p>Dalmau Road, Munshiganj, Raebareli, Uttar Pradesh. India - 229405</p>
											</div>
										</div>
										<div class="col-xl-4 col-lg-12 col-md-4">
											<div class="support-service bg-dark br-2">
												<i class="fa fa-map"></i>
												<h6>Google Map Direction</h6>
												<p><a href="https://www.google.com/maps/dir//All+India+Institute+of+Medical+Sciences,+Raebareli+Dalmau+Rd+Munshiganj,+Uttar+Pradesh+229405/@26.1793795,81.2432574,18z/data=!4m8!4m7!1m0!1m5!1m1!1s0x399ba1b76b43644f:0x2b71324188ee51f5!2m2!1d81.2432574!2d26.1793795" target="_blank">Click to view direction</a></p>
											</div>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<h3 class="widget-title fs-16 mt-6">We are here to help you, submit your query to us.</h3>
                        <hr class="widget-hr">
                        <div class="col-md-5">
                    <div class="single-page" ><div class="col-lg-12 col-xl-12 col-md-12 d-block mx-auto">
                                <div class="wrapper wrapper2">
                                    <form id="contactus_form" class="card-body" tabindex="500">
                                        @csrf
                                        <div class="mail mb-5">
                                            <input type="text" name="name" id="name">
                                            <label>Full Name</label>
                                        </div>
                                        <div class="email mb-5">
                                            <input type="email" name="email" id="email">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="email mb-5">
                                            <input type="text" name="phone" id="phone" maxlength="13">
                                            <label>Phone</label>
                                        </div>
                                        <div class="message mb-5">
                                            <textarea id="message" class="form-control" name="message" rows="6"></textarea>
                                            <label>Message</label>
                                        </div>
                                        <div class="submit mb-0 col-md-6 text-center d-block mx-auto">
                                            <a class="btn btn-primary btn-block" href="javascript:void(0);" onClick="storeInquiry();">Send Message</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">	<div class="card">
							<!--<div class="card-header">
								<h3 class="card-title">Map location</h3>
							</div>-->
							<div class="card-body">
								<!--<div class="map-header">
									<div class="map-header-layer" id="map2"></div>
								</div>-->
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d895.1115726133355!2d81.24154782917729!3d26.182156702467484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399ba1b76b43644f%3A0x2b71324188ee51f5!2sAIIMS%20RAEBARELI!5e0!3m2!1sen!2sin!4v1568628199111!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
							</div>
						</div></div>
                    </div>
                </div>
            </div>
        <!--Contact-->
        <!-- Google Maps Plugin -->
		@endsection
		@push('scripts')
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyCW16SmpzDNLsrP-npQii6_8vBu_EJvEjA"></script>
		<script src="{{asset('assets/plugins/maps-google/jquery.googlemap.js')}}"></script>
		<script src="{{asset('assets/plugins/maps-google/map.js')}}"></script>
		@endpush

