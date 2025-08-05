@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Spotlight</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.spotlight.listing')}}">Spotlight</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Spotlight</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Quotation</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$view->title}}</td>
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
										@if($view->link_type == 'file' && $view->file && file_exists(storage_path().'/app/public/spotlights/'.$view->file))
											<a href="{{ route('image.displayImage',['p'=>'spotlights/'.$view->file]) }}" target="_blank">
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
									<td class="col-md-2">Status</td>
									<td>{{ucfirst($view->status)}}</td>
								</tr>
								<tr><t
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.spotlight.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
