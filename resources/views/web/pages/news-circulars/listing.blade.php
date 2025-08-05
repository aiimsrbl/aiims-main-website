@extends('web.layouts.app')
@section('title','News & Circulars | AIIMS Raebareli')
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
					<div class="col-lg-12 web-news ajax-table-data">
						@include('web.pages.news-circulars.table')
					</div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

