<!doctype html>
    <html lang="en" dir="ltr">

        @include('admin.layouts.head')

        <body class="app sidebar-mini">

            <!--Loader-->
            <div id="global-loader">
                <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="">
            </div>

            <!-- @include('admin.layouts.left_menu') -->

            <div class="page">
			    <div class="page-main">
                    @include('admin.layouts.header')
                    @include('admin.layouts.left_menu')
                    @yield('content')
                </div>
                @include('admin.layouts.footer')
            </div>
            <!-- Back to top -->
		    <a href="#top" id="back-to-top" ><i class="fa fa-rocket"></i></a>

            <!-- Dashboard Css -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

            <!-- <script src="{{ asset('assets/js/vendors/jquery.min.js') }}"></script> -->
            <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('assets/js/vendors/jquery.sparkline.min.js') }}"></script>
            <script src="{{ asset('assets/js/vendors/selectize.min.js') }}"></script>
            <script src="{{ asset('assets/js/vendors/jquery.tablesorter.min.js') }}"></script>
            <script src="{{ asset('assets/js/vendors/circle-progress.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>

            <!-- Fullside-menu Js-->
            <script src="{{ asset('assets/plugins/toggle-sidebar/sidemenu.js') }}"></script>

            <!--Select2 js -->
            <script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>

            <!-- Timepicker js -->
            <script src="{{ asset('assets/plugins/time-picker/jquery.timepicker.js') }}"></script>
            <script src="{{ asset('assets/plugins/time-picker/toggles.min.js') }}"></script>

            <!-- Datepicker js -->
            <script src="{{ asset('assets/plugins/date-picker/spectrum.js') }}"></script>
            <script src="{{ asset('assets/plugins/date-picker/jquery-ui.js') }}"></script>
            <script src="{{ asset('assets/plugins/input-mask/jquery.maskedinput.js') }}"></script>

            <!-- file uploads js -->
            <script src="{{ asset('assets/plugins/fileuploads/js/dropify.js') }}"></script>

            <!--InputMask Js-->
            <script src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>

            <!-- p-scroll bar Js-->
            <script src="{{ asset('assets/plugins/pscrollbar/pscrollbar.js') }}"></script>
            <script src="{{ asset('assets/plugins/pscrollbar/pscroll.js') }}"></script>

            <!-- sticky Js-->
            <script src="{{ asset('assets/js/sticky-1.js') }}"></script>

            <!--Counters -->
            <script src="{{ asset('assets/plugins/counters/counterup.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/counters/waypoints.min.js') }}"></script>
            <script src="{{ asset('assets/plugins/counters/numeric-counter.js') }}"></script>

            <!--Bootstrap-datepicker js-->
            <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>

            <!-- Inline js -->
            <script src="{{ asset('assets/js/select2.js') }}"></script>
            <script src="{{ asset('assets/js/formelements.js') }}"></script>


            <!-- Custom Js-->
            <script src="{{ asset('assets/js/admin-custom.js') }}"></script>
            <script src="{{ asset('assets/js/themecolors.js') }}"></script>

            <script>
            var base_url        = "{{ url('/')}}";
            var DATE_FORMAT        = "dd-mm-yy";
            var SERVER_ERR_MSG  = 'Unexpected error occurred while trying to process your request. Please report to admin as soon as you can.';
            var FORM_ERROR_MSG  = 'Please check form and fill valid data.';
            </script>

            @stack('scripts')

            <script src="{{asset('assets/notiflix/notiflix-notify-aio-3.2.5.min.js')}}"></script>
            <script src="{{asset('assets/notiflix/notiflix-report-aio-3.2.5.min.js')}}"></script>
            <script src="{{asset('assets/notiflix/notiflix-confirm-aio-3.2.5.min.js')}}"></script>
            <script src="{{asset('assets/notiflix/notiflix-loading-aio-3.2.5.min.js')}}"></script>
            <script src="{{asset('assets/notiflix/notiflix-block-aio-3.2.5.min.js')}}"></script>

            <script src="{{asset('assets/js/admin.js')}}"></script>

            <script>
            

            Notiflix.Notify.init({
                    showOnlyTheLastOne:true,
            });

            Notiflix.Confirm.init({
                titleColor:'red'
            });

                $(document).ready(function(){
                    @if(session('success'))
                        success_popup("{{session('success')}}");
                    @endif
                    @if(session('error'))
                        error_popup("{{session('error')}}");
                    @endif
                    @if(session('success_notify'))
                        Notiflix.Notify.success("{{session('success_notify')}}");
                    @endif
                    @if(session('error_notify'))
                        Notiflix.Notify.failure("{{session('error_notify')}}");
                    @endif
                });

            </script>
        </body>
    </html>