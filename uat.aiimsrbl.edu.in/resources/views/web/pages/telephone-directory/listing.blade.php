@extends('web.layouts.app')
@section('title','Telephone Directory | AIIMS Raebareli')
@section('content')
<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Telephone Directory</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
							<li class="breadcrumb-item active text-white" aria-current="page">Directory</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
    <!--Tenders listing-->
	<section class="sptb">
			<div class="container">
			<!--	<div class="row web-telephone-directory ajax-table-data">
					@include('web.pages.telephone-directory.table');
				</div>-->
				<div class="row">
					<div class="col-lg-12">
						<div class="card ">
						<div class="card-body">
            <div class="table-responsive border-top mb-0 ">
                <table class="table table-bordered table-hover  mb-0">
                    <thead class="bg-primary text-white text-nowrap">
                        <tr>
                            <th class="text-white">S. No.</th>
                            <th class="text-white">Description</th>
                           
                            <th class="text-white">Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                               
                                <td>1-</td>
                               
                                <td><h4 class="mb-2 fs-16 "> <!--The central  Telephone exchange number of AIIMS Raebareli is 0535-2700020, For any communication you may call on the mentioned number and request the operator to connect any of the Officials, Departments or OPD.--> Coming Soon</h4></td>
                               
                                <td>
                                    <!--<a href="https://aiimsrbl.edu.in/assets/Telephone Directory FP_merged.pdf" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a>-->
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

