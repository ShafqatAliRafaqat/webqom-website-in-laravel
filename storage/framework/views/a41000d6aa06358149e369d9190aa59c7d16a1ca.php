<?php
$page = 'banners';
$breadcrumbs = [
    array('url' => route('admin.banners.index'), 'name' => 'Banners'),
    array('url' => false, 'name' => 'Index Banners- Listing'),
];
?>

<?php $__env->startSection('title','Admin | Banner list'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Banners'); ?>
<!--BEGIN CONTENT-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Index Banners <i class="fa fa-angle-right"></i> Listing</h2>
			  
              <div class="clearfix"></div>
		
			  <?php if(session('error')): ?>
				  <div class="alert alert-danger alert-dismissable">
					<button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
					<i class="fa fa-check-circle"></i> <strong>Error!</strong>
					<p><?php echo e(session('error')); ?></p>
				  </div>
			  <?php endif; ?>
			  
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
              <p></p>
              <div class="clearfix"></div>
              <div class="portlet">
                <div class="portlet-header">
					<div class="caption">Index Banners Listing</div>

                  <p class="margin-top-10px"></p><br>
                  <a href="#" data-target="#modal-add-new" data-toggle="modal" class="btn btn-success">Add New Banner &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selected" data-toggle="modal">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
<div class="tools"> <i class="fa fa-chevron-up"></i> </div>



				<!--Modal Add New Banner start-->
                  <div id="modal-add-new" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title">Add New Banner</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                            <form class="form-horizontal" action="<?php echo e(route('admin.banners.store')); ?>" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							  <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    <input type="checkbox" name="banner_status" checked="checked"/>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Title </label>
                                <div class="col-md-6">
                                  <input id="text"  name="banner_title"  type="text" class="form-control" placeholder="Inspired Web Design">
                                </div>
                              </div>
                             <!-- note to programmer: above is an example of error message display if the field is not entered correctly. please apply toall other fields in all pages.-->
                              <div class="form-group <?php if($errors->has('banner_image')): ?> has-error <?php endif; ?>">
                                <label class="col-md-3 control-label">Upload Banner <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <div class="text-15px margin-top-10px">
                                    <input id="exampleInputFile2" name="banner_image"  type="file" required />
                                   
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
								
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Banner Alt Text </label>
                                <div class="col-md-6">
                                  <input id="text" type="text" name="banner_alt"  class="form-control" placeholder="eg. Responsive Web Design" value="Responsive Web Design">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Start Date to End Date</label>
                                <div class="col-md-6">
                                  <div class="input-group input-daterange">
                                    <input type="text" name="banner_start_date" class="form-control"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" name="banner_end_date" class="form-control"/>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group  <?php if($errors->has('banner_display_order')): ?> has-error <?php endif; ?>">
                                <label class="col-md-3 control-label">Display Order <span class="text-red">*</span></label>
                                <div class="col-md-2">
                                  <input type="text" name="banner_display_order"  class="form-control" placeholder="1" required >
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
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload PDF or</label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                    <input id="exampleInputFile2" name="banner_pdf"  type="file"/>
                                    <br/>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Website URL</label>
                                <div class="col-md-6">
                                  <div class="input-icon"><i class="fa fa-link"></i>
                                      <input type="text" name="banner_link"  placeholder="http://" class="form-control"/>
                                      <span class="help-block">Please enter the page link to link it to the sub page.</span> </div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-actions">
                                <div class="col-md-offset-5 col-md-8">
									<button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; 
									<a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> 
								</div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END MODAL Add New banner -->
				  <?php if(count($banners)>0): ?>
				<!--Modal delete all items start-->
                  <div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all the Banner items? </h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-actions">
                            <div class="col-md-offset-4 col-md-8"> <a href="<?php echo e(route('admin.banners.destroy')); ?>" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
				  <?php else: ?> 
					<div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a>The banner items list is empty ! </h4>
                        </div>
                        <div class="modal-body">
							<div class="alert alert-danger" id="modal-selected-none">
								  <strong>Nothing to delete.</strong>
							</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete all items end -->
					<?php endif; ?>
                </div>
                <div class="portlet-body">
					<form action="<?php echo e(route('admin.banners.updateOrder')); ?>" method="POST">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
							  
					<div class="pull-right"> <button type=" <?php if(count($banners)>0): ?> submit <?php endif; ?>" class="btn btn-danger">Update Display Order &nbsp;<i class="fa fa-refresh"></i></button> </div>
                  <div class="clearfix"></div>

                  <div class="table-responsive mtl">
                    <table class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No.</th>
                          <th>Status</th>
                          <th>Title</th>
                          <th>Image</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Display Order</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php 
							$totalBanners=0;
						 ?>
						<?php $__empty_1 = true; $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
							
							<?php  
								$totalBanners= $totalBanners+1;
							 ?>
                        <tr>
                          <td><input type="checkbox" class="select-checkbox" data-id="<?php echo e($banner->id); ?>" data-title="<?php echo e($banner->banner_title); ?>" data-image="<?php echo e(asset('storage/banners/images/'.$banner->banner_image)); ?>"/></td>
                          <td><?php echo e($totalBanners); ?></td>
                          <td>
							<?php if($banner->banner_status == 'active'): ?>
								<span class="label label-xs label-success">active</span>
							<?php else: ?>
								<span class="label label-xs label-danger">inactive</span>
							<?php endif; ?>
						  </td>
                          <td><?php echo e($banner->banner_title); ?></td>
                          <td><img src="<?php echo e(asset('storage/banners/images/'.$banner->banner_image)); ?>" alt="Responsive Web Design" class="" width="192" height="63"></td>
                          
                          <td>
						  <?php echo e(date('d-m-Y', strtotime($banner->banner_start_date))); ?>

						  </td>
                          <td>
						  <?php echo e(date('d-m-Y', strtotime($banner->banner_end_date))); ?>

						  </td>
                          <td><input type="text" name="updateOrder[<?php echo e($banner->id); ?>]" class="form-control" value="<?php echo e($banner->banner_display_order); ?>"></td>
                          <td>
							<a href="<?php echo e(url('admin/banners/edit/'.$banner->id)); ?>"><span class="label label-sm label-success"><i class="fa fa-edit"></i></span></a>&nbsp;
							<a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-<?php echo e($banner->id); ?>" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
								  <!--Modal delete start-->
								  <div id="modal-delete-<?php echo e($banner->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
									<div class="modal-dialog">
									  <div class="modal-content">
										<div class="modal-header">
										  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
										  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the banner? </h4>
										</div>
										<div class="modal-body">
											<h5 style="color:black;"><?php echo e($banner->banner_title); ?></h5>
											<img src="<?php echo e(asset('storage/banners/images/'.$banner->banner_image)); ?>" alt="Responsive Web Design" class="" width="192" height="63">
											<div class="form-actions">
												<div class="col-md-offset-4 col-md-8"> <a href="<?php echo e(url('admin/banners/delete/'.$banner->id)); ?>" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
										  </div>
										</div>
									  </div>
									</div>
								</div>
								<!-- modal delete end -->
						  
						  </td>
                        </tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?> 
						 <tr> <td colspan="7" style="color:red"> No banner found but 2 default banners is set for public page</td></tr>
						<?php endif; ?>
						</form>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="9"></td>
                        </tr>
                      </tfoot>
                    </table>
                    <div class="tool-footer text-right">
						<?php  
							$totalBanners= App\Models\Banner::all();
						 ?>
                      <p class="pull-left">showing <?php echo e(count($banners)); ?> of <?php echo e(count($totalBanners)); ?> entries</p>
                      <?php echo e($banners->links()); ?>

                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <!-- end table responsive -->
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

		<!--Modal delete selected items start-->
		  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
			<div class="modal-dialog">
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
				  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a><span id="modal-selected-items-title">Are you sure you want to delete the selected item(s)? </h4>
				</div>
				<form action="<?php echo e(route('admin.banners.deleteSelected')); ?>" method="POST">
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<div class="modal-body" id="modal-selected-items">
				  <div class="alert alert-danger" id="modal-selected-none">
					  <strong>Please select at least one item for delete.</strong>
				</div>
				
				</div>
				<div class="modal-footer">
					<div class="form-actions" id="modal-selected-items-button" style="display:none;">
						<div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
					</div>
				</div>
				</form>
			  </div>
			</div>
		  </div>
		  <!-- modal delete selected items end -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom_scripts'); ?>
	<script>
	$('.select-checkbox').change(function(){
		$('#modal-selected-none').hide();
		$('#modal-selected-items-button').show();
		var title= $(this).attr('data-title');
		var image= $(this).attr('data-image');
		var bannerID= $(this).attr('data-id');
		if(this.checked){
			 $('#modal-selected-items').append("<div id='"+bannerID+"' class='selected-item'>*"+'. '+ title +"<img src='"+image+"' height='40px'><input type='hidden' name='id[]' id='input"+bannerID+"' value='"+bannerID+"'><br><br></div>");
		}else{
			$('#modal-selected-items').find('#'+bannerID).remove();
			var isempty=$('#modal-selected-items').find('.selected-item');
			if(isempty.length<1){
				$('#modal-selected-none').show();
				$('#modal-selected-items-button').hide();
			}
		}
	});
	 
	
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.new_admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>