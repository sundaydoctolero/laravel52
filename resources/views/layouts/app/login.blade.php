<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Login | Software</title>


    <!-- CSS -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic">
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/login/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/login/awesome-bootstrap-checkbox.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/login/style.css') }}">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('bower_components/login/icons/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('bower_components/login/icons/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('bower_components/login/icons/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('bower_components/login/icons/apple-touch-icon-57-precomposed.png') }}">

</head>

<body>

<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-fixed-top navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Bootstrap Login Form</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!--
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Menu item 1</a></li>
                <li><a href="#">Item 2</a></li>
                <li><a href="#">Item 3</a></li>
                <li><a href="#">Item 4</a></li>
            </ul>
        </div>
        -->
    </div>
</nav>

<!-- Login Form 1 -->
<div class="l-form-1-container section-container section-container-image-bg">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 l-form-1 section-description wow fadeIn">
                <h1><img src="{{ asset('images/logo/main-logo.png') }}" /></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 l-form-1-box wow fadeInUp">

                <div class="l-form-1-top">
                    <div class="l-form-1-top-left">
                        <h3>Login to our site</h3>
                        <p>Enter your username and password to log on:</p>
                    </div>
                    <div class="l-form-1-top-right">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <div class="l-form-1-bottom">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="sr-only" for="l-form-1-username">Username</label>
                            <input type="text" name="username" placeholder="Username..." class="l-form-1-username form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="l-form-1-password">Password</label>
                            <input type="password" name="password" placeholder="Password..." class="l-form-1-password form-control" id="password">
                        </div>
                        <button type="submit" class="btn">Sign in!</button>
                        <div class="checkbox">
                            <input type="checkbox" id="remember-me" class="styled">
                            <label for="remember-me">Remember me</label>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 footer-social">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 footer-copyright">
                &copy; Bootstrap Login Form by <a href="http://azmind.com">LinkMe Software</a>.
            </div>
        </div>
    </div>
</footer>


<!-- Javascript -->
<script src="{{ asset('bower_components/login/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('bower_components/login/jquery-migrate-3.0.0.min.js') }}"></script>
<script src="{{ asset('bower_components/login/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/login/jquery.backstretch.min.js') }}"></script>
<script src="{{ asset('bower_components/login/wow.min.js') }}"></script>
<script src="{{ asset('bower_components/login/retina-1.1.0.min.js') }}"></script>
<script src="{{ asset('bower_components/login/waypoints.min.js') }}"></script>
<script src="{{ asset('bower_components/login/scripts.js') }}"></script>

<!--[if lt IE 10]>
<script src="{{ asset('bower_components/login/placeholder.js') }}" /></script>
<![endif]-->

</body>

</html>