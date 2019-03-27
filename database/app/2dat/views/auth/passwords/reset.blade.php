


<!DOCTYPE html>
<html lang="en">
<head>

<title>Login: Welcome to Web88 Administration Panel</title>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{url('').'/resources/assets/admin/'}}images/icons/favicon.ico" rel="shortcut icon">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,700,400italic,700italic' rel='stylesheet' type='text/css'>
    
    
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap/css/bootstrap.min.css">
    <!--LOADING SCRIPTS FOR PAGE-->
    <!--LOADING SCRIPTS FOR PAGE-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/css/datepicker.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/css/bootstrap-switch.css">
    
    <!--Loading style vendors-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/animate.css/animate.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-pace/pace.css">
    <!--Loading style-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style-mango.css" id="theme-style">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/vendors.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/themes/grey.css" id="color-style">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style-responsive.css">

    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body id="signin-page" class="animated bounceInDown">
<div id="signin-page-content">
    
    <form method="POST" action="{{ url('/password/reset') }}" class="form">
        <div class="text-center"><a href="{{url('/')}}" target="_blank"><img src="{{url('').'/resources/assets/admin/'}}images/login/logo_web88.jpg" alt="Web88"></a></div>
        
        <h1 class="block-heading">Reset Password</h1>
        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
        <p>Please enter your registered email and new password.</p>
{{csrf_field()}}
    <input type="hidden" name="token" value="{{$token}}">
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-user"></i>
            <input type="text" placeholder="Your Email" name="email" value="{{ old('email') }}" class="form-control">
                @if ($errors->has('email'))
                                    <div class="red">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                @if ($errors->has('token'))
                                    <div class="red">
                                        {{ $errors->first('token') }}
                                    </div>
                                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-key"></i>
            <input id="password" placeholder="Your new password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <div class="red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-key"></i>
            <input id="password-confirm" placeholder="Confirm new password" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <div class="red">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </div>
                                @endif
            </div>
        </div>
        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Reset Password
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            <a style="display:none"  id="btn-forgot-pwd" href="{{url('/web88/admin/login')}}" class="mlm">Return to Login Page</a></div>
        <hr>
        <a href="mailto:hock@webqom.com"><i class="fa fa-envelope"></i> hock@webqom.com</a>
        <a href="http://www.facebook.com/webqomtechnologies" class="pull-right" target="_blank"><i class="fa fa-facebook-square"></i> /webqomtechnologies</a><br/>
        <i class="fa fa-phone"></i>+(603) 2630 5562
        <span class="margin-top-5px text-12px pull-right">&copy; 2015 <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn. Bhd.</a></span>
        
    </form>
</div>
<script src="{{url('').'/resources/assets/admin/'}}js/jquery-1.9.1.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/jquery-migrate-1.2.1.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/html5shiv.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/respond.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/jquery.menu.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-pace/pace.min.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-jvectormap/gdp-data.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-knob/jquery.knob.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-animateNumber/jquery.animateNumber.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.categories.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.pie.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.tooltip.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.resize.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.fillbetween.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.stack.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.spline.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/skycons/skycons.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-news-ticker/jquery.news-ticker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/index.js"></script>

<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/moment/moment.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/form-components.js"></script>


<!--CORE JAVASCRIPT-->
<script src="{{url('').'/resources/assets/admin/'}}js/main.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/holder.js"></script>
<script type="text/javascript">
</body>
</html>