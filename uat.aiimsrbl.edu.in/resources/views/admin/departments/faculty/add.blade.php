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
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Add New Record</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="faculty_form" autocomplete="off">
							@csrf

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Department*</label>
									</div>
									<div class="col-md-9">
										@if($department->count())
										<select  name="department" class="select2" id="department">
											<option value="">Select Department</option>
											@foreach($department as $deptId => $name)
											<option value="{{$deptId}}">{{$name}}</option>
											@endforeach
										</select>
										@endif
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Designation*</label>
									</div>
									<div class="col-md-9">
										@if($designation->count())
										<select  name="designation" class="select2" id="designation">
											<option value="">Select Designation</option>
											@foreach($designation as $desiId => $name)
											<option value="{{$desiId}}">{{$name}}</option>
											@endforeach
										</select>
										@endif
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Type*</label>
									</div>
									<div class="col-md-9">
										<div class="custom-controls-stacked">
										<div class="col-md-9" id="type">
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="type" value="faculty" checked="" >
												<span class="custom-control-label">Faculty</span>
											</label>
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="type" value="staff">
												<span class="custom-control-label">Staff</span>
											</label>
											<label class="custom-control custom-radio">
												<input type="radio" class="custom-control-input" name="type" value="residents">
												<span class="custom-control-label">Residents</span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Name*</label>
									</div>
									<div class="col-md-9">
										<input type="text" placeholder="Enter Name" name="name" id="name" class="form-control">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">E-mail</label>
									</div>
									<div class="col-md-9">
										<input type="text" placeholder="Enter E-mail" name="email" id="email" class="form-control">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Phone</label>
									</div>
									<div class="col-md-9">
										<input type="text" placeholder="Enter Phone" name="phone" id="phone" class="form-control">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Facebook Link</label>
									</div>
									<div class="col-md-9">
										<input type="text" placeholder="Enter Facebook Link" name="facebook" id="facebook" class="form-control">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Twitter Link</label>
									</div>
									<div class="col-md-9">
										<input type="text" placeholder="Enter Twitter Link" name="twitter" id="twitter" class="form-control">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Linkedin Link</label>
									</div>
									<div class="col-md-9">
										<input type="text" placeholder="Enter Linkedin Link" name="linkedin" id="linkedin" class="form-control">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Profile Image</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="image">
											<input type="file" class="dropify" data-height="180" name="image"/>
										</div>	
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Description</label>
									</div>
									<div class="col-md-6">
										<textarea class="description" name="description"></textarea>
									</div>
								</div>
							</div>
							
                             <div class="mb-3">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Rank Number </label>
									</div>
									<div class="col-md-6">
										<input type="text" id="rank" name="rank"  placeholder="Enter Rank Number" class="form-control">
										<div class="invalid-feedback">
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
</div>
							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="addDepartmentFaculty();">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.department.faculty.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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
	<script src="{{asset('assets/plugins/summernote/summernote1.js')}}"></script>
	<script>
		$('.description').summernote();
	</script>
@endpush

@push('css')
<link href="{{asset('assets/plugins/summernote/summernote1.css')}}" rel="stylesheet" />
@endpush