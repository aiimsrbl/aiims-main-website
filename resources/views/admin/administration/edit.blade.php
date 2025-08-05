@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Administration</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.administration.listing')}}">Administration</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Administration</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Administration</h3>
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
											<option value="executive_director"{{($administration->type =='executive_director')?'selected':''}}>Executive Director</option>
											<option value="president" {{($administration->type =='president')?'selected':''}}>President</option>
												<option value="deputy_director"{{($administration->type =='deputy_director')?'selected':''}}>Deputy Director</option>
													<option value="senior_administrative_officer" {{($administration->type =='senior_administrative_officer')?'selected':''}}>Senior Administrative Officer</option>
														<option value="examination_controller" {{($administration->type =='examination_controller')?'selected':''}}>Examination Controller</option>
															<option value="president" {{($administration->type =='president')?'selected':''}}>President</option>
											
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
										<textarea placeholder="Enter name" name="name" id="name" class="form-control">{{$administration->name}}</textarea>
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
										<textarea placeholder="Enter Designation" name="designation" id="designation" class="form-control">{{$administration->designation}}</textarea>
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
										<textarea placeholder="Enter Speciality" name="speciality" id="speciality" class="form-control">{{$administration->speciality}}</textarea>
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
										<input type="phone" placeholder="Enter Phone" name="phone" id="phone" class="form-control" value="{{$administration->phone}}"/>
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
										<input type="email" placeholder="Enter Email" name="email" id="email" class="form-control" value="{{$administration->email}}"/>
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
										<textarea placeholder="Enter slug" name="slug" id="slug" class="form-control">{{$administration->slug}}</textarea>
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
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="joining_date" id="joining_date" value="{{display_date($administration->joining_date)}}">
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Refrence File*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>
										@if($administration->file && file_exists(storage_path().'/app/public/administration/'.$administration->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'administration/'.$administration->file]) }}" target="_blank">
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
											<option value="active" {{($administration->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($administration->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editAdministration({{$administration->id}});">Submit</button>
									
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
