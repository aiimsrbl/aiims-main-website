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
                <table class="table table-bordered table-hover  mb-0">
                    <thead class="bg-primary text-white text-nowrap">
                        <tr>
                            <th class="text-white">S. No.</th>
                            <th class="text-white">Title</th>
                            
                            
                            <th class="text-white">Download</th>
                            <th class="text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                                         <tr>
                           <td>1</td>
                           <td>Hostel leave application</td>
                           <td><a href="assets/download/admission/1884807292.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                                                      <td class="">OPEN</td>
                                                   </tr>
                                                <tr>
                           <td>2</td>
                           <td>Hostel room change form</td>
                           <td><a href="assets/download/admission/16284807292.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                                                      <td class="">OPEN</td>
                                                   </tr>
                                                <tr>
                           <td>3</td>
                           <td>Hostel Accommodation Form</td>
                           <td><a href="assets/download/admission/15284807292.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                                                      <td class="">OPEN</td>
                                                   </tr>
                                                <tr>
                           <td>4</td>
                           <td>Hostel no dues form</td>
                           <td><a href="assets/download/admission/13284807292.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                                                      <td class="">OPEN</td>
                                                   </tr>
                                                <tr>
                           <td>5</td>
                           <td>Student Booklet</td>
                           <td><a href="assets/download/admission/student-booklet -31-01-2022.pdf" target="_blank"class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                                                      <td class="">OPEN</td>
                                                   </tr>
                                                <tr>
                           <td>6</td>
                           <td>MBBS-2023, Admission process</td>
                           <td><a href="assets/download/admission/MBBS 2023.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                                                      <td class="">OPEN</td>
                                                   </tr>
                        
                                                       
                                                                        </tbody>
                </table>
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

