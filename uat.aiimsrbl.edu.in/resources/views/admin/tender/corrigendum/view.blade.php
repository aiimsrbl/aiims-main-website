@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Corrigendum</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.tender.listing',['tab'=>'c'])}}">Corrigendum</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Corrigendum</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Corrigendum</h3>
					</div>
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Tender (Reference No)</td>
									<td>{{$corrigendum->tender->category}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Title</td>
									<td>{{$corrigendum->title}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Release Date</td>
									<td>{{display_date($corrigendum->release_date)}}<td>
								</tr>
								<tr>
									<td class="col-md-2">Created By </td>
									<td>{{$corrigendum->createdBy->name}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated By</td>
									<td>{{$corrigendum->updatedBy->name??'--'}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Created At</td>
									<td>{{display_date_time($corrigendum->created_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Updated At</td>
									<td>{{display_date_time($corrigendum->updated_at)}}</td>
								</tr>
								<tr>
									<td class="col-md-2">Refrence File</td>
									<td>
										@if($corrigendum->refrence_file && file_exists(storage_path().'/app/public/tenders/corrigendum/'.$corrigendum->refrence_file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'tenders/corrigendum/'.$corrigendum->refrence_file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											</div>
										@endif
									</td>
								</tr>
								<tr>
									<td>
										<button onclick="redirect_url($(this),'{{route('admin.tender.listing',['tab'=>'c'])}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
