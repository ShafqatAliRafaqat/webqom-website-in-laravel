<?php $page='dashboard'; ?>
@extends('layouts.admin_layout')
@section('title','Admin | Dashboard')
@section('content')
@section('page_header','Dashboard')
<div class="page-content">
                <div id="tab-general">
                    <div class="row">
                    	<div class="col-lg-12">
                        	<h5 class="block-heading">Showing data from 02nd January - 08th January 2016 <a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-data-range" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a></h5>
                            note to programmer: by default, showing the latest 1 week data. 
                            
                            <!--Modal Edit data range start-->
                                  <div id="modal-edit-data-range" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Data Range</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form">
                                            <form class="form-horizontal">
                                            	<h5 class="block-heading">Total Sales</h5>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Showing Data</label>
                                                    <div class="col-md-6">
                                                      <div class="input-group input-daterange">
                                                        <input type="text" name="start" class="form-control" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="02nd Jan 2016"/>
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" name="end" class="form-control" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="08th Jan 2016"/>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  
                                                <h5 class="block-heading">Total Lifetime Sales</h5>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Showing Data</label>
                                                    <div class="col-md-6">
                                                      <div class="input-group input-daterange">
                                                        <input type="text" name="start" class="form-control" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="02nd Jan 2016"/>
                                                        <span class="input-group-addon">to</span>
                                                        <input type="text" name="end" class="form-control" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" value="02nd Feb 2016"/>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  note to programmer: pls follow the date format ie. 02nd Jan 2016. the data should be latest 1 week or 1 month data by default.
                                              <div class="form-actions">
                                                <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!--END MODAL Edit data range -->
                        </div><!-- end col-lg-12 -->
                    	    
                    	<div class="col-lg-6">
                        	
                        
                        	<div class="panel panel-primary">
                            	<div class="panel-heading">Total Sales</div>
                                <div class="panel-body">
                                
                                    <div id="counter-chart" style="width: 100%; height:300px"></div>
                                    
                                    <div class="order-detail">
                                    	<div class="col-md-6">
                                            <div class="revenue-total">RM<span id='revenue-number'>0</span></div>
                                            <div class="revenue-title">Current Week</div>
                                            <div class="xss-margin"></div>
                                            <div class="text-12px">[02nd Jan - 08th Jan]</div>
                                            <div class="xss-margin"></div>
                                            <i class="fa fa-arrow-up text-green"></i>&nbsp; <span class="text-green"><b>55.2%</b></span> from last week
                                        </div>
                                        <div class="col-md-6">
                                            <div class="revenue-total">RM<span id='new-sales-number'>0</span></div>
                                            <div class="revenue-title">New Sales for Today</div>
                                            <div class="xss-margin"></div>
                                            <div class="text-12px">[08th Jan]</div>
                                            <div class="xss-margin"></div>
                                            <i class="fa fa-arrow-down text-red"></i>&nbsp; <span class="text-red"><b>20.8%</b></span>
                                        </div>
                                        
                                                
                                    </div><!-- end order detail -->
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-lg-6">
                        
                        	<div class="panel panel-primary">
                            	<div class="panel-heading">Total Lifetime Sales</div>
                                <div class="panel-body">
                                    <div id="area-chart" style="width: 100%; height:300px"></div>
                                    
                                    <div class="order-detail">
                                    	<div class="col-md-6">
                                            <div class="revenue-total">RM<span id='earning-number'>0</span></div>
                                            <div class="revenue-title">Current Month</div>
                                            <div class="xss-margin"></div>
                                            <div class="text-12px">January</div>
                                            <div class="xss-margin"></div>
                                            <i class="fa fa-arrow-up text-green"></i>&nbsp; <span class="text-green"><b>65%</b></span> from last month
                                        </div>
                                        <div class="col-md-6">
                                            <div class="revenue-total">RM<span id='visits-number'>0</span></div>
                                            <div class="revenue-title">Total 2016 Sales</div>
                                            <div class="xss-margin"></div>
                                            <i class="fa fa-arrow-down text-red"></i>&nbsp; <span class="text-red"><b>12.6%</b></span>
                                        </div>
                                        
                                                
                                    </div><!-- end order detail -->
                                    
                                </div>
                            </div>
                            
                        </div> 
                        <div class="clearfix"></div>
                        
                        <div class="col-lg-12">
                        
                        	<div class="panel panel-primary">
                            	<div class="panel-heading">Top Product Sales</div>
                                <div class="panel-body">
                                	
                                    <div class="col-md-4 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body"><h6 class="block-heading">VPS Server<span class="pull-right">RM <span id='earning-number-vps'></span></span></h6>
    
                                                <div id="earning-chart" style="width: 100%; height:100px"></div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                        <div class="panel-body"><h6 class="block-heading">Dedicated Server<span class="pull-right">RM <span id='earning-number-dedicated'></span></span></h6>

                                            <div id="earning-chart-dedicated" style="width: 100%; height:100px"></div>
                                        </div>
                                    </div>
                                    </div> <!-- end col-md-4 -->
                                    
                                    
                                    <div class="col-md-4 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body"><h6 class="block-heading">Web Design<span class="pull-right">RM <span id='earning-number-web-design'></span></span></h6>
    
                                                <div id="earning-chart-web-design" style="width: 100%; height:100px"></div>
                                            </div>
                                        </div>
                                        <div class="panel">
                                            <div class="panel-body"><h6 class="block-heading">Email88<span class="pull-right">RM <span id='earning-number-email88'></span></span></h6>
    
                                                <div id="earning-chart-email88" style="width: 100%; height:100px"></div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-md-4 -->
                                    
                                    <div class="col-md-4 col-xs-12">
                                        <div class="panel">
                                            <div class="panel-body"><h6 class="block-heading">Shared Hosting<span class="pull-right">RM <span id='earning-number-shared'></span></span></h6>
    
                                                <div id="earning-chart-shared" style="width: 100%; height:100px"></div>
                                            </div>
                                        </div>

                                    </div> <!-- end col-md-4 -->
                                    
                                </div><!-- end panel body -->
                            </div><!-- end panel primary -->
                            
                        
                        </div><!-- end col-lg-12 -->
                        
                        
                        
                        <div class="col-lg-12">
                        
                        	<div class="panel panel-primary tabbable">
                            	<div class="panel-heading">Top Clients Sales</div>
                                <div class="panel-body">
                                	<div class="tabbable portlet-tabs">
                                
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#by-sales" data-toggle="tab">By Sales</a></li>
                                        </ul>
                                        
                                        <div class="tab-content">
                                        
                                        	 <div id="by-sales" class="tab-pane fade in active">
                                             	
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="panel">
                                                        <div class="panel-body"><h6 class="block-heading">OCK Group Bhd<span class="pull-right">RM <span id='ock-group-number'></span></span></h6>
                
                                                            <div id="ock-group-chart" style="width: 100%; height:100px"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="panel">
                                                        <div class="panel-body"><h6 class="block-heading">Tan Boon Ming Sdn Bhd<span class="pull-right">RM <span id='tbm-number'></span></span></h6>
                
                                                            <div id="tbm-chart" style="width: 100%; height:100px"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="panel">
                                                        <div class="panel-body"><h6 class="block-heading">Yee Lee Corporation Bhd<span class="pull-right">RM <span id='yee-lee-number'></span></span></h6>
                
                                                            <div id="yee-lee-chart" style="width: 100%; height:100px"></div>
                                                        </div>
                                                    </div>

                                    			</div> <!-- end col-md-6 -->
                                                
                                                
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="panel">
                                                        <div class="panel-body"><h6 class="block-heading">Restoran Foh San Sdn Bhd<span class="pull-right">RM <span id='foh-san-number'></span></span></h6>
                
                                                            <div id="foh-san-chart" style="width: 100%; height:100px"></div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="panel">
                                                        <div class="panel-body"><h6 class="block-heading">Grand Teak Sdn Bhd<span class="pull-right">RM <span id='grand-teak-number'></span></span></h6>
                
                                                            <div id="grand-teak-chart" style="width: 100%; height:100px"></div>
                                                        </div>
                                                    </div>
                                                    

                                    			</div> <!-- end col-md-6 -->
                                             
                                             </div><!-- end tab by sales -->
                                        
                                        </div><!-- end tab content -->
                                    </div><!-- end portlet tabs -->
                                
                                </div><!-- end panel body -->
                            
                            </div><!-- end panel primary -->
                            
                            
                            
                        </div><!-- end col-lg-12 -->
                        
                        
                        
                        <div class="col-lg-12">
                            
                            <div class="panel">
                                <div class="panel-body">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab-bestsellers" data-toggle="tab">Bestsellers</a></li>
                                        <li><a href="#tab-most-viewed-products" data-toggle="tab">Most Viewed Products</a></li>
                                        <li><a href="#tab-new-customers" data-toggle="tab">New Customers</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="tab-bestsellers" class="tab-pane fade in active">
                                            <table class="table table-hover table-striped mbn">
                                                <thead>
                                                <tr>
                                                    <th>Products/Services</th>
                                                    <th class="text-right">Price</th>
                                                    <th class="text-right">Quantity Ordered</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Web88IR: Dynamic I</td>
                                                        <td class="text-right">RM 750.00</td>
                                                        <td class="text-right">3</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Responsive Web Design: Premium</td>
                                                        <td class="text-right">RM 600.50</td>
                                                        <td class="text-right">2</td>
                                                    </tr>
                                                    <tr>
                                                        <td>VPS Hosting: Linux Gold</td>
                                                        <td class="text-right">RM 390.49</td>
                                                        <td class="text-right">26</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dedicated Servers: Enterprise I</td>
                                                        <td class="text-right">RM 240.74</td>
                                                        <td class="text-right">12</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email88: Booster II</td>
                                                        <td class="text-right">RM 350.50</td>
                                                        <td class="text-right">1</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shared Hosting: Large</td>
                                                        <td class="text-right">RM 590.29</td>
                                                        <td class="text-right">45</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div id="tab-most-viewed-products" class="tab-pane fade">
                                        	<table class="table table-hover table-striped mbn">
                                                <thead>
                                                    <tr>
                                                        <th>Products/Services</th>
                                                        <th class="text-right">Price</th>
                                                        <th class="text-right">Quantity Ordered</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	<tr>
                                                    <td>Web88IR: Dynamic I</td>
                                                    <td class="text-right">RM 750.00</td>
                                                    <td class="text-right">3</td>
                                                </tr>
                                                <tr>
                                                    <td>Responsive Web Design: Premium</td>
                                                    <td class="text-right">RM 600.50</td>
                                                    <td class="text-right">2</td>
                                                </tr>
                                                <tr>
                                                    <td>VPS Hosting: Linux Gold</td>
                                                    <td class="text-right">RM 390.49</td>
                                                    <td class="text-right">26</td>
                                                </tr>
                                                <tr>
                                                    <td>Dedicated Servers: Enterprise I</td>
                                                    <td class="text-right">RM 240.74</td>
                                                    <td class="text-right">12</td>
                                                </tr>
                                                <tr>
                                                    <td>Email88: Booster II</td>
                                                    <td class="text-right">RM 350.50</td>
                                                    <td class="text-right">1</td>
                                                </tr>
                                                <tr>
                                                    <td>Shared Hosting: Large</td>
                                                    <td class="text-right">RM 590.29</td>
                                                    <td class="text-right">45</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        
                                        </div>
                                        <!-- end tab most viewed products -->
                                        
                                        <div id="tab-new-customers" class="tab-pane fade">
                                        	<table id="example1" class="table table-hover table-striped">
                                                <thead>
                                                  <tr>
                                                  	<th><a href="#sort by client id"></a></th>
                                                    <th><a href="#sort by customer name">Client Name</a></th>
                                                    <th><a href="#sort by email">Email</a></th>
                                                    <th><a href="#sort by comapny">Company</a></th>
                                                    <th><a href="#sort by registered date">Registered Date</a></th>
                                                    <th><a href="#sort by type">Type</a></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                   @if(!empty($new_clients))
                                                    <?php $count=0; ?>
                                                    @foreach($new_clients as $i)
                                                        @if($i->client)
                                                            <?php $count++; ?>
                                                            <tr>
                                                              <td>{{$i->client->client_id or ""}}</td>
                                                              <td>{{$i->client->first_name." ".$i->client->last_name}}</td>
                                                              <td><a href="mailto:danny@webqom.com">{{$i->email}}</a></td>
                                                              <td>{{$i->client->company}}</td>
                                                              <td>{{date("d-M-Y",strtotime($i->created_at))}}</td>
                                                              <td>{{$i->client->account_type}}</td>
                                                            </tr>
                                                            @endif   
                                                    @endforeach
                                                @endif                                               
                                                 
                                                </tbody>
                                                <tfoot>
                                                  <tr>
                                                    <td colspan="6"></td>
                                                  </tr>
                                                </tfoot>
                                              </table>
                                        
                                        </div>
                                        <!-- end tab new customers -->
                                        
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-lg-12 -->
                        
                        
                    </div>
                </div>
            </div>
            @endsection