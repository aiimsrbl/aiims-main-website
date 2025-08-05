@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Tenders</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.pac.listing')}}">Quotation</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Quotation</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Quotation</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="quotation_form">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Quotation Category*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Name" name="category" id="category" value="{{$pac->category}}">
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Name of Manufacturer*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Name of Manufacturer" name="title" id="title" value="{{$pac->title}}">
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Discription of Product.*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Name of Manufacturer" name="discription" id="discription" value="{{$pac->discription}}">
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Objection Submission Start Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="start_date" id="start_date" value="{{display_date($pac->start_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Objection Submission End Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control  fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="end_date" id="end_date" value="{{display_date($pac->end_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>
<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Date of Issue of PO Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control" placeholder="DD-MM-YYYY" type="text" name="po_date" id="po_date" value="{{$pac->po_date}}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">File*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>
										
										@if($pac->file && file_exists(storage_path().'/app/public/pacs/'.$pac->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'pacs/'.$pac->file]) }}" target="_blank">
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
										<label class="form-label">Status</label>
									</div>
									<div class="col-md-9">
										<select name="status" class="select2">
											<option value="active" {{($pac->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($pac->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="updatePAC({{$pac->id}});">Submit</button>
									<button onclick="redirect_url($(this),'{{route('admin.pac.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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
