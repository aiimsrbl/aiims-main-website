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
						<h3 class="card-title">Edit Record</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{route('admin.employee.edit.post',$edit->id)}}" id="quotation_form" autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Name*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('name','is-invalid state-invalid')}}" placeholder="Enter Name" name="name"  value="{{ old('name',$edit->name) }}">
										<div class="invalid-feedback">{{$errors->first('name')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Designation*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('designation','is-invalid state-invalid')}}" placeholder="Enter Designation" name="designation"  value="{{ old('designation',$edit->designation) }}">
										<div class="invalid-feedback">{{$errors->first('designation')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">E-mail*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('email','is-invalid state-invalid')}}" placeholder="Enter E-mail" name="email"  value="{{ old('email',$edit->email) }}">
										<div class="invalid-feedback">{{$errors->first('email')}}</div>
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
											<option value="active" {{(old('status',$edit->status) == 'active' ? 'selected':'')}}>Active</option>
											<option value="inactive" {{(old('status',$edit->status) == 'inactive' ? 'selected':'')}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.employee.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
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
