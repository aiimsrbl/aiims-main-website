@extends('web.layouts.app')
@section('title','Procurements - Archived Tenders List')
@section('content')
	<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">News & Circulars</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">News & Circulars</li>
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
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">News & Circulars List</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">S. No.</th>
											
												<th class="text-white">News & Circulars</th>
											
												<th class="text-white">Release Date</th>
												<th class="text-white">Refrence</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1-</td>
												
												<td><p> Inviting e-tender for Supply of internal paddles for defibrillators compatible with Nihon-Kohden model 5631-K under Proprietary Article at All India Institute of Medical Sciences, Raebareli (U.P.)</p></td>
											
												<td>07-12-2022</td>
												
												<td>
													<a href="#" class="btn btn-outline-primary btn-sm employers-btn" data-bs-toggle="tooltip" data-bs-original-title="Download Corrigendum">Download <i class="fa fa-download"></i> </a>
												</td>
											</tr>
											
											
										</tbody>
									</table>
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
					</div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

