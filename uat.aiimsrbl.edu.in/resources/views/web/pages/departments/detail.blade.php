@extends('web.layouts.app')
@section('title','Department List | AIIMS Raebareli')
@section('content')

<!--Breadcrumb-->
<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
	<div class="header-text mb-0">
		<div class="container">
			<div class="text-center text-white ">
				<h1 class="">{{$data->name??'--'}}</h1>
				<ol class="breadcrumb text-center">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item"><a href="{{route('web.departments')}}">Departments</a></li>
					<li class="breadcrumb-item active text-white" aria-current="page">Department Details</li>
				</ol>
			</div>
		</div>
	</div>
</div>
	
<!--/Breadcrumb-->
<!--Tenders listing-->
<section class="sptb">
	<div class="container">
		<div class="row">
			@if($data)
			<!--Right Side Content-->
		<!--	<div class="col-xl-3 col-lg-4 col-md-12">
				<div class="card">
				<div class="item-user">
					<div class="profile-pic mb-0">
						<img src="/assets/images/blank-profile-picture-973460__480.png" class="w-100" alt="user">
					</div>
				</div>
				<div class="card-body item-user">
					<div class="ms-1">
						<a href="userprofile.html" class="text-dark">
							<h4 class="mt-1 mb-3 font-weight-bold">--</h4>
						</a>
						<span class="">--</span><br>
					</div>
				</div>
				<div class="card-body item-user">
					<h4 class="mb-4">Contact Info</h4>
					<div>
						<h6><span class="font-weight-semibold"><i class="fa fa-envelope me-3 mb-2"></i></span><a href="javascript:void(0);" class="text-body"> aiimsrbl1@gmail.com</a></h6>
						<h6><span class="font-weight-semibold"><i class="fa fa-phone me-3  mb-2"></i></span><a href="javascript:void(0);" class="text-primary"> +91 0535-2704400</a></h6>
					</div>
				</div>
				</div>
			</div>
		-->	<!--Right Side Content-->
			<div class="col-xl-12 col-lg-12 col-md-12">
				<div class="card">
					<div class="card-header text-center">
						<h3 class="card-title fs-18">Introduction</h3>
					</div>
					<div class="card-body">
						@if(isset($data->detail->introduction) && !empty($data->detail->introduction))
						{!!$data->detail->introduction!!}
						@else
						--
						@endif
					</div>
				</div>
				<div class="card">
					<div class="card-header text-center">
						<h3 class="card-title fs-18">Mission, Vision and Goals</h3>
					</div>
					<div class="card-body">
						@if(isset($data->detail->goal) && !empty($data->detail->goal))
						{!!$data->detail->goal!!}
						@else
						--
						@endif
					</div>
				</div>
				
				<div>
					<div class="wideget-user-tab">
						<div class="tab-menu-heading">
							<div class="tabs-menu1">
								<ul class="nav">@if($data->id==40)
								<li><a href="#opd_schedule" data-bs-toggle="tab" class="active">Courses </a></li>
									<li><a href="#faculti" data-bs-toggle="tab" class="">Faculty</a></li>
							
								<li><a href="#facilities" data-bs-toggle="tab" class="">Facilities</a></li>
								<li><a href="#future_planning" data-bs-toggle="tab" class="">Expansion Plan</a></li>
							
									<li><a href="#staff_and_residents" data-bs-toggle="tab" class="">Research Collaborations</a></li>
							
								<li><a href="#activity" data-bs-toggle="tab" class="">Activity</a></li>
								@else
								<li><a href="#opd_schedule" data-bs-toggle="tab" class="active">OPD Schedule</a></li>
								<li><a href="#facilities" data-bs-toggle="tab" class="">Facilities</a></li>
								<li><a href="#future_planning" data-bs-toggle="tab" class="">Future Planning</a></li>
								<li><a href="#faculti" data-bs-toggle="tab" class="">Faculty</a></li>
								<li><a href="#staff_and_residents" data-bs-toggle="tab" class="">Staff & Residents</a></li>
								<li><a href="#activity" data-bs-toggle="tab" class="">Activity</a></li>
									@endif
								
								
								</ul>
							</div>
						</div>
					</div>
					<div class="card mb-0 border-0">
						<div class="card-body p-0">
							<div class="border-0">
								<div class="tab-content">
									<div class="tab-pane active" id="opd_schedule">
										<div class="card-body">
										@if(isset($data->detail->opd_schedule) && !empty($data->detail->opd_schedule))
										{!!$data->detail->opd_schedule!!}
										@else
										--
										@endif
										</div>
									</div>
									
									<div class="tab-pane" id="facilities">
										<div class="card-body">
											@if(isset($data->detail->facilities) && !empty($data->detail->facilities))
											{!!$data->detail->facilities!!}
											@else
											--
											@endif
										</div>
									</div>

									<div class="tab-pane" id="future_planning">
										<div class="card-body">
											@if(isset($data->detail->future_planning) && !empty($data->detail->future_planning))
											{!!$data->detail->future_planning!!}
											@else
											--
											@endif
										</div>
									</div>

									<div class="tab-pane userprof-tab department-faculty ajax-table-data-faculty" id="faculti">
										<!--Faculty lists-->
										@include('web.pages.departments.includes.faculty')
										<!--/Faculty lists-->
									</div>

									<div class="tab-pane userprof-tab department-staff ajax-table-data-staff" id="staff_and_residents">
										<!--residents & staff lists-->
										@include('web.pages.departments.includes.staff')
										<!--/residents & staff lists-->
									</div>
									@include('web.pages.departments.includes.activity')
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
			@else
			<h4 class="text-danger text-center">{{DATA_NOT_FOUND}}</h4>
			@endif
		</div>
	</div>
</section>
<!--/Tenders Listings-->
@endsection

