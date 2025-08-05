@extends('web.layouts.app')
@section('title','Nursing Examination Result | All India Institute of Medical Sciences, Raebareli')
@section('content')
<!--Sliders Section-->
<!--Sliders Section-->
	<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
		<div class="header-text mb-0">
			<div class="container">
				<div class="text-center text-white ">
					<h1 class="">Nursing Examination Result</h1>
					<ol class="breadcrumb text-center">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item"><a href="javascript:void(0);">Student Corner</a></li>
						<li class="breadcrumb-item active text-white" aria-current="page">Nursing Examination Result</li>
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
            <h3 class="card-title">Nursing Examination Result</h3>
        </div>
        <div class="card-body">
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
                         <tr>
                           <td>14-10-2024</td>
                           <td>B.Sc. (Paramedical) Courses First Year Oct-2024 Exam Supplementary Result (Batch 2023)</td>
                          
                           <td><a href="/storage/results/Suppl BSC Paramedical Results Oct-2024 (3 students).pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                           </tr> 
                        <tr>
                           <td>14-10-2024</td>
                           <td>B.Sc. (Hons) NURSING First Year October - 2024 Examination Supplementary Result(Batch 2023)</td>
                          
                           <td><a href="/storage/results/Suppl BSC NURSING Result Oct-2024 (1 student).pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                           </tr> 
                        <!--<tr>
                           <td>14-10-2024</td>
                           <td>B.Sc. (Paramedical & Allied Health Courses) First Year Annua Supplementary Result - 2024 (Batch 2023)</td>
                          
                           <td><a href="https://aiimsrbl.edu.in/image?p=spotlights%2Fspotlight_5aed5d274259dd4efe86f6326e837959.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                           </tr> -->
                        <tr>
                           <td>24-08-2024</td>
                           <td>B.Sc. (Paramedical & Allied Health Courses) First Year Annual Result - 2024 (Batch 2023)</td>
                          
                           <td><a href="https://aiimsrbl.edu.in/image?p=spotlights%2Fspotlight_5aed5d274259dd4efe86f6326e837959.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
                           </tr> 
                      <tr>
                           <td>17-08-2024</td>
                           <td>BSc (Hons) Nursing First Result July-August 2024 (2023 Batch)</td>
                          
                           <td><a href="https://aiimsrbl.edu.in/image?p=spotlights%2Fspotlight_6852bb1a80aa04daf0a62ce7118df187.pdf" target="_blank" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a></td>
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

