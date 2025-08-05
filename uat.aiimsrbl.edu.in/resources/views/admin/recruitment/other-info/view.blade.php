@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Recruitment Other Information</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.recruitment.listing')}}">Recruitment</a></li>
                <li class="breadcrumb-item"><a  href="{{route('admin.recruitment.other_info.listing')}}">Other Information</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Recruitment's Other Information</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Recruitment</td>
									<td>{{$view->recruitment->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$view->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Release Date</td>
									<td>{{display_date($view->release_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Link Type</td>
									<td>{{ucfirst($view->link_type)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">URL</td>
									<td>
										@if($view->link_type == 'url')
											<a href="{{$view->url}}" target="_blank">{{$view->url}}</a>
										@else
										--
										@endif
									</td>
								</tr>
								<tr>
									<td class="col-md-2">File</td>
									<td>
										@if($view->link_type == 'file' && $view->file && file_exists(storage_path().'/app/public/recruitments/other-info/'.$view->file))
											<a href="{{ route('image.displayImage',['p'=>'recruitments/other-info/'.$view->file]) }}" target="_blank">
												<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
											</a>
										@else
										--
										@endif
									</td>
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
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.recruitment.other_info.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
