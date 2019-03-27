<?php $page='cloud-hosting';
$breadcrumbs=[
array('url'=>url('admin/cloud_hosting'),'name'=>'Cloud hosting'),

];
?>

@extends('layouts.admin_layout')
@section('title','Admin | Index Plan New')
@section('content')
@section('page_header','Index Plan')
<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Cloud Hosting <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
              <div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>The information has been saved/updated successfully.</p>
              </div>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved/updated. Please correct the errors.</p>
              </div>
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
                  <div class="feature_section102">
                    <div class="plan two">
                      <div class="container">
                        <div contenteditable="true">
                          <div class="onecol_forty animate" data-anim-type="fadeInLeft" data-anim-delay="200"><img src="../images/cloud_hosting/img.jpg" alt="Cloud hosting" /></div>
                          <!-- end img -->
                        </div>
                        <div class="onecol_sixty last">
                          <div class="clearfix margin_bottom4"></div>
                          <div contenteditable="true">
                          	<h1 class="caps">A <b>Cloud</b> For Everyone</h1>
                          </div>
                          <h2 class="red light" contenteditable="true">The cloud can seem complex and intimidating. So we reinvented it.</h2>
                          <div contenteditable="true">
                            <h4><strong>Safer &amp; Faster</strong></h4>
                            <p>On the cloud your website is more reliable. Your data is automatically mirrored across three distinct devices. Should hardware issues arise at one, our failover technology automatically designates one copy of your website to keep functioning while the other two copies work to rebuild.</p>
                            <p>No more long load times. Along with premium hardware and low-density servers, our cloud platform includes a varnish caching layer to ensure your server resources are focused where they should be. Static website content is managed more efficiently so dynamic requests can be processed quicker than ever.</p>
                            <h4><strong>Simpler &amp; Bigger</strong></h4>
                            <p>Understand your site's performance at a glance. Simple yet useful dashboards provide a quick view into usage trends, page download speed, uptime, global reach, and more. And with instant resource management, you'll never need to worry about your site going down due to traffic spikes again.</p>
                            <p>More web traffic should never slow you down. As your online presence grows, amp up your cloud usage with the click of a button. Either pick a more powerful plan, or add CPU and RAM a la carte as needed. All without having to worry about reboots, cryptic usage fees, or downtime.</p>
                          </div>
                          <div class="clearfix margin_bottom3"></div>
                        </div>
                        <!-- end section -->
                      </div>
                    </div>
                    <!-- end plan 2 -->
                    <div class="plan three">
                      <div class="container">
                        <div class="onecol_sixty">
                          <div class="clearfix margin_bottom3"></div>
                          <div contenteditable="true">
                            <h1 class="caps"><b>Technical</b> Specifications</h1>
                          </div>
                          <div contenteditable="true">
                            <h2 class="red light">We preinstall and maintain all the software you need on your server.</h2>
                          </div>
                          <div contenteditable="true">
                            <ul class="arrows_list1">
                              <li><i class="fa fa-check"></i> WHM &amp; cPanel</li>
                              <li><i class="fa fa-check"></i> Apache &amp; CentOS</li>
                              <li><i class="fa fa-check"></i> Free Domain Name</li>
                              <li><i class="fa fa-check"></i> Softaculous Autoinstaller</li>
                              <li><i class="fa fa-check"></i> Exim Mail Server</li>
                              <li><i class="fa fa-check"></i> 1 Dedicated IP</li>
                              <li><i class="fa fa-check"></i> MySQL 5 &amp; PostgreSQL</li>
                              <li><i class="fa fa-check"></i> Private DNS Server Setup</li>
                              <li><i class="fa fa-check"></i> Free Private SSL</li>
                              <li><i class="fa fa-check"></i> 7 PHP Versions &amp; HHVM</li>
                              <li><i class="fa fa-check"></i> IP Tables Firewall</li>
                              <li><i class="fa fa-check"></i> SSH Access</li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                          <div contenteditable="true">
                            <p>Please note that the preinstalled OS and other software, needed for a smoothly managed cloud service, reserve 10GB of storage on your server.</p>
                          </div>
                          <div class="clearfix margin_bottom3"></div>
                        </div>
                        <!-- end section -->
                        <div contenteditable="true">
                          <div class="onecol_forty last animate" data-anim-type="fadeInRight" data-anim-delay="200"><img src="../images/cloud_hosting/img_cloud_server.jpg" alt="cloud server" /></div>
                          <!-- end img -->
                        </div>
                      </div>
                    </div>
                    <!-- end plan 3 -->
                    <div class="clearfix"></div>
                  </div>
                  <!-- end featured section 102 -->
                  <div class="clearfix"></div>
                </div>
                <!-- end portlet body -->
                <!-- save button start -->
                <div class="form-actions none-bg"> <a href="#preview in browser/not yet published" class="btn btn-red">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <a href="#publish online" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                <!-- save button end -->
              </div>
              <!-- end porlet -->
              <h4 class="block-heading">Cloud Hosting Plans &amp; General Features Listing</h4>
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#hosting-plans" data-toggle="tab">Cloud Hosting Plans</a></li>
                <li><a href="#general-features" data-toggle="tab">General Features</a></li>
              </ul>
              <div id="myTabContent" class="tab-content">
                <div id="hosting-plans" class="tab-pane fade in active">
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Plan Features Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-plan-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-plan-feature" data-toggle="modal">Delete selected item(s)</a></li>
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
                                    <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" placeholder="eg. RAM">
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
                            <tr>
                              <td><input type="checkbox"/></td>
                              <td>4</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>RAM</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-feature" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal Edit plan feature start-->
                                  <div id="modal-edit-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Plan Feature</h4>
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
                                                <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" class="form-control" placeholder="eg. RAM" value="RAM">
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
                                <!--END MODAL Edit plan feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
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
                                <!-- modal delete end -->
                              </td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"/></td>
                              <td>3</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>Processor</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-feature" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a></td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"/></td>
                              <td>2</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>Fast Disk</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-feature" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a></td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"/></td>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>Transfer</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-plan-feature" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a></td>
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
                  <!-- End portlet -->
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Cloud Hosting Plans Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="cloud_hosting_plan_new.html" class="btn btn-success">Add New Plan &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" data-target="#modal-delete-selected-plan" data-toggle="modal">Delete selected item(s)</a></li>
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
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> L Cloud</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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
                      <div class="pull-right"> <a href="#" class="btn btn-danger">Update Display Order &nbsp;<i class="fa fa-refresh"></i></a> </div>
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
                            <tr>
                              <td><input type="checkbox"/></td>
                              <td>3</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>LCL-1</td>
                              <td>L Cloud</td>
                              <td>170.00/mo</td>
                              <td></td>
                              <td><input type="text" class="form-control" value="Right"></td>
                              <td class="alicent"><a href="cloud_hosting_plan_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <!--Modal delete plan start-->
                                  <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade alileft">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                        </div>
                                        <div class="modal-body">
                                          <p><strong>#3:</strong> L Cloud</p>
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
                              <td><input type="checkbox"/></td>
                              <td>2</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>MCL-1</td>
                              <td>M Cloud</td>
                              <td>80.00/mo</td>
                              <td><span class="red"><i class="fa fa-check red"></i>&nbsp;Best Value</span></td>
                              <td><input type="text" class="form-control" value="Middle"></td>
                              <td class="alicent"><a href="cloud_hosting_plan_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
                            </tr>
                            <tr>
                              <td><input type="checkbox"/></td>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>SCL-1</td>
                              <td>S Cloud</td>
                              <td>40.00/mo</td>
                              <td></td>
                              <td><input type="text" class="form-control" value="Left"></td>
                              <td class="alicent"><a href="cloud_hosting_plan_edit.html" data-hover="tooltip" data-placement="top" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </td>
                            </tr>
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
                                      <input type="text" class="form-control" placeholder="eg. Ultra-Fast Platform ">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Description</label>
                                    <div class="col-md-6">
                                      <textarea name="textarea" class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                    <div class="col-md-6">
                                      <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                      <div class="margin-top-5px"></div>
                                      <input type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor">
                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                    <div class="col-md-9">
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
@endsection
@section('custom_scripts')
@endsection