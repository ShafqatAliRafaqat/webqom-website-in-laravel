<?php $page='categories';
$breadcrumbs=[
array('url'=>false,'name'=>'Services'),
array('url'=>url('admin/categories'),'name'=>'Categories'),
array('url'=>url('admin/services/'.$page_slug),'name'=>$page_name.' Page'),
array('url'=>'javascript:void','name'=>$page_name.'- Add new'),
];
?>
@extends('layouts.admin_layout')
@section('title','Admin | '.$page_name.'- New')
@section('content')
@section('page_header','Services')

<div class="page-content">
<div class="row">
<div class="col-lg-12">
<h2>{{$page_name}} <i class="fa fa-angle-right"></i> Add New</h2>
<div class="clearfix"></div>
<div hidden="" id="success_message" class="messages alert alert-success alert-dismissable">
  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
  <p>The information has been saved/updated successfully.</p>
</div>
<div hidden="" id="error_message" class="messages alert alert-danger alert-dismissable">
  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
  <i class="fa fa-times-circle"></i> <strong>Error!</strong>
  <p>The information has not been saved/updated. Please correct the errors.</p>
</div>
<div class="clearfix"></div>
@if ($errors->any())
<ul class="alert alert-danger">
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</ul>
@endif
<p></p>
<ul id="myTab" class="nav nav-tabs">
  <li class="active"><a href="#general-pricing" data-toggle="tab">General/Pricing</a></li>
  <li><a href="#plan-feature-details" data-toggle="tab">Plan Feature Details</a></li>
  <li><a href="#free-domain" data-toggle="tab">Free Domain</a></li>
