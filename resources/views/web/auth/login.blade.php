@extends('web.layouts.app')
@section('title','Dashoard Login | AIIMS Raebareli')
@section('content')
<!--Sliders Section-->
<section>
   <div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}">
      <div class="header-text mb-0">
         <div class="container">
               <div class="text-center text-white">
                  <h1 class="">Dashboard Login</h1>
                  <ol class="breadcrumb text-center">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                     
                     <li class="breadcrumb-item active text-white" aria-current="page">Dashboard Login</li>
                  </ol>
               </div>
         </div>
      </div>
   </div>
</section>

@php
$rcaptcha = rand(10000, 999999);
@endphp

<!--Login-Section-->
   <section class="sptb">
      <div class="container customerpage">
         <div class="row">
            <div class="single-page" >
               <div class="col-lg-5 col-xl-4 col-md-7 d-block mx-auto">
                  <div class="wrapper wrapper2 border">
                     <!--Login Form-->
                        <form  class="card-body" tabindex="500" method="post" name="login" id="adminLogin">
                           @csrf
                           <div class="mail">
                              <input type="email" id="email" name="email" maxlength="50" required>
                              <label>Email</label>
                           </div>
                           <div class="passwd">
                              <input type="password" id="password" name="password" maxlength="16" required>
                              <label>Password</label>
                           </div>

                           <div class="captcha" style="height:100px;">
                              <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                           </div>

                           <div class="submit">
                              <a id="submit_btn" class="btn btn-primary btn-block" href="javascript:void(0);" onClick="adminLogin();">Login</a>
                           </div>
                           <p class="mb-2">
                              <a href="{{route('web.reset.password')}}">Forgot Password</a>
                           </p>
                        </form>
                     <!--End Login Form-->

                     

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<!--/Login-Section-->
@endsection

@push('scripts')
<script src='https://www.google.com/recaptcha/api.js'></script>
@endpush


