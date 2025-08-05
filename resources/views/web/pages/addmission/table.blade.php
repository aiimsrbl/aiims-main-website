
    
    
        <div class="table-responsive border-top mb-0 ">
            <table class="table table-bordered table-hover  mb-0">
                <thead class="bg-primary text-white text-nowrap">
                    <tr>
                        <th class="text-white">S. No.</th>
                        <th class="text-white">TITLE</th>
                        <th class="text-white">DOWNLOAD</th>
                        <th class="text-white">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->count())
                        @foreach($data as $key => $obj)
                            <tr>
                                @if($page > 1)
                                <td>{{$offset+$key+1}}-</td>
                                @else
                                <td>{{$key+1}}-</td>
                                @endif

                                <td><p>{{$obj->title}}</p></td>

                                <td>
                                    @if(file_exists(storage_path().'/app/public/admission-procedure/'.$obj->file))
                                        <a href="{{route('web.addmission.download',[$obj->id])}}" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a>
                                    @else
                                    --
                                    @endif
                                </td>
                                                            <td><p>OPEN</p></td>
                            </tr>
                            @endforeach
                    @else
                        <tr>
                            <td class="text-danger">{{DATA_NOT_FOUND}}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    
    

@if($data->count())
<div class="center-block text-center">
    <ul class="pagination mb-5 mb-lg-0">
        {{ $data->appends(request()->except('page'))->links('web.layouts.pagination') }} 
    </ul>
</div>
@endif