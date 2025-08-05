@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Department Activity</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.department.listing')}}">Department Activity</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
        </div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Add New Record</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="activity_form" autocomplete="off">
							@csrf

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Department*</label>
									</div>
									<div class="col-md-9">
										@if($department->count())
										<select  name="department" class="select2">
											<option value="">Select Department</option>
											@foreach($department as $deptId => $name)
											<option {{($sDeptId == $deptId)?'selected':''}} value="{{$deptId}}">{{$name}}</option>
											@endforeach
										</select>
										@endif
									</div>
								</div>
							</div>
	

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Content</label>
									</div>
									<div class="col-md-9">
										<textarea class="content" type="text" placeholder="Enter Content" name="content" class="form-control"></textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="activity-wrapper">
								<div class="mb-3 activity-sec">
									<div class="row">
										<div class="col-md-3">
											<label class="form-label activity-label">Activity 1</label>
											<input type="hidden" name="temp[]">
										</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-3 col-lg-4 col-sm-12">
													<input type="file" name="image_0" class="activity-file"/>
												</div>	
												<div class="col-md-4 col-sm-12">
													<input type="text" placeholder="Enter Title" name="title_0" class="form-control activity-input">
												</div>
												<div class="col-md-4 col-sm-12  add-more-sec">
													<button type="button" onClick="activityAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
												</div>		
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Status</label>
									</div>
									<div class="col-md-9">
										<select name="status" class="select2">
											<option value="active">Active</option>
											<option value="inactive">In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="addDepartmentActivity();">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.department.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
</div>
@endsection

@push('scripts')

<script src="{{asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{asset('assets/js/tabs.js')}}"></script>
<script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset('assets/js/formeditor.js')}}"></script>

@endpush

@push('css')
<link href="{{asset('assets/plugins/tabs/style.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
@endpush
