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
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Spotlight</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="spotlight_form" autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter Title" name="title" id="title" value="{{$edit->title}}">
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Link Type</label>
									</div>
									<div class="col-md-9">
										<select id="link_type" name="link_type" class="select2">
											<option {{($edit->link_type =='none')?'selected':''}} value="none">None</option>
											<option {{($edit->link_type =='file')?'selected':''}} value="file">File</option>
											<option {{($edit->link_type =='url')?'selected':''}} value="url">URL</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 spot-url-sec {{($edit->link_type !='url')?'d-none':''}}">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">URL*</label>
									</div>
									<div class="col-md-9">
										<input type="text" class="form-control" placeholder="Enter URL" name="url" id="url" value="{{$edit->url}}">
									</div>
								</div>
							</div>
					

							<div class="mb-3 spot-file-sec {{($edit->link_type !='file')?'d-none':''}} ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">File*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>	
										@if($edit->file && file_exists(storage_path().'/app/public/spotlights/'.$edit->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'spotlights/'.$edit->file]) }}" target="_blank">
													<button type="button" class='btn btn-sm my-2 mx-2 btn-info'>Click To View File</button>
												</a>
											</div>
										@endif
									</div>
								</div>
							</div>
							

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Status</label>
									</div>
									<div class="col-md-9">
										<select name="status" class="select2">
											<option value="active">Active</option>
											<option value="inactive">In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editSpotLight({{$edit->id}});">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.spotlight.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end row -->
	</div>
</div>
@endsection

@push('scripts')
	<script>
	$('#start_date,#end_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush

