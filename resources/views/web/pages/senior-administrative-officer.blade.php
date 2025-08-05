@extends('web.layouts.app')
@section('title','Senior Administrative Officer,  AIIMS Raebareli')
@section('content')

			<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Senior Administrative officer</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Administration</li>
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
					<!--Right Side Content-->
					<div class="col-xl-3 col-lg-4 col-md-12">
						<div class="card">
							<div class="item-user">
								<div class="profile-pic mb-0">
									<!--<img src="/assets/images/photos/samir-shukla.jpg" class="w-100" alt="Mr. Samir Shukla
">-->
								</div>
							</div>
							<div class="card-body item-user">
								 <div class="ms-1">
									<a href="userprofile.html" class="text-dark">
									   <h4 class="mt-1 mb-3 font-weight-bold">---
</h4>
									</a>
									<span class="">---</span><br>
									 </div>
							</div>
							
								<div class="card-body item-user">
								<h4 class="mb-4">Contact Info</h4>
								<div>
									<h6><span class="font-weight-semibold"><i class="fa fa-envelope me-3 mb-2"></i></span><a href="javascript:void(0);" class="text-body">--- </a></h6>
									<h6><span class="font-weight-semibold"><i class="fa fa-phone me-3  mb-2"></i></span><a href="javascript:void(0);" class="text-primary"> +91 ---</a></h6>
								</div>
							</div>
							
						</div>
						
					</div>
					<!--Right Side Content-->

					<div class="col-xl-9 col-lg-8 col-md-12">
					    <div class="card">
					        
					       
					        <div class="card-header text-center">
									<h3 class="card-title ">Biographical:</h3>
								</div>
						<div class="card-body">
											
												<div class="mb-4">
													<p>
													    Coming Soon</p>
													     
												</div>
												
												
											</div>	
											
						</div>
					<div class="card">
        <div class="card-header">
            <h3 class="card-title">Administrative Staff List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive border-top mb-0 ">
               <!-- <table class="table table-bordered table-hover  mb-0">
                    <thead class="bg-primary text-white text-nowrap">
                        <tr>
                            <th class="text-white">S. No.</th>
                            <th class="text-white">Name</th>
                            <th class="text-white">Designation</th>
                            <th class="text-white">Contact Emai Id</th>
                        </tr>
                    </thead>
                    <tbody>
                                                                                <tr>
                                                                <td>1-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Pritam Kumar</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Private Secretary</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">aiimsrblps2018@gmail.com</h4></td>
                            </tr>
                                                        <tr>
                                                                <td>2-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Arpit Bajpai</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Programmer</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">aiimsrblprogrammer@gmail.com</h4></td>
                            </tr>
                                                        <tr>
                                                                <td>3-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Raju Kumar</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Office Assistant (NS)</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">officeassistantaiimsrbl@gmail.com</h4></td>
                            </tr>
                                                        <tr>
                                                                <td>4-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Ms. Preeti Sharma</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Office Assistant (NS)</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">ps871993@gmail.com</h4></td>
                            </tr>
                                                        <tr>
                                                                <td>5-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Bibek Keshari</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Junior Hindi Translator</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">bibekkshri10@gmail.com</h4></td>
                            </tr>
                                                        <tr>
                                                                <td>6-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Ajay Kumar</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Assistant Security Officer</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">asoaiimsrbl@gmail.com</h4></td>
                            </tr>
                            <tr>
                                                                <td>7-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Vijay Kumar</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Receptionist</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">avman.6kumar@gmail.com</h4></td>
                            </tr>
                            <tr>
                                                                <td>8-</td>
                                                                <td><h4 class="mb-2 fs-16 font-weight-semibold">Mr. Anil Kumar Prajapati</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">Stenographer</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">anildew09@gmail.com</h4></td>
                            </tr>
                                                                        </tbody>
                </table>-->
            </div>
        </div>
    </div>
					</div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

