@extends('web.layouts.app')
@section('title','About President | AIIMS Raebareli')
@section('content')


			<!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">{{ucfirst($obj->type)}}</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">Department</li>
							<li class="breadcrumb-item active text-white" aria-current="page">{{ucfirst($obj->type)}}</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
    <!--Tenders listing-->
	<section class="sptb">
		<div class="container">
			<div class="row">
				<!--Right Side Content-->
				<div class="col-xl-3 col-lg-4 col-md-12">
					<div class="card">
						<div class="item-user">
							<div class="profile-pic mb-0">

								@if($obj->image && file_exists(storage_path().'/app/public/faculty_profile/'.$obj->image))
                                                    
								<a href="{{ route('image.displayImage',['p'=>'faculty_profile/'.$obj->image]) }}" target="_blank">
									<img src="{{ route('image.displayImage',['p'=>'faculty_profile/'.$obj->image]) }}" class="w-100" alt="user">
								</a>
							@else
							<img src="{{asset('assets/images/products/logo/img1.png')}}" alt="user" class="w-100">
							@endif

							</div>
						</div>
						<div class="card-body item-user">
								<div class="ms-1">
								<a href="userprofile.html" class="text-dark">
									<h4 class="mt-1 mb-3 font-weight-bold">{{ucfirst($obj->name)}}</h4>
								</a>
								<span class="">{{ucfirst($obj->designation->name)}}</span><br>
									</div>
						</div>
						
							<div class="card-body item-user">
							<h4 class="mb-4">Contact Info</h4>
							<div>
								@if($obj->email)
								<h6>
									<span class="font-weight-semibold">
										<i class="fa fa-envelope me-3 mb-2"></i>
									</span>
									<a href="javascript:void(0);" class="text-body">
										{{$obj->email}}
									</a>
								</h6>
								@endif

								@if($obj->phone)
								<h6>
									<span class="font-weight-semibold">
										<i class="fa fa-phone me-3  mb-2"></i>
									</span>
									<a href="javascript:void(0);" class="text-primary">
										{{$obj->phone}}
									</a>
								</h6>
								@endif

								@if($obj->facebook)
								<h6>
									<span class="font-weight-semibold">
										<i class="fa fa-facebook me-3  mb-2"></i>
									</span>
									<a target="_blank" href="{{$obj->facebook}}" class="text-body">
										@php
										$arr =  explode('/',$obj->facebook);
										if(is_array($arr)){
											echo '/'.end($arr);
										}
										else{
											echo $obj->facebook;
										}
										@endphp
									</a>
								</h6>
								@endif

								@if($obj->twitter)
								<h6>
									<span class="font-weight-semibold">
										<i class="fa fa-twitter me-3  mb-2"></i>
									</span>
									<a target="_blank" href="{{$obj->facebook}}" class="text-body">
										@php
										$arr =  explode('/',$obj->twitter);
										if(is_array($arr)){
											echo '/'.end($arr);
										}
										else{
											echo $obj->twitter;
										}
										@endphp
									</a>
								</h6>
								@endif

								@if($obj->linkedin)
								<h6>
									<span class="font-weight-semibold">
										<i class="fa fa-linkedin me-3  mb-2"></i>
									</span>
									<a target="_blank" href="{{$obj->facebook}}" class="text-body">
										@php
										$arr =  explode('/',$obj->linkedin);
										if(is_array($arr)){
											echo '/'.end($arr);
										}
										else{
											echo $obj->linkedin;
										}
										@endphp
									</a>
								</h6>
								@endif

							</div>
						</div>
						
					</div>
					
				</div>
				<!--Right Side Content-->

				<div class="col-xl-9 col-lg-8 col-md-12">
					<div class="card"><div class="card-header text-center">
								<h3 class="card-title ">Biographical:</h3>
							</div>
					<div class="card-body">
										
						<div class="mb-4">
							{!!$obj->description??'--'!!}
						</div>
						
						
					</div>	
					</div>
				
				</div>
			</div>
		</div>
	</section>
		<!--/Tenders Listings-->
@endsection

