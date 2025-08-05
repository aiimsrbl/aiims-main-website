@extends('web.layouts.app')
@section('title','Photo Gallery | AIIMS Raebareli')
@section('content')
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
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/1.JPG')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
           <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/2.jpg')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/3.jpg')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/4.jpg')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/5.jpg')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/7.JPG')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/8.JPG')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/9.JPG')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/10.JPG')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                </div>
              </div>
            </div>
          </div>
          <div class="item text-center">
            <div class="row">
              <div class="col-xl-12 col-md-12 d-block mx-auto">
                <div class="testimonia text-center">
                  
                  <img src="{{asset('assets/images/gallery/11.JPG')}}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
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
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">Gallery</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Gallery</li>
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
				    <div class="col-md-4 col-sm-4 col-xs-6">
				        <div class="card mb-0">
          <div class="item7-card-img">
            <a href="javascript:void(0);"></a>
            <img src="{{asset('assets/images/gallery/1.JPG')}}" alt="AIIMSRBL Gallery" class="cover-image">
          </div>
          <div class="card-body p-4">
            <p>Welcomed MBBS 2022 batch for the pin up ceremony. In the presence of our Chief Guest Hon. VC KGMU Lt Gen Dr Bipin Puri along with our ED 
Dr Arvind Rajwanshi.
 </p>
            <div class="item7-card-desc d-flex mb-2">
              <a href="javascript:void(0);">
                <i class="fa fa-calendar-o text-muted me-2"></i>Dec-03-2022 </a>
              <div class="ms-auto">
               
                  <button class="btn btn-outline-primary btn-sm icons" data-bs-toggle="modal" data-bs-target="#myModal">View Gallery</button>
              </div>
            </div>
          </div>
        </div>
				    </div>
				</div>
			</div>
		</section>
		<!--/Tenders Listings-->
@endsection

