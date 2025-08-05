@extends('web.layouts.app')
@section('title','About AIIMS Acts | AIIMS Raebareli')
@section('content')
<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">AIIMS Acts</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">AIIMS Acts</li>
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
								<h3 class="card-title">AIIMS Acts List</h3>
							</div>
							<div class="card-body">
								<div class="table-responsive border-top mb-0 ">
									<table class="table table-bordered table-hover  mb-0">
										<thead class="bg-primary text-white text-nowrap">
											<tr>
												<th class="text-white">S. No.</th>
											
												<th class="text-white">AIIMS Acts</th>
											
												<th class="text-white">Refrence</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1-</td>
												
												<td><p> Gazette Notification, AIIMS Raebareli, 2013.</p></td>
											
												
												<td>
													<a target="_blank" href="https://aiimsrbl.edu.in/assets/aiims-acts/aiims-act-2012.pdf" class="btn btn-outline-primary btn-sm employers-btn" data-bs-toggle="tooltip" >Download <i class="fa fa-download"></i> </a>
												</td>
											</tr>
											
											<tr>
												<td>2-</td>
												
												<td><p> AIIMS Act, 1956</p></td>
											
												
												<td>
													<a target="_blank" href="https://aiimsrbl.edu.in/assets/aiims-acts/aiims-act-1956.pdf" class="btn btn-outline-primary btn-sm employers-btn" data-bs-toggle="tooltip" >Download <i class="fa fa-download"></i> </a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

