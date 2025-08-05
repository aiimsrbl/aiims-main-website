@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Employees</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.employee.listing')}}">Employees</a></li>
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
						<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('admin.hospital.add.post')}}"  autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Today's OPD Patient*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('today_opd','is-invalid state-invalid')}}" name="today_opd"  value="{{ old('today_opd') }}" placeholder="Enter Today's OPD Patient">
										<div class="invalid-feedback">{{$errors->first('today_opd')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Total OPD Patient*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" style="background-color:#f0f3fa" value="{{ $total_opd }}" disabled style="background-color:#f0f3fa">
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Today's admission*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('today_admission','is-invalid state-invalid')}}" name="today_admission"  value="{{ old('today_admission') }}" placeholder="Enter Today's admission">
										<div class="invalid-feedback">{{$errors->first('today_admission')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Total admission*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{ $total_ipd }}" disabled style="background-color:#f0f3fa">
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Today's Lab Reporting*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('today_lab_reporting','is-invalid state-invalid')}}" name="today_lab_reporting"  value="{{ old('today_lab_reporting') }}" placeholder="Enter Today's Radiology Reporting">
										<div class="invalid-feedback">{{$errors->first('today_lab_reporting')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Total Lab Reporting*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{ $total_lab_reporting }}" disabled style="background-color:#f0f3fa">

									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Today's Radiology Reporting*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('today_radiology_reporting','is-invalid state-invalid')}}" name="today_radiology_reporting"  value="{{ old('today_radiology_reporting') }}" placeholder="Enter Today's Radiology Reporting">
										<div class="invalid-feedback">{{$errors->first('today_radiology_reporting')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Total Radiology Reporting*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" value="{{ $total_radiology_reporting }}" disabled style="background-color:#f0f3fa">
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Today's OT Cases*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('today_ot_cases','is-invalid state-invalid')}}" name="today_ot_cases"  value="{{ old('today_ot_cases') }}" placeholder="Enter Today's OT Cases">
										<div class="invalid-feedback">{{$errors->first('today_ot_cases')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Total OT Cases*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('total_ot_cases','is-invalid state-invalid')}}" name="total_ot_cases"  value="{{ old('total_ot_cases') }}" placeholder="Enter Total OT Cases">
										<div class="invalid-feedback">{{$errors->first('total_ot_cases')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Trauma and Emergency Occupied Bed*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('trauma_and_rmergency_occupied_bed','is-invalid state-invalid')}}" name="trauma_and_rmergency_occupied_bed"  value="{{ old('trauma_and_rmergency_occupied_bed') }}" placeholder="Enter Trauma and Emergency Occupied Bed">
										<div class="invalid-feedback">{{$errors->first('trauma_and_rmergency_occupied_bed')}}</div>
									</div>
								</div>
							</div>
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Trauma and Emergency Vacant Bed*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('trauma_and_emergency_vacant_Bed','is-invalid state-invalid')}}" name="trauma_and_emergency_vacant_Bed"  value="{{ old('trauma_and_emergency_vacant_Bed') }}" placeholder="Enter Trauma and Emergency Vacant Bed">
										<div class="invalid-feedback">{{$errors->first('trauma_and_emergency_vacant_Bed')}}</div>
									</div>
								</div>
							</div>
						
							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.hospital.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
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
