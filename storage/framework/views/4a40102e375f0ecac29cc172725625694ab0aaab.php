<?php $__env->startSection('title', ucwords($page_name).' | - Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>

<div class="clearfix"></div>


<div class="page_title1 sty2">
    <h1>MOBILE & WEB APPLICATION <em>Staying ahead of the market curves.</em> <span class="line2"></span> </h1>
</div>
<!-- end page title -->

<div class="clearfix"></div>

<?php echo $cms->content; ?>   

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
                                <option>Email88</option>
                                <option>Package P</option>
                                <option>SEO</option>
                                <option>Shared Hosting</option>
                                <option>SSL Certificates</option>
                                <option>VPS Hosting</option>
                                <option>Web88 CMS</option>
                                <option selected="selected">Web88IR</option>
                                <option>Responsive Web Design</option>
                                <option>Social Media</option>
                                <option>List all categories here</option>
                            </select>
                            <label><b>Email</b> <em>*</em></label>
                            <input id="inputEmail" name="inputEmail" type="text" placeholder="mail@yourdomain.com" />
                        </div><!-- end one third less -->
                        <div class="one_third_less">
                            <input type="hidden" name="page" value="<?php echo e($page_name); ?>">
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
<div class="parallax_section2">
    <div class="accordion">
        <?php if(count($web88ir_special_features)>0): ?>
        <div class="container">
            <h1 class="caps"><strong><?php echo $web88ir_special_features[0]['attributes']['heading']; ?></strong></h1>
            <h2 class="light"><?php echo $web88ir_special_features[0]['attributes']['sub_heading']; ?></h2>
            <div class="clearfix margin_bottom2"></div>
            <div id="st-accordion-four" class="st-accordion-four alileft">
                <p><?php echo $web88ir_special_features[0]['attributes']['content']; ?></p>
                <ul>
                    <?php $__currentLoopData = $web88ir_special_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $web88ir): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <a href="#"><?php echo e($web88ir->title); ?><span class="st-arrow">Open or Close</span></a>
                        <div class="st-content">
                            <?php echo $web88ir->description; ?>

                            <?php $__currentLoopData = explode(',', $web88ir->icon_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <img class="one_half" src="<?php echo e(url('')); ?>/storage/general_features/<?php echo e($img); ?>" />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <div class="clearfix"></div>         
                        </div>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </ul>

            </div>


        </div>
        <?php endif; ?>
    </div>
</div><!-- end parallax section 2 -->

<div class="clearfix"></div>

<div class="price_compare">
    <div class="container">
        <div class="one_full stcode_title9">
            <h1 class="caps"><strong>SUPERIOR PLANS</strong>
                <em>Get Started Today!</em>
                <span class="line"></span>
            </h1>
        </div>
        <div class="clearfix margin_bottom5"></div>


        <div class="clearfix"></div>  
        <?php if(count($plans)>0): ?> 
        <?php echo $__env->make("frontend._hosting_plans", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php else: ?>
        <p>No Plans found</p>
        <?php endif; ?>
    </div>
</div><!-- end choose plans -->
<div class="clearfix"></div>
<div class="feature_section103 parallax_section3">
    <div class="container">
        <?php if(count($general_features)>0): ?><h1 class="caps white"><strong><?php echo e(isset($general_features[0]['heading']) ? $general_features[0]['heading'] : ''); ?> </strong></h1><?php endif; ?>

        <div class="clearfix margin_bottom2"></div>
        <?php if(count($general_features)>0): ?>
        <?php $count = 0; ?>
        <?php $__currentLoopData = $general_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php
        $count++;
        ?>
        <div class="box animate" data-anim-type="fadeIn" data-anim-delay="100">
            <i class="fa <?php echo e($i->icon); ?>"></i>
            <h4><?php echo e($i->title); ?> <div class="line"></div></h4>
            <p class="sky-blue"><?php echo e($i->description); ?>.</p>
        </div><!-- end box -->
        <?php if ($count % 4 == 0) { ?>
            <div class="clearfix margin_bottom2"></div>
        <?php } ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>   
        <!-- end box -->


    </div>
</div><!-- end featured section 103 -->


<div class="clearfix"></div>
<div class="container feature_section107"><br /><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>
<div class="clearfix"></div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>

<!-- MasterSlider -->
<link rel="stylesheet" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/masterslider/style/masterslider.css" />
<link rel="stylesheet" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/masterslider/skins/default/style.css" />

<!-- owl carousel -->
<link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/carouselowl/owl.transitions.css" rel="stylesheet">
<link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/carouselowl/owl.carousel.css" rel="stylesheet">

<!-- accordion -->
<link rel="stylesheet" type="text/css" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/accordion/style.css" />

<!-- tabs 2 -->
<link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/tabs2/tabacc.css" rel="stylesheet" />
<link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/tabs2/detached.css" rel="stylesheet" />

<!-- loop slider -->
<link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/loopslider/style.css">
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
    function submitContactForm1() {
        //var page_url = base_url+'/services/';
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var name = $('#inputName').val();
        var email = $('#inputEmail').val();
        var phone = $('#inputPhone').val();
        var message = $('#inputMessage').val();
        $.ajax({
            type: 'POST',
            url: '/enquiry',
            data: 'contactFrmSubmit=1&name=' + name + '&email=' + email + '&message=' + message + '&phone=' + phone,
            success: function(data) {
                alert(data);
                if (msg == 'ok') {
                    $('#inputName').val('');
                    $('#inputEmail').val('');
                    $('#inputPhone').val('');
                    $('#inputMessage').val('');
                    $('.statusMsg').html('<span style="color:green;">Thanks for contacting us, we\'ll get back to you soon.</p>');
                } else {
                    $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
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
<?php $__env->stopSection(); ?>
