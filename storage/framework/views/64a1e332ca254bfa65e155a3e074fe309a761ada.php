<?php $__env->startSection('title','Development'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Dashboard'); ?>
<div class="page-content">
    <div id="tab-general">
        <div class="row">
        	<div class="col-lg-12">
            	<h5 class="block-heading">
                    There is artisan commands for development purpose, to run migrations, clear cache, and optimize dependency
                </h5>
                <br>
            </div>
            <?php echo Form::open(['route' => ['develop.artisan.commands']]); ?>

                <div class="col-md-6">
                    <?php echo Form::select('action',
                        [
                            'migrations_status' => 'Migrations Status',
                            'regenerate_migrations' => 'Regeterate migrations(Please, do not touch this)',
                            'migrate' => 'Migrate',
                            'rollback' => 'Rollback las migration',
                            'cache_clear' => 'Clear application cahe',
                            'route_clear' => 'Clear route cache',
                            'route_cache' => 'Cache routes',
                            'route_list' => 'Show root lists',
                         ],
                        null,
                        ['placeholder' => 'Select action', 'class' => 'form-control']); ?>

                </div>
                <div class="col-md-6">
                    <?php echo Form::submit(
                        'Execute artisan command',
                        ['class' => 'btn btn-lg btn-primary']); ?>

                </div>
            <?php echo Form::close(); ?>

            <div class="col-md-12">
                <?php if(\Session::has('message')): ?>
                    <div class="alert alert-warning">
                        <ul>
                            <li><?php echo \Session::get('message'); ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>