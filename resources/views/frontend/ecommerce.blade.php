@section('title', ucwords($page_name).' | - Webqom Technologies')
@section('content')

<div class="clearfix"></div>


<div class="page_title1 sty2">
    <h1>E-commerce <em>Limitless online retailing.</em> <span class="line2"></span> </h1>
</div>
<!-- end page title -->

<div class="clearfix"></div>

{!!$cms->content!!}   

<div class="clearfix"></div>

<!--Modal enquire now start-->
<div id="modal-enquire" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!--<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>-->
                <h4 id="modal-login-label3" class="modal-title">Enquire Now / Request Free Quote</h4>
            </div>
            <div class="modal-body">
                <div data-dismiss="modal" aria-hidden="true" class="plainmodal-close"></div>
                <form role="form" id="enquiry_form">
                    <p class="statusMsg"></p>
                    <div class="cforms alileft">
                        <div class="one_third_less">
                            <label><b>Service <em>*</em></b></label>
                            <select id="inputService" name="inputService">
                                <option>- Please select -</option>
                                <option>Cloud Hosting</option>
                                <option>Co-location Hosting</option>
                                <option>Dedicated Server</option>
                                <option>Domains</option>
                                <option>E-commerce</option>
                                <option selected="selected">Email88</option>
                                <option>Package P</option>
                                <option>SEO</option>
                                <option>Shared Hosting</option>
                                <option>SSL Certificates</option>
                                <option>VPS Hosting</option>
                                <option>Web88 CMS</option>
                                <option>Web88IR</option>
                                <option>Responsive Web Design</option>
                                <option>Social Media</option>
                                <option>List all categories here</option>
                            </select>
                            <label><b>Email</b> <em>*</em></label>
                            <input id="inputEmail" name="inputEmail" type="text" placeholder="mail@yourdomain.com" />
                        </div><!-- end one third less -->
                        <div class="one_third_less">
                            <input type="hidden" name="page" value="{{$page_name}}">
                            <label><b>Name</b> <em>*</em></label>
                            <input id="inputName" name="inputName" type="text" />

                            <label><b>Phone</b> <em>*</em></label>
                            <input id="inputPhone" name="inputPhone" type="text" />

                        </div><!-- end one third less -->

                        <div class="one_third_less last">
                            <label><b>Company</b> <em>*</em></label>
                            <input id="inputCompany" name="inputCompany" type="text" />

                            <label><b>Website</b> <em>*</em></label>
                            <input type="text" id="inputWebsite" name="inputWebsite" placeholder="www.yourdomain.com" />

                        </div><!-- end one third less last -->

                        <label><b>Message</b> <em>*</em></label>
                        <textarea id="inputMessage" name="inputMessage">I would like to know more about Email88 solutions. </textarea>

                        <div class="clearfix"></div>
                        <label><b>Please enter the security code below:</b> <em>*</em></label>
                        <div class="g-recaptcha" data-sitekey="6LdoDi8UAAAAANYUpil4VmDO9NxdDfNbJaE0d2Jo"></div>


                    </div><!-- end cforms -->


                    <div class="clearfix margin_bottom1"></div>
                    <div class="divider_line2"></div>
                    <div class="clearfix margin_bottom1"></div>


                    <div class="clearfix"></div>

                    <div class="alicent">
<!--                        <a href="#" id="enquiry_submit" class="btn btn-danger caps submitBtn" onclick="submitContactForm()" style="cursor:pointer;"><i class="fa fa-send"></i> <b>Submit</b></a>&nbsp;-->
                        <button type="submit" class="btn btn-warning" name="submit" id="enquiry_submit">Submit</button>
                        <a href="#" data-dismiss="modal" class="btn btn-primary caps"><i class="fa fa-ban"></i> <b>Cancel</b></a>&nbsp;
                    </div>

                    <div class="clearfix margin_bottom1"></div>

                </form>

            </div><!-- end modal-body -->
        </div>
    </div>
</div><!--END MODAL enquire now -->    

<div class="price_compare">
    <div class="container">
        <div class="one_full stcode_title9">
            <h1 class="caps"><strong>E-commerce Feature Lists</strong>
                <em>Get Started Today!</em>
                <span class="line"></span>
            </h1>
        </div>
        <div class="clearfix margin_bottom5"></div>


        <div class="clearfix"></div>  
        @if(count($plans)>0) 
        @include("frontend._hosting_plans")
        @else
        <p>No Plans found</p>
        @endif
    </div>
</div><!-- end choose plans -->
<div class="clearfix"></div>
<div class="container feature_section107"><br /><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>
<div class="clearfix"></div>
<div class="feature_section103">
    <div class="plan">
        <div class="container">

            @if(count($general_features)>0)<h1 class="caps white"><strong>{{$general_features[0]['heading'] or ''}} </strong></h1>@endif

            <div class="clearfix margin_bottom2"></div>

            @if(count($general_features)>0)
            <?php $count = 0; ?>
            @foreach($general_features as $i)
            <?php
            $count++;
            ?>
            <div class="box four  last animate" data-anim-type="fadeIn" data-anim-delay="300">
                <i class="fa {{$i->icon}}"></i>
                <h4>{{$i->title}}<div class="line"></div></h4>
                <p class="sky-blue">{{$i->description}}.</p>
            </div><!-- end box -->
            <?php if ($count % 4 == 0) { ?>
                <div class="clearfix margin_bottom2"></div>
            <?php } ?>

            @endforeach
            @endif    


        </div>
        </plan>
    </div>
    <!-- end featured section 103 -->


    <div class="clearfix"></div>



    <!-- end featured section 9 -->


    <div class="clearfix"></div>


    @endsection
    @section('custom_scripts')

    <!-- MasterSlider -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/masterslider/style/masterslider.css" />
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/masterslider/skins/default/style.css" />

    <!-- owl carousel -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.transitions.css" rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.css" rel="stylesheet">

    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/accordion/style.css" />

    <!-- tabs 2 -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/tabacc.css" rel="stylesheet" />
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/detached.css" rel="stylesheet" />

    <!-- loop slider -->
    <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/loopslider/style.css">
    <script>
        (function($) {
            "use strict";

            $('.accordion, .tabs').TabsAccordion({
                hashWatch: true,
                pauseMedia: true,
                responsiveSwitch: 'tablist',
                saveState: sessionStorage,
            });

        })(jQuery);
     $(document).ready(function() {
       $("#enquiry_submit").click(function() {   //button id
          var loginForm = $("#enquiry_form");  //form id
          loginForm.submit(function(e){
              e.preventDefault();
        var formData = loginForm.serializeArray();
        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var name = $('#inputName').val();
        var email = $('#inputEmail').val();
        var phone = $('#inputPhone').val();
        var message = $('#inputMessage').val();
        var box = document.getElementById('inputService');
        var conceptName = box.options[box.selectedIndex].text;
        //formData.append('inputService', conceptName);
        //console.log(formData);
        /*var uniquekey = {
              name: "inputService",
              value: conceptName
        };
        formData.push(uniquekey);*/
        if(name.trim() == '' ){
            alert('Please enter your name.');
            $('#inputName').focus();
            return false;
        }else if(email.trim() == '' ){
            alert('Please enter your email.');
            $('#inputEmail').focus();
            return false;
        }else if(email.trim() != '' && !reg.test(email)){
            alert('Please enter valid email.');
            $('#inputEmail').focus();
            return false;
        }else if(phone.trim() == '' ){
            alert('Please enter your phone number.');
            $('#inputPhone').focus();
            return false;
        }else if(message.trim() == '' ){
            alert('Please enter your message.');
            $('#inputMessage').focus();
            return false;
        }else{
            console.log('ajax call');
                 $.ajax({
                     url:"/enquiry",
                     type:'get',
                     data:formData,
                     success:function(data){
                        $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                        $('.submitBtn').removeAttr("disabled");
                        $('.modal-body').css('opacity', '');
                     },
                     error: function (data) {
                         $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                     }
                 });
                 }
             });
         });                 
     }); 
    </script>
    @endsection
