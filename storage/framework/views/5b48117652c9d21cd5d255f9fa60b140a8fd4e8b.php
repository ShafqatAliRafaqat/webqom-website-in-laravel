<?php 
    $breadcrumbs = [
        array('url' => '/dashboard', 'name' => 'Dashboard'),
        array('url' => '/my_account' , 'name' => 'My Domains'),
        array('url' => false, 'name' =>  'Transfer Domain'),
    ];
 ?>

<?php $__env->startSection('title','Domain Search | Webqom Technologies'); ?>
<?php $__env->startSection('page_header','Domains'); ?>
<?php $__env->startSection('content'); ?>
    <div class="clearfix"></div>
    <div class="clearfix margin_bottom5"></div>

    <div class="one_full stcode_title9">
        <h1 class="caps"><strong>Transfer Domain</strong></h1>
    </div>

    <div class="clearfix"></div>

    <div class="content_fullwidth">
        <div class="container">

            <div class="one_fourth_less">
                <h4>Status Filter</h4>
                <div class="list-group">
                    <a href="#" class="list-group-item active">All Domains<span class="badge badge-dark pull-right">4</span></a>
                    <a href="#" class="list-group-item caps">Active<span class="badge badge-success pull-right">1</span></a>
                    <a href="#" class="list-group-item caps">Expired<span class="badge badge-danger pull-right">1</span></a>
                    <a href="#" class="list-group-item caps">Pending<span class="badge badge-warning pull-right">1</span></a>
                </div>
                note to programmer: when clicked, filter the table in "my domains" table by status and only showed the filtered data.

                <h4>Client Area</h4>
                <ul class="list-group">
                    <li class="list-group-item"><h5 class="white">Quick Links</h5></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.client_dashboard')); ?>"><i class="fa fa-caret-right"></i> Dashboard</a></li>
                    <li class="list-group-item alt"><h5>Products/Services</h5></li>
                    <li class="list-group-item"><a href="services_my_services.html"><i class="fa fa-caret-right"></i> My Services Listing</a></li>

                    <li class="list-group-item alt"><h5>Orders</h5></li>
                    <li class="list-group-item"><a href="order_history_list.html"><i class="fa fa-caret-right"></i> My Order History</a></li>

                    <li class="list-group-item alt"><h5>Domains</h5></li>
                    <li class="list-group-item"><a href="domain_my_domains.html"><i class="fa fa-caret-right"></i> My Domains</a></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.domain.domainRenewal')); ?>"><i class="fa fa-caret-right"></i> Renew Domains</a></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.domain.registerNewLogin')); ?>"><i class="fa fa-caret-right"></i> Register a New Domain</a></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.domain.transferLogin')); ?>"><i class="fa fa-caret-right"></i> Transfer Domains to Us</a></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.domain.searchLogin')); ?>"><i class="fa fa-caret-right"></i> Domain Search</a></li>

                    <li class="list-group-item alt"><h5>Billing</h5></li>
                    <li class="list-group-item"><a href="billing_my_invoices.html"><i class="fa fa-caret-right"></i> My Invoices</a></li>
                    <li class="list-group-item"><a href="billing_my_quotes.html"><i class="fa fa-caret-right"></i> My Quotes</a></li>
                    <li class="list-group-item"><a href="billing_mass_payment.html"><i class="fa fa-caret-right"></i> Make Payment / Mass Payment</a></li>
                    <li class="list-group-item alt"><h5>Support</h5></li>
                    <li class="list-group-item"><a href="support_my_support_tickets.html"><i class="fa fa-caret-right"></i> My Support Tickets</a></li>
                    <li class="list-group-item"><a href="support_open_new_ticket.html"><i class="fa fa-caret-right"></i> Open New Ticket</a></li>

                    <li class="list-group-item alt"><h5>My Account</h5></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.client_update_information')); ?>"><i class="fa fa-caret-right"></i> Edit Account Details</a></li>
                    <li class="list-group-item"><a href="<?php echo e(route('frontend.client_update_information')); ?>#change-password"><i class="fa fa-caret-right"></i> Change Password</a></li>

                </ul>

            </div><!-- end section -->

            <div class="three_fourth_less last">

                <div class="text-18px dark light">Transfer your existing domain names to us and save.</div>
                <div class="clearfix margin_bottom1"></div>

                <div class="cforms alileft">
                    <h4>Transfer in a Domain</h4>
                    <form type="GET" id="gsr-contact">
                        <input type="text" name="transfer_domain" id="domain" placeholder="eg. yourdomain.com" required>
                        <div class="alicent margin_top1">
                            <button class="btn btn-danger caps">
                                <i class="fa fa-lg fa-spinner"></i> <b>Transfer</b>
                            </button>&nbsp;
                            <a href="domain_bulk_transfer_login.html" class="btn btn-primary caps"><i class="fa fa-lg fa-share"></i> <b>Bulk Transfer</b></a>&nbsp;

                        </div>

                    </form>
                </div><!-- end cforms -->
                <div class="clearfix"></div>
                <div class="divider_line7"></div>
                <div class="clearfix"></div>

                <?php if(isset($response)): ?>
                    <?php if($response->status_code != -1): ?>
                        <?php if($response->status == 0): ?>
                            <div class="alertymes4">
                                <h3 class="light"><i class="fa fa-times-circle"></i>Sorry! <strong><?php echo e($response->domain); ?> does not appear to be registered yet.</strong>
                                    <br/>Try registering this domain instead.</h3>
                            </div><!-- end section -->
                            <div class="clearfix margin_bottom3"></div>
                        <?php else: ?>
                            <?php if($response->status_code == 'A'): ?>
                                <div class="alertymes4">
                                    <h3 class="light"><i class="fa fa-times-circle"></i>Sorry! Your domain is <strong>LOCKED</strong> and cannot be transferred without being unlocked.</h3>
                                </div><!-- end section -->
                                <div class="clearfix margin_bottom3"></div>
                            <?php elseif($response->privacy_code == 1 && $response->reg_days > 60): ?>
                                <div class="alertymes5">
                                    <h3 class="light"><i class="fa fa-check-circle"></i>Congratulations! <strong><?php echo e($response->domain); ?></strong> is eligible for transfer.</h3>
                                </div><!-- end section -->
                                <div class="clearfix margin_bottom3"></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <div class="alertymes6">
                        <h3 class="light alileft"><i class="fa fa-list-alt"></i><strong>Domain Transfer Checklist</strong></h3>
                        <div class="clearfix margin_bottom1"></div>
                        <div class="one_half_less">
                            <div class="alileft">
                                <ul>
                                    <li>
                                        <i class="fa fa-long-arrow-right dark"></i>
                                        <span class="text-18px dark light">Is Domain Privacy disabled?</span>&nbsp;
                                        <?php if($response->privacy_code == 1): ?>
                                            <span class="text-18px green"><b>Yes</b></span>
                                        <?php elseif($response->privacy_code == 0): ?>
                                            <span class="text-18px red"><b>No</b></span>
                                        <?php elseif($response->privacy_code == 4): ?>
                                            <span class="text-18px red"><b><?php echo e($response->privacy_message); ?></b></span>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <i class="fa fa-long-arrow-right dark"></i>
                                        <span class="text-18px dark light">
                                    Is the domain older than 60 days?
                                  </span>&nbsp;
                                        <?php if($response->status_code != -1): ?>
                                            <?php if($response->reg_days > 60): ?>
                                                <span class="text-18px green">
                                      <b>Yes</b>
                                      </span>
                                            <?php else: ?>
                                                <span class="text-18px red">
                                  <b>No</b>
                                  </span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div><!-- end section -->
                    <div class="clearfix margin_bottom3"></div>


                    <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th width="1%"><input type="checkbox"/></th>
                                <th>Domain Name</th>
                                <th>Enter Domain Password (EPP Code)</th>
                                <th>Registration Period</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td class="alicent">
                                    <?php if($response->privacy_code == 1 && $response->reg_days > 60): ?>
                                        <input type="checkbox" checked="checked"/>
                                    <?php else: ?>
                                        <i class="fa fa-times red"></i>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($response->domain); ?></td>
                                <td><input type="text" class="form-control" placeholder="Enter domain password (EPP code)"></td>
                                <td>
                                    <?php if(isset($domainPricingList)): ?>
                                        <?php $__currentLoopData = $domainPricingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpl): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <?php if($dpl->type == 'new' && $dpl->tld == '.'.explode('.',$response->domain)[1]): ?>
                                                <select class="form-control input-medium">
                                                    <?php $__currentLoopData = json_decode($dpl->pricing); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <option value="<?php echo e($loop->index + 1); ?> year" <?php echo e($loop->index == 1 ? 'selected="selected"':''); ?>><?php echo e($loop->index + 1); ?> year(s) @ RM <?php echo e($price->l); ?>.00</option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </select>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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

                    <div class="clearfix"></div>
                    <div class="divider_line7"></div>
                    <div class="clearfix"></div>
                    <?php if($response->privacy_code == 1 && $response->reg_days > 60): ?>
                        <div class="alicent">
                            <a href="<?php echo e(route('frontend.domain.configuration')); ?>" class="btn btn-danger caps"><i class="fa fa-arrow-circle-right"></i> <b>Continue</b></a>&nbsp;
                        </div>
                    <?php endif; ?>


            </div><!-- end section -->
            <?php endif; ?>


        </div>
    </div><!-- end content fullwidth -->

    <div class="clearfix"></div>
    <div class="divider_line"></div>


    <div class="clearfix"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>