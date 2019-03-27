<?php $page='domains';
$sub_page='single_domain';
$countries = App\Models\Country::all();
$breadcrumbs=[
array('url'=>false,'name'=>'Services'),
array('url'=>false,'name'=>'Domains'),
array('url'=> '/admin/domain_pricing','name'=>'Single Domain Pricing Listing'),
array('url'=>'javascript:void','name'=> "$item->title Pricing - Add New"),
];
?>
@extends('layouts.admin_layout')
@section('title','Admin | Single Domain Pricing - Listing')
@section('content')
@section('page_header','Services')
<style>
	.strike {
		text-decoration: line-through;
	}
</style>
<!-- InstanceBeginEditable name="EditRegion2" -->
<div class="page-content">
  <div class="row">
	<div class="col-lg-12">
	  <h2>{{ $item->title }} Pricing <i class="fa fa-angle-right"></i> Add New</h2>
	  <div class="clearfix"></div>
	  @include('admin.partials.messages')
	  <div class="pull-left"> Last updated: <span class="text-blue">{{ $recent_update }}</span> </div>
	  <div class="clearfix"></div>
	  <p></p>
	  
	  <ul id="myTab" class="nav nav-tabs">
		<li class="active"><a href="#new-registrations" data-toggle="tab">New Registrations</a></li>
		<li><a href="#renewals" data-toggle="tab">Renewals</a></li>
		<li><a href="#transfers" data-toggle="tab">Transfers</a></li>
	  </ul>
	  
	  <div id="myTabContent" class="tab-content">
		<div id="new-registrations" class="tab-pane fade in active">
	  

			<div class="portlet">
			<div class="portlet-header">
			  <div class="caption">{{$item->title}} Pricing Listing</div>
			  <p class="margin-top-10px"></p>
			  <div class="clearfix"></div>
			  <div class="text-blue">This is where you configure the TLDs that you want to allow clients to register or transfer to you. As well as pricing, you can set which addons are offered with each TLD. If an EPP code is required for transfers, tick the EPP Code box. If DNS Management, Email Forwarding or ID Protection is available &amp; should be offered for this TLD check the boxes.</div>
			  <div class="xss-margin"></div>
			  <a href="#" data-target="#modal-add-new-price" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
			  <a href="javascript:void(0)" class="btn btn-warning">Update All Pricing &nbsp;<i class="fa fa-refresh"></i></a>&nbsp;
			  <div class="btn-group">
				<button type="button" class="btn btn-primary">Delete</button>
				<button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
				<ul role="menu" class="dropdown-menu">
				  <li><a href="#" data-target="#modal-delete-selected" data-toggle="modal">Delete selected item(s)</a></li>
				  <li class="divider"></li>
				  <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
				</ul>
			  </div>
			  <!--Modal Add New Pricing start-->
			  <div id="modal-add-new-price" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				<div class="modal-dialog modal-wide-width">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
					  <h4 id="modal-login-label3" class="modal-title">Add New Pricing</h4>
					</div>
					<div class="modal-body">
					  <div class="form">
						<form class="form-horizontal" method="post" action="/admin/domain_pricing/pricing/create">
						  <div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
							  <div data-on="success" data-off="primary" class="make-switch">
								<input type="checkbox" checked="checked" name="status">
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label class="col-md-3 control-label">Country <span class="text-red">* </span></label>
							<div class="col-md-6">
							  <select name="country" class="form-control" required>
								<option value="">-- Please select --</option>
								@foreach ($countries as $c)
									<option value="{{$c->sortname}}">{{$c->name}}</option>
								@endforeach
							  </select>
							  {{ csrf_field() }}
							  <input type="hidden" name="domain_pricing_id" value="{{$item->id}}">
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
							<div class="col-md-6">
							  <input type="text" class="form-control" name="tld" placeholder="eg .com.my" required>
							</div>
						  </div> 
						  <div class="form-group">
							 <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>
							 <div class="col-md-6">
								<div class="xss-margin"></div>
								<div class="checkbox-list">
									<label><input id="inlineCheckbox1" name="epp_code" type="radio" value="1" checked="checked"/>&nbsp; Enabled</label>
									<label><input id="inlineCheckbox1" name="epp_code" type="radio" value="0"/>&nbsp; Disabled</label>
								 </div>
							 </div>
						  </div> 
						  
						  <div class="form-group">
							 <label class="col-md-3 control-label">Domain Addons</label>
							 <div class="col-md-6">
								<div class="xss-margin"></div>
								<div class="checkbox-list">
									<label><input id="create-select-all" type="checkbox" value="Select all"/>&nbsp; Select all</label>
									<label><input class="create-select" name="addons[]" type="checkbox" value="DNS Managment"/>&nbsp; DNS Management</label>
									<label><input class="create-select" name="addons[]" type="checkbox" value="Email Forwarding"/>&nbsp; Email Forwarding</label>
									<label><input class="create-select" name="addons[]" type="checkbox" value="ID Protection"/>&nbsp; ID Protection</label>
								 </div>
							 </div>
						  </div> 
						  <div class="table-responsive mtl">
							<table class="table table-hover table-striped">
							  <thead>
								<tr>
								  <th>Domain Pricing (RM)</th>
								  <th>1 Year</th>
								  <th>2 Years</th>
								  <th>3 Years</th>
								  <th>4 Years</th>
								  <th>5 Years</th>
								  <th>6 Years</th>
								  <th>7 Years</th>
								  <th>8 Years</th>
								  <th>9 Years</th>
								  <th>10 Years</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
									<td>Sale Price</td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[1]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[]" class="form-control text-red"></td>
								 </tr>      
								 <tr>
									<td>List Price</td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[1]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
									<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[]" class="form-control"></td>
								 </tr>   
							   </tbody>
							   <tfoot>
								<tr colspan="11"></tr>
							   </tfoot>
							</table>
						 </div><!-- end table responsive -->
													  
						  <div class="form-actions">
							<div class="col-md-offset-5 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <!--END MODAL Add New Pricing-->
			  <!--Modal delete selected items start-->
			  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
					  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
					</div>
					<div class="modal-body">
						<div id="delete-selected-content">
							<p><strong>#1:</strong> .com.my</p>
						</div>
					  <div class="form-actions">
						<div class="col-md-offset-4 col-md-8">
						<form action="/admin/domain_pricing/pricing" method="POST" style="display:inline">
							<input type="hidden" name="_method" value="DELETE">
							{{ csrf_field() }}
							<input type="hidden" name="ids" id="delete-selected-ids">
							<button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>
						</form>
						&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <!-- modal delete selected items end -->
			  <!--Modal delete all items start-->
			  <div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
						  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
						</div>
						<div class="modal-body">
						  <div class="form-actions">
							<div class="col-md-offset-4 col-md-8">
							<form action="/admin/domain_pricing/pricing/all" method="POST" style="display:inline">
								<input type="hidden" name="_method" value="DELETE">
								{{ csrf_field() }}
								<button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>
							</form>

							&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- modal delete all items end -->
				  <!--Modal delete start-->
				  <div id="modal-delete-pricing" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				  	  <div class="modal-dialog">
				  		<div class="modal-content">
				  		  <div class="modal-header">
				  			<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
				  			<h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
				  		  </div>
				  		  <div class="modal-body">
				  			<p><strong>#<span id="delete-single-id">2</span>:</strong> <span id="delete-single-tld">.com.my</span></p>
				  			<div class="form-actions">

				  			  <div class="col-md-offset-4 col-md-8">
				  			  	<form action="/admin/domain_pricing/pricing/" method="POST" id="delete-single-form" style="display: inline">
				  			  		<input type="hidden" name="_method" value="DELETE">
				  			  		{{ csrf_field() }}
				  			  		<button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>
				  			  	</form>
				  			  	&nbsp; 
				  			  	<a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
				  			</div>
				  		  </div>
				  		</div>
				  	  </div>
				    </div>
				    <!-- modal delete end -->

			  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
			</div>
			<div class="portlet-body">
			  <div class="form-inline pull-left">
				<div class="form-group">
				  <select name="select" id="pages" class="form-control">
					<option value="10" <?=$items->perPage() == 10 ? 'selected' : ''?>>10</option>
					<option value="20" <?=$items->perPage() == 20 ? 'selected' : ''?>>20</option>
					<option value="30" <?=$items->perPage() == 30 ? 'selected' : ''?>>30</option>
					<option value="50" <?=$items->perPage() == 50 ? 'selected' : ''?>>50</option>
					<option value="100" <?=$items->perPage() == 100 ? 'selected' : ''?>>100</option>
				  </select>

				  &nbsp;
				  <label class="control-label">Records per page</label>
				</div>
			  </div>
			 
			  <div class="clearfix"></div>

			  <div class="table-responsive mtl">
				<table class="table table-hover table-striped">
				  <thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th colspan="10"><div class="alicent">Per Year Pricing (RM)</div></th>
						<th></th>
						<th></th>
					</tr>
					<tr>
					  <th width="1%"><input type="checkbox" id="select-all"></th>	
					  <th>#</th>
					  <th>TLD</th>
					  <th>1 Year</th>
					  <th>2 Years</th>
					  <th>3 Years</th>
					  <th>4 Years</th>
					  <th>5 Years</th>
					  <th>6 Years</th>
					  <th>7 Years</th>
					  <th>8 Years</th>
					  <th>9 Years</th>
					  <th>10 Years</th>
					  <th>Status</th>
					  <th>Action</th>
					</tr>
				  </thead>
				  <tbody>
					@foreach ($items as $i)
					<tr>
						<td><input type="checkbox" class="select-items" data-id="{{$i->id}}" data-tld="{{$i->tld}}"></td>
						<td>{{ $i->id }}</td>
						<td>{{ $i->tld }}</td>
						@php
							$prices = json_decode($i->pricing, true);
						@endphp
						@foreach ($prices as $p)
							<td>
								<span class="text-red">{{ $p['s'] }}*</span>
								<br>
								<span class="strike">{{ $p['l'] }}*</span>
							</td>
						@endforeach
						<td>
							@if ($i->status)
								<span class="label label-xs label-success">Active</span>
							@else
								<span class="label label-xs label-danger">Inactive</span>
							@endif
						</td>
						<td>
							<a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-{{ $i->id }}" data-toggle="modal" title="Edit" data="{{json_encode($i, true)}}">
								<span class="label label-sm label-success"><i class="fa fa-pencil"></i></span>
							</a>
							<a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-pricing" data-toggle="modal" data-id="{{$i->id}}" data-tld="{{$i->tld}}">
								<span class="label label-sm label-red">
									<i class="fa fa-trash-o"></i>
								</span>
							</a> 
						</td>
					</tr>  
					@endforeach
				  </tbody>
				  <tfoot>
					<tr>
					  <td colspan="15"></td>
					</tr>
				  </tfoot>
				</table>
				@foreach ($items as $i)
					<!--Modal Add New Pricing start-->
					  <div id="modal-edit-price-{{ $i->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
						<div class="modal-dialog modal-wide-width">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
							  <h4 id="modal-login-label3" class="modal-title">Edit Pricing</h4>
							</div>
							<div class="modal-body">
							  <div class="form">
								<form class="form-horizontal" method="post" action="/admin/domain_pricing/pricing/edit/{{ $i->id }}">
								  <div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-6">
									  <div data-on="success" data-off="primary" class="make-switch">
										<input type="checkbox" {{ $i->status ? 'checked' : '' }} name="status">
									  </div>
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-md-3 control-label">Country <span class="text-red">* </span></label>
									<div class="col-md-6">
									  <select name="country" class="form-control" required>
										<option value="">-- Please select --</option>
										@foreach ($countries as $c)
											@php
												$selected = ($i->country === $c->sortname) ? 'selected' : '';
											@endphp
											<option value="{{$c->sortname}}" {{$selected}}>{{$c->name}}</option>
										@endforeach
									  </select>
									  {{ csrf_field() }}
									  <input type="hidden" name="domain_pricing_id" value="{{$item->id}}">
									</div>
								  </div>
								  <div class="form-group">
									<label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
									<div class="col-md-6">
									  <input type="text" class="form-control" name="tld" placeholder="eg .com.my" required value="{{ $i->tld }}">
									</div>
								  </div> 
								  <div class="form-group">
									 <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>
									 <div class="col-md-6">
										<div class="xss-margin"></div>
										<div class="checkbox-list">
											<label><input id="inlineCheckbox1" name="epp_code" type="radio" value="1" {{ $i->epp_code ? 'checked' : '0' }}>&nbsp; Enabled</label>
											<label><input id="inlineCheckbox1" name="epp_code" type="radio" value="0" {{ !$i->epp_code ? 'checked' : '0' }}>&nbsp; Disabled</label>
										 </div>
									 </div>
								  </div> 
								  
								  <div class="form-group">
									 <label class="col-md-3 control-label">Domain Addons</label>
										@php
											$addons = explode(';', $i->addons);
										@endphp
									 <div class="col-md-6">
										<div class="xss-margin"></div>
										<div class="checkbox-list">
											<label><input id="edit-select-all" type="checkbox" value="Select all" <?=in_array('Select all', $addons)?'checked' :''?>>&nbsp; Select all</label>
											<label><input class="edit-select" name="addons[]" type="checkbox" value="DNS Managment" <?=in_array('DNS Managment', $addons)?'checked' :''?>>&nbsp; DNS Management</label>
											<label><input class="edit-select" name="addons[]" type="checkbox" value="Email Forwarding" <?=in_array('Email Forwarding', $addons)?'checked' :''?>>&nbsp; Email Forwarding</label>
											<label><input class="edit-select" name="addons[]" type="checkbox" value="ID Protection" <?=in_array('ID Protection', $addons)?'checked' :''?>>&nbsp; ID Protection</label>
										 </div>
									 </div>
								  </div> 
								  <div class="table-responsive mtl">
									<table class="table table-hover table-striped">
									  <thead>
										<tr>
										  <th>Domain Pricing (RM)</th>
										  <th>1 Year</th>
										  <th>2 Years</th>
										  <th>3 Years</th>
										  <th>4 Years</th>
										  <th>5 Years</th>
										  <th>6 Years</th>
										  <th>7 Years</th>
										  <th>8 Years</th>
										  <th>9 Years</th>
										  <th>10 Years</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											@php
												$p = json_decode($i->pricing, true);
											@endphp
											<td>Sale Price</td>
											@for ($i = 1; $i <= 10; $i++)
												<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[{{$i}}]" class="form-control text-red" value="{{$p[$i]['s'] }}"></td>
											@endfor
										 </tr>      
										 <tr>
											<td>List Price</td>
											@for ($i = 1; $i <= 10; $i++)
												<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[{{$i}}]" class="form-control" value="{{$p[$i]['l'] }}"></td>
											@endfor
										 </tr>   
									   </tbody>
									   <tfoot>
										<tr colspan="11"></tr>
									   </tfoot>
									</table>
								 </div><!-- end table responsive -->
															  
								  <div class="form-actions">
									<div class="col-md-offset-5 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
								  </div>
								</form>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					  <!--END MODAL Add New Pricing-->
				@endforeach
				<div class="tool-footer text-right">
				<p class="pull-left">Showing {{ ($items->currentPage() - 1) * $items->perPage() + 1 ?:1}} to {{ $items->currentPage() * $items->perPage() }} of {{$items->total()}} entries</p>
				{{ $items->links() }}
			  </div>
			  <div class="clearfix"></div>
				
				<div class="clearfix"></div>
			  </div><!-- end table responsive -->
			  
				 
			</div>
		  </div><!-- End portlet -->
		
		</div><!-- end new registration pricing tab -->
		
		
		<div id="renewals" class="tab-pane fade in">
	  

			<div class="portlet">
			<div class="portlet-header">
			  <div class="caption">Malaysia TLD Pricing Listing</div>
			  <p class="margin-top-10px"></p>
			  <div class="clearfix"></div>
			  <div class="text-blue">This is where you configure the TLDs that you want to allow clients to register or transfer to you. As well as pricing, you can set which addons are offered with each TLD. If an EPP code is required for transfers, tick the EPP Code box. If DNS Management, Email Forwarding or ID Protection is available &amp; should be offered for this TLD check the boxes.</div>
			  <div class="xss-margin"></div>
			  <a href="#" data-target="#modal-add-new-price-renewal" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
			  <a href="#" class="btn btn-warning">Update All Pricing &nbsp;<i class="fa fa-refresh"></i></a>&nbsp;
			  <div class="btn-group">
				<button type="button" class="btn btn-primary">Delete</button>
				<button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
				<ul role="menu" class="dropdown-menu">
				  <li><a href="#" data-target="#modal-delete-selected-renewal" data-toggle="modal">Delete selected item(s)</a></li>
				  <li class="divider"></li>
				  <li><a href="#" data-target="#modal-delete-all-renewal" data-toggle="modal">Delete all</a></li>
				</ul>
			  </div>
			  <!--Modal Add New Pricing renewal start-->
			  <div id="modal-add-new-price-renewal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				<div class="modal-dialog modal-wide-width">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
					  <h4 id="modal-login-label3" class="modal-title">Add New Pricing</h4>
					</div>
					<div class="modal-body">
					  <div class="form">
						<form class="form-horizontal" action="/admin/domain_pricing/pricing/create" method="post">
						  <div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
							  <div data-on="success" data-off="primary" class="make-switch">
								<input type="checkbox" checked="checked" name="status">
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label class="col-md-3 control-label">Country <span class="text-red">* </span></label>
							<div class="col-md-6">
							  <select name="country" class="form-control">
								<option>-- Please select --</option>
								@php
									$countries = App\Models\Country::all();
								@endphp
								@foreach ($countries as $i)
									<option value="{{$i->sortname}}">{{$i->name}}</option>
								@endforeach
							  </select>
							</div>
						  </div>
						  <div class="form-group">
							<label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
							<div class="col-md-6">
							  <input type="text" class="form-control" name="tld" placeholder="eg .com.my" required>
							</div>
						  </div>  
						  
						  <div class="form-group">
							 <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>

							 <div class="col-md-6">
								<div class="xss-margin"></div>
								<div class="checkbox-list">
									<label><input name="epp_code" type="radio" value="1" checked="checked"/>&nbsp; Enabled</label>
									<label><input name="epp_code" type="radio" value="0"/>&nbsp; Disabled</label>
								 </div>
							 </div>
						  </div> 
						  
						  <div class="form-group">
							 <label class="col-md-3 control-label">Domain Addons</label>

							 <div class="col-md-6">
								<div class="xss-margin"></div>
								<div class="checkbox-list">
									<label><input id="inlineCheckbox1" type="checkbox" value="option5"/>&nbsp; Select all</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option6"/>&nbsp; DNS Management</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; Email Forwarding</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; ID Protection</label>

								 </div>
							 </div>
						  </div>
						  
						  <div class="table-responsive mtl">
							<table class="table table-hover table-striped">
							  <thead>
								
								<tr>
								  <th>Domain Pricing (RM)</th>
								  <th>1 Year</th>
								  <th>2 Years</th>
								  <th>3 Years</th>
								  <th>4 Years</th>
								  <th>5 Years</th>
								  <th>6 Years</th>
								  <th>7 Years</th>
								  <th>8 Years</th>
								  <th>9 Years</th>
								  <th>10 Years</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
									<td>Sale Price</td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
								 </tr>      
								 <tr>
									<td>List Price</td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
								 </tr>   
							   </tbody>
							   <tfoot>
								<tr colspan="11"></tr>
							   </tfoot>
							</table>
						 </div><!-- end table responsive -->
													  
						  <div class="form-actions">
							<div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <!--END MODAL Add New Pricing renewal -->
			  <!--Modal delete selected items start-->
			  <div id="modal-delete-selected-renewal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
					  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
					</div>
					<div class="modal-body">
					  <p><strong>#1:</strong> .com.my</p>
					  <div class="form-actions">
						<div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <!-- modal delete selected items end -->
			  <!--Modal delete all items renewal start-->
			  <div id="modal-delete-all-renewal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
						  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
						</div>
						<div class="modal-body">
						  <div class="form-actions">
							<div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- modal delete all items renewal end -->

			  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
			</div>
			<div class="portlet-body">
			
			  <div class="form-inline pull-left">
				<div class="form-group">
				  <select name="select" class="form-control">
					<option>10</option>
					<option>20</option>
					<option>30</option>
					<option>50</option>
					<option selected="selected">100</option>
				  </select>
				  &nbsp;
				  <label class="control-label">Records per page</label>
				</div>
			  </div>
			 
			  <div class="clearfix"></div>

			  <div class="table-responsive mtl">
				<table class="table table-hover table-striped">
				  <thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th colspan="10"><div class="alicent">Per Year Pricing (RM)</div></th>
						<th></th>
						<th></th>
					</tr>
					<tr>
					  <th width="1%"><input type="checkbox"/></th>	
					  <th>#</th>
					  <th>TLD</th>
					  <th>1 Year</th>
					  <th>2 Years</th>
					  <th>3 Years</th>
					  <th>4 Years</th>
					  <th>5 Years</th>
					  <th>6 Years</th>
					  <th>7 Years</th>
					  <th>8 Years</th>
					  <th>9 Years</th>
					  <th>10 Years</th>
					  <th>Status</th>
					  <th>Action</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td><input type="checkbox"/></td>
					  <td>2</td>
					  <td>.com.my</td>
					  <td><span class="text-red">9.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">38.49*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">55.59*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="label label-xs label-success">Active</span></td>
					  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-renewal" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-price-renewal" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>  					
					  <!--Modal Edit Pricing renewal start-->
					  <div id="modal-edit-price-renewal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
						<div class="modal-dialog modal-wide-width">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
							  <h4 id="modal-login-label3" class="modal-title">Edit Pricing</h4>
							</div>
							<div class="modal-body">
							  <div class="form">
								<form class="form-horizontal">
								  <div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-6">
									  <div data-on="success" data-off="primary" class="make-switch">
										<input type="checkbox" checked="checked"/>
									  </div>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="col-md-3 control-label">Country <span class="text-red">* </span></label>
									<div class="col-md-6">
									  <select name="select" class="form-control">
										<option>-- Please select --</option>
										<option data-calling-code="93" data-eu-tax="unknown" value="AF">Afghanistan</option>
										<option data-calling-code="358" data-eu-tax="unknown" value="AX">Åland Islands</option>
										<option data-calling-code="355" data-eu-tax="unknown" value="AL">Albania</option>
										<option data-calling-code="213" data-eu-tax="unknown" value="DZ">Algeria</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="AS">American Samoa</option>
										<option data-calling-code="376" data-eu-tax="unknown" value="AD">Andorra</option>
										<option data-calling-code="244" data-eu-tax="unknown" value="AO">Angola</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="AI">Anguilla</option>
										<option data-calling-code="672" data-eu-tax="unknown" value="AQ">Antarctica</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="AG">Antigua and Barbuda</option>
										<option data-calling-code="54" data-eu-tax="unknown" value="AR">Argentina</option>
										<option data-calling-code="374" data-eu-tax="unknown" value="AM">Armenia</option>
										<option data-calling-code="297" data-eu-tax="unknown" value="AW">Aruba</option>
										<option data-calling-code="61" data-eu-tax="unknown" value="AU">Australia</option>
										<option data-calling-code="43" data-eu-tax="yes" value="AT">Austria</option>
										<option data-calling-code="994" data-eu-tax="unknown" value="AZ">Azerbaijan</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="BS">Bahamas</option>
										<option data-calling-code="973" data-eu-tax="unknown" value="BH">Bahrain</option>
										<option data-calling-code="880" data-eu-tax="unknown" value="BD">Bangladesh</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="BB">Barbados</option>
										<option data-calling-code="375" data-eu-tax="unknown" value="BY">Belarus</option>
										<option data-calling-code="32" data-eu-tax="yes" value="BE">Belgium</option>
										<option data-calling-code="501" data-eu-tax="unknown" value="BZ">Belize</option>
										<option data-calling-code="229" data-eu-tax="unknown" value="BJ">Benin</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="BM">Bermuda</option>
										<option data-calling-code="975" data-eu-tax="unknown" value="BT">Bhutan</option>
										<option data-calling-code="591" data-eu-tax="unknown" value="BO">Bolivia, Plurinational State of</option>
										<option data-calling-code="387" data-eu-tax="unknown" value="BA">Bosnia and Herzegovina</option>
										<option data-calling-code="267" data-eu-tax="unknown" value="BW">Botswana</option>
										<option data-calling-code="55" data-eu-tax="unknown" value="BR">Brazil</option>
										<option data-calling-code="246" data-eu-tax="unknown" value="IO">British Indian Ocean Territory</option>
										<option data-calling-code="673" data-eu-tax="unknown" value="BN">Brunei Darussalam</option>
										<option data-calling-code="359" data-eu-tax="yes" value="BG">Bulgaria</option>
										<option data-calling-code="226" data-eu-tax="unknown" value="BF">Burkina Faso</option>
										<option data-calling-code="257" data-eu-tax="unknown" value="BI">Burundi</option>
										<option data-calling-code="855" data-eu-tax="unknown" value="KH">Cambodia</option>
										<option data-calling-code="237" data-eu-tax="unknown" value="CM">Cameroon</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="CA">Canada</option>
										<option data-calling-code="238" data-eu-tax="unknown" value="CV">Cape Verde</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="KY">Cayman Islands</option>
										<option data-calling-code="236" data-eu-tax="unknown" value="CF">Central African Republic</option>
										<option data-calling-code="235" data-eu-tax="unknown" value="TD">Chad</option>
										<option data-calling-code="56" data-eu-tax="unknown" value="CL">Chile</option>
										<option data-calling-code="86" data-eu-tax="unknown" value="CN">China</option>
										<option data-calling-code="61" data-eu-tax="unknown" value="CX">Christmas Island</option>
										<option data-calling-code="61" data-eu-tax="unknown" value="CC">Cocos (Keeling) Islands</option>
										<option data-calling-code="57" data-eu-tax="unknown" value="CO">Colombia</option>
										<option data-calling-code="269" data-eu-tax="unknown" value="KM">Comoros</option>
										<option data-calling-code="242" data-eu-tax="unknown" value="CG">Congo</option>
										<option data-calling-code="243" data-eu-tax="unknown" value="CD">Congo, the Democratic Republic of the</option>
										<option data-calling-code="682" data-eu-tax="unknown" value="CK">Cook Islands</option>
										<option data-calling-code="506" data-eu-tax="unknown" value="CR">Costa Rica</option>
										<option data-calling-code="225" data-eu-tax="unknown" value="CI">Côte d'Ivoire</option>
										<option data-calling-code="385" data-eu-tax="yes" value="HR">Croatia</option>
										<option data-calling-code="53" data-eu-tax="unknown" value="CU">Cuba</option>
										<option data-calling-code="357" data-eu-tax="yes" value="CY">Cyprus</option>
										<option data-calling-code="420" data-eu-tax="yes" value="CZ">Czech Republic</option>
										<option data-calling-code="45" data-eu-tax="yes" value="DK">Denmark</option>
										<option data-calling-code="253" data-eu-tax="unknown" value="DJ">Djibouti</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="DM">Dominica</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="DO">Dominican Republic</option>
										<option data-calling-code="593" data-eu-tax="unknown" value="EC">Ecuador</option>
										<option data-calling-code="20" data-eu-tax="unknown" value="EG">Egypt</option>
										<option data-calling-code="503" data-eu-tax="unknown" value="SV">El Salvador</option>
										<option data-calling-code="240" data-eu-tax="unknown" value="GQ">Equatorial Guinea</option>
										<option data-calling-code="291" data-eu-tax="unknown" value="ER">Eritrea</option>
										<option data-calling-code="372" data-eu-tax="yes" value="EE">Estonia</option>
										<option data-calling-code="251" data-eu-tax="unknown" value="ET">Ethiopia</option>
										<option data-calling-code="500" data-eu-tax="unknown" value="FK">Falkland Islands (Malvinas)</option>
										<option data-calling-code="298" data-eu-tax="unknown" value="FO">Faroe Islands</option>
										<option data-calling-code="679" data-eu-tax="unknown" value="FJ">Fiji</option>
										<option data-calling-code="358" data-eu-tax="yes" value="FI">Finland</option>
										<option data-calling-code="33" data-eu-tax="yes" value="FR">France</option>
										<option data-calling-code="594" data-eu-tax="unknown" value="GF">French Guiana</option>
										<option data-calling-code="689" data-eu-tax="unknown" value="PF">French Polynesia</option>
										<option data-calling-code="262" data-eu-tax="unknown" value="TF">French Southern Territories</option>
										<option data-calling-code="241" data-eu-tax="unknown" value="GA">Gabon</option>
										<option data-calling-code="220" data-eu-tax="unknown" value="GM">Gambia</option>
										<option data-calling-code="995" data-eu-tax="unknown" value="GE">Georgia</option>
										<option data-calling-code="49" data-eu-tax="yes" value="DE">Germany</option>
										<option data-calling-code="233" data-eu-tax="unknown" value="GH">Ghana</option>
										<option data-calling-code="350" data-eu-tax="unknown" value="GI">Gibraltar</option>
										<option data-calling-code="30" data-eu-tax="yes" value="GR">Greece</option>
										<option data-calling-code="299" data-eu-tax="unknown" value="GL">Greenland</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="GD">Grenada</option>
										<option data-calling-code="590" data-eu-tax="unknown" value="GP">Guadeloupe</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="GU">Guam</option>
										<option data-calling-code="502" data-eu-tax="unknown" value="GT">Guatemala</option>
										<option data-calling-code="44" data-eu-tax="unknown" value="GG">Guernsey</option>
										<option data-calling-code="224" data-eu-tax="unknown" value="GN">Guinea</option>
										<option data-calling-code="245" data-eu-tax="unknown" value="GW">Guinea-Bissau</option>
										<option data-calling-code="592" data-eu-tax="unknown" value="GY">Guyana</option>
										<option data-calling-code="509" data-eu-tax="unknown" value="HT">Haiti</option>
										<option data-calling-code="3906" data-eu-tax="unknown" value="VA">Holy See (Vatican City State)</option>
										<option data-calling-code="504" data-eu-tax="unknown" value="HN">Honduras</option>
										<option data-calling-code="852" data-eu-tax="unknown" value="HK">Hong Kong</option>
										<option data-calling-code="36" data-eu-tax="yes" value="HU">Hungary</option>
										<option data-calling-code="354" data-eu-tax="unknown" value="IS">Iceland</option>
										<option data-calling-code="91" data-eu-tax="unknown" value="IN">India</option>
										<option data-calling-code="62" data-eu-tax="unknown" value="ID">Indonesia</option>
										<option data-calling-code="98" data-eu-tax="unknown" value="IR">Iran, Islamic Republic of</option>
										<option data-calling-code="964" data-eu-tax="unknown" value="IQ">Iraq</option>
										<option data-calling-code="353" data-eu-tax="yes" value="IE">Ireland</option>
										<option data-calling-code="44" data-eu-tax="yes" value="IM">Isle of Man</option>
										<option data-calling-code="972" data-eu-tax="unknown" value="IL">Israel</option>
										<option data-calling-code="39" data-eu-tax="yes" value="IT">Italy</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="JM">Jamaica</option>
										<option data-calling-code="81" data-eu-tax="unknown" value="JP">Japan</option>
										<option data-calling-code="44" data-eu-tax="unknown" value="JE">Jersey</option>
										<option data-calling-code="962" data-eu-tax="unknown" value="JO">Jordan</option>
										<option data-calling-code="7" data-eu-tax="unknown" value="KZ">Kazakhstan</option>
										<option data-calling-code="254" data-eu-tax="unknown" value="KE">Kenya</option>
										<option data-calling-code="686" data-eu-tax="unknown" value="KI">Kiribati</option>
										<option data-calling-code="850" data-eu-tax="unknown" value="KP">Korea, Democratic People's Republic of</option>
										<option data-calling-code="82" data-eu-tax="unknown" value="KR">Korea, Republic of</option>
										<option data-calling-code="965" data-eu-tax="unknown" value="KW">Kuwait</option>
										<option data-calling-code="996" data-eu-tax="unknown" value="KG">Kyrgyzstan</option>
										<option data-calling-code="856" data-eu-tax="unknown" value="LA">Lao People's Democratic Republic</option>
										<option data-calling-code="371" data-eu-tax="yes" value="LV">Latvia</option>
										<option data-calling-code="961" data-eu-tax="unknown" value="LB">Lebanon</option>
										<option data-calling-code="266" data-eu-tax="unknown" value="LS">Lesotho</option>
										<option data-calling-code="231" data-eu-tax="unknown" value="LR">Liberia</option>
										<option data-calling-code="218" data-eu-tax="unknown" value="LY">Libyan Arab Jamahiriya</option>
										<option data-calling-code="423" data-eu-tax="unknown" value="LI">Liechtenstein</option>
										<option data-calling-code="370" data-eu-tax="yes" value="LT">Lithuania</option>
										<option data-calling-code="352" data-eu-tax="yes" value="LU">Luxembourg</option>
										<option data-calling-code="853" data-eu-tax="unknown" value="MO">Macao</option>
										<option data-calling-code="389" data-eu-tax="unknown" value="MK">Macedonia, the former Yugoslav Republic of</option>
										<option data-calling-code="261" data-eu-tax="unknown" value="MG">Madagascar</option>
										<option data-calling-code="265" data-eu-tax="unknown" value="MW">Malawi</option>
										<option data-calling-code="60" data-eu-tax="unknown" value="MY" selected="selected">Malaysia</option>
										<option data-calling-code="960" data-eu-tax="unknown" value="MV">Maldives</option>
										<option data-calling-code="223" data-eu-tax="unknown" value="ML">Mali</option>
										<option data-calling-code="356" data-eu-tax="yes" value="MT">Malta</option>
										<option data-calling-code="692" data-eu-tax="unknown" value="MH">Marshall Islands</option>
										<option data-calling-code="596" data-eu-tax="unknown" value="MQ">Martinique</option>
										<option data-calling-code="222" data-eu-tax="unknown" value="MR">Mauritania</option>
										<option data-calling-code="230" data-eu-tax="unknown" value="MU">Mauritius</option>
										<option data-calling-code="262" data-eu-tax="unknown" value="YT">Mayotte</option>
										<option data-calling-code="52" data-eu-tax="unknown" value="MX">Mexico</option>
										<option data-calling-code="691" data-eu-tax="unknown" value="FM">Micronesia, Federated States of</option>
										<option data-calling-code="373" data-eu-tax="unknown" value="MD">Moldova, Republic of</option>
										<option data-calling-code="377" data-eu-tax="yes" value="MC">Monaco</option>
										<option data-calling-code="976" data-eu-tax="unknown" value="MN">Mongolia</option>
										<option data-calling-code="382" data-eu-tax="unknown" value="ME">Montenegro</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="MS">Montserrat</option>
										<option data-calling-code="212" data-eu-tax="unknown" value="MA">Morocco</option>
										<option data-calling-code="258" data-eu-tax="unknown" value="MZ">Mozambique</option>
										<option data-calling-code="94" data-eu-tax="unknown" value="MM">Myanmar</option>
										<option data-calling-code="264" data-eu-tax="unknown" value="NA">Namibia</option>
										<option data-calling-code="674" data-eu-tax="unknown" value="NR">Nauru</option>
										<option data-calling-code="977" data-eu-tax="unknown" value="NP">Nepal</option>
										<option data-calling-code="31" data-eu-tax="yes" value="NL">Netherlands</option>
										<option data-calling-code="599" data-eu-tax="unknown" value="AN">Netherlands Antilles</option>
										<option data-calling-code="687" data-eu-tax="unknown" value="NC">New Caledonia</option>
										<option data-calling-code="64" data-eu-tax="unknown" value="NZ">New Zealand</option>
										<option data-calling-code="505" data-eu-tax="unknown" value="NI">Nicaragua</option>
										<option data-calling-code="227" data-eu-tax="unknown" value="NE">Niger</option>
										<option data-calling-code="234" data-eu-tax="unknown" value="NG">Nigeria</option>
										<option data-calling-code="683" data-eu-tax="unknown" value="NU">Niue</option>
										<option data-calling-code="672" data-eu-tax="unknown" value="NF">Norfolk Island</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="MP">Northern Mariana Islands</option>
										<option data-calling-code="47" data-eu-tax="unknown" value="NO">Norway</option>
										<option data-calling-code="968" data-eu-tax="unknown" value="OM">Oman</option>
										<option data-calling-code="92" data-eu-tax="unknown" value="PK">Pakistan</option>
										<option data-calling-code="680" data-eu-tax="unknown" value="PW">Palau</option>
										<option data-calling-code="970" data-eu-tax="unknown" value="PS">Palestinian Territory, Occupied</option>
										<option data-calling-code="507" data-eu-tax="unknown" value="PA">Panama</option>
										<option data-calling-code="675" data-eu-tax="unknown" value="PG">Papua New Guinea</option>
										<option data-calling-code="595" data-eu-tax="unknown" value="PY">Paraguay</option>
										<option data-calling-code="51" data-eu-tax="unknown" value="PE">Peru</option>
										<option data-calling-code="63" data-eu-tax="unknown" value="PH">Philippines</option>
										<option data-calling-code="649" data-eu-tax="unknown" value="PN">Pitcairn</option>
										<option data-calling-code="48" data-eu-tax="yes" value="PL">Poland</option>
										<option data-calling-code="351" data-eu-tax="yes" value="PT">Portugal</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="PR">Puerto Rico</option>
										<option data-calling-code="974" data-eu-tax="unknown" value="QA">Qatar</option>
										<option data-calling-code="262" data-eu-tax="unknown" value="RE">Réunion</option>
										<option data-calling-code="40" data-eu-tax="yes" value="RO">Romania</option>
										<option data-calling-code="7" data-eu-tax="unknown" value="RU">Russian Federation</option>
										<option data-calling-code="250" data-eu-tax="unknown" value="RW">Rwanda</option>
										<option data-calling-code="590" data-eu-tax="unknown" value="BL">Saint Barthélemy</option>
										<option data-calling-code="290" data-eu-tax="unknown" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="KN">Saint Kitts and Nevis</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="LC">Saint Lucia</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="MF">Saint Martin (French part)</option>
										<option data-calling-code="508" data-eu-tax="unknown" value="PM">Saint Pierre and Miquelon</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="VC">Saint Vincent and the Grenadines</option>
										<option data-calling-code="685" data-eu-tax="unknown" value="WS">Samoa</option>
										<option data-calling-code="378" data-eu-tax="unknown" value="SM">San Marino</option>
										<option data-calling-code="239" data-eu-tax="unknown" value="ST">Sao Tome and Principe</option>
										<option data-calling-code="966" data-eu-tax="unknown" value="SA">Saudi Arabia</option>
										<option data-calling-code="221" data-eu-tax="unknown" value="SN">Senegal</option>
										<option data-calling-code="382" data-eu-tax="unknown" value="RS">Serbia</option>
										<option data-calling-code="248" data-eu-tax="unknown" value="SC">Seychelles</option>
										<option data-calling-code="232" data-eu-tax="unknown" value="SL">Sierra Leone</option>
										<option data-calling-code="65" data-eu-tax="unknown" value="SG">Singapore</option>
										<option data-calling-code="421" data-eu-tax="yes" value="SK">Slovakia</option>
										<option data-calling-code="386" data-eu-tax="yes" value="SI">Slovenia</option>
										<option data-calling-code="677" data-eu-tax="unknown" value="SB">Solomon Islands</option>
										<option data-calling-code="252" data-eu-tax="unknown" value="SO">Somalia</option>
										<option data-calling-code="27" data-eu-tax="unknown" value="ZA">South Africa</option>
										<option data-calling-code="34" data-eu-tax="yes" value="ES">Spain</option>
										<option data-calling-code="94" data-eu-tax="unknown" value="LK">Sri Lanka</option>
										<option data-calling-code="249" data-eu-tax="unknown" value="SD">Sudan</option>
										<option data-calling-code="597" data-eu-tax="unknown" value="SR">Suriname</option>
										<option data-calling-code="" data-eu-tax="unknown" value="SJ">Svalbard and Jan Mayen</option>
										<option data-calling-code="268" data-eu-tax="unknown" value="SZ">Swaziland</option>
										<option data-calling-code="46" data-eu-tax="yes" value="SE">Sweden</option>
										<option data-calling-code="41" data-eu-tax="unknown" value="CH">Switzerland</option>
										<option data-calling-code="963" data-eu-tax="unknown" value="SY">Syrian Arab Republic</option>
										<option data-calling-code="886" data-eu-tax="unknown" value="TW">Taiwan</option>
										<option data-calling-code="992" data-eu-tax="unknown" value="TJ">Tajikistan</option>
										<option data-calling-code="255" data-eu-tax="unknown" value="TZ">Tanzania, United Republic of</option>
										<option data-calling-code="66" data-eu-tax="unknown" value="TH">Thailand</option>
										<option data-calling-code="670" data-eu-tax="unknown" value="TL">Timor-Leste</option>
										<option data-calling-code="228" data-eu-tax="unknown" value="TG">Togo</option>
										<option data-calling-code="690" data-eu-tax="unknown" value="TK">Tokelau</option>
										<option data-calling-code="676" data-eu-tax="unknown" value="TO">Tonga</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="TT">Trinidad and Tobago</option>
										<option data-calling-code="216" data-eu-tax="unknown" value="TN">Tunisia</option>
										<option data-calling-code="90" data-eu-tax="unknown" value="TR">Turkey</option>
										<option data-calling-code="993" data-eu-tax="unknown" value="TM">Turkmenistan</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="TC">Turks and Caicos Islands</option>
										<option data-calling-code="688" data-eu-tax="unknown" value="TV">Tuvalu</option>
										<option data-calling-code="256" data-eu-tax="unknown" value="UG">Uganda</option>
										<option data-calling-code="380" data-eu-tax="unknown" value="UA">Ukraine</option>
										<option data-calling-code="971" data-eu-tax="unknown" value="AE">United Arab Emirates</option>
										<option data-calling-code="44" data-eu-tax="yes" value="GB">United Kingdom</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="US">United States</option>
										<option data-calling-code="598" data-eu-tax="unknown" value="UY">Uruguay</option>
										<option data-calling-code="998" data-eu-tax="unknown" value="UZ">Uzbekistan</option>
										<option data-calling-code="678" data-eu-tax="unknown" value="VU">Vanuatu</option>
										<option data-calling-code="58" data-eu-tax="unknown" value="VE">Venezuela, Bolivarian Republic of</option>
										<option data-calling-code="84" data-eu-tax="unknown" value="VN">Viet Nam</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="VG">Virgin Islands, British</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="VI">Virgin Islands, U.S.</option>
										<option data-calling-code="681" data-eu-tax="unknown" value="WF">Wallis and Futuna</option>
										<option data-calling-code="" data-eu-tax="unknown" value="EH">Western Sahara</option>
										<option data-calling-code="967" data-eu-tax="unknown" value="YE">Yemen</option>
										<option data-calling-code="260" data-eu-tax="unknown" value="ZM">Zambia</option>
										<option data-calling-code="263" data-eu-tax="unknown" value="ZW">Zimbabwe</option>
									  </select>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
									<div class="col-md-6">
									  <input type="text" class="form-control" placeholder="eg .com.my" value=".com.my">
									</div>
								  </div>  
								  
								  <div class="form-group">
									 <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>

									 <div class="col-md-6">
										<div class="xss-margin"></div>
										<div class="checkbox-list">
											<label><input id="inlineCheckbox1" type="checkbox" value="option1" checked="checked"/>&nbsp; Enabled</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option2"/>&nbsp; Disabled</label>
										 </div>
									 </div>
								  </div> 
								  
								  <div class="form-group">
									 <label class="col-md-3 control-label">Domain Addons</label>

									 <div class="col-md-6">
										<div class="xss-margin"></div>
										<div class="checkbox-list">
											<label><input id="inlineCheckbox1" type="checkbox" value="option5"/>&nbsp; Select all</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option6"/>&nbsp; DNS Management</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; Email Forwarding</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; ID Protection</label>

										 </div>
									 </div>
								  </div>
								  
								  <div class="table-responsive mtl">
									<table class="table table-hover table-striped">
									  <thead>
										
										<tr>
										  <th>Domain Pricing (RM)</th>
										  <th>1 Year</th>
										  <th>2 Years</th>
										  <th>3 Years</th>
										  <th>4 Years</th>
										  <th>5 Years</th>
										  <th>6 Years</th>
										  <th>7 Years</th>
										  <th>8 Years</th>
										  <th>9 Years</th>
										  <th>10 Years</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											<td>Sale Price</td>
											<td><input type="text" class="form-control text-red" value="9.99*"></td>
											<td><input type="text" class="form-control text-red" value="38.49*"></td>
											<td><input type="text" class="form-control text-red" value="47.99*"></td>
											<td><input type="text" class="form-control text-red" value="47.99*"></td>
											<td><input type="text" class="form-control text-red" value="55.59*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
										 </tr>      
										 <tr>
											<td>List Price</td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
										 </tr>   
									   </tbody>
									   <tfoot>
										<tr colspan="11"></tr>
									   </tfoot>
									</table>
								 </div><!-- end table responsive -->
															  
								  <div class="form-actions">
									<div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
								  </div>
								</form>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					  <!--END MODAL edit pricing renewal -->
						<!--Modal delete renewal start-->
						<div id="modal-delete-price-renewal" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
									<h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
								  </div>
								  <div class="modal-body">
									<p><strong>#2:</strong> .com.my</p>
									<div class="form-actions">
									  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
									</div>
								  </div>
								</div>
							  </div>
						  </div>
						  <!-- modal delete price renewal end -->
					  </td>
					</tr>
					<tr>
					  <tr>
					  <td><input type="checkbox"/></td>
					  <td>1</td>
					  <td>.my</td>
					  <td><span class="text-red">9.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">38.49*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">55.59*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="label label-xs label-success">Active</span></td>
					  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-renewal" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-price-renewal" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
					</tr>
					
				   
				  </tbody>
				  <tfoot>
					<tr>
					  <td colspan="15"></td>
					</tr>
				  </tfoot>
				</table>
				<div class="tool-footer text-right">
				<p class="pull-left">Showing 1 to 10 of 57 entries</p>
				<ul class="pagination pagination mtm mbm">
				  <li class="disabled"><a href="#">&laquo;</a></li>
				  <li class="active"><a href="#">1</a></li>
				  <li><a href="#">2</a></li>
				  <li><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				  <li><a href="#">&raquo;</a></li>
				</ul>
			  </div>
			  <div class="clearfix"></div>
				
				<div class="clearfix"></div>
			  </div><!-- end table responsive -->
			  
				 
			</div>
		  </div><!-- End portlet -->
		
		</div><!-- end renewals tab -->
		
		
		<div id="transfers" class="tab-pane fade in">
	  

			<div class="portlet">
			<div class="portlet-header">
			  <div class="caption">Malaysia TLD Pricing Listing</div>
			  <p class="margin-top-10px"></p>
			  <div class="clearfix"></div>
			  <div class="text-blue">This is where you configure the TLDs that you want to allow clients to register or transfer to you. As well as pricing, you can set which addons are offered with each TLD. If an EPP code is required for transfers, tick the EPP Code box. If DNS Management, Email Forwarding or ID Protection is available &amp; should be offered for this TLD check the boxes.</div>
			  <div class="xss-margin"></div>
			  <a href="#" data-target="#modal-add-new-price-transfer" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
			  <a href="#" class="btn btn-warning">Update All Pricing &nbsp;<i class="fa fa-refresh"></i></a>&nbsp;
			  <div class="btn-group">
				<button type="button" class="btn btn-primary">Delete</button>
				<button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
				<ul role="menu" class="dropdown-menu">
				  <li><a href="#" data-target="#modal-delete-selected-transfer" data-toggle="modal">Delete selected item(s)</a></li>
				  <li class="divider"></li>
				  <li><a href="#" data-target="#modal-delete-all-transfer" data-toggle="modal">Delete all</a></li>
				</ul>
			  </div>
			  <!--Modal Add New Pricing transfer start-->
			  <div id="modal-add-new-price-transfer" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				<div class="modal-dialog modal-wide-width">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
					  <h4 id="modal-login-label3" class="modal-title">Add New Pricing</h4>
					</div>
					<div class="modal-body">
					  <div class="form">
						<form class="form-horizontal">
						  <div class="form-group">
							<label class="col-md-3 control-label">Status</label>
							<div class="col-md-6">
							  <div data-on="success" data-off="primary" class="make-switch">
								<input type="checkbox" checked="checked"/>
							  </div>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label class="col-md-3 control-label">Country <span class="text-red">* </span></label>
							<div class="col-md-6">
							  <select name="select" class="form-control">
								<option>-- Please select --</option>
								<option data-calling-code="93" data-eu-tax="unknown" value="AF">Afghanistan</option>
								<option data-calling-code="358" data-eu-tax="unknown" value="AX">Åland Islands</option>
								<option data-calling-code="355" data-eu-tax="unknown" value="AL">Albania</option>
								<option data-calling-code="213" data-eu-tax="unknown" value="DZ">Algeria</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="AS">American Samoa</option>
								<option data-calling-code="376" data-eu-tax="unknown" value="AD">Andorra</option>
								<option data-calling-code="244" data-eu-tax="unknown" value="AO">Angola</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="AI">Anguilla</option>
								<option data-calling-code="672" data-eu-tax="unknown" value="AQ">Antarctica</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="AG">Antigua and Barbuda</option>
								<option data-calling-code="54" data-eu-tax="unknown" value="AR">Argentina</option>
								<option data-calling-code="374" data-eu-tax="unknown" value="AM">Armenia</option>
								<option data-calling-code="297" data-eu-tax="unknown" value="AW">Aruba</option>
								<option data-calling-code="61" data-eu-tax="unknown" value="AU">Australia</option>
								<option data-calling-code="43" data-eu-tax="yes" value="AT">Austria</option>
								<option data-calling-code="994" data-eu-tax="unknown" value="AZ">Azerbaijan</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="BS">Bahamas</option>
								<option data-calling-code="973" data-eu-tax="unknown" value="BH">Bahrain</option>
								<option data-calling-code="880" data-eu-tax="unknown" value="BD">Bangladesh</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="BB">Barbados</option>
								<option data-calling-code="375" data-eu-tax="unknown" value="BY">Belarus</option>
								<option data-calling-code="32" data-eu-tax="yes" value="BE">Belgium</option>
								<option data-calling-code="501" data-eu-tax="unknown" value="BZ">Belize</option>
								<option data-calling-code="229" data-eu-tax="unknown" value="BJ">Benin</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="BM">Bermuda</option>
								<option data-calling-code="975" data-eu-tax="unknown" value="BT">Bhutan</option>
								<option data-calling-code="591" data-eu-tax="unknown" value="BO">Bolivia, Plurinational State of</option>
								<option data-calling-code="387" data-eu-tax="unknown" value="BA">Bosnia and Herzegovina</option>
								<option data-calling-code="267" data-eu-tax="unknown" value="BW">Botswana</option>
								<option data-calling-code="55" data-eu-tax="unknown" value="BR">Brazil</option>
								<option data-calling-code="246" data-eu-tax="unknown" value="IO">British Indian Ocean Territory</option>
								<option data-calling-code="673" data-eu-tax="unknown" value="BN">Brunei Darussalam</option>
								<option data-calling-code="359" data-eu-tax="yes" value="BG">Bulgaria</option>
								<option data-calling-code="226" data-eu-tax="unknown" value="BF">Burkina Faso</option>
								<option data-calling-code="257" data-eu-tax="unknown" value="BI">Burundi</option>
								<option data-calling-code="855" data-eu-tax="unknown" value="KH">Cambodia</option>
								<option data-calling-code="237" data-eu-tax="unknown" value="CM">Cameroon</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="CA">Canada</option>
								<option data-calling-code="238" data-eu-tax="unknown" value="CV">Cape Verde</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="KY">Cayman Islands</option>
								<option data-calling-code="236" data-eu-tax="unknown" value="CF">Central African Republic</option>
								<option data-calling-code="235" data-eu-tax="unknown" value="TD">Chad</option>
								<option data-calling-code="56" data-eu-tax="unknown" value="CL">Chile</option>
								<option data-calling-code="86" data-eu-tax="unknown" value="CN">China</option>
								<option data-calling-code="61" data-eu-tax="unknown" value="CX">Christmas Island</option>
								<option data-calling-code="61" data-eu-tax="unknown" value="CC">Cocos (Keeling) Islands</option>
								<option data-calling-code="57" data-eu-tax="unknown" value="CO">Colombia</option>
								<option data-calling-code="269" data-eu-tax="unknown" value="KM">Comoros</option>
								<option data-calling-code="242" data-eu-tax="unknown" value="CG">Congo</option>
								<option data-calling-code="243" data-eu-tax="unknown" value="CD">Congo, the Democratic Republic of the</option>
								<option data-calling-code="682" data-eu-tax="unknown" value="CK">Cook Islands</option>
								<option data-calling-code="506" data-eu-tax="unknown" value="CR">Costa Rica</option>
								<option data-calling-code="225" data-eu-tax="unknown" value="CI">Côte d'Ivoire</option>
								<option data-calling-code="385" data-eu-tax="yes" value="HR">Croatia</option>
								<option data-calling-code="53" data-eu-tax="unknown" value="CU">Cuba</option>
								<option data-calling-code="357" data-eu-tax="yes" value="CY">Cyprus</option>
								<option data-calling-code="420" data-eu-tax="yes" value="CZ">Czech Republic</option>
								<option data-calling-code="45" data-eu-tax="yes" value="DK">Denmark</option>
								<option data-calling-code="253" data-eu-tax="unknown" value="DJ">Djibouti</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="DM">Dominica</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="DO">Dominican Republic</option>
								<option data-calling-code="593" data-eu-tax="unknown" value="EC">Ecuador</option>
								<option data-calling-code="20" data-eu-tax="unknown" value="EG">Egypt</option>
								<option data-calling-code="503" data-eu-tax="unknown" value="SV">El Salvador</option>
								<option data-calling-code="240" data-eu-tax="unknown" value="GQ">Equatorial Guinea</option>
								<option data-calling-code="291" data-eu-tax="unknown" value="ER">Eritrea</option>
								<option data-calling-code="372" data-eu-tax="yes" value="EE">Estonia</option>
								<option data-calling-code="251" data-eu-tax="unknown" value="ET">Ethiopia</option>
								<option data-calling-code="500" data-eu-tax="unknown" value="FK">Falkland Islands (Malvinas)</option>
								<option data-calling-code="298" data-eu-tax="unknown" value="FO">Faroe Islands</option>
								<option data-calling-code="679" data-eu-tax="unknown" value="FJ">Fiji</option>
								<option data-calling-code="358" data-eu-tax="yes" value="FI">Finland</option>
								<option data-calling-code="33" data-eu-tax="yes" value="FR">France</option>
								<option data-calling-code="594" data-eu-tax="unknown" value="GF">French Guiana</option>
								<option data-calling-code="689" data-eu-tax="unknown" value="PF">French Polynesia</option>
								<option data-calling-code="262" data-eu-tax="unknown" value="TF">French Southern Territories</option>
								<option data-calling-code="241" data-eu-tax="unknown" value="GA">Gabon</option>
								<option data-calling-code="220" data-eu-tax="unknown" value="GM">Gambia</option>
								<option data-calling-code="995" data-eu-tax="unknown" value="GE">Georgia</option>
								<option data-calling-code="49" data-eu-tax="yes" value="DE">Germany</option>
								<option data-calling-code="233" data-eu-tax="unknown" value="GH">Ghana</option>
								<option data-calling-code="350" data-eu-tax="unknown" value="GI">Gibraltar</option>
								<option data-calling-code="30" data-eu-tax="yes" value="GR">Greece</option>
								<option data-calling-code="299" data-eu-tax="unknown" value="GL">Greenland</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="GD">Grenada</option>
								<option data-calling-code="590" data-eu-tax="unknown" value="GP">Guadeloupe</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="GU">Guam</option>
								<option data-calling-code="502" data-eu-tax="unknown" value="GT">Guatemala</option>
								<option data-calling-code="44" data-eu-tax="unknown" value="GG">Guernsey</option>
								<option data-calling-code="224" data-eu-tax="unknown" value="GN">Guinea</option>
								<option data-calling-code="245" data-eu-tax="unknown" value="GW">Guinea-Bissau</option>
								<option data-calling-code="592" data-eu-tax="unknown" value="GY">Guyana</option>
								<option data-calling-code="509" data-eu-tax="unknown" value="HT">Haiti</option>
								<option data-calling-code="3906" data-eu-tax="unknown" value="VA">Holy See (Vatican City State)</option>
								<option data-calling-code="504" data-eu-tax="unknown" value="HN">Honduras</option>
								<option data-calling-code="852" data-eu-tax="unknown" value="HK">Hong Kong</option>
								<option data-calling-code="36" data-eu-tax="yes" value="HU">Hungary</option>
								<option data-calling-code="354" data-eu-tax="unknown" value="IS">Iceland</option>
								<option data-calling-code="91" data-eu-tax="unknown" value="IN">India</option>
								<option data-calling-code="62" data-eu-tax="unknown" value="ID">Indonesia</option>
								<option data-calling-code="98" data-eu-tax="unknown" value="IR">Iran, Islamic Republic of</option>
								<option data-calling-code="964" data-eu-tax="unknown" value="IQ">Iraq</option>
								<option data-calling-code="353" data-eu-tax="yes" value="IE">Ireland</option>
								<option data-calling-code="44" data-eu-tax="yes" value="IM">Isle of Man</option>
								<option data-calling-code="972" data-eu-tax="unknown" value="IL">Israel</option>
								<option data-calling-code="39" data-eu-tax="yes" value="IT">Italy</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="JM">Jamaica</option>
								<option data-calling-code="81" data-eu-tax="unknown" value="JP">Japan</option>
								<option data-calling-code="44" data-eu-tax="unknown" value="JE">Jersey</option>
								<option data-calling-code="962" data-eu-tax="unknown" value="JO">Jordan</option>
								<option data-calling-code="7" data-eu-tax="unknown" value="KZ">Kazakhstan</option>
								<option data-calling-code="254" data-eu-tax="unknown" value="KE">Kenya</option>
								<option data-calling-code="686" data-eu-tax="unknown" value="KI">Kiribati</option>
								<option data-calling-code="850" data-eu-tax="unknown" value="KP">Korea, Democratic People's Republic of</option>
								<option data-calling-code="82" data-eu-tax="unknown" value="KR">Korea, Republic of</option>
								<option data-calling-code="965" data-eu-tax="unknown" value="KW">Kuwait</option>
								<option data-calling-code="996" data-eu-tax="unknown" value="KG">Kyrgyzstan</option>
								<option data-calling-code="856" data-eu-tax="unknown" value="LA">Lao People's Democratic Republic</option>
								<option data-calling-code="371" data-eu-tax="yes" value="LV">Latvia</option>
								<option data-calling-code="961" data-eu-tax="unknown" value="LB">Lebanon</option>
								<option data-calling-code="266" data-eu-tax="unknown" value="LS">Lesotho</option>
								<option data-calling-code="231" data-eu-tax="unknown" value="LR">Liberia</option>
								<option data-calling-code="218" data-eu-tax="unknown" value="LY">Libyan Arab Jamahiriya</option>
								<option data-calling-code="423" data-eu-tax="unknown" value="LI">Liechtenstein</option>
								<option data-calling-code="370" data-eu-tax="yes" value="LT">Lithuania</option>
								<option data-calling-code="352" data-eu-tax="yes" value="LU">Luxembourg</option>
								<option data-calling-code="853" data-eu-tax="unknown" value="MO">Macao</option>
								<option data-calling-code="389" data-eu-tax="unknown" value="MK">Macedonia, the former Yugoslav Republic of</option>
								<option data-calling-code="261" data-eu-tax="unknown" value="MG">Madagascar</option>
								<option data-calling-code="265" data-eu-tax="unknown" value="MW">Malawi</option>
								<option data-calling-code="60" data-eu-tax="unknown" value="MY" selected="selected">Malaysia</option>
								<option data-calling-code="960" data-eu-tax="unknown" value="MV">Maldives</option>
								<option data-calling-code="223" data-eu-tax="unknown" value="ML">Mali</option>
								<option data-calling-code="356" data-eu-tax="yes" value="MT">Malta</option>
								<option data-calling-code="692" data-eu-tax="unknown" value="MH">Marshall Islands</option>
								<option data-calling-code="596" data-eu-tax="unknown" value="MQ">Martinique</option>
								<option data-calling-code="222" data-eu-tax="unknown" value="MR">Mauritania</option>
								<option data-calling-code="230" data-eu-tax="unknown" value="MU">Mauritius</option>
								<option data-calling-code="262" data-eu-tax="unknown" value="YT">Mayotte</option>
								<option data-calling-code="52" data-eu-tax="unknown" value="MX">Mexico</option>
								<option data-calling-code="691" data-eu-tax="unknown" value="FM">Micronesia, Federated States of</option>
								<option data-calling-code="373" data-eu-tax="unknown" value="MD">Moldova, Republic of</option>
								<option data-calling-code="377" data-eu-tax="yes" value="MC">Monaco</option>
								<option data-calling-code="976" data-eu-tax="unknown" value="MN">Mongolia</option>
								<option data-calling-code="382" data-eu-tax="unknown" value="ME">Montenegro</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="MS">Montserrat</option>
								<option data-calling-code="212" data-eu-tax="unknown" value="MA">Morocco</option>
								<option data-calling-code="258" data-eu-tax="unknown" value="MZ">Mozambique</option>
								<option data-calling-code="94" data-eu-tax="unknown" value="MM">Myanmar</option>
								<option data-calling-code="264" data-eu-tax="unknown" value="NA">Namibia</option>
								<option data-calling-code="674" data-eu-tax="unknown" value="NR">Nauru</option>
								<option data-calling-code="977" data-eu-tax="unknown" value="NP">Nepal</option>
								<option data-calling-code="31" data-eu-tax="yes" value="NL">Netherlands</option>
								<option data-calling-code="599" data-eu-tax="unknown" value="AN">Netherlands Antilles</option>
								<option data-calling-code="687" data-eu-tax="unknown" value="NC">New Caledonia</option>
								<option data-calling-code="64" data-eu-tax="unknown" value="NZ">New Zealand</option>
								<option data-calling-code="505" data-eu-tax="unknown" value="NI">Nicaragua</option>
								<option data-calling-code="227" data-eu-tax="unknown" value="NE">Niger</option>
								<option data-calling-code="234" data-eu-tax="unknown" value="NG">Nigeria</option>
								<option data-calling-code="683" data-eu-tax="unknown" value="NU">Niue</option>
								<option data-calling-code="672" data-eu-tax="unknown" value="NF">Norfolk Island</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="MP">Northern Mariana Islands</option>
								<option data-calling-code="47" data-eu-tax="unknown" value="NO">Norway</option>
								<option data-calling-code="968" data-eu-tax="unknown" value="OM">Oman</option>
								<option data-calling-code="92" data-eu-tax="unknown" value="PK">Pakistan</option>
								<option data-calling-code="680" data-eu-tax="unknown" value="PW">Palau</option>
								<option data-calling-code="970" data-eu-tax="unknown" value="PS">Palestinian Territory, Occupied</option>
								<option data-calling-code="507" data-eu-tax="unknown" value="PA">Panama</option>
								<option data-calling-code="675" data-eu-tax="unknown" value="PG">Papua New Guinea</option>
								<option data-calling-code="595" data-eu-tax="unknown" value="PY">Paraguay</option>
								<option data-calling-code="51" data-eu-tax="unknown" value="PE">Peru</option>
								<option data-calling-code="63" data-eu-tax="unknown" value="PH">Philippines</option>
								<option data-calling-code="649" data-eu-tax="unknown" value="PN">Pitcairn</option>
								<option data-calling-code="48" data-eu-tax="yes" value="PL">Poland</option>
								<option data-calling-code="351" data-eu-tax="yes" value="PT">Portugal</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="PR">Puerto Rico</option>
								<option data-calling-code="974" data-eu-tax="unknown" value="QA">Qatar</option>
								<option data-calling-code="262" data-eu-tax="unknown" value="RE">Réunion</option>
								<option data-calling-code="40" data-eu-tax="yes" value="RO">Romania</option>
								<option data-calling-code="7" data-eu-tax="unknown" value="RU">Russian Federation</option>
								<option data-calling-code="250" data-eu-tax="unknown" value="RW">Rwanda</option>
								<option data-calling-code="590" data-eu-tax="unknown" value="BL">Saint Barthélemy</option>
								<option data-calling-code="290" data-eu-tax="unknown" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="KN">Saint Kitts and Nevis</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="LC">Saint Lucia</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="MF">Saint Martin (French part)</option>
								<option data-calling-code="508" data-eu-tax="unknown" value="PM">Saint Pierre and Miquelon</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="VC">Saint Vincent and the Grenadines</option>
								<option data-calling-code="685" data-eu-tax="unknown" value="WS">Samoa</option>
								<option data-calling-code="378" data-eu-tax="unknown" value="SM">San Marino</option>
								<option data-calling-code="239" data-eu-tax="unknown" value="ST">Sao Tome and Principe</option>
								<option data-calling-code="966" data-eu-tax="unknown" value="SA">Saudi Arabia</option>
								<option data-calling-code="221" data-eu-tax="unknown" value="SN">Senegal</option>
								<option data-calling-code="382" data-eu-tax="unknown" value="RS">Serbia</option>
								<option data-calling-code="248" data-eu-tax="unknown" value="SC">Seychelles</option>
								<option data-calling-code="232" data-eu-tax="unknown" value="SL">Sierra Leone</option>
								<option data-calling-code="65" data-eu-tax="unknown" value="SG">Singapore</option>
								<option data-calling-code="421" data-eu-tax="yes" value="SK">Slovakia</option>
								<option data-calling-code="386" data-eu-tax="yes" value="SI">Slovenia</option>
								<option data-calling-code="677" data-eu-tax="unknown" value="SB">Solomon Islands</option>
								<option data-calling-code="252" data-eu-tax="unknown" value="SO">Somalia</option>
								<option data-calling-code="27" data-eu-tax="unknown" value="ZA">South Africa</option>
								<option data-calling-code="34" data-eu-tax="yes" value="ES">Spain</option>
								<option data-calling-code="94" data-eu-tax="unknown" value="LK">Sri Lanka</option>
								<option data-calling-code="249" data-eu-tax="unknown" value="SD">Sudan</option>
								<option data-calling-code="597" data-eu-tax="unknown" value="SR">Suriname</option>
								<option data-calling-code="" data-eu-tax="unknown" value="SJ">Svalbard and Jan Mayen</option>
								<option data-calling-code="268" data-eu-tax="unknown" value="SZ">Swaziland</option>
								<option data-calling-code="46" data-eu-tax="yes" value="SE">Sweden</option>
								<option data-calling-code="41" data-eu-tax="unknown" value="CH">Switzerland</option>
								<option data-calling-code="963" data-eu-tax="unknown" value="SY">Syrian Arab Republic</option>
								<option data-calling-code="886" data-eu-tax="unknown" value="TW">Taiwan</option>
								<option data-calling-code="992" data-eu-tax="unknown" value="TJ">Tajikistan</option>
								<option data-calling-code="255" data-eu-tax="unknown" value="TZ">Tanzania, United Republic of</option>
								<option data-calling-code="66" data-eu-tax="unknown" value="TH">Thailand</option>
								<option data-calling-code="670" data-eu-tax="unknown" value="TL">Timor-Leste</option>
								<option data-calling-code="228" data-eu-tax="unknown" value="TG">Togo</option>
								<option data-calling-code="690" data-eu-tax="unknown" value="TK">Tokelau</option>
								<option data-calling-code="676" data-eu-tax="unknown" value="TO">Tonga</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="TT">Trinidad and Tobago</option>
								<option data-calling-code="216" data-eu-tax="unknown" value="TN">Tunisia</option>
								<option data-calling-code="90" data-eu-tax="unknown" value="TR">Turkey</option>
								<option data-calling-code="993" data-eu-tax="unknown" value="TM">Turkmenistan</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="TC">Turks and Caicos Islands</option>
								<option data-calling-code="688" data-eu-tax="unknown" value="TV">Tuvalu</option>
								<option data-calling-code="256" data-eu-tax="unknown" value="UG">Uganda</option>
								<option data-calling-code="380" data-eu-tax="unknown" value="UA">Ukraine</option>
								<option data-calling-code="971" data-eu-tax="unknown" value="AE">United Arab Emirates</option>
								<option data-calling-code="44" data-eu-tax="yes" value="GB">United Kingdom</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="US">United States</option>
								<option data-calling-code="598" data-eu-tax="unknown" value="UY">Uruguay</option>
								<option data-calling-code="998" data-eu-tax="unknown" value="UZ">Uzbekistan</option>
								<option data-calling-code="678" data-eu-tax="unknown" value="VU">Vanuatu</option>
								<option data-calling-code="58" data-eu-tax="unknown" value="VE">Venezuela, Bolivarian Republic of</option>
								<option data-calling-code="84" data-eu-tax="unknown" value="VN">Viet Nam</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="VG">Virgin Islands, British</option>
								<option data-calling-code="1" data-eu-tax="unknown" value="VI">Virgin Islands, U.S.</option>
								<option data-calling-code="681" data-eu-tax="unknown" value="WF">Wallis and Futuna</option>
								<option data-calling-code="" data-eu-tax="unknown" value="EH">Western Sahara</option>
								<option data-calling-code="967" data-eu-tax="unknown" value="YE">Yemen</option>
								<option data-calling-code="260" data-eu-tax="unknown" value="ZM">Zambia</option>
								<option data-calling-code="263" data-eu-tax="unknown" value="ZW">Zimbabwe</option>
							  </select>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
							<div class="col-md-6">
							  <input type="text" class="form-control" placeholder="eg .com.my">
							</div>
						  </div>  
						  
						  <div class="form-group">
							 <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>

							 <div class="col-md-6">
								<div class="xss-margin"></div>
								<div class="checkbox-list">
									<label><input id="inlineCheckbox1" type="checkbox" value="option1" checked="checked"/>&nbsp; Enabled</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option2"/>&nbsp; Disabled</label>
								 </div>
							 </div>
						  </div> 
						  
						  <div class="form-group">
							 <label class="col-md-3 control-label">Domain Addons</label>

							 <div class="col-md-6">
								<div class="xss-margin"></div>
								<div class="checkbox-list">
									<label><input id="inlineCheckbox1" type="checkbox" value="option5"/>&nbsp; Select all</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option6"/>&nbsp; DNS Management</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; Email Forwarding</label>
									<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; ID Protection</label>

								 </div>
							 </div>
						  </div>
						  
						  <div class="table-responsive mtl">
							<table class="table table-hover table-striped">
							  <thead>
								
								<tr>
								  <th>Domain Pricing (RM)</th>
								  <th>1 Year</th>
								  <th>2 Years</th>
								  <th>3 Years</th>
								  <th>4 Years</th>
								  <th>5 Years</th>
								  <th>6 Years</th>
								  <th>7 Years</th>
								  <th>8 Years</th>
								  <th>9 Years</th>
								  <th>10 Years</th>
								</tr>
							  </thead>
							  <tbody>
								<tr>
									<td>Sale Price</td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
									<td><input type="text" class="form-control text-red"></td>
								 </tr>      
								 <tr>
									<td>List Price</td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
									<td><input type="text" class="form-control"></td>
								 </tr>   
							   </tbody>
							   <tfoot>
								<tr colspan="11"></tr>
							   </tfoot>
							</table>
						 </div><!-- end table responsive -->
													  
						  <div class="form-actions">
							<div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
						  </div>
						</form>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <!--END MODAL Add New Pricing transfer -->
			  <!--Modal delete selected items start-->
			  <div id="modal-delete-selected-transfer" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
				<div class="modal-dialog">
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
					  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
					</div>
					<div class="modal-body">
					  <p><strong>#1:</strong> .com.my</p>
					  <div class="form-actions">
						<div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <!-- modal delete selected items end -->
			  <!--Modal delete all items transfer start-->
			  <div id="modal-delete-all-transfer" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
					<div class="modal-dialog">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
						  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
						</div>
						<div class="modal-body">
						  <div class="form-actions">
							<div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				  <!-- modal delete all items transfer end -->

			  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
			</div>
			<div class="portlet-body">
			
			  <div class="form-inline pull-left">
				<div class="form-group">
				  <select name="select" class="form-control">
					<option>10</option>
					<option>20</option>
					<option>30</option>
					<option>50</option>
					<option selected="selected">100</option>
				  </select>
				  &nbsp;
				  <label class="control-label">Records per page</label>
				</div>
			  </div>
			 
			  <div class="clearfix"></div>

			  <div class="table-responsive mtl">
				<table class="table table-hover table-striped">
				  <thead>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th colspan="10"><div class="alicent">Per Year Pricing (RM)</div></th>
						<th></th>
						<th></th>
					</tr>
					<tr>
					  <th width="1%"><input type="checkbox"/></th>	
					  <th>#</th>
					  <th>TLD</th>
					  <th>1 Year</th>
					  <th>2 Years</th>
					  <th>3 Years</th>
					  <th>4 Years</th>
					  <th>5 Years</th>
					  <th>6 Years</th>
					  <th>7 Years</th>
					  <th>8 Years</th>
					  <th>9 Years</th>
					  <th>10 Years</th>
					  <th>Status</th>
					  <th>Action</th>
					</tr>
				  </thead>
				  <tbody>
					<tr>
					  <td><input type="checkbox"/></td>
					  <td>2</td>
					  <td>.com.my</td>
					  <td><span class="text-red">9.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">38.49*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">55.59*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="label label-xs label-success">Active</span></td>
					  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-transfer" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-price-transfer" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>  					
					  <!--Modal Edit Pricing transfer start-->
					  <div id="modal-edit-price-transfer" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
						<div class="modal-dialog modal-wide-width">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
							  <h4 id="modal-login-label3" class="modal-title">Edit Pricing</h4>
							</div>
							<div class="modal-body">
							  <div class="form">
								<form class="form-horizontal">
								  <div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-6">
									  <div data-on="success" data-off="primary" class="make-switch">
										<input type="checkbox" checked="checked"/>
									  </div>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="col-md-3 control-label">Country <span class="text-red">* </span></label>
									<div class="col-md-6">
									  <select name="select" class="form-control">
										<option>-- Please select --</option>
										<option data-calling-code="93" data-eu-tax="unknown" value="AF">Afghanistan</option>
										<option data-calling-code="358" data-eu-tax="unknown" value="AX">Åland Islands</option>
										<option data-calling-code="355" data-eu-tax="unknown" value="AL">Albania</option>
										<option data-calling-code="213" data-eu-tax="unknown" value="DZ">Algeria</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="AS">American Samoa</option>
										<option data-calling-code="376" data-eu-tax="unknown" value="AD">Andorra</option>
										<option data-calling-code="244" data-eu-tax="unknown" value="AO">Angola</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="AI">Anguilla</option>
										<option data-calling-code="672" data-eu-tax="unknown" value="AQ">Antarctica</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="AG">Antigua and Barbuda</option>
										<option data-calling-code="54" data-eu-tax="unknown" value="AR">Argentina</option>
										<option data-calling-code="374" data-eu-tax="unknown" value="AM">Armenia</option>
										<option data-calling-code="297" data-eu-tax="unknown" value="AW">Aruba</option>
										<option data-calling-code="61" data-eu-tax="unknown" value="AU">Australia</option>
										<option data-calling-code="43" data-eu-tax="yes" value="AT">Austria</option>
										<option data-calling-code="994" data-eu-tax="unknown" value="AZ">Azerbaijan</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="BS">Bahamas</option>
										<option data-calling-code="973" data-eu-tax="unknown" value="BH">Bahrain</option>
										<option data-calling-code="880" data-eu-tax="unknown" value="BD">Bangladesh</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="BB">Barbados</option>
										<option data-calling-code="375" data-eu-tax="unknown" value="BY">Belarus</option>
										<option data-calling-code="32" data-eu-tax="yes" value="BE">Belgium</option>
										<option data-calling-code="501" data-eu-tax="unknown" value="BZ">Belize</option>
										<option data-calling-code="229" data-eu-tax="unknown" value="BJ">Benin</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="BM">Bermuda</option>
										<option data-calling-code="975" data-eu-tax="unknown" value="BT">Bhutan</option>
										<option data-calling-code="591" data-eu-tax="unknown" value="BO">Bolivia, Plurinational State of</option>
										<option data-calling-code="387" data-eu-tax="unknown" value="BA">Bosnia and Herzegovina</option>
										<option data-calling-code="267" data-eu-tax="unknown" value="BW">Botswana</option>
										<option data-calling-code="55" data-eu-tax="unknown" value="BR">Brazil</option>
										<option data-calling-code="246" data-eu-tax="unknown" value="IO">British Indian Ocean Territory</option>
										<option data-calling-code="673" data-eu-tax="unknown" value="BN">Brunei Darussalam</option>
										<option data-calling-code="359" data-eu-tax="yes" value="BG">Bulgaria</option>
										<option data-calling-code="226" data-eu-tax="unknown" value="BF">Burkina Faso</option>
										<option data-calling-code="257" data-eu-tax="unknown" value="BI">Burundi</option>
										<option data-calling-code="855" data-eu-tax="unknown" value="KH">Cambodia</option>
										<option data-calling-code="237" data-eu-tax="unknown" value="CM">Cameroon</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="CA">Canada</option>
										<option data-calling-code="238" data-eu-tax="unknown" value="CV">Cape Verde</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="KY">Cayman Islands</option>
										<option data-calling-code="236" data-eu-tax="unknown" value="CF">Central African Republic</option>
										<option data-calling-code="235" data-eu-tax="unknown" value="TD">Chad</option>
										<option data-calling-code="56" data-eu-tax="unknown" value="CL">Chile</option>
										<option data-calling-code="86" data-eu-tax="unknown" value="CN">China</option>
										<option data-calling-code="61" data-eu-tax="unknown" value="CX">Christmas Island</option>
										<option data-calling-code="61" data-eu-tax="unknown" value="CC">Cocos (Keeling) Islands</option>
										<option data-calling-code="57" data-eu-tax="unknown" value="CO">Colombia</option>
										<option data-calling-code="269" data-eu-tax="unknown" value="KM">Comoros</option>
										<option data-calling-code="242" data-eu-tax="unknown" value="CG">Congo</option>
										<option data-calling-code="243" data-eu-tax="unknown" value="CD">Congo, the Democratic Republic of the</option>
										<option data-calling-code="682" data-eu-tax="unknown" value="CK">Cook Islands</option>
										<option data-calling-code="506" data-eu-tax="unknown" value="CR">Costa Rica</option>
										<option data-calling-code="225" data-eu-tax="unknown" value="CI">Côte d'Ivoire</option>
										<option data-calling-code="385" data-eu-tax="yes" value="HR">Croatia</option>
										<option data-calling-code="53" data-eu-tax="unknown" value="CU">Cuba</option>
										<option data-calling-code="357" data-eu-tax="yes" value="CY">Cyprus</option>
										<option data-calling-code="420" data-eu-tax="yes" value="CZ">Czech Republic</option>
										<option data-calling-code="45" data-eu-tax="yes" value="DK">Denmark</option>
										<option data-calling-code="253" data-eu-tax="unknown" value="DJ">Djibouti</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="DM">Dominica</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="DO">Dominican Republic</option>
										<option data-calling-code="593" data-eu-tax="unknown" value="EC">Ecuador</option>
										<option data-calling-code="20" data-eu-tax="unknown" value="EG">Egypt</option>
										<option data-calling-code="503" data-eu-tax="unknown" value="SV">El Salvador</option>
										<option data-calling-code="240" data-eu-tax="unknown" value="GQ">Equatorial Guinea</option>
										<option data-calling-code="291" data-eu-tax="unknown" value="ER">Eritrea</option>
										<option data-calling-code="372" data-eu-tax="yes" value="EE">Estonia</option>
										<option data-calling-code="251" data-eu-tax="unknown" value="ET">Ethiopia</option>
										<option data-calling-code="500" data-eu-tax="unknown" value="FK">Falkland Islands (Malvinas)</option>
										<option data-calling-code="298" data-eu-tax="unknown" value="FO">Faroe Islands</option>
										<option data-calling-code="679" data-eu-tax="unknown" value="FJ">Fiji</option>
										<option data-calling-code="358" data-eu-tax="yes" value="FI">Finland</option>
										<option data-calling-code="33" data-eu-tax="yes" value="FR">France</option>
										<option data-calling-code="594" data-eu-tax="unknown" value="GF">French Guiana</option>
										<option data-calling-code="689" data-eu-tax="unknown" value="PF">French Polynesia</option>
										<option data-calling-code="262" data-eu-tax="unknown" value="TF">French Southern Territories</option>
										<option data-calling-code="241" data-eu-tax="unknown" value="GA">Gabon</option>
										<option data-calling-code="220" data-eu-tax="unknown" value="GM">Gambia</option>
										<option data-calling-code="995" data-eu-tax="unknown" value="GE">Georgia</option>
										<option data-calling-code="49" data-eu-tax="yes" value="DE">Germany</option>
										<option data-calling-code="233" data-eu-tax="unknown" value="GH">Ghana</option>
										<option data-calling-code="350" data-eu-tax="unknown" value="GI">Gibraltar</option>
										<option data-calling-code="30" data-eu-tax="yes" value="GR">Greece</option>
										<option data-calling-code="299" data-eu-tax="unknown" value="GL">Greenland</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="GD">Grenada</option>
										<option data-calling-code="590" data-eu-tax="unknown" value="GP">Guadeloupe</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="GU">Guam</option>
										<option data-calling-code="502" data-eu-tax="unknown" value="GT">Guatemala</option>
										<option data-calling-code="44" data-eu-tax="unknown" value="GG">Guernsey</option>
										<option data-calling-code="224" data-eu-tax="unknown" value="GN">Guinea</option>
										<option data-calling-code="245" data-eu-tax="unknown" value="GW">Guinea-Bissau</option>
										<option data-calling-code="592" data-eu-tax="unknown" value="GY">Guyana</option>
										<option data-calling-code="509" data-eu-tax="unknown" value="HT">Haiti</option>
										<option data-calling-code="3906" data-eu-tax="unknown" value="VA">Holy See (Vatican City State)</option>
										<option data-calling-code="504" data-eu-tax="unknown" value="HN">Honduras</option>
										<option data-calling-code="852" data-eu-tax="unknown" value="HK">Hong Kong</option>
										<option data-calling-code="36" data-eu-tax="yes" value="HU">Hungary</option>
										<option data-calling-code="354" data-eu-tax="unknown" value="IS">Iceland</option>
										<option data-calling-code="91" data-eu-tax="unknown" value="IN">India</option>
										<option data-calling-code="62" data-eu-tax="unknown" value="ID">Indonesia</option>
										<option data-calling-code="98" data-eu-tax="unknown" value="IR">Iran, Islamic Republic of</option>
										<option data-calling-code="964" data-eu-tax="unknown" value="IQ">Iraq</option>
										<option data-calling-code="353" data-eu-tax="yes" value="IE">Ireland</option>
										<option data-calling-code="44" data-eu-tax="yes" value="IM">Isle of Man</option>
										<option data-calling-code="972" data-eu-tax="unknown" value="IL">Israel</option>
										<option data-calling-code="39" data-eu-tax="yes" value="IT">Italy</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="JM">Jamaica</option>
										<option data-calling-code="81" data-eu-tax="unknown" value="JP">Japan</option>
										<option data-calling-code="44" data-eu-tax="unknown" value="JE">Jersey</option>
										<option data-calling-code="962" data-eu-tax="unknown" value="JO">Jordan</option>
										<option data-calling-code="7" data-eu-tax="unknown" value="KZ">Kazakhstan</option>
										<option data-calling-code="254" data-eu-tax="unknown" value="KE">Kenya</option>
										<option data-calling-code="686" data-eu-tax="unknown" value="KI">Kiribati</option>
										<option data-calling-code="850" data-eu-tax="unknown" value="KP">Korea, Democratic People's Republic of</option>
										<option data-calling-code="82" data-eu-tax="unknown" value="KR">Korea, Republic of</option>
										<option data-calling-code="965" data-eu-tax="unknown" value="KW">Kuwait</option>
										<option data-calling-code="996" data-eu-tax="unknown" value="KG">Kyrgyzstan</option>
										<option data-calling-code="856" data-eu-tax="unknown" value="LA">Lao People's Democratic Republic</option>
										<option data-calling-code="371" data-eu-tax="yes" value="LV">Latvia</option>
										<option data-calling-code="961" data-eu-tax="unknown" value="LB">Lebanon</option>
										<option data-calling-code="266" data-eu-tax="unknown" value="LS">Lesotho</option>
										<option data-calling-code="231" data-eu-tax="unknown" value="LR">Liberia</option>
										<option data-calling-code="218" data-eu-tax="unknown" value="LY">Libyan Arab Jamahiriya</option>
										<option data-calling-code="423" data-eu-tax="unknown" value="LI">Liechtenstein</option>
										<option data-calling-code="370" data-eu-tax="yes" value="LT">Lithuania</option>
										<option data-calling-code="352" data-eu-tax="yes" value="LU">Luxembourg</option>
										<option data-calling-code="853" data-eu-tax="unknown" value="MO">Macao</option>
										<option data-calling-code="389" data-eu-tax="unknown" value="MK">Macedonia, the former Yugoslav Republic of</option>
										<option data-calling-code="261" data-eu-tax="unknown" value="MG">Madagascar</option>
										<option data-calling-code="265" data-eu-tax="unknown" value="MW">Malawi</option>
										<option data-calling-code="60" data-eu-tax="unknown" value="MY" selected="selected">Malaysia</option>
										<option data-calling-code="960" data-eu-tax="unknown" value="MV">Maldives</option>
										<option data-calling-code="223" data-eu-tax="unknown" value="ML">Mali</option>
										<option data-calling-code="356" data-eu-tax="yes" value="MT">Malta</option>
										<option data-calling-code="692" data-eu-tax="unknown" value="MH">Marshall Islands</option>
										<option data-calling-code="596" data-eu-tax="unknown" value="MQ">Martinique</option>
										<option data-calling-code="222" data-eu-tax="unknown" value="MR">Mauritania</option>
										<option data-calling-code="230" data-eu-tax="unknown" value="MU">Mauritius</option>
										<option data-calling-code="262" data-eu-tax="unknown" value="YT">Mayotte</option>
										<option data-calling-code="52" data-eu-tax="unknown" value="MX">Mexico</option>
										<option data-calling-code="691" data-eu-tax="unknown" value="FM">Micronesia, Federated States of</option>
										<option data-calling-code="373" data-eu-tax="unknown" value="MD">Moldova, Republic of</option>
										<option data-calling-code="377" data-eu-tax="yes" value="MC">Monaco</option>
										<option data-calling-code="976" data-eu-tax="unknown" value="MN">Mongolia</option>
										<option data-calling-code="382" data-eu-tax="unknown" value="ME">Montenegro</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="MS">Montserrat</option>
										<option data-calling-code="212" data-eu-tax="unknown" value="MA">Morocco</option>
										<option data-calling-code="258" data-eu-tax="unknown" value="MZ">Mozambique</option>
										<option data-calling-code="94" data-eu-tax="unknown" value="MM">Myanmar</option>
										<option data-calling-code="264" data-eu-tax="unknown" value="NA">Namibia</option>
										<option data-calling-code="674" data-eu-tax="unknown" value="NR">Nauru</option>
										<option data-calling-code="977" data-eu-tax="unknown" value="NP">Nepal</option>
										<option data-calling-code="31" data-eu-tax="yes" value="NL">Netherlands</option>
										<option data-calling-code="599" data-eu-tax="unknown" value="AN">Netherlands Antilles</option>
										<option data-calling-code="687" data-eu-tax="unknown" value="NC">New Caledonia</option>
										<option data-calling-code="64" data-eu-tax="unknown" value="NZ">New Zealand</option>
										<option data-calling-code="505" data-eu-tax="unknown" value="NI">Nicaragua</option>
										<option data-calling-code="227" data-eu-tax="unknown" value="NE">Niger</option>
										<option data-calling-code="234" data-eu-tax="unknown" value="NG">Nigeria</option>
										<option data-calling-code="683" data-eu-tax="unknown" value="NU">Niue</option>
										<option data-calling-code="672" data-eu-tax="unknown" value="NF">Norfolk Island</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="MP">Northern Mariana Islands</option>
										<option data-calling-code="47" data-eu-tax="unknown" value="NO">Norway</option>
										<option data-calling-code="968" data-eu-tax="unknown" value="OM">Oman</option>
										<option data-calling-code="92" data-eu-tax="unknown" value="PK">Pakistan</option>
										<option data-calling-code="680" data-eu-tax="unknown" value="PW">Palau</option>
										<option data-calling-code="970" data-eu-tax="unknown" value="PS">Palestinian Territory, Occupied</option>
										<option data-calling-code="507" data-eu-tax="unknown" value="PA">Panama</option>
										<option data-calling-code="675" data-eu-tax="unknown" value="PG">Papua New Guinea</option>
										<option data-calling-code="595" data-eu-tax="unknown" value="PY">Paraguay</option>
										<option data-calling-code="51" data-eu-tax="unknown" value="PE">Peru</option>
										<option data-calling-code="63" data-eu-tax="unknown" value="PH">Philippines</option>
										<option data-calling-code="649" data-eu-tax="unknown" value="PN">Pitcairn</option>
										<option data-calling-code="48" data-eu-tax="yes" value="PL">Poland</option>
										<option data-calling-code="351" data-eu-tax="yes" value="PT">Portugal</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="PR">Puerto Rico</option>
										<option data-calling-code="974" data-eu-tax="unknown" value="QA">Qatar</option>
										<option data-calling-code="262" data-eu-tax="unknown" value="RE">Réunion</option>
										<option data-calling-code="40" data-eu-tax="yes" value="RO">Romania</option>
										<option data-calling-code="7" data-eu-tax="unknown" value="RU">Russian Federation</option>
										<option data-calling-code="250" data-eu-tax="unknown" value="RW">Rwanda</option>
										<option data-calling-code="590" data-eu-tax="unknown" value="BL">Saint Barthélemy</option>
										<option data-calling-code="290" data-eu-tax="unknown" value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="KN">Saint Kitts and Nevis</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="LC">Saint Lucia</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="MF">Saint Martin (French part)</option>
										<option data-calling-code="508" data-eu-tax="unknown" value="PM">Saint Pierre and Miquelon</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="VC">Saint Vincent and the Grenadines</option>
										<option data-calling-code="685" data-eu-tax="unknown" value="WS">Samoa</option>
										<option data-calling-code="378" data-eu-tax="unknown" value="SM">San Marino</option>
										<option data-calling-code="239" data-eu-tax="unknown" value="ST">Sao Tome and Principe</option>
										<option data-calling-code="966" data-eu-tax="unknown" value="SA">Saudi Arabia</option>
										<option data-calling-code="221" data-eu-tax="unknown" value="SN">Senegal</option>
										<option data-calling-code="382" data-eu-tax="unknown" value="RS">Serbia</option>
										<option data-calling-code="248" data-eu-tax="unknown" value="SC">Seychelles</option>
										<option data-calling-code="232" data-eu-tax="unknown" value="SL">Sierra Leone</option>
										<option data-calling-code="65" data-eu-tax="unknown" value="SG">Singapore</option>
										<option data-calling-code="421" data-eu-tax="yes" value="SK">Slovakia</option>
										<option data-calling-code="386" data-eu-tax="yes" value="SI">Slovenia</option>
										<option data-calling-code="677" data-eu-tax="unknown" value="SB">Solomon Islands</option>
										<option data-calling-code="252" data-eu-tax="unknown" value="SO">Somalia</option>
										<option data-calling-code="27" data-eu-tax="unknown" value="ZA">South Africa</option>
										<option data-calling-code="34" data-eu-tax="yes" value="ES">Spain</option>
										<option data-calling-code="94" data-eu-tax="unknown" value="LK">Sri Lanka</option>
										<option data-calling-code="249" data-eu-tax="unknown" value="SD">Sudan</option>
										<option data-calling-code="597" data-eu-tax="unknown" value="SR">Suriname</option>
										<option data-calling-code="" data-eu-tax="unknown" value="SJ">Svalbard and Jan Mayen</option>
										<option data-calling-code="268" data-eu-tax="unknown" value="SZ">Swaziland</option>
										<option data-calling-code="46" data-eu-tax="yes" value="SE">Sweden</option>
										<option data-calling-code="41" data-eu-tax="unknown" value="CH">Switzerland</option>
										<option data-calling-code="963" data-eu-tax="unknown" value="SY">Syrian Arab Republic</option>
										<option data-calling-code="886" data-eu-tax="unknown" value="TW">Taiwan</option>
										<option data-calling-code="992" data-eu-tax="unknown" value="TJ">Tajikistan</option>
										<option data-calling-code="255" data-eu-tax="unknown" value="TZ">Tanzania, United Republic of</option>
										<option data-calling-code="66" data-eu-tax="unknown" value="TH">Thailand</option>
										<option data-calling-code="670" data-eu-tax="unknown" value="TL">Timor-Leste</option>
										<option data-calling-code="228" data-eu-tax="unknown" value="TG">Togo</option>
										<option data-calling-code="690" data-eu-tax="unknown" value="TK">Tokelau</option>
										<option data-calling-code="676" data-eu-tax="unknown" value="TO">Tonga</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="TT">Trinidad and Tobago</option>
										<option data-calling-code="216" data-eu-tax="unknown" value="TN">Tunisia</option>
										<option data-calling-code="90" data-eu-tax="unknown" value="TR">Turkey</option>
										<option data-calling-code="993" data-eu-tax="unknown" value="TM">Turkmenistan</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="TC">Turks and Caicos Islands</option>
										<option data-calling-code="688" data-eu-tax="unknown" value="TV">Tuvalu</option>
										<option data-calling-code="256" data-eu-tax="unknown" value="UG">Uganda</option>
										<option data-calling-code="380" data-eu-tax="unknown" value="UA">Ukraine</option>
										<option data-calling-code="971" data-eu-tax="unknown" value="AE">United Arab Emirates</option>
										<option data-calling-code="44" data-eu-tax="yes" value="GB">United Kingdom</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="US">United States</option>
										<option data-calling-code="598" data-eu-tax="unknown" value="UY">Uruguay</option>
										<option data-calling-code="998" data-eu-tax="unknown" value="UZ">Uzbekistan</option>
										<option data-calling-code="678" data-eu-tax="unknown" value="VU">Vanuatu</option>
										<option data-calling-code="58" data-eu-tax="unknown" value="VE">Venezuela, Bolivarian Republic of</option>
										<option data-calling-code="84" data-eu-tax="unknown" value="VN">Viet Nam</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="VG">Virgin Islands, British</option>
										<option data-calling-code="1" data-eu-tax="unknown" value="VI">Virgin Islands, U.S.</option>
										<option data-calling-code="681" data-eu-tax="unknown" value="WF">Wallis and Futuna</option>
										<option data-calling-code="" data-eu-tax="unknown" value="EH">Western Sahara</option>
										<option data-calling-code="967" data-eu-tax="unknown" value="YE">Yemen</option>
										<option data-calling-code="260" data-eu-tax="unknown" value="ZM">Zambia</option>
										<option data-calling-code="263" data-eu-tax="unknown" value="ZW">Zimbabwe</option>
									  </select>
									</div>
								  </div>
								  
								  <div class="form-group">
									<label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
									<div class="col-md-6">
									  <input type="text" class="form-control" placeholder="eg .com.my" value=".com.my">
									</div>
								  </div>  
								  
								  <div class="form-group">
									 <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>

									 <div class="col-md-6">
										<div class="xss-margin"></div>
										<div class="checkbox-list">
											<label><input id="inlineCheckbox1" type="checkbox" value="option1" checked="checked"/>&nbsp; Enabled</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option2"/>&nbsp; Disabled</label>
										 </div>
									 </div>
								  </div> 
								  
								  <div class="form-group">
									 <label class="col-md-3 control-label">Domain Addons</label>

									 <div class="col-md-6">
										<div class="xss-margin"></div>
										<div class="checkbox-list">
											<label><input id="inlineCheckbox1" type="checkbox" value="option5"/>&nbsp; Select all</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option6"/>&nbsp; DNS Management</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; Email Forwarding</label>
											<label><input id="inlineCheckbox1" type="checkbox" value="option7"/>&nbsp; ID Protection</label>

										 </div>
									 </div>
								  </div>
								  
								  <div class="table-responsive mtl">
									<table class="table table-hover table-striped">
									  <thead>
										
										<tr>
										  <th>Domain Pricing (RM)</th>
										  <th>1 Year</th>
										  <th>2 Years</th>
										  <th>3 Years</th>
										  <th>4 Years</th>
										  <th>5 Years</th>
										  <th>6 Years</th>
										  <th>7 Years</th>
										  <th>8 Years</th>
										  <th>9 Years</th>
										  <th>10 Years</th>
										</tr>
									  </thead>
									  <tbody>
										<tr>
											<td>Sale Price</td>
											<td><input type="text" class="form-control text-red" value="9.99*"></td>
											<td><input type="text" class="form-control text-red" value="38.49*"></td>
											<td><input type="text" class="form-control text-red" value="47.99*"></td>
											<td><input type="text" class="form-control text-red" value="47.99*"></td>
											<td><input type="text" class="form-control text-red" value="55.59*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
											<td><input type="text" class="form-control text-red" value="61.29*"></td>
										 </tr>      
										 <tr>
											<td>List Price</td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
											<td><input type="text" class="form-control" value="69.99*"></td>
										 </tr>   
									   </tbody>
									   <tfoot>
										<tr colspan="11"></tr>
									   </tfoot>
									</table>
								 </div><!-- end table responsive -->
															  
								  <div class="form-actions">
									<div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
								  </div>
								</form>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					  <!--END MODAL edit pricing transfer -->
						<!--Modal delete transfer start-->
						<div id="modal-delete-price-transfer" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
							  <div class="modal-dialog">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
									<h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
								  </div>
								  <div class="modal-body">
									<p><strong>#2:</strong> .com.my</p>
									<div class="form-actions">
									  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
									</div>
								  </div>
								</div>
							  </div>
						  </div>
						  <!-- modal delete price transfer end -->
					  </td>
					</tr>
					<tr>
					  <tr>
					  <td><input type="checkbox"/></td>
					  <td>1</td>
					  <td>.my</td>
					  <td><span class="text-red">9.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">38.49*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">47.99*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">55.59*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="text-red">61.29*</span><br/><span class="strike">69.99*</span></td>
					  <td><span class="label label-xs label-success">Active</span></td>
					  <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-price-transfer" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-price-transfer" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
					</tr>
					
				   
				  </tbody>
				  <tfoot>
					<tr>
					  <td colspan="15"></td>
					</tr>
				  </tfoot>
				</table>
				<div class="tool-footer text-right">
				<p class="pull-left">Showing 1 to 10 of 57 entries</p>
				<ul class="pagination pagination mtm mbm">
				  <li class="disabled"><a href="#">&laquo;</a></li>
				  <li class="active"><a href="#">1</a></li>
				  <li><a href="#">2</a></li>
				  <li><a href="#">3</a></li>
				  <li><a href="#">4</a></li>
				  <li><a href="#">5</a></li>
				  <li><a href="#">&raquo;</a></li>
				</ul>
			  </div>
			  <div class="clearfix"></div>
				
				<div class="clearfix"></div>
			  </div><!-- end table responsive -->
			  
				 
			</div>
		  </div><!-- End portlet -->
		
		</div><!-- end transfers tab -->
		
		
		
		
	  </div><!-- end all tabs -->

		
	  
	  <div class="clearfix"></div>
	
	</div><!-- end col-lg-12 -->
  
  </div><!-- end row -->

</div>
<!-- InstanceEndEditable -->
<!--END CONTENT-->
@endsection
@section('custom_scripts')
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/css/bootstrap-switch.css">
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/css/datepicker.css">
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
<script type="text/javascript">
page_url=base_url+'/admin/domain_pricing/';

$('#add_new_frm').submit(function(event) {
$('.red_error').html('');
$('#msg_error').hide();
event.preventDefault();
$.ajax({
url:page_url+'new',
type: 'POST',
data: $("#add_new_frm").serialize(),
success: function (data) {
location.reload();
},
error: function (response) {
$('#title').html(response.responseJSON.title);
}
});
});
$('#delete_client').submit(function(event) {
event.preventDefault();
});

$(document).on('click', '#delete_bulk', function(event) {
var selected=$('input[name="id[]"]:checked').length;

event.preventDefault();
if (selected<1) {
$('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
}else{

$('#delete_bulk').attr("disabled",true);
$.ajax({
url: page_url+'delete',
type: 'POST',

data: $("#delete_client").serialize(),
})
.done(function() {
location.reload();
})
.fail(function() {
$('#modal-delete-selected').modal('hide');
alert("Error: no client was selected to delete");
})
.always(function() {
$('#delete_bulk').attr("disabled",false);
});
}

});
function delete_single(id) {
$('#delete_single_button').attr("disabled",true);
$.ajax({
url: page_url+'delete',
type: 'POST',

data: {'_token':csrf_token,'id':id}
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

$("#created_date").datepicker();
function open_modal_delete_selected() {
$('#delete-selected-body-information').html("");
$("#modal-delete-selected").modal('show');
var selected=$('input[name="id[]"]:checked').length;
if (selected<1) {
$('#selected_zero').show()
$('#delete-selected-buttons').hide()
}else{
/*get seleccted users details*/
$.ajax({
url: page_url+'get_details',
type: 'POST',
data: $("#delete_client").serialize()
})
.done(function(response) {
console.log(response);
for (var i=0; i <response.length; i++) {
$('#delete-selected-body-information').prepend('<p>'+
  '<strong>#'+response[i].id+'</strong>:<span>'+response[i].title+'</span>'+
'</p>');
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

function delete_all() {
$.ajax({
url:base_url+'/clients/delete_all',
type: 'POST',
data: {'_token': csrf_token},
})
.done(function() {
location.reload();
})
.fail(function() {
console.log("error");
})
.always(function() {
console.log("complete");
});

}
function per_page_change() {
per_page=$("#per_page_select").find(":selected").val();
window.location.href=page_url+per_page;
}
function add_new_modal() {
/*$("#modal-add-client").modal('show');*/
$('#modal-add-form').modal({
backdrop: 'static',
keyboard: false
})
}
function edit_plan_feature(id) {
$('.red_error').html("");
var status=0;
if ($('#edit_pf_status_'+id).is(":checked"))
{
status=1;
}
var title=$('#edit_pf_title_'+id).val();
$.ajax({
url: page_url+'update',
type: 'POST',
data: {'id': id,'status' : status ,'title' : title,'_token':csrf_token},
})
.done(function() {
location.reload();
})
.fail(function(response) {
$("#pf_error_title"+id).html(response.responseJSON.title);
})
.always(function() {
console.log("complete");
});
}
</script>
<script>
	$('#pages').on('change', function() {
		var perPage = $(this).val();
		var url = '{{ url("/admin/domain_pricing/show/$item->id") }}/' + perPage;
		window.location = url;
	});
	$('[data-target="#modal-delete-pricing"]').click(function() {
		$('#delete-single-id').html($(this).attr('data-id'));
		$('#delete-single-tld').html($(this).attr('data-tld'));
		var action = $('#delete-single-form').attr('action');
		$('#delete-single-form').attr('action', action + $(this).attr('data-id'));
	});
	$('[data-target="#modal-delete-selected"]').click(function() {
		var items = $('.select-items:checked');
		var ids = '';
		var content = '';
		items.each(function() {
			ids += $(this).attr('data-id') + ',';
		});
		items.each(function() {
			content += '<p><strong>#'+$(this).attr('data-id')+':</strong> '+$(this).attr('data-tld')+'</p>';
		});
		ids = ids.slice(0,-1);
		$('#delete-selected-ids').val(ids);
		$('#delete-selected-content').html(content);
	});
	$('[data-target="#modal-edit-price"]').click(function() {
		var modal = $('#modal-edit-price');
		var i = $.parseJSON($(this).attr('data'));
		if (!i.status) {
			modal.children('[name="status"]').prop('checked', false);
		}
		modal.children('[name="tld"]').val(i.tld);
	});
	$('#select-all').change(function() {
		if ($(this).is(':checked')) {
			$('.select-items').prop('checked', true);
		} else {
			$('.select-items').prop('checked', false);
		}
	});
	$('#create-select-all').change(function() {
		if ($(this).is(':checked')) {
			$('.create-select').prop('checked', true);
		} else {
			$('.create-select').prop('checked', false);
		}
	});
	$('#edit-select-all').change(function() {
		if ($(this).is(':checked')) {
			$('.edit-select').prop('checked', true);
		} else {
			$('.edit-select').prop('checked', false);
		}
	});
</script>
<style type="text/css">
/***********************************************/
/************ Jquery Bootstrap Switch *********/
.has-switch {
border-color: #e5e5e5;
}
.has-switch span.switch-left {
text-shadow: none;
background-color: #ed5565;
background-image: none;
border: 1px solid #e5e5e5;
}
.has-switch label {
border-left: 1px solid #e5e5e5;
border-right: 1px solid #e5e5e5;
text-shadow: none;
background-image: none;
border-color: #e5e5e5;
}
.has-switch span.switch-right {
text-shadow: none;
background-color: #f0f0f0;
background-image: none;
border-color: #e5e5e5;
color: #999999;
}
.has-switch span.switch-primary:hover,
.has-switch span.switch-left:hover,
.has-switch span.switch-primary:focus,
.has-switch span.switch-left:focus,
.has-switch span.switch-primary:active,
.has-switch span.switch-left:active,
.has-switch span.switch-primary.active,
.has-switch span.switch-left.active,
.has-switch span.switch-primary.disabled,
.has-switch span.switch-left.disabled,
.has-switch span.switch-primary[disabled],
.has-switch span.switch-left[disabled] {
background-color: #ed5565;
}
.has-switch span.switch-info:hover,
.has-switch span.switch-info:focus,
.has-switch span.switch-info:active,
.has-switch span.switch-info.active,
.has-switch span.switch-info.disabled,
.has-switch span.switch-info[disabled] {
background: #5bc0de;
}
/************ Jquery Bootstrap Switch *********/
/*********************************************/
.datepicker table tr td.active:hover, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active:active, .datepicker table tr td.active:hover:active, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.active, .datepicker table tr td.active:hover.active, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled:hover.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active:hover.disabled, .datepicker table tr td.active.disabled.disabled, .datepicker table tr td.active.disabled:hover.disabled, .datepicker table tr td.active[disabled], .datepicker table tr td.active:hover[disabled], .datepicker table tr td.active.disabled[disabled], .datepicker table tr td.active.disabled:hover[disabled]{
background-color: #b8312f;
}
</style>
@endsection