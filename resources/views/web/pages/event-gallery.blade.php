@extends('web.layouts.app')
@section('title','Gallery | AIIMS Raebareli')
@section('content')
   <!-- Popup Intro-->

@if($events && $events->count())
  @foreach($events as $k => $obj)
    @php

      $id = "myModal$obj->id";

      if(($obj->id == $event_id) && isset($obj->galleries) && $obj->galleries->count())
      {
        $id = "myModal";
      }

    @endphp
  <div id="{{$id}}" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom-0">
          <a class="btn-close btn  btn-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close"> Skip </a>
        </div>
        <div class="modal-body">
          <div id="popupcarousel" class="owl-carousel testimonial-owl-carousel4">
                  @if(isset($obj->galleries) && $obj->galleries->count())
                    @foreach($obj->galleries as $obj)
                      <div class="item text-center">
                          <div class="row">
                            <div class="col-xl-12 col-md-12 d-block mx-auto">
                              <div class="testimonia text-center">
                                @if($obj->image && file_exists(storage_path().'/app/public/events/gallery/'.$obj->image))
                                  <img  src="{{ route('image.displayImage',['p'=>'events/gallery/'.$obj->image]) }}" alt="AIIMSRBL Photo Gallery" class="w-100 h-100 mb-5 mx-auto text-center">
                                  <p>{{$obj->title}}<p>
                                @endif
                              </div>
                            </div>
                          </div>
                      </div>
                    @endforeach
                  @endif
            </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endif

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
   <!--Event listing-->
		<section class="sptb">
			<div class="container">
				<div class="row">
            @if($events && $events->count())
              @foreach($events as $k => $obj)
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="card mb-0">
                      <div class="item7-card-img">
                        @if($obj->image && file_exists(storage_path().'/app/public/events/'.$obj->image))
                            <a href="{{ route('image.displayImage',['p'=>'events/'.$obj->image]) }}" target="_blank">
                            </a>
                            <img class="cover-image" src="{{ route('image.displayImage',['p'=>'events/'.$obj->image]) }}">
                        @else
                            <a href="javascript:void(0)"></a>
                            <img class="cover-image" src="{{asset('assets/images/gallery/1.JPG')}}">
                        @endif
                      </div>
                      <div class="card-body p-4">
                        <p>{{$obj->title}}
                          </p>
                        <div class="item7-card-desc d-flex mb-2">
                          <a href="javascript:void(0);">
                            <i class="fa fa-calendar-o text-muted me-2"></i>{{display_date($obj->event_date)}}</a>
                          <div class="ms-auto">

                          @if(isset($obj->galleries) && $obj->galleries->count())

                          @php
                            $id = "myModal$obj->id";

                            if(($obj->id == $event_id) && isset($obj->galleries) && 
                            
                            $obj->galleries->count())
                            {
                              $id = "myModal";
                            }
                          @endphp
                            <button class="btn btn-outline-primary btn-sm icons" data-bs-toggle="modal" data-bs-target="#{{$id}}">View Gallery</button>
                          @endif
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endforeach
            @else
              <h4 class="text-center text-danger">
                  {{DATA_NOT_FOUND}}
              </h4>
            @endif
				</div>
			</div>
		</section>
		<!--/Event Listings-->
@endsection

