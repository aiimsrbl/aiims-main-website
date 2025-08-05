@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Recruitment</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.recruitment.listing')}}">Recruitment</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Recruitment</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$view->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Reference No</td>
									<td class="col-md-2">{{$view->reference_no}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Description</td>
									<td class="col-md-2">{{$view->description}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Start Date</td>
									<td>{{display_date($view->start_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">End Date</td>
									<td>{{display_date($view->end_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Link</td>
									<td><a href="{{$view->link}}" target="_blank">{{$view->link}}</a></td>
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
									<td class="col-md-2">File</td>
									<td>
										@if($view->file && file_exists(storage_path().'/app/public/recruitments/'.$view->file))
											
												<a href="{{ route('image.displayImage',['p'=>'recruitments/'.$view->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.recruitment.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
