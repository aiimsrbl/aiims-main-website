@extends('web.layouts.app')
@section('title','Dashoard Login | AIIMS Raebareli')
@section('content')
<!--Sliders Section-->
<section>
   <div class="bannerimg cover-image bg-background3" data-image-src="{{asset('assets/images/banners/banner2.jpg')}}">
      <div class="header-text mb-0">
         <div class="container">
               <div class="text-center text-white">
                  <h1 class="">Reset Password</h1>
                  <ol class="breadcrumb text-center">
                     <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                     <li class="breadcrumb-item active text-white" aria-current="page">Reset Password</li>
                  </ol>
               </div>
         </div>
      </div>
   </div>
</section>

<!--Login-Section-->
   <section class="sptb">
      <div class="container customerpage">
         <div class="row">
            <div class="single-page" >
               <div class="col-lg-5 col-xl-4 col-md-7 d-block mx-auto">
                  <div class="wrapper wrapper2 border">
                     <!--Forgot Password Form-->
                        <form  class="card-body" tabindex="500" method="post" name="reset_password" id="reset_password">
                           @csrf
                           <div class="mail">
                              <input type="email" id="email" name="email" maxlength="50" required>
                              <label>Email</label>
                           </div>

                           <div class="submit">
                              <a onClick="adminResetPasswordOTPEmail()" class="btn btn-primary btn-block" href="javascript:void(0);" id="submit_btn">Next</a>
                           </div>
                           <p class="mb-2">
                              <a href="{{route('login')}}">Bak to login</a>
                           </p>
                        </form>
                     <!--END Forgot Password Form-->

                     <!--Forgot Password Form-->
                        <form  class="card-body d-none" tabindex="500" method="post" name="reset_password_frm" id="reset_password_frm">
                           @csrf
                           <div class="mail">
                              <input name="email_new" readonly id="email_new" name="email_new">
                              <label>Email</label>
                           </div>

                           <div class="mail">
                              <input type="text" id="otp" name="otp" maxlength="50" required>
                              <label>OTP</label>
                              <p><i class="text-success">We have sent an OTP in above email to reset password. Please check your email and enter same.</i>
                              <a href="javascript:void(0);" class="pull-right" onClick="adminResetPasswordOTPEmail()">Click to re-send OTP</a>
                              </p>
                           </div>

                           <div class="mail">
                              <input type="password" id="password" name="password" maxlength="50" required>
                              <label>Password</label>
                           </div>

                           <div class="mail">
                              <input type="password" id="password_confirmation" name="password_confirmation" maxlength="50" required>
                              <label>Confirm Password</label>
                           </div>
                           
                           <div class="submit">
                              <a onClick="adminPasswordChange()" class="btn btn-primary btn-block" href="javascript:void(0);" id="submit_btn_reset">Submit</a>
                           </div>
                           <p class="mb-2">
                              <a href="{{route('login')}}">Bak to login</a>
                           </p>
                        </form>
                     <!--END Forgot Password Form-->

                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
<!--/Login-Section-->
@endsection


