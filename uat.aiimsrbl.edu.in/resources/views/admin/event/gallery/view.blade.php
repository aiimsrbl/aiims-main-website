@extends('admin.layouts.app')
@section('content')
<div class="app-content">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Manage Events</h4>
            <ol class="breadcrumb">
				<li class="breadcrumb-item"><a  href="{{route('admin.event.listing')}}">Events</a></li>
				<li class="breadcrumb-item"><a  href="{{route('admin.event.listing')}}">Gallery</a></li>
				<li class="breadcrumb-item active" aria-current="page">View Gallery</li>
			</ol>
		</div>

		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="card">
				<div class="card-header">
						<h3 class="card-title">View Event Gallery ({{$view->title}})</h3>
                        <div class="col-md-8 text-right">
                            <a href="javascript:void(0)" onClick="redirect_url($(this),'{{route('admin.event.gallery.edit',$view->id)}}')" class="btn btn-sm btn-primary"> Edit Event Gallery Data</a>
                        </div>
					</div>
					<div class="card-body">
						<div class="container">
							<div class="row">
								@if(isset($view->galleries) && $view->galleries->count())
									@foreach($view->galleries as $obj)
										<div class="col-md-4 my-4">
												@if($obj->image && file_exists(storage_path().'/app/public/events/gallery/'.$obj->image))
												<a href="{{ route('image.displayImage',['p'=>'events/gallery/'.$obj->image]) }}" target="_blank">
													<img width="200" height="200" src="{{ route('image.displayImage',['p'=>'events/gallery/'.$obj->image]) }}">
												</a>
												@else
												--
												@endif
											<div class="row my-2">
												<div class="col-md-9">
													{{ $obj->title ? $obj->title: '--' }}
												</div>
											</div>
										</div>
									@endforeach
								@endif
								<div class="row">
									<div class="col-md-4">
										<button onclick="redirect_url($(this),'{{route('admin.event.listing')}}')"  type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection
