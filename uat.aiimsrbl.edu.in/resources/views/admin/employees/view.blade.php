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
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Employee </h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Name</td>
									<td class="col-md-2">{{$view->name}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Designation</td>
									<td>{{$view->designation}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Email</td>
									<td>{{$view->email}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$view->createdBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By </td>
									<td>{{$view->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($view->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($view->updated_at)}}</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.employee.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
