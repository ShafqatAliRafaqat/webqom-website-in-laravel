<?php $page='clients';
$breadcrumbs=[
array('url'=>url('clients/listing'),'name'=>'Clients'),
array('url'=>url('clients/listing'),'name'=>'Clients - Listing'),
array('url'=>'javascript:void','name'=>'Client - Edit'),

];
?>
@extends('layouts.admin_layout')
@section('title','Admin | Client Edit')
@section('content')
@section('page_header','Clients')
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
</style>
<div class="page-content">
  <div class="row">
    <div class="col-lg-12">
      <h2>Client <i class="fa fa-angle-right"></i> Edit</h2>
      <div class="clearfix"></div>
      @include("admin.partials.messages")

      <div class="pull-left"> Last updated: <span class="text-blue">{{$clients->recent_update}}</span> </div>
      <div class="clearfix"></div>
      <p></p>


      <div class="clearfix"></div>

      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#past-orders" data-toggle="tab">Past Orders &nbsp;<span class="badge badge-red">3</span></a></li>
        <li><a href="#invoices" data-toggle="tab">Invoices</a></li>
        <li><a href="#receipts" data-toggle="tab">Receipts</a></li>
        <li><a href="#client-schedule" data-toggle="tab">Client Schedule Notification</a></li>
        <li><a href="#quotes" data-toggle="tab">Quotes</a></li>
        <li><a href="#support-tickets" data-toggle="tab">Support Tickets</a></li>
      </ul>

      <div id="myTabContent" class="tab-content">
       <div id="overview" class="tab-pane fade in active">
        <div class="portlet">
         <div class="portlet-header">
          <div class="caption">Client Account Information</div>
          <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
          
        </div><!-- end porlet header -->

        <div class="portlet-body">
          <form class="form-horizontal" method="POST" action="{{url('/clients/update')}}">
            {{csrf_field()}}
            <div class="row">
             <div class="col-lg-12">
               <!-- user account information start -->

               <div class="form-group">
                 <label class="col-md-3 control-label">Status <span class="text-red">*</span></label>
                 <div class="col-md-6">
                   <div data-on="success" data-off="primary" class="make-switch">
                    <input name="status" type="checkbox" @if($clients->client->status=='1') checked="checked" @endif/>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-3 control-label">Account Type</label>
                <div class="col-md-6">
                 <p class="form-control-static">{{$clients->client->account_type}}</p>
               </div>
             </div>
             <input type="hidden" name="client_id" value="{{$clients->id}}">
             <div class="form-group">
              <label class="col-md-3 control-label">Client ID</label>
              <div class="col-md-6">
               <p class="form-control-static">{{$clients->client->client_id}}</p>
             </div>
           </div>

           <div class="form-group">
            <label for="inputFirstName" class="col-md-3 control-label">First Name <span class="text-red">*</span></label>
            <div class="col-md-6">
              <input type="text" value="{{$clients->client->first_name}}" name="first_name" id="first_name" class="form-control" placeholder="">
              @if ($errors->has('first_name'))
                                    <div class="red_error">
                                        {{ $errors->first('first_name') }}
                                    </div>
                                @endif
            </div>
            
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label for="inputFirstName" class="col-md-3 control-label">Last Name <span class="text-red">*</span></label>
            <div class="col-md-6">
              <input value="{{$clients->client->last_name}}"  type="text" name="last_name" id="last_name" class="form-control" placeholder="">
              @if ($errors->has('last_name'))
                                    <div class="red_error">
                                        {{ $errors->first('last_name') }}
                                    </div>
                                @endif
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label for="inputFirstName" class="col-md-3 control-label">Company <span class="text-red">* </span></label>
            <div class="col-md-6">
              <input name="company" value="{{$clients->client->company}}"  id="company" type="text" class="form-control" placeholder="">
              <div class="text-11px text-red">(* Mandatory for Business Account)</div>
               @if ($errors->has('company'))
                                    <div class="red_error">
                                        {{ $errors->first('company') }}
                                    </div>
                                @endif
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group">
            <label for="inputFirstName"   class="col-md-3 control-label">Email <span class="text-red">*</span></label>
            <div class="col-md-6">
              <input type="text"  value="{{$clients->email}}" name="email" id="email" class="form-control">
               @if ($errors->has('email'))
                                    <div class="red_error">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
            </div>
          </div>
          <div class="form-group">
            <label for="label" class="control-label col-md-3">Password <span class="text-red">*</span></label>
            <div class="col-md-6">
              <div class="input-icon"><i class="fa fa-key"></i>
                <input id="password_client" name="password" type="password" placeholder="Password" class="form-control"/>
                <span class="text-10px">Password must be at least 12 characters. The combination of the password must be alphanumeric with one special character <span class="sitecolor">(eg. ! @ # $ % ^ & * ( ) _ + { } | : < > ? " \ [ ] ' ; / . ~ `)</span></span>
                 @if ($errors->has('password'))
                                    <div class="red_error">
                                        {{ $errors->first('passwor') }}
                                    </div>
                                @endif 
                 @if ($errors->has('strength'))
                                    <div class="red_error">
                                        {{ $errors->first('strength') }}
                                    </div>
                                @endif                
              </div>
              <p><a href="javascript:void(0)" id="generate_password">Generate Password</a></p>

              <input type="text" style="display:none" value="" id="password_text" class="form-control"/>
              <div id="password_options" style="display:none" class="col-md-offset-3 col-md-7 margin-top-10px"> <a href="javascript:void(0)" id="apply_password" class="btn btn-red">Ok &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="javascript:void(0)"  class="btn btn-green" id="cancel_password">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
            </div>
          </div>
          <div class="form-group">
            <label for="label" class="control-label col-md-3"></label>
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
            <label for="label" class="control-label col-md-3">Confirm Password <span class="text-red">*</span></label>
            <div class="col-md-6">
              <div class="input-icon"><i class="fa fa-key"></i>
                <input id="cpassword"  type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control"/>
                 </div>
              </div>
            </div>
            <div class="form-group">
              <label for="inputFirstName"  class="col-md-3 control-label">Phone <span class="text-red">*</span></label>
              <div class="col-md-6">
                <input value="{{$clients->client->phone_number}}" type="text" name="phone_number" id="phone" class="form-control">
                 @if ($errors->has('phone_number'))
                                    <div class="red_error">
                                        {{ $errors->first('phone_number') }}
                                    </div>
                                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputFirstName" class="col-md-3 control-label">Mobile Phone <span class="text-red">*</span></label>
              <div class="col-md-6">
                <input value="{{$clients->client->mobile_number}}"  name="mobile_phone_number" id="mobile_phone" type="text" class="form-control">
                @if ($errors->has('mobile_phone_number'))
                                    <div class="red_error">
                                        {{ $errors->first('mobile_phone_number') }}
                                    </div>
                                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputFirstName" class="col-md-3 control-label">Address <span class="text-red">* </span></label>
              <div class="col-md-6">
                <input value="{{$clients->client->address1}}" name="address_1" id="address_1" type="text" class="form-control">
                 @if ($errors->has('address_1'))
                                    <div class="red_error">
                                        {{ $errors->first('address_1') }}
                                    </div>
                                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="inputFirstName" class="col-md-3 control-label">Address 2 </label>
              <div class="col-md-6">
                <input value="{{$clients->client->address2}}"  name="address_2" id="address_2" type="text" class="form-control">
                 @if ($errors->has('address_2'))
                                    <div class="red_error">
                                        {{ $errors->first('address_2') }}
                                    </div>
                                @endif 
              </div>
            </div>

            <div class="form-group">
              <label for="inputFirstName" class="col-md-3 control-label">Postal Code <span class="text-red">* </span></label>
              <div class="col-md-6">
                <input value="{{$clients->client->postal_code}}"  name="postal_code" id="postal_code" type="text" class="form-control">
                  @if ($errors->has('postal_code'))
                                    <div class="red_error">
                                        {{ $errors->first('postal_code') }}
                                    </div>
                                @endif 
              </div>
            </div>

            <div class="form-group">
              <label for="inputFirstName"  class="col-md-3 control-label">Country <span class="text-red">* </span></label>
              <div class="col-md-6">
                <select name="country" class="form-control countries" id="country">
                  <option value=''>-- Please select --</option>
                  @foreach($countries as $country)
                  <option value="{{$country->id}}" @if($clients->client->country_id==$country->id) selected @endif>{{$country->name}}</option>
                  @endforeach
                </select>
                 @if ($errors->has('country'))
                                    <div class="red_error">
                                        {{ $errors->first('counrty') }}
                                    </div>
                                @endif 
              </div>
            </div>
            <div class="form-group">
              <label for="inputFirstName"  class="col-md-3 control-label">State<span class="text-red">* </span></label>
              <div class="col-md-6">
                <select name="state" class="states form-control" id="state">
                  <option value=''>-- Please select --</option>
                </select>
                 @if ($errors->has('state'))
                                    <div class="red_error">
                                        {{ $errors->first('state') }}
                                    </div>
                                @endif 
              </div>
            </div>
            <div class="form-group">
              <label for="inputFirstName"  class="col-md-3 control-label">City <span class="text-red">* </span></label>
              <div class="col-md-6">
                <select name="city" class="cities form-control" id="city">
                  <option value=''>-- Please select --</option>
                </select>
                 @if ($errors->has('city'))
                                    <div class="red_error">
                                        {{ $errors->first('city') }}
                                    </div>
                                @endif
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-3 control-label">Newsletter Subscription</label>
              <div class="col-md-6">
                <div class="margin-top-10px">
                  <input type="checkbox" name="news_letter" @if($clients->client->news_letter==1) checked @endif>
                  Yes! I would like to subscribe to your newsletter. </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="xs-margin"></div> 


            </div><!-- end col-lg-12 -->

          </div><!-- end row -->
        </div><!-- end porlet-body -->
      </div><!-- end portlet -->


      <div class="portlet" id="billing_info_div">

        <div class="portlet-header">
          <div class="caption">Billing Information</div>
          <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
          
        </div><!-- end porlet header -->

        <div class="portlet-body">
          <div class="row">
            <div class="col-lg-12">           
             <div class="form-horizontal">  
              <!-- billing address start -->                                

              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-6">
                  <input type="checkbox" id="same_details">
                  My Billing address is the same as account information above. </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                  <label class="col-md-3 control-label">First Name</label>
                  <div class="col-md-6">
                    <input type="text" name="billing_first_name" id="billing_first_name" value="{{$clients->client_billing->billing_first_name}}" class="form-control" placeholder="">
                     @if ($errors->has('billing_first_name'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_first_name') }}
                                    </div>
                                @endif
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Last Name</label>
                  <div class="col-md-6">
                    <input type="text" name="billing_last_name" id="billing_last_name" value="{{$clients->client_billing->billing_last_name}}" class="form-control" placeholder="">
                  @if ($errors->has('billing_last_name'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_last_name') }}
                                    </div>
                                @endif
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                 <label class="col-md-3 control-label">Company </label>
                 <div class="col-md-6">
                  <input type="text" name="billing_company" value="{{$clients->client_billing->billing_company}}" id="billing_company" class="form-control" placeholder="">
                  @if ($errors->has('billing_company'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_company') }}
                                    </div>
                                @endif
                </div>
              </div>

              <div class="form-group">
               <label class="col-md-3 control-label">Email </label>
               <div class="col-md-6">
                <input type="text" name="billing_email" value="{{$clients->client_billing->billing_email}}" id="billing_email" class="form-control">
                @if ($errors->has('billing_email'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_email') }}
                                    </div>
                                @endif
              </div>
            </div>
            <div class="form-group">
             <label class="col-md-3 control-label">Phone </label>
             <div class="col-md-6">
              <input type="text" name="billing_phone_number" value="{{$clients->client_billing->billing_phone_number}}" id="billing_phone_number" class="form-control">
              @if ($errors->has('billing_phone_number'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_phone_number') }}
                                    </div>
                                @endif
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Mobile Phone </label>
            <div class="col-md-6">
             <input name="billing_mobile_phone" value="{{$clients->client_billing->billing_mobile_number}}" id="billing_mobile_phone" type="text" class="form-control">
             @if ($errors->has('billing_mobile_number'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_mobile_number') }}
                                    </div>
                                @endif
           </div>
         </div>
         <div class="form-group">
          <label class="col-md-3 control-label">Address <span class="text-red">* </span></label>
          <div class="col-md-6">
            <input name="billing_address_1" value="{{$clients->client_billing->billing_address_1}}" id="billing_address_1" type="text" class="form-control">
            @if ($errors->has('billing_address_1'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_address_1') }}
                                    </div>
                                @endif
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Address2 </label>
          <div class="col-md-6">
            <input type="text" name="billing_address_2" value="{{$clients->client_billing->billing_address_2}}" id="billing_address_2" class="form-control">
            @if ($errors->has('billing_address_2'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_address_2') }}
                                    </div>
                                @endif
          </div>
        </div>
        <div class="clearfix"></div>



        <div class="form-group">
          <label for="inputFirstName" class="col-md-3 control-label">Country</label>
          <div class="col-md-6">
            <select name="billing_country" id="billing_country" class="form-control">
              <option value="">-- Please select --</option>
              @foreach($countries as $country)
              <option @if($clients->client_billing->billing_country_id==$country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
              @endforeach

            </select>
            @if ($errors->has('billing_country'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_country') }}
                                    </div>
                                @endif
          </div>
        </div>
        <div class="form-group">
          <label for="inputFirstName"  class="col-md-3 control-label">State</label>
          <div class="col-md-6">
            <select name="billing_state" id="billing_state" class="form-control">
              <option>-- Please select --</option>


            </select>
            @if ($errors->has('billing_state'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_state') }}
                                    </div>
                                @endif
          </div>
        </div>
        <div class="form-group">
          <label for="inputFirstName" class="col-md-3 control-label">City</label>
          <div class="col-md-6">
            <select name="billing_city" id="billing_city" class="form-control">
              <option>-- Please select --</option>


            </select>
            @if ($errors->has('billing_city'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_city') }}
                                    </div>
                                @endif
          </div>
        </div>
        <div class="form-group">
          <label for="inputFirstName" class="col-md-3 control-label">Postal Code</label>
          <div class="col-md-6">
            <input name="billing_postal_code"  value="{{$clients->client_billing->billing_postal_code}}"  id="billing_postal_code" type="text" class="form-control">
            @if ($errors->has('billing_postal_code'))
                                    <div class="red_error">
                                        {{ $errors->first('billing_postal_code') }}
                                    </div>
                                @endif
          </div>
        </div>

        
        <!-- end billing address -->
        </div>
      </div>
      <!-- end col-lg-12 -->

    </div>
    <!-- end row -->

  </div>
  <!-- end porlet-body -->


  <div class="clearfix"></div>

  <div class="form-actions text-center"> 
    <button class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></Button>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
    </div>

  </div>
  <input type="hidden" id="strength_client_pass" value="0" name="strength">
  <input type="hidden"  value="" name="num_of_cities">
  <input type="hidden"  value="" name="num_of_bcities">
</form>
<!-- End porlet -->


</div>
<!-- end tab overview -->

<div id="past-orders" class="tab-pane fade">
  <div class="portlet">

    <div class="portlet-body">

      <div class="table-responsive mtl">
        <table class="table table-hover table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th><a href="#sort by invoice #">Invoice #</a></th>
              <th><a href="#sort by receipt #">Receipt #</a></th>
              <th><a href="#sort by order date">Order Date</a></th>   
              <th><a href="#sort by total">Total</a></th>
              <th><a href="#sort by payment">Payment</a></th>
              <th><a href="#sort by status">Status</a></th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody> 
            <tr>
              <td>2</td>
              <td><a href="billing_invoice_edit.html">MY-8001182</a></td>
              <td>-</td>
              <td>16th Apr 2015</td>
              <td>RM 25,195.14</td>
              <td>PayPal</td>
              <td><span class="label label-xs label-danger">Payment Failed</span></td>
              <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View Details"><span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                             

              </td>
            </tr>
            <tr>
              <td>1</td>
              <td><a href="billing_invoice_edit.html">MY-7974188</a></td>
              <td><a href="billing_receipt_edit.html">1431979860</a></td>
              <td>16th Apr 2015</td>
              <td>RM 25,195.14</td>
              <td>PayPal</td>
              <td><span class="label label-xs label-success">Paid</span></td>
              <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View Details"><span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                             <!--Modal delete start-->
                <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this order? </h4>
                      </div>
                      <div class="modal-body">
                        <p><strong>#1:</strong> Invoice #: MY-7974188</p>
                        <div class="form-actions">
                          <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal delete end -->     
              </td>
            </tr>

          </tbody>
          <tfoot>
            <tr>
              <td colspan="9"></td>
            </tr>
          </tfoot>
        </table>
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6 col-md-offset-6">
              <div class="well">
                <div class="row">
                  <div class="col-md-2">
                    <i class="glyphicon glyphicon-shopping-cart fa-4x"></i>
                  </div>
                  <div class="col-md-10">
                    <div class="row text-right">
                      <div class="col-md-7">
                       <span class="red-title">Total Amount Orders:</span>
                     </div>
                     <div class="col-md-5">
                       <h5 class="red-title"><strong>RM 52,813.08</strong></h5>
                     </div>
                   </div>

                   <div class="row text-right">
                    <div class="col-md-7">
                     <span class="red-title light">Total Paid:</span>
                   </div>
                   <div class="col-md-5">
                     <h5 class="red-title"><strong>RM 25,195.14</strong></h5>
                   </div>
                 </div>
               </div>
             </div>   
           </div>
         </div>
       </div>
     </div>
     <!-- end row -->

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
  </div>

  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>

<div class="form-actions text-center"> 
  <a href="#preview in browser/not yet published" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
</div>

</div>
<!-- End porlet -->


</div>
<!-- end tab overview -->

<div id="past-orders" class="tab-pane fade">
 <div class="portlet">

  <div class="portlet-body">

    <div class="table-responsive mtl">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th><a href="#sort by invoice #">Invoice #</a></th>
            <th><a href="#sort by receipt #">Receipt #</a></th>
            <th><a href="#sort by order date">Order Date</a></th>   
            <th><a href="#sort by total">Total</a></th>
            <th><a href="#sort by payment">Payment</a></th>
            <th><a href="#sort by status">Status</a></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody> 
          <tr>
            <td>2</td>
            <td><a href="billing_invoice_edit.html">MY-8001182</a></td>
            <td>-</td>
            <td>16th Apr 2015</td>
            <td>RM 25,195.14</td>
            <td>PayPal</td>
            <td><span class="label label-xs label-danger">Payment Failed</span></td>
            <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View Details"><span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                      				

            </td>
          </tr>
          <tr>
            <td>1</td>
            <td><a href="billing_invoice_edit.html">MY-7974188</a></td>
            <td><a href="billing_receipt_edit.html">1431979860</a></td>
            <td>16th Apr 2015</td>
            <td>RM 25,195.14</td>
            <td>PayPal</td>
            <td><span class="label label-xs label-success">Paid</span></td>
            <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View Details"><span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                      				<!--Modal delete start-->
              <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this order? </h4>
                    </div>
                    <div class="modal-body">
                      <p><strong>#1:</strong> Invoice #: MY-7974188</p>
                      <div class="form-actions">
                        <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal delete end -->     
            </td>
          </tr>

        </tbody>
        <tfoot>
          <tr>
            <td colspan="9"></td>
          </tr>
        </tfoot>
      </table>
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-6 col-md-offset-6">
            <div class="well">
              <div class="row">
                <div class="col-md-2">
                  <i class="glyphicon glyphicon-shopping-cart fa-4x"></i>
                </div>
                <div class="col-md-10">
                  <div class="row text-right">
                    <div class="col-md-7">
                     <span class="red-title">Total Amount Orders:</span>
                   </div>
                   <div class="col-md-5">
                     <h5 class="red-title"><strong>RM 52,813.08</strong></h5>
                   </div>
                 </div>

                 <div class="row text-right">
                  <div class="col-md-7">
                   <span class="red-title light">Total Paid:</span>
                 </div>
                 <div class="col-md-5">
                   <h5 class="red-title"><strong>RM 25,195.14</strong></h5>
                 </div>
               </div>
             </div>
           </div>   
         </div>
       </div>
     </div>
   </div>
   <!-- end row -->

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
</div>

<div class="clearfix"></div>
</div>
<!-- end portlet-body -->


</div>
<!-- end portlet -->

</div>
<!-- end tab past orders -->


<div id="invoices" class="tab-pane fade">
 <div class="portlet">

  <div class="portlet-body">

   <div class="row">

    <div class="table-responsive mtl">
     <table id="example1" class="table table-hover table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th><a href="#sort by invoice #">Invoice #</a></th>
          <th><a href="#sort by invoice date">Invoice Date</a></th>
          <th><a href="#sort by due date">Due Date</a></th>
          <th><a href="#sort by total">Total</a></th>
          <th><a href="#sort by payment date">Payment Date</a></th>
          <th><a href="#sort by transaction id">Transaction ID</a></th>
          <th><a href="#sort by payment method">Payment Method</a></th>
          <th><a href="#sort by status">Status</a></th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>3</td>
          <td><a href="billing_invoice_edit.html">MY-7974188</a></td>
          <td>16th Feb 2015</td>
          <td>16th Apr 2015</td>
          <td>RM 25,195.14</td>
          <td>16th Apr 2015</td>
          <td>4420911</td>
          <td>PayPal</td>
          <td><span class="label label-xs label-success">Paid</span></td>
          <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View/Edit Details"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-invoice" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>             <!--Modal delete start-->
            <div id="modal-delete-invoice" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this invoice? </h4>
                  </div>
                  <div class="modal-body">
                    <p><strong>#1:</strong> Invoice #: MY-8002197</p>
                    <div class="form-actions">
                      <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal delete end -->     
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td><a href="billing_invoice_edit.html">MY-8001182</a></td>
          <td>16th Feb 2015</td>
          <td>16th Apr 2015</td>
          <td>RM 25,195.14</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td><span class="label label-xs label-danger">Unpaid</span></td>
          <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View/Edit Details"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-invoice" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td><a href="billing_invoice_edit.html">MY-8002197</a></td>
          <td>16th Feb 2015</td>
          <td>16th Apr 2015</td>
          <td>RM 25,195.14</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td><span class="label label-xs label-warning">Failed</span></td>
          <td><a href="billing_invoice_edit.html" data-hover="tooltip" data-placement="top" title="View/Edit Details"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-invoice" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
          </td>
        </tr>

      </tbody>
      <tfoot>
        <tr>
          <td colspan="10"></td>
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
  </div>

</div>
<!-- end row -->



</div>
<!-- end portlet-body -->

</div>
<!-- end portlet -->
</div>
<!-- end tab invoices -->


<div id="receipts" class="tab-pane fade">
 <div class="portlet">

  <div class="portlet-body">

    <div class="table-responsive mtl">
      <table id="example1" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th><a href="#sort by receipt #">Receipt #</a></th>
            <th><a href="#sort by receipt date">Receipt Date</a></th>
            <th><a href="#sort by invoice #">Invoice #</a></th>
            <th><a href="#sort by invoice date">Invoice Date</a></th>
            <th><a href="#sort by client id">Client ID</a></th>
            <th><a href="#sort by customer name">Client Name</a></th>
            <th><a href="#sort by total">Total</a></th>
            <th><a href="#sort by payment date">Payment Date</a></th>
            <th><a href="#sort by transaction id">Transaction ID</a></th>
            <th><a href="#sort by payment method">Payment Method</a></th>
            <th><a href="#sort by status">Status</a></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><a href="billing_receipt_edit.html">1431979860</a></td>
            <td>16th Apr 2015</td>
            <td><a href="billing_invoice_edit.html">MY-7974188</a></td>
            <td>16th Feb 2015</td>
            <td><a href="client_edit.html">B-000001-MY</a></td>
            <td><a href="client_edit.html">Hock Lim</a></td>
            <td>RM 25,195.14</td>
            <td>16th Apr 2015</td>
            <td>4420911</td>
            <td>PayPal</td>
            <td><span class="label label-xs label-success">Paid</span></td>
            <td><a href="billing_receipt_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
              <!--Modal delete start-->
              <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this receipt? </h4>
                    </div>
                    <div class="modal-body">
                      <p><strong>Receipr #:</strong> 1431979860 <br/>
                        <strong>Client Name:</strong> Hock Lim </p>
                        <div class="form-actions">
                          <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal delete end -->
              </td>
            </tr>

          </tbody>
          <tfoot>
            <tr>
              <td colspan="13"></td>
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
      </div>
    </div>
  </div>
  <!-- end portlet -->

</div><!-- end tab receipts -->


<div id="client-schedule" class="tab-pane fade">
 <div class="portlet">

  <div class="portlet-body">

    <div class="table-responsive mtl">
      <table id="example1" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th><a href="#sort by services/domain">Services / Domain</a></th>
            <th>Client ID</th>
            <th>Client Name</th>
            <th><a href="#sort by invoice value">Invoice Value</a></th>
            <th><a href="#sort by old invoice #">Old Invoice #</a></th>
            <th><a href="#sort by new invoice #">New Invoice #</a></th>
            <th><a href="#sort by expiry date">Expiry Date</a></th>
            <th><a href="#sort by promotion pack">Promotion Pack</a></th>
            <th><a href="#sort by status">Status</a></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Shared Hosting <br/> www.webqom.com</td>
            <td>B-000001-MY</td>
            <td>Hock Lim</td>
            <td>RM 25,195.14</td>
            <td><a href="billing_invoice_edit.html">MY-7974188</a></td>
            <td><a href="billing_invoice_edit.html">MY-7974189</a></td>
            <td>16th Apr 2016</td>
            <td>No</td>
            <td><span class="label label-xs label-warning">Going to expire</span></td>
            <td><div class="btn-group-vertical mbm">
              <div class="btn-group">
                <button type="button" data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle">Action
                  &nbsp;<i class="fa fa-angle-down"></i></button>
                  <ul role="menu" class="dropdown-menu">
                    <li class="text-11px"><a href="#">Generate New Invoice</a></li>
                    <li class="text-11px"><a href="#">Send Invoice</a></li>
                    <li class="text-11px"><a href="#" data-target="#modal-renew" data-toggle="modal">Renew</a></li>
                    <li class="text-11px"><a href="#">Terminate</a></li>
                    <li class="text-11px"><a href="#">Re-open</a></li>
                  </ul>
                </div>

              </div>
              <!--Modal renew start-->
              <div id="modal-renew" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-wide-width">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label3" class="modal-title">Renew this Service</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form">
                        <form class="form-horizontal">

                          <div class="form-group">
                            <label class="col-md-3 control-label">New Expiry Date </label>
                            <div class="col-md-6">
                              <div class="input-group">
                                <input type="text" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" class="datepicker-default form-control" />
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-md-3 control-label">Payment Method: </label>
                            <div class="col-md-6">
                             <select class="form-control">
                              <option>- Please select -</option>
                              <option>Bank-In</option>
                              <option>Bank Transfer</option>
                              <option>Cash</option>
                              <option>Cheque</option>
                              <option>Mastercard</option>
                              <option>PayPal</option>
                              <option>Visa</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-3 control-label">Transaction ID: </label>
                          <div class="col-md-6">
                           <input type="text" class="form-control">
                         </div>
                       </div>						                              

                       <div class="form-actions">
                        <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--END MODAL renew -->                         
        </td>
      </tr>

    </tbody>
    <tfoot>
      <tr>
        <td colspan="11"></td>
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
</div>
</div><!-- end portlet body -->
</div>
<!-- end portlet -->

</div><!-- end tab client schedule notification -->


<div id="quotes" class="tab-pane fade">
 <div class="portlet">

  <div class="portlet-body">

    <div class="table-responsive mtl">
      <table id="example1" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th><a href="#sort by quote #">Quote #</a></th>
            <th>Client ID</th>
            <th>Client Name</th>
            <th><a href="#sort by subject">Subject</a></th>
            <th><a href="#sort by total">Total</a></th>
            <th><a href="#sort by date created">Date Created</a></th>
            <th><a href="#sort by valid until">Valid Until</a></th>
            <th><a href="#sort by status">Status</a></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>3</td>
            <td>205KYMVII15</td>
            <td>B-000001-MY</td>
            <td>Hock Lim</td>
            <td>Quote one</td>
            <td>RM 25,195.14</td>
            <td>16th Apr 2015</td>
            <td>30th Apr 2015</td>
            <td><span class="label label-xs label-success">Accepted</span></td>
            <td><a href="billing_quote_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-quote" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
              <!--Modal delete start-->
              <div id="modal-delete-quote" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this qutoe? </h4>
                    </div>
                    <div class="modal-body">
                      <p><strong>Quote #:</strong> 205KYMVII15 <br/>
                        <strong>Client Name:</strong> Hock Lim <br/>
                        <strong>Subject: </strong> Quote one
                      </p>
                      <div class="form-actions">
                        <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- modal delete end -->
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>204KYMVII15</td>
            <td>B-000001-MY</td>
            <td>Hock Lim</td>
            <td>Quote one</td>
            <td>RM 25,195.14</td>
            <td>16th Apr 2015</td>
            <td>30th Apr 2015</td>
            <td><span class="label label-xs label-danger">Expired</span></td>
            <td><a href="billing_quote_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-quote" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
            </td>
          </tr>
          <tr>
            <td>1</td>
            <td>203KYMVII15</td>
            <td>B-000001-MY</td>
            <td>Hock Lim</td>
            <td>Quote one</td>
            <td>RM 25,195.14</td>
            <td>16th Apr 2015</td>
            <td>30th Apr 2015</td>
            <td><span class="label label-xs label-info">Delivered</span></td>
            <td><a href="billing_quote_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-quote" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
            </td>
          </tr>

        </tbody>
        <tfoot>
          <tr>
            <td colspan="12"></td>
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
    </div>
  </div><!-- end portlet body -->
</div>
<!-- end portlet -->

</div><!-- end tab quotes -->


<div id="support-tickets" class="tab-pane fade">
 <div class="portlet">

  <div class="portlet-body">

    <div class="table-responsive mtl">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th><a href="#sort by ticket #">Ticket #</a></th>
            <th><a href="#sort by department">Department</a></th>
            <th><a href="#sort by subject">Subject</a></th>
            <th><a href="#sort by client id">Client ID</a></th>
            <th><a href="#sort by customer name">Client Name</a></th>
            <th><a href="#sort by last updated">Last Updated</a></th>
            <th><a href="#sort by status">Status</a></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>4</td>
            <td>499911</td>
            <td>Technical Support</td>
            <td>I need help getting a sub domain created</td>
            <td>B-000001-MY</td>
            <td>Hock Lim</td>
            <td>29th Nov 2015 15:21</td>
            <td><span class="label label-xs label-success">Open</span></td>
            <td><a href="support_ticket_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-ticket" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
              <!--Modal delete start-->
              <div id="modal-delete-ticket" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                      <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this ticket? </h4>
                    </div>
                    <div class="modal-body">
                      <p><strong>Ticket #:</strong> 499911<br/>
                        <strong>Department:</strong> Technical Support<br/>
                        <strong>Subject:</strong> I need help getting a sub domain created<br/>
                        <strong>Client Name:</strong> Hock Lim </p>
                        <div class="form-actions">
                          <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- modal delete end -->
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>337975</td>
              <td>Technical Support</td>
              <td>My website is down!</td>
              <td>B-000001-MY</td>
              <td>Hock Lim</td>
              <td>16th Apr 2015 09:15</td>
              <td><span class="label label-xs label-danger">Answered</span></td>
              <td><a href="support_ticket_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-ticket" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
            </tr>
            <tr>
              <td>2</td>
              <td>337971</td>
              <td>Billing Department</td>
              <td>Can I transfer my existing website?</td>
              <td>B-000001-MY</td>
              <td>Hock Lim</td>
              <td>15th Apr 2015 12:10</td>
              <td><span class="label label-xs label-warning">Client-Reply</span></td>
              <td><a href="support_ticket_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-ticket" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
            </tr>
            <tr>
              <td>1</td>
              <td>337970</td>
              <td>Sales Department</td>
              <td>I would like to enquire about Web88 CMS</td>
              <td>B-000001-MY</td>
              <td>Hock Lim</td>
              <td> 14th Apr 2015 15:35</td>
              <td><span class="label label-xs label-default">Closed</span></td>
              <td><a href="support_ticket_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-ticket" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="9"></td>
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
      </div>
    </div><!-- end portlet body -->
  </div>
  <!-- end portlet -->

</div><!-- end tab support tickets -->



</div>
<!-- end tab content -->


</div>
<!-- end col-lg-12 -->







</div>
<!-- end row -->
</div>
@endsection

@section('custom_scripts')
<script type="text/javascript">
  function load_countries(){
    var country_id=$( "#country option:selected" ).val();
    $("#state").html("<option value=''>-- Please select --</option>");
    $("#city").html("<option value=''>-- Please select --</option>");
    $.ajax({
      url: base_url+'/get_state/'+country_id,
      type: 'GET',
      dataType: ' json',
    })
    .done(function(response) {
      var state_selected="";
      for (var i=0; i < response.length; i++) {
        if (response[i].id=='{{$clients->client->state_id}}') {
          $("#state").append(
            $("<option>" , {
              text: response[i].name,
              value:  response[i].id,
              selected:  ""
            })
            )
        }else{
          $("#state").append(
            $("<option>" , {
              text: response[i].name,
              value:  response[i].id,
            })
            )
        }

      }
      var state_id=$( "#state option:selected" ).val();
      $("#city").html("<option value=''>-- Please select --</option>");
      $.ajax({
        url: base_url+'/get_city/'+state_id,
        type: 'GET',
        dataType: ' json',
      })
      .done(function(response) {
        var city_selected="";
        for (var i=0; i < response.length; i++) {
          if (response[i].id=='{{$clients->client->city_id}}') {
            $("#city").append(
              $("<option>" , {
                text: response[i].name,
                value:  response[i].id,
                selected:  ""
              })
              )
          }else{
            $("#city").append(
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
  load_countries();
   function load_countries_billing(){
    var country_id=$( "#billing_country option:selected" ).val();
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
        if (response[i].id=='{{$clients->client_billing->billing_state_id}}') {
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
        url: base_url+'/get_city/'+state_id,
        type: 'GET',
        dataType: ' json',
      })
      .done(function(response) {
        var city_selected="";
        for (var i=0; i < response.length; i++) {
          if (response[i].id=='{{$clients->client_billing->billing_city_id}}') {
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
  load_countries_billing();


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

  $(document).on('change', '#same_details', function(event) {

    if ($('#same_details').is(':checked')) {
      $("#billing_info_div :input").attr("readonly", true);
      $("#billing_country").val("{{$clients->client_billing->billing_country_id}}");
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
      $("#billing_info_div :input").attr("readonly", false);
      $('#billing_first_name').val("");
      $('#billing_last_name').val("");
      $('#billing_company').val("");
      $('#billing_email').val("");
      $('#billing_phone_number').val("");
      $('#billing_mobile_phone').val("");
      $('#billing_address_1').val("");
      $('#billing_address_2').val("");
      $('#billing_postal_code').val("");
      $("#billing_country" ).val("");
      $("#billing_state").html("<option value=''>-- Please select --</option>");
      $("#billing_city").html("<option value=''>-- Please select --</option>");
    }
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
  /*Password strength and password generation*/
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
  /*END Password strength and password generation*/
/*************************/
    /******** Portlet *******/
    $(".portlet").each(function (index, element) {
        var me = $(this);
        $(">.portlet-header>.tools>i", me).click(function (e) {
            if ($(this).hasClass('fa-chevron-up')) {
                $(">.portlet-body", me).slideUp('fast');
                $(this).removeClass('fa-chevron-up').addClass('fa-chevron-down');
            }
            else if ($(this).hasClass('fa-chevron-down')) {
                $(">.portlet-body", me).slideDown('fast');
                $(this).removeClass('fa-chevron-down').addClass('fa-chevron-up');
            }
            else if ($(this).hasClass('fa-cog')) {
                //Show modal
            }
            else if ($(this).hasClass('fa-refresh')) {
                //$(">.portlet-body", me).hide();
                $(">.portlet-body", me).addClass('wait');

                setTimeout(function () {
                    //$(">.portlet-body>div", me).show();
                    $(">.portlet-body", me).removeClass('wait');
                }, 1000);
            }
            else if ($(this).hasClass('fa-times')) {
                me.remove();
            }
        });
    });
    /******** Portlet *******/
    /***********************/
</script>
@endsection