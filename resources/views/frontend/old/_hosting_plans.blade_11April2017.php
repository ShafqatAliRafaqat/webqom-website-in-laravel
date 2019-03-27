<table>
	<tr>
		<td class="first rowfirst">
			<div class="title">
				<div class="arrow_box">
					<h5>All {{$page_name}} Features</h5>
					<h3 class="caps">Choose Your Plan</h3>
				</div>
			</div>
		</td>
		@if(!empty($plans))
		@foreach($plans as $i)
		<td class="rowsremain @if( (strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') ) center @endif ">
			<div class="prices">
				@if( (strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') )<h3><span>{{$i->promo_behaviour=='other'?$i->promo_behaviour_other:$i->promo_behaviour}}</span></h3>@endif
				<h2 class="caps @if( (strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') ) white @endif ">{{$i->plan_name}}</h2>
				@if($i->price_type=='Recurring')
				@php list($whole, $decimal) = explode('.', number_format($i->price_monthly, 2, '.', '00')  ); @endphp 
				<strong><i>RM</i>{{$whole or '0'}}<i>.{{$decimal}}/mo</i></strong>
				@endif
				@if($i->price_type=='One Time')
				@php list($whole, $decimal) = explode('.', number_format($i->price_monthly, 2, '.', '00')); @endphp 
				<strong><i>RM</i>{{$whole or '0'}}<i>.{{$decimal}}/mo</i></strong>
				@endif
				@if($i->price_type=='Free')
				<strong>Free</strong>
				@endif
				<b></b>
				@if($i->enable_plan_button!='other')
				<a href="domain_configuration_hosting.html">{{$i->enable_plan_button}}</a>
				@else
				<a href="domain_configuration_hosting.html">{{$i->enable_plan_button_other}}</a>
				@endif
			</div>
		</td>
		@endforeach
		@endif
	</tr>
	@if ($service_free_domains)
		<tr>
			<th class="alileft">Free domain</td>
			@for ($i = 0; $i <= 2; $i++)
				@if (isset($plans[$i]))
					<th>
						@php
							$free_domain = App\Models\ServicesFreeDomain::where('plan_id', $plans[$i]->id)->first();
							$type = '';
							$fee = '';
							$tldValues = [];
							if ($free_domain) {
								$type = $free_domain->type;
								$fee = $free_domain->fee;
								if ($type !== '1') {
									$tlds_array = unserialize($free_domain->tlds);
									foreach ($tlds_array as $j) {
										$domain_pricing = App\Models\DomainPricing::find($j);
										
										
										if ($domain_pricing) {
											if ($type === '2' || $type === '3') {
												$tlds = '';
												$tlds = App\Models\DomainPricingList
													::where('domain_pricing_id', $domain_pricing->id)
													->whereIn('type', ['new', 'transfer'])
													->where('status', 1)
													->get();
											}

											if ($type === '4') {
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
						@endphp
						{!! $tldValues ?: '<i class="fa fa-times red"></i>' !!}
						@if ($type === '3')
							<p><span class="red">Sale</span>. First Year just <span class="red">RM {{ $fee }} </span></p>
						@endif
				</th>
				@endif	
			@endfor
		</tr>
	@endif
	@if(count($featured_plans)>0 && count($plans)>0)
	@foreach($featured_plans as $i)
	<tr>
		<th class="alileft">{{$i->title}}</th>
		@for ($j = 0; $j < 3; $j++)
			@if (isset($plans[$j]))
				<th>
					@php
					$details = App\Models\PlanFeatureDetail::where('plan_feature_id', $i->id)->where('plan_id', $plans[$j]->id)->first();
					@endphp
					@if ($details)
					@if($details->select_yes_no === 'yes')
					<i class="fa fa-check sitecolor"></i>
					@elseif($details->select_yes_no === 'no')
					<i class="fa fa-times red"></i>
					@endif
					{{ $details->description }}
					@else <i class="fa fa-times red"></i> @endif
				</th>
			@endif
		@endfor
	</tr>
	@endforeach
	@endif
	@if(!empty($plans))
	<tr>
		<th class="alileft">Setup Fee</th>
		@foreach($plans as $plan)
		<th>
			@if($plan->setup_fee_one_time=='0' || $plan->price_type=="Free")
			<i class="fa fa-check sitecolor"></i>
			@else
			RM {{$plan->setup_fee_one_time}}
			@endif
		</th>
		@endforeach
	</tr>
	<tr>
		<th class="alileft text-red">First Month</th>
		@foreach($plans as $plan)
		<th class="text-red">
			@if($plan->recurring_first_month=='0' || $plan->recurring_first_month=="" || $plan->price_type=="Free")
			<i class="fa fa-times red"></i>
			@else
			RM {{$plan->recurring_first_month}}
			@endif
		</th>
		@endforeach
	</tr>
	<tr>
		<th class="alileft text-red">First Year</th>
		@foreach($plans as $plan)
		<th class="text-red">
			@if($plan->recurring_first_year=='0' || $plan->recurring_first_year=="" || $plan->price_type=="Free")
			<i class="fa fa-times red"></i>
			@else
			RM {{$plan->recurring_first_year}}
			@endif
		</th>
		@endforeach
	</tr>
	<tr>
		<th class="alileft text-red">Price (Annually)</th>
		@foreach($plans as $plan)
		<th class="text-red">
			@if($plan->price_annually=='0' || $plan->price_annually=='' || $plan->price_type=="Free")
			<i class="fa fa-times red"></i>
			@else
			RM {{$plan->price_annually}}
			@endif
		</th>
		@endforeach
	</tr>
	<tr>
		<th class="alileft text-red">Price (Biennially)</th>
		@foreach($plans as $plan)
		<th class="text-red">
			@if($plan->price_biennially=='0' || $plan->price_biennially=='' ||$plan->price_type=="Free")
			<i class="fa fa-times red"></i>
			@else
			RM {{$plan->price_biennially}}
			@endif
		</th>
		@endforeach
	</tr>
	<tr>
		<th class=" text-red alileft">Price (Triennially)</th>
		@foreach($plans as $plan)
		<th class="text-red">
			@if($plan->price_triennially=='0' || $plan->price_triennially=='' || $plan->price_type=="Free")
			<i class="fa fa-times red"></i>
			@else
			RM {{$plan->price_triennially}}
			@endif
		</th>
		@endforeach
	</tr>
	@endif
	<tr>
		<td class="first rowfirst"></td>
		@if(!empty($plans))
		@foreach($plans as $i)
		<td class="rowsremain  @if(strtolower($i->sort_order)=='2' && $i->promo_behaviour!='none') center @endif">
			<div class="prices">
				@if($i->price_type=='Recurring')
				<strong><i>RM</i>{{$i->price_monthly or '0'}}<i>.00/mo</i></strong>
				@endif
				@if($i->price_type=='One Time')
				<strong><i>RM</i>{{$i->price_monthly or '0'}}<i>.00/mo</i></strong>
				@endif
				@if($i->price_type=='Free')
				<strong>Free</strong>
				@endif
				<b></b>
				@if($i->enable_plan_button!='other')
				<a href="domain_configuration_hosting.html">{{$i->enable_plan_button}}</a>
				@else
				<a href="domain_configuration_hosting.html">{{$i->enable_plan_button_other}}</a>
				@endif
			</div>
		</td>
		@endforeach
		@endif
		<!-- <td class="rowsremain center">
					<div class="prices">
								<strong><i>RM</i>80<i>.00/mo</i></strong> <b></b>
								<a href="domain_configuration_hosting.html">Order Now</a>
					</div>
		</td> -->
	</tr>
</table>