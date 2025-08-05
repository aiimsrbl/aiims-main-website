@extends('web.layouts.app')
@section('title','Anti-Ragging Commitees | All India Institute of Medical Sciences, Raebareli')
@section('content')
<!--Sliders Section-->
<!--Sliders Section-->
	<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white ">
					<h1 class="">Commitees</h1>
					<ol class="breadcrumb text-center">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Student Corner</a></li>
						<li class="breadcrumb-item active text-white" aria-current="page">Commitees</li>
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
            <h3 class="card-title">Commitees Details</h3>
        </div>
        <div class="card-body">
            
        <div class="panel-group1 col-md-12">
            <div class="panel panel-default mb-4 border p-0">
            <div class="panel-heading1">
                <h4 class="panel-title1">
                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-parent="#accordion2" href="#collapseone1" aria-expanded="false">
                    <i class="fa fa-hand-o-right text-success" aria-hidden="true"></i> Click to View Antiragging Squad Commitee </a>
                </h4>
            </div>
            <div id="collapseone1" class="panel-collapse active collapse" role="tabpanel" aria-expanded="false" style="">
                <div class="panel-body bg-white">
                    <div class="table-responsive border-top mb-0 ">
                        <table class="table table-bordered table-hover  mb-0">
                        <thead class="bg-primary text-white text-nowrap">
                            <tr>
                            <th class="text-white">Release Date</th>
                            <th class="text-white">Title</th>
                            
                            <th class="text-white">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                                                        <tr><td colspan="4" class="text-center text-danger">Data Not Found</td></tr>
                                                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>  
        <div class="panel-group1 col-md-12">
            <div class="panel panel-default mb-4 border p-0">
            <div class="panel-heading1">
                <h4 class="panel-title1">
                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-parent="#accordion2" href="#collapseone2" aria-expanded="false">
                    <i class="fa fa-hand-o-right text-success" aria-hidden="true"></i> Click to View Antiragging Committee  </a>
                </h4>
            </div>
            <div id="collapseone2" class="panel-collapse active collapse" role="tabpanel" aria-expanded="false" style="">
                <div class="panel-body bg-white">
                    <div class="table-responsive border-top mb-0 ">
                        <table class="table table-bordered table-hover  mb-0">
                        <thead class="bg-primary text-white text-nowrap">
                            <tr>
                            <th class="text-white">Release Date</th>
                            <th class="text-white">Title</th>
                           
                            <th class="text-white">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                                                        <tr><td colspan="4" class="text-center text-danger">Data Not Found</td></tr>
                                                    </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>  </div>
        
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

