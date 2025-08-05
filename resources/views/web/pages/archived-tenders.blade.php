@extends('web.layouts.app')
@section('title','Procurements - Archived Tenders List')
@section('content')
<!--Sliders Section-->
<!--Sliders Section-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Archived Tenders</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0);">Procurements</a></li>
							<li class="breadcrumb-item active text-white" aria-current="page">Tenders</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
		<!--/Sliders Section-->


   <!--Tenders listing-->
	<section class="sptb">
			<div class="container">
				<div class="row">
				    <!--Left Side Content-->
				    @include('web.layouts.procurements-left-sidebar')
				    <!--/Left Side Content-->
				    <!--Right Side Content-->
					<div class="col-xl-8 col-lg-8 col-md-12">
						<!--Job lists-->
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="card overflow-hidden">
									
									<div class="row no-gutters blog-list">
										
										<div class="col-xl-12 col-lg-12 col-md-12">
											<div class="card-body">
											    	<a href="javascript:void(0);" class="text-dark"><h4 class="font-12 font-weight-semibold mb-3 fs-14">1- Ref./Adv. Number: AIIIMSRBL/2022/03</h4></a>
												
												<div class="item7-card-desc d-flex mb-1">
													<a href="javascript:void(0);"><i class="fa fa-calendar-o text-muted me-2 text-primary"></i> Date of Publishing:  02-12-2022</a> 
													<a href="javascript:void(0);"><i class="fa fa-calendar-o text-muted me-2 text-primary"></i> Date of Closing: 12-12-2022</a> 
													
												</div>
											    <p class="mb-1">Ut enim ad minima veniam, quis nostrum exercitationem,Ut enim minima veniam, quis nostrum exercitationem.</p>
												<a href="#" class="btn btn-primary btn-sm mt-4">Download <i class="fa fa-download"></i></a>
												<a href="#" class="btn btn-outline-primary btn-sm employers-btn mt-4" data-bs-toggle="tooltip" data-bs-original-title="Download Corrigendum">Corrigendum 1 <i class="fa fa-download"></i> </a>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="center-block text-center">
							<ul class="pagination mb-5 mb-lg-0">
								<li class="page-item page-prev disabled">
									<a class="page-link" href="javascript:void(0);" tabindex="-1">Prev</a>
								</li>
								<li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
								<li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
								<li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
								<li class="page-item page-next">
									<a class="page-link" href="javascript:void(0);">Next</a>
								</li>
							</ul>
						</div>
						<!--/Job lists-->
					</div>
				   <!--/Right Side Content-->
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
		@endsection

