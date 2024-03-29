<?php
$page = 'categories';
$breadcrumbs = [
    array('url' => false, 'name' => 'Services'),
    array('url' => url('admin/categories'), 'name' => 'All Categories -Listing'),
];
?>
<style type="text/css">
    .has-switch{
        height: 35px !important;
    }
    .dd-handle{
        cursor: move !important;
    }
    .dd-nodrag{
        cursor: pointer !important;
    }
    .home_dd{
        font-size: 17px;
        display: block;
        height: 30px;
        margin: 5px 0;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #ccc;
        background: #fafafa;
        box-sizing: border-box
    }
    .datepicker table tr td.active:hover, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active:active, .datepicker table tr td.active:hover:active, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.active, .datepicker table tr td.active:hover.active, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled:hover.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active:hover.disabled, .datepicker table tr td.active.disabled.disabled, .datepicker table tr td.active.disabled:hover.disabled, .datepicker table tr td.active[disabled], .datepicker table tr td.active:hover[disabled], .datepicker table tr td.active.disabled[disabled], .datepicker table tr td.active.disabled:hover[disabled] {
        background-color: #b8312f !important;
    }
</style>

<?php $__env->startSection('title','Admin | Categories'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Services'); ?>
<style>
    .fa {
        display: inline;
    }
</style>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h2>All Categories <i class="fa fa-angle-right"></i> Listing</h2>
            <div class="clearfix"></div>
            <?php echo $__env->make('admin.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="pull-left"> Last updated: <span class="text-blue"><?php echo e($recent_update); ?></span> </div>
            <div class="clearfix"></div>
            <p></p>


            <div class="clearfix"></div>
        </div>
        <!-- end col-lg-12 -->


        <div class="col-lg-12">
            <div class="portlet">
                <div class="portlet-header">
                    <div class="caption">Categories Listing</div>
                    <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                    <div class="text-blue text-15px" style="line-height: 150%">You can drag and drop the categories. To add a new category/sub category, please click the "Duplicate" icon to edit it. Then drag and drop the position according to your preference. Add/upload/edit "Menu Image" is only applicable for the second level of the category, eg. Cloud Hosting, Co-location Hosting etc...</div>

                    note to programmer: pls make the menu drag and drop its position.
                    <div class="sm-margin"></div>
                    <div id="nestable" class="dd">
                        <ol class="dd-list">
                            <li class="home_dd">
                                <div class="">
                                    Home
                                    <span class="label label-sm label-success"><?php echo e('Active'); ?></span>


                                    <div class="pull-right ">
                                        <a href="<?php echo e(url('admin/index-plan')); ?>" data-hover="tooltip" data-placement="top" title="Add Plan &amp; Page Edit"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a>
                                    </div>
                                </div>

                            </li>
                            <?php if(!empty($categories)): ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php if($i->title=='Home'): ?>

                            <?php else: ?>
                            <li data-id="<?php echo e($i->id); ?>" class="dd-item">

                                <div class="dd-handle"> <?php echo e($i->title); ?>

                                    <span class="label label-sm label-<?php echo e($i->status?'success':'danger'); ?>"><?php echo e($i->status?'Active':'Inactive'); ?></span>


                                    <div class="pull-right dd-nodrag">
                                        <a href="javascript:void" onclick="duplicate(<?php echo e($i->id); ?>)" data-hover="tooltip" data-placement="top" title="Duplicate/New Category"><span class="label label-sm label-blue"><i class="fa fa-copy"></i></span></a>
                                        <a href="#" data-hover="tooltip" data-placement="top"  data-target="#modal-edit-<?php echo e($i->id); ?>" data-toggle="modal" title="Edit" onclick="editmodal()"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                        <!-- <a href="<?php echo e(url('admin/index-plan')); ?>" data-hover="tooltip" data-placement="top" title="Add Plan &amp; Page Edit"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a> -->
                                        <a class="<?php if(strtolower($i->title)=='ssl certificates'): ?> hidden <?php endif; ?>" href="javascript:void" onclick="upload_category_images(<?php echo e($i->id); ?>)"  title="Upload Menu Image"><span class="label label-sm label-dark"><i class="fa fa-image"></i></span></a>
                                        <a  class="<?php if(strtolower($i->title)!='ssl certificates'): ?> hidden <?php endif; ?>" href="<?php echo e(url('admin/services/'.$i->slug)); ?>" data-hover="tooltip" data-placement="top" title="<?php echo e($i->title); ?> Page Edit"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a>
                                        <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-<?php echo e($i->id); ?>" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                                                        </div>
                                </div>

                                <?php if($i->sub_categories): ?>
                                <ol class="dd-list">
                                    <?php $__currentLoopData = $i->sub_categories->sortBy('sort_order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <li data-id="<?php echo e($j->id); ?>" class="dd-item">
                                        <div class="dd-handle"><?php echo e($j->title); ?>

                                            <span class="label label-sm label-<?php echo e($j->status?'success':'danger'); ?>"><?php echo e($j->status?'Active':'Inactive'); ?></span>

                                            <div class="pull-right dd-nodrag">
                                                <a href="javascript:void" onclick="duplicate(<?php echo e($j->id); ?>)" data-hover="tooltip" data-placement="top" title="Duplicate/New Category"><span class="label label-sm label-blue"><i class="fa fa-copy"></i></span></a>
                                                <a href="javascript:void" data-hover="tooltip" data-placement="top"  data-target="#modal-edit-<?php echo e($j->id); ?>" data-toggle="modal" onclick="editmodal()" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                                <a href="<?php echo e(url('admin/services/'.$j->slug)); ?>" data-hover="tooltip" data-placement="top" title="<?php echo e($j->title); ?> Page Edit"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a>

                                                <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-<?php echo e($j->id); ?>" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                                                        </div>
                                        </div>

                                    </li>
                                    <div id="modal-delete-<?php echo e($j->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php echo e($j->title); ?></p>
                                                    <div class="form-actions">
                                                        <div class="col-md-offset-4 col-md-8"> <button onclick="delete_single(<?php echo e($j->id); ?>)" class="btn_delete btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="modal-edit-<?php echo e($j->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label3" class="modal-title">Edit Sub Category</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form id="sub_cat_<?php echo e($j->id); ?>" class="sub_edit_form form-horizontal">
                                                            <input type="hidden" id="edit_id" name="id">
                                                            <?php echo csrf_field(); ?>

                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-6">
                                                                    <div data-on="success" style="    height: 35px;" data-off="primary" class="make-switch">
                                                                        <input  name="status" type="checkbox" <?php if($j->status): ?>checked="checked" <?php endif; ?>/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Category <span class="text-red">*</span></label>
                                                                <div class="col-md-6">
                                                                    <input name="title" type="text" class="form-control" placeholder="eg. RAM" value="<?php echo e($j->title); ?>">
                                                                    <p id="<?php echo e($j->id); ?>_error_edit_title" class="red_error"></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Short Description<span class="text-red">*</span></label>
                                                                <div class="col-md-6">
                                                                    <input name="description" type="text" class="form-control" placeholder="eg. RAM" value="<?php echo e($j->description); ?>">
                                                                    <p id="<?php echo e($j->id); ?>_error_edit_description" class="red_error"></p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Insert CSS icon <span class="text-red">*</span></label>
                                                                <div class="col-md-6">
                                                                    <input name="icon" type="text" class="form-control" placeholder="eg. RAM" value="<?php echo e($j->icon); ?>">
                                                                    <p id="<?php echo e($j->id); ?>_error_edit_icon" class="red_error"></p>
                                                                    <p>Please refer here for complete <a target="_blank" href="http://sale.webqom.com/admin/icons">icon options.</a><p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" style="display:none;">
                                                                <label class="col-md-3 control-label"><strong>Page Selection </strong><span class="text-red"></span></label>
                                                            </div>

                                                            <div class="form-group" style="display:none;" >
                                                                <label class="col-md-6 control-label">SSL Certificates Page<span class="text-red">*</span></label>
                                                                <div class="col-md-6">
                                                                    <input <?php if($j->is_ssl_page==1): ?> checked="checked" <?php endif; ?> name="is_ssl_page" type="checkbox" placeholder="eg. RAM" value="1" class="page_type">
                                                                </div>
                                                            </div>
                                                            <div class="form-group" style="display:none;" >
                                                                <label class="col-md-6 control-label">Ecomerce Page<span class="text-red">*</span></label>
                                                                <div class="col-md-6">
                                                                    <input <?php if($j->is_ecomerce_page==1): ?> checked="checked" <?php endif; ?> name="is_ecomerce_page" type="checkbox" placeholder="eg. RAM" value="1" class="page_type">
                                                                </div>
                                                            </div>

                                                            <div class="form-actions">
                                                                <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" onclick="update_sub_cat(<?php echo e($j->id); ?>)" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </ol>
                                <?php endif; ?>
                            </li>
                            <?php endif; ?>
                            <div id="modal-edit-<?php echo e($i->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                            <h4 id="modal-login-label3" class="modal-title">Edit Category</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form">
                                                <form id="sub_cat_<?php echo e($i->id); ?>" class="sub_edit_form form-horizontal">
                                                    <input type="hidden" id="edit_id" name="id">
                                                    <?php echo csrf_field(); ?>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Status</label>
                                                        <div class="col-md-6">
                                                            <div data-on="success" style="    height: 35px;" data-off="primary" class="make-switch">
                                                                <input  name="status" type="checkbox" <?php if($i->status): ?>checked="checked" <?php endif; ?>/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Category <span class="text-red">*</span></label>
                                                        <div class="col-md-6">
                                                            <input name="title" type="text" class="form-control" placeholder="eg. RAM" value="<?php echo e($i->title); ?>">
                                                            <p id="<?php echo e($i->id); ?>_error_edit_title" class="red_error"></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                    <label class="col-md-3 control-label">Short Description<span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                        <input name="description" type="text" class="form-control" placeholder="eg. RAM" value="<?php echo e($i->description); ?>">
                                                        <p id="<?php echo e($i->id); ?>_error_edit_description" class="red_error"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Insert CSS icon <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                        <input name="icon" type="text" class="form-control" placeholder="eg. RAM" value="<?php echo e($i->icon); ?>">
                                                        <p id="<?php echo e($i->id); ?>_error_edit_icon" class="red_error"></p>
                                                    </div>
                                                </div>
                                                    <div class="form-actions">
                                                        <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" onclick="update_sub_cat(<?php echo e($i->id); ?>)" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                        </ol>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- end portlet body -->
            </div>
            <!-- end porlet -->
        </div>
        <!-- end col-lg-12 -->
    </div>
    <!-- end row -->
</div>
<div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the ssselected <span id="count-seleted"></span> item(s)? </h4>
            </div>
            <div class="modal-body" id="delete-selected-body">
                <div id="delete-selected-body-information"></div>
                <p id="selected_zero" style="display:none" class="alert alert-danger">Please select aleast one item for delete</p>
                <div class="form-actions" id="delete-selected-buttons">
                    <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal delete selected items end -->

<div id="modal-upload-image" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog modal-wide-width " id="modal-upload-image-body">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label3" class="modal-title">Upload Menu Image(s) <i class="loading_icon fa fa-spinner fa-spin fa-large"></i></h4>
            </div>
            <div class="modal-body">
                <div id="msg_error" class="alert alert-danger alert-dismissable">
                    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                    <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                    <p>The information has not been saved/updated. Please correct the errors.</p>
                </div>
                <div class="form">
                    <form class="form-horizontal" id="upload_image_form" enctype="multipart/form-data" method="POST" action="/admin/categories/upload_images">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" id="upload_category_id" name="category_id">
                        <div id="upload_section">

                        </div>
                        <div class="form-group">
                            <label class="col-md-3"></label>
                            <div class="col-md-6">
                                <a href="javascript:void" class="btn-sm btn-success" onclick="add_more_images()">Add More Image &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                            </div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-actions">
                            <div class="col-md-offset-5 col-md-8"> <button  class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a id="modal-upload-image-cancelbtn" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="upload_content_section" hidden="">
    <div id="upload_container_1">

        <div id="statusdiv" class="form-group">
            <label class="col-md-3 control-label">Status</label>
            <div class="col-md-6">
                <div data-on="success" data-off="primary" class="make-switch-id" onclick="changemyclass()">
                    <input name="upload_status[]" class="imgstatus" type="checkbox" checked="checked"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Upload Menu Image <span class="text-red">*</span></label>
            <div class="col-md-9">
                <div class="text-15px margin-top-10px"> <img width="80px" src="../images/menu/img_hosting1.jpg" alt="" class="upload_images img-responsive"><br/>
                    <a href="javascript:void" class="delete_image_button" data-hover="tooltip"  data-placement="top" title="Delete" ></a>
                    <div class="xs-margin"></div>
                    <input id="exampleInputFile2" name="upload_images[]"  class="upload_images_browse" type="file"/>
                    <br/>
                    <span class="help-block">(Image dimension: 663 x 464 pixels, JPEG, GIF, PNG only, Max. 1MB) </span> </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Image Alt Text</label>
            <div class="col-md-6">
                <input type="text"  name="upload_alt_text[]"  class="upload_alt_text form-control" placeholder="" >
                <input type="hidden"  name="id[]"  class="id form-control" placeholder="" >
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Start Date to End Date</label>
            <div class="col-md-6">
                <div class="input-group input-daterange">
                    <input type="text" name="upload_start_date[]" class="upload_start_date form-control" placeholder="mm/dd/yyyy"/>
                    <span class="input-group-addon">to</span>
                    <input type="text" name="upload_end_date[]" class="upload_end_date form-control" placeholder="mm/dd/yyyy"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Display Order <span class="text-red">*</span></label>
            <div class="col-md-2">
                <input type="text" name="upload_display_order[]"  class="upload_display_order form-control" placeholder="" value="1">
            </div>
            <div class="col-md-9 pull-right"> <span class="help-block">Display order is to determine the item appearing sequence in the website.</span> </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Upload Enlarge Banner or</label>
            <div class="col-md-9">
                <p class="text-blue margin-top-10px border-bottom">Please choose <strong>ONE</strong> of the following options when clicking on the banner for enlarge/detailed view.</p>
                <div class="text-15px margin-top-10px"> <img width="80px" src="../images/menu/img_hosting1.jpg" alt="Cyber Monday" class="upload_banner img-responsive"><br/>
                    <a href="javascript:void" data-hover="tooltip" class="delete_baner_button" data-placement="top" title="Delete" ><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>


                    <!-- modal delete end -->
                    <div class="xs-margin"></div>
                    <input id="exampleInputFile2" class="upload_images_browse"  name="upload_banner[]"  type="file"/>
                    <br/>
                    <span class="help-block">(JPEG/GIF/PNG only, Max. 2MB) </span> </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Upload PDF or</label>
            <div class="col-md-9">
                <div class="margin-top-5px"></div>
                <a href="filename.pdf" class="pdf_path" target="_blank">filename.pdf</a><br/>
                <a href="javascript:void" data-hover="tooltip" data-placement="top" title="Delete" class="delete_pdf_button"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>

                <div id="modal-delete-pdf" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this PDF? </h4>
                            </div>
                            <div class="modal-body">
                                <p>filename.pdf</p>
                                <div class="form-actions">
                                    <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal delete end -->
                <div class="xs-margin"></div>
                <div class="text-15px margin-top-10px">
                    <input id="exampleInputFile2" class="upload_pdf_browse"  name="upload_pdf[]"  type="file"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Website URL</label>
            <div class="col-md-6">
                <div class="input-icon"><i class="fa fa-link"></i>
                    <input type="text"  name="upload_web_url[]"  placeholder="http://" class="form-control" value="http://www.webqom.com"/>
                    <span class="help-block">Please enter the page link to link it to the sub page.</span> </div>
            </div>
        </div>



        <div class="clearfix border-bottom"></div>
        <div class="xs-margin"></div>
    </div>
</div>

<div id="modal-delete-file" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this <span id="delete_label"></span>? </h4>
                <span hidden="" id="category_image_id"></span>
                <span hidden="" id="category_image_type"></span>
            </div>
            <div class="modal-body">
                <div class="form-actions">
                    <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_category_img_post()" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a  data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="makesw_response"></div>
<?php $URL = url(''); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
<link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/jquery-nestable/nestable.css">
<script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/ckeditor/ckeditor.js"></script>
<script src="<?php echo e(url('').'/resources/assets/admin/'); ?>js/ui-tabs-accordions-navs.js"></script>
<script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/jquery-nestable/jquery.nestable.js"></script>
<script src="<?php echo e(url('').'/resources/assets/admin/'); ?>js/ui-nestable-list.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/bootstrap-datepicker/css/datepicker.css">
<script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- webqom frontend style css -->

<link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/shortcodes.css">

<script type="text/javascript">
                                                    //$('.make-switch').bootstrapSwitch();
                                                    $(document).on('click', '#save_feature_plan', function(event) {
                                            $('#plan_feature_frm').submit();
                                            });
                                                    $(document).on('submit', '#plan_feature_frm', function(event) {
                                            event.preventDefault();
                                                    $.ajax({
                                                    url: base_url + '/admin/plan_features/new',
                                                            type: 'POST',
                                                            data: $('#plan_feature_frm').serialize(),
                                                    })
                                                    .done(function() {
                                                    location.reload();
                                                    })
                                                    .fail(function(response) {
                                                    validation_errors = response.responseJSON;
                                                            console.log(validation_errors);
                                                            $.each(validation_errors, function(k, v) {
                                                            //display the key and value pair
                                                            //console.log(k + ' is ' + v);
                                                            $('#' + k).html(v)

                                                            });
                                                    })
                                                    .always(function() {
                                                    console.log("complete");
                                                    });
                                            });
                                                    $('.sub_edit_form').submit(function(e){
                                            e.preventDefault();
                                            });
                                                    function update_sub_cat(id) {
                                                    $.ajax({
                                                    url: base_url + '/admin/categories/' + id,
                                                            type: 'PATCH',
                                                            data: $('#sub_cat_' + id).serialize(),
                                                    })
                                                            .done(function() {
                                                            location.reload();
                                                            })
                                                            .fail(function(response) {
                                                            validation_errors = response.responseJSON;
                                                                    console.log(validation_errors);
                                                                    $.each(validation_errors, function(k, v) {
                                                                    //display the key and value pair
                                                                    //console.log(k + ' is ' + v);
                                                                    $('#' + id + '_error_edit_' + k).html(v)

                                                                    });
                                                            })
                                                            .always(function() {
                                                            console.log("complete");
                                                            });
                                                    }
                                            function save_content(publish) {
                                            /*var left_header = CKEDITOR.instances.left_header.getData();
                                             var right_header = CKEDITOR.instances.right_header.getData();
                                             */var left_content = CKEDITOR.instances.left_content.getData();
                                                    var right_content = CKEDITOR.instances.right_content.getData();
                                                    //var left_content = CKEDITOR.instances.cms_section.getData();
                                                    console.log(left_content)
                                                    $.ajax({
                                                    url: base_url + '/admin/pages/new',
                                                            type: 'POST',
                                                            data: {'_token':'<?php echo e(csrf_token()); ?>',
                                                                    'name':'cloud hosting',
                                                                    'left_content':left_content,
                                                                    'right_content':right_content,
                                                                    'publish':0,
                                                            },
                                                    })
                                                    .done(function(response) {
                                                    $('#success_message_cms').show();
                                                            setTimeout(function() {
                                                            $('#success_message_cms').hide();
                                                            }, 3000);
                                                    })
                                                    .fail(function() {
                                                    console.log("error");
                                                    })
                                                    .always(function() {
                                                    console.log("complete");
                                                    });
                                            }
                                            function delete_single(id) {
                                            $('.btn_delete').attr('disabled', true);
                                                    $('#delete_single_button').attr("disabled", true);
                                                    $.ajax({
                                                    url: base_url + '/admin/categories/' + id,
                                                            type: 'DELETE',
                                                            data: {'_token':csrf_token, 'id':id}
                                                    })
                                                    .done(function() {
                                                    location.reload();
                                                    })
                                                    .fail(function() {
                                                    alert("some error");
                                                    })
                                                    .always(function() {
                                                    console.log("complete");
                                                    });
                                            }
                                            function open_modal_delete_selected() {
                                            $('#delete-selected-body-information').html("");
                                                    $("#modal-delete-selected").modal('show');
                                                    var selected = $('input[name="id[]"]:checked').length;
                                                    if (selected < 1) {
                                            $('#selected_zero').show()
                                                    $('#delete-selected-buttons').hide()
                                            } else{
                                            /*get seleccted users details*/
                                            $.ajax({
                                            url: base_url + '/admin/plan_features/get_details',
                                                    type: 'POST',
                                                    data: $("#delete_client").serialize()
                                            })
                                                    .done(function(response) {
                                                    console.log(response);
                                                            for (var i = 0; i < response.length; i++) {
                                                    $('#delete-selected-body-information').prepend('<p>' +
                                                            '<strong>#' + response[i].id + '</strong>:<span>' + response[i].title + '</p>');
                                                    }
                                                    })
                                                    .fail(function() {
                                                    console.log("error");
                                                    })
                                                    .always(function() {
                                                    $('#selected_zero').hide()
                                                            $('#delete-selected-buttons').show();
                                                            $('#count-seleted').html(selected);
                                                    });
                                                    /*End*/

                                            }
                                            }
                                            $(function () {
                                            var updateOutput = function (e) {
                                            var list = e.length ? e : $(e.target),
                                                    output = list.data('output');
                                                    if (window.JSON) {
                                            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
                                            } else {
                                            output.val('JSON browser support required for this demo.');
                                            }
                                            };
                                                    // activate Nestable for list 2
                                                    $('#nestable2').nestable({
                                            group: 1
                                            }).on('change', updateOutput);
                                                    // output initial serialised data
                                                    //updateOutput($('#nestable').data('output', $('#nestable-output')));
                                                    //updateOutput($('#nestable2').data('output', $('#nestable2-output')));

                                                    $('#nestable-menu').on('click', function (e) {
                                            var target = $(e.target),
                                                    action = target.data('action');
                                                    if (action === 'expand-all') {
                                            $('.dd').nestable('expandAll');
                                            }
                                            if (action === 'collapse-all') {
                                            $('.dd').nestable('collapseAll');
                                            }
                                            });
                                            });
                                                    $('#nestable').nestable({
                                            group: 1,
                                                    //handleClass: 'drag-handle',
                                                    maxDepth :2,
                                                    noDragClass: "dd-nodrag"
                                            }).on('change', function () {
                                            $.ajax({
                                            url: base_url + '/admin/categories/update_sort',
                                                    type: 'POST',
                                                    data: {'_token': csrf_token, 'data':$('#nestable').nestable('serialize')},
                                            })
                                                    .done(function() {
                                                    //location.reload();
                                                    })
                                                    .fail(function() {
                                                    console.log("error");
                                                    })
                                                    .always(function() {
                                                    console.log("complete");
                                                    });
                                                    console.log();
                                            });
                                                    // output initial serialised data

                                                    $(document).on('submit', '#frm_new_category', function(event) {
                                            event.preventDefault();
                                                    $.ajax({
                                                    url: base_url + '/admin/categories',
                                                            type: 'POST',
                                                            data: $('#frm_new_category').serialize(),
                                                    })
                                                    .done(function() {
                                                    location.reload();
                                                    })
                                                    .fail(function(response) {
                                                    validation_errors = response.responseJSON;
                                                            console.log(validation_errors);
                                                            $.each(validation_errors, function(k, v) {
                                                            //display the key and value pair
                                                            //console.log(k + ' is ' + v);
                                                            $('#err_catrgory_' + k).html(v)

                                                            });
                                                    })
                                                    .always(function() {
                                                    console.log("complete");
                                                    });
                                            });
                                                    function duplicate(id) {
                                                    $.ajax({
                                                    url: base_url + '/admin/categories',
                                                            type: 'POST',
                                                            data: {'_token': csrf_token, 'id':id},
                                                    }).done(function() {
                                                    location.reload();
                                                    }).fail(function() {
                                                    console.log("error");
                                                    }).always(function() {
                                                    console.log("complete");
                                                    });
                                                    }

                                            function changemyclass(){

                                            }

                                            function myDateFormatter(dateObject) {
                                            var d = new Date(dateObject);
                                                    var day = d.getDate();
                                                    var month = d.getMonth() + 1;
                                                    var year = d.getFullYear();
                                                    if (day < 10) {
                                            day = "0" + day;
                                            }
                                            if (month < 10) {
                                            month = "0" + month;
                                            }
                                            var date = day + "/" + month + "/" + year;
                                                    return date;
                                            };
                                                    /*function editmodal(){
                                                     $('.make-switch').each(function(){
                                                     $(this).bootstrapSwitch();
                                                     });
                                                     }*/
                                                            function upload_category_images(category_id) {
                                                            $('#msg_error').hide();
                                                                    $(".loading_icon").show();
                                                                    $('#upload_section').html("");
                                                                    $('#modal-upload-image').modal('show');
                                                                    $.ajax({
                                                                    url: base_url + '/admin/categories/category_images/' + category_id,
                                                                    }).done(function(response) {
                                                            $.each(response, function(k, v) {
                                                            $('#upload_section').append('<section id=s' + v.id + '></section>');
                                                                    $('#s' + v.id).append($('#upload_container_1').html());
                                                            });
                                                                    $.each(response, function(k, v) {
                                                                    $('#s' + v.id).find($('.id')).val(v.id);
                                                                            $('#s' + v.id).find($('.upload_alt_text')).val(v.image_alt_text);
                                                                            $('#s' + v.id).find($('.upload_display_order')).val(v.sort_order);
                                                                            $('#s' + v.id).find($('.upload_start_date')).val(
                                                                            (v.image_start_date) ? myDateFormatter(v.image_start_date) : null
                                                                            );
                                                                            $('#s' + v.id).find($('.upload_end_date')).val(
                                                                            (v.image_end_date) ? myDateFormatter(v.image_end_date) : null
                                                                            );
                                                                            $('#s' + v.id).find($('.upload_web_url')).val(v.url);
                                                                            $('#s' + v.id).find($('.upload_images')).attr('src', base_url + '/storage/categories/images/' + v.image);
                                                                            $('#s' + v.id).find($('.upload_banner')).attr('src', base_url + '/storage/categories/banner/' + v.banner);
                                                                            $('#s' + v.id).find($('.pdf_path')).attr('href', base_url + '/storage/categories/pdf/' + v.pdf);
                                                                            $('#s' + v.id).find($('.pdf_path')).text(v.pdf);
                                                                            $('#s' + v.id).find($('.delete_image_button')).html('<span class="label label-sm label-red "' +
                                                                            'onclick="delete_category_images(' + v.id + ',1)"><i class="fa fa-trash-o"></i></span>');
                                                                            $('#s' + v.id).find($('.delete_baner_button')).html('<span class="label label-sm label-red "' +
                                                                            'onclick="delete_category_images(' + v.id + ',2)"><i class="fa fa-trash-o"></i></span>');
                                                                            $('#s' + v.id).find($('.delete_pdf_button')).html('<span class="label label-sm label-red "' +
                                                                            'onclick="delete_category_images(' + v.id + ',3)"><i class="fa fa-trash-o"></i></span>');
                                                                            $('#s' + v.id).find($('.make-switch-id')).attr("class", "make-switch-" + v.id);
                                                                            $('#s' + v.id).find($('.imgstatus')).attr("name", "upload_status[" + v.id + "][]");
                                                                            if (v.status == 0){
                                                                    $('#s' + v.id).find($('.imgstatus')).attr('checked', false);
                                                                    }
                                                                    $('.make-switch-' + v.id).bootstrapSwitch();
                                                                    });
                                                            }).fail(function() {
                                                            console.log("error");
                                                            }).always(function() {
                                                            console.log("complete");
                                                                    $(".loading_icon").fadeOut('400', function() {
                                                            });
                                                            });
                                                                    $('#upload_category_id').val(category_id);
                                                            }

                                                    function add_more_images() {

                                                    $('#upload_section').append($('#upload_container_1').html());
                                                    }

//      $(document).on('submit', '#upload_image_form', function(event) {
//          event.preventDefault();
//          var formData = new FormData($(this)[0]);
//          $.ajax({
//              url: base_url+'/admin/categories/upload_images',
//              type: 'POST',
//              data: formData,
//                              processData: false,  // tell jQuery not to process the data
//                              contentType: false
//
//                          })
//          .done(function() {
//           $('#modal-upload-image').modal('hide');
//           document.getElementById("modal-upload-image-cancelbtn").click();
//       })
//          .fail(function() {
//              $('#msg_error').show();
//                                                           $('#modal-upload-image, #modal-upload-image-body').animate({
//                                                                  scrollTop: $("#msg_error").offset().top
//                                                          }, 700);
//          })
//          .always(function() {
//              console.log("complete");
//          });
//      });
                                                    //$('.make-switch').bootstrapSwitch();
                                                    $(document).on('focusin', '#upload_image_form', function(event) {
                                                    //$('.make-switch').bootstrapSwitch();
                                                    $('.input-daterange').datepicker({
                                                    todayBtn: "linked"
                                                    });
                                                    });
                                                            $(document).on('change', '.upload_images_browse', function(event) {
                                                    var thisFile = $(this);
                                                            var fileSize = thisFile[0].files[0].size;
                                                            var fileType = thisFile[0].files[0].type;
                                                            var filename = thisFile[0].files[0].name;
                                                            var extension = filename.substr((filename.lastIndexOf(".") + 1));
                                                            extension = extension.toUpperCase();
                                                            var allowedExtensions = ['JPG', 'JPEG', 'PNG', 'GIF'];
                                                            if (fileSize > 1000000){ //do something if file size more than 1 mb (1048576)
                                                    upload_error = "File Size must be less then 1 mb";
                                                            $(this).val('');
                                                            alert(upload_error);
                                                    }
                                                    else if ($.inArray(extension, allowedExtensions) == - 1) {
                                                    upload_error = "only 'JPG','JPEG','PNG','GIF' are allowed";
                                                            $(this).val('');
                                                            alert(upload_error);
                                                    }

                                                    });
                                                            $(document).on('change', '.upload_pdf_browse', function(event) {
                                                    var thisFile = $(this);
                                                            var fileSize = thisFile[0].files[0].size;
                                                            var fileType = thisFile[0].files[0].type;
                                                            var filename = thisFile[0].files[0].name;
                                                            var extension = filename.substr((filename.lastIndexOf(".") + 1));
                                                            extension = extension.toUpperCase();
                                                            var allowedExtensions = ['PDF'];
                                                            if ($.inArray(extension, allowedExtensions) == - 1) {
                                                    upload_error = "only 'PDF' files are allowed";
                                                            $(this).val('');
                                                            alert(upload_error);
                                                    }

                                                    });
                                                            function delete_category_images(id,label) {
            var text="";
            if (label==1) {
                text="image";
            }
            if (label==2) {
                text="banner";
            }
            if (label==3) {
                text="pdf";
            }
            $('#modal-delete-file').modal('show');
            $('#delete_label').html(text);
            $('#category_image_id').html(id);
            $('#category_image_type').html(text);
        }
        function delete_category_img_post() {
            var id=$('#category_image_id').html();
            var type=$('#category_image_type').html();
            $.ajax({
                url: base_url+'/admin/categories/category_images_delete',
                type: 'POST',
                data: {'_token': csrf_token,'id':id,'type':type},
            })
            .done(function() {
                upload_category_images($('#upload_category_id').val());
                $('#modal-delete-file').modal('hide');
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        }
        $('.page_type').on('change', function() {
                $('.page_type').not(this).prop('checked', false);
        });
        /* //Upload category images scripts*/

    </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>