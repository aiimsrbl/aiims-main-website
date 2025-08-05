<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card overflow-hidden">
            <div class="row no-gutters blog-list">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    @if($data->count())
                        @foreach($data as $key => $obj)
                        <div class="card-body">
                            <a href="javascript:void(0);" class="text-dark">
                                <h4 class="font-12 font-weight-semibold mb-3 fs-14">
                                    @if($page > 1)
                                        {{$offset+$key+1}}-
                                    @else
                                        {{$key+1}}-
                                    @endif
                                Ref./Adv. Number: {{$obj->category}}
                                </h4>
                            </a>
                            <div class="item7-card-desc d-flex mb-1">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-calendar-o text-muted me-2 text-primary"></i>
                                    Date of Publishing:  {{web_display_date($obj->start_date)}}
                                </a> 
                                <a href="javascript:void(0);">
                                    <i class="fa fa-calendar-o text-muted me-2 text-primary"></i>
                                    Date of Closing: {{web_display_date($obj->end_date)}}
                                </a> 
                            </div>

                            @if(file_exists(storage_path().'/app/public/quotation/'.$obj->file))
                                <p class="mb-1"> {{$obj->title}}</p>
                                <a href="{{route('web.quotation.download',[$obj->id])}}" class="btn btn-primary btn-sm mt-4">
                                    Download <i class="fa fa-download"></i>
                                </a>
                            @endif
                        </div>
                        @endforeach
                    @else
                    <h4 class="text-danger text-center">{{DATA_NOT_FOUND}}</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($data->count())
<div class="center-block text-center">
    <ul class="pagination mb-5 mb-lg-0">
        {{ $data->appends(request()->except('page'))->links('web.layouts.pagination') }} 
    </ul>
</div>
@endif