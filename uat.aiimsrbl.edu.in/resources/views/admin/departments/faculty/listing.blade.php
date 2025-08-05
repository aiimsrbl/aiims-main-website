@extends('admin.layouts.app')
@section('content')

<div class="app-content">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Manage Department Faculty</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.department.faculty.listing')}}">Department Faculty</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                        Department Faculty Listing
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.department.faculty.add')}}')" class="btn btn-sm btn-primary">+ Add New Record</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table hover table-bordered" id="quotation">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Department</th>
                                        <th>Name</th>
                                        <th>E-mail</th>
                                        <th>Phone</th>
                                         <th>Rank</th>
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

@endsection

@push('scripts')
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>

<script type="text/javascript">
$(function () {
	var table = $('#quotation').DataTable({
		processing: true,
		pageLength: 25,
		serverSide: true,
		ajax: "{{ route('admin.department.faculty.listing.ajax') }}",
		columns: [
			{
				data: 'DT_RowIndex',
				name: 'DT_RowIndex',
				orderable: false, 
				searchable: false
			},
            {
                data: 'department.name', 
                name: 'department.name', 
                orderable: true, 
                searchable: true
            },
			{
				data: 'name', 
				name: 'name', 
				orderable: true, 
				searchable: true
			},
			{
				data: 'email', 
				name: 'email', 
				orderable: true, 
				searchable: true
			},
			{
				data: 'phone', 
				name: 'phone', 
				orderable: true, 
				searchable: true
			},
			
			{
				data: 'rank', 
				name: 'rank', 
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
				orderable: false, 
				searchable: false
			},
		]
	});

});
</script>
@endpush

@push('css')
<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}" rel="stylesheet">
@endpush