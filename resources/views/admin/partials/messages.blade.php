@if(Session::has('success'))
	<div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>{{Session::get('success')}}</p>
    </div>
@endif

<div class="alert alert-success alert-dismissable" style="display: none;">
    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
    <i class="fa fa-check-circle"></i> <strong>Success!</strong>
    <p class="message"></p>
</div>

@if(Session::has('info'))
	<div class="alert alert-info"><strong>Information: </strong>{{Session::get('info')}}</div>
@endif

@if(Session::has('danger'))
	<div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>{{Session::get('danger')}}</p>
              </div>
@endif
<div class="alert alert-danger alert-dismissable" style="display: none;">
    <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
    <i class="fa fa-times-circle"></i> <strong>Error!</strong>
    <p class="message"></p>
</div>
@if($errors->any())
        <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved. Please correct the errors.</p>
              </div>
    
@endif<!-- 
@if($errors->any())
    	<div class="col-md-6 col-md-offset-3"></div>
        @foreach($errors->all() as $error)
            <div class="alert alert-danger"><p>{{ $error }}</p></div>
        @endforeach
    
@endif -->