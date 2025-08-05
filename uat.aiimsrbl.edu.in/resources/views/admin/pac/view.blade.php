@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage PACs</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.pac.listing')}}">PACs</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Pac</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody >
								<tr>
									<td >PAC Category</td>
									<td >{{$pac->category}}</td>
								</tr>
								<tr>
									<td >Title</td>
									<td>{{$pac->title}}</td>
								</tr>
								<tr>
									<td >Discription</td>
									<td >{{$pac->discription}}</td>
								</tr>
								<tr>
									<td >Start Date</td>
									<td >{{display_date($pac->start_date)}}</td>
								</tr>
								<tr>
									<td >End Date</td>
									<td >{{display_date($pac->end_date)}}</td>
								</tr>
									<tr>
									<td >PO Date</td>
									<td >{{display_date($pac->po_date)}}</td>
								</tr>
								<tr>
									<td >Created By </td>
									<td >{{$pac->createdBy->name??'--'}}</td>
								</tr>
								<tr>
									<td >Updated By </td>
									<td >{{$pac->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td >Created At</td>
									<td >{{display_date_time($pac->created_at)}}</td>
								</tr>
								<tr>
									<td >Updated At</td>
									<td >{{display_date_time($pac->updated_at)}}</td>
								</tr>
								<tr>
									<td >File</td>
									<td >

										@if($pac->file && file_exists(storage_path().'/app/public/pacs/'.$pac->file))
												<a href="{{ route('image.displayImage',['p'=>'pacs/'.$pac->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.pac.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
