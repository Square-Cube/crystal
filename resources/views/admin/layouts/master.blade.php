<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ======================-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta NAME="keywords" CONTENT="" />
        <meta NAME="copyright" CONTENT="" />

        <!-- Title Name
        ================================-->
        <title>crystal store management</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/admin/images/fav-icon.png')}}">

        <!-- Css Base And Vendor
        ===================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/bootstrap/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/admin/vendor/select2/select2.min.css')}}">
        <link href="{{asset('assets/admin/vendor/datepicker/jquery.datetimepicker.min.css')}}" rel="stylesheet">

        <link href="{{asset('assets/admin/sweetalert.css')}}" rel="stylesheet" type="text/css" />

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        @yield('models')
        <div id="wrapper">
            <div class="main">
                @if(Request::route()->getName() == 'admin.images' || Request::route()->getName() == 'admin.home' || Request::route()->getName() == 'admin.location' || Request::route()->getName() == 'admin.breakout')
                    @yield('content')
                @else
                    @include('admin.layouts.sidebar')
                    <div class="page-content dash-content">
                        @include('admin.layouts.header')
                        @yield('content')
                    </div>
                @endif
            </div>
        </div>
        <!-- Start Loading
        ==========================================-->
        <div class="loading">
            <div class="loading-content">
                <div class="loader-icon"></div>
            </div>
        </div>
        <!-- JS Base And Vendor
        ==========================================-->
        <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/bootstrap/bootstrap.min.js')}}"></script>
        <script defer src="{{asset('assets/admin/vendor/font_awosame/all.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/timer/jquery.simple.timer.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/timer/countid.min.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/datepicker/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('assets/admin/js/main.js')}}"></script>
        <script src="{{asset('assets/admin/js/admin.js')}}"></script>
        <script src="{{asset('assets/admin/vendor/select2/select2.min.js')}}"></script>
        <script src="{{asset('assets/admin/sweetalert.min.js')}}" type="text/javascript"></script>
        @yield('js')

    </body>
</html>