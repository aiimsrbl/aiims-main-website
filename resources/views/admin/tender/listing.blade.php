@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Manage Tenders</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.tender.listing')}}">Tenders</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu ">
                            <ul class="nav panel-tabs">
                                <li class="">
                                    <a href="#tab1" class=" {{ ($tab !='c')?'active':'' }}" data-bs-toggle="tab">Manage Tender</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-bs-toggle="tab" class="{{ ($tab =='c')?'active':'' }}">Manage Corrigendum</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane {{ ($tab !='c')?'active':'' }}" id="tab1">
                                <div class="card-header">
                                    <div class="card-title">
                                        Tender Listing
                                    </div>
                                    <div class="col-md-10 text-right">
                                        <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.tender.create')}}')" class="btn btn-sm btn-primary">+ Add New Tender</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table hover table-bordered" id="tender">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Reference No</th>
                                                    <th>Title</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Status</th>
                                                    <th width="20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane {{ ($tab =='c')?'active':'' }}" id="tab2">
                                <div class="card-header">
                                    <div class="card-title">
                                        Corrigendum Listing
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="corrigendum" class="table hover table-bordered" >
                                            <thead>
                                                <tr>
                                                    <th>Sr.</th>
                                                    <th>Tender</th>
                                                    <th>Title</th>
                                                    <th>Release Date</th>
                                                    <th>Status</th>
                                                    <th width="20%">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
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

    <script type="text/javascript">
    $(function () {
        var table = $('#tender').DataTable({
            processing: true,
            pageLength: 25,
            serverSide: true,
            ajax: "{{ route('admin.tender.listing.ajax') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'category', 
                    name: 'category', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'title', 
                    name: 'title', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'start_date', 
                    name: 'start_date', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'end_date', 
                    name: 'end_date', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'status', 
                    name: 'status', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });

        var table = $('#corrigendum').DataTable({
            processing: true,
            pageLength: 25,
            serverSide: true,
            ajax: "{{ route('admin.corrigendum.listing.ajax') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'tender.category', 
                    name: 'tender', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'title', 
                    name: 'title', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'release_date', 
                    name: 'release_date', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'status', 
                    name: 'status', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });

    });
    </script>
@endpush