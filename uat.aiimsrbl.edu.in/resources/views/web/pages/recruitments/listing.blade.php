@extends('web.layouts.app')
@section('title','Recruitments | All India Institute of Medical Sciences, Raebareli')
@section('content')
<!--Breadcrumb-->
<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
    <div class="header-text mb-0">
        <div class="container">
            <div class="text-center text-white ">
                <h1 class="">Recruitments</h1>
                <ol class="breadcrumb text-center">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                
                    <li class="breadcrumb-item active text-white" aria-current="page">Recruitments</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!--/Breadcrumb-->

<section class="sptb">
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-8 col-md-12">
        <!--Job lists-->
        <div class=" mb-lg-0">
          <div class="">
            <div class="item2-gl">
              <div class="tab-content web-quotations ajax-table-data">
               <h4 class="text-center"><!--<a class="btn btn-success " href="https://www.recruitment.aiimsrbl.edu.in/login?redirect_url=/my-jobs"> Link for Download SR and JR Admit Card</a>-->
                     <a class="btn btn-outline-primary " href="https://www.recruitment.aiimsrbl.edu.in/login?redirect_url=/my-jobs"><i class="fa fa-user me-1"></i> Applicant Login <i class="fa fa-sign-in me-1"></i></a></h4>
                <!--<h5 class="btn-danger">Online Recruitment Portal  is down due to maintenance work. You can see the next update after 7:00PM.</h5>-->
                @include('web.pages.recruitments.table')
              </div>
            </div>
          </div>
        </div>
        <!--/Job lists-->
      </div>
      <!--Right Side Content-->
      <div class="col-xl-3 col-lg-4 col-md-12">
        <div class="card">
          <div class="card-header border-top">
            <h3 class="card-title">Job Type</h3>
          </div>
          <div class="card-body">
            <div class="filter-product-checkboxs">
              <label class="custom-control form-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" name="checkbox1" value="option1">
                <span class="custom-control-label"> Teaching Jobs </span>
              </label>
              <label class="custom-control form-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" name="checkbox2" value="option2">
                <span class="custom-control-label"> Non Teaching Jobs </span>
              </label>
            </div>
          </div>
          <div class="card-footer">
            <a href="javascript:void(0);" class="btn btn-warning btn-block">Apply Filter</a>
          </div>
        </div>
        <div class="card mb-0">
          <div class="card-header">
            <h3 class="card-title">Shares</h3>
          </div>
          <div class="card-body product-filter-desc">
            <div class="product-filter-icons text-center">
              <a target="_blank" href="jhttps://www.facebook.com/aiimsrbl1" class="facebook-bg">
                <i class="fa fa-facebook"></i>
              </a>
              <a target="_blank" href="https://twitter.com/aiims_rbl" class="twitter-bg">
                <i class="fa fa-twitter"></i>
              </a>
              <a target="_blank" href="https://www.instagram.com/aiims.rbl/" class="google-bg">
                <i class="fa fa-youtube"></i>
              </a>
             
              <a target="_blank" href="https://www.youtube.com/channel/UCWY9HVRJo8Mkzt8XFYdGDaA" class="pinterest-bg">
                <i class="fa fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!--/Right Side Content-->
    </div>
  </div>
</section>
<!--/Tenders Listings-->
<section class="sptb">
  <div class="container">
    <div class="section-title center-block text-center">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="card overflow-hidden">
            <div class="power-ribbon power-ribbon-top-left text-warning">
              <span class="bg-warning">
                <i class="fa fa-bolt"></i>
              </span>
            </div>
            <div class="card-body bg-danger">
              <div class="item-det row">
                <div class="col-md-12">
                  <h4 class="mb-2 fs-16 font-weight-semibold ">
                    <span class="badge bg-danger fs-18">Notifications</span>
                  </h4>
                  <h4 style="text-align:left ;" class="mb-2 fs-14 font-weight-semibold text-white">1- If you already applied for a post and again you want to apply for the same post and department then your application can be cancelled without any notification. </h4>
                  <h4 style="text-align:left ;" class="mb-2 fs-14 font-weight-semibold text-white">2- Incomplete form/incorrect form will be rejected without any notification and the department will not entertain on this matter. </h4>
                  <h4 style="text-align:left ;" class="mb-2 fs-14 font-weight-semibold text-white">3- If you are getting any technical issue then write an email to us on <b>aiimsrblprogrammer@gmail.com</b>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <h1>Explore Our Supporters Links</h1>
      <p>All India Institute of Medical Sciences, Raebareli is grateful to our community of foundation, government, and corporate supporters.</p>
    </div>
    <div id="company-carousel" class="owl-carousel owl-carousel-icons4 owl-loaded owl-drag">
      <div class="owl-stage-outer">
        <div class="owl-stage" >
          <div class="owl-item ">
            <div class="item">
              <div class="card mb-0">
                <div class="card-body">
                  <img src="https://old.aiimsrbl.edu.in/images/1.jpg" alt="company1">
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item " >
            <div class="item">
              <div class="card mb-0">
                <div class="card-body">
                  <img src="https://old.aiimsrbl.edu.in/images/2.jpg" alt="company2">
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item " >
            <div class="item">
              <div class="card mb-0">
                <div class="card-body">
                  <img src="https://old.aiimsrbl.edu.in/images/3.jpg" alt="company3">
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item " >
            <div class="item">
              <div class="card mb-0">
                <div class="card-body">
                  <img src="https://old.aiimsrbl.edu.in/images/4.jpg" alt="company4">
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item " >
            <div class="item">
              <div class="card mb-0">
                <div class="card-body">
                  <img src="https://old.aiimsrbl.edu.in/images/5.jpg" alt="company5">
                </div>
              </div>
            </div>
          </div>
          <div class="owl-item " >
            <div class="item">
              <div class="card mb-0">
                <div class="card-body">
                  <img src="https://old.aiimsrbl.edu.in/images/6.jpg" alt="company6">
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
      <div class="owl-nav disabled">
        <button type="button" role="presentation" class="owl-prev">
          <span aria-label="Previous">‹</span>
        </button>
        <button type="button" role="presentation" class="owl-next">
          <span aria-label="Next">›</span>
        </button>
      </div>
      <div class="owl-dots disabled"></div>
    </div>
  </div>
</section>
@endsection

