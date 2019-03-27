<?php $__env->startSection('title', ucwords($page_name). ' | - Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>




<div class="clearfix"></div>


<div class="page_title1 sty2">
    <h1>SSL Certificates
    <em>Want customers to come back? Protect them.</em>
    <span class="line2"></span>
    </h1>

</div><!-- end page title -->


<div class="clearfix"></div>


<div class="host_plans_sty3">
<div class="container">

    <div class="one_full stcode_title9">
        <h1 class="caps"><strong>SSL Certificates Plans</strong>
            <em>Get Started Today!</em>
            <span class="line"></span>
        </h1>
    </div>
<div class="clearfix margin_bottom5"></div>
    <?php if(!empty($plans)): ?>
    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<?php $PlanID = $i->id; $PageName = $page_name; ?>
        <div class="one_third animate" data-anim-type="fadeInRight" data-anim-delay="200">
        <img src="<?php echo e(url('').'/storage/ssl/icon_images/'.$i->icon_image); ?>" width="80px" alt="Protect One Website" />
        <h1 class="caps"><strong><?php echo e($i->plan_name); ?></strong></h1>
        <?php if(count($i->featured_plans)): ?>
            <ul>
            <?php $__currentLoopData = $i->featured_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured_plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><i class="fa fa-check"></i> <?php echo e($featured_plan->title); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        <?php endif; ?>


		<?php $service_free_domains = \App\Models\ServicesFreeDomain::getFreeDomains($PageName,$PlanID); ?>
		<?php if(!empty($service_free_domains)): ?>
            <ul>
			<?php
				$Type = $service_free_domains->type;
				$Fees = '';
				if($Type==1){
					$TypeText = "";
				}elseif($Type==2){
					$TypeText = "Offer a free domain registration/transfer only (renew as normal)";
				}elseif($Type==3){
					$TypeText = "Offer a discounted domain registration/transfer only (renew as normal), with FEE "; $Fees = $service_free_domains->fee;
				}elseif($Type==4){
					$TypeText = "Offer a free domain registration/transfer and free renewal (if product is renewed)";
				}else{
					$TypeText = "";
				}

				if($TypeText!=''){
			?>
                <li><i class="fa fa-check"></i><?php echo $TypeText.' '.$Fees; ?></li>
                <li><?php echo e($i->tlds); ?></li>
                <li><?php echo e($i->getDomainNames()); ?></li>
				<?php } ?>
            </ul>
        <?php endif; ?>


        </ul>
        <div class="price">
            <div class="cforms">
                <select>
                    <option>3 Years @ </span> <?php echo e(isset($i->price_triennially) ? $i->price_triennially : '0'); ?><span>/yr</option>
                    <option>2 Years @ </span> <?php echo e(isset($i->price_biennially) ? $i->price_biennially : '0'); ?><span>/yr</option>
                    <option selected="selected">1 Years @ </span> <?php echo e(isset($i->price_annually) ? $i->price_annually : '0'); ?><span>/yr</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <em>Starting At</em>
            <h1><span>RM</span><strong><?php echo e(isset($i->price_annually) ? $i->price_annually : '0'); ?></strong><span>/yr</span></h1>
        </div>
        <?php if($i->enable_plan_button!='other'): ?>
                <a class="but" href="domain_configuration_hosting.html"><?php echo e($i->enable_plan_button); ?></a>
                <?php else: ?>
                <a class="but" href="domain_configuration_hosting.html"><?php echo e($i->enable_plan_button_other); ?></a>
            <?php endif; ?>
    </div><!-- end section -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
  <?php endif; ?>




</div>
</div><!-- end hosting plans -->

<div class="clearfix"></div>


    <?php echo $cms->content; ?>


<div class="clearfix"></div>


<div class="feature_section7">

<div class="container">

    <h1 class="caps"><strong>All Our plans include</strong></h1>

    <div class="clearfix margin_bottom2"></div>
     <?php if(count($general_features->where('ssl_page',1))>0): ?>
     <?php $count = 0;?>
        <?php $__currentLoopData = $general_features->where('ssl_page',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
         <?php
$count++;
?>

        <div class="one_fifth_less <?php if($count%5==0): ?> last <?php endif; ?>">
            <h5 class="caps"><i class="fa <?php echo e($i->icon); ?>"></i> <?php echo e($i->title); ?></h5>
        </div><!-- end -->
         <?php if($count%5==0): ?>
            <div class="clearfix margin_bottom3"></div>
         <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php else: ?>
        <p>No Items found</p>
    <?php endif; ?>





    <div class="clearfix margin_bottom3"></div>






</div>
</div><!-- end featured section 7 -->
 <div class="clearfix"></div>
     <?php echo $cms->content2; ?>

  <div class="clearfix"></div>


<?php echo $__env->make("frontend._faq", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="clearfix"></div>
<div class="container feature_section107"><br/><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>



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

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>