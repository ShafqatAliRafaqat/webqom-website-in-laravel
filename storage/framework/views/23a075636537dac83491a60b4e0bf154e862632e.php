<?php $currentURL = url()->current(); $baseURL= url('/');$basePath=str_replace($baseURL, '', $currentURL) ?>
<?php if(strpos($basePath,'ecommerce') !== false): ?>
    <?php echo $__env->make('frontend.ecommerce', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(strpos($basePath,'email88') !== false): ?>
    <?php echo $__env->make('frontend.email88', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif(strpos($basePath,'web88ir') !== false): ?>
    <?php echo $__env->make('frontend.web88ir', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php else: ?>
    
    <?php $__env->startSection('title','Domains | - Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>
    <div class="clearfix"></div>


    <div class="page_title1 sty7">

        <h1>FIND YOUR PERFECT DOMAIN NAME.
            <em>Huge Choice. Low Prices. Register your perfect domain name today.</em>
            <span class="line2"></span>
        </h1>

        <div class="serch_area">
            <form method="get" action="<?php echo e(route('frontend.domain.search')); ?>">
                <input class="enter_email_input" name="search_domain" placeholder="Enter your domain name here..." onFocus="if(this.value == 'Enter your domain name here...') {this.value = '';}" oninvalid="this.setCustomValidity('Please fill out this field')" oninput="setCustomValidity('')" required type="text">
                <input name="" value="Search Domain" class="input_submit" type="submit">
            </form>
            <br />
            <div class="molinks"><a href="domain_bulk_search.html"><i class="fa fa-caret-right"></i> Bulk Domain Search</a> <a href="domain_transfer.html"><i class="fa fa-caret-right"></i> Transfer Domain</a></div>
        </div><!-- end section -->

    </div><!-- end page title -->


    <div class="clearfix"></div>


    <div class="feature_section10">
        <div class="container">

            <div class="one_fifth_less">
                <div class="box">
                    <?php echo $mainPageData->editor1; ?>

                    <?php echo $mainPageData->editor2; ?>

                    <?php echo $mainPageData->editor3; ?>

                </div>
            </div>

            <div class="one_fifth_less">
                <div class="box">
                    <?php echo $mainPageData->editor4; ?>

                    <?php echo $mainPageData->editor5; ?>

                    <?php echo $mainPageData->editor6; ?>

                </div>
            </div>

            <div class="one_fifth_less">
                <div class="box">
                    <?php echo $mainPageData->editor7; ?>

                    <?php echo $mainPageData->editor8; ?>

                    <?php echo $mainPageData->editor9; ?>

                </div>
            </div>

            <div class="one_fifth_less">
                <div class="box">
                    <?php echo $mainPageData->editor10; ?>

                    <?php echo $mainPageData->editor11; ?>

                    <?php echo $mainPageData->editor12; ?>

                </div>
            </div>

            <div class="one_fifth_less last">
                <div class="box">
                    <?php echo $mainPageData->editor13; ?>

                    <?php echo $mainPageData->editor14; ?>

                    <?php echo $mainPageData->editor15; ?>

                </div>
            </div>

        </div>
    </div><!-- end featured section 10 -->



    <div class="feature_section12">
        <div class="container">

            <div class="one_full stcode_title9">
                <?php echo $mainPageData->editor16; ?>

            </div>

            <div class="one_full_less alileft">

                <?php echo $mainPageData->editor17; ?>


            </div><!-- end section -->

            <div class="one_full stcode_title9">
                <?php echo $mainPageData->editor18; ?>

            </div>

            <div class="one_full_less alileft">

                <?php echo $mainPageData->editor19; ?>


            </div><!-- end section -->



        </div>
    </div><!-- end featured section 12 -->

    <div class="clearfix"></div>


    <div class="feature_section11">
        <div class="container">

            <?php echo $mainPageData->editor20; ?>

            <?php echo $mainPageData->editor21; ?>

            <div class="divider_line7"></div>
            <form type="POST" id="gsr-contact" onSubmit="return valid_datas( this );">
                <label class="text-16px dark"><b>Show the Domain Pricing for:</b></label>
                <div class="radiobut text-16px light dark">
                    <input type="radio" id="all" checked="checked" name="tld"> <span class="onelb">All TLD</span>&nbsp;
                    <?php 
                        $counter = 0
                     ?>
                    <?php $__currentLoopData = $domainPricing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <input type="radio" id="<?php echo e($dp->id); ?>" ccount="<?php echo e(($counter + 1) * 3); ?>" name="tld"> <span class="onelb"><?php echo e($dp->title); ?></span>&nbsp;
                        <?php 
                            $counter++
                         ?>
                        <?php if($counter % 6 == 0): ?>
                        </br>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    
                </div>
            </form>
            <div class="clearfix margin_bottom5"></div>

            note to programmer: show the TLD pricing list based on the selection above. If selected America TLD, then display the America TLD pricing table below.

            <ul class="tabs">
                <li class="active">New Registrations</li>
                <li>Renewals</li>
                <li>Transfers</li>
            </ul>

            <ul class="tab__content">

                <li class="active">
                    <div class="content__wrapper">
                        <h4>All TLD - New</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($dpl->type == 'new'): ?>
                                        <tr>
                                            <?php 
                                                $prices = json_decode($dpl->pricing, true);
                                                $prices = (array)$prices;
                                             ?>

                                            <td><b><?php echo e($dpl->tld); ?></b></td>
                                            <?php for($i = 1; $i <= count($prices); $i++): ?>
                                                <?php if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10): ?>
                                                    <td class="alicent"><span class="red">RM <?php echo e($prices[$i]['s']); ?>*</span><br/>
                                                        <span class="strike">RM <?php echo e($prices[$i]['l']); ?>*</span>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="clearfix"></div>

                        </div><!-- end table responsive -->
                    </div>
                </li><!-- end tab 1 -->

                <li>
                    <div class="content__wrapper">
                        <h4>All TLD - Renewals</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($dpl->type == 'renewal'): ?>
                                        <tr>
                                            <?php 
                                                $prices = json_decode($dpl->pricing, true);
                                                $prices = (array)$prices;
                                             ?>

                                            <td><b><?php echo e($dpl->tld); ?></b></td>
                                            <?php for($i = 1; $i <= count($prices); $i++): ?>
                                                <?php if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10): ?>
                                                    <td class="alicent"><span class="red">RM <?php echo e($prices[$i]['s']); ?>*</span><br/>
                                                        <span class="strike">RM <?php echo e($prices[$i]['l']); ?>*</span>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="clearfix"></div>
                        </div><!-- end table responsive -->
                    </div>
                </li><!-- end tab 2 -->

                <li>
                    <div class="content__wrapper">
                        <h4>All TLD - Transfers</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($dpl->type == 'transfer'): ?>
                                        <tr>
                                            <?php 
                                                $prices = json_decode($dpl->pricing, true);
                                                $prices = (array)$prices;
                                             ?>

                                            <td><b><?php echo e($dpl->tld); ?></b></td>
                                            <?php for($i = 1; $i <= count($prices); $i++): ?>
                                                <?php if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10): ?>
                                                    <td class="alicent"><span class="red">RM <?php echo e($prices[$i]['s']); ?>*</span><br/>
                                                        <span class="strike">RM <?php echo e($prices[$i]['l']); ?>*</span>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                                </tfoot>
                            </table>
                            <div class="clearfix"></div>

                        </div><!-- end table responsive -->
                    </div>
                </li><!-- end tab 3 -->

                <?php $__currentLoopData = $domainPricing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li>
                        <div class="content__wrapper">
                            <h4><?php echo e($dp->title); ?> - New</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th class="alicent">Per Year Pricing</th>
                                        <th class="alicent">1 Year</th>
                                        <th class="alicent">2 Years</th>
                                        <th class="alicent">3 Years</th>
                                        <th class="alicent">5 Years</th>
                                        <th class="alicent">10 Years</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($dpl->type == 'new' && $dpl->domain_pricing_id == $dp->id): ?>
                                            <tr>
                                                <?php 
                                                    $prices = json_decode($dpl->pricing, true);
                                                    $prices = (array)$prices;
                                                 ?>

                                                <td><b><?php echo e($dpl->tld); ?></b></td>
                                                <?php for($i = 1; $i <= count($prices); $i++): ?>
                                                    <?php if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10): ?>
                                                        <td class="alicent"><span class="red">RM <?php echo e($prices[$i]['s']); ?>*</span><br/>
                                                            <span class="strike">RM <?php echo e($prices[$i]['l']); ?>*</span>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="clearfix"></div>

                            </div><!-- end table responsive -->
                        </div>
                    </li>
                    <li>
                        <div class="content__wrapper">
                            <h4><?php echo e($dp->title); ?> - Renewals</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th class="alicent">Per Year Pricing</th>
                                        <th class="alicent">1 Year</th>
                                        <th class="alicent">2 Years</th>
                                        <th class="alicent">3 Years</th>
                                        <th class="alicent">5 Years</th>
                                        <th class="alicent">10 Years</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($dpl->type == 'renewal' && $dpl->domain_pricing_id == $dp->id): ?>
                                            <tr>
                                                <?php 
                                                    $prices = json_decode($dpl->pricing, true);
                                                    $prices = (array)$prices;
                                                 ?>

                                                <td><b><?php echo e($dpl->tld); ?></b></td>
                                                <?php for($i = 1; $i <= count($prices); $i++): ?>
                                                    <?php if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10): ?>
                                                        <td class="alicent"><span class="red">RM <?php echo e($prices[$i]['s']); ?>*</span><br/>
                                                            <span class="strike">RM <?php echo e($prices[$i]['l']); ?>*</span>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="clearfix"></div>

                            </div><!-- end table responsive -->
                        </div>
                    </li>
                    <li>
                        <div class="content__wrapper">
                            <h4><?php echo e($dp->title); ?> - Transfers</h4>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th class="alicent">Per Year Pricing</th>
                                        <th class="alicent">1 Year</th>
                                        <th class="alicent">2 Years</th>
                                        <th class="alicent">3 Years</th>
                                        <th class="alicent">5 Years</th>
                                        <th class="alicent">10 Years</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($dpl->type == 'transfer' && $dpl->domain_pricing_id == $dp->id): ?>
                                            <tr>
                                                <?php 
                                                    $prices = json_decode($dpl->pricing, true);
                                                    $prices = (array)$prices;
                                                 ?>

                                                <td><b><?php echo e($dpl->tld); ?></b></td>
                                                <?php for($i = 1; $i <= count($prices); $i++): ?>
                                                    <?php if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10): ?>
                                                        <td class="alicent"><span class="red">RM <?php echo e($prices[$i]['s']); ?>*</span><br/>
                                                            <span class="strike">RM <?php echo e($prices[$i]['l']); ?>*</span>
                                                        </td>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                                <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="clearfix"></div>

                            </div><!-- end table responsive -->
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
            <div class="clearfix"></div>

            <p class="alileft red">* Plus ICANN fee of RM0.82 per domain name year. Certain TLD's only.<br/>
                ± com.au, net.au, and org.au domain names can only be registered for 2 years.</p>

        </div>
    </div><!-- end feature section 11 -->



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
        $(document).ready(function(){
            var clickedTab = $(".tabs > .active");
            var tabWrapper = $(".tab__content");
            var activeTab = tabWrapper.find(".active");
            var activeTabHeight = activeTab.outerHeight();
            var tldID;
            var tmpNum;

            $('input[name="tld"]').on("click", function(){
                tldID = $(this).attr('id');
                $(".tabs > li.active").click();
            });

            // Show tab on page load
            activeTab.show();

            // Set height of wrapper on page load
            tabWrapper.height(activeTabHeight);

            $(".tabs > li").on("click", function() {
                // Remove class from active tab
                $(".tabs > li").removeClass("active");

                // Add class active to clicked tab
                $(this).addClass("active");

                // Update clickedTab variable
                clickedTab = $(".tabs .active");

                // fade out active tab
                activeTab.fadeOut(250, function() {

                    // Remove active class all tabs
                    $(".tab__content > li").removeClass("active");

                    // Get index of clicked tab
                    tldID = $('input:checked[name="tld"]').attr('id');
                    if(tldID == 'all')
                        tmpNum = 0;
                    else{
                        tmpNum = $('input:checked[name="tld"]').attr('ccount');
                    }
                    console.log('TMP NUM: ' + tmpNum);

                    var clickedTabIndex = Number(clickedTab.index()) + Number(tmpNum);
                    console.log(clickedTabIndex);

                    // Add class active to corresponding tab
                    $(".tab__content > li").eq(clickedTabIndex).addClass("active");

                    // update new active tab
                    activeTab = $(".tab__content > .active");

                    // Update variable
                    activeTabHeight = activeTab.outerHeight();

                    // Animate height of wrapper to new tab height
                    tabWrapper.stop().delay(50).animate({
                        height: activeTabHeight
                    }, 500, function() {
                        $(".tab__content > li:not(.active)").css("display", "none");

                        // Fade in active tab
                        activeTab.delay(50).fadeIn(250);

                    });
                });
            });
        });

    </script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>