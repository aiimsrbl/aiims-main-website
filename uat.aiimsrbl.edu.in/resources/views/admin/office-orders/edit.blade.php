@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Office Orders</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.office_order.listing')}}">Office Orders</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add Order</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Office Order</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="news_form" autocomplete="off">
							@csrf

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Record Type</label>
									</div>
									<div class="col-md-9">
										<select name="record_type" class="select2">
											<option value="office_order" {{($edit->record_type =='office_order')?'selected':''}}>Office Order</option>
											<option value="official_downloads" {{($edit->record_type =='official_downloads')?'selected':''}}>Official Downloads</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Title" name="title" id="title" class="form-control">{{$edit->title}}</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Release Date*</label>
									</div>
									<div class="col-md-9">
										<div class="wd-200 mg-b-30">
											<div class="input-group">
												<div class="input-group-text">
													<div class="">
														<i class="fa fa-calendar tx-16 lh-0 op-6"></i>
													</div>
												</div>
												<input class="form-control fc-datepicker" placeholder="DD-MM-YYYY" type="text" name="release_date" id="release_date" value="{{display_date($edit->release_date)}}">
											</div>
										</div>
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
											<option value="file" {{($edit->link_type =='file')?'selected':''}}>File</option>
											<option value="url" {{($edit->link_type =='url')?'selected':''}}>URL</option>
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
										<input value="{{$edit->url}}" type="text" class="form-control" placeholder="Enter URL" name="url" id="url">
									</div>
								</div>
							</div>

							<div class="mb-3 spot-file-sec {{($edit->link_type !='file')?'d-none':''}} ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Refrence File*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>
										@if($edit->file && file_exists(storage_path().'/app/public/office-orders/'.$edit->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'office-orders/'.$edit->file]) }}" target="_blank">
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
											<option value="active" {{($edit->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($edit->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editOfficeOrder({{$edit->id}});">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.office_order.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
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
	$('#release_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush

