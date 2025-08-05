@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Recruitment</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.recruitment.listing')}}">Recruitment</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Record</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="recruitment_form" autocomplete="off">
							@csrf

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										<textarea type="text" class="form-control" placeholder="Enter Title" name="title" id="title">{{$edit->title}}</textarea>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Advertisement Reference. No<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Advertisement Reference No" name="reference_no" id="reference_no" value="{{$edit->reference_no}}">
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Description</label>
									</div>
									<div class="col-md-9">
										<textarea type="text" class="form-control" placeholder="Enter Description" name="description" id="description">{{$edit->description}}</textarea>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Start Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="start_date" id="start_date" value="{{display_date($edit->start_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">End Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="end_date" id="end_date" value="{{display_date($edit->end_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">File<span class="text-danger p-1">*</span></label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>	
										@if($edit->file && file_exists(storage_path().'/app/public/recruitments/'.$edit->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'recruitments/'.$edit->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											</div>
										@endif
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Link</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Link" name="link" id="link" value="{{$edit->link}}">
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
											<option value="active" {{($edit->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($edit->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editRecruitment({{$edit->id}});">Submit</button>
										<button onclick="redirect_url($(this),'{{route('admin.recruitment.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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
	$('#start_date,#end_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush


