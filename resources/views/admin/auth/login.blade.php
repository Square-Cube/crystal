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

        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/admin/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <div class="main">
                <div class="page-content">
                    <div id="welcome-home">
                        <div class="container">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <div class="login-register">
                                        <div class="logo">
                                            <img src="{{asset('assets/admin/images/logo-icon.png')}}">
                                        </div>
                                        <form class="login-form" action="{{ route('admin.login') }}" method="post" >
                                            {!! csrf_field() !!}
                                            <div class="form-title">login</div>

                                            <div class="alert alert-success hidden SuccessMessage" id=""></div>
                                            <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                                            <div class="form-group">
                                                <input type="email" placeholder="Email Address" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <button class="custom-btn" type="submit">
                                                    sign in <i class="fa fa-angle-right"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <script src="{{asset('assets/admin/js/main.js')}}"></script>

        <script src="{{asset('assets/admin/js/login.js')}}" type="text/javascript"></script>

    </body>

</html>