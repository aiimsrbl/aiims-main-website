@extends('web.layouts.app')
@section('title','NIRF | AIIMS Raebareli')
@section('content')
   
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">NIRF</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">NIRF</li>
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
                        <h3 class="widget-title fs-16 mt-6">National Institutional Ranking Framework</h3>
                        <hr class="widget-hr">
                        <div class="row">
					<div class="col-lg-12">
						<div class="card ">
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">Release Year</th>
												<th class="text-white">Title</th>
												
												
												<th class="text-white">Download</th>
											</tr>
										</thead>
										<tbody>
											 <tr>
											   <td>Medical - 2025</td>
											   <td>National Institutional Ranking Framework - 2025</td>
											  
											   <td><a href="storage/nirf/All-India-Institute-of-Medical-Sciences-Raebareli20250217-.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
																</i>Download</a></td>
											</tr> 
										</tbody>
									</table>
								</div>								
											
							</div>
						</div>
					</div>
				</div>
			</div>
				
				
                        <hr class="widget-hr">
                        <div class="col-md-5">
                    <div class="single-page" ><div class="col-lg-12 col-xl-12 col-md-12 d-block mx-auto">
                                <div class="wrapper wrapper2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
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

