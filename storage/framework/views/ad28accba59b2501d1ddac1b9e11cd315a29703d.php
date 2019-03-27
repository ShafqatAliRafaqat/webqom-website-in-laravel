<?php $__env->startSection('title','Home | - Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>

<div class="clearfix"></div>

<div class="site_wrapper">

<div class="top_nav">
<div class="container">
        
    <div class="left">
          
    </div><!-- end left -->
    
    <div class="right">
    
        <a href="#" class="tpbut two"><i class="fa fa-cart-plus"></i>&nbsp; 0</a>
        <a href="registration.html" class="tpbut three"><i class="fa fa-edit"></i>&nbsp; FREE Sign Up</a>
        <a href="login.html" class="tpbut"><i class="fa fa-user"></i>&nbsp; Login</a> 
        
        
        <ul class="tplinks">
            <li><a href="#"><img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-icon2.png" alt="Live Chat" /> Live Chat</a></li>
            <li><a href="support.html"><img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-icon3.png" alt="Support" /> Support</a></li>
        </ul>
             
    </div><!-- end right -->
        
</div>
</div><!-- end top navigation links -->


<div class="clearfix"></div>


<header class="header">
 
	<div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="index.html" id="logo"></a></div>
		
	<!-- Navigation Menu -->
    <div class="menu_main">
    
      <div class="navbar yamm navbar-default">
        
          <div class="navbar-header">
            <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  >
              <button type="button" > <i class="fa fa-bars"></i></button>
            </div>
          </div>
          
          
        
      </div>
    </div>
	<!-- end Navigation Menu -->
    
    
	</div>
    
</header>


<div class="clearfix"></div>


<div class="page_title1 sty9">
<div class="container">

	<h1>Order</h1>
    <div class="pagenation">&nbsp;<a href="index.html">Home</a> <i>/</i> <a href="dedicated_servers.html">Dedicated Servers</a> <i>/</i> Configure Your Server</div>
    <div class="clearfix"></div>
 
</div>	    
</div><!-- end page title -->

<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

 <div class="one_full stcode_title9">
 	<h1 class="caps"><strong>Configure Your Server</strong></h1>
 </div>

<div class="clearfix"></div>

<div class="content_fullwidth">
	<div class="container">
        
        <div class="two_third_less">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
           <div class="one_half_less last">
           	  	<h4><?php echo e($plan->title); ?></h4>
           		<div>
                	<input type="radio" name="<?php echo e($plan->details->description); ?>" value="<?php echo e($plan->details->description); ?>"> <?php echo e($plan->details->description); ?>

                    <div class="clearfix"></div>
                </div>
           </div>
           <div class="divider_line7"></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
        <div class="one_third_less last">
          	 <div class="alertymes7">
                 <h2 class="aliright">Order Summary</h2>
                 <div class="divider_line"></div>
                 <div class="clearfix margin_bottom1"></div>
                 <h4>Your Dedicated Server Plan:</h4>
                 <div class="text-16px light sitecolor caps">Enterprise 1</div>
                 <div class="clearfix margin_bottom1"></div>
                 
                 <h4>Service Code:</h4> 
                 <div class="text-16px light sitecolor caps">DS1x4-4-2x1TB</div>
                 <div class="clearfix margin_bottom1"></div>
                 
                 <h4>Your Configuration:</h4>
                 <ul>
                 	<li><i class="fa icon-arrow-right"></i> CPU: 1 x 4-cores Intel Xeon</li>
                    <li><i class="fa icon-arrow-right"></i> No. of Processors: 1 processor</li>
                    <li><i class="fa icon-arrow-right"></i> RAM: 4GB</li>
                    <li><i class="fa icon-arrow-right"></i> Hard Disk: 2 x 1TB SATA</li>
					<li><i class="fa icon-arrow-right"></i> No. of IP addresses (IPv4): 1 x IPv4 Address</li>
                    <li><i class="fa icon-arrow-right"></i> Bandwidth: 10Mbps</li>
                    <li><i class="fa icon-arrow-right"></i> Control Panel: Webmin</li>
                    <li><i class="fa icon-arrow-right"></i> Fully Managed Server (Optional): Complete Management</li>
                 </ul>
                 <div class="pull-left caps"><b>Subtotal</b></div>
                 <div class="pull-right"><b>RM 6,588.00</b></div>
                 <div class="clearfix"></div>
                 <div class="pull-left caps"><b>Initial Setup</b></div>
                 <div class="pull-right"><b>RM 0.00</b></div>
                 <div class="clearfix"></div>
                 <div class="divider_line"></div>

                 <div class="clearfix margin_bottom2"></div>
                 <h2 class="red aliright" style="margin-bottom: 0px;"><b>RM 6,588.00</b></h2><span class="pull-right red caps aliright">Total</span>
                 <div class="clearfix margin_bottom2"></div>
                 <a href="<?php echo e(route('domainConfig')); ?>" class="btn btn-lg btn-danger caps pull-right"><i class="fa fa-lg fa-arrow-circle-right"></i> <b>Continue</b></a>
                 
			 </div> 
          </div><!-- end one half less last -->
    
    

    </div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>


<div class="clearfix"></div>





</div>

    
<!-- ######### JS FILES ######### -->
<!-- get jQuery used for the theme -->
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/universal/jquery.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/universal/jquery.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/animations/js/animations.min.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/mainmenu/bootstrap.min.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/mainmenu/customeUI.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/masterslider/jquery.easing.min.js" />

<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/scrolltotop/totop.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/mainmenu/sticky.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/mainmenu/modernizr.custom.75180.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/cubeportfolio/jquery.cubeportfolio.min.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/cubeportfolio/main.js" />

<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/aninum/jquery.animateNumber.min.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/carouselowl/owl.carousel.js" />

<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/accordion/jquery.accordion.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/accordion/custom.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/cform/form-validate.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/universal/custom.js" />
<script type="text/javascript" src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/sidemenu/menuFullpage.min.js" />
<script>
	smoothScroll.init();
	$(document).ready(function() {
			$('.menu-link').menuFullpage();
	});
</script>

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
</script>
</body>
</html>

<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>