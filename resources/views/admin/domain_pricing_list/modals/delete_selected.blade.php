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
		<form action="{{ route('domain_pricing_list.destroy_selected') }}" method="post" style="display:inline">
			{{ method_field('DELETE') }}
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
