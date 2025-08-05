@extends('web.layouts.app')
@section('title','Organizational Structure | AIIMS Raebareli')
@section('content')
   
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Organizational Structure</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Organizational Structure</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->

		
   <!--Tenders listing-->
		<section class="sptb">
			<div class="container">
				<img width="100%" alt="Organizatinal Structure" src="assets/org-structure new.png"/>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

