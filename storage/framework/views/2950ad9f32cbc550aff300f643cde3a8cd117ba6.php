<?php
$page = 'banners';
$breadcrumbs = [
    array('url' => route('admin.banners.index'), 'name' => 'Banners'),
    array('url' => false, 'name' => 'Index Banners - Editing'),
]; 
?>

<?php $__env->startSection('title','Admin | Editing'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Banners'); ?>
<!--BEGIN CONTENT-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Index Banners <i class="fa fa-angle-right"></i>Edit Banner</h2>
              <div class="clearfix"></div>
			  
			  <?php if(session('message')): ?>
				  <div class="alert alert-success alert-dismissable">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
					<i class="fa fa-check-circle"></i> <strong>Success!</strong>
					<p><?php echo e(session('message')); ?></p>
				  </div>
			  <?php endif; ?>
				<?php if(count($errors) > 0): ?>
				  <div class="alert alert-danger alert-dismissable">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
						<ul>
							<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<li><i class="fa fa-times-circle"></i> <strong>Error!</strong> <?php echo e($error); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</ul>
					</div>
				<?php endif; ?>
			  
              <div class="clearfix"></div>
              <div class="portlet">
                <div class="portlet-header">
					<div class="tools"> <i class="fa fa-chevron-up"></i> </div>
					<div class="caption">Edit Banner</div>
				</div>
				<div class="portlet-body">
					<div class="form">
						<form class="form-horizontal" action="<?php echo e(route('admin.banners.update')); ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							<input type="hidden" name="id" value="<?php echo e($bannerById->id); ?>">
							<div class="form-group">
								<label class="col-md-3 control-label">Status</label>
								<div class="col-md-6">
								  <div data-on="success" data-off="primary" class="make-switch">
									<input type="checkbox" name="banner_status" <?php if($bannerById->banner_status == 'active'): ?>checked="checked" <?php endif; ?>/>
								  </div>
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-md-3 control-label">Title </label>
								<div class="col-md-6">
								  <input id="text" type="text" name="banner_title" class="form-control" placeholder="Inspired Web Design" value="<?php echo e($bannerById->banner_title); ?>">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-md-3 control-label">Banner Alt Text </label>
								<div class="col-md-6">
								  <input id="text" name="banner_alt" type="text" class="form-control" placeholder="eg. Responsive Web Design" value="<?php echo e($bannerById->banner_alt); ?>">
								</div>
							  </div>
							  <div class="form-group">
								<label class="col-md-3 control-label">Uploaded Banner <span class="text-red">*</span></label>
								<div class="col-md-9">
								  <img src="<?php echo e(asset('storage/banners/images/'. $bannerById->banner_image)); ?>" alt="<?php echo e($bannerById->banner_alt); ?>" class="img-responsive"><br/>
									
								</div>
							  </div>
							  <div class="form-group <?php if($errors->has('banner_image')): ?> has-error <?php endif; ?>">
                                <label class="col-md-3 control-label">Upload Banner <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <div class="text-15px margin-top-10px">
                                    <input id="exampleInputFile2" name="banner_image"  type="file" />
                                   
                                    <span class="help-block">(Image dimension: 1920 x 630 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                </div>
								<?php if($errors->has('banner_image')): ?>
									<div class="col-md-3">
									  <div class="popover popover-validator right">
										<div class="arrow"></div>
										<div class="popover-content">
										  <div class="mbs text-12px margin-top-5px"><?php echo e($errors->first('banner_image')); ?></div>
										</div>
									  </div>
									</div>
								<?php endif; ?>
								<style>::-webkit-calendar-picker-indicator { display: none; }</style>
                              </div>
							  <div class="form-group">
								<label class="col-md-3 control-label">Start Date to End Date</label>
								<div class="col-md-6">
								  <div class="input-group input-daterange">
									<input type="text" name="banner_start_date" class="form-control" value="<?php echo e(date('d-m-Y', strtotime($bannerById->banner_start_date))); ?>"/>
									<span class="input-group-addon">to</span>
									<input type="text" name="banner_end_date" class="form-control" value="<?php echo e(date('d-m-Y', strtotime($bannerById->banner_end_date))); ?>"/>
								  </div>
								</div>
							  </div>
							   <div class="form-group  <?php if($errors->has('banner_display_order')): ?> has-error <?php endif; ?>">
                                <label class="col-md-3 control-label">Display Order <span class="text-red">*</span></label>
                                <div class="col-md-2">
                                  <input type="text" name="banner_display_order"  class="form-control" placeholder="1" value="<?php echo e($bannerById->banner_display_order); ?>" required >
                                </div>
								<?php if($errors->has('banner_display_order')): ?>
									<div class="col-md-3">
									  <div class="popover popover-validator right">
										<div class="arrow"></div>
										<div class="popover-content">
										  <div class="mbs text-12px margin-top-5px"><?php echo e($errors->first('banner_display_order')); ?></div>
										</div>
									  </div>
									</div>
								<?php endif; ?>
                                <div class="col-md-9 pull-right"> <span class="help-block">Display order is to determine the item appearing sequence in the website.</span> </div>
                              </div>
							  
							  <?php if($bannerById->banner_enlarge_image != ''): ?>
							  <div class="form-group">
								<label class="col-md-3 control-label">Uploaded Enlarge Banner or</label>
								<div class="col-md-9">
								  <p class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options when clicking on the banner for enlarge/detailed view.</p>
								  <img src="<?php echo e(asset('storage/banners/enlarge/'. $bannerById->banner_enlarge_image)); ?>" alt="Responsive Web Design" class="img-responsive"><br/>
									
									<a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-image" data-toggle="modal">
										<span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span>
                                    </a>
									  <!--Modal delete start-->
									  <div id="modal-delete-image" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
										<div class="modal-dialog">
										  <div class="modal-content">
											<div class="modal-header">
											  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
											  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this image? </h4>
											</div>
											<div class="modal-body">
												<img src="<?php echo e(asset('storage/banners/enlarge/'. $bannerById->banner_enlarge_image)); ?>" alt="Responsive Web Design" class="img-responsive"><br/>
									
											  <div class="form-actions">
												<div class="col-md-offset-4 col-md-8"> <a href="<?php echo e(url('admin/banners/delete/enlarge-image/'.$bannerById->id)); ?>" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
											  </div>
											</div>
										  </div>
										</div>
									</div>
									<!-- modal delete end -->
									<div class="xs-margin"></div>
								</div>
							  </div>
							  <?php endif; ?>
							 <div class="form-group  <?php if($errors->has('banner_enlarge')): ?> has-error <?php endif; ?>">
                                <label class="col-md-3 control-label">Upload Enlarge Banner or</label>
                                <div class="col-md-6">
                                  <p class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options when clicking on the banner for enlarge/detailed view.</p>
                                  <div class="text-15px margin-top-10px">
                                    <input id="exampleInputFile2"  name="banner_enlarge"  type="file"/>
                                    <span class="help-block">(JPEG/GIF/PNG only, Max. 2MB) </span> </div>
                                </div>
								<?php if($errors->has('banner_enlarge')): ?>
									<div class="col-md-3">
									  <div class="popover popover-validator right">
										<div class="arrow"></div>
										<div class="popover-content">
										  <div class="mbs text-12px margin-top-5px"><?php echo e($errors->first('banner_enlarge')); ?></div>
										</div>
									  </div>
									</div>
								<?php endif; ?>
                              </div>
							  
							  <?php if($bannerById->banner_enlarge_pdf != ''): ?>
								  <div class="form-group">
									<label class="col-md-3 control-label">Uploaded PDF or</label>
									<div class="col-md-9 margin-top-5px"> 
									<a href="<?php echo e(url('storage/banners/enlarge/'. $bannerById->banner_enlarge_pdf)); ?>" target="_blank"><?php echo e($bannerById->banner_enlarge_pdf); ?></a><br/>
									<a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-pdf" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
									<!--Modal delete start-->
									<div id="modal-delete-pdf" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
									  <div class="modal-dialog">
										<div class="modal-content">
										  <div class="modal-header">
											<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
											<h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this PDF? </h4>
										  </div>
										  <div class="modal-body">
											<p><a href="<?php echo e(url('storage/banners/enlarge/'. $bannerById->banner_enlarge_pdf)); ?>" target="_blank"><?php echo e($bannerById->banner_enlarge_pdf); ?></a><br/>
											</p>
											<div class="form-actions">
											  <div class="col-md-offset-4 col-md-8"> <a href="<?php echo e(url('admin/banners/delete/enlarge-pdf/'.$bannerById->id)); ?>" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
											</div>
										  </div>
										</div>
									  </div>
								  </div>
								  <!-- modal delete end -->
									</div>
								  </div>
							  <?php endif; ?>
							  
							  <div class="form-group">
								<label class="col-md-3 control-label">Upload new PDF or</label>
									<div class=" col-md-9 text-15px margin-top-10px">
									  <input name="banner_pdf" id="exampleInputFile2" type="file"/>
									</div>
							  </div>
							  
							  <div class="form-group">
								<label class="col-md-3 control-label">Website URL</label>
								<div class="col-md-6">
								  <div class="input-icon"><i class="fa fa-link"></i>
									  <input type="text" name="banner_link" placeholder="http://" class="form-control" value="<?php echo e($bannerById->banner_link); ?>"/>
									  <span class="help-block">Please enter the page link to link it to the sub page.</span> </div>
								</div>
							  </div>
							  <div class="clearfix"></div>
							  <div class="form-actions">
								<div class="col-md-offset-5 col-md-8"> 
								<button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; 
								<a href="<?php echo e(route('admin.banners.index')); ?>" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> 
								</div>
							  </div>
							</form>
					 </div>	
				</div>
              </div>
              <!-- end portlet -->
            </div>
            <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
        <!-- InstanceEndEditable -->
        <!--END CONTENT-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.new_admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>