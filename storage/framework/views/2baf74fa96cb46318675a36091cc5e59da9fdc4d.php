<?php $__env->startSection('title','Home | - Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>

<div class="clearfix"></div>

<!-- Slider
======================================= -->

<div class="slidermar">
<div class="master-slider ms-skin-default" id="masterslider">
	<?php 
		$totalBanners=0;
	 ?>
	<?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
		<?php 
			$totalBanners=$totalBanners+1;
		 ?>
		<div class="ms-slide slide-<?php echo e($totalBanners); ?>" data-delay="5">
			<a href="
				<?php if($banner->banner_enlarge_image !=''): ?> <?php echo e(url('/storage/banners/enlarge/'.$banner->banner_enlarge_image)); ?>

				<?php elseif($banner->banner_enlarge_pdf !=''): ?> <?php echo e(url('/storage/banners/enlarge/'.$banner->banner_enlarge_pdf)); ?>

				<?php elseif($banner->banner_link !=''): ?> <?php echo e(url($banner->banner_link)); ?>

				<?php else: ?> 	
				<?php endif; ?>
			
			"></a>
			<div class="slide-pattern"></div>
				<img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/masterslider/blank.gif" data-src="<?php echo e(asset('/storage/banners/images/'.$banner->banner_image)); ?>" alt="<?php echo e($banner->banner_title); ?>" />
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
    <div class="ms-slide slide-1" data-delay="5">
        <div class="slide-pattern"></div>
        <img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/masterslider/blank.gif" data-src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/index/banner1.jpg" alt="" />
	</div><!-- end slide 1 -->


    <div class="ms-slide slide-2" data-delay="5">

        <div class="slide-pattern"></div>

        <img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>js/masterslider/blank.gif" data-src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/index/banner2.jpg" alt="" />

	</div>
	<?php endif; ?>
	<!-- end slide 2 -->


    <!--<div class="ms-slide slide-3" data-delay="5">

        <div class="slide-pattern"></div>

        <img src="js/masterslider/blank.gif" data-src="images/sliders/master/23.jpg" alt="" />

        <h3 class="ms-layer text1 white caps"
        	style="left: 115px; top: 290px;"
            data-type="text"
            data-effect="right(45)"
            data-duration="1800"
            data-delay="0"
            data-ease="easeOutExpo"
        >
            <strong>Build Your Dream Website with</strong>

        </h3>

        <h4 class="ms-layer text2 white caps"
        	style="left: 115px; top: 326px;"
            data-type="text"
            data-effect="left(45)"
            data-duration="1800"
            data-delay="300"
            data-ease="easeOutExpo"
        >
            <strong>Multi Purpose</strong>

        </h4>

        <h5 class="ms-layer text3 white"
        	style="left: 115px; top: 425px;"
            data-type="text"
            data-effect="bottom(45)"
            data-duration="1800"
            data-delay="500"
            data-ease="easeOutExpo"
        >
            Powerful and Cheap Web Hosting and Domains for your Website. <br /> Get Web Hosting and Receive a <strong>FREE Domain Name!</strong>

        </h5>

        <a href="#" class="ms-layer sbut1 white"
			style="left: 115px; top: 520px;"
			data-type="text"
			data-delay="700"
			data-ease="easeOutExpo"
			data-duration="1800"
			data-effect="scale(1.5,1.6)"
		>
			Get Started Now!

		</a>

	</div>--><!-- end slide 1 -->


</div>
</div>
<!-- end of masterslider -->


<div class="clearfix"></div>


<div class="domain_search">
    <?php if($search_result['is_search']): ?>
        <?php if($search_result['valid_domain']): ?>
        <div class="badge-green">
            <label>Avalible</label>
        </div>
        <?php else: ?>
        <div class="badge-red">
            <label class="white">Not - Avalible</label>
        </div>
        <?php endif; ?>
    <?php endif; ?>
	<div class="serch_area">
        <div class="container">
            <h5 class="white caps">Find your Perfect Domain Name:</h5>
            <form method="get" action="<?php echo e(route('frontend.domain.search')); ?>">
                <input class="enter_email_input" name="search_domain" id="samplees" placeholder="Enter your domain name here..."  oninvalid="this.setCustomValidity('Please fill out this field')" oninput="setCustomValidity('')" type="text" required>
                <input name="" value="Search Domain" class="input_submit" type="submit">
            </form>
        </div>
	</div><!-- end section -->

    <div class="offers">
    <div class="container">
    	<ul>
            <li><strong>.com</strong> RM 5.75</li>
            <li><strong>.com</strong> RM 5.75</li>
            <li><strong>.net</strong> RM 9.45</li>
            <li><strong>.org</strong> RM 7.50</li>
            <li><strong>.us</strong> RM 5.99</li>
            <li><strong>.biz</strong> RM 9.99</li>
            <li class="last">* All prices per annum</li>
        </ul>
    </div>
    </div>

</div><!-- end domain search -->


<div class="clearfix"></div>


<div class="host_plans_sty3">
<div class="container">
    
	<?php if($indexplans): ?>
        <?php $__currentLoopData = $indexplans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="one_fourth animate" data-anim-type="fadeInLeft" data-anim-delay="600">
        <img src="<?php echo e(url('').'/storage/index-plan/icon_images/'.$i->icon_image); ?>" width="70px" style="padding: 0px;" alt="Shared Hosting" />
        <h1 class="caps"><strong><?php echo e($i->name_line1); ?></strong> <span><?php echo e($i->name_line2); ?></span></h1>
        <ul>
            <?php $__currentLoopData = $i->featured_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li><i class="fa fa-check"></i><?php echo e($feature->title); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
        <div class="price">
            <em>Starting At</em>
            <?php if($i->price_type=='Recurring'): ?> <h1><span>RM</span><strong><?php echo e(isset($i->price_annually) ? $i->price_annually : 'undefined'); ?></strong><span>/yr</span></h1><?php endif; ?>
            <?php if($i->price_type=='One Time'): ?>
            <h1><span>RM</span><strong><?php echo e(isset($i->price_monthly) ? $i->price_monthly : 'undefined'); ?> </strong><span>/mo</span></h1>
            <?php endif; ?>
            <?php if($i->price_type=='Free'): ?>
            <h1><strong>Free</strong><span></span></h1>
            <?php endif; ?>
        </div>
        <a href="<?php echo e($i->url); ?>" class="but">Get Started!</a>
    </div><!-- end section -->

        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>


</div>
</div><!-- end hosting plans -->


<div class="clearfix"></div>


<div class="feature_section1 sty2">
<div class="container">


    <div class="one_full stcode_title9">
    	<h1 class="caps"><strong><?php if(count($general_features)>0): ?> <?php if($general_features[0][0]['heading_status']==1): ?> <?php echo e($general_features[0][0]['heading']); ?> <?php endif; ?> <?php endif; ?></strong>
			<em>Stable, Fast &amp; Reliable! </em>
    		<span class="line"></span>
    	</h1>
    </div>

	<div class="clearfix margin_bottom3"></div>
    <?php if(count($general_features)>0): ?>
            <?php $__currentLoopData = $general_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunks): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <div class="one_third animate" data-anim-type="fadeIn" data-anim-delay="200">
                <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($i->icon!=""): ?><i class="fa <?php echo e($i->icon); ?>"></i><?php else: ?>
                <i class="fa <?php echo e($i->icon); ?>"><img style="width: 100%;" src="<?php echo e(url('').'/storage/general_features/icon_images/'.$i->icon_image); ?>"  alt="" /></i> <?php endif; ?>
                <h4 class="light text-blue"><?php echo e($i->title); ?></h4>
                <p><?php echo e($i->description); ?></p>

                <div class="clearfix margin_bottom5"></div>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div><!-- end section -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <?php endif; ?>



