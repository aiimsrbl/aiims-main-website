<section class="sptb bg-white">
    <div class="container">
       <div class="section-title center-block text-center">
      <h1>Upcoming Events</h1>
     
    </div>
      
      
                        <hr class="widget-hr">
				<div class="row">
				    @if($workshop && $workshop->count())
				    @foreach($workshop as $key => $obj)
		@if($obj->end_date >= Carbon\Carbon::now())		   
<div class="col-xl-4 col-md-6">
  <div class="card overflow-hidden">
    <div class="item-card7-img">
      <div class="item-card7-imgs">
        <a target="_blank" href="{{route('image.displayImage',['d'=>true,'p'=>'workshops/'.$obj->file])}}" ></a>
        @if($obj->image && file_exists(storage_path().'/app/public/workshops/'.$obj->image))
            @php
                $link = route('image.displayImage',['p'=>'workshops/'.$obj->image]);
            @endphp
                <img src="{{$link}}" alt="img" class="cover-image">
        @else
            <img src="{{asset('assets/images/products/products/ed1.jpg')}}" alt="img" class="cover-image">
        @endif

      </div>
    </div>
    <div class="card-body">
      <div class="item-card7-desc">
        <div class="item-card7-text">
          <a target="_blank" href="{{route('image.displayImage',['d'=>true,'p'=>'workshops/'.$obj->file])}}" class="text-dark">
            <h4 class="fs-14 font-weight-semibold">{{$obj->title}}</h4>
          </a>
         </div>
        
      </div>
    </div>
    
    <div class="card-body">
      
      <a class="float-start">
        <i class="fa  fa-calendar-o text-muted me-1"></i>Start Date: {{web_display_date($obj->start_date)}}</a>
      <a class="float-end"> <i class="fa  fa-calendar-o text-muted me-1"></i>End Date: {{web_display_date($obj->end_date)}}</a>
    </div>
    <div class="card-body">
      <div class="d-flex align-items-center pt-2 mt-auto">
        <div class="ms-auto text-muted">
            @if($obj->file && file_exists(storage_path().'/app/public/workshops/'.$obj->file))
                <!-- <a class="btn btn-sm btn-warning text-white">See Details</a> -->
                <a target="_blank" href="{{route('image.displayImage',['d'=>true,'p'=>'workshops/'.$obj->file])}}" class="btn btn-sm btn-success text-white float-end">
                View Details <i class="fa fa-download"></i>
                                </a>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach
@else
<h2 class="text-center text-danger">{{DATA_NOT_FOUND}}</h2>
@endif
				  
				    
				<div class="mt-4 text-center">
      <a href="https://www.aiimsrbl.edu.in/event-and-workshop" class="btn  btn-outline-primary">View All</a>
    </div>
					</div>
					<hr class="widget-hr">
  <div class="container">
       <div class="section-title center-block text-center">
     
      <h1>Events, Workshop & Media</h1>
      <p>Photo Gallery</p>
    </div>
    @if($events && $events->count())
    <div id="defaultCarousel" class="owl-carousel Card-owlcarousel owl-carousel-icons">
        @foreach($events as $k => $obj)
        <div class="item">
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
                    <p>{{$obj->title}}</p>
                    <div class="item7-card-desc d-flex mb-2">
                        <a href="javascript:void(0);">
                            <i class="fa fa-calendar-o text-muted me-2"></i>{{display_date($obj->event_date)}}
                        </a>
                        <div class="ms-auto">
                            <a href="{{route('web.event.gallery',[base64_encode($obj->id)])}}">
                            <i class="fa fa-eye text-muted me-2"></i>View Details </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    @else
    <h4 class="text-center text-danger">
        {{DATA_NOT_FOUND}}
    </h4>
    @endif
  </div>
</section>