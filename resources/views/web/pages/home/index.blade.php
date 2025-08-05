@extends('web.layouts.app')
@section('title','AIIMS Raebareli | History, Mission & Vision')
@section('content')
<!--Sliders Section-->
<!--Sliders Section-->
<!-- Popup Intro-->


<div id="myModal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <a class="btn-close btn  btn-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close"> Skip </a>
      </div>
      <div class="modal-body">
        <div id="popupcarousel" class="owl-carousel testimonial-owl-carousel4">
         
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center"><h3>OPD Schedule AIIMS, Raebareli</h3>
                  <img src="https://aiimsrbl.edu.in/assets/images/opd-schedule-2025.jpg" class="w-100 h-100 mb-5 mx-auto text-center" alt="image">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-8 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  <img src="../assets/images/products/intro/join.svg" class="w-70 mb-5 mx-auto text-center" alt="image">
                  <h3>HELPLINE & SUPPORT</h3>
                  <p> Phone no: +91 0535-2700020 <br /> Email us: itsection@aiimsrbl.edu.in <br>
                  </p>
                  <p> For any technical issue you may contact on<br />  aiimsrblprogrammer@gmail.com  <br>
                  </p>
                  <a href="/contacts" class="btn btn-primary  mb-3">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Popup Intro-->
<div id="main">
    
    <div id="carousel-indicators4" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators4 carousel-indicators">
        
        <li data-bs-target="#carousel-indicators4" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carousel-indicators4" data-bs-slide-to="1" class=""></li>
        <li data-bs-target="#carousel-indicators4" data-bs-slide-to="2" class=""></li>
         <li data-bs-target="#carousel-indicators4" data-bs-slide-to="3" class=""></li>
          <li data-bs-target="#carousel-indicators4" data-bs-slide-to="4" class=""></li>
           <li data-bs-target="#carousel-indicators4" data-bs-slide-to="5" class=""></li>
           <li data-bs-target="#carousel-indicators4" data-bs-slide-to="6" class=""></li>
           <li data-bs-target="#carousel-indicators4" data-bs-slide-to="7" class=""></li>
           <li data-bs-target="#carousel-indicators4" data-bs-slide-to="8" class=""></li>
         <li data-bs-target="#carousel-indicators4" data-bs-slide-to="9" class=""></li>
      </ol>
      <div class="carousel-inner">
      
      <div class="carousel-item active">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/Aiims-Banner-111.jpg')}}" data-holder-rendered="true">
        </div>
        <div class="carousel-item ">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/Aiims-Banner-1.png')}}" data-holder-rendered="true">
        </div>
         <div class="carousel-item">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/aiims-yogi-g.JPG')}}" data-holder-rendered="true">
        </div>
         <div class="carousel-item ">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/Aiims-Banner-3.png')}}" data-holder-rendered="true">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/Aiims-Banner-4.png')}}" data-holder-rendered="true">
        </div>
          <div class="carousel-item ">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/slider/main-banner.jpg')}}" data-holder-rendered="true">
        </div>
        
        <div class="carousel-item">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/aiims-festival.JPG')}}" data-holder-rendered="true">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/Aiims-Banner-5.png')}}" data-holder-rendered="true">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/aiims-fest.JPG')}}" data-holder-rendered="true">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" alt="" src="{{asset('assets/images/banners/aiims-2025-fes.JPG')}}" data-holder-rendered="true">
        </div>
      </div>
										
  
  </section>
</div>
<!--/Sliders Section-->
<!--Breadcrumb-->
@include('web.pages.home.spotlight')

<!--/Breadcrumb-->
<!--Tenders listing-->

@include('web.pages.home.hospital_statistics')

