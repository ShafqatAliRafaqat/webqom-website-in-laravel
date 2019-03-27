<?php if ($domain_pricing instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
<?php $per_page = $domain_pricing->perPage();?>
<?php else: ?>
<?php $per_page = 10;?>
<?php endif?>
<?php $page = 'domains';
$sub_page = 'bulk_domain';
$countries = App\Models\Country::all();
$breadcrumbs = [
    array('url' => false, 'name' => 'Services'),
    array('url' => false, 'name' => 'Domains'),
    array('url' => 'javascript:void', 'name' => $page_name . '- Listing'),
];
?>
@extends('layouts.admin_layout')
@section('title','Admin | Bulk Domain Pricing - Listing')
@section('content')
@section('page_header','Services')
<div class="page-content">
  <div class="row">
    <div class="col-lg-12">
      <h2>Bulk Domain Pricing<i class="fa fa-angle-right"></i> Listing</h2>
      <div class="clearfix"></div>
      @include('admin.partials.messages')

      <div class="pull-left"> Last updated: <span class="text-blue">{{$recent_update}}</span> </div>
      <div class="clearfix"></div>
      <p></p>
      <div class="clearfix"></div>
    </div>

    <!-- end col-md-6 -->
    <div class="col-lg-12">
      <div class="portlet">
        <div class="portlet-header">
          <div class="caption">Bulk Domain Pricing Listing</div>
          <p style="margin-top:30px" class="margin-top-10px"></p>
          <a href="javascript:void(0)" class="btn btn-success" onclick="add_new_modal()">Add New TLD Type &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
          <div class="btn-group">
            <button type="button" class="btn btn-primary">Delete</button>
            <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
            <ul role="menu" class="dropdown-menu">
              <li><a href="javascript:voi" onclick="open_modal_delete_selected()">Delete selected item(s)</a></li>
              <li class="divider"></li>
              <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
            </ul>
          </div>&nbsp;
          <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
          <!--Modal add new client start-->
          <!--Modal Add New plan feature start-->
          <div id="modal-add-form" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-wide-width">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                  <h4 id="modal-login-label3" class="modal-title">Add TLD Type</h4>
                </div>
                <div class="modal-body">
                  <div class="form">
                    <form id="add_new_frm" class="form-horizontal">
                      {!!csrf_field()!!}
                      <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-6">
                          <div data-on="success" data-off="primary" class="make-switch">
                            <input name="status" type="checkbox" checked="checked"/>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-3 control-label">TLD Type <span class="text-red">*</span></label>
                        <div class="col-md-6">
                          <input name="title" type="text" class="form-control" placeholder="eg. Generic TLD">
                          <p class="red_error" id="title"></p>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="col-md-offset-5 col-md-8"> <button  class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--END MODAL add new client -->
          <!--Modal delete selected items start-->
          <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected <span id="count-seleted"></span> item(s)? </h4>
                </div>
                <div class="modal-body" id="delete-selected-body">
                  <div id="delete-selected-body-information"></div>
                  <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one item for delete</p>
                  <div class="form-actions" id="delete-selected-buttons">
                    <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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
                    <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_all()" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- modal delete all items end -->
        </div>
        <div class="portlet-body">

          <div class="clearfix"></div>
          <div class="table-responsive mtl">
            <div class="form-group col-md-2">
              <select class="form-control" id="per_page_select" onchange="per_page_change()">
                <option value="10" @if($per_page==10) selected="" @endif>Show 10</option>
                <option value="15" @if($per_page==15) selected="" @endif>Show 15</option>
                <option value="20" @if($per_page==20) selected="" @endif>Show 20</option>
              </select>
            </div>
            <div class="clearfix"></div>
            <form id="delete_client">
              <table id="clients_list" class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th width="1%"><input type="checkbox"/></th>
                    <th>#</th>
                    <th><a href="#sort by client id">TLD Type </a></th>
                    <th><a href="#sort by status">Status</a></th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!empty($domain_pricing))
                  <?php if ($domain_pricing instanceof \Illuminate\Pagination\LengthAwarePaginator) {?>
                  <?php $count = $domain_pricing->firstItem();?>
                  <?php } else {?>
                  <?php $count = 1;?>
                  <?php }?>
                  @foreach($domain_pricing as $i)


                  <tr id="clienttbl_row_{{$i->id}}">
                    <td><input name="id[]" value="{{$i->id}}" type="checkbox"/></td>
                    <td>{{$count}}</td>
                    <td>{{$i->title}}</td>

                    <td><span class="label label-xs label-<?php echo $i->status == 1 ? "success" : "red" ?>"><?php echo $i->status == 1 ? "Active" : "Inactive" ?></span></td>
                    <td>
                      <a href="#" data-hover="tooltip" data-placement="top" title="Edit" data-target="#modal-edit-form-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                      
                      <!-- <a href="{{ route('domain_pricing_list.show',$i->id) }}" data-hover="tooltip" data-placement="top" title="Add Pricing"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a> -->
                      <a href="#" data-target="#modal-add-new-price-{{$i->id}}"  data-toggle="modal" data-hover="tooltip" data-placement="top" title="Add Pricing"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a>
                      
                      <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                    </td>
                  </tr>
                  <?php $count++;?>

                  @endforeach
                  @endif
                </tbody>
                <tfoot>
                <tr>
                  <td colspan="10"></td>
                </tr>
                </tfoot>
              </table>


              <?php if ($domain_pricing instanceof \Illuminate\Pagination\LengthAwarePaginator) {?>
              <span>Showing  {{$domain_pricing->firstItem()}} to {{$domain_pricing->lastItem()}} of {{$domain_pricing->total()}}</span>
              <span class="pull-right">{{$domain_pricing->links()}}</span>
              <?php } else {?>
              <span>Total records: {{count($domain_pricing)}}</span>
              <?php }?>

              {{csrf_field()}}
            </form>
          @foreach($domain_pricing as $i)
              <!--Modal Add New Pricing start-->
                  <div id="modal-add-new-price-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                      <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                  <h4 id="modal-login-label3" class="modal-title">Add New Pricing</h4>
                              </div>
                              @php($listing = $i->listing)
                              <div class="modal-body">
                                  <div class="form">
                                      <form class="form-horizontal" name="bulk_doman_form2" id="bulk_doman_form2{{$i->id}}" enctype="multipart/form-data" method="POST" action="/admin/bulk_domain/add">
                                          {{csrf_field()}}
                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Status</label>
                                              <div class="col-md-6">
                                                  <div data-on="success" data-off="primary" class="make-switch">
                                                      <input name="status" type="checkbox" {{ (!empty($listing) && !empty($listing->status))?'checked="checked"':'' }} value="1"/>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="col-md-3 control-label">TLD <span class="text-red">*</span></label>
                                              <div class="col-md-6">
                                                  <input type="text" name="tld" class="form-control" placeholder="eg .com" value="{{ (!empty($listing) && !empty($listing->tld))?$listing->tld:'' }}">
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="col-md-3 control-label">EPP Code <span class="text-red">*</span></label>

                                              <div class="col-md-6">
                                                  <div class="xss-margin"></div>
                                                  <div class="checkbox-list">
                                                      <label><input type="radio" value="1" {{ (!empty($listing) && !empty($listing->epp_code == 1))?'checked="checked"':'' }} name="epp_code"/>&nbsp; Enabled</label>
                                                      <label><input type="radio" value="0" {{ (!empty($listing) && !empty($listing->epp_code == 2))?'checked="checked"':'' }} name="epp_code"/>&nbsp; Disabled</label>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label class="col-md-3 control-label">Domain Addons</label>

                                              <div class="col-md-6">
                                                  <div class="xss-margin"></div>
                                                  <div class="checkbox-list" name="list-select-all">
                                                      <label><input name="select-all" type="checkbox" value="option5"/>&nbsp; Select all</label>
                                                      @php
                                                        $selected_addons = (!empty($listing) && !empty($listing->addons))? explode(';',$listing->addons):[];
                                                      @endphp
                                                      @foreach($domain_addons as $domain_addon)
                                                          <label><input type="checkbox" name="addons[]" value="{{ $domain_addon->id }}" {{ (!empty($listing) && in_array($domain_addon->id, $selected_addons))?'checked="checked"':'' }}/>&nbsp;{{ $domain_addon->title }} {{ $domain_addon->price }}</label>
                                                      @endforeach
                                                      <input type="hidden" name="domain_pricing_id" value="{{$i->id}}">
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
                                                  @foreach($RMSALE as $key=>$domain)
                                                      <?php
                                                      $index = $key;
                                                      $pricing = $i->bulk_pricing->where('duration', $domain['duration'])->first();
                                                      ?>
                                                      <tr>
                                                          <td>Sale Price ({{$domain['duration']}})</td>
                                                          <td><input type="text" name="year_sale_1{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_1 ))?$pricing->year_sale_1:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_2{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_2 ))?$pricing->year_sale_2:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_3{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_3 ))?$pricing->year_sale_3:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_4{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_4 ))?$pricing->year_sale_4:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_5{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_5 ))?$pricing->year_sale_5:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_6{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_6 ))?$pricing->year_sale_6:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_7{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_7 ))?$pricing->year_sale_7:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_8{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_8 ))?$pricing->year_sale_8:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_9{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_9 ))?$pricing->year_sale_9:'' }}" class="form-control text-red"></td>
                                                          <td><input type="text" name="year_sale_10{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_sale_10 ))?$pricing->year_sale_10:'' }}" class="form-control text-red"></td>
                                                      </tr>
                                                      <tr>
                                                          <td>List Price ({{$RMLIST[$index]['duration']}})</td>
                                                          <td><input type="text" name="year_list_1{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_1 ))?$pricing->year_list_1:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_2{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_2 ))?$pricing->year_list_2:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_3{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_3 ))?$pricing->year_list_3:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_4{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_4 ))?$pricing->year_list_4:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_5{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_5 ))?$pricing->year_list_5:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_6{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_6 ))?$pricing->year_list_6:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_7{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_7 ))?$pricing->year_list_7:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_8{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_8 ))?$pricing->year_list_8:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_9{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_9 ))?$pricing->year_list_9:'' }}" class="form-control"></td>
                                                          <td><input type="text" name="year_list_10{{$index}}" value="{{ (!empty($pricing) && !empty($pricing->year_list_10 ))?$pricing->year_list_10:'' }}" class="form-control"></td>
                                                      </tr>
                                                  @endforeach
                                                  </tbody>
                                                  <tfoot>
                                                  <tr colspan="11"></tr>
                                                  </tfoot>
                                              </table>
                                          </div><!-- end table responsive -->

                                          <div class="form-actions">
                                              <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" onclick="add_sub_cat('bulk_doman_form2{{$i->id}}')" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!--END MODAL Add New Pricing-->

                  <!--Modal delete start-->
                  <div id="modal-delete-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this record? </h4>
                              </div>
                              <div class="modal-body">
                                  <p><strong>#{{$i->id or ""}}:</strong> {{$i->title}} </p>
                                  <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> <button type="button" class="btn btn-red delete_single_button" onclick="delete_single({{$i->id}})">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div id="modal-edit-form-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                      <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                  <h4 id="modal-login-label3" class="modal-title">Edit TLD Type</h4>
                              </div>
                              <div class="modal-body">
                                  <div class="form">
                                      <div class="form-group">
                                          <label class="col-md-3 control-label">Status</label>
                                          <div class="col-md-6">
                                              <div data-on="success" data-off="primary" class="make-switch">
                                                  <input id="edit_pf_status_{{$i->id}}" type="checkbox" @if($i->status==1) checked="checked" @endif />
                                              </div>
                                          </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div style="margin-top: 8px" class="form-group">
                                          <label class="col-md-3 control-label">TLD Type <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                              <input type="text" id="edit_pf_title_{{$i->id}}" class="form-control" placeholder="eg. RAM" value="{{$i->title}}" />
                                              <p class="red_error" id="pf_error_title{{$i->id}}"></p>
                                          </div>
                                      </div>
                                      <br>
                                      <br>
                                      <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" onclick="edit_plan_feature({{$i->id}})" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- modal delete end -->
              @endforeach
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
      <!-- end portlet -->
    </div>
    <!-- end col-lg-12 -->
  </div>
  <!-- end row -->
</div>
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
$('.delete_single_button').attr("disabled",true);
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


  function add_sub_cat(frmid) {

//$('form#bulk_doman_form2').submit();

    $.ajax({
      url: base_url + '/web88/admin/bulk_domain/add',
          type: 'POST',
          data: $('#'+frmid).serialize(),

      })

      .done(function(response) {

         location.reload();
//        var text = $('#'+frmid).find('input[name="domain_pricing_id"]').val();
//        window.location.href = base_url + '/web88/admin/bulk_domain/pricing/'+text+'/0';
      }).fail(function(response) {

        validation_errors = response.responseJSON;
            console.log(validation_errors);
            $.each(validation_errors, function(k, v) {
            //display the key and value pair
            //console.log(k + ' is ' + v);
            $('#' + id + '_error_edit_' + k).html(v)

            });
        })
      .always(function() {

      });
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
$('[name="select-all"]').change(function() {
  if(this.checked){
$('input', $('[name="list-select-all"]')).each(function () {
    this.checked = true; //log every element found to console output
});
  }else{
$('input', $('[name="list-select-all"]')).each(function () {
    this.checked = false; //log every element found to console output
});
  }
});
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