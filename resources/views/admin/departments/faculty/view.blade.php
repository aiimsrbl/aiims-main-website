@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Department Faculty</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.department.faculty.listing')}}">Department Faculty</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Department Faculty</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Profile</td>
									<td class="col-md-2">
										
									@if($view->image && file_exists(storage_path().'/app/public/faculty_profile/'.$view->image))
										
										<a href="{{ route('image.displayImage',['p'=>'faculty_profile/'.$view->image]) }}" target="_blank">
											<!-- <img  src='{{asset("storage/faculty_profile/$view->image")}}' width="100"> -->
											<img src="{{ route('image.displayImage',['p'=>'faculty_profile/'.$view->image]) }}" width="100">
										</a>
									@else
									--
									@endif
							
									</td>
								</tr>
								<tr>
									<td class="col-md-2">Department</td>
									<td class="col-md-2">{{$view->department->name??"--"}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Designation</td>
									<td class="col-md-2">{{$view->designation->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Name</td>
									<td class="col-md-2">{{$view->name}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Email</td>
									<td>{{$view->email}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Phone</td>
									<td>{{$view->phone}}</td>
								</tr>
								
								<tr>
									<td class="col-md-2">Facebook Link</td>
									<td>{{$view->facebook??"--"}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Twitter Link</td>
									<td>{{$view->twitter??"--"}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Linkedin Link</td>
									<td>{{$view->linkedin??"--"}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Faculty Type</td>
									<td>{{ucfirst($view->type)}}</td>
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
								<tr>
									<td class="col-md-2">Status</td>
									<td>{{ucfirst($view->status)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Description</td>
									<td>{!!ucfirst($view->description??'--')!!}</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.department.faculty.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
