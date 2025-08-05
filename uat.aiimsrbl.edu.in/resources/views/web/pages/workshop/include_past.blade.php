@if($data->count())

@foreach($data as $key => $obj)
@if($obj->end_date < Carbon\Carbon::now())
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
            <h4 class="fs-15 font-weight-semibold">{{$obj->title}}</h4>
          </a>
          <p class="mb-0">{!!substr($obj->description,0,600).'...'??'--'!!}</p>
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

<div class="center-block text-center">
    <ul class="pagination mb-5 mb-lg-0">
        {{ $data->appends(request()->except('page'))->links('web.layouts.pagination') }} 
    </ul>
</div>
@else
<h2 class="text-center text-danger">{{DATA_NOT_FOUND}}</h2>
@endif