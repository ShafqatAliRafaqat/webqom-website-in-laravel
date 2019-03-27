<!--Modal Add New Pricing start-->
<div id="modal-add-new-price-{{ $type }}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
<div class="modal-dialog modal-wide-width">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
		<h4 id="modal-login-label3" class="modal-title">Add New Pricing</h4>
	</div>
	<div class="modal-body">
		<div class="form">
		<form class="form-horizontal" method="post" action="{{route('domain_pricing_list.store')}}">
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
				<input type="hidden" name="domain_pricing_id" value="{{ $item->id }}">
				<input type="hidden" name="type" value="<?php if (is_numeric($type)){echo 'new';}else{echo $type;}?>">
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
					<label><input type="checkbox" data-toggler data-toggle=".toggle-create-{{$type}}">&nbsp; Select all</label>
					<label><input class="toggle-create-{{$type}}" name="addons[]" type="checkbox" value="DNS Managment">&nbsp; DNS Management</label>
					<label><input class="toggle-create-{{$type}}" name="addons[]" type="checkbox" value="Email Forwarding">&nbsp; Email Forwarding</label>
					<label><input class="toggle-create-{{$type}}" name="addons[]" type="checkbox" value="ID Protection">&nbsp; ID Protection</label>
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
					@for ($i = 1; $i <= 10; $i++)
						<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="sale_price[{{$i}}]" class="form-control text-red"></td>
					@endfor
				 </tr>
				 <tr>
					<td>List Price</td>
					@for ($i = 1; $i <= 10; $i++)
						<td><input type="text" required pattern="^(\d+)(\.\d\d|)$" title="This should be number with only two digits after dot" name="list_price[{{$i}}]" class="form-control"></td>
					@endfor
				 </tr>
				 </tbody>
				 <tfoot>
				<tr colspan="11"></tr>
				 </tfoot>
			</table>
			</div><!-- end table responsive -->
			<div class="form-actions">
				<div class="col-md-offset-5 col-md-8">
					<button type="submit" class="btn btn-red">
						Save &nbsp;<i class="fa fa-floppy-o"></i>
					</button>
					<a href="#" data-dismiss="modal" class="btn btn-green">
						Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i>
					</a>
				</div>
			</div>
		</form>
		</div>
	</div>
	</div>
</div>
</div>
<!--END MODAL Add New Pricing-->
