@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Office Orders</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.office_order.listing')}}">Office Orders</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Order</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Order</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>

								<tr>
									<td class="col-md-2">Record Type</td>
									<td >{{ucwords(str_replace('_',' ',$show_data->record_type))}}</td>
								</tr>
								
								
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$show_data->title}}</td>
								</tr>
								
								<tr>
									<td class="col-md-2">Link Type</td>
									<td>{{ucfirst($show_data->link_type)}}</td>
								</tr>
								
								<tr>
									<td class="col-md-2">URL</td>
									<td>
										@if($show_data->link_type == 'url')
											<a href="{{$show_data->url}}" target="_blank">{{$show_data->url}}</a>
										@else
										--
										@endif
									</td>
								</tr>

								<tr>
									<td class="col-md-2">File</td>
									<td>
										@if($show_data->file && file_exists(storage_path().'/app/public/office-orders/'.$show_data->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'office-orders/'.$show_data->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											</div>
										@endif
									</td>
								</tr>

								<tr>
									<td class="col-md-2">Release Date</td>
									<td>{{display_date($show_data->release_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$show_data->createdBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By </td>
									<td>{{$show_data->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($show_data->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($show_data->updated_at)}}</td>
								</tr>
								
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.office_order.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