<section class="sptb pb-2 pt-2 bg-white">
  <div class="container-fluid">
    <div class="row no-gutters  row-deck find-job">
      <div class="col-md-3 col-sm-3">
        <div class="p-0 mt-5 mt-md-0 border box-shadow2 w-100">
          <div class="card-body text-center">
            <div class="bg-warning icon-bg  icon-service  text-purple mb-4" style="width:85px; height:85px;">
              <img src="/assets/images/photos/mr-jp-nadda.jpg" class="border brround avatar-md w-100 h-100" alt="Mr. Jagat Prakash Nadda">
              
            </div>
            <h4 class="mb-2 fs-18 font-weight-semibold"><a target="_blank" class="text-dark" href="/hfwm">Shri Jagat Prakash Nadda</a></h4>
            <p>Union Minister of Health, Chemicals & Fertilizers</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="bg-light p-0 box-shadow2 border-transparent w-100">
          <div class="card-body text-center">
            <div class="bg-success icon-bg  icon-service text-purple mb-4" style="width:85px; height:85px;">
              <img src="/assets/images/photos/shri-prataprao-jadhav.jpg" class="border brround avatar-md w-100 h-100" alt="Prataprao Ganpatrao Jadhav">
              <!-- <img src="/assets/images/av-img.jpg" class="border brround avatar-md w-100 h-100" alt="Sales">-->
            </div>
            <h4 class="mb-2 fs-18 font-weight-semibold"><a target="_blank" class="text-dark" href="https://en.wikipedia.org/wiki/Prataprao_Jadhav">Mr. Prataprao Ganpatrao Jadhav</a></h4>
            <p>Minister of State AYUSH, Health & Family Welfare</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class=" p-0 mt-5 mt-md-0 border box-shadow2 w-100">
          <div class="card-body text-center">
            <div class="bg-success icon-bg  icon-service text-purple mb-4" style="width:85px; height:85px;">
              <img src="/assets/images/photos/ms-anupriya-patel.jpg" class="border brround avatar-md w-100 h-100" alt="Sales">
             
              
              
            </div>
            <h4 class="mb-2 fs-18 font-weight-semibold"><a target="_blank" class="text-dark" href="https://en.wikipedia.org/wiki/Anupriya_Patel">Mrs. Anupriya Singh Patel</a></h4>
            <p>Minister of State for Health and Family Welfare</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="bg-light p-0 mt-5 mt-md-0 border box-shadow2 w-100">
          <div class="card-body text-center">
            <!--<div class="bg-warning icon-bg  icon-service text-purple mb-4" style="width:85px; height:85px;">
              <img src="assets/download/dr-ak-singh.jpg" class="border brround avatar-md w-100 h-100" alt="Sales">
            </div>
            <h4 class="mb-2 fs-18 font-weight-semibold"><a class="text-dark" href="/president">Prof. (Dr.) AK Singh</a></h4>
            <p>President, AIIMS Raebareli</p>-->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sptb">
  <div class="container">
    <div class="row">
      <!--Right Side Content-->
      <div class="col-xl-3 col-lg-4 col-md-12">
        <div class="card">
          <div class="item-user">
            <div class="profile-pic mb-0">
              <img src="/assets/images/ED-AIIMS-RBL-2.jpg" class="w-100" alt="user">
            </div>
          </div>
          <div class="card-body item-user">
            <div class="ms-1">
              <a href="#" class="text-dark">
                <h4 class="mt-1 mb-3 fs-16 font-weight-bold">Maj Gen (Dr) Vibha Dutta, SM (Retd)</h4>
              </a>
              <span class="">Executive Director</span>
              <br>
            </div>
          </div>
          <div class="card-body item-user importantLinkBG">
            <h4 class="mb-1">Important Links</h4>
          </div>
          <ul class="side-menu open">
              
               <li class="slide">
              <a class="side-menu__item  font-weight-semibold" href="{{route('web.bmwservices')}}">
                <span class="side-menu__label">Sanitation & BMW Services</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item  font-weight-semibold" href="https://aiimsrbl.ovidds.com/" onclick="return confirmLinkClick()" target="_blank">
                <span class="side-menu__label">e Library</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item  font-weight-semibold" href="{{route('web.telemedicine')}}">
                <span class="side-menu__label">Telemedicine</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item  font-weight-semibold" href="{{route('web.drug-addiction-center')}}">
                <span class="side-menu__label">Drug Addiction Center</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item font-weight-semibold" href="{{route('web.blood-bank-helpline')}}">
                <span class="side-menu__label">Blood Bank Helpline</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item font-weight-semibold" href="{{route('web.patient-reports')}}">
                <span class="side-menu__label">Patient Reports</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item font-weight-semibold" href="{{route('web.trauma-and-amergency-helpline')}}">
                <span class="side-menu__label">Trauma & Emergency Helpline</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item font-weight-semibold" href="{{route('web.stroke-care-unit-helpline')}}">
                <span class="side-menu__label">Stroke Care Unit Helpline</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item font-weight-semibold" href="{{route('web.body-donation')}}">
                <span class="side-menu__label">Body Donation</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a class="side-menu__item font-weight-semibold" href="{{route('web.adverse-drug-reaction-helpline')}}">
                <span class="side-menu__label">Adverse Drug Reaction Helpline</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
            <li class="slide">
              <a target="_blank" class="side-menu__item font-weight-semibold" href="/assets/download/Conflict of Interest.pdf">
                <span class="side-menu__label">Conflict of Interest-Declaration</span>
                <i class="angle fa fa-angle-right"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!--Right Side Content-->
      <div class="col-xl-9 col-lg-9 col-md-12">
          <div class="card">
							<div class="card-header bg-primary-transparent">
								<h3 class="card-title fs-18">Welcome to AIIMS, RAEBARELI</h3>
							</div>
							<div class="card-body pb-3">
							     <p class="text-start fs-16">All India Institute of Medical Sciences (AIIMS) at Raebareli in Uttar Pradesh was approved in February, 2009 under Phase-II of Pradhan Mantri Sawasthya Suraksha Yojana (PMSSY) at an approved cost of Rs. 823 crore. The State Government had agreed to provide 148 acres of land. A Gazette Notification was issued on 13th August, 2013 for establishment of the All India Institute of Medical Sciences at Raebareli... <a href="/history" class="btn btn-link btn-sm icons fs-16"> Read More</a>
              </p>
							</div>
							</div>
        <!--Featured Jobs-->
        
        <!--/Featured Jobs-->
        <div class="row no-gutters row-deck find-job">
          <div class="col-md-6">
            @include('web.pages.home.news')
          </div>
          <div class="col-md-6">
            @include('web.pages.home.office_order')
          </div>
        </div>
      </div>
    </div>
    <h3 class="widget-title fs-16">Quick Access</h3>
    <hr class="widget-hr">
    <div class="row">
					<div class="col-md-12">
						<div id="small-categories" class="owl-carousel owl-carousel-icons7">
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="/dashboard-login"></a>
											<div class="cat-img me-4 bg-primary-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/assets/images/aiimsrbl.edu.in-01.svg" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3 mt-0">Faculty</h5>
												<small class="badge rounded-pill badge bg-success me-2">Dashboard Login</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="/patient-reports"></a>
											<div class="cat-img me-4 bg-secondary-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/assets/images/aiimsrbl.edu.in-02.svg" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3">Patient</h5>
												<small class="badge rounded-pill badge bg-success me-2">Corner </small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="/addmission"></a>
											<div class="cat-img me-4 bg-success-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/assets/images/aiimsrbl.edu.in-03.svg" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3">Student</h5>
												<small class="badge rounded-pill badge bg-success me-2">Study Zone</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="/dashboard-login"></a>
											<div class="cat-img me-4 bg-info-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/assets/images/aiimsrbl.edu.in-04.svg" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3">Employee</h5>
												<small class="badge rounded-pill badge bg-success me-2">Dashboard Login</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="#"></a>
											<div class="cat-img me-4 bg-warning-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/assets/images/aiimsrbl.edu.in-05.svg" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3">Vendor</h5>
												<small class="badge rounded-pill badge bg-success me-2">Institutional Programs</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="#"></a>
											<div class="cat-img me-4 bg-info-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/assets/images/aiimsrbl.edu.in-06.svg" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3 mt-0">Alumni</h5>
												<small class="badge rounded-pill badge bg-success me-2">Corner</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="item">
								<div class="card mb-0">
									<div class="card-body p-3">
										<div class="cat-item d-flex">
											<a href="/event-and-workshop"></a>
											<div class="cat-img me-4 bg-info-transparent p-3 brround">
												<img src="https://old.aiimsrbl.edu.in/images/1.png" alt="img" class="image-serve">
												
											</div>
											<div class="cat-desc text-start">
												<h5 class="mb-3 mt-0">Event, Workshop & Media</h5>
												<small class="badge rounded-pill badge bg-success me-2">Corner</small>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						</div>
					</div>
				</div>

  </div>
