@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Department Activity</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.department.listing')}}">Department Activity</a></li>
				<li class="breadcrumb-item active" aria-current="page">Listing</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Department Activity ({{$view->department->name}})</h3>
                        <div class="col-md-8 text-right">
                            <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.department.activity.edit',$view->id)}}')" class="btn btn-sm btn-primary"> Edit Activity Data</a>
                        </div>
					</div>
					
					<div class="card-body">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td class="col-md-2">Department </td>
									<td>{{$view->department->name??'--'}}</td>
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
									<td>{{$view->status}}</td>
								</tr>

								<tr>
									<td class="col-md-2">Content</td>
									<td>{!!$view->content!!}</td>
								</tr>
							</tbody>
						</table>

						<table class="table table-bordered">
							<tbody>
								@if($view->images->count())
									@foreach($view->images as $k => $obj)
										<tr>
											<td class="col-md-2">Activity {{$k+1}} </td>
											<td>{{$obj->title??'--'}}</td>
											<td>
											@if($obj->image && file_exists(storage_path().'/app/public/department/activity/'.$obj->image))
											
												<a href="{{ route('image.displayImage',['p'=>'department/activity/'.$obj->image]) }}" target="_blank">
													<img src="{{ route('image.displayImage',['p'=>'department/activity/'.$obj->image]) }}" width="100">
												</a>
											@endif
											</td>
										</tr>
									@endforeach
								@endif
								<tr><td><button onclick="redirect_url($(this),'{{route('admin.department.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></td></tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
