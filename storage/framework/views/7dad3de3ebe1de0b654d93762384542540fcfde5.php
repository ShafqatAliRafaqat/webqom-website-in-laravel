<?php $__env->startSection('title','WhoIs | - Domain description'); ?>
<?php $__env->startSection('page_header','Domains'); ?>
<?php $__env->startSection('content'); ?>
    <div class="clearfix"></div>
    <div class="page_title1 sty7">

        <h1>FIND YOUR PERFECT DOMAIN NAME
            <!--<em>Huge Choice. Low Prices. Register your perfect domain name today.</em>
            <span class="line2"></span>-->
        </h1>

        <div class="serch_area">
            <form action="<?php echo e(route('frontend.domain.searchLogin')); ?>" method="get">
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
        <?php if(isset($response->message)): ?>
            <h1 class="light red"><i class="fa fa-times-circle"></i> <?php echo e($response->message); ?></h1>
        <?php else: ?>
            <h1><strong><?php echo e($domain); ?></strong>
                <?php if($response->last_updated): ?>
                    <em>Last updated on: <?php echo e(date("Y-m-d h:i:s A",strtotime($response->last_updated))); ?></em>
                <?php endif; ?>
            </h1>
        <?php endif; ?>
    </div>

    <div class="clearfix"></div>
    <?php if(!isset($response->message)): ?>
        <div class="content_fullwidth">
        <div class="container">
            <!-- left sidebar starts -->
            <div class="left_sidebar">
                <div class="sidebar_widget">

                    <div class="imgframe6">
                        <a href="http://<?php echo e($response->domain_name); ?>" target="_blank">
                            <img src="<?php echo e($response->image); ?>" alt="site"></a>
                        </a>
                    </div>
                    <div class="clearfix margin_bottom3"></div>
                    <h3 class="caps"><strong>Registration Info</strong></h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <td width="92">Name</td>
                                <td width="307"><?php echo e($response->domain_name); ?></td>
                            </tr>
                            <tr>
                                <td width="92">Registrar</td>
                                <td width="307">
                                    <p class="pull-left"><?php echo e($response->registrar->name); ?></p>
                                    <p class="pull-left sitecolor">Transfer to Webqom now!<br>Get</span> <span class="red"><strong>FREE</strong></span> Premium DNS</p>
                                    <p class="pull-right"><a href="/domain_transfer_login">Transfer</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="92">Address</td>
                                <td width="307">
                                    <div class="pull-left"><?php echo e($response->registrant->address); ?></div>
                                    <div class="pull-right"><a href="#">Set Private</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="92">Phone</td>
                                <td width="307"><?php echo e($response->registrant->phone); ?></td>
                            </tr>
                            <tr>
                                <td width="92">Status</td>
                                <td width="307">
                                    <?php $__currentLoopData = $response->domain_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php echo e($status); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="92">Created:</td>
                                <td width="307"><?php echo e(date("Y-M-d",strtotime($response->creation_date))); ?></td>
                            </tr>
                            <?php if(isset($response->updated_date)): ?>
                            <tr>
                                <td width="92">Updated:</td>
                                <td width="307"><?php echo e(date("Y-M-d",strtotime($response->updated_date))); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <td width="92">Expires:</td>
                                <td width="307">
                                    <div class="pull-left"><?php echo e(date("Y-M-d",strtotime($response->expiry_date))); ?></div>
                                    <div class="pull-right"><a href="#">Back Order</a></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end responsive table -->

                    <div class="clearfix margin_top2"></div>

                    <h3 class="caps"><strong>Name Servers</strong></h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <?php $__currentLoopData = $response->name_server; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $server): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td width="172"><?php echo e($server); ?></td>
                                    <td width="227"><?php echo e(gethostbyname($server)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </table>
                    </div>
                    <!-- end responsive table -->
                    

                    
                    
                        
                            
                                
                                
                                    
                                    
                            
                            
                                
                                
                            
                            
                                
                                
                            
                            
                                
                                
                            
                        
                    
                    <!-- end responsive table -->
                </div><!-- end section -->
            </div><!-- end left sidebar -->
            <div class="content_right">

                <h2><strong>Raw Registrar Data</strong></h2>
                <?= $response->raw ?>
            </div><!-- end content right side -->

        </div>
    </div>
    <?php endif; ?>
    <div class="clearfix"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>