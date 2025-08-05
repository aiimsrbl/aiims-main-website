<div class="card">
    <div class="card-header">
        <h3 class="card-title">News & Circulars List</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive border-top mb-0 ">
            <table class="table table-bordered table-hover  mb-0">
                <thead class="bg-primary text-white text-nowrap">
                    <tr>
                        <th class="text-white">S. No.</th>
                    
                        <th class="text-white">News & Circulars</th>
                    
                        <th class="text-white">Release Date</th>
                        <th class="text-white">Refrence</th>
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

                                <td>{{web_display_date($obj->release_date)}}</td>

                                <td>
                                    @if(file_exists(storage_path().'/app/public/news/'.$obj->file))
                                        <a href="{{route('web.news.download',[$obj->id])}}" class="btn btn-outline-primary btn-sm employers-btn">
                                            Download <i class="fa fa-download"></i>
                                        </a>
                                    @endif
                                </td>
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
    </div>
    
</div>
@if($data->count())
<div class="center-block text-center">
    <ul class="pagination mb-5 mb-lg-0">
        {{ $data->appends(request()->except('page'))->links('web.layouts.pagination') }} 
    </ul>
</div>
@endif