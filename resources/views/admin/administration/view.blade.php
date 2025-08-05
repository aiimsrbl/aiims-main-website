@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Administration Details</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.administration.listing')}}">Administration</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Administration</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Administration</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Name</td>
									<td>{{$administration->name}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Designation</td>
									<td>{{$administration->designation}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Speciality</td>
									<td>{{$administration->speciality}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Email</td>
									<td>{{$administration->email}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Phone</td>
									<td>{{$administration->phone}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Joining Date</td>
									<td>{{display_date($administration->joining_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$administration->createdBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By </td>
									<td>{{$administration->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($administration->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($administration->updated_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">File</td>
									<td>
										@if($nirf->file && file_exists(storage_path().'/app/public/administration/'.$administration->file))
												<a href="{{ route('image.displayImage',['p'=>'administration/'.$administration->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.administration.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