</ul>
<div  class="tab-content">

  <div id="general-pricing" class="tab-pane fade in active">
    <form id="frm_genrel" class="form-horizontal" action="{{url('/admin/index-plan/')}}" method="POST" enctype="multipart/form-data">
      <div class="portlet">
        <div class="portlet-header">
          <div class="caption">General</div>
          <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

        </div>
        <input type="hidden" name="page" value="{{$page_name}}">

        <div class="portlet-body">
          <div class="row">
            <div class="col-md-12">

              <div id="frm_genrel" class="form-horizontal" >
                <div class="form-group">
                  {{csrf_field()}}
                  <label class="col-md-3 control-label">Status <span class="text-red">*</span></label>
                  <div class="col-md-6">
                    <div data-on="success" data-off="primary" class="make-switch">
                      <input type="checkbox" name="status" checked="checked"/>
                    </div>
                    <p class="red_error" id="status"></p>
                  </div>
                </div>
                                      <!--<div class="form-group">
                                          <label class="col-md-3 control-label">Service Code <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                              <input type="text" class="form-control" placeholder="eg. LCL-1">
                                          </div>
                                        </div>-->
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Service Code <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <input type="text" name="service_code" class="form-control" placeholder="eg. LCL-1">
                                            <p class="red_error" id="service_code"></p>
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                          <label for="inputFirstName" class="col-md-3 control-label">Plan Name <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <input name="plan_name" type="text" class="form-control" placeholder="eg. L Cloud">
                                            <p class="red_error" id="plan_name"></p>
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Promo Behaviour</label>

                                          <div class="col-md-6">
                                            <div class="xss-margin"></div>
                                            <div class="radio-list">
                                              <label><input name="promo_behaviour" id="promo_radio" type="radio" value="none" checked="checked"/>&nbsp; None</label>
                                              <label><input name="promo_behaviour" id="inlineCheckbox1" type="radio" value="hot"/>&nbsp; Hot</label>
                                              <label><input name="promo_behaviour" id="inlineCheckbox2" type="radio" value="new"/>&nbsp; New</label>
                                              <label><input name="promo_behaviour" id="inlineCheckbox3" type="radio" value="sale"/>&nbsp; Sale</label>
                                              <label><input name="promo_behaviour" id="inlineCheckbox4" type="radio" value="best value"/>&nbsp; Best Value</label>
                                              <label><input name="promo_behaviour" id="inlineCheckbox4" type="radio" value="other"/>&nbsp; Others, please specify:</label>
                                              <input name="promo_behaviour_other" type="text" class="form-control">
                                              <p class="red_error" id="promo_behaviour_other"></p>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="inputFirstName" class="col-md-3 control-label">Category <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            note to programmer: the category list is dynamic.
                                            <select name="category" class="form-control">
                                              <option value="">- Please select -</option>
                                              @if(!empty($categories))
                                              @foreach($categories as $i)
                                              <option value="{{$i->id}}">{{$i->title}}</option>
                                              @endforeach
                                              @endif() 
                                            </select>
                                            <p class="red_error" id="category"></p>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputFirstName" class="col-md-3 control-label">Display Order</label>
                                          <div class="col-md-6">
                                            <input type="text" value="{{old('sort_order')}}" name="sort_order" class=" numOnly form-control" placeholder="eg. 1">
                                            <p class="red_error" id="sort_order"></p>
                                            <div class="xss-margin"></div>
                                            <div class="text-blue text-12px">The display order of the plan positioning in front end from Left to Right.</div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Enable Plan Button</label>

                                          <div class="col-md-6">
                                            <div class="xss-margin"></div>
                                            <div class="radio-list">
                                              <label><input id="inlineCheckbox1" name="enable_plan_button"  type="radio" value="None"/>&nbsp; None</label>
                                              <label><input id="inlineCheckbox1" name="enable_plan_button" type="radio" value="Get Started!" checked="checked"/>&nbsp; Get Started!</label>
                                              <label><input id="inlineCheckbox1" name="enable_plan_button" type="radio" value="Ask for Quote"/>&nbsp; Ask for Quote</label>
                                              <label><input id="inlineCheckbox1" name="enable_plan_button" type="radio" value="Order Now"/>&nbsp; Order Now</label>
                                              <label><input id="inlineCheckbox1" type="radio" value="option7" name="Ask for Quote"/>&nbsp; Ask for Quote</label>
                                              <label><input id="inlineCheckbox4" type="radio" name="enable_plan_button" value="other"/>&nbsp; Others, please specify:</label>
                                              <input name="enable_plan_button_other" value="{{old('enable_plan_button_other')}}" type="text" class="form-control">
                                              <p class="red_error" id="enable_plan_button_other"></p>
                                            </div>

                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputFirstName" class="col-md-3 control-label">Tax <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <div class="xss-margin"></div>
                                            <input checked="" name="Apply_gst" value="1" type="radio"> Apply GST <br/>
                                            <input name="Apply_gst" value="0" type="radio"> Do Not Apply GST
                                          </div>

                                        </div> 

                                      </div><!-- div form end -->


                                    </div><!-- end col-md-12 -->

                                  </div><!-- end row -->

                                  <div class="clearfix"></div>
                                </div><!-- end portlet body -->

                              </div><!-- end portlet -->
                              <!-- end general -->

                              <div class="portlet">

                                <div class="portlet-header">
                                  <div class="caption">Pricing</div>
                                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

                                </div>

                                <div class="portlet-body">
                                  <div class="row">
                                    <div class="col-md-12">

                                      <div class="form-horizontal" id="frm_pricing">

                                        <div class="form-group">
                                          <label for="inputFirstName" class="col-md-3 control-label">Pricing Type <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <div class="xss-margin"></div>
                                            <div class="radio-list">
                                              <label><input name="pricing_type"  id="inlineCheckbox1" type="radio" value="Free" checked="checked"/>&nbsp; Free</label>
                                              <label><input name="pricing_type" id="pricing_one_time" type="radio" value="One Time"/>&nbsp; One Time</label>
                                              <label><input name="pricing_type" id="inlineCheckbox2" type="radio" value="Recurring" />&nbsp; Recurring</label>
                                            </div>
                                            <p class="red_error" id="pricing_type"></p>
                                            <input type="hidden" name="current_currency" id="current_currency" value="RM">
                                            <input type="hidden" name="current_currency_other" id="current_currency_other_txt" value="">
                                            <p class="red_error" id="current_currency"></p>
                                            <p class="red_error" id="current_currency_other"></p>
                                          </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        note to programmer: if choose "free", hide both pricing tables below. If choose "one time", display "one time" pricing table and hide "recurring" pricing table. If choose "recurring" pricing table, hide the "one time" pricing table.
                                        <!-- one time price start -->
                                        <div hidden="" class="one_time_price">
                                          <h5 class="block-heading border-bottom">One Time</h5>
                                          <div class="text-blue">If you select currency to "RM", the price you have entered in below pricing table will be set to "RM".  If you select currency to "USD", the price you have entered in below pricing table will be set to "USD". Please also enter the conversion rate for USD, the system will auto-calculate the pricing to RM and display it in front end plan pricing table.</div>
                                          <div class="xs-margin"></div>
                                          <div class="form-group ">
                                            <label for="inputFirstName" class="col-md-3 control-label">Currency</label>
                                            <div class="col-md-6">
                                              <div class="xss-margin"></div>
                                              <div class="radio-list">
                                                <label><input id="one_time_rm" type="radio"  onblur="select_currency()" name="pricing_currency" value="RM" checked="checked"/>&nbsp; RM</label>
                                                <label><input id="one_time_usd" onchange="select_currency()" type="radio" value="USD" name="pricing_currency" />&nbsp; USD, please specify the conversion rate below to RM </label>
                                                <input   name="pricing_currency_other" value="{{old('pricing_currency_other')}}" type="text" onblur="usd_to_rm(this.value)" class="curreny_other_class form-control">
                                                <div class="xss-margin"></div>
                                                <div class="text-blue text-12px">eg. 1 USD = 3.50 RM</div>
                                                <p class="red_error" id="pricing_currency_other"></p>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- end table responsive -->
                                          <!-- one time price end -->

                                          <!-- recurring price start -->
                                        </div>
                                        <div hidden="" class="recurring_price">
                                          <h5 class="block-heading border-bottom">Recurring</h5>
                                          <div class="text-blue">If you select currency to "RM", the price you have entered in below pricing table will be set to "RM".  If you select currency to "USD", the price you have entered in below pricing table will be set to "USD". Please also enter the conversion rate for USD, the system will auto-calculate the pricing to RM and display it in front end plan pricing table.</div>
                                          <div class="xs-margin"></div>
                                          <div class="form-group">
                                            <label for="inputFirstName" class="col-md-3 control-label">Currency</label>
                                            <div class="col-md-6">
                                              <div class="xss-margin"></div>
                                              <div class="radio-list">
                                                <label><input id="recurring_currency_rm" onchange="select_currency_recurring()"  type="radio" name="recurring_currency" value="RM" checked="checked"/>&nbsp; RM</label>
                                                <label><input id="recurring_currency_usd" type="radio" name="recurring_currency" onchange="select_currency_recurring()" value="USD"/>&nbsp; USD, please specify the conversion rate below to RM </label>
                                                <input name="recurring_currency_other" value="{{old('recurring_currency_other')}}" type="text" onchange="usd_to_rm(this.value)" class="curreny_other_class form-control">
                                                <div class="xss-margin"></div>
                                                <div class="text-blue text-12px">eg. 1 USD = 3.50 RM</div>
                                                <p class="red_error" id="recurring_currency_other"></p>

                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">First Month</label>
                                            <div class="col-md-6">
                                             <input name="recurring_first_month" value="{{old('recurring_first_month')}}" type="text" class="form-control" placeholder="0.00">
                                             <p class="red_error" id="recurring_first_month"></p>
                                           </div>
                                         </div>
                                         <div class="form-group">
                                          <label class="col-md-3 control-label">First Year</label>
                                          <div class="col-md-6">
                                           <input name="recurring_first_year" value="{{old('recurring_first_year')}}" type="text" class="form-control" placeholder="0.00">
                                           <p class="red_error" id="recurring_first_year"></p>
                                         </div>
                                       </div>
                                       <!-- end table responsive -->
                                       <!-- recurring price end -->
                                     </div>
                                     <div id="pricing_table" hidden="" class="table-responsive mtl">
                                      <table class="table table-hover table-striped">
                                        <thead>
                                          <tr>
                                            <th width="15%"></th>
                                            <th width="15%">One Time</th> 
                                            <th width="15%">Monthly</th>
                                            <th class="recurring_price_fields" width="15%">Annually</th>
                                            <th class="recurring_price_fields" width="15%">Biennially</th>
                                            <th class="recurring_price_fields" width="15%">Triennially</th>
                                            <th></th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Setup Fee</td>
                                            <td><input type="text" name="setup_fee_one_time" class="form-control" placeholder="0.00"></td> 
                                            <td><input type="text" name="setup_fee_monthly" class="form-control" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"><input  name="setup_fee_annually" type="text" class="form-control" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"><input name="setup_fee_biennially" type="text" class="form-control" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"><input name="setup_fee_triennially" type="text" class="form-control" placeholder="0.00"></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td>Price</td>
                                            <td><input type="text" name="price_one_time" class="form-control" placeholder="0.00"></td>
                                            <td><input type="text"  class="form-control" name="price_monthly" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"><input type="text" name="price_annually" class="form-control" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"><input type="text" class="form-control" name="price_biennially" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"><input type="text" name="price_triennially" class="form-control" placeholder="0.00"></td>
                                            <td class="recurring_price_fields"></td>
                                          </tr>
                                        </tbody>
                                        <tfoot>
                                          <tr>
                                            <td colspan="7"></td>
                                          </tr>
                                        </tfoot>
                                      </table>
                                      <div class="clearfix"></div>
                                    </div>
                                    <p class="red_error" id="setup_fee_one_time"></p>
                                    <p class="red_error" id="setup_fee_monthly"></p>
                                    <p class="red_error" id="setup_fee_triennially"></p>
                                    <p class="red_error" id="setup_fee_biennially"></p>
                                    <p class="red_error" id="setup_fee_annually"></p>

                                    <p class="red_error" id="price_one_time"></p>
                                    <p class="red_error" id="price_monthly"></p>
                                    <p class="red_error" id="price_annually"></p>
                                    <p class="red_error" id="price_triennially"></p>
                                    <p class="red_error" id="price_biennially"></p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-5 col-md-7"> <a href="javascript:void" onclick="submit_data()" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                    </div>  

                                  </div>


                                </div><!-- end col-md-12 -->

                              </div><!-- end row -->

                              <div class="clearfix"></div>
                            </div><!-- end portlet body -->

                          </div><!-- end portlet -->
                          <!-- end pricing --> 
                        </form>  

                      </div><!-- end tab general/pricing -->



                      <div id="plan-feature-details" class="tab-pane fade">
                        <div class="portlet">
                          <div class="portlet-header">
                            <div class="caption">Plan Features Listing</div>
                            <p style="margin-top: 32px" class="margin-top-10px"></p>
                            <a href="javascript:void" data-target="#modal-add-plan-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                            <div class="btn-group">
                              <button type="button" class="btn btn-primary">Delete</button>
                              <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                              <ul role="menu" class="dropdown-menu">
                                <li><a href="javascript:void" onclick="open_modal_delete_selected()" >Delete selected item(s)</a></li>
                                <li class="divider"></li>
                                <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                              </ul>
                            </div>
                            <!--Modal Add New plan feature start-->
                            <div id="modal-add-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title">Add New Plan Feature</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form">
                                      <form id="plan_feature_frm" class="form-horizontal">
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
                                          <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <input name="title" type="text" class="form-control" placeholder="eg. RAM">
                                            <p class="red_error" id="title"></p>

                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" id="save_feature_plan" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--END MODAL Add New plan feature -->
                            <!--Modal delete selected items plan feature start-->
                            <div id="modal-delete-selected-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#1:</strong> RAM</p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- modal delete selected items plan feature end -->
                            <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                          </div>

                          <div class="portlet-body">
                            <div class="table-responsive mtl">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th width="1%"><input type="checkbox"/></th>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Plan Feature</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <form id="delete_client">
                                    {!!csrf_field()!!}
                                    @if($plan_features)
                                    <?php $count_plan_features=0;?>
                                    @foreach($plan_features as $i)
                                    <?php $count_plan_features++;?>
                                    <tr>
                                      <td><input name="id[]" value="{{$i->id}}" type="checkbox"/></td>
                                      <td>{{$count_plan_features}}</td>
                                      <td><span class="label label-xs label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span></td>
                                      <td>{{$i->title}}</td>
                                      <td><a href="javascript:void" data-target="#modal-edit-plan-feature-{{$i->id}}" data-toggle="modal"  title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                       <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                       <!--Modal Edit plan feature start-->

                                       <!--Modal delete start-->
                                       <div id="modal-delete-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                            </div>
                                            <div class="modal-body">
                                              <p><strong>#{{$i->id}}:</strong> {{$i->title}}</p>
                                              <div class="form-actions">
                                                <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_single({{$i->id}})" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <!-- modal delete end -->

                                      <div id="modal-edit-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog modal-wide-width">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                              <h4 id="modal-login-label3" class="modal-title">Edit Plan Feature</h4>
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
                                                  <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
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
                                      <!--END MODAL Edit plan feature -->
                                    </td>
                                  </tr>
                                  @endforeach
                                  @endif
                                </form>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="5"></td>
                                </tr>
                              </tfoot>
                            </table>
                            <div class="clearfix"></div>
                            <span>Showing  {{$plan_features->firstItem()}} to {{$plan_features->lastItem()}} of {{$plan_features->total()}}</span>
                            <span class="pull-right">{{$plan_features->links()}}</span>
                          </div>
                          <!-- end table responsive -->
                        </div>
                      </div>
                      <!-- end portlet -->                  


                    </div><!-- end tab plan feature details -->


                    <div id="free-domain" class="tab-pane fade">
                      <div class="portlet">

                        <div class="portlet-header">
                          <div class="caption">Free Domain</div>
                          <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                        </div>

                        <div class="portlet-body">
                          <div class="row">
                            <div class="col-md-12">

                              <form class="form-horizontal">

                                <div class="form-group">
                                  <label for="inputFirstName" class="col-md-3 control-label">Free Domain <span class="text-red">*</span></label>
                                  <div class="col-md-8">
                                    <div class="xss-margin"></div>
                                    <div class="radio-list">
                                      <label><input id="inlineCheckbox1" type="radio" value="option1" checked="checked"/>&nbsp; None</label>
                                      <label><input id="inlineCheckbox2" type="radio" value="option2"/>&nbsp; Offer a free domain registration/transfer only (renew as normal)</label>
                                      <label><input id="inlineCheckbox3" type="radio" value="option3"/>&nbsp; Offer a discounted domain registration/transfer only (renew as normal), please enter the first year fee (RM) below:</label>
                                      <input type="text" class="form-control" placeholder="0.00" value="0.00">
                                      <label><input id="inlineCheckbox4" type="radio" value="option4"/>&nbsp; Offer a free domain registration/transfer and free renewal (if product is renewed)</label>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="inputFirstName" class="col-md-3 control-label">Free Domain TLD's</label>
                                  <div class="col-md-5">
                                    <select multiple="multiple" class="form-control" style="height: 400px;">
                                      <option>- Please select -</option>
                                      <option>.com</option>
                                      <option>.org</option>
                                      <option>.net</option>
                                      <option>.co.uk</option>
                                      <option>.me</option>
                                      <option>.info</option>
                                      <option>.ca</option>
                                      <option>.tv</option>
                                      <option>.ninja</option>
                                      <option>.limited</option>
                                      <option>.rocks</option>
                                      <option>.uk</option>
                                    </select>
                                    <div class="xss-margin"></div>
                                    <div class="text-blue text-12px">Use Ctrl + Click to select multiple payment terms and TLD's</div>
                                    note to programmer: the free domain list is dynamic, fetched from domains setup page.
                                  </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="form-actions">
                                  <div class="col-md-offset-5 col-md-7"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                </div> 

                              </form>
                            </div><!-- end col-md-12 -->
                          </div><!-- end row -->

                          <div class="clearfix"></div>
                        </div><!-- end portlet body -->
                      </div><!-- end portlet -->
                    </div><!-- end tab free domain -->



                  </div>
                  <!-- end tab content -->
                  <div class="clearfix"></div>
                </div>
                <!-- end col-lg-12 -->
              </div>
              <!-- end row -->
            </div>
            <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the ssselected <span id="count-seleted"></span> item(s)? </h4>
                  </div>
                  <div class="modal-body" id="delete-selected-body">
                    <div id="delete-selected-body-information"></div>
                    <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one record for delete</p>
                    <div class="form-actions" id="delete-selected-buttons">
                      <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endsection
            @section('custom_scripts')
            <script type="text/javascript">
              page_url=base_url+"/admin/services/";
              function submit_data() {
                $("#frm_genrel").submit();
              }
              $("input[name='pricing_type']").change(function () {
                var selectec_price=$("input[name='pricing_type']:checked").val().toLowerCase();
                if (selectec_price=="free") {
                  $("#pricing_table").hide();
                  $(".one_time_price").hide();
                  $(".recurring_price").hide();
                }else if(selectec_price=='one time'){
                  $("#pricing_table").show();
                  $(".recurring_price_fields").hide();
                  $(".one_time_price").show();
                  $(".recurring_price").hide();
                }else if(selectec_price=="recurring"){
                  $(".recurring_price_fields").show();
                  $("#pricing_table").show();
                  $(".one_time_price").hide();
                  $(".recurring_price").show();
                }
              });
              $(document).on('submit', '#frm_genrel', function(event) {
                $('.red_error').html("");
                $('.messages').hide();
                event.preventDefault();
                var formData = new FormData(this)
                $.ajax({
                  url: base_url+'/admin/services/new_hosting_plan',
                  type: 'POST',
                  data: formData,
          processData: false,  // tell jQuery not to process the data
          contentType: false 
          
        })
                .done(function(response) {
                 $('#success_message').show();
                 $('html body').animate({
                  scrollTop: $(".page-content").offset().top
                }, 700);
               })
                .fail(function(response) {
                  validation_errors=response.responseJSON;
                  console.log(validation_errors);
                  $.each(validation_errors, function(k, v) {
              //display the key and value pair
              //console.log(k + ' is ' + v);
              $('#'+k).html(v)

            });
          /*$('#status').html(validation_errors.status);
          $('#name_line1').html(validation_errors.name_line1);
          $('#name_line2').html(validation_errors.name_line2);
          $('#url').html(validation_errors.url);
          $('#sort_order').html(validation_errors.sort_order);
          $('#enable_plan_button_other').html(validation_errors.enable_plan_button_other);*/
          $('#error_message').show();
          $('html body').animate({
            scrollTop: $(".page-content").offset().top
          }, 700);
        })
                .always(function(response) {

                });

              });
              function select_currency() {
                var value=$('input[name="pricing_currency"]:checked').val();
                $('#current_currency').val(value);
                if (value=='RM') {
        //$('#recurring_currency_rm').val($('input[name="pricing_currency"]:checked').val());
        $('#recurring_currency_rm').prop('checked',true);
      }else{

        $('#recurring_currency_usd').prop('checked',true);
      }
    }
    function select_currency_recurring() {
      var value=$('input[name="recurring_currency"]:checked').val();
      $('#current_currency').val(value);
      if (value=='RM') {
        $('#one_time_rm').prop('checked',true);
        //$('#recurring_currency_rm').val($('input[name="pricing_currency"]:checked').val());
      }else{
        $('#one_time_usd').prop('checked',true);
      }
    }
    function usd_to_rm(value) {
      $('#current_currency_other_txt').val(value);
      $('.curreny_other_class').val(value);
    }
    /*plan feature details  work*/
  /*$('#frm_pf_details').submit(function(event) {
    event.preventDefault();
    $.ajax({
      url: page_url+'pf_details',
      type: 'POST',
      data: $('#frm_pf_details').serialize(),
    })
    .done(function() {
      location.reload();
    })
    .fail(function(response) {
      $('#pf_details_err_title').html(response.responseJSON.title);
    })
    .always(function() {
      console.log("complete");
    });
    
  });
  function delete_single(id) {
      $('#delete_single_button').attr("disabled",true);
      $.ajax({
        url: page_url+'delete_pf_detail',
        type: 'POST',

        data: {'_token':csrf_token,'id_pf_detail':id,}
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

    function edit_pf_details(id) {
      $.post(page_url+'get_details_pf_detail', {'id': id,'_token':csrf_token}, function(data, textStatus, xhr) {
          $('#pf_details_title').val(data.title);
          $('#pf_details_id').val(data.id);
          if (data.status==0) {
            $('#pf_details_status').attr('checked',false);
            $('.make-switch').bootstrapSwitch('setState', false); // true || false
          }
      });
          $('#modal-add-plan-feature-detail').modal('show');
        }*/
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
        $(document).on('click', '#edit_plan_feature', function(event) {
          $.ajax({
            url: page_url+'update/{{$page_slug}}',
            type: 'POST',
            data: $('#plan_feature_edit_frm').serialize(),
          })
          .done(function() {
            location.reload();
          })
          .fail(function(response) {
            validation_errors=response.responseJSON;
            console.log(validation_errors);
            $.each(validation_errors, function(k, v) {
                //display the key and value pair
                //console.log(k + ' is ' + v);
                $('#error_edit_'+k).html(v)

              });
          })
          .always(function() {
            console.log("complete");
          });
        });
        function delete_single(id) {
          $('#delete_single_button').attr("disabled",true);
          $.ajax({
            url: page_url+'feature_plan_delete',
            type: 'POST',

            data: {'_token':csrf_token,'id':id,}
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
              url: base_url+'/admin/cloud_hosting/get_details',
              type: 'POST',
              data: $("#delete_client").serialize()
            })
            .done(function(response) {
              console.log(response);
              for (var i=0; i <response.length; i++) {
                $('#delete-selected-body-information').prepend('<p>'+
                  '<strong>#'+response[i].id+'</strong>:<span>'+response[i].title+'</p>');                      
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
        $(document).on('click', '#delete_bulk', function(event,form_id) {
          var selected=$('input[name="id[]"]:checked').length;


          event.preventDefault();
          if (selected<1) {
            $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
          }else{

            $('#delete_bulk').attr("disabled",true);
            $.ajax({
              url: base_url+'/admin/cloud_hosting/delete',
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

      </script>
      @endsection