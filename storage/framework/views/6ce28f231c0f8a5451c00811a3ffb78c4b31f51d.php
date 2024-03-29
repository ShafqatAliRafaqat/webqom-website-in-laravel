<?php $page = 'categories';
$breadcrumbs = [
    array('url' => false, 'name' => 'Services'),
    array('url' => url('admin/categories'), 'name' => 'Categories'),
    array('url' => 'javascript:void', 'name' => $page_slug . '- Edit'),
];
?>

<?php $__env->startSection('title','Admin | '.$page_name.'- Edit'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Services'); ?>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h2><?php echo e($page_name); ?> Page<i class="fa fa-angle-right"></i> Edit</h2>
            <?php echo $__env->make('admin.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div hidden="" style="margin-top: 10px" id="success_message"
                 class="messages alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>Sort order is saved.</p>
            </div>
            <div hidden="" style="margin-top: 10px" id="success_message_cms"
                 class="messages alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>The information has been saved/updated successfully.</p>
            </div>
            <div class="clearfix"></div>

            <div class="pull-left"> Last updated: <span id="updated_date" class="text-blue"><?php echo e($recent_update); ?></span>
            </div>
            <div class="clearfix"></div>
            <p></p>
            <div class="portlet">
                <div class="portlet-header">
                    <div class="caption">Page Info</div>
                    <p hidden="">base image url: <?php echo e(url('').'/resources/assets/frontend/'); ?></p>
                    <div class="clearfix"></div>
                    <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                    <div class="tools"><i class="fa fa-chevron-up"></i></div>
                </div>


                <div class="portlet-body">
                    note to programmer: pls use the ckeditor version 4.5.4 version or newer. The css style and layout
                    should follow 100% as shown in front end.
                    <div id="cms_content" contenteditable="true">
                        <?php echo $page_cms->content; ?>

                    </div>

                </div>
                <div class="portlet-body">
                    note to programmer: pls use the ckeditor version 4.5.4 version or newer. The css style and layout
                    should follow 100% as shown in front end.
                    <div id="cms_content_ssl_page" contenteditable="true">
                        <?php echo $page_cms->content2; ?>

                    </div>

                </div>
                <!-- end portlet body -->
                <!-- save button start -->

                <div class="form-actions none-bg"><a onclick="save_content(0)" href="javascript:void"
                                                     class="btn btn-red">Save &amp; Preview &nbsp;<i
                                class="fa fa-search"></i></a>&nbsp; <a onclick="save_content(1)" href="javascript:void"
                                                                       class="btn btn-blue">Save &amp; Publish &nbsp;<i
                                class="fa fa-globe"></i></a>&nbsp; <a href="javascript:void" onclick="cancel_content()"
                                                                      class="btn btn-green">Cancel &nbsp;<i
                                class="glyphicon glyphicon-ban-circle"></i></a></div>
                <!-- save button end -->
            </div>
            <!-- end porlet -->
            <!-- Bottom Content -->
            <?php if($page_cms->bottom_content): ?>
                <h4 class="block-heading"><?php echo e($page_name); ?> Plans &amp; General Features Listing</h4>
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#hosting-plans" data-toggle="tab"><?php echo e($page_name); ?> Plans</a></li>
                    <?php if(strpos(url()->current(),'email88') !== false): ?>
                        <li><a href="#email88-special-features" data-toggle="tab">Email88 New & Special Features</a>
                        </li>
                    <?php endif; ?>
                    <?php if(strpos(url()->current(),'web88ir') !== false): ?>
                        <li><a href="#web88ir-special-features" data-toggle="tab">Web88IR Value Innovation</a></li>
                    <?php endif; ?>
                    <li><a href="#general-features" data-toggle="tab">General Features</a></li>
                    <?php if($page_cms->is_ssl_page==1): ?>
                        <li><a href="#faq" data-toggle="tab">FAQ</a></li>
                    <?php endif; ?>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div id="hosting-plans" class="tab-pane fade in active">
                        <div <?php if($page_cms->is_ssl_page==1): ?> style="display:none" <?php endif; ?> class="portlet">
                            <div class="portlet-header">
                                <div class="caption">Plan Features Listing</div>
                                <p style="margin-top: 32px" class="margin-top-10px"></p>
                                <a href="javascript:void" data-target="#modal-add-plan-feature" data-toggle="modal"
                                   class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                    <button type="button" data-toggle="dropdown"
                                            class="btn btn-red dropdown-toggle"><span
                                                class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="javascript:void" onclick="open_modal_delete_selected()">Delete
                                                selected
                                                item(s)</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete
                                                all</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Modal Add New plan feature start-->
                                <div id="modal-add-plan-feature" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="modal-login-label3" class="modal-title">Add New Plan
                                                    Feature</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form">
                                                    <form id="plan_feature_frm" method="post" class="form-horizontal">
                                                        <?php echo csrf_field(); ?>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <div data-on="success" data-off="primary"
                                                                     class="make-switch">
                                                                    <input name="status" type="checkbox"
                                                                           checked="checked"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Plan Feature <span
                                                                        class="text-red">*</span></label>
                                                            <div class="col-md-6">
                                                                <input name="title" type="text" class="form-control"
                                                                       placeholder="eg. RAM"/>
                                                                <p class="red_error" id="title"></p>

                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="col-md-offset-5 col-md-8">
                                                                <a href="javascript:void" id="save_feature_plan"
                                                                   class="btn btn-red">Save &nbsp;<i
                                                                            class="fa fa-floppy-o"></i></a>&nbsp;
                                                                <a href="#" data-dismiss="modal" class="btn btn-green">Cancel
                                                                    &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END MODAL Add New plan feature -->
                                <!--Modal delete selected items plan feature start-->
                                <div id="modal-delete-selected-plan-feature" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                                                class="fa fa-exclamation-triangle"></i></a> Are you sure
                                                    you
                                                    want to delete the selected item(s)? </h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>#1:</strong> RAM</p>
                                                <div class="form-actions">
                                                    <div class="col-md-offset-4 col-md-8"><a href="#"
                                                                                             class="btn btn-red">Yes
                                                            &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#"
                                                                                                           data-dismiss="modal"
                                                                                                           class="btn btn-green">No
                                                            &nbsp;<i class="fa fa-times-circle"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal delete selected items plan feature end -->
                                <div class="tools"><i class="fa fa-chevron-up"></i></div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-responsive mtl">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th width="1%"><input id="pf_checkbox" onchange="check_all('pf_checkbox')"
                                                                  type="checkbox"/></th>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Plan Feature</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <form id="delete_client">
                                            <?php echo csrf_field(); ?>

                                            <?php if($plan_features): ?>
                                                <?php $count_plan_features = 0;?>
                                                <?php $__currentLoopData = $plan_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php $count_plan_features++;?>
                                                    <tr>
                                                        <td><input class="pf_checkbox" name="id[]" value="<?php echo e($i->id); ?>"
                                                                   type="checkbox"/></td>
                                                        <td><?php echo e($count_plan_features); ?></td>
                                                        <td>
                                                            <span class="label label-xs label-<?php echo e($i->status?'success':'danger'); ?>"><?php echo e($i->status?'Active':'Inactive'); ?></span>
                                                        </td>
                                                        <td><?php echo e($i->title); ?></td>
                                                        <td><a href="javascript:void"
                                                               data-target="#modal-edit-plan-feature-<?php echo e($i->id); ?>"
                                                               data-toggle="modal" title="Edit"><span
                                                                        class="label label-sm label-success"><i
                                                                            class="fa fa-pencil"></i></span></a>
                                                            <a href="#" data-hover="tooltip" data-placement="top"
                                                               title="Delete"
                                                               data-target="#modal-delete-plan-feature-<?php echo e($i->id); ?>"
                                                               data-toggle="modal"><span
                                                                        class="label label-sm label-red"><i
                                                                            class="fa fa-trash-o"></i></span></a>
                                                            <!--Modal Edit plan feature start-->

                                                            <!--Modal delete start-->
                                                            <div id="modal-delete-plan-feature-<?php echo e($i->id); ?>" tabindex="-1"
                                                                 role="dialog" aria-labelledby="modal-login-label"
                                                                 aria-hidden="true" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" data-dismiss="modal"
                                                                                    aria-hidden="true" class="close">
                                                                                &times;
                                                                            </button>
                                                                            <h4 id="modal-login-label4"
                                                                                class="modal-title">
                                                                                <a href=""><i
                                                                                            class="fa fa-exclamation-triangle"></i></a>
                                                                                Are you sure you want to delete this?
                                                                            </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><strong>#<?php echo e($count_plan_features); ?>

                                                                                    :</strong> <?php echo e($i->title); ?></p>
                                                                            <div class="form-actions">
                                                                                <div class="col-md-offset-4 col-md-8"><a
                                                                                            href="javascript:void"
                                                                                            onclick="delete_single(<?php echo e($i->id); ?>)"
                                                                                            class="btn btn-red">Yes
                                                                                        &nbsp;<i
                                                                                                class="fa fa-check"></i></a>&nbsp;
                                                                                    <a href="#" data-dismiss="modal"
                                                                                       class="btn btn-green">No &nbsp;<i
                                                                                                class="fa fa-times-circle"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete end -->
                                                            <div id="modal-edit-plan-feature-<?php echo e($i->id); ?>" tabindex="-1"
                                                                 role="dialog" aria-labelledby="modal-login-label"
                                                                 aria-hidden="true" class="modal fade">
                                                                <div class="modal-dialog modal-wide-width">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" data-dismiss="modal"
                                                                                    aria-hidden="true" class="close">
                                                                                &times;
                                                                            </button>
                                                                            <h4 id="modal-login-label3"
                                                                                class="modal-title">
                                                                                Edit Plan Feature</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-horizontal">

                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Status</label>
                                                                                    <div class="col-md-6">
                                                                                        <div data-on="success"
                                                                                             data-off="primary"
                                                                                             class="make-switch">
                                                                                            <input id="edit_pf_status_<?php echo e($i->id); ?>"
                                                                                                   type="checkbox"
                                                                                                   <?php if($i->status): ?> checked="checked" <?php endif; ?>/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="col-md-3 control-label">Plan
                                                                                        Feature <span
                                                                                                class="text-red">*</span></label>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text"
                                                                                               id="edit_pf_title_<?php echo e($i->id); ?>"
                                                                                               class="form-control"
                                                                                               placeholder="eg. RAM"
                                                                                               value="<?php echo e($i->title); ?>">
                                                                                        <p class="red_error"
                                                                                           id="pf_error_title<?php echo e($i->id); ?>"></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-actions">
                                                                                    <div class="col-md-offset-5 col-md-8">
                                                                                        <a
                                                                                                href="javascript:void"
                                                                                                onclick="edit_plan_feature(<?php echo e($i->id); ?>)"
                                                                                                class="btn btn-red">Save
                                                                                            &nbsp;<i
                                                                                                    class="fa fa-floppy-o"></i></a>&nbsp;
                                                                                        <a href="#" data-dismiss="modal"
                                                                                           class="btn btn-green">Cancel
                                                                                            &nbsp;<i
                                                                                                    class="glyphicon glyphicon-ban-circle"></i></a>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--END MODAL Edit plan feature -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php endif; ?>
                                        </form>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="clearfix"></div>
                                    <span>Showing <?php echo e($plan_features->firstItem()); ?> to <?php echo e($plan_features->lastItem()); ?>

                                        of <?php echo e($plan_features->total()); ?></span>
                                    <span class="pull-right"><?php echo e($plan_features->links()); ?></span>
                                </div>
                                <!-- end table responsive -->
                            </div>
                        </div>
                        <!-- End portlet -->
                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="caption"><?php echo e($page_name); ?> Plans Listing</div>
                                <p style="margin-top: 32px" class="margin-top-10px"></p>
                                <a href="<?php echo e(url('admin/services/new/'.$page_slug)); ?>" class="btn btn-success">Add New Plan
                                    &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                    <button type="button" data-toggle="dropdown"
                                            class="btn btn-red dropdown-toggle"><span
                                                class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="javascript:void" onclick="open_modal_delete_selected_hp()">Delete
                                                selected item(s)</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete
                                                all</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tools"><i class="fa fa-chevron-up"></i></div>
                                <!--Modal delete all items start-->
                                <div id="modal-delete-all" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label"
                                     aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                                                class="fa fa-exclamation-triangle"></i></a> Are you sure
                                                    you
                                                    want to delete all items? </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-actions">
                                                    <div class="col-md-offset-4 col-md-8"><a href="javascript:void"
                                                                                             class="btn btn-red"
                                                                                             onclick="delete_all_plans()">Yes
                                                            &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#"
                                                                                                           data-dismiss="modal"
                                                                                                           class="btn btn-green">No
                                                            &nbsp;<i class="fa fa-times-circle"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal delete all items end -->
                            </div>
                            <div class="portlet-body">
                                <div class="pull-right">
                                    <button id="update_so" class="btn btn-danger">Update Display Order &nbsp;<i
                                                class="fa fa-refresh"></i></a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="table-responsive mtl">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th width="1%"><input id="plan_checkbox"
                                                                  onchange="check_all('plan_checkbox')"
                                                                  type="checkbox"/></th>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Service Code</th>
                                            <th>Plan Name</th>
                                            <th>Price (RM)</th>
                                            <th>Promo Behaviour</th>
                                            <th width="10%">Display Order</th>
                                            <th class="alicent">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <form id="delete_hosting_plans">
                                            <?php echo csrf_field(); ?>

                                            <?php if(count($hosting_plan)>0): ?>
                                                <?php $__currentLoopData = $hosting_plan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr>
                                                        <td><input name="id_hp[]" class="plan_checkbox"
                                                                   value="<?php echo e($i->id); ?>"
                                                                   type="checkbox"/></td>
                                                        <td><?php echo e($i->id); ?></td>
                                                        <td>
                                                            <span class="label label-xs label-<?php echo e($i->status?'success':'danger'); ?>"><?php echo e($i->status?'Active':'Inactive'); ?></span>
                                                        </td>
                                                        <td><?php echo e($i->service_code); ?></td>
                                                        <td><?php echo e($i->plan_name); ?></td>
                                                        <?php if($page_cms->is_ssl_page==1): ?>
                                                            <td>
                                                                <?php if($i->price_type=='Recurring'): ?>
                                                                    <span>3 Years @ </span> <?php echo e(isset($i->price_triennially) ? $i->price_triennially : '0'); ?>

                                                                    <span>/yr</span>
                                                                    <span>2 Years @ </span> <?php echo e(isset($i->price_biennially) ? $i->price_biennially : '0'); ?>

                                                                    <span>/yr</span><br>
                                                                    <span>1 Years @ </span> <?php echo e(isset($i->price_annually) ? $i->price_annually : '0'); ?>

                                                                    <span>/yr</span><br>
                                                                <?php endif; ?>


                                                            </td>
                                                        <?php else: ?>
                                                            <td><?php if($i->price_type=='Recurring'): ?>
                                                                    <span>RM</span> <?php echo e(isset($i->price_annually) ? $i->price_annually : '0'); ?>

                                                                    <span>/yr</span><?php endif; ?>
                                                                <?php if($i->price_type=='One Time'): ?>
                                                                    <span>RM</span><?php echo e(isset($i->price_monthly) ? $i->price_monthly : '0'); ?>

                                                                    <span>/mo</span>
                                                                <?php endif; ?>
                                                                <?php if($i->price_type=='Free'): ?>
                                                                    <span>Free</span></p>
                                                                <?php endif; ?></td>
                                                        <?php endif; ?>

                                                        <td><span class="red"><i
                                                                        class="fa fa-check red"></i>&nbsp;<?php echo e($i->promo_behaviour); ?></span>
                                                        </td>
                                                        <td><input type="text" id="<?php echo e($i->id); ?>" class="form-control"
                                                                   value="<?php echo e($i->sort_order); ?>"></td>
                                                        <td>
                                                            <a href="<?php echo e(url('/admin/services/edit/'.$i->id.'/'.$page_slug)); ?>"
                                                               title="Edit"><span
                                                                        class="label label-sm label-success"><i
                                                                            class="fa fa-pencil"></i></span></a> <a
                                                                    href="#"
                                                                    data-hover="tooltip"
                                                                    data-placement="top"
                                                                    title="Delete"
                                                                    data-target="#modal-delete-plan-hosting-<?php echo e($i->id); ?>"
                                                                    data-toggle="modal"><span
                                                                        class="label label-sm label-red"><i
                                                                            class="fa fa-trash-o"></i></span></a>
                                                            <!--Modal Edit plan feature start-->

                                                            <!--END MODAL Edit plan feature -->
                                                            <!--Modal delete start-->
                                                            <div id="modal-delete-plan-hosting-<?php echo e($i->id); ?>" tabindex="-1"
                                                                 role="dialog" aria-labelledby="modal-login-label"
                                                                 aria-hidden="true" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" data-dismiss="modal"
                                                                                    aria-hidden="true" class="close">
                                                                                &times;
                                                                            </button>
                                                                            <h4 id="modal-login-label4"
                                                                                class="modal-title">
                                                                                <a href=""><i
                                                                                            class="fa fa-exclamation-triangle"></i></a>
                                                                                Are you sure you want to delete this?
                                                                            </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><strong>#<?php echo e($i->id); ?>

                                                                                    :</strong> <?php echo e($i->plan_name); ?></p>
                                                                            <div class="form-actions">
                                                                                <div class="col-md-offset-4 col-md-8"><a
                                                                                            href="javascript:void"
                                                                                            onclick="delete_single_hp(<?php echo e($i->id); ?>)"
                                                                                            class="btn btn-red">Yes
                                                                                        &nbsp;<i
                                                                                                class="fa fa-check"></i></a>&nbsp;
                                                                                    <a href="#" data-dismiss="modal"
                                                                                       class="btn btn-green">No &nbsp;<i
                                                                                                class="fa fa-times-circle"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete end -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php endif; ?>
                                        </form>
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <td colspan="9"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- end table responsive -->
                            </div>
                            <!-- end portlet body -->
                        </div>
                        <!-- End porlet -->
                    </div>
                    <!-- end tab copyright text -->
                    <div id="faq" class="tab-pane fade">

                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="caption">Frequently Asked Questions Listing</div>
                                <p class="margin-top-10px"></p>
                                <a href="javascript:void" onclick="store_faq(0)" data-target="#modal-add-faq"
                                   data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                    <button type="button" data-toggle="dropdown"
                                            class="btn btn-red dropdown-toggle"><span
                                                class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="javascript:void;" onclick="modalDeleteSelectedFaq()">Delete
                                                selected
                                                item(s)</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete
                                                all</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tools"><i class="fa fa-chevron-up"></i></div>

                                <!--Modal Add new start-->
                                <div id="modal-add-faq" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
                                     aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="modal-login-label3" class="modal-title">FAQ Add New</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form">
                                                    <form id="frm_faq" class="form-horizontal">
                                                        <input type="hidden" name="content" id="faq_content_input">
                                                        <input type="hidden" name="id">
                                                        <input type="hidden" name="page" value="<?php echo e($page_name); ?>">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <div data-on="success" data-off="primary"
                                                                     class="make-switch">
                                                                    <input name="status" type="checkbox"
                                                                           checked="checked"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">FAQ Title <span
                                                                        class="text-red">*</span></label>
                                                            <div class="col-md-6">
                                                                <input type="text" name="title" class="form-control"
                                                                       placeholder="eg. What is a SSL Certificate?">
                                                                <p class="red_error" id="faq_title"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Content <span
                                                                        class="text-red">*</span></label>
                                                            <div class="col-md-9">
                                                                <div class="text-blue border-bottom">You can edit the
                                                                    content by clicking the text below.
                                                                </div>
                                                                <div id="faq_content" contenteditable="true">
                                                                    <p>Click here to start edit the content.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php echo e(csrf_field()); ?>

                                                        <div class="form-actions">
                                                            <div class="col-md-offset-5 col-md-8">
                                                                <button class="btn btn-red">Save &nbsp;<i
                                                                            class="fa fa-floppy-o"></i></button>&nbsp;
                                                                <a
                                                                        href="#" data-dismiss="modal"
                                                                        class="btn btn-green">Cancel
                                                                    &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END MODAL Add New -->
                                <!--Modal delete selected items start-->
                                <div id="modal-delete-selected-faq" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                                                class="fa fa-exclamation-triangle"></i></a> Are you sure
                                                    you
                                                    want to delete the FAQ item(s)? </h4>
                                            </div>
                                            <div class="modal-body" id="dltitems"></div>
                                            <div class="modal-body" id="delete-unselected-body-faq">
                                                <div id="delete-selected-body-information"></div>
                                                <p id="selected_zero" style="" class="alert alert-danger">Please select
                                                    at
                                                    least one item for delete</p>
                                                <div class="form-actions" id="delete-selected-buttons"
                                                     style="display: none;">
                                                    <div class="col-md-offset-4 col-md-8">
                                                        <button type="button" class="btn btn-red">Yes &nbsp;<i
                                                                    class="fa fa-check"></i></button>&nbsp; <a href="#"
                                                                                                               data-dismiss="modal"
                                                                                                               class="btn btn-green">No
                                                            &nbsp;<i class="fa fa-times-circle"></i></a></div>
                                                </div>
                                            </div>
                                            <div class="modal-body" id="delete-selected-body-faq" style="display:none;">
                                                <div class="form-actions" id="delete-selected-buttons">
                                                    <div class="col-md-offset-4 col-md-8">
                                                        <button type="button" onclick="deletebulkfaqitems()"
                                                                class="btn btn-red">Yes &nbsp;<i
                                                                    class="fa fa-check"></i>
                                                        </button>&nbsp; <a href="#" data-dismiss="modal"
                                                                           class="btn btn-green">No &nbsp;<i
                                                                    class="fa fa-times-circle"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal delete selected items end -->

                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th width="1%"><input id="faq_checkbox" onchange="check_all('faq_checkbox')"
                                                                  type="checkbox"/></th>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Title</th>
                                            <th class="">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <form id="delete_hosting_plans">
                                            <?php echo csrf_field(); ?>

                                            <?php if(count($faq)>0): ?>
                                                <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr>
                                                        <td><input name="id_hp[]" class="faq_checkbox"
                                                                   value="<?php echo e($i->id); ?>"
                                                                   type="checkbox"/></td>
                                                        <td><?php echo e($i->id); ?></td>
                                                        <td>
                                                            <div id="statusval_<?php echo $i->id; ?>"><?php echo e($i->title); ?></div>
                                                        </td>
                                                        <td>
                                                            <span class="label label-xs label-<?php echo e($i->status?'success':'danger'); ?>"><?php echo e($i->status?'Active':'Inactive'); ?></span>
                                                        </td>

                                                        <td><a href="javascript:void" onclick="store_faq(<?php echo e($i->id); ?>)"
                                                               title="Edit"><span
                                                                        class="label label-sm label-success"><i
                                                                            class="fa fa-pencil"></i></span></a> <a
                                                                    href="#"
                                                                    data-hover="tooltip"
                                                                    data-placement="top"
                                                                    title="Delete"
                                                                    data-target="#modal-delete-plan-hosting-<?php echo e($i->id); ?>"
                                                                    data-toggle="modal"><span
                                                                        class="label label-sm label-red"><i
                                                                            class="fa fa-trash-o"></i></span></a>
                                                            <!--Modal Edit plan feature start-->

                                                            <!--END MODAL Edit plan feature -->
                                                            <!--Modal delete start-->
                                                            <div id="modal-delete-plan-hosting-<?php echo e($i->id); ?>" tabindex="-1"
                                                                 role="dialog" aria-labelledby="modal-login-label"
                                                                 aria-hidden="true" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" data-dismiss="modal"
                                                                                    aria-hidden="true" class="close">
                                                                                &times;
                                                                            </button>
                                                                            <h4 id="modal-login-label4"
                                                                                class="modal-title">
                                                                                <a href=""><i
                                                                                            class="fa fa-exclamation-triangle"></i></a>
                                                                                Are you sure you want to delete this?
                                                                            </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><strong>#<?php echo e($i->id); ?>

                                                                                    :</strong> <?php echo e($i->title); ?>

                                                                            </p>
                                                                            <div class="form-actions">
                                                                                <div class="col-md-offset-4 col-md-8"><a
                                                                                            href="javascript:void"
                                                                                            onclick="delete_faq(<?php echo e($i->id); ?>)"
                                                                                            class="btn btn-red">Yes
                                                                                        &nbsp;<i
                                                                                                class="fa fa-check"></i></a>&nbsp;
                                                                                    <a href="#" data-dismiss="modal"
                                                                                       class="btn btn-green">No &nbsp;<i
                                                                                                class="fa fa-times-circle"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete end -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php endif; ?>
                                        </form>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- end table responsive -->

                                <div class="clearfix"></div>
                            </div>
                        </div><!-- end portlet all our plans include -->

                    </div><!-- end tab faq-->

                    <?php if(strpos(url()->current(),'email88') !== false): ?>
                        <?php echo $__env->make('admin.email88.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <?php if(strpos(url()->current(),'web88ir') !== false): ?>
                        <?php echo $__env->make('admin.web88ir.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endif; ?>
                    <div id="general-features" class="tab-pane fade">
                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="caption">Feature Heading Edit</div>
                                <div class="tools"><i class="fa fa-chevron-up"></i></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive mtl">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Feature Heading</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <span class="label label-xs label-<?php echo e($general_features[0]['heading_status']?'success':'danger'); ?>"><?php echo e($general_features[0]['heading_status']?'Active':'Inactive'); ?></span>
                                            </td>
                                            <td><?php echo e($general_features[0]['heading']); ?></td>
                                            <td><a href="#" data-hover="tooltip" data-placement="top"
                                                   data-target="#modal-edit-feature-title" data-toggle="modal"
                                                   title="Edit"><span
                                                            class="label label-sm label-success"><i
                                                                class="fa fa-pencil"></i></span></a>
                                                <!--Modal Edit feature heading text start-->
                                                <div id="modal-edit-feature-title" tabindex="-1" role="dialog"
                                                     aria-labelledby="modal-login-label" aria-hidden="true"
                                                     class="modal fade">
                                                    <div class="modal-dialog modal-wide-width">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" data-dismiss="modal"
                                                                        aria-hidden="true" class="close">&times;
                                                                </button>
                                                                <h4 id="modal-login-label3" class="modal-title">Edit
                                                                    Feature
                                                                    Heading Text</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form">
                                                                    <form id="frm_general_features_heading"
                                                                          class="form-horizontal">
                                                                        <?php echo e(csrf_field()); ?>

                                                                        <input type="hidden" name="page"
                                                                               class="form-control"
                                                                               value="<?php echo e($page_name); ?>">
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label">Status</label>
                                                                            <div class="col-md-6">
                                                                                <div data-on="success"
                                                                                     data-off="primary"
                                                                                     class="make-switch">
                                                                                    <input name="status" type="checkbox"
                                                                                           <?php if($general_features[0]['heading_status']==1): ?> checked="checked" <?php endif; ?>/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label class="col-md-3 control-label">Feature
                                                                                Heading <span class="text-red">*</span>
                                                                            </label>
                                                                            <div class="col-md-6">
                                                                                <input type="text" name="heading"
                                                                                       class="form-control"
                                                                                       value="<?php echo e($general_features[0]['heading']); ?>">
                                                                                <p class="red_error"
                                                                                   id="gf_heading"></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-actions">
                                                                            <div class="col-md-offset-5 col-md-8">
                                                                                <button class="btn btn-red">Save
                                                                                    &nbsp;<i
                                                                                            class="fa fa-floppy-o"></i>
                                                                                </button>&nbsp; <a href="#"
                                                                                                   data-dismiss="modal"
                                                                                                   class="btn btn-green">Cancel
                                                                                    &nbsp;<i
                                                                                            class="glyphicon glyphicon-ban-circle"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--END MODAL Edit feature heading text-->
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- end table responsive -->
                            </div>
                        </div>
                        <!-- End porlet -->
                        <div class="portlet">
                            <div class="portlet-header">
                                <div class="caption">General Features Listing</div>
                                <p class="margin-top-10px"></p>
                                <a href="javascript:void" onclick="add_general_feature(0)" class="btn btn-success">Add
                                    New
                                    &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                    <button type="button" data-toggle="dropdown"
                                            class="btn btn-red dropdown-toggle"><span
                                                class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="javascript:void" onclick="gf_open_modal_delete_selected()">Delete
                                                selected item(s)</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete
                                                all</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--Modal delete all items start-->
                                <div id="modal-delete-all" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label"
                                     aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                                                class="fa fa-exclamation-triangle"></i></a> Are you sure
                                                    you
                                                    want to delete all items? </h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-actions">
                                                    <div class="col-md-offset-4 col-md-8"><a href="#"
                                                                                             class="btn btn-red">Yes
                                                            &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#"
                                                                                                           data-dismiss="modal"
                                                                                                           class="btn btn-green">No
                                                            &nbsp;<i class="fa fa-times-circle"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- modal delete all items end -->
                                <div class="tools"><i class="fa fa-chevron-up"></i></div>
                                <!--Modal Add new general ffeature start-->
                                <div id="modal-add-general-feature" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true"
                                                        class="close">
                                                    &times;
                                                </button>
                                                <h4 id="add_gf_heading" class="modal-title">Add New General Feature</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form">
                                                    <form id="frm_general_features" class="form-horizontal"
                                                          enctype="multipart/form-data">
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="ssl_page" id="gf_ssl_page">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Status</label>
                                                            <div class="col-md-6">
                                                                <div data-on="success" data-off="primary"
                                                                     class="make-switch">
                                                                    <input name="status" type="checkbox"
                                                                           checked="checked"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Feature Title <span
                                                                        class="text-red">*</span></label>
                                                            <div class="col-md-6">
                                                                <input type="hidden" name="page" class="form-control"
                                                                       value="<?php echo e($page_name); ?>">
                                                                <input type="text" name="title" class="form-control"
                                                                       placeholder="eg. Ultra-Fast Platform ">
                                                                <p class="red_error" id="gf_title"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Feature
                                                                Description</label>
                                                            <div class="col-md-6">
                                                            <textarea name="description"
                                                                      class="form-control"></textarea>
                                                                <p class="red_error" id="gf_description"></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Insert CSS Icon
                                                                or </label>
                                                            <div class="col-md-6">
                                                                <div class="text-blue border-bottom">Please choose
                                                                    <strong>ONE</strong>
                                                                    of the following options for "Feature Icon".
                                                                </div>
                                                                <div class="margin-top-5px"></div>
                                                                <input type="text" name="icon" class="form-control"
                                                                       id="inputContent"
                                                                       placeholder="eg. fa-rocket or icon-anchor">
                                                                <div class="help-block">Please refer here for complete
                                                                    <a
                                                                            href="<?php echo e(url('/admin/icons')); ?>"
                                                                            target="_blank">icon
                                                                        options.</a>
                                                                    <p class="red_error" id="gf_icon"></p></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Upload Icon
                                                                Image</label>
                                                            <div class="col-md-9">
                                                                <div class="xs-margin"></div>
                                                                <input name="icon_image" id="exampleInputFile2"
                                                                       type="file"/>
                                                                <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                                                <p class="red_error" id="gf_icon_image"></p></div>
                                                        </div>
                                                </div>
                                                <div class="form-actions">
                                                    <div class="col-md-offset-5 col-md-8">
                                                        <button class="btn btn-red" id="frm_general_features_submit">
                                                            Save
                                                            &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp;
                                                        <button type="button" style="display: none"
                                                                id="frm_general_features_submit_wait"
                                                                class="btn btn-red">
                                                            Uploading <i
                                                                    class="loading_icon fa fa-spinner fa-spin fa-large"></i>
                                                        </button>
                                                        <a href="#" data-dismiss="modal" class="btn btn-green">Cancel
                                                            &nbsp;<i
                                                                    class="glyphicon glyphicon-ban-circle"></i></a>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END MODAL Add New general Feature-->

                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th width="1%"><input id="gff_checkbox" onchange="check_all('gff_checkbox')"
                                                              type="checkbox"></th>
                                        <th>#</th>
                                        <th>Status</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <form id="delete_general_features">
                                        <?php echo e(csrf_field()); ?>

                                        <?php $count_gf = 0;?>
                                        <?php if(count($general_features->where('ssl_page',0))>0): ?>
                                            <?php $__currentLoopData = $general_features->where('ssl_page',0); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <?php $count_gf++;?>
                                                <tr>
                                                    <td><input type="checkbox" data-count="<?php echo e($count_gf); ?>"
                                                               class="gff_checkbox" value="<?php echo e($i->id); ?>" name="id_gf[]">
                                                    </td>
                                                    <td><?php echo e($count_gf); ?></td>
                                                    <td>
                                                        <span class="label label-xs label-<?php echo e($i->status?'success':'danger'); ?>"><?php echo e($i->status?'Active':'Inactive'); ?></span>
                                                    </td>
                                                    <td><?php echo e($i->title); ?></td>
                                                    <td><a href="javascript:void"
                                                           onclick="edit_general_feature(<?php echo e($i->id); ?>,0)"
                                                           data-hover="tooltip"
                                                           data-placement="top" title="Edit"><span
                                                                    class="label label-sm label-success"><i
                                                                        class="fa fa-pencil"></i></span></a> <a href="#"
                                                                                                                data-hover="tooltip"
                                                                                                                data-placement="top"
                                                                                                                title="Delete"
                                                                                                                data-target="#modal-delete-general-feature-<?php echo e($i->id); ?>"
                                                                                                                data-toggle="modal"><span
                                                                    class="label label-sm label-red"><i
                                                                        class="fa fa-trash-o"></i></span></a>

                                                        <!--Modal delete start-->
                                                        <div id="modal-delete-general-feature-<?php echo e($i->id); ?>" tabindex="-1"
                                                             role="dialog" aria-labelledby="modal-login-label"
                                                             aria-hidden="true" class="modal fade">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" data-dismiss="modal"
                                                                                aria-hidden="true" class="close">&times;
                                                                        </button>
                                                                        <h4 id="modal-login-label4" class="modal-title">
                                                                            <a
                                                                                    href=""><i
                                                                                        class="fa fa-exclamation-triangle"></i></a>
                                                                            Are you sure you want to delete this? </h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><strong>#<?php echo e($count_gf); ?>:</strong><?php echo e($i->title); ?>

                                                                        </p>
                                                                        <div class="form-actions">
                                                                            <div class="col-md-offset-4 col-md-8">
                                                                                <button type="button"
                                                                                        onclick="delete_gf_single(<?php echo e($i->id); ?>)"
                                                                                        class="btn btn-red">Yes &nbsp;<i
                                                                                            class="fa fa-check"></i>
                                                                                </button>&nbsp; <a href="#"
                                                                                                   data-dismiss="modal"
                                                                                                   class="btn btn-green">No
                                                                                    &nbsp;<i
                                                                                            class="fa fa-times-circle"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- modal delete general feature end -->
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        <?php endif; ?>
                                    </form>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end table responsive -->
                        </div>
                        <div class="portlet <?php if($page_cms->is_ssl_page==0): ?> hidden <?php endif; ?>">
                            <div class="portlet-header">
                                <div class="caption">All Our Plans Include Listing</div>
                                <p class="margin-top-10px"></p>
                                <a href="javascript:void" onclick="add_general_feature(1)" class="btn btn-success">Add
                                    New
                                    &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Delete</button>
                                    <button type="button" data-toggle="dropdown"
                                            class="btn btn-red dropdown-toggle"><span
                                                class="caret"></span><span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="javascript:void" onclick="gf_open_modal_delete_selected(1)">Delete
                                                selected item(s)</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete
                                                all</a>
                                        </li>
                                    </ul>
                                </div>


                                <div class="tools"><i class="fa fa-chevron-up"></i></div>


                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                        <tr>
                                            <th width="1%"><input id="gff_checkbox" onchange="check_all('gff_checkbox')"
                                                                  type="checkbox"></th>
                                            <th>#</th>
                                            <th>Status</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <form id="delete_general_features_ssl">
                                            <?php echo e(csrf_field()); ?>

                                            <?php $count_gf = 0;?>
                                            <?php if(count($general_features->where('ssl_page',1))>0): ?>
                                                <?php $__currentLoopData = $general_features->where('ssl_page',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <?php $count_gf++;?>
                                                    <tr>
                                                        <td><input type="checkbox" class="gff_checkbox"
                                                                   value="<?php echo e($i->id); ?>"
                                                                   name="id_gf[]"></td>
                                                        <td><?php echo e($count_gf); ?></td>
                                                        <td>
                                                            <span class="label label-xs label-<?php echo e($i->status?'success':'danger'); ?>"><?php echo e($i->status?'Active':'Inactive'); ?></span>
                                                        </td>
                                                        <td><?php echo e($i->title); ?></td>
                                                        <td><a href="javascript:void"
                                                               onclick="edit_general_feature(<?php echo e($i->id); ?>,1)"
                                                               data-hover="tooltip" data-placement="top"
                                                               title="Edit"><span
                                                                        class="label label-sm label-success"><i
                                                                            class="fa fa-pencil"></i></span></a> <a
                                                                    href="#"
                                                                    data-hover="tooltip"
                                                                    data-count="<?php echo e($count_gf); ?>"
                                                                    data-placement="top"
                                                                    title="Delete"
                                                                    data-target="#modal-delete-general-feature-<?php echo e($i->id); ?>"
                                                                    data-toggle="modal"><span
                                                                        class="label label-sm label-red"><i
                                                                            class="fa fa-trash-o"></i></span></a>

                                                            <!--Modal delete start-->
                                                            <div id="modal-delete-general-feature-<?php echo e($i->id); ?>"
                                                                 tabindex="-1"
                                                                 role="dialog" aria-labelledby="modal-login-label"
                                                                 aria-hidden="true" class="modal fade">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" data-dismiss="modal"
                                                                                    aria-hidden="true" class="close">
                                                                                &times;
                                                                            </button>
                                                                            <h4 id="modal-login-label4"
                                                                                class="modal-title">
                                                                                <a href=""><i
                                                                                            class="fa fa-exclamation-triangle"></i></a>
                                                                                Are you sure you want to delete this?
                                                                            </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><strong>#<?php echo e($count_gf); ?>

                                                                                    :</strong><?php echo e($i->title); ?>

                                                                            </p>
                                                                            <div class="form-actions">
                                                                                <div class="col-md-offset-4 col-md-8">
                                                                                    <button type="button"
                                                                                            onclick="delete_gf_single(<?php echo e($i->id); ?>)"
                                                                                            class="btn btn-red">Yes
                                                                                        &nbsp;<i
                                                                                                class="fa fa-check"></i>
                                                                                    </button>&nbsp; <a href="#"
                                                                                                       data-dismiss="modal"
                                                                                                       class="btn btn-green">No
                                                                                        &nbsp;<i
                                                                                                class="fa fa-times-circle"></i></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- modal delete general feature end -->
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            <?php endif; ?>
                                        </form>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5"></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="clearfix"></div>
                                </div>
                                <!-- end table responsive -->
                            </div>

                        </div><!-- end portlet all our plans include -->
                    </div>

                </div>
                <!-- end background image -->
            <?php endif; ?>
        </div>
        <!-- end tab content -->
        <div class="clearfix"></div>


    </div>
    <!-- end col-lg-12 -->

    <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true"
         class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                    class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the
                        selected <span id="count-seleted"></span> item(s)? </h4>
                </div>
                <div class="modal-body" id="delete-selected-body">
                    <div id="delete-selected-body-information"></div>
                    <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one
                        item for delete</p>
                    <div class="form-actions" id="delete-selected-buttons">
                        <div class="col-md-offset-4 col-md-8">
                            <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i
                                        class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal"
                                                                                   class="btn btn-green">No &nbsp;<i
                                        class="fa fa-times-circle"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-delete-selected-hp" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
         aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                    class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the
                        selected hosted plan <span id="count-seleted"></span> item(s)? </h4>
                </div>
                <div class="modal-body" id="delete-selected-body">
                    <div id="delete-selected-body-information"></div>
                    <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one
                        item for delete</p>
                    <div class="form-actions" id="delete-selected-buttons">
                        <div class="col-md-offset-4 col-md-8">
                            <button type="button" id="delete_bulk_hp" class="btn btn-red">Yes &nbsp;<i
                                        class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal"
                                                                                   class="btn btn-green">No &nbsp;<i
                                        class="fa fa-times-circle"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-delete-selected-gf" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
         aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                    class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the
                        general features <span id="count-seleted"></span> item(s)? </h4>
                </div>
                <div class="modal-body" id="delete-selected-body">
                    <div id="delete-selected-body-information"></div>
                    <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one
                        item for delete</p>
                    <div class="form-actions" id="delete-selected-buttons">
                        <div class="col-md-offset-4 col-md-8">
                            <button type="button" id="delete_bulk_gf" class="btn btn-red">Yes &nbsp;<i
                                        class="fa fa-check"></i></button>
                            <button type="button" id="delete_bulk_gf_ssl" class="btn btn-red">Yes &nbsp;<i
                                        class="fa fa-check"></i></button>
                            &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i
                                        class="fa fa-times-circle"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal delete selected items end -->


    <!--Modal Edit general feature start-->
    <div id="modal-edit-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label"
         aria-hidden="true" class="modal fade">
        <div class="modal-dialog modal-wide-width">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="gf_edit_heading" class="modal-title">General Feature Edit</h4>
                </div>
                <div class="modal-body">
                    <form id="frm_general_features_edit" class="form-horizontal" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form">


                            <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                    <div data-on="success" data-off="primary" class="make-switch">
                                        <input name="status" type="checkbox" checked="checked"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Feature Title <span
                                            class="text-red">*</span></label>
                                <div class="col-md-6">
                                    <input type="hidden" name="id" type="hidden" id="gf_id_edit" class="form-control">
                                    <input type="hidden" name="page" type="hidden" class="form-control"
                                           value="<?php echo e($page_name); ?>">
                                    <input type="text" name="title" class="form-control"
                                           placeholder="eg. Ultra-Fast Platform ">
                                    <p class="red_error" id="gf_title"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Feature Description</label>
                                <div class="col-md-6">
                                    <textarea id="gf_description_edit" name="description"
                                              class="form-control"></textarea>
                                    <p class="red_error" id="gf_description"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                <div class="col-md-6">
                                    <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the
                                        following options for "Feature Icon".
                                    </div>
                                    <div class="margin-top-5px"></div>
                                    <input type="text" name="icon" class="form-control" id="inputContent"
                                           placeholder="eg. fa-rocket or icon-anchor">
                                    <div class="help-block">Please refer here for complete <a href="icons_sevices.html"
                                                                                              target="_blank">icon
                                            options.</a>
                                        <p class="red_error" id="gf_icon"></p></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Upload Icon Image</label>
                                <div class="col-md-9">
                                    <div class="xs-margin"></div>
                                    <img id="gf_img_edit" style="    width: 80px" src="" alt="no image was uploaded"
                                         class="img-responsive"><br/>
                                    <a id="gf_img_delete" href="#" data-hover="tooltip" data-placement="top"
                                       title="Delete" data-target="#modal-delete-icon" data-toggle="modal"><span
                                                class="label label-sm label-red"><i
                                                    class="fa fa-trash-o"></i></span></a>
                                    <!--Modal delete icon start-->
                                    <div id="modal-delete-icon" tabindex="-1" role="dialog"
                                         aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true"
                                                            class="close">&times;
                                                    </button>
                                                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i
                                                                    class="fa fa-exclamation-triangle"></i></a> Are you
                                                        sure you want to delete this icon image? </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><img src="../images/about_us/icon_cloud_app.png"
                                                            id="gf_img_edit_modal" alt="Ultra-Fast Platform"
                                                            class="img-responsive"></p>
                                                    <div class="form-actions">
                                                        <div class="col-md-offset-4 col-md-8"><a href="#"
                                                                                                 class="btn btn-red"
                                                                                                 id="gf_delete_icon_button"
                                                                                                 onclick="delete_gf_icon()">Yes
                                                                &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#"
                                                                                                               data-dismiss="modal"
                                                                                                               class="btn btn-green">No
                                                                &nbsp;<i class="fa fa-times-circle"></i></a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input name="icon_image" id="exampleInputFile2" type="file"/>
                                    <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                    <p class="red_error" id="gf_icon_image"></p></div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="col-md-offset-5 col-md-8">
                                <button type="button" id="frm_general_features_edit_submit" class="btn btn-red">Save
                                    &nbsp;<i class="fa fa-floppy-o"></i></button>

                                &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i
                                            class="glyphicon glyphicon-ban-circle"></i></a></div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

</div>
<!--END MODAL Edit general feature -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
    <link type="text/css" rel="stylesheet"
          href="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/jquery-nestable/nestable.css">
    <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/ckeditor/ckeditor.js"></script>
    <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>js/ui-tabs-accordions-navs.js"></script>
    <!-- webqom frontend style css -->
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/style_webqom_front.css">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/reset.css">
    <link type="text/css" rel="stylesheet"
          href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/responsive-leyouts_webqom_front.css">
    <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/shortcodes.css">

    <script type="text/javascript">
        var page_url = base_url + '/admin/services/';
        $(document).on('click', '#save_feature_plan', function (event) {
            $('#plan_feature_frm').submit();
        });
        $(document).on('submit', '#plan_feature_frm', function (event) {
            event.preventDefault();
            $.ajax({
                url: page_url + 'new/<?php echo e($page_slug); ?>',
                type: 'POST',
                data: $('#plan_feature_frm').serialize(),
                success: function (data) {
                    console.log(data)
                },
                error: function (msg) {
                    console.log(msg)
                }
            })
                .done(function () {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>";
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        });

        function edit_plan_feature(id) {
            $('.red_error').html("");
            var status = 0;
            if ($('#edit_pf_status_' + id).is(":checked")) {
                status = 1;
            }
            var title = $('#edit_pf_title_' + id).val();
            $.ajax({
                url: page_url + 'update',
                type: 'POST',
                data: {'id': id, 'status': status, 'title': title, '_token': csrf_token},
            })
                .done(function () {
                    window.location.href = page_url + '<?php echo e($page_slug); ?>';
                })
                .fail(function (response) {
                    $("#pf_error_title" + id).html(response.responseJSON.title);
                })
                .always(function () {
                    console.log("complete");
                });


        }

        $(document).on('click', '#edit_plan_feature', function (event) {
            $.ajax({
                url: page_url + 'update/<?php echo e($page_slug); ?>',
                type: 'POST',
                data: $('#plan_feature_edit_frm').serialize(),
            })
                .done(function () {
                    location.reload();
                })
                .fail(function (response) {
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        //display the key and value pair
                        //console.log(k + ' is ' + v);
                        $('#error_edit_' + k).html(v)

                    });
                })
                .always(function () {
                    console.log("complete");
                });
        });

        function modalDeleteSelectedFaq() {
            var Cc = false;
            var inhtml = '';
            $("#dltitems").html("");
            $(".faq_checkbox").each(function () {
                var checking = $(this).is(':checked');
                if (checking === true) {
                    Cc = true;
                    var id = $(this).val();
                    var st = $("#statusval_" + id).html();
                    inhtml += "<strong>#" + id + '</strong> ' + st + '<br />';
                }
            });
            $("#dltitems").html(inhtml);
            if (Cc === false) {
                $("#delete-unselected-body-faq").show();
                $("#delete-selected-body-faq").hide();
                $("#modal-delete-selected-faq").modal('show');
            } else {
                $("#delete-unselected-body-faq").hide();
                $("#delete-selected-body-faq").show();
                $("#modal-delete-selected-faq").modal('show');
            }
            //$("#modal-delete-selected-faq").modal('show');
        }

        function deletebulkfaqitems() {
            var post = '';
            $(".faq_checkbox").each(function () {
                var checking = $(this).is(':checked');
                if (checking === true) {
                    var id = $(this).val();
                    post = post + ',' + id;
                }
            });
            $.post(base_url + "/admin/services/deletebulkfaqs", {
                ids: post,
                _token: '<?php echo e(csrf_token()); ?>'
            }).done(function (e) {
                location.reload();
            });
        }

        function save_content(publish) {
            var content = CKEDITOR.instances.cms_content.getData();
            var content2 = CKEDITOR.instances.cms_content_ssl_page.getData();
            var data = [];
            if (publish == 0) {
                data = {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'name': '<?php echo e($page_name); ?>',
                    'temp': content,
                    'temp2': content2,
                    'publish': publish,
                };
            } else {
                data = {
                    '_token': '<?php echo e(csrf_token()); ?>',
                    'name': '<?php echo e($page_name); ?>',
                    'content': content,
                    'content2': content2,
                    'publish': publish,
                };
            }
            $.ajax({
                url: base_url + '/admin/pages/new',
                type: 'POST',
                data: data,
            })
                .done(function (response) {
                    $("#updated_date").html(response);
                    if (publish == 0) {
                        window.open(base_url + "/services/<?php echo e($page_slug); ?>/preview");
                    }
                    $('#success_message_cms').show();
                    $('html, body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                    setTimeout(function () {
                        $('#success_message_cms').hide();
                    }, 3000);
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        function delete_single(id) {
            $('#delete_single_button').attr("disabled", true);
            $.ajax({
                url: page_url + 'feature_plan_delete',
                type: 'POST',

                data: {'_token': csrf_token, 'id': id,}
            })
                .done(function () {
                    location.reload();
                })
                .fail(function () {
                    alert("some error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        function delete_single_hp(id) {
            $('#delete_single_button').attr("disabled", true);
            $.ajax({
                url: page_url + 'delete_hp',
                type: 'POST',

                data: {'_token': csrf_token, 'id_hp': id,}
            })
                .done(function () {
                    location.reload();
                })
                .fail(function () {
                    alert("some error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        function delete_gf_single(id) {
            $('#gf_delete_single_button').attr("disabled", true);
            $.ajax({
                url: base_url + '/admin/general_features/delete',
                type: 'POST',

                data: {'_token': csrf_token, 'id_gf': id}
            })
                .done(function () {
                    location.reload();
                })
                .fail(function () {
                    alert("some error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        function delete_gf_icon() {
            $('#gf_delete_icon_button').attr("disabled", true);
            var id = $("#gf_id_edit").val();
            console.log("id ", id);
            $.ajax({
                url: base_url + '/admin/general_features/delete_icon',
                type: 'POST',

                data: {'_token': csrf_token, 'id_gf': id}
            })
                .done(function () {
                    $("#modal-delete-icon").modal('hide');
                    $("#gf_img_edit").attr('src', "");
                    $("#gf_img_edit_modal").attr('src', "");
                    $("#gf_img_delete").hide();
                    $('#gf_delete_icon_button').attr("disabled", false);
                })
                .fail(function () {
                    alert("some error");
                    $('#gf_delete_icon_button').attr("disabled", false);
                })
                .always(function () {
                    console.log("complete");

                });
        }

        function open_modal_delete_selected() {
            $('#delete-selected-body-information').html("");
            $("#modal-delete-selected").modal('show');
            var selected = $('input[name="id[]"]:checked').length;
            if (selected < 1) {
                $('#modal-delete-selected #selected_zero').show()
                $('#modal-delete-selected #delete-selected-buttons').hide()
            } else {
                /*get seleccted users details*/
                $.ajax({
                    url: base_url + '/admin/cloud_hosting/get_details',
                    type: 'POST',
                    data: $("#delete_client").serialize()
                })
                    .done(function (response) {
                        console.log(response);
                        for (var i = 0; i < response.length; i++) {
                            $('#delete-selected-body-information').prepend('<p>' +
                                '<strong>#' + response[i].id + '</strong>:<span>' + response[i].title + '</p>');
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        $('#modal-delete-selected #selected_zero').hide()
                        $('#modal-delete-selected #delete-selected-buttons').show();
                        $('#modal-delete-selected #count-seleted').html(selected);
                    });

                /*End*/

            }
        }

        function gf_open_modal_delete_selected(ssl_page) {
            if (ssl_page == 1) {
                var data = $("#delete_general_features_ssl").serialize();
                $('#delete_bulk_gf_ssl').show();
                $('#delete_bulk_gf').hide();
            } else {
                $('#delete_bulk_gf_ssl').hide();
                $('#delete_bulk_gf').show();
                var data = $("#delete_general_features").serialize();
            }
            $('#modal-delete-selected-gf #delete-selected-body-information').html("");
            $("#modal-delete-selected-gf").modal('show');
            var selected = $('input[name="id_gf[]"]:checked').length;
            if (selected < 1) {
                $('#modal-delete-selected-gf #selected_zero').show()
                $('#modal-delete-selected-gf #delete-selected-buttons').hide()
            } else {
                /*get seleccted users details*/
                $.ajax({
                    url: base_url + '/admin/general_features/get_details',
                    type: 'POST',
                    data: data
                })
                    .done(function (response) {
                        //console.log(seleccted);
                        for (var i = 0; i < response.length; i++) {
                            count = $('input[name="id_gf[]"][value="' + response[i]['id'] + '"]').attr('data-count');
                            $('#modal-delete-selected-gf #delete-selected-body-information').prepend('<p>' +
                                '<strong>#' + (count ? count : response[i]['id']) + '</strong>:<span>' + response[i].title + '</p>');
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        $('#modal-delete-selected-gf #selected_zero').hide()
                        $('#modal-delete-selected-gf #delete-selected-buttons').show();
                        $('#modal-delete-selected-gf #count-seleted').html(selected);
                    });

                /*End*/

            }
        }

        function open_modal_delete_selected_hp() {
            $('#modal-delete-selected-hp #delete-selected-body-information').html("");
            $("#modal-delete-selected-hp").modal('show');
            var selected = $('input[name="id_hp[]"]:checked').length;

            if (selected < 1) {
                $('#modal-delete-selected-hp #selected_zero').show()
                $('#modal-delete-selected-hp #delete-selected-buttons').hide()
            } else {
                /*get seleccted users details*/
                $.ajax({
                    url: base_url + '/admin/cloud_hosting/get_details_hp',
                    type: 'POST',
                    data: $("#delete_hosting_plans").serialize()
                })
                    .done(function (response) {
                        console.log(response);
                        for (var i = 0; i < response.length; i++) {
                            $('#modal-delete-selected-hp  #delete-selected-body-information').prepend('<p>' +
                                '<strong>#' + response[i].id + '</strong>:<span>' + response[i].plan_name + '</p>');
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        $('#modal-delete-selected-hp  #selected_zero').hide()
                        $('#modal-delete-selected-hp #delete-selected-buttons').show();
                        $('#modal-delete-selected-hp #count-seleted').html(selected);
                    });

                /*End*/

            }
        }

        $(document).on('click', '#delete_bulk', function (event, form_id) {
            var selected = $('input[name="id[]"]:checked').length;


            event.preventDefault();
            if (selected < 1) {
                $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
            } else {

                $('#delete_bulk').attr("disabled", true);
                $.ajax({
                    url: base_url + '/admin/delete_feature_plan',
                    type: 'POST',

                    data: $("#delete_client").serialize(),
                })
                    .done(function () {
                        location.reload();
                    })
                    .fail(function () {
                        $('#modal-delete-selected').modal('hide');
                        alert("Error: no client was selected to delete");
                    })
                    .always(function () {
                        $('#delete_bulk').attr("disabled", false);
                    });
            }

        });
        $(document).on('click', '#delete_bulk_hp', function (event, form_id) {
            var selected = $('input[name="id_hp[]"]:checked').length;


            event.preventDefault();
            if (selected < 1) {
                $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
            } else {

                $('#delete_bulk_hp').attr("disabled", true);
                $.ajax({
                    url: base_url + '/admin/cloud_hosting/delete_hp',
                    type: 'POST',

                    data: $("#delete_hosting_plans").serialize(),
                })
                    .done(function () {
                        location.reload();
                    })
                    .fail(function () {
                        $('#modal-delete-selected').modal('hide');
                        alert("Error: no client was selected to delete");
                    })
                    .always(function () {
                        $('#delete_bulk_hp').attr("disabled", false);
                    });
            }

        })
        $(document).on('click', '#delete_bulk_gf', function (event, form_id) {
            var selected = $('input[name="id_gf[]"]:checked').length;


            event.preventDefault();
            if (selected < 1) {
                $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
            } else {

                $('#delete_bulk_gf').attr("disabled", true);
                $.ajax({
                    url: base_url + '/admin/general_features/delete',
                    type: 'POST',

                    data: $("#delete_general_features").serialize(),
                })
                    .done(function () {
                        location.reload();
                    })
                    .fail(function () {
                        $('#modal-delete-selected').modal('hide');
                        alert("Error: no client was selected to delete");
                    })
                    .always(function () {
                        $('#delete_bulk_gf').attr("disabled", false);
                    });
            }

        });
        $(document).on('click', '#delete_bulk_gf_ssl', function (event, form_id) {
            var selected = $('input[name="id_gf[]"]:checked').length;


            event.preventDefault();
            if (selected < 1) {
                $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
            } else {

                $('#delete_bulk_gf_ssl').attr("disabled", true);
                $.ajax({
                    url: base_url + '/admin/general_features/delete',
                    type: 'POST',

                    data: $("#delete_general_features_ssl").serialize(),
                })
                    .done(function () {
                        location.reload();
                    })
                    .fail(function () {
                        $('#modal-delete-selected').modal('hide');
                        alert("Error: no client was selected to delete");
                    })
                    .always(function () {
                        $('#delete_bulk_gf_ssl').attr("disabled", false);
                    });
                $("#modal-delete-selected-gf").modal('hide');
            }

        });

        function delete_all_plans() {
            $.ajax({
                url: base_url + '/admin/cloud_hosting/delete_all_plans',
                type: 'POST',
                data: {'_token': csrf_token},
            })
                .done(function () {
                    location.reload();
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        }

        $(document).on('click', '#update_so', function (event) {
            var data = [];
            data = '<?php echo json_encode($hosting_plan) ?>';
            var obj = $.parseJSON(data);
            console.log(obj.data);
            sort_order = [];
            for (var i = 0; i < obj.data.length; i++) {
                item = {
                    'id': obj.data[i].id,
                    'sort_order': $('#' + obj.data[i].id).val(),
                };
                sort_order.push(item);
            }
            $.ajax({
                url: page_url + 'update_sort',
                type: 'POST',
                data: {'_token': '<?php echo e(csrf_token()); ?>', 'data': sort_order},
            })
                .done(function () {
                    $('#success_message').show();
                    $('html, body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                    setTimeout(function () {
                        $('#success_message').hide();
                    }, 3000);

                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });


        });
        $('#frm_general_features').submit(function (event) {
            /* Act on the event */
            event.preventDefault();
            $('.red_error').html("");
            $('#frm_general_features_submit').hide();
            $('#frm_general_features_submit_wait').show();
            var formData = new FormData(this)
            $.ajax({
                url: base_url + '/admin/general_features/new',
                type: 'POST',
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false

            })
                .done(function (response) {


                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=general-features";


                })
                .fail(function (response) {
                    $('#frm_general_features_submit_wait').hide();
                    $('#frm_general_features_submit').show();
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        //display the key and value pair
                        //console.log(k + ' is ' + v);
                        $('#gf_' + k).html(v)

                    });
                    /*$('#status').html(validation_errors.status);
                $('#name_line1').html(validation_errors.name_line1);
                $('#name_line2').html(validation_errors.name_line2);
                $('#url').html(validation_errors.url);
                $('#sort_order').html(validation_errors.sort_order);
                $('#enable_plan_button_other').html(validation_errors.enable_plan_button_other);*/
                    $('#error_message').show();
                    $('html body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                })
                .always(function (response) {

                });
        });

        function edit_general_feature(id, ssl_page) {
            if (ssl_page == 1) {
                $('#gf_edit_heading').html('All our plan include Edit');
            } else {
                $('#gf_edit_heading').html('General Feature Edit');
            }
            $('#modal-edit-general-feature').modal('show');
            $.ajax({
                url: base_url + '/admin/general_features/edit/' + id,
            })
                .done(function (response) {
                    $("#modal-edit-general-feature input[name='title']").val(response.title);
                    $("#modal-edit-general-feature input[name='icon']").val(response.icon);
                    $("#gf_description_edit").val(response.description);
                    $("#gf_id_edit").val(response.id);
                    $("#gf_img_edit").attr('src', base_url + "/storage/general_features/icon_images/" + response.icon_image);
                    $("#gf_img_edit_modal").attr('src', base_url + "/storage/general_features/icon_images/" + response.icon_image);
                    if (response.icon_image != "") {
                        $("#gf_img_delete").show();
                    } else {
                        $("#gf_img_delete").hide();
                    }
                    if (response.status == 0) {
                        $('.myCheckbox').attr('checked', false);
                        $('.make-switch').bootstrapSwitch('setState', false);
                    } else {
                        $('.make-switch').bootstrapSwitch('setState', true);
                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        }

        function add_general_feature(ssl_page) {

            if (ssl_page == 1) {
                $('#add_gf_heading').html("All Our Plans Include Feature Add New");
                $('#gf_ssl_page').val(ssl_page);
            } else {
                $('#add_gf_heading').html("Add New General Feature");
                $('#gf_ssl_page').val(0);
            }
            $('#modal-add-general-feature').modal('show');
        }

        $('#frm_general_features_edit_submit').click(function (e) {

            $('#frm_general_features_edit').submit();

        });

        $('#frm_general_features_edit').submit(function (event) {
            event.preventDefault();

            $('.red_error').html("");
            var formData = new FormData(this)
            $.ajax({
                url: base_url + "/admin/general_features/update",
                type: 'POST',
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false

            })
                .done(function (response) {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=general-features";
                })
                .fail(function (response) {
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        //display the key and value pair
                        //console.log(k + ' is ' + v);
                        $('#gf_' + k).html(v)

                    });
                    /*$('#status').html(validation_errors.status);
                $('#name_line1').html(validation_errors.name_line1);
                $('#name_line2').html(validation_errors.name_line2);
                $('#url').html(validation_errors.url);
                $('#sort_order').html(validation_errors.sort_order);
                $('#enable_plan_button_other').html(validation_errors.enable_plan_button_other);*/
                    $('#error_message').show();
                    $('html body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                })
                .always(function (response) {

                });
        });

        $('#frm_general_features_heading').submit(function (event) {
            event.preventDefault();

            $.ajax({
                url: base_url + '/admin/general_features/' + "heading_edit",
                type: 'POST',
                data: $('#frm_general_features_heading').serialize(),
            })
                .done(function () {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=general-features";

                })
                .fail(function (response) {
                    $('#gf_heading').html(response.responseJSON.heading);
                })
                .always(function () {
                    console.log("complete");
                });
        });

        function cancel_content() {
            location.reload();
        }

        /***Email88 Special Features***/
        //$('#frm_email88_features_heading').submit(function(event) {
        //    //alert(base_url + '/admin/email88/' + "heading_edit");
        //    event.preventDefault();
        //    $.ajax({
        //    url: base_url + '/admin/email88/' + "heading_edit",
        //            type: 'GET',
        //            data: $('#frm_email88_features_heading').serialize(),
        //    })
        //    .done(function() {
        //        window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=email88-special-features";
        //    })
        //    .fail(function(response) {
        //        //$('#gf_heading').html(response.responseJSON.heading);
        //    })
        //    .always(function() {
        //        console.log("complete");
        //    });
        //});

        /***Email88 New & Special Features Heading Edit****/
        function save_email88_content() {
            var page = document.getElementsByName('page')[0].value;
            var heading = document.getElementsByName('heading')[0].value;
            var sub_heading = document.getElementsByName('sub_heading')[0].value;
            var content = CKEDITOR.instances.email88_cms_content.getData();
            var heading_status = "";
            $('#email88_heading_status').on('change', function () {
                this.value = this.checked ? 1 : 0;
                heading_status = this.value;
            }).change();
            var data = [];
            data = {
                '_token': '<?php echo e(csrf_token()); ?>',
                'page': '<?php echo e($page_name); ?>',
                'page': page,
                'heading': heading,
                'sub_heading': sub_heading,
                'content': content,
                'status': heading_status
            };
            $.ajax({
                url: base_url + '/admin/email88/' + "heading_edit",
                type: 'POST',
                data: data,
            })
                .done(function () {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=email88-special-features";
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        /******End*****/
        /****Add New - Email88 New & Special Features Listing *****/
        $('#frm_email88_special_features').submit(function (event) {
            event.preventDefault();
            $('.red_error').html("");
            $('#frm_email88_special_features_submit').hide();
            $('#frm_email88_special_features_submit_wait').show();
            var formData = new FormData(this)
            formData.append('description', CKEDITOR.instances['email88_add_cms_content'].getData());
            $.ajax({
                url: base_url + '/admin/email88/new',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false
            })
                .done(function (response) {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=email88-special-features";
                })
                .fail(function (response) {
                    $('#frm_email88_special_features_submit_wait').hide();
                    $('#frm_email88_special_features_submit').show();
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        $('#gf_' + k).html(v)
                    });
                    $('#error_message').show();
                    $('html body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                })
                .always(function (response) {
                });
        });

        /***** End *****/
        /*** Edit - Email88 New & Special Features Listing ***/
        function edit_email88_special_feature(id, ssl_page) {
            if (ssl_page == 1) {
                $('#email88_edit_heading').html('All our plan include Edit');
            } else {
                $('#email88_edit_heading').html('New & Special Feature Edit');
            }
            $('#modal-edit-email88-special-feature').modal('show');
            $.ajax({
                url: base_url + '/admin/email88/edit/' + id,
            })
                .done(function (response) {
                    console.log(response);
                    $("#modal-edit-email88-special-feature input[name='title']").val(response.title);
                    $("#modal-edit-email88-special-feature input[name='icon']").val(response.icon);
                    $("#modal-edit-email88-special-feature input[name='status']").val(response.status);
                    $("#email88_description_edit").val(response.description);
                    CKEDITOR.instances['email88_description_edit'].setData(response.description);
                    $("#email88_id_edit").val(response.id);
                    //$("#email88_img_edit").attr('src',base_url+"/storage/general_features/"+response.icon_image);
                    var strarray = response.icon_image.split(',');
                    //alert($('#email88_img_edit').find('img').length);
                    if ($('#email88_img_edit').find('img').length == 0) {
                        for (var i = 0; i < strarray.length; i++) {
                            //$("#email88_img_edit"+i).attr('src',base_url+"/storage/general_features/"+strarray[i]);
                            $("#email88_img_edit").append("<img class='img-responsive' src='" + base_url + "/storage/general_features/" + strarray[i] + "' /><br/>");
                        }
                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        }

        $('#frm_email88_special_features_edit_submit').click(function (e) {

            $('#frm_email88_special_features_edit').submit();

        });

        $('#frm_email88_special_features_edit').submit(function (event) {
            event.preventDefault();

            $('.red_error').html("");
            var formData = new FormData(this)
            formData.append('description', CKEDITOR.instances['email88_description_edit'].getData());
            $.ajax({
                url: base_url + "/admin/email88/update",
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false
            })
                .done(function (response) {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=email88-special-features";
                })
                .fail(function (response) {
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        $('#email88_' + k).html(v)
                    });
                    $('#error_message').show();
                    $('html body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                })
                .always(function (response) {

                });
        });

        /***End****/

        /****Delete Single ****/
        function delete_email88_single(id) {
            $('#email88_delete_single_button').attr("disabled", true);
            $.ajax({
                url: base_url + '/admin/email88/delete',
                type: 'POST',

                data: {'_token': csrf_token, 'id_email88': id}
            })
                .done(function () {
                    location.reload();
                })
                .fail(function () {
                    alert("some error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        /****End*****/

        /***Delete -Multiple delete ***/
        function email88_open_modal_delete_selected(ssl_page) {
            if (ssl_page == 1) {
                var data = $("#delete_email88_features_ssl").serialize();
                $('#delete_bulk_email88_ssl').show();
                $('#delete_bulk_email88').hide();
            } else {
                $('#delete_bulk_email88_ssl').hide();
                $('#delete_bulk_email88').show();
                var data = $("#delete_email88_features").serialize();
            }
            $('#modal-delete-selected-email88 #delete-selected-body-information').html("");
            $("#modal-delete-selected-email88").modal('show');
            var selected = $('input[name="id_email88[]"]:checked').length;
            if (selected < 1) {
                $('#modal-delete-selected-email88 #selected_zero').show()
                $('#modal-delete-selected-email88 #delete-selected-buttons').hide()
            } else {
                /*get seleccted users details*/
                $.ajax({
                    url: base_url + '/admin/email88/get_details',
                    type: 'POST',
                    data: data
                })
                    .done(function (response) {
                        console.log(response);
                        for (var i = 0; i < response.length; i++) {
                            $('#modal-delete-selected-email88 #delete-selected-body-information').prepend('<p>' +
                                '<strong>#' + response[i].id + '</strong>:<span>' + response[i].title + '</p>');
                        }
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        $('#modal-delete-selected-email88 #selected_zero').hide()
                        $('#modal-delete-selected-email88 #delete-selected-buttons').show();
                        $('#modal-delete-selected-email88 #count-seleted').html(selected);
                    });

                /*End*/

            }
        }

        /****End***/

        /***End of Email88 Special Features***/

        /***Web88ir Plans***/
        /***Web88ir Features Heading Edit****/
        function save_web88ir_content() {
            var page = document.getElementsByName('page')[0].value;
            var heading = document.getElementsByName('heading')[0].value;
            var sub_heading = document.getElementsByName('sub_heading')[0].value;
            var content = CKEDITOR.instances.web88ir_cms_content.getData();
            var heading_status = "";
            $('#web88ir_heading_status').on('change', function () {
                this.value = this.checked ? 1 : 0;
                heading_status = this.value;
            }).change();
            var data = [];
            data = {
                '_token': '<?php echo e(csrf_token()); ?>',
                'page': '<?php echo e($page_name); ?>',
                'page': page,
                'heading': heading,
                'sub_heading': sub_heading,
                'content': content,
                'status': heading_status
            };
            $.ajax({
                url: base_url + '/admin/web88ir/' + "heading_edit",
                type: 'POST',
                data: data,
            })
                .done(function () {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=web88ir-special-features";
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        /******End*****/
        /****Add New - Web88ir New & Special Features Listing *****/
        $('#frm_web88ir_special_features').submit(function (event) {
            event.preventDefault();
            $('.red_error').html("");
            $('#frm_web88ir_special_features_submit').hide();
            $('#frm_web88ir_special_features_submit_wait').show();
            var formData = new FormData(this)
            formData.append('description', CKEDITOR.instances['web88ir_add_cms_content'].getData());
            $.ajax({
                url: base_url + '/admin/web88ir/new',
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false
            })
                .done(function (response) {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=web88ir-special-features";
                })
                .fail(function (response) {
                    $('#frm_web88ir_special_features_submit_wait').hide();
                    $('#frm_web88ir_special_features_submit').show();
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        $('#gf_' + k).html(v)
                    });
                    $('#error_message').show();
                    $('html body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                })
                .always(function (response) {
                });
        });

        /***** End *****/
        /*** Edit - Web88ir New & Special Features Listing ***/
        function edit_web88ir_special_feature(id, ssl_page) {
            if (ssl_page == 1) {
                $('#web88ir_edit_heading').html('All our plan include Edit');
            } else {
                $('#web88ir_edit_heading').html('New & Special Feature Edit');
            }
            $('#modal-edit-web88ir-special-feature').modal('show');
            $.ajax({
                url: base_url + '/admin/web88ir/edit/' + id,
            })
                .done(function (response) {
                    $("#modal-edit-web88ir-special-feature input[name='title']").val(response.title);
                    $("#modal-edit-web88ir-special-feature input[name='icon']").val(response.icon);
                    $("#modal-edit-web88ir-special-feature input[name='status']").val(response.status);
                    $("#web88ir_description_edit").val(response.description);
                    CKEDITOR.instances['web88ir_description_edit'].setData(response.description);
                    $("#web88ir_id_edit").val(response.id);
                    //$("#email88_img_edit").attr('src',base_url+"/storage/general_features/"+response.icon_image);
                    var strarray = response.icon_image.split(',');
                    //alert($('#email88_img_edit').find('img').length);
                    if ($('#web88ir_img_edit').find('img').length == 0) {
                        for (var i = 0; i < strarray.length; i++) {
                            //$("#email88_img_edit"+i).attr('src',base_url+"/storage/general_features/"+strarray[i]);
                            $("#web88ir_img_edit").append("<img class='img-responsive' src='" + base_url + "/storage/general_features/" + strarray[i] + "' /><br/>");
                        }
                    }
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });

        }

        $('#frm_web88ir_special_features_edit_submit').click(function (e) {

            $('#frm_web88ir_special_features_edit').submit();

        });

        $('#frm_web88ir_special_features_edit').submit(function (event) {
            event.preventDefault();

            $('.red_error').html("");
            var formData = new FormData(this)
            formData.append('description', CKEDITOR.instances['web88ir_description_edit'].getData());
            $.ajax({
                url: base_url + "/admin/web88ir/update",
                type: 'POST',
                data: formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false
            })
                .done(function (response) {
                    window.location.href = page_url + "<?php echo e($page_slug); ?>?tab=web88ir-special-features";
                })
                .fail(function (response) {
                    validation_errors = response.responseJSON;
                    console.log(validation_errors);
                    $.each(validation_errors, function (k, v) {
                        $('#web88ir_' + k).html(v)
                    });
                    $('#error_message').show();
                    $('html body').animate({
                        scrollTop: $(".page-content").offset().top
                    }, 700);
                })
                .always(function (response) {

                });
        });

        /***End****/

        /****Delete Single ****/
        function delete_web88ir_single(id) {
            $('#web88ir_delete_single_button').attr("disabled", true);
            $.ajax({
                url: base_url + '/admin/web88ir/delete',
                type: 'POST',

                data: {'_token': csrf_token, 'id_web88ir': id}
            })
                .done(function () {
                    location.reload();
                })
                .fail(function () {
                    alert("some error");
                })
                .always(function () {
                    console.log("complete");
                });
        }

        /****End*****/

        /***Delete -Multiple delete ***/
        function web88ir_open_modal_delete_selected(ssl_page, e = null) {
            if (ssl_page == 1) {
                var data = $("#delete_web88ir_features_ssl").serialize();
                $('#delete_bulk_web88ir_ssl').show();
                $('#delete_bulk_web88ir').hide();
            } else {
                $('#delete_bulk_web88ir_ssl').hide();
                $('#delete_bulk_web88ir').show();
                var data = $("#delete_web88ir_features").serialize();
            }
            var count;
            if (null !== e) {
                var target = e.target;
                count = $(e.target).attr('data-count');
            }
            $('#modal-delete-selected-web88ir #delete-selected-body-information').html("");
            $("#modal-delete-selected-web88ir").modal('show');
            var selected = $('input[name="id_web88ir[]"]:checked').length;
            if (selected < 1) {
                $('#modal-delete-selected-web88ir #selected_zero').show()
                $('#modal-delete-selected-web88ir #delete-selected-buttons').hide()
            } else {
                /*get seleccted users details*/
                if ("<?php echo e((strpos(url()->current(),'email88') !== false)?'email88':''); ?>" === "email88") {
                    $.ajax({
                        url: base_url + '/admin/web88ir/get_details',
                        type: 'POST',
                        data: data
                    })
                        .done(function (response) {
                            console.log(response);
                            for (var i = 0; i < response.length; i++) {
                                $('#modal-delete-selected-web88ir #delete-selected-body-information').prepend('<p>' +
                                    '<strong>#' + (count ? count : response[i].id) + '</strong>:<span>' + response[i].title + '</p>');

                            }
                        })
                        .fail(function () {
                            console.log("error");
                        })
                        .always(function () {
                            $('#modal-delete-selected-web88ir #selected_zero').hide()
                            $('#modal-delete-selected-web88ir #delete-selected-buttons').show();
                            $('#modal-delete-selected-web88ir #count-seleted').html(selected);
                        });

                    /*End*/
                } else {
                    $('#modal-delete-selected-web88ir #selected_zero').hide()
                    $('#modal-delete-selected-web88ir #delete-selected-buttons').show();
                    $('#modal-delete-selected-web88ir #count-seleted').html(selected);
                }
            }
        }

        /****End***/

        /***End of Web88ir Plans***/

        /*FAQ code*/

        $('#frm_faq').submit(function (event) {
            event.preventDefault();
            console.log($('#frm_faq').serializeArray());
            var content = CKEDITOR.instances.faq_content.getData();
            $('#faq_content_input').val(content);
            $.ajax({
                url: base_url + '/admin/services/new_faq',
                type: 'POST',
                data: $('#frm_faq').serialize(),
            })
                .done(function () {
                    window.location.href = base_url + '/admin/services/<?php echo e($page_slug); ?>?tab=faq';
                })
                .fail(function (response) {
                    console.log("error");
                    validation_errors = response.responseJSON;
                    $.each(validation_errors, function (k, v) {
                        //display the key and value pair
                        //console.log(k + ' is ' + v);
                        $('#err_off_services_' + k).html(v)

                    });
                })
                .always(function () {
                    console.log("complete");
                });

        });

        function delete_faq(id) {
            if (id > 0) {
                $.ajax({
                    url: base_url + '/admin/services/delete_faq',
                    type: 'POST',
                    data: {'_token': csrf_token, 'id': id},
                })
                    .done(function () {
                        window.location.href = base_url + '/admin/services/<?php echo e($page_slug); ?>?tab=faq';
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        console.log("complete");
                    });

            }
        }

        function store_faq(id) {
            if (id > 0) {
                $.ajax({
                    url: base_url + '/admin/services/get_faq',
                    type: 'POST',
                    data: {'_token': csrf_token, 'id': id},
                })
                    .done(function (response) {
                        $('#frm_faq input[name=title]').val(response.title);
                        $('#frm_faq input[name=id]').val(response.id);
                        $('#frm_faq input[name=page]').val(response.page);
                        $('#faq_content').html(response.content);
                        //window.location.href=base_url+'/admin/service/<?php echo e($page_slug); ?>?tab=faq';
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function () {
                        console.log("complete");
                    });

            }
            else {
                $('#frm_services input[name=title]').val("");
                $('#frm_services input[name=id]').val("0");
                $('#frm_services input[name=display_order]').val("");
                $('#service_content').html("");
            }
            $('#modal-add-faq').modal('show');
        }

        /*end FAQ code*/
        function check_all(section) {
            var radio_btn = $("#" + section);
            if (radio_btn.prop("checked") == true) {
                $("." + section).each(function () {
                    this.checked = true;
                })
            } else {
                $("." + section).each(function () {
                    this.checked = false;
                })
            }
        }

        $('.delete-selected-web88ir').click(() => {
            var data = [];
            $('input[name="id_web88ir[]"]:checked').each((index, node) => {
                data.push(node.value);
            });
            $.ajax({
                url: base_url + '/admin/web88ir/delete',
                type: 'POST',
                data: {'_token': csrf_token, 'id_web88ir': data},
            }).done(() => {
                window.location.reload();
            })
        })

    </script>
    <?php if(isset($_GET['tab'])): ?>
        <?php $tab_name = $_GET['tab'];?>
        <script>
            $('.nav-tabs a[href="#' + '<?php echo e($tab_name); ?>' + '"]').tab('show');
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>