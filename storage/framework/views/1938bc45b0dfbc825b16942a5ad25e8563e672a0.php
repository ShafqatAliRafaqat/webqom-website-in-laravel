<table>
	<tr>
		<td class="first rowfirst">
			<div class="title">
				<div class="arrow_box">
					<h5>All <?php echo e($page_name); ?> Features</h5>
					<h3 class="caps">Choose Your Plan</h3>
				</div>
			</div>
		</td>
		
		<?php if(!empty($plans)): ?>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<td class="rowsremain <?php if( (strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') ): ?> center <?php endif; ?> ">
			<div class="prices">
				<?php if( (strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') ): ?><h3><span><?php echo e($i->promo_behaviour=='other'?$i->promo_behaviour_other:$i->promo_behaviour); ?></span></h3><?php endif; ?>
				<h2 class="caps <?php if( (strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') ): ?> white <?php endif; ?> "><?php echo e($i->plan_name); ?></h2>
				<?php if($i->price_type=='Recurring'): ?>
				<?php  list($whole, $decimal) = explode('.', number_format($i->price_monthly, 2, '.', '00')  );  ?> 
				<strong><i>RM</i><?php echo e(isset($whole) ? $whole : '0'); ?><i>.<?php echo e($decimal); ?>/mo</i></strong>
				<?php endif; ?>
				<?php if($i->price_type=='One Time'): ?>
				<?php  list($whole, $decimal) = explode('.', number_format($i->price_monthly, 2, '.', '00'));  ?> 
				<strong><i>RM</i><?php echo e(isset($whole) ? $whole : '0'); ?><i>.<?php echo e($decimal); ?>/mo</i></strong>
				<?php endif; ?>
				<?php if($i->price_type=='Free'): ?>
				<strong>Free</strong>
				<?php endif; ?>
				<b></b>
				<?php if($i->enable_plan_button!='other'): ?>
				<a href="<?php echo e(route('configDedicate')); ?>"><?php echo e($i->enable_plan_button); ?></a>
				<?php else: ?>
				<a data-target="#modal-enquire" data-toggle="modal" href="#"><?php echo e($i->enable_plan_button_other); ?></a>
				<?php endif; ?>
			</div>
		</td>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
	</tr>
	<?php if($service_free_domains): ?>
		<tr>
			<th class="alileft">Free domain</td>
			<?php for($i = 0; $i <= 2; $i++): ?>
				<?php if(isset($plans[$i])): ?>
					<th>
						<?php 
							$free_domain = App\Models\ServicesFreeDomain::where('plan_id', $plans[$i]->id)->first();
							$type = '';
							$fee = '';
							$tldValues = [];
							$offer_line = '';
							if ($free_domain) {
								$type = $free_domain->type;
								$fee = $free_domain->fee;

								if ($type !== '1') {
									$tlds_array = unserialize($free_domain->tlds);
									foreach ($tlds_array as $j) {
										$domain_pricing = App\Models\DomainPricing::find($j);
										
										
										if ($domain_pricing) {
											if ($type === '2' || $type === '3') {
												$offer_line = ($type == '2')?'  Offer a free domain registration/transfer only (renew as normal)':'  Offer a discounted domain registration/transfer only (renew as normal):';
												$tlds = '';
												$tlds = App\Models\DomainPricingList
													::where('domain_pricing_id', $domain_pricing->id)
													->whereIn('type', ['new', 'transfer'])
													->where('status', 1)
													->get();
											}

											if ($type === '4') {
												$offer_line = '  Offer a free domain registration/transfer and free renewal (if product is renewed)';
												$tlds = '';
												$tlds = App\Models\DomainPricingList
													::where('domain_pricing_id', $domain_pricing->id)
													->where('status', 1)
													->get();
											}

											foreach ($tlds as $tld) {
												$tldValues[] = $tld->tld;
											}
										}
									}
								}
							}
							$tldValues = implode(' / ', array_unique($tldValues));		
						 ?>
						<?php echo $tldValues ?: '<i class="fa fa-times red"></i>'; ?>

						<p><span class="red"> <?php echo (!empty($offer_line))?$offer_line:''; ?></span></p>
						<?php if($type === '3'): ?>
							<p><span class="red">Sale</span>. First Year just <span class="red">RM <?php echo e($fee); ?> </span></p>
						<?php endif; ?>
				</th>
				<?php endif; ?>	
			<?php endfor; ?>
		</tr>
	<?php endif; ?>
	<?php if(count($featured_plans)>0 && count($plans)>0): ?>
	<?php $__currentLoopData = $featured_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
	<tr>
		<th class="alileft"><?php echo e($i->title); ?></th>
		<?php for($j = 0; $j < 3; $j++): ?>
			<?php if(isset($plans[$j])): ?>
				<th>
					<?php 
					$details = App\Models\PlanFeatureDetail::where('plan_feature_id', $i->id)->where('plan_id', $plans[$j]->id)->first();
					 ?>
					<?php if($details): ?>
					<?php if($details->select_yes_no === 'yes'): ?>
					<i class="fa fa-check sitecolor"></i>
					<?php elseif($details->select_yes_no === 'no'): ?>
					<i class="fa fa-times red"></i>
					<?php endif; ?>
					<?php echo e($details->description); ?>

					<?php else: ?> <i class="fa fa-times red"></i> <?php endif; ?>
				</th>
			<?php endif; ?>
		<?php endfor; ?>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	<?php endif; ?>
	<?php if(!empty($plans)): ?>
	<tr>
		<th class="alileft">Setup Fee</th>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<th>
			<?php if($plan->setup_fee_one_time=='0' || $plan->price_type=="Free"): ?>
			<i class="fa fa-check sitecolor"></i>
			<?php else: ?>
			RM <?php echo e($plan->setup_fee_one_time); ?>

			<?php endif; ?>
		</th>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tr>
	<tr>
		<th class="alileft text-red">First Month</th>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<th class="text-red">
			<?php if($plan->recurring_first_month=='0' || $plan->recurring_first_month=="" || $plan->price_type=="Free"): ?>
			<i class="fa fa-times red"></i>
			<?php else: ?>
			RM <?php echo e($plan->recurring_first_month); ?> / mth
			<?php endif; ?>
		</th>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tr>
	<tr>
		<th class="alileft text-red">First Year</th>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<th class="text-red">
			<?php if($plan->recurring_first_year=='0' || $plan->recurring_first_year=="" || $plan->price_type=="Free"): ?>
			<i class="fa fa-times red"></i>
			<?php else: ?>
			RM <?php echo e($plan->recurring_first_year); ?> / yr
			<?php endif; ?>
		</th>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tr>
	<tr>
		<th class="alileft text-red">Price (Annually)</th>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<th class="text-red">
			<?php if($plan->price_annually=='0' || $plan->price_annually=='' || $plan->price_type=="Free"): ?>
			<i class="fa fa-times red"></i>
			<?php else: ?>
			RM <?php echo e($plan->price_annually); ?> / yr
			<?php endif; ?>
		</th>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tr>
	<tr>
		<th class="alileft text-red">Price (Biennially)</th>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<th class="text-red">
			<?php if($plan->price_biennially=='0' || $plan->price_biennially=='' ||$plan->price_type=="Free"): ?>
			<i class="fa fa-times red"></i>
			<?php else: ?>
			RM <?php echo e($plan->price_biennially); ?> / 2 yrs
			<?php endif; ?>
		</th>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tr>
	<tr>
		<th class=" text-red alileft">Price (Triennially)</th>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<th class="text-red">
			<?php if($plan->price_triennially=='0' || $plan->price_triennially=='' || $plan->price_type=="Free"): ?>
			<i class="fa fa-times red"></i>
			<?php else: ?>
			RM <?php echo e($plan->price_triennially); ?> / 3 yrs
			<?php endif; ?>
		</th>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
	</tr>
	<?php endif; ?>
	<tr>
		<td class="first rowfirst"></td>
		<?php if(!empty($plans)): ?>
		<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<td class="rowsremain  <?php if(strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none'): ?> center <?php endif; ?>">
			<div class="prices">
				<?php if($i->price_type=='Recurring'): ?>
				<strong><i>RM</i><?php echo e(isset($i->price_monthly) ? $i->price_monthly : '0'); ?><i>/mo</i></strong>
				<?php endif; ?>
				<?php if($i->price_type=='One Time'): ?>
				<strong><i>RM</i><?php echo e(isset($i->price_monthly) ? $i->price_monthly : '0'); ?><i>/mo</i></strong>
				<?php endif; ?>
				<?php if($i->price_type=='Free'): ?>
				<strong>Free</strong>
				<?php endif; ?>
				<b></b>
				<?php if($i->enable_plan_button!='other'): ?>
				<a href="<?php echo e(route('configDedicate')); ?>"><?php echo e($i->enable_plan_button); ?></a>
				<?php else: ?>
				<a data-target="#modal-enquire" data-toggle="modal" href="#"><?php echo e($i->enable_plan_button_other); ?></a>
				<?php endif; ?>
			</div>
		</td>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		<?php endif; ?>
		<!-- <td class="rowsremain center">
					<div class="prices">
								<strong><i>RM</i>80<i>.00/mo</i></strong> <b></b>
								<a data-target="#modal-enquire" data-toggle="modal" href="#">Order Now</a>
					</div>
		</td> -->
	</tr>
</table>