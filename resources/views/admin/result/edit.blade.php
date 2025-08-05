@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Exam Results</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.result.listing')}}">Results</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Result</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Result</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="result_form" autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Result Type*</label>
									</div>
									<div class="col-md-9">
										<select name="category" class="select2">
											<option value="MBBS Result" {{($result->category =='MBBS Result')?'selected':''}}>MBBS Result</option>
											<option value="Nursing Result" {{($result->category =='Nursing Result')?'selected':''}}>Nursing Result</option>
										</select>
									</div>
									
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title/Examination Details</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Title/Examination Details" name="title" id="title" value="{{$result->title}}">
									</div>
								</div>
							</div>
							
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Publish Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text" name="publish_date" id="publish_date" value="{{display_date($result->publish_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>

							
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Result File*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>

										@if($result->file && file_exists(storage_path().'/app/public/results/'.$result->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'results/'.$result->file]) }}" target="_blank">
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
											<option value="active" {{($result->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($result->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button id="add_result" type="button" class="btn btn-primary waves-effect waves-light" onClick="updateResult({{$result->id}});">Submit</button>
									<button onclick="redirect_url($(this),'{{route('admin.result.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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
	$('#publish_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush

