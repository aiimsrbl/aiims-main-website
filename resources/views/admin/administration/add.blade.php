@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Administration</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.administration.listing')}}">Administration</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add Administration</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Add New Administration</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="administration_form" autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Select  Administration</label>
									</div>
									<div class="col-md-9">
										<select name="type" class="select2">
											<option value="executive_director">Executive Director</option>
											<option value="president">President</option>
												<option value="deputy_director">Deputy Director</option>
													<option value="senior_administrative_officer">Senior Administrative Officer</option>
														<option value="examination_controller">Examination Controller</option>
															<option value="president">President</option>
											
										</select>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Full Name*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Name" name="name" id="name" class="form-control"></textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
	<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Designation*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Designation" name="designation" id="designation" class="form-control"></textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Speciality</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Speciality" name="speciality" id="speciality" class="form-control"></textarea>
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
										<input placeholder="Enter Phone" name="phone" id="phone" type="phone" class="form-control"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Email</label>
									</div>
									<div class="col-md-9">
										<input placeholder="Enter Email" name="email" id="email" type="email" class="form-control"/>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Profile URL/Slug*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter slug" name="slug" id="slug" class="form-control"></textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Joining Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="joining_date" id="joining_date">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Photo*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
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
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="addAdministration();">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.administration.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
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
	<script>
	$('#joining_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush