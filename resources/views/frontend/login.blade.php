@extends('layouts.frontend_layout')
@section('title','Login | - Webqom Technologies')
@section('page_header','Login')
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
        	<form type="POST" id="gsr-contact" onSubmit="return valid_datas( this );">      
                <label><b>Email Address</b> <em>*</em></label>
                <input type="text" id="name" placeholder="mail@yourdomain.com">
     
                
                <label><b>Password</b> <em>*</em></label>
                <input type="text">
                <div class="clearfix"></div>
                
                <a href="">Forgot your password?</a>
                <div class="clearfix"></div>
                
                <div class="margin_top3"></div>
                <a href="client_area_home.html" class="but_medium1 caps">Login</a>
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
    	<a href="registration.html" class="but_medium1 caps">Register</a>
    </div><!-- end section -->

</div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>


<div class="clearfix"></div>

@endsection