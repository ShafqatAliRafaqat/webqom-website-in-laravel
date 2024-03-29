 <?php if ($clients instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
<?php $per_page=$clients->perPage(); ?>
<?php else: ?>
<?php $per_page=10; ?>
<?php endif ?>

<?php $page='clients';
$breadcrumbs=[
              array('url'=>url('clients/listing'),'name'=>'Clients'),
              array('url'=>url('clients/listing'),'name'=>'Clients - Listing'),

];
?>
@extends('layouts.admin_layout')
@section('title','Admin | Clients - Listing')
@section('content')
@section('page_header','Clients')

<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Clients <i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>
              @include('admin.partials.messages')
              @if(isset($search_success))
                      <div class="alert alert-success alert-dismissable">
                                  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                                  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                                  <p>{{$search_success}}</p>
                      </div>            
              @endif 
              @if(isset($search_error))
                      <div class="alert alert-danger alert-dismissable">
                                  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                                  <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                                  <p>{{$search_error}}</p>
                      </div>            
              @endif
              <div class="pull-left"> Last updated: <span class="text-blue">{{$recent_update}}</span> </div>
              <div class="clearfix"></div>
              <p></p>
              <div class="clearfix"></div>
            </div>
            <!-- end col-lg-12 -->
            <div class="col-md-12">
              <div class="portlet portlet-blue">
                <div class="portlet-header">
                  <div class="caption text-white">Search Clients</div>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                  <form class="form-horizontal" action="{{url('/clients/search_clients')}}" method="POST">
                    <div class="col-md-6">
                    
               
                      <div class="form-group">
                        <label class="col-md-4 control-label">Client ID </label>
                        <div class="col-md-8">
                          <input autocomplete="off" name="client_id" value="{{ $_POST['client_id'] or ''}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Client Name </label>
                        <div class="col-md-8">
                          <input autocomplete="off" name="client_name" value="{{ $_POST['client_name'] or ''}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Email </label>
                        <div class="col-md-8">
                          <input autocomplete="off" name="email" value="{{ $_POST['email'] or ''}}" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <!-- end col-md 6 -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-md-4 control-label">Company </label>
                        <div class="col-md-8">
                          <input autocomplete="off" name="company" value="{{ $_POST['company'] or ''}}" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Registered Date </label>
                        <div class="col-md-8">
                          <div class="input-group">
                            <input type="text" autocomplete="off" id="created_date" value="{{  $_POST['created_date'] or '' }}" name="created_date" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" class="datepicker-default form-control" />
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-4 control-label">Account Type </label>
                        <div class="col-md-8">
                          <select  autocomplete="off" name="account_type" class="form-control">
                            <option value="account">--Select--</option>
                            <option @if(isset($_POST['account_type']) && $_POST['account_type']=="Business Account") selected="" @endif>Business Account</option>
                            <option @if(isset($_POST['account_type']) && $_POST['account_type']=="Individual Account") selected="" @endif>Individual Account</option>
                          </select>
                        </div>
                        {{ old('account_type') }}
                      </div>
                    </div>
                    <!-- end col-md 6 -->
                    <div class="clearfix"></div>
                    <!-- save button start -->
                    <div class="form-actions text-center"> <button class="btn btn-red">Search &nbsp;<i class="fa fa-search"></i></button> </div>
                    <!-- save button end -->
                    {{csrf_field()}}
                  </form>
                </div>
                <!-- end portlet-body -->
              </div>
              <!-- end portlet -->
            </div>
            <!-- end col-md-6 -->
            <div class="col-lg-12">
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Clients Listing</div>
                  <p style="margin-top:30px" class="margin-top-10px"></p>
                  <a href="javascript:void(0)" class="btn btn-success" onclick="add_new_client_modal()">Add New Client &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="javascript:voi" onclick="open_modal_delete_selected()">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>&nbsp;
                  <a href="{{url('/clients/export')}}" class="btn btn-blue">Export to CSV &nbsp;<i class="fa fa-share"></i></a>  
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                  <!--Modal add new client start-->
                  <div id="modal-add-client" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title">Add New Client</h4>
                        </div>
                        <div id="modal-add-client-body" class="modal-body">
                          <div class="form">
                            <form class="form-horizontal" id="client_form">
                              <h5 class="block-heading">Client Account Information</h5>
                              <span id="msg_error" style="display: none" class="col-md-offset-3 col-md-6 alert alert-danger">Please fill all the required fields</span>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Status <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    <input type="checkbox" name="status" id="status" checked="checked"/>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-4 control-label">Account Type <span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <div class="radio-list">
                                    <label class="radio-inline">
                                      <input id="optionsRadios4" name="account_type" type="radio" name="optionsRadios" value="Business Account"/>
                                      &nbsp; Business Account</label>
                                    <label class="radio-inline">
                                      <input id="optionsRadios5" type="radio" checked="checked" name="account_type" value="Individual Account"/>
                                      &nbsp; Individual Account</label>
                                  </div>
                                </div> 
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">First Name <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <input type="text" name="first_name" id="first_name" class="form-control" placeholder="">
                                  <div class="red_error" id="err_fname"></div>
                                </div>
                                
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Last Name <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <input type="text" name="last_name" id="last_name" class="form-control" placeholder="">
                                  <div class="red_error" id="err_lname"></div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Company <span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <input name="company" id="company" type="text" class="form-control" placeholder="">
                                  <div class="text-11px text-red">(* Mandatory for Business Account)</div>
                                  <div class="red_error" id="err_company"></div>
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Email <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <input type="text" name="email" id="email" class="form-control">
                                  <div class="red_error" id="err_emailc"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="label" class="control-label col-md-4">Password <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <div class="input-icon"><i class="fa fa-key"></i>
                                      <input id="password_client" name="password" type="password" placeholder="Password" class="form-control"/>
                                    <span class="text-10px">(Password length should be at least 12 characters)</span>
                                    <div class="red_error" id="err_passwordc"></div> 
                                </div>
                                  <p><a href="javascript:void(0)" id="generate_password">Generate Password</a></p>
                                  
                                  <input type="text" style="display:none" value="" id="password_text" class="form-control"/>
                                  <div id="password_options" style="display:none" class="col-md-offset-4 col-md-7 margin-top-10px"> <a href="javascript:void(0)" id="apply_password" class="btn btn-red">Ok &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="javascript:void(0)"  class="btn btn-green" id="cancel_password">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="label" class="control-label col-md-4"></label>
                                <div class="col-md-6">
                                  <div data-hover="tooltip" data-placement="top"  class="progress progress-striped active">
                                    <div id="progress_bar_client" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" class=" ">
                                        <span class="sr-only" ></span>
                                        <span class="progress-completed" id="progressbar_text_client"></span>
                                    </div>
                                  </div>
                                </div>
                                <!-- col-md-6 -->
                              </div>
                              <!-- end form group -->
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="label" class="control-label col-md-4">Confirm Password <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <div class="input-icon"><i class="fa fa-key"></i>
                                      <input id="cpassword"  type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control"/>
                                    <p class="dark">Password must be at least 12 characters. The combination of the password must be alphanumeric with one special character <span class="sitecolor">(eg. ! @ # $ % ^ & * ( ) _ + { } | : < > ? " \ [ ] ' ; / . ~ `)</span></p> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Phone <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <input type="text" name="phone_number" id="phone" class="form-control">
                                  <div class="red_error" id="err_phone"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Mobile Phone <span class="text-red">*</span></label>
                                <div class="col-md-6">
                                  <input name="mobile_phone_number" id="mobile_phone" type="text" class="form-control">
                                  <div class="red_error" id="err_mphone"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Address <span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <input name="address_1" id="address_1" type="text" class="form-control">
                                  <div class="red_error" id="err_add1"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Address 2 </label>
                                <div class="col-md-6">
                                  <input name="address_2" id="address_2" type="text" class="form-control">
                                  <div class="red_error" id="err_add2"></div> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Postal Code <span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <input name="postal_code" id="postal_code" type="text" class="form-control">

                                  <div class="red_error" id="err_pcode"></div> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputFirstName"  class="col-md-4 control-label">Country <span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <select name="country" class="form-control countries" id="country">
                                    <option value=''>-- Please select --</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                    </select>
                                    <div class="red_error" id="err_country"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName"  class="col-md-4 control-label">State<span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <select name="state" class="states form-control" id="state">
                                    <option value=''>-- Please select --</option>
                                </select>
                                <div class="red_error" id="err_state"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName"  class="col-md-4 control-label">City <span class="text-red">* </span></label>
                                <div class="col-md-6">
                                  <select name="city" class="cities form-control" id="city">
                                    <option value=''>-- Please select --</option>
                                    </select>
                                    <div class="red_error" id="err_city"></div> 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-md-4 control-label">Newsletter Subscription</label>
                                <div class="col-md-6">
                                  <div class="margin-top-10px">
                                    <input type="checkbox" name="news_letter" checked="checked">
                                    Yes! I would like to subscribe to your newsletter. </div>
                                </div>
                              </div>
                              <div class="md-margin clearfix"></div>
                              <h5 class="block-heading">Billing Address</h5>
                              <div class="form-group">
                                <label class="col-md-4 control-label"></label>
                                <div class="col-md-6">
                                  <input type="checkbox" id="same_details" >
                                  My Billing address is the same as account information above. </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">First Name</label>
                                <div class="col-md-6">
                                  <input type="text" name="billing_first_name" id="billing_first_name" class="form-control" placeholder="">
                                  <div class="red_error" id="err_fname_billing"></div> 
                                </div>

                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Last Name</label>
                                <div class="col-md-6">
                                  <input type="text" name="billing_last_name" id="billing_last_name" class="form-control" placeholder="">
                                  <div class="red_error" id="err_lname_billing"></div> 
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Company</label>
                                <div class="col-md-6">
                                  <input type="text" name="billing_company" id="billing_company" class="form-control" placeholder="">
                                <div class="red_error" id="err_company_billing"></div> 
                                </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Email </label>
                                <div class="col-md-6">
                                  <input type="text" name="billing_email" id="billing_email" class="form-control">
                                  <div class="red_error" id="err_emailc_billing"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Phone </label>
                                <div class="col-md-6">
                                  <input type="text" name="billing_phone_number" id="billing_phone_number" class="form-control">
                                  <div class="red_error" id="err_phone_billing"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Mobile Phone </label>
                                <div class="col-md-6">
                                  <input name="billing_mobile_phone" id="billing_mobile_phone" type="text" class="form-control">
                                  <div class="red_error" id="err_mphone_billing"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Address 1</label>
                                <div class="col-md-6">
                                  <input name="billing_address_1" id="billing_address_1" type="text" class="form-control">
                                  <div class="red_error" id="err_add1_billing"></div> 
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Address2 </label>
                                <div class="col-md-6">
                                  <input type="text" name="billing_address_2" id="billing_address_2" class="form-control">
                                  <div class="red_error" id="err_add2_billing"></div> 

                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Country</label>
                                <div class="col-md-6">
                                  <select name="billing_country" id="billing_country" class="form-control">
                                    <option value="">-- Please select --</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                    
                                  </select>
                                   <div class="red_error" id="err_country_billing"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName"  class="col-md-4 control-label">State</label>
                                <div class="col-md-6">
                                  <select name="billing_state" id="billing_state" class="form-control">
                                    <option value="">-- Please select --</option>
                                    
                                    
                                  </select>
                                   <div class="red_error" id="err_state_billing"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">City</label>
                                <div class="col-md-6">
                                  <select name="billing_city" id="billing_city" class="form-control">
                                    <option value="">-- Please select --</option>
                                    
                                    
                                  </select>
                                   <div class="red_error" id="err_city_billing"></div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputFirstName" class="col-md-4 control-label">Postal Code</label>
                                <div class="col-md-6">
                                  <input name="billing_postal_code" id="billing_postal_code" type="text" class="form-control">
                                   <div class="red_error" id="err_pcode_billing"></div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="col-md-offset-5 col-md-8"> <a href="javascript:void(0)" id="save_client" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                              </div>
                              {{csrf_field()}}
                              <input type="hidden" id="strength_client_pass" value="0" name="strength">
                              <input type="hidden"  value="1" name="num_of_cities">
                              <input type="hidden"  value="1" name="num_of_bcities">
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
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one client for delete</p>
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
                          <th><a href="#sort by client id">Client ID</a></th>
                          <th><a href="#sort by customer name">Client Name</a></th>
                          <th><a href="#sort by email">Email</a></th>
                          <th><a href="#sort by comapny">Company</a></th>
                          <th><a href="#sort by registered date">Registered Date</a></th>
                          <th><a href="#sort by type">Type</a></th>
                          <th><a href="#sort by status">Status</a></th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      @if(!empty($clients))
                             <?php if ($clients instanceof \Illuminate\Pagination\LengthAwarePaginator){ ?>
                                <?php $count=$clients->firstItem(); ?>
                              <?php }else{ ?>
                                <?php $count=1;?>
                              <?php } ?>
                            @foreach($clients as $client)
                               
                                    <tr id="clienttbl_row_{{$client->id}}">
                                      <td><input name="id[]" value="{{$client->id}}" type="checkbox"/></td>
                                      <td>{{$count}}</td>
                                      <td>{{$client->client_id or ""}}</td>
                                      <td>{{$client->first_name." ".$client->last_name}}</td>
                                      <td><a href="mailto:danny@webqom.com">{{$client->email}}</a></td>
                                      <td>{{$client->company}}</td>
                                      <td>{{date("d-M-Y",strtotime($client->created_at))}}</td>
                                      <td>{{$client->account_type}}</td>
                                      <td><span class="label label-xs label-<?php echo  $client->status==1 ? "success" :"red" ?>"><?php echo  $client->status==1 ? "Active" :"Inactive" ?></span></td>
                                      <td><a href="{{url('/clients/edit').'/'.$client->id}}" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$client->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                          <!--Modal delete start-->
                                          <div id="modal-delete-{{$client->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this client? </h4>
                                                </div>
                                                <div class="modal-body">
                                                  <p><strong>#{{$client->client_id or ""}}:</strong> {{$client->first_name}} {{$client->last_name}}<br/>
                                                      <strong>Company:</strong> {{$client->company}} </p>
                                                  <div class="form-actions">
                                                    <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_single_button" class="btn btn-red" onclick="delete_single({{$client->id}})">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <!-- modal delete end -->
                                      </td>
                                    </tr>
                                     <?php $count++; ?>   
                            @endforeach
                        @endif
                        </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="10"></td>
                        </tr>
                      </tfoot>
                    </table>

                    <?php if ($clients instanceof \Illuminate\Pagination\LengthAwarePaginator){ ?>
						<span> Showing {{($clients->currentpage()-1)*$clients->perpage()+1}} to {{(($clients->currentpage()-1)*$clients->perpage())+$clients->count()}} of {{$clients->total()}} </span>
                      <span class="pull-right">{{$clients->links()}}</span>
                    <?php }else{ ?>
                      <span>Total records: {{count($clients)}}</span>
                    <?php } ?>
                      
                  {{csrf_field()}}
                        </form>
                        
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
            $(':checkbox:checked').prop('checked',false);//for mozila firefox to uncheck all checkboxes at page load
            
                $('#save_client').click(function(event) {
                  $('.red_error').html('');
                  $('#msg_error').hide();
                     event.preventDefault();
                    $.ajax({
                        url:base_url+'/clients/create',
                        type: 'POST',
                        data: $("#client_form").serialize(),
                            success: function (data) {
                                location.reload();
                            },
                            error: function (response) {
                              console.log(response);
                              $('#err_fname').html(response.responseJSON.first_name);
                              $('#err_lname').html(response.responseJSON.last_name);
                              $('#err_company').html(response.responseJSON.company);
                              $('#err_emailc').html(response.responseJSON.email);
                              $('#err_passwordc').html(response.responseJSON.password);
                              $('#err_phone').html(response.responseJSON.phone_number);
                              $('#err_mphone').html(response.responseJSON.mobile_phone_number);
                              $('#err_country').html(response.responseJSON.country);
                              $('#err_city').html(response.responseJSON.city);
                              $('#err_state').html(response.responseJSON.state);
                              $('#err_add1').html(response.responseJSON.address_1);
                              $('#err_add2').html(response.responseJSON.address_2);
                              $('#err_pcode').html(response.responseJSON.postal_code);

                              $('#err_fname_billing').html(response.responseJSON.billing_first_name);
                              $('#err_lname_billing').html(response.responseJSON.billing_last_name);
                              $('#err_company_billing').html(response.responseJSON.billing_company);
                              $('#err_emailc_billing').html(response.responseJSON.billing_email);
                              $('#err_phone_billing').html(response.responseJSON.billing_phone_number);
                              $('#err_mphone_billing').html(response.responseJSON.billing_mobile_phone);
                              $('#err_country_billing').html(response.responseJSON.billing_country);
                              $('#err_city_billing').html(response.responseJSON.billing_city);
                              $('#err_state_billing').html(response.responseJSON.billing_state);
                              $('#err_add1_billing').html(response.responseJSON.billing_address_1);
                              $('#err_add2_billing').html(response.responseJSON.billing_address_2);
                              $('#err_pcode_billing').html(response.responseJSON.billing_postal_code);

                              $('#msg_error').show();
                               $('#modal-add-client, #modal-add-client-body').animate({
                                  scrollTop: $("#client_form").offset().top
                              }, 700);
                            }
                    });
                });
                
                $(document).on('keyup change', '#password_client', function(event) {
                    var password = $(this).val();
                    console.log("length: "+password);

                    client_pb_strength=0;
                    if (password.length==0) {
                       client_pb_strength=0;

                       $('#progress_bar_client').removeClass();
                       $('#progress_bar_client').addClass('progress-bar progress-bar-danger');
                       $('#progress_bar_client').css('width', client_pb_strength+"%");
                       $('#progressbar_text_client').html( client_pb_strength+"%");
                      console.log("zero"+client_pb_strength);
                    }
                    else if (password.length>0 && password.length<12) {
                       client_pb_strength=10;
                       $('#progress_bar_client').removeClass();
                       $('#progress_bar_client').addClass('progress-bar progress-bar-danger');
                       $('#progress_bar_client').css('width', client_pb_strength+"%");
                       $('#progressbar_text_client').html( client_pb_strength+"% Week");
                      console.log("weak"+client_pb_strength);
                    }
                    else if (password.length>=12) {
                      client_pb_strength=50;
                      $('#progress_bar_client').removeClass();
                       $('#progress_bar_client').addClass('progress-bar progress-bar-warning');
                       $('#progress_bar_client').css('width', client_pb_strength+"%");
                       $('#progressbar_text_client').html( client_pb_strength+"% Moderate");
                      console.log("medium"+client_pb_strength);
                      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){  
                          client_pb_strength=100;
                          $('#strength').val(100);
                          $('#progress_bar_client').removeClass();
                            $('#progress_bar_client').addClass('progress-bar progress-bar-success');
                            $('#progress_bar_client').css('width', client_pb_strength+"%");
                            $('#progressbar_text_client').html( client_pb_strength+"% Strong");
                            console.log("strong"+client_pb_strength);
                      }
                    }
                    $('#strength_client_pass').val(client_pb_strength);
                    console.log("client_pb_strength: "+client_pb_strength);
                });
                $(document).on('click', '#generate_password', function(event) {
                    $.ajax({
                        url: base_url+'/generate_password',
                        type: 'POST',
                        data:{'_token':csrf_token}
                        
                    })
                    .done(function(response) {
                        $("#password_options").show();
                        $("#password_text").show();
                        $("#password_text").val(response);
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                    
                }); 
                $(document).on('click', '#apply_password', function(event) {
                    $("input[name='password']").val($("#password_text").val());
                        $("#cpassword").val($("#password_text").val());

                    client_pb_strength=100;
                    $('#strength_client_pass').val(100);
                          $('#progress_bar_client').removeClass();
                            $('#progress_bar_client').addClass('progress-bar progress-bar-success');
                            $('#progress_bar_client').css('width', client_pb_strength+"%");
                            $('#progressbar_text_client').html( client_pb_strength+"% Strong");
                });
                $(document).on('click', '#cancel_password', function(event) {
                    $("#password_options").hide();
                    $("#password_text").val("");
                    $("#password_text").hide();
                });
                $(document).on('change', '#same_details', function(event) {
                  
                    if ($('#same_details').is(':checked')) {
                      get_state();
                        $('#billing_first_name').val($('#first_name').val());
                        $('#billing_last_name').val($('#last_name').val());
                        $('#billing_company').val($('#company').val());
                        $('#billing_email').val($('#email').val());
                        $('#billing_phone_number').val($('#phone').val());
                        $('#billing_mobile_phone').val($('#mobile_phone').val());
                        $('#billing_address_1').val($('#address_1').val());
                        $('#billing_address_2').val($('#address_2').val());
                        $('#billing_postal_code').val($('#postal_code').val());

                    }else{
                        $('#billing_first_name').val("");
                        $('#billing_last_name').val("");
                        $('#billing_company').val("");
                        $('#billing_email').val("");
                        $('#billing_phone_number').val("");
                        $('#billing_mobile_phone').val("");
                        $('#billing_address_1').val("");
                        $('#billing_address_2').val("");
                        $('#billing_postal_code').val("");
                    }
                });
                $(document).on('change', '#country', function(event) {
                    var country_id=$( "#country option:selected" ).val();
                    $("#state").html("<option value=''>-- Please select --</option>");
                    $("#city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_state/'+country_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                        for (var i=0; i < response.length; i++) {
                            $("#state").append(
                                $("<option>" , {
                                    text: response[i].name,
                                    value:  response[i].id
                                })
                            )
                        }
                    })
                    .fail(function() {
                    })
                    .always(function() {
                    });
                    
                });
                $(document).on('change', '#state', function(event) {
                    var state_id=$( "#state option:selected" ).val();
                    $("#city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_city/'+state_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                      if (response.length>0) {
                            $('input[name=num_of_cities]').val(1);
                        }else{
                            $('input[name=num_of_cities]').val('no cities found');
                        }
                        for (var i=0; i < response.length; i++) {
                            $("#city").append(
                                $("<option>" , {
                                    text: response[i].name,
                                    value:  response[i].id
                                })
                            )
                        }
                    })
                    .fail(function() {
                    })
                    .always(function() {
                    });
                    
                });
                /*country select for billing*/
                $(document).on('change', '#billing_country', function(event) {
                    var country_id=$( "#billing_country option:selected" ).val();
                    $("#billing_state").html("<option value=''>-- Please select --</option>");
                    $("#billing_city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_state/'+country_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                        for (var i=0; i < response.length; i++) {
                            $("#billing_state").append(
                                $("<option>" , {
                                    text: response[i].name,
                                    value:  response[i].id
                                })
                            )
                        }
                    })
                    .fail(function() {
                    })
                    .always(function() {
                    });
                    
                });
                $(document).on('change', '#billing_state', function(event) {
                    var state_id=$( "#billing_state option:selected" ).val();
                    $("#billing_city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_city/'+state_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                      if (response.length>0) {
                            $('input[name=num_of_bcities]').val(1);
                        }else{
                            $('input[name=num_of_bcities]').val('no cities found');
                        }
                        for (var i=0; i < response.length; i++) {
                            $("#billing_city").append(
                                $("<option>" , {
                                    text: response[i].name,
                                    value:  response[i].id
                                })
                            )
                        }
                    })
                    .fail(function() {
                    })
                    .always(function() {
                    });
                    
                });
                $('#clients_list').DataTable({
                  "bPaginate": false,
                  "bInfo" : false,
                  "bFilter": false,
                });
                $(document).on('click', '#delete_bulk', function(event) {
                  var selected=$('input[name="id[]"]:checked').length;
                  

                  event.preventDefault();
                  if (selected<1) {
                    $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
                  }else{
                    
                    $('#delete_bulk').attr("disabled",true);
                    $.ajax({
                      url: base_url+'/clients/delete',
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
                function delete_single(client_id) {
                      $('#delete_single_button').attr("disabled",true);
                      $.ajax({
                      url: base_url+'/clients/delete',
                      type: 'POST',
                      
                      data: {'_token':csrf_token,'id':client_id}
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

                function get_state(){
                    var country_id=$( "#country option:selected" ).val();
                    var org_state_id=$( "#state option:selected" ).val();
                    var org_city_id=$( "#city option:selected" ).val();
                  $('#billing_country option[value="'+country_id+'"]').attr("selected", "selected");
                    
                    $("#billing_state").html("<option value=''>-- Please select --</option>");
                    $("#billing_city").html("<option value=''>-- Please select --</option>");
                    $.ajax({
                        url: base_url+'/get_state/'+country_id,
                        type: 'GET',
                        dataType: ' json',
                    })
                    .done(function(response) {
                      
                        var state_selected="";
                        for (var i=0; i < response.length; i++) {
                            if (response[i].id==org_state_id) {
                                    $("#billing_state").append(
                                        $("<option>" , {
                                            text: response[i].name,
                                            value:  response[i].id,
                                            selected:  ""
                                        })
                                    )
                                }else{
                                        $("#billing_state").append(
                                        $("<option>" , {
                                            text: response[i].name,
                                            value:  response[i].id,
                                        })
                                    )
                                }
                            
                        }
                        var state_id=$( "#billing_state option:selected" ).val();
                        $("#billing_city").html("<option value=''>-- Please select --</option>");
                        $.ajax({
                            url: base_url+'/get_city/'+org_state_id,
                            type: 'GET',
                            dataType: ' json',
                        })
                        .done(function(response) {
                          if (response.length>0) {
                            $('input[name=num_of_bcities]').val(1);
                        }else{
                            $('input[name=num_of_bcities]').val('no cities found');
                        }
                            var city_selected="";
                            for (var i=0; i < response.length; i++) {
                                if (response[i].id==org_city_id) {
                                    $("#billing_city").append(
                                        $("<option>" , {
                                            text: response[i].name,
                                            value:  response[i].id,
                                            selected:  ""
                                        })
                                    )
                                }else{
                                    $("#billing_city").append(
                                        $("<option>" , {
                                            text: response[i].name,
                                            value:  response[i].id,
                                        })
                                    )
                                }

                                
                            }
                        })
                        .fail(function() {
                        })
                        .always(function() {
                        });
                    })
                    .fail(function() {
                    })
                    .always(function() {
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
                      url: base_url+'/admin/get_user_details',
                      type: 'POST',
                      data: $("#delete_client").serialize()
                    })
                    .done(function(response) {
                      console.log(response);
                      for (var i=0; i <response.length; i++) {
                          $('#delete-selected-body-information').prepend('<p>'+
                            '<strong>#'+response[i].client_id+'</strong>:<span>'+response[i].first_name+' '+response[i].last_name+'  </span>'+
                            '<span ><strong >Company:</strong>'+response[i].company+'</span>'+
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
                 url:base_url+'/clients/delete_all_clients',
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
                window.location.href=base_url+"/clients/listing/"+per_page;
             }
            function add_new_client_modal() {
              $("#client_form").find(':input').each(function() {
                  switch(this.type) {
                      case 'password':
                      case 'text':
                      case 'textarea':
                      case 'file':
                      case 'select-one':       
                          $(this).val('');
                          break;
                      case 'checkbox':
                      case 'radio':
                          this.checked = false;
                  }
                });
              $('#optionsRadios4').prop( "checked", true );
              /*$("#modal-add-client").modal('show');*/
              $('#modal-add-client').modal({
                  backdrop: 'static',
                  keyboard: false
              })
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