@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Hospital Statistics</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.hospital.listing')}}">Hospital Statistics Listing</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                        Hospital Statistics Listing
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.hospital.add')}}')" class="btn btn-sm btn-primary">+ Add New Record</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table hover table-bordered" id="quotation">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th class="">OPD Patient</th>
                                        <th class="">Total OPD Patient</th>
                                        <th class="">Admission</th>
                                        <th class="">Total admission</th>
                                        <th class="">Lab Reporting </th>
                                        <th class="">Total Lab Reporting</th>
                                        <th class="">Radiology Reporting</th>
                                        <th class="">Total Radiology Reporting </th>
                                        <th>OT Cases</th>
                                        <th>Total OT Cases</th>
                                        <th>Occupied Bed</th>
                                        <th>Vacant Bed</th>
                                        <th>Date</th>
                                        <th>Action</th>
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
            ajax: "{{ route('admin.hospital.listing.ajax') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false, 
                    searchable: false
                },
                {
                    data: 'today_opd', 
                    name: 'today_opd', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'total_opd', 
                    name: 'total_opd', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'today_ipd', 
                    name: 'today_ipd', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'total_ipd', 
                    name: 'total_ipd', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'today_lab_reporting', 
                    name: 'today_lab_reporting', 
                    orderable: true, 
                    searchable: true
                },{
                    data: 'total_lab_reporting', 
                    name: 'total_lab_reporting', 
                    orderable: true, 
                    searchable: true
                },{
                    data: 'today_radiology_reporting', 
                    name: 'today_radiology_reporting', 
                    orderable: true, 
                    searchable: true
                },{
                    data: 'total_radiology_reporting', 
                    name: 'total_radiology_reporting', 
                    orderable: true, 
                    searchable: true
                },{
                    data: 'today_ot_cases', 
                    name: 'today_ot_cases', 
                    orderable: true, 
                    searchable: true
                },{
                    data: 'total_ot_cases', 
                    name: 'total_ot_cases', 
                    orderable: true, 
                    searchable: true
                },{
                    data: 'te_occupied_beds', 
                    name: 'te_occupied_beds', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'te_vacant_beds', 
                    name: 'te_vacant_beds', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'created_at', 
                    name: 'created_at', 
                    orderable: true, 
                    searchable: true
                },
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: false, 
                    searchable: false
                }
            ]
        });

    });
    </script>
@endpush