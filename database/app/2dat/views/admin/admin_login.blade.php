
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
    <form id="login_form"   class="form">
    {{ csrf_field() }}
        <div class="text-center"><a href="{{url('/')}}" target="_blank"><img src="{{url('').'/resources/assets/admin/'}}images/login/logo_web88.jpg" alt="Web88"></a></div>
        <h1 class="block-heading">Web88 Admin Login</h1>

        <p>Please enter your login details to access admin area.</p>

        <div class="form-group">
            <div class="input-icon"><i class="fa fa-user"></i><input type="text" placeholder="email" id="email" name="email" class="form-control">
            <span class="text-danger" id="loginErrors"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-key"></i>
            <input id="password" type="password" class="form-control" name="password" >
            <span class="text-danger" id="loginPasswordErrors"></span>
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox"><label><input  name="remember" type="checkbox">&nbsp;
                Remember me</label></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            <a id="btn-forgot-pwd" href="{{ url('/password/reset') }}" class="mlm">Forgot your password?</a></div>
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
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-hover-dropdown.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/html5shiv.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/respond.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-cookie/jquery.cookie.js"></script>
<script type="text/javascript">
    $(document).on('submit', '#login_form', function(event) {
        event.preventDefault();
        $("#loginErrors").html('');
            $("#loginPasswordErrors").html('');
            var email=$("#email").val();
            var password=$("#password").val();
            var csrf_token= $('input[name=_token]').val();
            if(email.length==0 ){
                $("#loginErrors").html('Email is required');
                }
            if(password.length==0){
                $("#loginPasswordErrors").html('Password is required');
               
            }
            if (email.length==0 || password.length==0) {
                 return;
            }
//            alert(email+"-"+password+"-"+csrf_token);
            remember = ($('input[name="remember"]:checked').length > 0) ? 1 : 0;
            $.ajax({
                url: '{{url('')}}/auth/login',
                type: "POST",
                data: {'email': email, 'password': password, '_token':csrf_token},
                success: function (data) {
                    if (parseInt(data) == -1) {
                        $("#loginPasswordErrors").html('You entered incorrect password');
                    }
                    else if (parseInt(data) == -2) {
                        $("#loginErrors").html('This email does not exist');
                    }
                     else {
                        //location.reload();
                        var redirect=localStorage.redirect;
                        if(redirect){
                            window.location.href=appUrl+'#'+redirect;
                        }
                        else{
                          window.location.href=data; 
                        }
                        
                    } 
                },
                
                error:function(response){
                    console.log(response);
                      $("#loginErrors").html("This account is inactive");  
                }

            });
        
    });
</script>
</body>
</html>

