<div class="card mb-0">
    <div class="card-header bg-warning-transparent text-center">
        <h2 class=" card-title fs-18 text-center">Office Order</h2>
        </div>
        <div class="card-body pb-3">
        
        @if($office_order->count())

            <ul class="vertical-scroll">
                @foreach($office_order as $k => $obj)

                <li class="item">
                    <div class="item-det card-body bg-white p-3">
                        <a href="javascript:void(0);" class="text-dark">
                        <p class="mb-2"><i class="fa fa-hand-o-right text-success" aria-hidden="true"></i> {{$obj->title}}</p>
                        </a>
                        <small class="text-muted">
                        <i class="fa fa-calendar-o text-muted me-2"></i> {{web_display_date($obj->release_date)}} </small>
                        <div class="icons mt-3 pb-0 text-right">
                            @if(file_exists(storage_path().'/app/public/office-orders/'.$obj->file))
                                <a href="{{route('web.office_order.download',[$obj->id])}}" class="btn btn-outline-success btn-sm icons">View Details <i class="fa fa-download"></i></a>
                            @endif
                        </div>

                    </div>
                </li>
                @endforeach

            </ul>
            <div class="mt-4 text-center">
                <a href="{{route('web.office_order')}}" target="_blank" class="btn  btn-outline-primary">View All</a>
            </div>
        @else
        <h5 class="text-danger">{{DATA_NOT_FOUND}}</h5>
        @endif
    </div>
</div>