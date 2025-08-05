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
						<h3 class="card-title">Edit Department Activity ({{$edit->department->name}})</h3>
						<div class="col-md-8 text-right">
						</div>
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
											<option {{($edit->department_id==$deptId)?'selected':''}} value="{{$deptId}}">{{$name}}</option>
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
										<textarea class="content" type="text" placeholder="Enter Content" name="content" class="form-control">{{$edit->content}}</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="activity-wrapper">
								@if($edit->images->count())
									@foreach($edit->images as $k => $obj)
										<div class="mb-3 activity-sec">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label activity-label">Activity {{$k+1}}</label>
													<input type="hidden" name="temp[]" value="{{$obj->id}}">
												</div>
												<div class="col-md-9">
													<div class="row">
														<div class="col-md-3 col-lg-4 col-sm-12">
															<input onChange="departmentActivityImageChagne($(this))" data-elid={{$obj->id}} type="file" name="image_{{$k}}" class="activity-file"/>
															<input type="hidden" name="file_{{$k}}" value="{{$obj->image}}">
														</div>	
														<div class="col-md-4 col-sm-12">
															<input type="text" placeholder="Enter Title" name="title_{{$k}}" class="form-control activity-input" value="{{$obj->title}}">
															<input type="hidden" value="{{$obj->title}}" name="title_id[{{$obj->id}}]">
														</div>

														<div class="col-md-2 col-sm-12  add-more-sec">
															@if($k == $edit->images->count()-1)
																<button type="button" onClick="activityAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
															@endif
														</div>
														
														@if($k > 0)
															<div class="col-md-2 col-sm-12 remove-sec">
																<button type="button" onClick="activityRemove($(this))" class="btn btn-danger btn-sm">Remove X</button>
															</div>
														@endif
													</div>
													<div class="row">
														<div class="col-md-2">
														@if($obj->image && file_exists(storage_path().'/app/public/department/activity/'.$obj->image))
																<a href="{{ route('image.displayImage',['p'=>'department/activity/'.$obj->image]) }}" target="_blank">
																	<img  src="{{ route('image.displayImage',['p'=>'department/activity/'.$obj->image]) }}" width="150" height="100">
																</a>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Status</label>
									</div>
									<div class="col-md-9">
										<select name="status" class="select2">
											<option value="active" {{(old('status',$edit->status) == 'active' ? 'selected':'')}}>Active</option>
											<option value="inactive" {{(old('status',$edit->status) == 'inactive' ? 'selected':'')}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<input type="hidden" name="edit_id" value="{{$edit->id}}">
									<input type="hidden" id="edit_elid" name="edit_elid">

									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editDepartmentActivity({{$edit->id}});">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.department.activity.view',$edit->department_id)}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
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
