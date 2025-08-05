@extends('web.layouts.app')
@section('title','About Logo | AIIMS Raebareli')
@section('content')
<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">About Logo</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Logo</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->

		
   <!--Tenders listing-->
	
		<section class="sptb bg-white">
			<div class="container">
				<div class="row no-gutters  row-deck find-job">
					<div class="col-md-6">
						<div class="bg-light p-0 box-shadow2 border-transparent w-100">
							<div class="card-body ">
							    <h6 class="card-title fs-18 mb-4">About Logo</h6>
								
							<p class="text-left fs-16">
<ul class="list-unstyled widget-spec  mb-0"><li  class="undefined fs-16">
										<i class="fa fa-hand-o-right text-success" aria-hidden="true"></i>The serpents and the staff symbolises the ambrosial effect of medication provided by the doctors to succour and relieve the ailing humanity.
									</li><li  class="undefined fs-16">
										<i class="fa fa-hand-o-right text-success" aria-hidden="true"></i>The two flapping wings denote the mental prowess of noble doctors in terms of right diagnosis and unending search for right medications to tide over and eradicate physical ailments.
									</li><li  class="undefined fs-16">
										<i class="fa fa-hand-o-right text-success" aria-hidden="true"></i>The sheaves of wheat and people celebrating denote the peace, prosperity amity that was brought about by good health.
									</li><li  class="undefined fs-16">
										<i class="fa fa-hand-o-right text-success" aria-hidden="true"></i>The Sanskrit shaloka "Swasthayam Sarvarthsadhnam" means good health is greatest blessing and pre-requisite for all ventures in life.
										
								</ul>
</p>
							
								
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="p-0 mt-5 mt-md-0 border box-shadow2 w-100">
							<div class="card-body text-center">
							   
								
								<img src="{{asset('assets/images/brand/aiims.png')}}" class="w-100" alt="About Logo AIIMS Raebareli">
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

