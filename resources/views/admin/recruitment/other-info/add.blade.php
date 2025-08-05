@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Recruitment Other Information</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.recruitment.listing')}}">Recruitment</a></li>
                <li class="breadcrumb-item"><a  href="{{route('admin.recruitment.other_info.listing')}}">Other Information</a></li>
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
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="recruitment_form" autocomplete="off">
							@csrf

							<div class="mb-3 d-none">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Recruitments<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										@if($recruitments->count())
										<select  name="recruitment" class="select2" id="recruitment">
											<option value="">Select Recruitments</option>
											@foreach($recruitments as $recruitmentId => $name)
											<option {{($recruitment_id == $recruitmentId)?'selected':''}} value="{{$recruitmentId}}">{{$name}}</option>
											@endforeach
										</select>
										@endif
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										<textarea type="text" class="form-control" placeholder="Enter Title" name="title" id="title"></textarea>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Release Date<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="release_date" id="release_date">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Link Type</label>
									</div>
									<div class="col-md-9">
										<select id="link_type" name="link_type" class="select2">
											<option value="file">File</option>
											<option value="none">None</option>
											<option value="url">URL</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 spot-url-sec d-none">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">URL<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter URL" name="url" id="url">
									</div>
								</div>
							</div>
					

							<div class="mb-3 spot-file-sec">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">File<span class="text-danger p-1">*</span></label>
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
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="addRecruitmentOtherInfo();">Submit</button>
										<button onclick="redirect_url($(this),'{{route('admin.recruitment.other_info.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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
	$('#release_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush


