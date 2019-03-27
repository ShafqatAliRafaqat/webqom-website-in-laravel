<?php $page='categories';
$breadcrumbs=[
array('url'=>url('admin/vps_hosting'),'name'=>'Vps hosting'),

];
?>

@extends('layouts.admin_layout')
@section('title','Admin | Vps Hosting')
@section('content')
@section('page_header','Services')
<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Vps Hosting <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
             
              <div class="pull-left"> Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span> </div>
              <div class="clearfix"></div>
              <p></p>
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Info</div>
                  <div class="clearfix"></div>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                  note to programmer: pls use the ckeditor version 4.5.4 version or newer. The css style and layout should follow 100% as shown in front end.
                  <div id="cms_content" contenteditable="true">
				@if(!empty($page_cms))	
					{!!$page_cms->content!!}
				@else
					<p>No content added</p>
				@endif
				  </div>
                </div>
                <!-- end portlet body -->
                <!-- save button start -->
                <div hidden="" style="margin-top: 10px" id="success_message_cms" class="messages alert alert-success alert-dismissable">
                          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                          <p>Page content saved</p>
                        </div>
                <div class="form-actions none-bg"> <a onclick="save_content(0)" href="javascript:void" class="btn btn-red">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <a href="javascript:void" onclick="save_content(1)" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                <!-- save button end -->
              </div>
              <!-- end porlet -->
              
              <h4 class="block-heading">Vps Hosting Plans &amp; General Features Listing</h4>
              @include('admin.partials.messages')
              <div hidden="" style="margin-top: 10px" id="success_message" class="messages alert alert-success alert-dismissable">
                          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                          <p>Sort order is saved.</p>
                        </div>
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#hosting-plans" data-toggle="tab">Vps Hosting Plans</a></li>
                <li><a href="#general-features" data-toggle="tab">General Features</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div id="hosting-plans" class="tab-pane fade in active">
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
                              @foreach($plan_features as $i)
                              <tr>
                              <td><input name="id[]" value="{{$i->id}}" type="checkbox"/></td>
                              <td>{{$i->id}}</td>
                              <td><span class="label label-xs label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span></td>
                              <td>{{$i->title}}</td>
                              <td><a href="javascript:void" onclick="edit_plan_feature({{$i->id}},{{$i->status}},'{{$i->title}}')" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit plan feature start-->
                                  
                                <!--END MODAL Edit plan feature -->
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
                                            <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_single({{$i->id}},'feature')" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- modal delete end -->
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
                  <!-- End portlet -->
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Vps Hosting Plans Listing</div>
                      <p style="margin-top: 32px" class="margin-top-10px"></p>
                      <a href="{{url('admin/vps_hosting/new')}}" class="btn btn-success">Add New Plan &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="javascript:void" onclick="open_modal_delete_selected_hp()">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
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
                                <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" class="btn btn-red" onclick="delete_all_plans()">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete all items end -->
                    </div>
                    <div class="portlet-body">
                      <div class="pull-right"> <button id="update_so" class="btn btn-danger">Update Display Order &nbsp;<i class="fa fa-refresh"></i></a> </div>
                      <div class="clearfix"></div>
                      <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th width="1%"><input type="checkbox"/></th>
                              <th>#</th>
                              <th>Status</th>
                              <th>Service Code</th>
                              <th>Plan Name</th>
                              <th>Price (RM)</th>
                              <th>Promo Behaviour</th>
                              <th width="10%">Display Order</th>
                              <th class="alicent">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <form id="delete_hosting_plans">
                            {!!csrf_field()!!}
                            @if(!empty($hosting_plan))
                              @foreach($hosting_plan as $i)
                              <tr>
                              <td><input name="id_hp[]" value="{{$i->id}}" type="checkbox"/></td>
                              <td>{{$i->id}}</td>
                              <td><span class="label label-xs label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span></td>
                              <td>{{$i->service_code}}</td>
                              <td>{{$i->plan_name}}</td>
                              <td>@if($i->price_type=='Recurring') <span>RM</span> {{$i->price_annually or '0'}}<span>/yr</span>@endif
                                                    @if($i->price_type=='One Time') 
                                                    <span>RM</span>{{$i->price_monthly or '0'}} <span>/mo</span>
                                                    @endif
                                                    @if($i->price_type=='Free') 
                                                    <span>Free</span></p>
                                                    @endif</td>
                              <td><span class="red"><i class="fa fa-check red"></i>&nbsp;{{$i->promo_behaviour}}</span></td>
                               <td><input type="text" id="{{$i->id}}" class="form-control" value="{{$i->sort_order}}"></td>
                              <td><a href="{{url('/admin/vps_hosting/edit/'.$i->id)}}"  title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit plan feature start-->
                                  
                                <!--END MODAL Edit plan feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                        </div>
                                        <div class="modal-body">
                                          <p><strong>#{{$i->id}}:</strong> {{$i->plan_name}}</p>
                                          <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_single({{$i->id}},'plan')" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- modal delete end -->
                              </td>
                            </tr>
                              @endforeach
                            @endif
                            </form>
                          </tbody>
                            
                          <tfoot>
                            <tr>
                              <td colspan="9"></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                      <!-- end table responsive -->
                    </div>
                    <!-- end portlet body -->
                  </div>
                  <!-- End porlet -->
                </div>
                <!-- end tab copyright text -->
                <div id="general-features" class="tab-pane fade">
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Feature Heading Edit</div>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Feature Heading</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>Enterprise-Class Service Features</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-feature-title" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                  <!--Modal Edit feature heading text start-->
                                  <div id="modal-edit-feature-title" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Feature Heading Text</h4>
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
                                                <label class="col-md-3 control-label">Feature Heading <span class="text-red">*</span> </label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" value="Enterprise-Class Service Features">
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
                                <!--END MODAL Edit feature heading text-->
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="clearfix"></div>
                      </div>
                      <!-- end table responsive -->
                    </div>
                  </div>
                  <!-- End porlet -->
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">General Features Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-general-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-general-feature" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
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
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete all items end -->
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      <!--Modal Add new general ffeature start-->
                      <div id="modal-add-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New General Feature</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form">
                                <form id="frm_general_features" class="form-horizontal">
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-6">
                                      <div data-on="success" data-off="primary" class="make-switch">
                                        <input name="status" type="checkbox" checked="checked"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Title <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" name="title" class="form-control" placeholder="eg. Ultra-Fast Platform ">
                                      <p class="red_error" id="gf_title"></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Description</label>
                                    <div class="col-md-6">
                                      <textarea name="textarea" name="description" class="form-control"></textarea>
                                      <p class="red_error" id="gf_description"></p>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                    <div class="col-md-6">
                                      <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                      <div class="margin-top-5px"></div>
                                      <input type="text" name="icon" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor">
                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a>
                                      <p class="red_error" id="gf_icon"></p></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                    <div class="col-md-9">
                                      <div class="xs-margin"></div>
                                      <input name="icon_image" id="exampleInputFile2" type="file"/>
                                      <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                      <p class="red_error" id="gf_icon_image"></p></div> </div>
                                  </div>
                                  <div class="form-actions">
                                    <div class="col-md-offset-5 col-md-8"> <button class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--END MODAL Add New general Feature-->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> Ultra-Fast Platform</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th width="1%"><input type="checkbox"></th>
                              <th>#</th>
                              <th>Status</th>
                              <th>Title</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><input type="checkbox"></td>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>Ultra-Fast Platform</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-general-feature" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-general-feature-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit general feature start-->
                                  <div id="modal-edit-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">General Feature Edit</h4>
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
                                                <label class="col-md-3 control-label">Feature Title <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. Ultra-Fast Platform" value="Ultra-Fast Platform">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Feature Description</label>
                                                <div class="col-md-6">
                                                  <textarea name="textarea" class="form-control">We use lightweight Linux containers with SSD disks for unmatched resource efficiency and site speed.</textarea>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                                <div class="col-md-6">
                                                  <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                                  <div class="margin-top-5px"></div>
                                                  <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor" value="fa-rocket">
                                                  <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Upload Icon Image</label>
                                                <div class="col-md-9">
                                                  <div class="xs-margin"></div>
                                                  <img src="../images/about_us/icon_cloud_app.png" alt="Ultra-Fast Platform" class="img-responsive"><br/>
                                                  <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-icon" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                                  <!--Modal delete icon start-->
                                                  <div id="modal-delete-icon" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this icon image? </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <p><img src="../images/about_us/icon_cloud_app.png" alt="Ultra-Fast Platform" class="img-responsive"></p>
                                                          <div class="form-actions">
                                                            <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- modal delete end -->
                                                  <div class="xs-margin"></div>
                                                  <input id="exampleInputFile2" type="file"/>
                                                  <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span> </div>
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
                                <!--END MODAL Edit general feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-general-feature-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                        </div>
                                        <div class="modal-body">
                                          <p><strong>#1:</strong> Ultra-Fast Platform</p>
                                          <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!-- modal delete general feature end -->
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="clearfix"></div>
                      </div>
                      <!-- end table responsive -->
                    </div>
                  </div>
                </div>
                <!-- end background image -->
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
                  <div id="modal-delete-selected-hp" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected hosted plan <span id="count-seleted"></span> item(s)? </h4>
                        </div>
                        <div class="modal-body" id="delete-selected-body">
                        <div id="delete-selected-body-information"></div>
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select aleast one item for delete</p>
                          <div class="form-actions" id="delete-selected-buttons">
                            <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk_hp" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete selected items end -->
@endsection
@section('custom_scripts')
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-nestable/nestable.css">
  <script src="{{url('').'/resources/assets/admin/'}}vendors/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}vendors/ckeditor/ckeditor.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}js/ui-tabs-accordions-navs.js"></script>
  <!-- webqom frontend style css -->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/reset.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/responsive-leyouts_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/shortcodes.css">

<script type="text/javascript">
  $(document).on('click', '#save_feature_plan', function(event) {
    $('#plan_feature_frm').submit();
   });
  $(document).on('submit', '#plan_feature_frm', function(event) {
    event.preventDefault();
    $.ajax({
      url: base_url+'/admin/vps_hosting/new',
      type: 'POST',
      data: $('#plan_feature_frm').serialize(),
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
                    $('#'+k).html(v)
                   
                });
    })
    .always(function() {
      console.log("complete");
    });
  });
  function edit_plan_feature(id,status,title) {
    
    if (status==1) {
      $('#edit_status').prop('checked',true);
    }else{
      $('#edit_status').prop('checked',false);
    }
    $('#edit_title').val(title);
    $('#edit_id').val(id);
    $('#modal-edit-plan-feature').modal('show');
    
  }
  $(document).on('click', '#edit_plan_feature', function(event) {
      $.ajax({
      url: base_url+'/admin/vps_hosting/update',
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
  function save_content(publish) {
    var content = CKEDITOR.instances.cms_content.getData();
    $.ajax({
       url: base_url+'/admin/pages/new',
       type: 'POST',
       data: {'_token':'{{csrf_token()}}',
               'name':'vps hosting', 
               'content':content, 
               'publish':publish, 
            },
         })
         .done(function(response) {
          if (publish==0) {
            window.open(base_url+"/co_cloud_hosting");
          }
           $('#success_message_cms').show();
           setTimeout(function() {
            $('#success_message_cms').hide();
           }, 3000);
         })
         .fail(function() {
           console.log("error");
         })
         .always(function() {
           console.log("complete");
         });
     }
     function delete_single(id,type) {
                      $('#delete_single_button').attr("disabled",true);
                      $.ajax({
                      url: base_url+'/admin/vps_hosting/delete',
                      type: 'POST',
                      
                      data: {'_token':csrf_token,'id':id,'type':type}
                    })
                    .done(function() {
                        //location.reload();
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
                      url: base_url+'/admin/vps_hosting/get_details',
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
                function open_modal_delete_selected_hp() {
                  $('#modal-delete-selected-hp #delete-selected-body-information').html("");
                  $("#modal-delete-selected-hp").modal('show');
                  var selected=$('input[name="id_hp[]"]:checked').length;
                  
                  if (selected<1) {
                    $('#modal-delete-selected-hp #selected_zero').show()
                    $('#modal-delete-selected-hp #delete-selected-buttons').hide()
                  }else{
                    /*get seleccted users details*/
                    $.ajax({
                      url: base_url+'/admin/vps_hosting/get_details_hp',
                      type: 'POST',
                      data: $("#delete_hosting_plans").serialize()
                    })
                    .done(function(response) {
                      console.log(response);
                      for (var i=0; i <response.length; i++) {
                          $('#modal-delete-selected-hp  #delete-selected-body-information').prepend('<p>'+
                            '<strong>#'+response[i].id+'</strong>:<span>'+response[i].plan_name+'</p>');                      
                      }
                      })
                    .fail(function() {
                      console.log("error");
                    })
                    .always(function() {
                      $('#modal-delete-selected-hp  #selected_zero').hide()
                      $('#modal-delete-selected-hp #delete-selected-buttons').show();
                      $('#modal-delete-selected-hp #count-seleted').html(selected);
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
                      url: base_url+'/admin/vps_hosting/delete',
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
      $(document).on('click', '#delete_bulk_hp', function(event,form_id) {
                  var selected=$('input[name="id_hp[]"]:checked').length;
                  

                  event.preventDefault();
                  if (selected<1) {
                    $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
                  }else{
                    
                    $('#delete_bulk_hp').attr("disabled",true);
                    $.ajax({
                      url: base_url+'/admin/vps_hosting/delete_hp',
                      type: 'POST',
                      
                      data: $("#delete_hosting_plans").serialize(),
                    })
                    .done(function() {
                      location.reload();
                    })
                    .fail(function() {
                      $('#modal-delete-selected').modal('hide');
                       alert("Error: no client was selected to delete");
                    })
                    .always(function() {
                      $('#delete_bulk_hp').attr("disabled",false);
                    });
                  }
                      
                });
               function delete_all_plans() {
               $.ajax({
                 url:base_url+'/admin/vps_hosting/delete_all_plans',
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
             $(document).on('click', '#update_so', function(event) {
         var data=[];
         data='<?php echo json_encode($hosting_plan) ?>';
         var obj=$.parseJSON(data);
         console.log(obj.data);
         sort_order=[];
         for(var i=0;i<obj.data.length;i++){
            item={
              'id':obj.data[i].id,
              'sort_order':$('#'+obj.data[i].id).val(),
            };
            sort_order.push(item);
         }
         $.ajax({
           url: base_url+'/admin/vps_hosting/update_sort',
           type: 'POST',
           data: {'_token':'{{csrf_token()}}','data':sort_order},
         })
         .done(function() {
           $('#success_message').show();
           setTimeout(function() {
            $('#success_message').hide();
           }, 3000);
         })
         .fail(function() {
           console.log("error");
         })
         .always(function() {
           console.log("complete");
         });
         
         
       });
  $('#frm_general_features').submit(function(event) {
    /* Act on the event */
    event.preventDefault();
    var formData = new FormData(this)
            $.ajax({
                url: base_url+'/admin/general_features',
                type: 'POST',
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false 
                
            })
            .done(function(response) {
                 
            })
            .fail(function(response) {
                validation_errors=response.responseJSON;
                 console.log(validation_errors);
                $.each(validation_errors, function(k, v) {
                    //display the key and value pair
                    //console.log(k + ' is ' + v);
                    $('#gf_'+k).html(v)
                   
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
</script>
@endsection