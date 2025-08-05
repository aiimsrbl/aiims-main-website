@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage User</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add New User</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Add New User</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" method="post" action="{{ route('admin.user.add.post') }}">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Select Role</label>
									</div>
									<div class="col-md-9">
										<select name="role" class="select2 {{$errors->first('role','is-invalid state-invalid')}}">
											@if($roles)
												<option value="">Select Role</option>
												@foreach($roles as $role)
													<option {{(old('role') == $role->id ? 'selected':'')}} value="{{$role->id}}">{{$role->name}}</option>
												@endforeach
											@endif
										</select>
										<div class="invalid-feedback">{{$errors->first('role')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Name*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('name','is-invalid state-invalid')}}" placeholder="Enter Name" name="name"  value="{{ old('name') }}">
										<div class="invalid-feedback">{{$errors->first('name')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Email*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('email','is-invalid state-invalid')}}" placeholder="Enter E-mail" name="email"  value="{{ old('email') }}">
										<div class="invalid-feedback">{{$errors->first('email')}}</div>
									</div>
								</div>
							</div>
							
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Password*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('password','is-invalid state-invalid')}}" placeholder="Enter Password" name="password"  value="{{ old('password') }}">
										<div class="invalid-feedback">{{$errors->first('password')}}</div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Confirm Password*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control {{$errors->first('password_confirmation','is-invalid state-invalid')}}" placeholder="Enter Confirm Password" name="password_confirmation"  value="{{ old('password_confirmation') }}">
										<div class="invalid-feedback">{{$errors->first('password_confirmation')}}</div>
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
											<option value="active">Active</option>
											<option value="inactive">In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
									<a href="{{route('admin.user.listing')}}">
										<button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
									</a>
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