</section>
<!--Tenders-->
@include('web.pages.home.tenders')
<!--End Tenders-->

<!--QUOTATIONS-->
@include('web.pages.home.quotations')
<!--END QUOTATIONS-->

<!-- Event -->
  @include('web.pages.home.events');
<!-- End Event -->


<!--/Tenders Listings-->
<!--Top Companies-->
<section class="sptb">
  <div class="container">
    <div class="section-title center-block text-center">
      <h1>Explore Our Supporters Links</h1>
      <p>All India Institute of Medical Sciences, Raebareli is grateful to our community of foundation, government, and corporate supporters.</p>
    </div>
    <div id="company-carousel" class="owl-carousel owl-carousel-icons4">
      <div class="item">
        <div class="card mb-0">
          <div class="card-body">
            <img src="https://old.aiimsrbl.edu.in/images/1.jpg" alt="company1">
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card mb-0">
          <div class="card-body">
            <img src="https://old.aiimsrbl.edu.in/images/2.jpg" alt="company2">
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card mb-0">
          <div class="card-body">
            <img src="https://old.aiimsrbl.edu.in/images/3.jpg" alt="company3">
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card mb-0">
          <div class="card-body">
            <img src="https://old.aiimsrbl.edu.in/images/4.jpg" alt="company4">
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card mb-0">
          <div class="card-body">
            <img src="https://old.aiimsrbl.edu.in/images/5.jpg" alt="company5">
          </div>
        </div>
      </div>
      <div class="item">
        <div class="card mb-0">
          <div class="card-body">
            <img src="https://old.aiimsrbl.edu.in/images/6.jpg" alt="company6">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Top Companies-->
@endsection

<script>
  function confirmLinkClick() {
      return confirm("You are being redirected to external link AIIMS Raebareli is not liable for any data loss or technical issues that may occur on the portal");
  }
</script>