</div>
</div><!-- end feature section 1 -->


<div class="clearfix"></div>

<?php echo $page_cms->content; ?>


<div class="feature_section3">
<div class="container">

	<div class="one_half">

		<h2 class="caps"><?php echo e(isset($videos->video_title) ? $videos->video_title : 'No video title'); ?></h2>

        <div class="clearfix margin_bottom1"></div>
        <?php echo isset($videos->link) ? $videos->link : 'No Video link added'; ?>


    </div>
    <!-- end video -->



    <div class="one_half last">

    	<h2 class="caps">Blogs</h2>

        <div class="clearfix margin_bottom1"></div>


        <div id="owl-demo13" class="owl-carousel">

        	<div class="lstblogs">
            <div>
                <a href="#"><img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-img1.jpg" alt="" /></a>
                <a href="#" class="date"><strong>22</strong> Sep</a>
                <h4 class="white light"><a href="#" class="tcont">How to create a staging account in sub-domain in zpanel?</a> <div class="hline"></div></h4>
            </div>
            </div><!-- end this slide -->

            <div class="lstblogs">
            <div>
                <a href="#"><img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-img2.jpg" alt="" /></a>
                <a href="#" class="date"><strong>15</strong> Nov</a>
                <h4 class="white light"><a href="#" class="tcont">Web Hosting Tip: Check, unblock and whitelist your IP in APF</a> <div class="hline"></div></h4>
            </div>
            </div><!-- end this slide -->

            <div class="lstblogs">
            <div>
                <a href="#"><img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-img3.jpg" alt="" /></a>
                <a href="#" class="date"><strong>03</strong> Nov</a>
                <h4 class="white light"><a href="#" class="tcont">Managed Services: The Complete End to End Solution</a> <div class="hline"></div></h4>
            </div>
            </div><!-- end this slide -->

		</div>

    </div><!-- end latest news / blogs section -->




</div>
</div><!-- end feature section 3 -->


<div class="clearfix"></div>


<div class="parallax_section4">
<div class="container">
     <?php if(count($offer_services)>0 && $offer_services[0]['heading_status']==1): ?>

    <h1 class="caps white"><strong><?php echo e($offer_services[0]['heading']); ?></strong></h1>
    <?php else: ?>
	<h1 class="caps white"><strong></strong></h1>
    <?php endif; ?>

	<div class="clearfix margin_bottom1"></div>
    <div class="tabs detached hide-title cross-fade">
     <?php if(count($offer_services)>0): ?>
		 <?php $__currentLoopData = $offer_services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		 <section>
        	<h1><span><?php echo e($i->title); ?></span></h1>
    		<img src="<?php echo e(Storage::disk('index-plan')->url('index-plan/service-side-images/'.$i->image)); ?>" alt="" />
            <h2><?php echo e($i->header); ?></h2>
            <p class="bigtfont dark"><?php echo $i->content; ?></p>
            <br />
            <a href="<?php echo e($i->link); ?>" class="button two">Learn More</a>
		</section>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php endif; ?>

    	<!-- <section>
        	<h1><span>Domains</span></h1>
    		<img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-img7.png" alt="" />
            <h2>Domain packages provide quality web hosting with unlimited resources.</h2>
            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
            <br />
            <a href="#" class="button two">Learn More</a>
		</section><!-- end section -->

    	<!-- <section>
        	<h1><span>eCommerce</span></h1>
    		<img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-img8.png" alt="" />
            <h2>eCommerce packages provide quality web hosting with unlimited resources.</h2>
            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
            <br />
            <a href="#" class="button two">Learn More</a>
		</section> --><!-- end section -->

        <!-- <section>
        	<h1><span>Mobile</span></h1>
    		<img src="<?php echo e(url('').'/resources/assets/frontend/'); ?>images/site-img9.png" alt="" />
            <h2>Mobile website packages provide quality web hosting with unlimited resources.</h2>
            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
            <br />
            <a href="#" class="button two">Learn More</a>
		</section> --><!-- end section -->

    </div>

</div>
</div><!-- end parallax section 1 -->


<div class="clearfix"></div>



<!-- end featured section 4 -->


<div class="clearfix"></div>

<!-- end parallax section 2 -->


<div class="clearfix"></div>


<!-- end portfolio works section -->

<div class="clearfix"></div>


<!-- end featured section 5-->


<div class="clearfix"></div>


<div class="feature_section6">
<div class="container">

    <h1 class="caps"><strong> <?php if(count($testimonial)>0): ?> <?php if($testimonial[0]['heading_status']==1): ?> <?php echo e($testimonial[0]['heading']); ?> <?php endif; ?> <?php endif; ?></strong></h1>

    <div class="clearfix margin_bottom1"></div>

	<div class="less6">
    <div id="owl-demo20" class="owl-carousel">
        <?php if(count($testimonial)>0): ?>
        <?php $__currentLoopData = $testimonial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="item">
        	<div class="climg"><img src="<?php echo e(url('').'/storage/general_features/testimonials'); ?>/<?php echo e($i->client_image); ?>" alt="" /></div>
        	<p class="bigtfont dark">
                  <?php echo e($i->content); ?>

            .</p>
			<br />
        	<strong>- <?php echo e($i->client_name); ?></strong> &nbsp;<em>-<?php echo e($i->company); ?> </em>
            <p class="clearfix margin_bottom1"></p>
        </div><!-- end slide -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endif; ?>


    </div>
    </div>

</div>
</div><!-- end featured section 5-->


<div class="clearfix"></div>




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

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>