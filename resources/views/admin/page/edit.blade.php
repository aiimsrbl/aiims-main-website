@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Website Pages </h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="javascript:void(0);">Frontend</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.page.listing')}}">Page</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Page</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Page</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="page_form" autocomplete="off">
							@csrf
							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Title*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter Title" name="title" id="title" class="form-control">{{$page->title}}</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
	<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Slug/URL*</label>
									</div>
									<div class="col-md-9">
										<textarea placeholder="Enter slug" name="slug" id="slug" class="form-control">{{$page->slug}}</textarea>
										<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
							

							<div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Banner Image*</label>
									</div>
									<div class="col-md-9">
										<div class="col-lg-4 col-sm-12" id="file">
											<input type="file" class="dropify" data-height="180" name="file"/>
										</div>
										@if($page->file && file_exists(storage_path().'/app/public/page/'.$page->file))
											<div class="col-md-2">
												<a href="{{ route('image.displayImage',['p'=>'page/'.$page->file]) }}" target="_blank">
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
										<label class="form-label">Description</label>
									</div>
									<div class="col-md-6">
										<textarea class="description" name="description">{{ old('description', $page->description) }}</textarea>
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
											<option value="active" {{($page->status =='active')?'selected':''}}>Active</option>
											<option value="inactive" {{($page->status =='inactive')?'selected':''}}>In active</option>
										</select>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editPage({{$page->id}});">Submit</button>
									
									<button onclick="redirect_url($(this),'{{route('admin.page.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
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
	<script src="{{asset('assets/plugins/summernote/summernote1.js')}}"></script>
	<script>
		$('.description').summernote();
	</script>
@endpush


@push('css')
<link href="{{asset('assets/plugins/summernote/summernote1.css')}}" rel="stylesheet" />
@endpush
