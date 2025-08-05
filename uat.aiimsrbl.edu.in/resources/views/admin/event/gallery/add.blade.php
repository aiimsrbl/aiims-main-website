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
						<h3 class="card-title">Add New Record</h3>
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
										<select id="event"  name="event" class="select2">
											<option value="">Select Events</option>
											@foreach($events as $eventId => $name)
											<option value="{{$eventId}}"  {{(isset($event->id) && $event->id==$eventId)?'selected':''}}>{{$name}}</option>
											@endforeach
										</select>
										@endif
									</div>
								</div>
							</div>

							<div class="event-wrapper">
								<div class="mb-3 event-sec">
									<div class="row">
										<div class="col-md-3">
											<label class="form-label event-label">Image 1</label>
											<input type="hidden" name="temp[]">
										</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-3 col-lg-4 col-sm-12">
													<input type="file" name="image_0" class="event-image"/>
												</div>	
												<div class="col-md-4 col-sm-12">
													<input type="text" placeholder="Enter Title" name="title_0" class="form-control event-input">
												</div>
												<div class="col-md-4 col-sm-12  add-more-sec">
													<button type="button" onClick="eventAddMore($(this))" class="btn btn-success btn-sm">Add More +</button>
												</div>		
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="mb-3 mb-0 row justify-content-end">
								<div class="col-md-3">
									
									<button id="submit_btn" type="button" class="btn btn-primary waves-effect waves-light" onClick="addEventGallery();">Submit</button>
									
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