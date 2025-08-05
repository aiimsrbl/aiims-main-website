@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Tenders</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.tender.listing')}}">Tenders</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Tender</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Tender</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Tender Category</td>
									<td class="col-md-2">{{$tender->category}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Title/Adv. No./Tender No</td>
									<td>{{$tender->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Start Date</td>
									<td>{{display_date($tender->start_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">End Date</td>
									<td>{{display_date($tender->end_date)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$tender->createdBy->name}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By </td>
									<td>{{$tender->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($tender->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($tender->updated_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Tender File</td>
									<td>
										@if($tender->file && file_exists(storage_path().'/app/public/tenders/'.$tender->file))
											
												<a href="{{ route('image.displayImage',['p'=>'tenders/'.$tender->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											
										@endif
									</td>
								</tr>
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.tender.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
