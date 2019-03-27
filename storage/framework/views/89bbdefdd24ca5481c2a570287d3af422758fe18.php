<?php 
    $breadcrumbs = [
        array('url' => '/dashboard', 'name' => 'Dashboard'),
        array('url' => '/my_account' , 'name' => 'My Domains'),
        array('url' => false, 'name' =>  'Domain Search'),
    ];
 ?>

<?php $__env->startSection('title','Domain Search | Webqom Technologies'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Domains'); ?>
<div class="clearfix"></div>
<div class="page_title1 sty7">

    <h1>FIND YOUR PERFECT DOMAIN NAME
        <!--<em>Huge Choice. Low Prices. Register your perfect domain name today.</em>
        <span class="line2"></span>-->
    </h1>

    <div class="serch_area">
        <form method="get">
            <input class="enter_email_input" name="login_domain" id="samplees" placeholder="Enter your domain name here..." oninvalid="$(this).setCustomValidity('Please fill out this field')" oninput="setCustomValidity('')" type="text" required="">
            <input name="" value="Search Domain" class="input_submit" type="submit">
        </form>
        <br />
        <div class="molinks"><a href="domain_bulk_search.html"><i class="fa fa-caret-right"></i> Bulk Domain Search</a> <a href="domain_bulk_transfer.html"><i class="fa fa-caret-right"></i> Bulk Transfer</a></div>
    </div><!-- end section -->

</div>
<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

<div class="one_full stcode_title9">
    <h1 class="caps"><strong>Domain Search</strong></h1>
</div>

<div class="clearfix"></div>

<div class="content_fullwidth">
    <div class="container">

        <?php echo $__env->make('layouts.frontend_menu_login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="three_fourth_less last">

            <div class="text-18px dark light">
                Start your web hosting experience with us by checking if your domain is available...
                <?php if(Session::has('failed')): ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                        <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                        <p>The domain's name is incorrect.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="clearfix margin_bottom1"></div>

            <div class="cforms alileft">
                <h4>Search a Domain</h4>
                <form type="GET" id="gsr-contact">
                    <input type="text" name="login_domain" id="domain" placeholder="eg. yourdomain.com" oninvalid="this.setCustomValidity('Please fill out this field')" oninput="setCustomValidity('')" required>
                    <div class="alicent margin_top1">
                        <button class="btn btn-danger caps">
                            <i class="fa fa-lg fa-spinner"></i>
                            <b>Search</b>
                        </button>&nbsp;
                        <a href="domain_bulk_search_login.html" class="btn btn-primary caps">
                            <i class="fa fa-lg fa-search"></i>
                            <b>Bulk Search</b>
                        </a>&nbsp;

                    </div>

                </form>
            </div>
            <!-- end cforms -->
            <div class="clearfix"></div>
            <div class="divider_line7"></div>
            <div class="clearfix"></div>

            <?php if(isset($response)): ?>
                <?php if($response->status != 0): ?>
                    <div class="alertymes4">
                        <h3 class="light">
                            <i class="fa fa-times-circle"></i>Sorry!
                            <strong><?php echo e($response->domain); ?></strong> is already taken!</strong>
                        </h3>
                    </div>
                <?php else: ?>
                    <div class="alertymes5">
                        <h3 class="light">
                            <i class="fa fa-check-circle"></i>Congratulations!
                            <strong><?php echo e($response->domain); ?></strong> is available!
                        </h3>
                    </div>
                <?php endif; ?>

            <!-- end section -->
                <div class="clearfix margin_bottom3"></div>

                
                <div class="table-responsive">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th width="1%">
                                <input type="checkbox" />
                            </th>
                            <th>Domain Name</th>
                            <th>Status</th>
                            <th>More Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="alicent">
                                <?php if($response->status == 0): ?>
                                    <input type="checkbox" checked="checked"/>
                                <?php else: ?>
                                    <i class="fa fa-times red"></i>
                                <?php endif; ?>
                            </td>
                            <td id="domainName"><?php echo e($response->domain); ?></td>
                            <td>
                                <?php if($response->status == 0): ?>
                                    <span class="label label-sm label-success">Available</span>
                                <?php else: ?>
                                    <span class="label label-sm label-red">Unavailable</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($response->status == 0): ?>
                                    <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($dpl->type == 'new' && $dpl->tld == '.'.explode('.',$response->domain)[count(explode('.',$response->domain))<3?1:2]): ?>
                                            <select class="form-control input-medium">
                                                <?php $__currentLoopData = json_decode($dpl->pricing); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($loop->index + 1); ?> year" <?php echo e($loop->index == 1 ? 'selected="selected"':''); ?>><?php echo e($loop->index + 1); ?> year(s) @ RM <?php echo e($price->l); ?>.00</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                <?php else: ?>
                                    <a href="http://<?php echo e($response->domain); ?>" target="_blank">WWW</a> | <a href="<?php echo e(route('frontend.domain.whois', $response->domain)); ?>">WHOIS</a>
                                <?php endif; ?>

                            </td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        </tfoot>
                    </table>

                    <div class="clearfix"></div>

                </div>
                <!-- end table responsive -->


                <div class="clearfix"></div>
                <div class="divider_line7"></div>
                <div class="clearfix"></div>
                <?php if($response->status == 0): ?>
                    <div class="alicent">
                        <button type="submit" class="btn btn-danger caps" id="orderBtn">
                            <i class="fa fa-arrow-circle-right"></i>
                            <b>Order Now</b>
                        </button>&nbsp;
                    </div>
                <?php endif; ?>
            <?php endif; ?>

        </div>
        <!-- end section -->



    </div>
</div>
<!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>


<div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
    <!-- For jQuery redirect || Added by mrloffel -->
    <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>js/jquery.redirect.js"></script>
    <script type="text/javascript">
        $('#orderBtn').click(function(){
            var checked = $("input:checked");
            if(checked.length > 0){
                var domain = $("#domainName").text(),
                    duration = $("select option:selected").text().split(" ");

                duration = duration[0] + " " + duration[1];
                $.redirect(base_url + "/domain_configuration", {'domain': domain, 'duration': duration, '_token':csrf_token}, "POST");
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>