@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Manage PACs</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.pac.listing')}}">PACs</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            PAC Listing
                        </div>
                        <div class="col-md-10 text-right">
                            <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.pac.add')}}')" class="btn btn-sm btn-primary">+ Add New PAC</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table hover table-bordered" id="quotation">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Tender ID</th>
                                        <th>Name of Manufacturer</th>
                                        
                                       
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        
                                        <th>Status</th>
                                        <th>File</th>
                                        <th width="15%">Action</th>
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
        var table = $('#quotation').DataTable({
            processing: true,
            pageLength: 25,
            serverSide: true,
            ajax: "{{ route('admin.pac.listing.ajax') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
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
                    data: 'file', 
                    name: 'file', 
                    orderable: false, 
                    searchable: false
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                },
            ]
        });

    });
    </script>
@endpush