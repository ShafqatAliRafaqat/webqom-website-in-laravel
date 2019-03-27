<?php if(Session::has('success')): ?>
	<div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p><?php echo e(Session::get('success')); ?></p>
    </div>
<?php endif; ?>

<?php if(Session::has('info')): ?>
	<div class="alert alert-info"><strong>Information: </strong><?php echo e(Session::get('info')); ?></div>
<?php endif; ?>

<?php if(Session::has('danger')): ?>
	<div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p><?php echo e(Session::get('danger')); ?></p>
              </div>
<?php endif; ?>

<?php if($errors->any()): ?>
        <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved. Please correct the errors.</p>
              </div>
    
<?php endif; ?><!-- 
<?php if($errors->any()): ?>
    	<div class="col-md-6 col-md-offset-3"></div>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <div class="alert alert-danger"><p><?php echo e($error); ?></p></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    
<?php endif; ?> -->