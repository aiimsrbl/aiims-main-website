@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Events</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a  href="{{route('admin.event.listing')}}">Events</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.event.listing')}}">Gallery</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add New Record</li>
			</ol>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card m-b-20">
					<div class="card-header">
						<h3 class="card-title">Edit Gallery</h3>
					</div>
					<div class="card-body mb-0">
						<form class="form-horizontal" enctype="multipart/form-data" method="post" id="event_form" autocomplete="off">
							@csrf
                            <div class="mb-3 ">
								<div class="row">
									<div class="col-md-3">
										<label class="form-label">Event*</label>
									</div>
									<div class="col-md-9">
										@if($events->count())
										<select disabled  class="select2">
											<option value="">Select Events</option>
											@foreach($events as $eventId => $name)
											<option {{($edit->id==$eventId)?'selected':''}} value="{{$eventId}}">{{$name}}</option>
											@endforeach
										</select>
										<input type="hidden" id="event"  name="event" value="{{$edit->id}}">
										@endif
									</div>
								</div>
							</div>

							<div class="event-wrapper">
								@if($edit->galleries && $edit->galleries->count())
									@foreach($edit->galleries as $k => $obj)
										<div class="mb-3 event-sec">
											<div class="row">
												<div class="col-md-3">
													<label class="form-label event-label">Image {{$k+1}}</label>
													<input type="hidden" name="temp[]" value="{{$obj->id}}">
												</div>
												<div class="col-md-9">
													<div class="row">
														<div class="col-md-3 col-lg-4 col-sm-12">
															<input type="file" name="image_{{$k}}" class="event-image"/>
														</div>	
														<div class="col-md-4 col-sm-12">
															<input type="text" placeholder="Enter Title" name="title_{{$k}}" class="form-control event-input" value="{{$obj->title}}">
														</div>

														<div class="col-md-2 col-sm-12  add-more-sec">
															@if($k == $edit->galleries->count()-1)
																<button type="button" onClick="eventAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
															@endif
														</div>
														
														@if($k > 0)
															<div class="col-md-2 col-sm-12 remove-sec">
																<button data-gallery-id="{{$obj->id}}" type="button" onClick="eventRemove($(this))" class="btn btn-danger btn-sm">Remove X</button>
															</div>
														@endif
													</div>
													<div class="row">
														<div class="col-md-2">
														@if($obj->image && file_exists(storage_path().'/app/public/events/gallery/'.$obj->image))
																<a href="{{ route('image.displayImage',['p'=>'events/gallery/'.$obj->image]) }}" target="_blank">
																	<img  src="{{ route('image.displayImage',['p'=>'events/gallery/'.$obj->image]) }}" width="150" height="100">
																</a>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									@endforeach
								@endif
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="editEventGallery({{$edit->id}});">Submit</button>
									<input type="hidden" name="edit_id" value="{{$edit->id}}">
									
									<button onclick="redirect_url($(this),'{{route('admin.event.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
								
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
	$('#event_date').datepicker({ dateFormat: DATE_FORMAT });
	</script>
@endpush