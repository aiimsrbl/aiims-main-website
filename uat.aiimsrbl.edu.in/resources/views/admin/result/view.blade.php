@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Exam Results</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.result.listing')}}">Results</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Result</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Result</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Results Type</td>
									<td class="col-md-2">{{$result->category}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Title/Examination Details</td>
									<td>{{$result->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Publish Date</td>
									<td>{{display_date($result->publish_date)}}</td>
								</tr>
							
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$result->createdBy->name}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By </td>
									<td>{{$result->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($result->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($result->updated_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Result File</td>
									<td>
										@if($result->file && file_exists(storage_path().'/app/public/results/'.$result->file))
											
												<a href="{{ route('image.displayImage',['p'=>'results/'.$result->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.result.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
