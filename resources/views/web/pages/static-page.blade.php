@extends('web.layouts.app')
@section('title','Contact Us | AIIMS Raebareli')
@section('content')
   
        <!--Breadcrumb-->
		<div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}" style="background-image: url({{asset('assets/images/banners/banner1.jpg')}}); background-position: center center;">
			<div class="header-text mb-0">
				<div class="container">
					<div class="text-center text-white ">
						<h1 class="">{{$data->title}}</h1>
						<ol class="breadcrumb text-center">
							<li class="breadcrumb-item"><a href="/">Home</a></li>
						
							<li class="breadcrumb-item active text-white" aria-current="page">{{$data->title}}</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	
		<!--/Breadcrumb-->
        <!--Contact-->
            <div class="sptb bg-white">
                <div class="container">
                    {!! $data->description !!}
				</div>
            </div>
        <!--Contact-->
        <!-- Google Maps Plugin -->
		@endsection

