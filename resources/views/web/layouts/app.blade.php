<!doctype html>
<html lang="en" dir="ltr">
    @include('web.layouts.head')
    <body>
        @include('web.layouts.header')
        @yield('content')
        @include('web.layouts.footer')
    </body>
</html>