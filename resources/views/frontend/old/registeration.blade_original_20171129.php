@extends('layouts.frontend_layout')
@section('title','Registration | - Webqom Technologies')
@section('page_header','Create an Account')
@section('breadcrumbs','Create an Account')
@section('content')

<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

 <div class="one_full stcode_title9" id="main-cont">
    	<h1 class="caps"><strong>FREE Sign Up </strong>    	</h1>
    </div>



<div class="clearfix"></div>

<div class="content_fullwidth">
<div class="container" >

	<div class="one_full_less">
    	<p>By creating an account with us you will be able to shop faster, be up to date on an orders status, and keep track of the orders you have previously made. Enjoy exclusive discounts and offers. If you already have an account with us, please login at the <a class="red" href="{{url('/login')}}">login</a> page.</p>
        <div class="divider_line7"></div>
        
        <div class="cforms alileft">
        <div style="display:none" id="msg_success" class="alert alert-success alert-dismissable">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                    <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                    <p>Account created successfully</p>
        </div>
        <div style="display:none" id="msg_error" class="alert alert-danger alert-dismissable">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                    <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                    <p>The information has not been saved. Please correct the errors.</p>
        </div>
        <div id="form_status">
            
        </div>
        <form  type="POST" id="frm_registeration" >
                                                
                        {{csrf_field()}}
                        <!-- business account / business partner account start -->
                        <label><b>Choose an Account Type</b> <em>*</em></label>
            <div class="radiobut">
                <input class="one" type="radio"  id="iaccount" checked="" name="account_type" value="Individual Account" > <span class="onelb">Individual Account</span>
                <input class="one" type="radio" id="baccount" name="account_type" value="Business Account"> <span class="onelb">Business Account</span>
                <!--<input class="two" type="radio" value="business-partner"> <span class="onelb">Business Partner Account</span>-->
            <div id="err_account" class="red"></div>
            </div>
            <div class="clearfix margin_bottom3"></div>

                        <div class="one_half_less">
                            <label><b>First Name</b> <em>*</em></label>
                            <input type="text" name="first_name" id="firstname">
                            <div id="err_fname" class="red"></div>
                            <label><b>Last Name</b> <em>*</em></label>
                            <input type="text" name="last_name" id="lastname">
                            <div id="err_lname" class="red"></div>
                            <label><b>Company</b> <em>(* Mandatory for Business Account)</em></label>
                            <input type="text" name="company" id="company" >   
                            <div id="err_company" class="red"></div>
                            <label><b>Email Address</b> <em>*</em></label>
                            <input type="text" name="email" id="name" placeholder="mail@yourdomain.com" >
                            <div id="err_email" class="red"></div>
                            
                            <label><b>Password</b> <em>*</em></label>
                            <input type="password" name="password" id="password" > 
                            <p class="dark">Password must be at least 12 characters. The combination of the password must be alphanumeric with one special character <span class="sitecolor">(eg. ! @ # $ % ^ & * ( ) _ + { } | : < > ? " \ [ ] ' ; / . ~ `)</span></p>
                            <input type="hidden" name="strength" value="strength" id="strength">
                            <div id="err_password" class="red"></div>
                            <label><b>Password Strength</b></label>
                            <div class="pro_bar">
                                <div class="col-md-6">
                                  <div data-hover="tooltip" data-placement="top"  class="progress progress-striped active">
                                    <div id="progress_bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" class=" ">
                                        <span class="sr-only" ></span>
                                        <span class="progress-completed" id="progress_bar_text"></span>
                                    </div>
                                  </div>
                                </div>
                                
                            </div> 
                            <div class="clearfix margin_bottom1"></div>
                            
                            <label><b>Confirm Password</b> <em>*</em></label>
                            <input type="password" name="password_confirmation" id="confirm_password">

                            <label><b>Phone</b> <em>*</em></label>
                            <input type="text" name="phone_number" id="phone">
                            <div id="err_phone" class="red"></div>
                            <label><b>Mobile Phone</b> <em>*</em></label>
                            <input type="text" name="mobile_phone_number" id="mobile_phone" >  
                            <div id="err_mobile" class="red"></div>    
                                 
                        </div><!-- end one half less -->
                        
                        <div class="one_half_less last">
                                           
                            <label><b>Address1</b> <em>*</em></label>
                            <input type="text" name="address_1" id="address1" >
                            <div id="err_address1" class="red"></div>
                            <label><b>Address 2 </b></label>
                            <input type="text" name="address_2" > 
                            <div id="err_address2" class="red"></div>
                            <label><b>Country</b> <em>*</em></label>
                            <select name="country" class="form-control countries select_height" id="country">
                                    <option value=''>-- Please select --</option>
                                     @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                    
                            </select>
                            <div id="err_country" class="red"></div>

                            <label><b>State</b> <em>*</em></label>
                            <select name="state" class="states form-control select_height" id="state">
                                    <option value=''>-- Please select --</option>
                            </select>
                            <div id="err_state" class="red"></div>
                            <label><b>City </b> <em>*</em></label>
                            <select name="city" class="cities form-control select_height" id="city">
                                    <option value=''>-- Please select --</option>
                            </select>
                            <div id="err_city" class="red"></div>

                            <label><b>Postal Code</b> <em>*</em></label>
                            <input type="text" name="postal_code" id="postal_code" > 
                            <div id="err_postal_code" class="red"></div>
                            
                        
                        </div><!-- end one half last -->
                         
                        <!-- end business account / business partner account -->
                        
                        <div class="clearfix"></div>
                        <div class="divider_line7"></div>
                        <div class="clearfix"></div>
                        <!-- end business account / business partner account -->
                        
                        <div class="checkbox">
                            <input class="one" name="news_letter"  id="subscribe" type="checkbox" checked="checked"> <span class="onelb">Yes! I would like to subscribe to your newsletter.</span>
                            <div class="clearfix"></div>
                            <input class="two" id="terms_and_conditions" name="terms_and_conditions" value="terms_and_conditions" type="checkbox"> <span class="onelb">I have read and agree to the <a href="#">Terms and Conditions</a>.</span>
                        </div>

            <div class="clearfix"></div>
            
            
            <div id="err_terms_and_conditions" class="red"></div>
            

            <!--<div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>-->
            <div class="g-recaptcha" data-sitekey="6LdwyDYUAAAAAMYAPaCEUQS8SfzrKJArVMlu7_mx"></div>
            <div class="clearfix"></div>
            <div id="err_captcha" class="red"></div>
                        <div class="margin_top3"></div>
                        <a href="javascript:void(0)" id="submit_frm_registeration" class="but_medium1 caps">Register</a>
                        <div class="clearfix margin_top3"></div>    
                        
                        <div class="clearfix"></div>
                        <input type="hidden" value="1" name="num_of_cities">
                    </form>
        
        </div>
        
    </div><!-- end section -->
    
    

</div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>


<div class="clearfix"></div>


@endsection
@section('custom_scripts')
    <script type="text/javascript">
    $( "#iaccount" ).prop( "checked", true );
        $(document).on('change', '#country', function(event) {
                    var country_id=$( "#country option:selected" ).val();
                    $("#state").html("<option value=''>-- Please select --</option>");
                    $("#city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_state/'+country_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                        for (var i=0; i < response.length; i++) {
                            $("#state").append(
                                $("<option>" , {
                                    text: response[i].name,
                                    value:  response[i].id
                                })
                            )
                        }
                    })
                    .fail(function() {
                    })
                    .always(function() {
                    });
                    
                });
                $(document).on('change', '#state', function(event) {
                    var state_id=$( "#state option:selected" ).val();
                    $("#city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_city/'+state_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                        if (response.length>0) {
                            $('input[name=num_of_cities]').val(1);
                        }else{
                            $('input[name=num_of_cities]').val('no cities found');
                        }
                        for (var i=0; i < response.length; i++) {
                            $("#city").append(
                                $("<option>" , {
                                    text: response[i].name,
                                    value:  response[i].id
                                })
                            )
                        }
                    })
                    .fail(function() {
                    })
                    .always(function() {
                    });
                    
                });
        
        $(document).on('submit','#frm_registeration', function(event) {
            $('#msg_error').hide();
            event.preventDefault();
            $.ajax({
                url: base_url+'/register',
                type: 'POST',
                data: $('#frm_registeration').serialize(),
            })
            .done(function(response) {
                $(':input','#frm_registeration')
                 .not(':button, :submit, :reset, :hidden ,:input checkbox')
                 .val('')
                 .removeAttr('checked')
                 .removeAttr('selected');
                 $( "#iaccount" ).prop( "checked", true );
                 $( "#iaccount" ).val( "Individual Account" );
                 $( "#baccount" ).val("Business Account");
                 $( "#subscribe" ).val("subscribe");
                 $( "#terms_and_conditions" ).val("terms_and_conditions");
      
                    $('html, body').animate({
                        scrollTop: $("#main-cont").offset().top
                    }, 500);
                $('#msg_success').fadeIn('slow', function() {
                    setTimeout(function() {
                        $('#msg_success').fadeOut('slow');
                    }, 6000);
                });

            })
            .fail(function(response) {
                var scroll_speed=500;
                $('#msg_error').show();
                 $('html, body').animate({
                        scrollTop: $("#main-cont").offset().top
                    }, scroll_speed);
                  $("#overlay").fadeOut();
                
                console.log();
                
                $('#err_captcha').html(response.responseJSON[1]);
                $("#err_fname").html(response.responseJSON.account_type);
                $("#err_fname").html(response.responseJSON.first_name);
                $("#err_lname").html(response.responseJSON.last_name);
                $("#err_company").html(response.responseJSON.company);
                $("#err_phone").html(response.responseJSON.phone_number);
                $("#err_mobile").html(response.responseJSON.mobile_phone_number);
                $("#err_email").html(response.responseJSON.email);
                $("#err_address1").html(response.responseJSON.address_1);
                $("#err_address2").html(response.responseJSON.address_2);
                $("#err_postal_code").html(response.responseJSON.postal_code);
                $("#err_country").html(response.responseJSON.country);
                $("#err_state").html(response.responseJSON.state);
                $("#err_city").html(response.responseJSON.city);
                $('#err_password').html(response.responseJSON.password);
                $('#err_cpassword').html(response.responseJSON.password);
                $('#err_terms_and_conditions').html(response.responseJSON.terms_and_conditions);
                
                /*if (response.responseJSON.first_name) {
                    $("input[name=first_name]").focus();
                     
                }
                else if (response.responseJSON.last_name) {
                     $('html, body').animate({
                        scrollTop: $("#err_lname").offset().top
                    }, scroll_speed);
                     
                }
                else if (response.responseJSON.company) {
                     $("input[name=company]").focus(); 
                }
                 else if (response.responseJSON.email) {
                    $("input[name=email]").focus(); 
                }
                
                else if (response.responseJSON.email) {
                     $("input[name=email]").focus(); 
                    
                }
                else if (response.responseJSON.password) {
                     $("input[name=password]").focus(); 
                }
                else if (response.responseJSON.phone_number) {
                     $("input[name=phone_number]").focus(); 
                       
                }
                else if (response.responseJSON.mobile_phone_number) {
                     $("input[name=phone_number]").focus(); 
                  
                }
                
                else if (response.responseJSON.address_1) {
                     $("input[name=address_1]").focus(); 
                    
                }
                else if (response.responseJSON.address_2) {
                     $("input[name=address_2]").focus(); 
                     
                }
                else if (response.responseJSON.country) {
                     $('html, body').animate({
                        scrollTop: $("#err_country").offset().top
                    }, scroll_speed);
                    
                }
                else if (response.responseJSON.state) {
                     $('html, body').animate({
                        scrollTop: $("#err_state").offset().top
                    }, scroll_speed);
                    
                }
                else if (response.responseJSON.city) {
                     $('html, body').animate({
                        scrollTop: $("#err_city").offset().top
                    }, scroll_speed);
                    
                }
                else if (response.responseJSON.postal_code) {
                    $("input[name=postal_code]").focus(); 
                    
                }
                else if (response.responseJSON.terms_and_conditions) {
                    $('html, body').animate({
                        scrollTop: $("#subscribe").offset().top
                    }, scroll_speed);
                    
                }
                else {
                     $('html, body').animate({
                        scrollTop: $("#subscribe").offset().top
                    }, scroll_speed);
                    
                }*/
               
               
            })
            .always(function() {
                $("#overlay").fadeOut();
            });
            
        });
        $(document).on('click', '#submit_frm_registeration', function(event) {
            $("#overlay").fadeIn();
            $("#err_fname").html("");
            $("#err_lname").html("");
            $("#err_company").html("");
            $("#err_email").html("");
            $("#err_mobile").html("");
            $("#err_phone").html("");
            $("#err_address1").html("");
            $("#err_address2").html("");
            $("#err_terms_and_conditions").html("");
                $("#err_postal_code").html("");
                $("#err_country").html("");
                $("#err_state").html("");
                $("#err_city").html("");
                $("#err_password").html("");
                $("#err_cpassword").html("");
                $("#err_captcha").html("");
            $('#msg_error').hide();    
            $('#msg_success').hide();    
            $('#frm_registeration').submit();
        }); 
          
        
        $(document).on('keyup change', '#password', function(event) {
                    var password = $(this).val();
                    console.log("length: "+password);

                    strenght=0;
                    if (password.length==0) {
                       strenght=0;

                       $('#progress_bar').removeClass();
                       $('#progress_bar').addClass('progress-bar progress-bar-danger');
                       $('#progress_bar').css('width', strenght+"%");
                       $('#progress_bar_text').html( strenght+"%");
                      console.log("zero"+strenght);
                    }
                    else if (password.length>0 && password.length<12) {
                       strenght=10;
                       $('#progress_bar').removeClass();
                       $('#progress_bar').addClass('progress-bar progress-bar-danger');
                       $('#progress_bar').css('width', strenght+"%");
                       $('#progress_bar_text').html( strenght+"% Week");
                      console.log("weak"+strenght);
                    }
                    else if (password.length>=12) {
                      strenght=50;
                      $('#progress_bar').removeClass();
                       $('#progress_bar').addClass('progress-bar progress-bar-warning');
                       $('#progress_bar').css('width', strenght+"%");
                       $('#progress_bar_text').html( strenght+"% Moderate");
                      console.log("medium"+strenght);
                      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){  
                          strenght=100;
                          $('#strength').val(100);
                          $('#progress_bar').removeClass();
                            $('#progress_bar').addClass('progress-bar progress-bar-success');
                            $('#progress_bar').css('width', strenght+"%");
                            $('#progress_bar_text').html( strenght+"% Strong");
                            console.log("strong"+strenght);
                      }
                    }
                    $('#strength').val(strenght);
                });

        
         
        

    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    @endsection