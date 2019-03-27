<?php $page='index-plan';
$breadcrumbs=[
array('url'=>'javascript:void','name'=>'Index Plans'),
];
?>

@extends('layouts.admin_layout')
@section('title','Admin | Index Plan List')
@section('content')
@section('page_header','Index Plan')
<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Index Page <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
              
              <div class="pull-left"> Last updated: <span class="text-blue">{{$recent_update}}</span> </div>
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
                   
                    <div class="feature_section2">

                        <div  id='title' contenteditable="true">
                            {!!$page_cms->cms[0]['content']!!}
                        </div>
                        
                        <div class="twoboxes">
                        <div class="container">
                        
                            <div class="left">
                                <i class="fa fa-desktop animate" data-anim-type="zoomIn" data-anim-delay="100"></i>
                                <div id="left_header" contenteditable="true">    
                                    {!!$page_cms->cms[1]['content']!!}
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div id="left_content" contenteditable="true">
                                    {!!$page_cms->cms[2]['content']!!}
                                    <div class="clearfix"></div>
                                </div>
                                
                            </div><!-- end left section -->
                            
                            
                            <div class="right">
                            
                                <i class="fa fa-shopping-cart animate" data-anim-type="zoomIn" data-anim-delay="100"></i>
                                <div id="right_header" contenteditable="true">
                                    {!!$page_cms->cms[3]['content']!!}
                                </div>
                                
                                <div class="clearfix"></div>
                                
                                <div id="right_content" contenteditable="true">
                                    {!!$page_cms->cms[4]['content']!!}
                                    <div class="clearfix"></div>
                                </div>
                                
                                
                            </div><!-- end right section -->
                        
                        </div>
                        </div>
                        
                        </div><!-- end feature section 2 -->
                        
                        
                        <div class="clearfix"></div>
                    
                                        
                    
                </div><!-- end portlet body -->
                 <div hidden="" style="margin-top: 10px" id="success_message_cms" class="messages alert alert-success alert-dismissable">
                          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                          <p>Page content saved</p>
                        </div>
                <!-- save button start -->
                <div class="form-actions none-bg"> <a href="javascript:void" onclick='ClickToSave()' class="btn btn-red">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <a href="#publish online" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                <!-- save button end -->
                
              </div>
              <!-- end porlet -->
              
              <h4 class="block-heading">Index Plans, General Features &amp; Video Listing</h4>
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#hosting-plans" data-toggle="tab">Index Plans</a></li>
                <li><a href="#general-features" data-toggle="tab">General Features</a></li>
                <li><a href="#video" data-toggle="tab">Video</a></li>
                <li><a href="#offer-services" data-toggle="tab">Offer Services</a></li>
                <li><a href="#testimonials" data-toggle="tab">Testimonials</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div id="hosting-plans" class="tab-pane fade in active">
                    
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Index Plans Listing</div>
                      <p style="margin-top:30px"  class="margin-top-10px"></p>
                      <a href="{{url('').'/admin/index-plan/create'}}" class="btn btn-success">Add New Plan &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="javascript:void" onclick="open_modal_delete_selected()">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-plan" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected <span id="count-seleted"></span> item(s)? </h4>
                        </div>
                        <div class="modal-body" id="delete-selected-body">
                        <div id="delete-selected-body-information"></div>
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select aleast one client for delete</p>
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
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete all items end -->
                      
                    </div>
                    <div class="portlet-body">
                        <div class="pull-left text-blue">Display Order 1 to 4 is counting from Left to Right.</div>
                        <div class="pull-right"> <button id="update_so" class="btn btn-danger">Update Display Order &nbsp;<i class="fa fa-refresh"></i></button> </div>
                        <div class="clearfix" style="margin-bottom: 10px"></div>
                        @include('admin.partials.messages')
                        <div hidden="" style="margin-top: 10px" id="success_message" class="messages alert alert-success alert-dismissable">
                          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                          <p>Sort order is saved.</p>
                        </div>

                        <div class="table-responsive mtl">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th width="1%"><input type="checkbox"/></th>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Plan Name</th>
                                    <th>Price (RM)</th>
                                    <th>Promo Behaviour</th>
                                    <th width="10%">Display Order</th>
                                    <th class="alicent">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <form id="delete_client">
                                {{csrf_field()}}
                                  <?php $count=1; ?>
                                  @if(!empty($indexplans))
                                      @foreach($indexplans as $i)
                                        <tr>
                                            <td><input name="id[]" value="{{$i->id}}" type="checkbox"/></td>
                                            <td>{{$count}}</td>
                                            <td><span class="label label-xs label-{{$i->status==1?"success": "danger"}}">{{$i->status==1?"Active": "Inactive"}}</span></td>
                                            <td>{{$i->name_line1." ".$i->name_line2}}</td>
                                            <td>@if($i->price_type=='Recurring') <span>RM</span> {{$i->price_annually or '0'}}<span>/yr</span>@endif
                                                    @if($i->price_type=='One Time') 
                                                    <span>RM</span>{{$i->price_monthly or '0'}} <span>/mo</span>
                                                    @endif
                                                    @if($i->price_type=='Free') 
                                                    <span>Free</span></p>
                                                    @endif</td>
                                            <td>-</td>
                                            <td><input type="text" id="{{$i->id}}" class="form-control" value="{{$i->sort_order}}"></td>
                                            <td class="alicent"><a href="{{url('').'/admin/index-plan/'.$i->id.'/edit'}}" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                               
                                                <!--Modal delete plan start-->
                                                <div id="modal-delete-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade alileft">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                        <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p><strong>#{{$i->id}}: {{$i->name_line1." ".$i->name_line2}}</strong></p>
                                                        <div class="form-actions">
                                                          
                                                          <input type="hidden" value="{{$i->id}}" name="id">
                                                          
                                                          <div class="col-md-offset-4 col-md-8"> 
                                                          <button id="delete_single_btn" onclick="delete_single({{$i->id}})" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i>
                                                          </button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                          
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
                                  </form>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="8"></td>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                            <span>Showing  {{$indexplans->firstItem()}} to {{$indexplans->lastItem()}} of {{$indexplans->total()}}</span>
                      <span class="pull-right">{{$indexplans->links()}}</span>
                            <!-- end table responsive -->
                    </div>
                    <!-- end portlet body -->
                  </div>
                  <!-- End porlet -->
                </div>
                <!-- end tab index plan -->
                
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
                              <th>Feature Sub Heading</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>What makes our hosting the Best?</td>
                              <td>Stable, Fast &amp; Reliable!</td>
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
                                                   <input type="text" class="form-control" value="What makes our hosting the Best?"> 
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Feature Sub Heading <span class="text-red">*</span> </label>
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" value="Stable, Fast & Reliable!"> 
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
                      <p  class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-general-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="javascript:void"    >Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all-general-feature" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      <!--Modal delete all items start-->
                      <div id="modal-delete-all-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
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
                                      <input type="text" class="form-control" placeholder="eg. 99.9% Uptime Guarantee">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Description</label>
                                    <div class="col-md-6">
                                      <textarea class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Insert CSS Icon </label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor">
                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
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
                      <!--END MODAL Add New general Feature-->
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
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select aleast one client for delete</p>
                          <div class="form-actions" id="delete-selected-buttons">
                            <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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
                                <td>99.9% Uptime Guarantee</td>
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
                                                      <input type="text" class="form-control" placeholder="eg. 99.9% Uptime Guarantee" value="99.9% Uptime Guarantee">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Feature Description</label>
                                                    <div class="col-md-6">
                                                      <textarea class="form-control">We provide a 99.99% uptime SLA around network, power and virtual server availability.</textarea>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Insert CSS Icon </label>
                                                    <div class="col-md-6">
                                                       
                                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor" value="fa-rocket">
                                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
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
                                                <p><strong>#1:</strong> 99.9% Uptime Guarantee</p>
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
                      </div><!-- end table responsive -->
                      <div class="clearfix"></div>
                    </div>
                  </div><!-- end porlet -->

                  
                </div><!-- end tab general features -->
                
                <div id="video" class="tab-pane fade">
                                    
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Video</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-faq" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-faq" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all-video" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>

                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      
                      <!--Modal Add new start-->
                      <div id="modal-add-faq" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New Video</h4>
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
                                    <label class="col-md-3 control-label">Heading <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. How Web88 CMS Can Help You?">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Video Title <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Services of Webqom Technologies">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Embed Video Link <span class="text-red">*</span></label>
                                    <div class="col-md-9">
                                      <div class="text-blue border-bottom">You can embed the video link from Youtube. Just copy and paste the embedded video link below and change the video width to "100%" and height to "350".</div>
                                      <div contenteditable="true">
                                        note to programmer: pls integrate for administrator to embed youtube videos in the fckeditor.
                                      </div>
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
                      <!--END MODAL Add New -->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-faq" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> How Web88 CMS Can Help You?</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                      <!--Modal delete all items start-->
                      <div id="modal-delete-all-video" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
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
                      
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Heading</th>
                                <th>Video Title</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td><span class="label label-xs label-success">Active</span></td>
                                <td>How Web88 CMS Can Help You?</td>
                                <td>Services of Webqom Technologies</td>
                                <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-faq" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-faq-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit video start-->
                                  <div id="modal-edit-faq" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Video</h4>
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
                                                <label class="col-md-3 control-label">Heading <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. How Web88 CMS Can Help You?" value="How Web88 CMS Can Help You?">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Video Title <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. Services of Webqom Technologies" value="Services of Webqom Technologies">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Embed Video Link <span class="text-red">*</span></label>
                                                <div class="col-md-9">
                                                  <div class="text-blue border-bottom">You can embed the video link from Youtube. Just copy and paste the embedded video link below and change the video width to "100%" and height to "350".</div>
                                                  <div contenteditable="true">
                                                    note to programmer: pls integrate for administrator to embed youtube videos in the fckeditor.
                                                  </div>
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
                                  <!--END MODAL Edit video -->
                                  <!--Modal delete faq start-->
                                  <div id="modal-delete-faq-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#1:</strong> Services of Webqom Technologies</p>
                                                <div class="form-actions">
                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- modal delete faq end -->
                                </td> 
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="6"></td>
                              </tr>
                            </tfoot>
                          </table>
                      </div><!-- end table responsive -->
                      
                      <div class="clearfix"></div>
                    </div>
                  </div><!-- end portlet -->
                  
                </div><!-- end tab video -->
                
                
                <div id="offer-services" class="tab-pane fade">
                    <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Offer Services Edit</div>
                       
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                        
                      <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Heading</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>What more we offer?</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-services-heading" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                  <!--Modal Edit services heading text start-->
                                  <div id="modal-edit-services-heading" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Heading Text</h4>
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
                                                <label class="col-md-3 control-label">Heading <span class="text-red">*</span> </label>
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" value="What more we offer?"> 
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
                                <!--END MODAL Edit services heading text-->
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4"></td>
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
                      <div class="caption">Services Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-service" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-service" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all-service" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      <!--Modal Add new service start-->
                      <div id="modal-add-service" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New Service</h4>
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
                                    <label class="col-md-3 control-label">Tab Title <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Hosting">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                                <label class="col-md-3 control-label">Tab Display Order <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. 1">
                                                  <div class="text-blue">Tab Display Order is counting from Left to Right.</div>
                                                </div>
                                              </div>
                                  
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Content</label>
                                    
                                    <div class="col-md-9">
                                      <div class="text-blue border-bottom">You can edit the content by clicking the text below.</div>
                                      note to programmer: the below content layout should follow the 100% same as shown in front end index page. Please also advise the sub page link looks like after programming.
                                      <div class="tabs detached hide-title cross-fade">
    
                                         <section>
                                            <div contenteditable="true">
                                                <img src="{{url('').'/resources/assets/admin/'}}images/site-img5.png" alt="" />
                                            </div>
                                            <div contenteditable="true">
                                                <h2>Web hosting packages provide quality web hosting with unlimited resources.</h2>
                                            </div>
                                            <div contenteditable="true">
                                                <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
                                                
                                                <br />
                                                <a href="#" class="button two">Learn More</a>
                                            </div>
                                         </section><!-- end section -->
                                       </div>
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
                      <!--END MODAL Add New service-->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-service" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> Hosting</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                      <!--Modal delete all items start-->
                      <div id="modal-delete-all-service" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
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
                      
                    </div>
                    <div class="portlet-body">
                        <div class="pull-left text-blue">Display Order 1 to 5 is counting from Left to Right.</div>
                        <div class="pull-right"> <a href="#" class="btn btn-danger">Update Display Order &nbsp;<i class="fa fa-refresh"></i></a> </div>
                        <div class="clearfix"></div>                     
                        <div class="table-responsive mtl">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Tab Title</th>
                                <th width="15%">Tab Display Order</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td><span class="label label-xs label-success">Active</span></td>
                                <td>Hosting</td>
                                <td><input type="text" class="form-control" value="1"></td>
                                <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-service" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-service-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit general feature start-->
                                  <div id="modal-edit-service" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Service</h4>
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
                                                <label class="col-md-3 control-label">Tab Title <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. Hosting" value="Hosting">
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Tab Display Order <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. 1" value="1">
                                                  <div class="text-blue">Tab Display Order is counting from Left to Right.</div>
                                                </div>
                                              </div>
                                              
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Content</label>
                                                
                                                <div class="col-md-9">
                                                  <div class="text-blue border-bottom">You can edit the content by clicking the text below.</div>
                                                  note to programmer: the below content layout should follow the 100% same as shown in front end index page. Please also advise the sub page link looks like after programming.
                                                  <div class="tabs detached hide-title cross-fade">
                
                                                     <section>
                                                        <div contenteditable="true">
                                                            <img src="{{url('').'/resources/assets/admin/'}}images/site-img5.png" alt="" />
                                                        </div>
                                                        <div contenteditable="true">
                                                            <h2>Web hosting packages provide quality web hosting with unlimited resources.</h2>
                                                        </div>
                                                        <div contenteditable="true">
                                                            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
                                                            
                                                            <br />
                                                            <a href="#" class="button two">Learn More</a>
                                                        </div>
                                                     </section><!-- end section -->
                                                   </div>
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
                                  <!--END MODAL Edit service -->
                                  <!--Modal delete service 1 start-->
                                  <div id="modal-delete-service-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#1:</strong> Hosting</p>
                                                <div class="form-actions">
                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- modal delete service 1 end -->
                                </td> 
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="6"></td>
                              </tr>
                            </tfoot>
                          </table>
                      </div><!-- end table responsive -->
                      <div class="clearfix"></div>
                    </div>
                  </div><!-- end porlet -->

                  
                </div><!-- end tab offer services -->
                
                
                <div id="testimonials" class="tab-pane fade">
                                    
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Testimonials Heading Edit</div>
                       
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                        
                      <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Heading</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>What our customers say!</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-testimonial-heading" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                  <!--Modal Edit testimonial heading text start-->
                                  <div id="modal-edit-testimonial-heading" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Heading Text</h4>
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
                                                <label class="col-md-3 control-label">Heading <span class="text-red">*</span> </label>
                                                <div class="col-md-6">
                                                   <input type="text" class="form-control" value="What our customers say!"> 
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
                                <!--END MODAL Edit testimonials heading text-->
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="4"></td>
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
                      <div class="caption">Testimonials</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-testimonial" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-testimonial" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all-testimonial" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>

                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      
                      <!--Modal Add new start-->
                      <div id="modal-add-testimonial" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New Testimonial</h4>
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
                                    <label class="col-md-3 control-label">Client Name <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Ahmad Munif">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Client Thumbnail <span class="text-red">*</span></label>
                                    <div class="col-md-9">
                                      <div class="xs-margin"></div>
                                      <input id="exampleInputFile2" type="file"/>
                                      <span class="help-block">(Image dimension: 250 x 250 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Company Name <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. Grand Teak Sdn Bhd">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Testimonial Content <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <textarea class="form-control" rows="10"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Services <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. bulk sms">
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
                      <!--END MODAL Add New -->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-testimonial" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> Ahmad Munif - Grand Teak - bulk sms</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                      <!--Modal delete all items start-->
                      <div id="modal-delete-all-testimonial" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
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
                      
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Client Name</th>
                                <th>Company</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td><span class="label label-xs label-success">Active</span></td>
                                <td>Ahmad Munif</td>
                                <td>Grand Teak Sdn Bhd</td>
                                <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-testimonial" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-testimonial-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal edit testimonial start-->
                                  <div id="modal-edit-testimonial" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Testimonial</h4>
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
                                                <label class="col-md-3 control-label">Client Name <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. Ahmad Munif" value="Ahmad Munif">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Upload Client Thumbnail <span class="text-red">*</span></label>
                                                <div class="col-md-9">
                                                  <div class="xs-margin"></div>
                                                  <img src="{{url('').'/resources/assets/admin/'}}images/peop-img37.jpg" alt="Ahmad Munif" class="img-responsive"><br/>
                                                  <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-thumbnail" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                                  <!--Modal delete thumbnail start-->
                                                  <div id="modal-delete-thumbnail" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this image? </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <p><img src="{{url('').'/resources/assets/admin/'}}images/peop-img37.jpg" alt="Ahmad Munif" class="img-responsive"></p>
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
                                                  <span class="help-block">(Image dimension: 250 x 250 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Company Name <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. Grand Teak Sdn Bhd" value="Grand Teak Sdn Bhd">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Testimonial Content <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <textarea class="form-control" rows="10">Sample text. Sample text. Sample text.</textarea>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Services <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. bulk sms" value="bulk sms">
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
                                  <!--END MODAL edit testimonial -->
                                  <!--Modal delete testimonial start-->
                                  <div id="modal-delete-testimonial-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#1:</strong> Services of Webqom Technologies</p>
                                                <div class="form-actions">
                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- modal delete faq end -->
                                </td> 
                              </tr>
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="6"></td>
                              </tr>
                            </tfoot>
                          </table>
                      </div><!-- end table responsive -->
                      
                      <div class="clearfix"></div>
                    </div>
                  </div><!-- end portlet -->
                  
                </div><!-- end tab testimonials -->
                
              </div>
              <!-- end tab content -->
              <div class="clearfix"></div>
            </div>
            <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
        <!-- InstanceEndEditable -->
        <!--END CONTENT-->
    
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
       function delete_single(id) {
           if (id>0) {
            $('#delete_single_btn').attr('disabled',true);
            $.ajax({
                url: "{{url('').'/admin/index-plan/delete'}}",
                type: 'POST',
                data: {'id': id,'_token':'{{csrf_token()}}'},
            })
            .done(function() {
                location.reload();
            })
            .fail(function() {
                alert("Error deleting record");
            })
            .always(function() {
                $('#delete_single_btn').attr('disabled',false);
            });
            
           }
       }
       function open_modal_delete_selected() {
           $('#modal-delete-selected-plan').modal('show');
           $('#delete-selected-body-information').html("");
           var selected=$('input[name="id[]"]:checked').length;
                  if (selected<1) {
                    $('#selected_zero').show()
                    $('#delete-selected-buttons').hide()
                  }else{
                    /*get seleccted users details*/
                    $.ajax({
                      url: base_url+'/admin/index-plan/get_index_plan_details',
                      type: 'POST',
                      data: $("#delete_client").serialize()
                    })
                    .done(function(response) {
                      console.log(response);
                      for (var i=0; i <response.length; i++) {
                          $('#delete-selected-body-information').prepend('<p>'+
                            '<strong>#'+response[i].id+'</strong>:<span>'+response[i].name_line1+' '+response[i].name_line2+'  </span>'+
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
       $(document).on('click', '#delete_bulk', function(event) {
                  var selected=$('input[name="id[]"]:checked').length;

                  event.preventDefault();
                  if (selected<1) {
                    $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
                  }else{
                    
                    $('#delete_bulk').attr("disabled",true);
                    $.ajax({
                      url: base_url+'/admin/index-plan/delete',
                      type: 'POST',
                      
                      data: $("#delete_client").serialize(),
                    })
                    .done(function() {
                      //location.reload();
                    })
                    .fail(function() {
                      $('#modal-delete-selected').modal('hide');
                       alert("Error: no record was selected to delete");
                    })
                    .always(function() {
                      $('#delete_bulk').attr("disabled",false);
                    });
                  }
                      
                });
       $(document).on('click', '#update_so', function(event) {
         var data=[];
         data='<?php echo json_encode($indexplans) ?>';
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
           url: base_url+'/admin/index-plan/update_sort',
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
       function ClickToSave () {
    var title = CKEDITOR.instances.title.getData();
    var left_header = CKEDITOR.instances.left_header.getData();
    var left_content = CKEDITOR.instances.left_content.getData();
    var right_header = CKEDITOR.instances.right_header.getData();
    var right_content = CKEDITOR.instances.right_content.getData();
          
        $.ajax({
           url: base_url+'/admin/index-plan/cms_update',
           type: 'POST',
           data: {'_token':'{{csrf_token()}}',
               'title':title, 
               'left_header':left_header, 
               'left_content':left_content, 
               'right_header':right_header, 
               'right_content':right_content, 
            },
         })
         .done(function() {
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
   </script>
@endsection