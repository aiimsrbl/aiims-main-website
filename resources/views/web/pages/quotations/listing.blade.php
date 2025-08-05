@extends('web.layouts.app')
@section('title','Quotations | AIIMS Raebareli')
@section('content')
<!--Sliders Section-->
<!--Sliders Section-->
	<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
	<div class="header-text mb-0">
		<div class="container">
			<div class="text-center text-white ">
				<h1 class="">{{ucfirst($type)}} Quotations</h1>
				<ol class="breadcrumb text-center">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item"><a href="javascript:void(0);">Procurements</a></li>
					<li class="breadcrumb-item active text-white" aria-current="page">Quotations</li>
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
					<div class="col-xl-8 col-lg-8 col-md-12 web-quotations ajax-table-data">
						<!--Job lists-->
						@include('web.pages.quotations.table')
						<!--/Job lists-->
					</div>
				   <!--/Right Side Content-->
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

