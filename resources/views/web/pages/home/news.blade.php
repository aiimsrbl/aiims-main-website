<div class="card bg-white mb-0">
    <div class="card-header bg-success-transparent text-center">
        <h3 class="card-title fs-18 text-center">Latest News & Circular</h3>
    </div>
    <div class="card-body pb-3">
    @if($news->count())
        <ul class="vertical-scroll">
        @foreach($news as $k => $obj)
            <li class="item">
            <div class="item-det card-body bg-white p-3">
                <a href="javascript:void(0);" class="text-dark">
                <p class="mb-2"><i class="fa fa-hand-o-right text-success" aria-hidden="true"></i> {{$obj->title}}</p>
                </a>
                <small class="text-muted">
                <i class="fa fa-calendar-o text-muted me-2"></i> {{web_display_date($obj->release_date)}} </small>
                <div class="icons mt-3 pb-0 text-right">
                @if(file_exists(storage_path().'/app/public/news/'.$obj->file))
                    <a href="{{route('web.news.download',[$obj->id])}}" class="btn btn-outline-success btn-sm icons">View Details <i class="fa fa-download"></i></a>
                @endif
                </div>
            </div>
            </li>
        @endforeach
        </ul>
        <div class="mt-4 text-center">
            <a href="{{route('web.news')}}" target="_blank" class="btn  btn-outline-primary">View All</a>
        </div>
    @else
    <h5 class="text-danger">{{DATA_NOT_FOUND}}</h5>
    @endif
    </div>
</div>