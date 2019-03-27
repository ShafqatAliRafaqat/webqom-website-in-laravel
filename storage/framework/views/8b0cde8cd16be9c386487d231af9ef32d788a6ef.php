<?php $currentURL = url()->current(); $baseURL= url('/');$basePath=str_replace($baseURL, '', $currentURL) ?>
<?php if(strpos($basePath,'ecommerce') !== false): ?> 
<?php echo $__env->make('frontend.ecommerce', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(strpos($basePath,'email88') !== false): ?>
<?php echo $__env->make('frontend.email88', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(strpos($basePath,'web88ir') !== false): ?>
<?php echo $__env->make('frontend.web88ir', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>

<?php $__env->startSection('title', ucwords($page_name).' | - Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>

<div class="clearfix"></div>


<div class="page_title1 sty2">
    <h1><?php echo e($page_header); ?>

    <em><?php echo e($sub_header); ?></em>
    <span class="line2"></span>
    </h1>

</div><!-- end page title -->


<div class="clearfix"></div>


<div class="price_compare">
<div class="container">

   <div class="one_full stcode_title9">
        <h1 class="caps"><strong><?php echo e($page_name); ?> Plans</strong>
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
<?php if($page_slug=='co_cloud_hosting' || $page_slug=='shared_hosting' || $duplicate_from=='co_cloud_hosting' || $duplicate_from=='shared_hosting'): ?>
<div class="feature_section7">

<div class="container">

    <h1 class="caps"><strong><?php if(count($general_features)>0): ?><h1 class="caps"><strong>
<?php echo e(isset($general_features[0]['heading']) ? $general_features[0]['heading'] : ''); ?> </strong></h1><?php endif; ?></strong></h1>


 <?php if(!empty($general_features)): ?>
        <?php $count = 0;?>
        <?php $__currentLoopData = $general_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php
$count++;
?>
        <div class="one_fifth_less <?php if($count%5==0): ?> last <?php endif; ?>">
        <h5 class="caps">
            <?php if($i->icon != ""): ?>
            <i class="fa <?php echo e($i->icon); ?>"></i> 
            <?php elseif($i->icon_image != ""): ?>
            <img src="<?php echo e(asset('/storage/general_features/icon_images/'.$i->icon_image)); ?>" style="display: block;margin-left: auto;margin-right: auto;" />
            <?php endif; ?>   
            
            <?php echo e($i->title); ?></h5>
        </div><!-- end -->
        <?php if ($count % 5 == 0) {?>
            <div class="clearfix margin_bottom2"></div>
        <?php }
?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>

</div>
</div><!-- end featured section 7 -->

<?php endif; ?>

<div class="clearfix"></div>


    <?php echo $cms->content; ?>



<?php if($page_slug!='co_cloud_hosting' && $page_slug!='shared_hosting' && $duplicate_from!='co_cloud_hosting' &&$duplicate_from!='shared_hosting'): ?>
<div class="feature_section103">
<div class="container">

    <?php if(count($general_features)>0): ?><h1 class="caps white"><strong><?php echo e(isset($general_features[0]
['heading']) ? $general_features[0]
['heading'] : ''); ?> </strong></h1><?php endif; ?>

    <div class="clearfix margin_bottom2"></div>

     <?php if(count($general_features)>0): ?>
     <?php $count = 0;?>
        <?php $__currentLoopData = $general_features->where('ssl_page', 0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
         <?php
$count++;
?>
        <div class="box four  last animate" data-anim-type="fadeIn" data-anim-delay="300">
            <i class="fa <?php echo e($i->icon); ?>"></i>
            <h4><?php echo e($i->title); ?><div class="line"></div></h4>
            <p class="sky-blue"><?php echo e($i->description); ?>.</p>
        </div><!-- end box -->
         <?php if ($count % 4 == 0) {?>
            <div class="clearfix margin_bottom2"></div>
        <?php }?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>


</div>
</div>
<?php endif; ?>
<!-- end featured section 103 -->


<div class="clearfix"></div>



<!-- end featured section 9 -->


<div class="clearfix"></div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>

    <!-- MasterSlider -->
    <link rel="stylesheet" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>

js/masterslider/style/masterslider.css" />
    <link rel="stylesheet" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>

js/masterslider/skins/default/style.css" />

    <!-- owl carousel -->
    <link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/carouselowl/owl.transitions.css" 
rel="stylesheet">
    <link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/carouselowl/owl.carousel.css" 
rel="stylesheet">

    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>

js/accordion/style.css" />

    <!-- tabs 2 -->
    <link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/tabs2/tabacc.css" rel="stylesheet" />
    <link href="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/tabs2/detached.css" rel="stylesheet" />

    <!-- loop slider -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/frontend/'); ?>

js/loopslider/style.css">
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
<?php endif; ?>

<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>