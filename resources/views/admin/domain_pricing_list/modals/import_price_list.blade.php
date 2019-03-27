<!--Modal Add New Pricing start-->
<div id="modal-import-price-list-{{ $type }}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
<div class="modal-dialog modal-wide-width">
	<div class="modal-content">
	<div class="modal-header">
		<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
		<h4 id="modal-login-label3" class="modal-title">Import price list {{ $type }}</h4>
	</div>
	<div class="modal-body">
		<div class="form">
		<form class="form-horizontal ajax-form" enctype="multipart/form-data" method="post" action="{{route('domain_pricing_list.import')}}">
			<div class="form-group">
			<label class="col-md-3 control-label">Status</label>
			<div class="col-md-6">
				<div data-on="success" data-off="primary" class="make-switch">
				<input type="checkbox" checked="checked" name="status">
				</div>
			</div>
			</div>
			<div class="form-group">
    			<label class="col-md-3 control-label">Country <span class="text-red"> </span></label>
    			<div class="col-md-6">
    				<select name="country" class="form-control">
    				<option value="">-- Please select (Empty - update all countries) --</option>
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
                <label class="col-md-3 control-label">File (Csv / Excel) <span class="text-red">* </span></label>
                <div class="col-md-6">
                     <input type="file" name="price_list" required>
                </div>
            </div>
			<div class="form-actions">
				<div class="col-md-offset-4 col-md-8">
					<button type="submit" class="btn btn-red">
						Import for {{ $type }}  &nbsp;<i class="fa fa-floppy-o"></i>
					</button>
					<a href="#" data-dismiss="modal" class="btn btn-green cancel-button">
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
