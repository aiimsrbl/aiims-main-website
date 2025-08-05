<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Employees Directory List</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive border-top mb-0">

                <table class="table table-bordered table-hover  mb-0">
                    <thead class="bg-primary text-white text-nowrap">
                        <tr>
                            <th class="text-white">S. No.</th>
                        
                            <th class="text-white">Name</th>
                        
                            <th class="text-white">Designation</th>
                            <th class="text-white">Email Id</th>
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
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">{{$obj->name}}</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-light">{{$obj->designation}}</h4></td>
                                <td><h4 class="mb-2 fs-16 font-weight-semibold">{{$obj->email}}</h4></td>
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
</div>
@if($data->count())
<div class="center-block text-center">
    <ul class="pagination mb-5 mb-lg-0">
        {{ $data->appends(request()->except('page'))->links('web.layouts.pagination') }} 
    </ul>
</div>
@endif