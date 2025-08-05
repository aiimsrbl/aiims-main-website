@extends('web.layouts.app')
@section('title','Departments - AIIMS Raebareli')
@section('content')

	<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Departments</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Departments</li>
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
					@if($data->count())
						@foreach($data as $obj)
						@if($obj->id!=40)
						<div class="col-xl-4 col-lg-4 col-md-4 col-xs-6">
							<div class="card">
								<div class="card-body">
									<div class="item-det row">
										<div class="col-md-12">
											<a href="{{route('web.department-details',[$obj->id])}}" class="text-dark">
												<h4 class="mb-2 fs-16 font-weight-semibold">{{$obj->name}}</h4>
											</a>
											<div class="">
												<ul class="mb-0 d-flex">
													<li class="me-5">
													<a href="{{route('web.department-details',[$obj->id])}}"  class="icons">
														View Details </a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					@else
					<h4 class="text-danger text-center">{{DATA_NOT_FOUND}}</h4>
					@endif
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

