@extends('layouts.frontend_layout')
@section('title','Dashboard | - Webqom Technologies')
@section('page_header','Client Area')
@section('breadcrumbs','Dashboard')
@section('content')
<div class="clearfix"></div>


<!-- end page title -->

<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

 <div class="one_full stcode_title9">
    	<h1 class="caps"><strong>Dashboard</strong>    	</h1>
    </div>

<div class="clearfix"></div>


<div class="content_fullwidth">

    <div class="container">
    	
        @include("frontend.client_dashboard_sidebar")
        
    	<div class="three_fourth_less last">
        
          <div class="text-18px dark light">Welcome Back, {{$user->first_name}}</div>
          <div class="clearfix margin_bottom1"></div>
          <div class="one_half_less"> 
              <div class="alertymes4">
                    <h3 class="light"><i class="fa fa-warning"></i><strong>You have 2 Overdue Invoice(s). Overdue Total: RM 220.00</strong>
                    <br/>Please pay your outstanding invoices as soon as possible.</h3>
                    <div class="clearfix margin_bottom1"></div>
                    <a href="billing_mass_payment.html" class="btn btn-danger caps"><i class="fa fa-hand-o-up"></i><b>Pay All</b></a>
               </div><!-- end section -->
           </div><!-- end one half less -->
           
           <div class="one_half_less last"> 
              <div class="alertymes6">
                    <h3 class="light"><i class="fa fa-warning"></i><strong>You have 3 domain(s) expiring within the next 30 days.</strong>
                    <br/>Renew and secure them today for peace of mind.</h3>
                    <div class="clearfix margin_bottom1"></div>
                    <a href="domain_domain_renewal.html" class="btn btn-warning caps"><i class="fa fa-refresh"></i><b>Renew Now</b></a>
               </div><!-- end section -->
           </div><!-- end one half less -->
           <div class="clearfix margin_bottom3"></div>
           
           <h4>Overdue Invoices</h4>
           <div class="table-responsive">
        	
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th><span class="pull-left">Invoice #</span></th>
                            <th><span class="pull-left">Invoice Date</span></th>
                            <th><span class="pull-left">Due Date</span></th>
                            <th><span class="pull-left">Total</span></th>
                            <th><span class="pull-left">Status</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>MY-8001182</td>
                            <td>16th Feb 2015</td>
                            <td>16th Apr 2015</td>
                            <td>RM 110.00</td>
                            <td><a href="invoice_detail_unpaid.html"><span class="label label-danger caps">Unpaid</span></a></td>
                          </tr>
                          <tr>
                            <td>MY-8001182</td>
                            <td>16th Feb 2015</td>
                            <td>16th Apr 2015</td>
                            <td>RM 110.00</td>
                            <td><a href="invoice_detail_unpaid.html"><span class="label label-danger caps">Unpaid</span></a></td>
                          </tr>
                          <tr>
                          	<td colspan="3" class="aliright"><h5><b>TOTAL DUE</b></h5></td>
                            <td class="aliright"><h5><b>RM 220.00</b></h5></td>
                            <td></td>
                          </tr>
                           
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5"></td>
                          </tr>
                        </tfoot>
                      </table>
                      note to programmer: the "total due" will be varied when user selects # of items to pay in the table. When clicks "unpaid" under Status, it will link to the unpaid invoice.
                      <div class="clearfix"></div>
                         
         	</div><!-- end table responsive -->
            
            <div class="alicent">
                <a href="billing_mass_payment.html" class="btn btn-danger caps"><i class="fa fa-mouse-pointer"></i> <b>Make Payment</b></a>&nbsp;
            </div>
       		           
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           
           <h4>Recent Order History</h4>
           <div class="table-responsive">
        	
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th><span class="pull-left">#</span></th>      
                            <th><span class="pull-left">Invoice #</span></th>
                            <th><span class="pull-left">Receipt #</span></th>
                      		<th><span class="pull-left">Order Date</span></th>                            
                            <th><span class="pull-left">Total</span></th>                  
                            <th><span class="pull-left">Payment</span></th> 
                            <th><span class="pull-left">Status</span></th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            <td>1</td>
                            <td>MY-7974188</td>
                            <td>1431979860</td>
                            <td>16th Apr 2015</td> 
                            <td>RM 26,406.54</td>    
                            <td>PayPal</td> 
                            <td><a href="order_details.html"><span class="label label-success caps">Paid</span></a></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>MY-8001182</td>
                            <td>-</td>
                            <td>16th Apr 2015</td> 
                            <td>RM 26,406.54</td>    
                            <td>PayPal</td> 
                            <td><a href="order_details.html"><span class="label label-danger caps">Payment Failed</span></a></td>                          </tr>
                          
                          
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="7"></td>
                          </tr>
                        </tfoot>
                      </table>
                      <div class="clearfix"></div> 
                      note to programmer: list out the latest 5 orders                    

        	</div><!-- end table responsive -->
            <div class="alicent">
                <a href="order_history_list.html" class="btn btn-danger caps"><i class="fa fa-search"></i> <b>View All</b></a>&nbsp;
            </div>
            
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           
           
           <h4>My Services Listing</h4>
           <div class="table-responsive">
        	
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th width="30%"><span class="pull-left">Product/Services</span></th>
                      		<th><span class="pull-left">Cycle</span></th>                  
                            <th><span class="pull-left">Price</span></th>                            
                            <th><span class="pull-left">Paid Date</span></th> 
                            <th><span class="pull-left">Next Due Date</span></th> 
                            <th><span class="pull-left">Status</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><b>Service Code: </b> <span class="sitecolor">SHSM-1</span><br/>
                            	<b>Shared Hosting Plan:</b> <span class="sitecolor caps">Small</span><br/>
                              	<b>Domain:</b> <span class="sitecolor">webqom.com</span></span>
                            </td>
                            <td>1 year(s)</td>
                            <td>RM 194.94</td> 
                            <td>16th Apr 2015</td> 
                            <td>16th Apr 2016</td> 
                            <td><a href="services_manage_service.html"><span class="label label-danger caps">Expired</span></a></td>
                          </tr>
                          <tr>
                            <td><b>Cloud Hosting Plan:</b> <span class="sitecolor caps">S Server</span><br/>
                                <b>Domain:</b> <span class="sitecolor">webqom.net</span><br/>
                                <b>Plan Specification:</b>
                                <ul>
                                   <li><i class="fa icon-arrow-right"></i> RAM: 1GB</li>
                                   <li><i class="fa icon-arrow-right"></i> Processor: 1 vCPU</li>
                                   <li><i class="fa icon-arrow-right"></i> Fast Disk: 40GB</li>
                                   <li><i class="fa icon-arrow-right"></i> Transfer: 3TB</li>
                                </ul>  
                            </td>
                            <td>1 year(s)</td>
                            <td>RM 480.00</td>
                            <td>16th Apr 2015</td> 
                            <td>16th Apr 2016</td>
                            <td><a href="services_manage_service.html"><span class="label label-warning caps">Suspended</span></a></td>
                          </tr>
                          <tr>
                            <td><b>Service Code: </b> <span class="sitecolor">VPS28-1-1</span><br/>
                            	<b>VPS Hosting Plan:</b> <span class="sitecolor caps">Linux Basic</span><br/>
                                <b>Domain:</b> <span class="sitecolor">webqom.info</span><br/>
                                <b>Plan Specification:</b>
                                        <ul>
                                            <li><i class="fa icon-arrow-right"></i> RAM: 1GB</li>
                                            <li><i class="fa icon-arrow-right"></i> Processor: 1 vCPU</li>
                                            <li><i class="fa icon-arrow-right"></i> Disk Space: 28GB</li>
                                            <li><i class="fa icon-arrow-right"></i> Bandwidth: 1Mbps</li>
                                        </ul>  
                            </td>
                            <td>1 year(s)</td>
                            <td>RM 831.60</td>
                            <td>16th Apr 2015</td> 
                            <td>16th Apr 2016</td>
                            <td><a href="services_manage_service.html"><span class="label label-warning caps">Suspended</span></a></td>
                          </tr>
                          <tr>
                            <td><b>Service Code: </b> <span class="sitecolor">CO2U-1</span><br/>
                            	<b>Co-location Hosting Plan:</b> <span class="sitecolor caps">2U</span><br/>
                                <b>Domain:</b> <span class="sitecolor">webqom.limited</span><br/>
                                <b>Server Configuration:</b>
                                        <ul>
                                            <li><i class="fa icon-arrow-right"></i> Rack Space: Quarter Rack</li>
                                            <li><i class="fa icon-arrow-right"></i> Bandwidth: 10Mbps</li>
                                            <li><i class="fa icon-arrow-right"></i> Power Port: 1 Port</li>
                                            <li><i class="fa icon-arrow-right"></i> Wan Port: 1 Port</li>
                                            <li><i class="fa icon-arrow-right"></i> No. of IP Addresses: 1</li>
                                        </ul>  
                            </td>
                            <td>1 year(s)</td>
                            <td>RM 4,500.00</td>
                            <td>16th Apr 2015</td> 
                            <td>16th Apr 2016</td>
                            <td><a href="services_manage_service.html"><span class="label label-danger caps">Expired</span></a></td>
                          </tr>
                         
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="6"></td>
                          </tr>
                        </tfoot>
                      </table>
                      <div class="clearfix"></div>
                      note to programmer: list out the latest 5 services
                      
        	</div><!-- end table responsive -->
           <div class="alicent">
                <a href="services_my_services.html" class="btn btn-danger caps"><i class="fa fa-search"></i> <b>View All</b></a>&nbsp;
            </div>
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           
           <h4>Recent Support History</h4>
           <div class="table-responsive">
        	
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th><span class="pull-left">Ticket #</span></th>
                            <th><span class="pull-left">Department</span></th>
                            <th><span class="pull-left">Subject</span></th>
                            <th><span class="pull-left">Last Updated</span></th>
                            <th><span class="pull-left">Status</span></th>

                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            <td>499911</td>
                            <td>Technical Support</td>
                            <td>I need help getting a sub domain created</td>
                            <td>29th Nov 2015 15:21</td>
                            <td><a href="support_view_ticket.html"><span class="label label-success caps">Open</span></a></td>
                          </tr>
                          <tr>
                            <td>337975</td>
                            <td>Technical Support</td>
                            <td>My website is down!</td>
                            <td>16th Apr 2015 09:15</td>
                            <td><a href="support_view_ticket.html"><span class="label label-danger caps">Answered</span></a></td>
                          </tr>
                          <tr>
                            <td>337971</td>
                            <td>Billing Department</td>
                            <td>Can I transfer my existing website?</td>
                            <td>15th Apr 2015 12:10</td>
                            <td><a href="support_view_ticket.html"><span class="label label-warning caps">Client-Reply</span></a></td>
                          </tr>
                          <tr>
                            <td>337970</td>
                            <td>Sales Department</td>
                            <td>I would like to enquire about Web88 CMS</td>
                            <td>14th Apr 2015 15:35</td>
                            <td><a href="support_view_ticket.html"><span class="label label-default caps">Closed</span></a></td>
                          </tr>
                          
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5"></td>
                          </tr>
                        </tfoot>
                      </table>
                      <div class="clearfix"></div>
                      note to programmer: list out the latest 5 records
                      
        	</div><!-- end table responsive -->
            
            <div class="alicent">
                <a href="support_open_new_ticket.html" class="btn btn-danger caps"><i class="fa fa-plus"></i> <b>Open New Ticket</b></a>&nbsp;
            </div>
       		           
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           
           
           <div class="clearfix margin_bottom1"></div>

       
       
       </div><!-- end section -->
        
        

        
	</div>  
    <!-- end container -->  
    
    
    <div class="clearfix"></div>
    
    
</div><!-- end content full width -->

<div class="clearfix"></div>

@endsection