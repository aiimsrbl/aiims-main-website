@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Workshop</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Event And Workshop</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.event.workshop.listing')}}">Manage Workshop</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Record</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Record</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="workshop_form" autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Title" name="title" id="title" class="form-control">{{$edit->title}}</textarea>
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
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="start_date" id="start_date" value="{{display_date($edit->start_date)}}">
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
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="end_date" id="end_date" value="{{display_date($edit->end_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Image</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-8 col-sm-12" id="image">
											<input type="file" class="dropify" data-height="180" name="image"/>
										</div>	
										@if($edit->image && file_exists(storage_path().'/app/public/workshops/'.$edit->image))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'workshops/'.$edit->image]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View Image</button>
												</a>
											</div>
										@endif
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Detail File</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-8 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>	
										@if($edit->file && file_exists(storage_path().'/app/public/workshops/'.$edit->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'workshops/'.$edit->file]) }}" target="_blank">
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
										<label class="form-label">Description</label>
									</div>
									<div class="col-md-6">
										<textarea class="description" name="description">{{$edit->description}}</textarea>
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
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editWorkshop({{$edit->id}});">Submit</button>
									<button onclick="redirect_url($(this),'{{route('admin.event.workshop.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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

	$('#start_date').datepicker({ dateFormat: DATE_FORMAT });
	$('#end_date').datepicker({ dateFormat: DATE_FORMAT });
	$('.description').summernote();

	</script>
@endpush
@push('css')
<link href="{{asset('assets/plugins/summernote/summernote1.css')}}" rel="stylesheet" />
@endpush