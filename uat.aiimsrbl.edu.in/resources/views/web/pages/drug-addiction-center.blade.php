@extends('web.layouts.app')
@section('title','Drug Addiction Center | AIIMS Raebareli')
@section('content')
   
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Drug Addiction Center</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Drug Addiction Center</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->

		
   <!--Tenders listing-->
		<section class="sptb">
			<div class="container">
			    <h3 class="widget-title fs-16"> Celebrating One Year of Hope & Healing at AIIMS Raebareli</h3>
			    <hr class="widget-hr">
			
			
				<iframe width="100%" height="500" src="https://www.youtube.com/embed/lKMEkW7EwRU" title="ATC AIIMS Raebareli" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				
			</div>
			<div class="container">
			    <h3 class="widget-title fs-16">ATF AIIMS Raebareli - Orientation Video</h3>
			    <hr class="widget-hr">
				<iframe width="100%" height="500" src="https://www.youtube.com/embed/ufaMsgIRROQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
			
			</div>
			
		</section>
		<!--/Tenders Listings-->
@endsection

