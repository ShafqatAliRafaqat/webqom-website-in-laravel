@extends('layouts.frontend_layout')
@section('title','Reset Password? | - Webqom Technologies')
@section('page_header','Reset Password')
@section('breadcrumbs','Reset Password')
@section('content')


<div class="clearfix"></div>

<div class="clearfix"></div>


<div class="content_fullwidth">
<div class="container">

    
        <h2 class="caps"><b>Forgot Your Password?</b></h2>
        <p>Please type the email address you used for signup and we will send you the new password.</p>
        <div class="clearfix margin_bottom1"></div>
        
        <div class="one_half_less">
            <div class="cforms alileft">
            
            <div id="form_status">
                @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
            </div>
            <form method="POST" action="{{ url('/password/email') }}" class="form">
            {{csrf_field()}}
                <label><b>Email Address</b> <em>*</em></label>
                <input type="text" id="name" name="email" placeholder="mail@yourdomain.com">
                @if ($errors->has('email'))
                                    <div class="red">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                
                <a href="{{url('/login')}}">Back to Login</a>
                <div class="clearfix"></div>
                
                <div class="margin_top3"></div>
                <button class="but_medium1 caps">Reset Password</button>
                <div class="clearfix margin_top3"></div>

                    
            </form>
        </div>
        
    </div><!-- end section -->
    

</div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>


<div class="clearfix"></div>

@endsection