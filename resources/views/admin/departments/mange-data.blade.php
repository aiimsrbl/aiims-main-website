@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Departments</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.department.listing')}}">Departments</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Department : {{$department->name}}</h3>
					</div>
					@php
						$tab 	= request()->get('tab');
						$form 	= request()->get('form');
					@endphp
					<div class="card-body">
							<div class="tab_wrapper second_tab">
							<ul class="tab_list">
								<li>Introduction</li>
								<li>Mission, Vision and Goals</li>
								<li>OPD Schedule</li>
								<li>Facilities</li>
								<li>Future Planning</li>
								<li>Faculty</li>
								<li>Staff & Residents</li>
							</ul>
							<div class="content_wrapper">
								<div class="tab_content">
									<form id="introduction" method="post">
										@csrf
										<textarea class="introduction" name="introduction">{{isset($department->detail->introduction)?$department->detail->introduction:''}}</textarea>
										<div class="col-md-3 my-2">
											<button type="button" onClick="updateDepartmentDetails('introduction',{{$department->id}})" type="submit" class="btn btn-success waves-effect waves-light">Save</button>
										</div>
									</form>
								</div>

								<div class="tab_content">
									<form id="goal" method="post">
										@csrf
										<textarea class="goal" name="goal">{{isset($department->detail->goal)?$department->detail->goal:''}}</textarea>
										<div class="col-md-3 my-2">
											<button type="button" onClick="updateDepartmentDetails('goal',{{$department->id}})" type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
										</div>
									</form>
								</div>

								<div class="tab_content">
									<form id="opd_schedule" method="post">
											@csrf
											<textarea class="opd_schedule" name="opd_schedule">{{isset($department->detail->opd_schedule)?$department->detail->opd_schedule:''}}</textarea>
											<div class="col-md-3 my-2">
												<button onClick="updateDepartmentDetails('opd_schedule',{{$department->id}})" type="button" class="btn btn-dark waves-effect waves-light">Save</button>
											</div>
										</form>
								</div>

								<div class="tab_content">
									<form id="facilities" method="post">
										@csrf
										<textarea class="facilities" name="facilities">{{isset($department->detail->facilities)?$department->detail->facilities:''}}</textarea>
										<div class="col-md-3 my-2">
											<button onClick="updateDepartmentDetails('facilities',{{$department->id}})"  type="button" class="btn btn-info waves-effect waves-light">Save</button>
										</div>
									</form>
								</div>

								<div class="tab_content">
									<form id="future_planning" method="post">
										@csrf
										<textarea class="future_planning" name="future_planning">{{isset($department->detail->future_planning)?$department->detail->future_planning:''}}</textarea>
										<div class="col-md-3 my-2">
											<button onClick="updateDepartmentDetails('future_planning',{{$department->id}})"  type="button" class="btn btn-warning waves-effect waves-light">Save</button>
										</div>
									</form>
								</div>

								<div class="tab_content">
									<form id="faculty_ind" method="post">
										@csrf
										<textarea class="faculty" name="faculty">{{isset($department->detail->faculty)?$department->detail->faculty:''}}</textarea>
										<div class="col-md-3 my-2">
											<button onClick="updateDepartmentDetails('faculty_ind',{{$department->id}})"  type="button" class="btn btn-success waves-effect waves-light">Save</button>
										</div>
									</form>
								</div>

								<div class="tab_content">
									<form id="staff_residents" method="post">
										@csrf
										<textarea class="staff_residents" name="staff_residents">{{isset($department->detail->staff_residents)?$department->detail->staff_residents:''}}</textarea>
										<div class="col-md-3 my-2">
											<button onClick="updateDepartmentDetails('staff_residents',{{$department->id}})"  type="button" class="btn btn-dark waves-effect waves-light">Save</button>
										</div>
									</form>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

<script src="{{asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
<script src="{{asset('assets/js/tabs.js')}}"></script>
<!-- <script src="{{asset('assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset('assets/js/formeditor.js')}}"></script> -->

<!-- INTERNAL SUMMERNOTE Editor JS -->
<script src="{{asset('assets/plugins/summernote/summernote1.js')}}"></script>
<script src="{{asset('assets/js/summernote.js')}}"></script>



<script>
	$('.introduction').summernote();
	$('.goal').summernote();
	$('.opd_schedule').summernote();
	$('.facilities').summernote();
	$('.future_planning').summernote();
	$('.faculty').summernote();
	$('.staff_residents').summernote();
	//$('.future_planning').richText();

// $(document).ready(function(){
// 	$('body').on('click','.tab_list li',function(){
// 		alert($(this).prev().attr('rel'));
// 	})
// });

</script>

@endpush

@push('css')
<link href="{{asset('assets/plugins/tabs/style.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/summernote/summernote1.css')}}" rel="stylesheet" />

<!-- <link href="{{asset('assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" /> -->
@endpush

