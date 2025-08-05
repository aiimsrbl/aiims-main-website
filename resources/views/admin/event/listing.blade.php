@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Manage Events</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Event And Workshop</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.event.listing')}}">Manage Events</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Event Listing
                        </div>
                        <div class="col-md-10 text-right">
                            <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.event.add')}}')" class="btn btn-sm btn-primary">+ Add New Record</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table hover table-bordered" id="news">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Title</th>
                                        <th>Event Date</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th width="auto">Action</th>
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
        var table = $('#news').DataTable({
            processing: true,
            pageLength: 25,
            serverSide: true,
            ajax: "{{ route('admin.event.listing.ajax')}}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title', 
                    name: 'title', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'event_date', 
                    name: 'event_date', 
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
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    });
    </script>
@endpush