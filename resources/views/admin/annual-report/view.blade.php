@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Annual Reports</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.annual.report.listing')}}">Annual Reports</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View News</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$viewObj->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$viewObj->createdBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By </td>
									<td>{{$viewObj->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($viewObj->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($viewObj->updated_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">File</td>
									<td>
										@if($viewObj->file && file_exists(storage_path().'/app/public/annual-report/'.$viewObj->file))
												<a href="{{ route('image.displayImage',['p'=>'annual-report/'.$viewObj->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.annual.report.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
