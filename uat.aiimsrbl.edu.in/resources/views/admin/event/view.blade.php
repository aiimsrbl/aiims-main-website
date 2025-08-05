@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Events</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Event And Workshop</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.event.listing')}}">Manage Events</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add New Record</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Event</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$view->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Event Date</td>
									<td>{{display_date($view->event_date)}}</td>
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
									<td class="col-md-2">Image</td>
									<td>
										@if($view->image && file_exists(storage_path().'/app/public/events/'.$view->image))
												<a href="{{ route('image.displayImage',['p'=>'events/'.$view->image]) }}" target="_blank">
													<img width="200" src="{{ route('image.displayImage',['p'=>'events/'.$view->image]) }}">
												</a>
										@else
										--
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.event.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
