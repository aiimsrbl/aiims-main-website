@extends('web.layouts.app')
@section('title','About President | AIIMS Raebareli')
@section('content')


			<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">President</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">President</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
    <!--Tenders listing-->
	<section class="sptb">
			<div class="container">
				<div class="row">
					<!--Right Side Content-->
					<div class="col-xl-3 col-lg-4 col-md-12">
						<div class="card">
							<div class="item-user">
								<div class="profile-pic mb-0">
									<img src="assets/download/dr-rv-ramani.jpg" class="w-100" alt="user">
								</div>
							</div>
							<div class="card-body item-user">
								 <div class="ms-1">
									<a href="userprofile.html" class="text-dark">
									   <h4 class="mt-1 mb-3 font-weight-bold">Dr. R. V. Ramani</h4>
									</a>
									<span class="">President,  AIIMS Raebareli</span><br>
									 </div>
							</div>
							
								<div class="card-body item-user">
								<h4 class="mb-4">Contact Info</h4>
								<div>
									<h6><span class="font-weight-semibold"><i class="fa fa-envelope me-3 mb-2"></i></span><a href="javascript:void(0);" class="text-body"> ---</a></h6>
									<h6><span class="font-weight-semibold"><i class="fa fa-phone me-3  mb-2"></i></span><a href="javascript:void(0);" class="text-primary"> ---</a></h6>
								</div>
							</div>
							
						</div>
						
					</div>
					<!--Right Side Content-->

					<div class="col-xl-9 col-lg-8 col-md-12">
					    <div class="card"><div class="card-header text-center">
									<h3 class="card-title ">Biographical:</h3>
								</div>
						<div class="card-body">
											
												<div class="mb-4">
													<p>--</p>
												</div>
												
												
											</div>	
						</div>
					
					</div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

