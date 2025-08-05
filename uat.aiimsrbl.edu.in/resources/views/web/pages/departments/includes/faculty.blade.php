<div class="col-xl-12 col-lg-12 col-md-12">
    <div class=" mb-lg-0">
        <div class="">
            <div class="item2-gl border-0 bg-white p-4 mb-5">
                <div class="tab-content pt-0">
                    <div class="tab-pane active" id="tab-11">
                        {!!isset($data->detail->faculty)?$data->detail->faculty:''!!}
                        @if(isset($faculties) && $faculties->count())
                        @foreach($faculties as $obj)
                            <div class="card overflow-hidden br-0 shadow-none">
                                <div class="d-md-flex">
                                    <div class="p-0 m-0 item-card9-img">
                                        <div class="item-card9-imgs">
                                            @if($obj->image && file_exists(storage_path().'/app/public/faculty_profile/'.$obj->image))
                                                        
                                                <a href="{{ route('web.department.faculty_detail',[base64_encode($obj->id)]) }}" target="_blank">
                                                    <img src="{{ route('image.displayImage',['p'=>'faculty_profile/'.$obj->image]) }}" class="h-100">
                                                </a>
                                            @else
                                            <img src="{{asset('assets/images/products/logo/img1.png')}}" alt="img" class="h-100">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card overflow-hidden  border-0 box-shadow-0 border-start br-0 mb-0">
                                        <div class="card-body pt-0 pt-md-5">
                                            <div class="item-card9">
                                            <a href="{{ route('web.department.faculty_detail',[base64_encode($obj->id)]) }}" target="_blank">
                                                <h4 class="font-weight-semibold mt-1">{{$obj->name??''}}</h4>
                                            </a>
                                            <span><small>Designation : 
                                            @if(isset($obj->designation->name) && !empty($obj->designation->name))
                                                {{ucfirst($obj->designation->name)}}
                                            @else
                                                --
                                            @endif
                                            </small></span>
                                            <div class="mt-2 mb-2">
                                                <a href="javascript:void(0);" class="me-4"><span class="text-muted "><i class="fa fa-phone text-primary"></i> +91 {{$obj->phone}}</span></a>
                                                <a href="javascript:void(0);" class="me-4"><span class="text-muted"><i class="fa fa-envelope text-primary me-1"></i> {{$obj->email??'--'}}</span></a>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="card-footer pt-3 pb-3 px-3">
                                            <div class="item-card9-footer d-xl-flex">
                                                <div class="d-flex align-items-center mb-3 mb-xl-0">
                                                    <div>
                                                        <div class="fs-13 me-2">
                                                   <!--         <span class="ms-2">Posted on</span>
                                                            <span> : {{web_display_date($obj->created_at)}}</span>-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ms-auto me-0">

                                                    @if(isset($obj->facebook) && !empty($obj->facebook))
                                                    <a href="{{$obj->facebook}}" target="_blank" class="btn btn-primary btn-sm text-white" data-bs-toggle="tooltip" data-bs-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                                    @endif

                                                    @if(isset($obj->twitter) && !empty($obj->twitter))
                                                        <a href="{{$obj->twitter}}" target="_blank" class="btn  btn-sm twitter-bg text-white" data-bs-toggle="tooltip" data-bs-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                                    @endif

                                                    @if(isset($obj->linkedin) && !empty($obj->linkedin))
                                                        <a href="{{$obj->linkedin}}" target="_blank"  class="btn  btn-sm facebook-bg text-white" data-bs-toggle="tooltip" data-bs-original-title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        --
                        @endif
                    </div>
                </div>
                @if(isset($faculties) && $faculties->count())
                <div class="center-block text-center">
                    <ul class="pagination mb-5 mb-lg-0">
                        
                   
                        {{ $faculties->appends(['type'=>'faculty'])->links('web.layouts.pagination') }} 
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

