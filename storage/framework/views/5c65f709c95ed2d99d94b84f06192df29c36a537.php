<?php $__env->startSection('title','Reset Password? | - Webqom Technologies'); ?>
<?php $__env->startSection('page_header','Reset Password'); ?>
<?php $__env->startSection('breadcrumbs','Reset Password'); ?>
<?php $__env->startSection('content'); ?>


<div class="clearfix"></div>

<div class="clearfix"></div>


<div class="content_fullwidth">
<div class="container">

    
        <h2 class="caps"><b>Forgot Your Password?</b></h2>
        <p>Please type the email address you used for signup and we will send you the new password.</p>
        <div class="clearfix margin_bottom1"></div>
        
        <div class="one_half_less">
            <div class="cforms alileft">
            
            <div id="form_status">
                <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            </div>
            <form method="POST" action="<?php echo e(url('/password/email')); ?>" class="form">
            <?php echo e(csrf_field()); ?>

                <label><b>Email Address</b> <em>*</em></label>
                <input type="text" id="name" name="email" placeholder="mail@yourdomain.com">
                <?php if($errors->has('email')): ?>
                                    <div class="red">
                                        <?php echo e($errors->first('email')); ?>

                                    </div>
                                <?php endif; ?>
                
                <a href="<?php echo e(url('/login')); ?>">Back to Login</a>
                <div class="clearfix"></div>
                
                <div class="margin_top3"></div>
                <button class="but_medium1 caps">Reset Password</button>
                <div class="clearfix margin_top3"></div>

                    
            </form>
        </div>
        
    </div><!-- end section -->
    

</div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>


<div class="clearfix"></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>