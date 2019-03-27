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
						<form action="" method="POST" id="delete-single-form" style="display: inline">
							{{ method_field('DELETE') }}
							{{ csrf_field() }}
							<button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>
						</form>
						&nbsp;
						<a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- modal delete end -->
