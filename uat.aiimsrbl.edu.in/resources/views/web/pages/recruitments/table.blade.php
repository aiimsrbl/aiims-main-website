<!--Job row start-->
@if($data->count())
    @foreach($data as $key => $obj)
    <div class="tab-pane active" id="tab-11">
        <div class="card overflow-hidden br-0 overflow-hidden">
        <div class="d-md-flex">
            <div class="p-0 m-0 item-card9-img">
            <div class="item-card9-imgs">
                <a href="#"></a>
                <img src="https://old.aiimsrbl.edu.in/assets/images/aiims.png" alt="img" class="h-100">
            </div>
            </div>
            <div class="card overflow-hidden  border-0 box-shadow-0 border-start br-0 mb-0">
            <div class="card-body pt-0 pt-md-5">
                <div class="item-card9">
                <div class="mt-2 mb-2">
                    <a href="javascript:void(0);" class="me-4 text-dark "><b>{{$obj->title}}</b></a><br/>
                    <a href="javascript:void(0);" class="me-4"> 
                    <span>
                        <b>Advertisement Ref. No.</b>: </span> {{$obj->reference_no}} </a>
                    <br />
                    <span>
                    <b>Start Date:</b>
                    </span> {{display_date($obj->start_date)}}  | <span>
                    <b>Closing Date:</b>
                    </span> {{display_date($obj->end_date)}} 
                </div>
                <p class="mb-0 leading-tight">
                    {{$obj->description}}
                </p>
                </div>
            </div>
            <div class="card-footer pt-3 pb-3">
                <div class="item-card9-footer d-flex">
                <div class="ms-auto">
                    @if($obj->link)
                    <a href="{{$obj->link}}" target="_blank" class="btn btn-outline-success btn-sm employers-btn">
                        <i class="fa fa-vcard"></i> Apply Online
                    </a>
                    
                    @endif
                    @if(file_exists(storage_path().'/app/public/recruitments/'.$obj->file))
                    <a href="{{ route('web.recruitment.download',[$obj->id]) }}"  class="btn btn-outline-primary btn-sm employers-btn">
                    <i class="fa fa-file-pdf-o"></i> Download Details <i class="fa fa-download"></i>
                    </a>
                    @endif
                   
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="panel-group1 col-md-12">
            <div class="panel panel-default mb-4 border p-0">
            <div class="panel-heading1">
                <h4 class="panel-title1">
                <a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-parent="#accordion2" href="#collapseone{{$obj->id}}" aria-expanded="false">
                    <i class="fa fa-hand-o-right text-success" aria-hidden="true"></i> Click to View More Information Details </a>
                </h4>
            </div>
            <div id="collapseone{{$obj->id}}" class="panel-collapse collapse active" role="tabpanel" aria-expanded="false">
                <div class="panel-body bg-white">
                    <div class="table-responsive border-top mb-0 ">
                        <table class="table table-bordered table-hover  mb-0">
                        <thead class="bg-primary text-white text-nowrap">
                            <tr>
                            <th class="text-white">S. No.</th>
                            <th class="text-white">Recruitment News &amp; Circulars</th>
                            <th class="text-white">Release Date</th>
                            <th class="text-white">Refrence</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($obj->OtherInfo) && $obj->OtherInfo->count())
                            @foreach($obj->OtherInfo as $k => $objOther)
                            <tr>
                                <td>{{$k+1}}-</td>
                                <td>
                                    <p>{{$objOther->title}}</p>
                                </td>
                                <td>{{display_date($objOther->release_date)}}</td>
                                <td>
                                    @if($objOther->link_type == 'file' && file_exists(storage_path().'/app/public/recruitments/other-info/'.$objOther->file))
                                        <a href="{{ route('web.recruitment.other.download',[$objOther->id]) }}"  class="btn btn-outline-primary btn-sm employers-btn"> Download <i class="fa fa-download"></i>
                                    </a>
                                    @elseif($objOther->link_type == 'url')
                                        <a href="{{$objOther->url}}" target="_blank" class="btn btn-outline-primary btn-sm employers-btn"> View <i class="fa fa-link"></i>
                                    </a>
                                    @else
                                    --
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr><td colspan="4" class="text-center text-danger">{{DATA_NOT_FOUND}}</td></tr>
                            @endif
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    @endforeach
    <!--Job row end-->
    <!--Paginatio Start -->
    <div class="center-block text-center">
        <ul class="pagination mb-0">
            {{ $data->appends(request()->except('page'))->links('web.layouts.pagination') }} 
        </ul>
    </div>
@else
<h3 class="text-danger text-center">{{DATA_NOT_FOUND}}</h3>
@endif
<!--Paginatio End -->