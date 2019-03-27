@extends('layouts.frontend_layout')
@section('title','Domain Search | Webqom Technologies')
@section('page_header','Domains')
@section('breadcrumbs','Domain Search')
@section('content')
<div class="clearfix"></div>

<div class="content_fullwidth">

    <div class="container">

        <div class="one_fourth_less">
            <h4>Status Filter</h4>
            <div class="list-group">
            	<a href="#" class="list-group-item active">All Domains<span class="badge badge-dark pull-right">4</span></a>
                <a href="#" class="list-group-item caps">Active<span class="badge badge-success pull-right">1</span></a>
                <a href="#" class="list-group-item caps">Expired<span class="badge badge-danger pull-right">1</span></a>
                <a href="#" class="list-group-item caps">Pending<span class="badge badge-warning pull-right">1</span></a>
            </div>
            note to programmer: when clicked, filter the table on the right by status and only showed the filtered data. Please note when click status "Pending", filter it in "my domains" table. "Pending" status will not appear in renewal table. eg. payment failed, so client needs to compelete payment and then can renew for this domain.

            <h4>Client Area</h4>
             <ul class="list-group">
            	<li class="list-group-item"><h5 class="white">Quick Links</h5></li>
                <li class="list-group-item"><a href="client_area_home.html"><i class="fa fa-caret-right"></i> Dashboard</a></li>
                <li class="list-group-item alt"><h5>Products/Services</h5></li>
                <li class="list-group-item"><a href="services_my_services.html"><i class="fa fa-caret-right"></i> My Services Listing</a></li>

                <li class="list-group-item alt"><h5>Orders</h5></li>
                <li class="list-group-item"><a href="order_history_list.html"><i class="fa fa-caret-right"></i> My Order History</a></li>

                <li class="list-group-item alt"><h5>Domains</h5></li>
                <li class="list-group-item"><a href="domain_my_domains.html"><i class="fa fa-caret-right"></i> My Domains</a></li>
                <li class="list-group-item"><a href="domain_domain_renewal.html"><i class="fa fa-caret-right"></i> Renew Domains</a></li>
                <li class="list-group-item"><a href="domain_register_new_login.html"><i class="fa fa-caret-right"></i> Register a New Domain</a></li>
                <li class="list-group-item"><a href="domain_transfer_login.html"><i class="fa fa-caret-right"></i> Transfer Domains to Us</a></li>
                <li class="list-group-item"><a href="domain_search_login.html"><i class="fa fa-caret-right"></i> Domain Search</a></li>

                <li class="list-group-item alt"><h5>Billing</h5></li>
                <li class="list-group-item"><a href="billing_my_invoices.html"><i class="fa fa-caret-right"></i> My Invoices</a></li>
                <li class="list-group-item"><a href="billing_my_quotes.html"><i class="fa fa-caret-right"></i> My Quotes</a></li>
                <li class="list-group-item"><a href="billing_mass_payment.html"><i class="fa fa-caret-right"></i> Make Payment / Mass Payment</a></li>
                <li class="list-group-item alt"><h5>Support</h5></li>
                <li class="list-group-item"><a href="support_my_support_tickets.html"><i class="fa fa-caret-right"></i> My Support Tickets</a></li>
                <li class="list-group-item"><a href="support_open_new_ticket.html"><i class="fa fa-caret-right"></i> Open New Ticket</a></li>

                <li class="list-group-item alt"><h5>My Account</h5></li>
                <li class="list-group-item"><a href="account_edit.html"><i class="fa fa-caret-right"></i> Edit Account Details</a></li>
                <li class="list-group-item"><a href="account_edit.html#tab-2"><i class="fa fa-caret-right"></i> Change Password</a></li>


             </ul>

        </div><!-- end section -->

    	<div class="three_fourth_less last">

           <div class="text-18px dark light">Secure your domain(s) by adding more years to them. Choose how many years you want to renew for and then submit to continue.</div>
           <div class="clearfix margin_bottom1"></div>

           <p class="aliright">6 record(s) found. Items 1-20 out of 83 displayed</p>

                <div class="table-responsive">

                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                              	<th width="1%"><input type="checkbox"></th>
                                <th>Domain</th>
                                <th>Next Due Date</th>
                                <th>Days Until Expiry</th>
                                <th>Registration Period</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr>
                                <td colspan="6">No records found.</td>
                              </tr>

                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="6"></td>
                              </tr>
                            </tfoot>
                          </table>
                          <div class="clearfix"></div>

                </div>

                <div class="table-responsive">

                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th width="1%"><input type="checkbox"></th>
                            <th><span class="pull-left">Domain</span> <a href="#sort by domain" class="pull-right white"><i class="fa fa-sort"></i></a></th>
                            <th><span class="pull-left">Next Due Date</span> <a href="#sort by next due date" class="pull-right white"><i class="fa fa-sort"></i></a></th>
                            <th><span class="pull-left">Days Until Expiry</span> <a href="#sort by days until expiry" class="pull-right white"><i class="fa fa-sort"></i></a></th>
                            <th><span class="pull-left">Registration Period</span> <a href="#sort by registration period" class="pull-right white"><i class="fa fa-sort"></i></a></th>
                            <th><span class="pull-left">Status</span> <a href="#sort by status" class="pull-right white"><i class="fa fa-sort"></i></a></th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                          	<td width="1%" class="alicent"><input type="checkbox"></td>
                            <td>webqom.com</td>
                            <td>10th Dec 2015</td>
                            <td>7 Days</td>
                            <td>
                            	<select class="form-control input-medium">
                                        <option value="1 year">1 year(s) @ RM 38.00</option>
                                        <option value="2 years">2 year(s) @ RM 69.00</option>
                                        <option value="3 years">3 year(s) @ RM 99.00</option>
                                        <option value="4 years">4 year(s) @ RM 129.00</option>
                                        <option value="5 years">5 year(s) @ RM 159.00</option>
                                        <option value="6 years">6 year(s) @ RM 225.00</option>
                                        <option value="7 years">7 year(s) @ RM 265.00</option>
                                        <option value="8 years">8 year(s) @ RM 295.00</option>
                                        <option value="9 years">9 year(s) @ RM 335.00</option>
                                        <option value="10 years">10 year(s) @ RM 365.00</option>
                                    </select>
                            </td>
                            <td><a href="domain_manage_domain.html"><span class="label label-success caps">Active</span></a></td>
                          </tr>
                          <tr>
                          	<td width="1%" class="alicent"><input type="checkbox" disabled="disabled"></td>
                            <td>webqom.my</td>
                            <td>02nd Jan 2015</td>
                            <td><span class="red">334 Days Ago</span></td>
                            <td><span class="red">Past Renewable Period</span></td>
                            <td><a href="domain_manage_domain.html"><span class="label label-danger caps">Expired</span></a></td>

                          </tr>
                          <tr>
                          	<td width="1%" class="alicent"><input type="checkbox"></td>
                            <td>webqom.info</td>
                            <td>24th Nov 2015</td>
                            <td><span class="red">10 Days Ago</span></td>
                            <td>
                            	<select class="form-control input-medium">
                                        <option value="1 year">1 year(s) @ RM 38.00</option>
                                        <option value="2 years">2 year(s) @ RM 69.00</option>
                                        <option value="3 years">3 year(s) @ RM 99.00</option>
                                        <option value="4 years">4 year(s) @ RM 129.00</option>
                                        <option value="5 years">5 year(s) @ RM 159.00</option>
                                        <option value="6 years">6 year(s) @ RM 225.00</option>
                                        <option value="7 years">7 year(s) @ RM 265.00</option>
                                        <option value="8 years">8 year(s) @ RM 295.00</option>
                                        <option value="9 years">9 year(s) @ RM 335.00</option>
                                        <option value="10 years">10 year(s) @ RM 365.00</option>
                                    </select>
                            </td>
                            <td><a href="domain_manage_domain.html"><span class="label label-danger caps">Expired</span></a></td>
                          </tr>
                          <!--<tr>
                          	<td width="1%" class="alicent"><input type="checkbox"></td>
                            <td>webqom.co</td>
                            <td>30th Nov 2015</td>
                            <td>-</td>
                            <td><a href="#"><span class="label label-warning caps">Pending</span></a></td>
                            <td>Payment failed</td>
                          </tr>-->

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="6"></td>
                          </tr>
                        </tfoot>
                      </table>
                      <div class="clearfix"></div>

        	</div>
            <!-- end table responsive -->

            <div class="clearfix"></div>
            <div class="divider_line7"></div>
            <div class="clearfix"></div>
            <div class="alicent">
               <a href="{{route('frontend.domain.configuration')}}" class="btn btn-danger caps"><i class="fa fa-arrow-circle-right"></i> <b>Continue</b></a>&nbsp;
            </div>


       </div><!-- end section -->




	</div>
    <!-- end container -->


    <div class="clearfix"></div>


</div><!-- end content full width -->

<div class="clearfix"></div>
@endsection()
