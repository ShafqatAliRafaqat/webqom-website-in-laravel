<tr>
	<td><input type="checkbox" class="select-items toggle-list-<?php echo e($type); ?>" data-id="<?php echo e($i->id); ?>" data-tld="<?php echo e($i->tld); ?>"></td>
	<td><?php echo e($i->id); ?></td>
	<td><?php echo e($i->tld); ?></td>
	<?php 
		$prices = (array)json_decode($i->pricing, true);
	 ?>
	<?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<td>
			<span class="text-red"><?php echo e($p['s']); ?></span>
			<br>
			<span class="strike"><?php echo e($p['l']); ?></span>
		</td>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<td>
		<?php if($i->status): ?>
			<span class="label label-xs label-success">Active</span>
		<?php else: ?>
			<span class="label label-xs label-danger">Inactive</span>
		<?php endif; ?>
	</td>
	<td>
		<a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-<?php echo e($i->id); ?>" data-toggle="modal" title="Edit" data="<?php echo e(json_encode($i, true)); ?>">
			<span class="label label-sm label-success"><i class="fa fa-pencil"></i></span>
		</a>
		<a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-pricing" data-toggle="modal" data-id="<?php echo e($i->id); ?>" data-tld="<?php echo e($i->tld); ?>">
			<span class="label label-sm label-red">
				<i class="fa fa-trash-o"></i>
			</span>
		</a>
	</td>
</tr>
