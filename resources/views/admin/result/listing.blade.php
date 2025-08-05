@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Manage Exam Result</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.result.listing')}}">Results</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu ">
                           
                        </div>
                    </div>
                    <div class="panel-body tabs-menu-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab1">
                                <div class="card-header">
                                    <div class="card-title">
                                        Result Listing
                                    </div>
                                    <div class="col-md-10 text-right">
                                        <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.result.create')}}')" class="btn btn-sm btn-primary">+ Add New Result</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table hover table-bordered" id="result">
                                            <thead>
                                                <tr>
                                                    <th>Sr</th>
                                                    <th>Result Type</th>
                                                    <th>Exam Details</th>
                                                    <th>Published Date</th>
                                                   
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
        var table = $('#result').DataTable({
            processing: true,
            pageLength: 25,
            serverSide: true,
            ajax: "{{ route('admin.result.listing.ajax') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'category', 
                    name: 'category', 
                    orderable: false, 
                    searchable: true
                },
                {
                    data: 'title', 
                    name: 'title', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'publish_date', 
                    name: 'publish_date', 
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