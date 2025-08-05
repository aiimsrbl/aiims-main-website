@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Settings</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listing</li>
            </ol>

        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Users Listing
                        </div>
                        <div class="col-md-10 text-right">
                            <a href="{{route('admin.user.add')}}" class="btn btn-sm btn-primary">+ Add New User</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table hover table-bordered" >
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $obj)
                                    <tr>
                                        <td>{{$obj->id}}</td>
                                        <td>{{$obj->name}}</td>
                                        <td>{{$obj->email}}</td>
                                        <td>{{ucfirst($obj->status)}}</td>
                                        <td>{{display_date_time($obj->created_at)}}</td>
                                        <td>
                                            @if($obj->id !== SUPER_ADMIN_ID)
                                                <a href="{{route('admin.user.edit.form',[$obj->id])}}">
                                                    <button type="button" class="btn btn-success btn-sm">Edit</button>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('{{route('admin.user.delete',[$obj->id])}}')">Delete</button>
                                            @else
                                            --
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('css')
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
@endpush

@push('scripts')
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
@endpush