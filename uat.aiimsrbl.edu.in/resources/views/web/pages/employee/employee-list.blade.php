@extends('web.layouts.app')
@section('title','Employees Directory | AIIMS Raebareli')
@section('content')
<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Employees Directory</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Employees Directory</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
    <!--Tenders listing-->
	<section class="sptb">
		<div class="container">
			<div class="row web-employee ajax-table-data">
			    Coming Soon.
			<!--	@include('web.pages.employee.table')-->
			</div>
		</div>
	</section>
	<!--/Tenders Listings-->
@endsection

