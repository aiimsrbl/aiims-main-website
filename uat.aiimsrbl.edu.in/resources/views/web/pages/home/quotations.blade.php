<section class="sptb">
  <div class="container">

    <div class="section-title center-block text-center">
      <h2>QUOTATIONS</h2>
      <!-- <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p> -->
    </div>
    @if($quotations->count())
    <div id="defaultCarousel" class="owl-carousel owl-carousel-icons3 owl-loaded owl-drag">
        @foreach($quotations as $k => $obj)
        <div class="item">
            <div class="card mb-0">
            <div class="card-body p-4 cardHeight">
                <div class="item7-card-desc d-flex mb-2">
                <a href="javascript:void(0);">
                    <i class="fa fa-calendar-o text-muted me-2"></i>{{web_display_date($obj->start_date)}} </a>
                <div class="ms-auto">
                    <a href="javascript:void(0);">
                    <i class="fa fa-calendar-o text-muted me-2"></i>{{web_display_date($obj->end_date)}} </a>
                </div>
                </div>
                <a href="#" class="text-dark">
                <h4 class="fs-14 font-weight-semibold">Ref.: {{$obj->category}}</h4>
                </a>
                <p class="me-3 mt-3">{{$obj->title}}</p>
                <div class="icons mt-3 pb-0 text-right">
                    @if(file_exists(storage_path().'/app/public/quotation/'.$obj->file))
                        <a href="{{route('web.quotation.download',[$obj->id])}}" class="btn btn-outline-success btn-sm icons">View Details <i class="fa fa-download"></i></a>
                    @endif
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-4 text-center">
      <a href="{{route('web.quotation',['current'])}}" class="btn  btn-outline-primary">View All</a>
    </div>
    @else
    <h5 class="text-danger">{{DATA_NOT_FOUND}}</h5>
    @endif
  </div>
</section>