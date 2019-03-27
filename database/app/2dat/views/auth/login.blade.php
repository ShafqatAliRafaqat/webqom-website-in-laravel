

@extends('layouts.frontend_layout')
@section('title','Login | - Webqom Technologies')
@section('page_header','Login')
@section('breadcrumbs','Login')
@section('content')
<div class="clearfix"></div>




<div class="clearfix"></div>


<div class="content_fullwidth">
<div class="container">

    <div class="one_half_less">
        <h2 class="caps"><b>Login</b></h2>
        <p>If you have an account with us, please enter your login name and password. You can login with your email address.</p>
        <div class="cforms alileft">
            
            <div id="form_status"></div>
            <form id="login_form">      
                <label><b>Email Address</b> <em>*</em></label>
                <input type="text" id="email" name="email" placeholder="mail@yourdomain.com">
     <div class="red"  id="loginErrors"></div>
                
                <label><b>Password</b> <em>*</em></label>
                <input id="password" name="password" type="password">
            <div class="red" id="loginPasswordErrors"></div>

                <div class="clearfix"></div>
                
                <a href="{{url('/reset_password')}}">Forgot your password?</a>
                <div class="clearfix"></div>
                
                <div class="margin_top3"></div>
                <button class="but_medium1 caps">Login</button>
                <div class="clearfix margin_top3"></div>

                    
            </form>
        </div>
        
    </div><!-- end section -->
    
    <div class="one_half_less last">
        <h2 class="caps"> <b>New Customer?</b></h2>
        <p>By creating an account with us you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made. Enjoy exclusive discounts and offers.</p>
        <p>Not yet registered? Click here to create your account.</p>
        <div class="clearfix"></div>
        <div class="margin_top3"></div>
        <a href="{{url('/register')}}" class="but_medium1 caps">Register</a>
    </div><!-- end section -->

</div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>


<div class="clearfix"></div>

@endsection


@section('custom_scripts')
<script type="text/javascript">
    $(document).on('submit', '#login_form', function(event) {
        event.preventDefault();
        $("#loginErrors").html('');
            $("#loginPasswordErrors").html('');
            var email=$("#email").val();
            var password=$("#password").val();
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
                url: './auth/login',
                type: "post",
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
                      $("#loginErrors").html(response.responseJSON.email);  
                }

            });
        
    });
</script>
@endsection