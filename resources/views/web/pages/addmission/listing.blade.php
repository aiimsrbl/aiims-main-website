

@extends('web.layouts.app')
@section('title','ADMISSION INFORMATION PORTAL | All India Institute of Medical Sciences, Raebareli')
@section('content')
<!--Sliders Section-->
<!--Sliders Section-->
	<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white ">
					<h1 class="">Admission Procedure/Information</h1>
					<ol class="breadcrumb text-center">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Student Corner</a></li>
						<li class="breadcrumb-item active text-white" aria-current="page">Admission Procedure/Information</li>
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
				    @include('web.layouts.student-left-sidebar')
				    <!--/Left Side Content-->
				    <!--Right Side Content-->
					<div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 web-current-tenders ajax-table-data">
						<!--Job lists-->
					<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
       <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Admission Procedure/Information</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive border-top mb-0 ">
               	@include('web.pages.addmission.table')
            </div>
        </div>
    </div>
</div>
       
    </div>
</div>

						<!--/Job lists-->
					</div>
				   <!--/Right Side Content-->
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

