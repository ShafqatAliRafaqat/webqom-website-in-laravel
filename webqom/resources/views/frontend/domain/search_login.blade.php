@extends('layouts.frontend_layout')
@section('title','Domain Search | Webqom Technologies')
@section('content')
@section('page_header','Domains')
@section('breadcrumbs','Domain Search')
<div class="clearfix"></div>

<div class="content_fullwidth">
    <div class="container">

        <div class="one_fourth_less">
            <h4>Status Filter</h4>
            <div class="list-group">
                <a href="#" class="list-group-item active">All Domains
                    <span class="badge badge-dark pull-right">4</span>
                </a>
                <a href="#" class="list-group-item caps">Active
                    <span class="badge badge-success pull-right">1</span>
                </a>
                <a href="#" class="list-group-item caps">Expired
                    <span class="badge badge-danger pull-right">1</span>
                </a>
                <a href="#" class="list-group-item caps">Pending
                    <span class="badge badge-warning pull-right">1</span>
                </a>
            </div>
            note to programmer: when clicked, filter the table in "my domains" table by status and only showed the filtered data.

            <h4>Client Area</h4>
            <ul class="list-group">
                <li class="list-group-item">
                    <h5 class="white">Quick Links</h5>
                </li>
                <li class="list-group-item">
                    <a href="client_area_home.html">
                        <i class="fa fa-caret-right"></i> Dashboard</a>
                </li>
                <li class="list-group-item alt">
                    <h5>Products/Services</h5>
                </li>
                <li class="list-group-item">
                    <a href="services_my_services.html">
                        <i class="fa fa-caret-right"></i> My Services Listing</a>
                </li>

                <li class="list-group-item alt">
                    <h5>Orders</h5>
                </li>
                <li class="list-group-item">
                    <a href="order_history_list.html">
                        <i class="fa fa-caret-right"></i> My Order History</a>
                </li>

                <li class="list-group-item alt">
                    <h5>Domains</h5>
                </li>
                <li class="list-group-item">
                    <a href="domain_my_domains.html">
                        <i class="fa fa-caret-right"></i> My Domains</a>
                </li>
                <li class="list-group-item">
                    <a href="domain_domain_renewal.html">
                        <i class="fa fa-caret-right"></i> Renew Domains</a>
                </li>
                <li class="list-group-item">
                    <a href="domain_register_new_login.html">
                        <i class="fa fa-caret-right"></i> Register a New Domain</a>
                </li>
                <li class="list-group-item">
                    <a href="domain_transfer_login.html">
                        <i class="fa fa-caret-right"></i> Transfer Domains to Us</a>
                </li>
                <li class="list-group-item">
                    <a href="domain_search_login.html">
                        <i class="fa fa-caret-right"></i> Domain Search</a>
                </li>

                <li class="list-group-item alt">
                    <h5>Billing</h5>
                </li>
                <li class="list-group-item">
                    <a href="billing_my_invoices.html">
                        <i class="fa fa-caret-right"></i> My Invoices</a>
                </li>
                <li class="list-group-item">
                    <a href="billing_my_quotes.html">
                        <i class="fa fa-caret-right"></i> My Quotes</a>
                </li>
                <li class="list-group-item">
                    <a href="billing_mass_payment.html">
                        <i class="fa fa-caret-right"></i> Make Payment / Mass Payment</a>
                </li>
                <li class="list-group-item alt">
                    <h5>Support</h5>
                </li>
                <li class="list-group-item">
                    <a href="support_my_support_tickets.html">
                        <i class="fa fa-caret-right"></i> My Support Tickets</a>
                </li>
                <li class="list-group-item">
                    <a href="support_open_new_ticket.html">
                        <i class="fa fa-caret-right"></i> Open New Ticket</a>
                </li>

                <li class="list-group-item alt">
                    <h5>My Account</h5>
                </li>
                <li class="list-group-item">
                    <a href="account_edit.html">
                        <i class="fa fa-caret-right"></i> Edit Account Details</a>
                </li>
                <li class="list-group-item">
                    <a href="account_edit.html#tab-2">
                        <i class="fa fa-caret-right"></i> Change Password</a>
                </li>

                <li class="list-group-item alt">
                    <h5>Business Partner Program</h5>
                </li>
                <li class="list-group-item">
                    <a href="business_partner_home.html">
                        <i class="fa fa-caret-right"></i> Business Partner Home</a>
                </li>
                note to programmer: business partner program menu is only visible to client who registered as "business partner account".
                Please hide it in the "General account".

            </ul>

        </div>
        <!-- end section -->

        <div class="three_fourth_less last">

            <div class="text-18px dark light">Start your web hosting experience with us by checking if your domain is available...</div>
            <div class="clearfix margin_bottom1"></div>

            <div class="cforms alileft">
                <h4>Search a Domain</h4>
                <form type="POST" id="gsr-contact" onSubmit="return valid_datas( this );">
                    <input type="text" name="domain" id="domain" placeholder="eg. yourdomain.com">
                    <div class="alicent margin_top1">
                        <a href="#when clicked, display results in below tables" class="btn btn-danger caps">
                            <i class="fa fa-lg fa-spinner"></i>
                            <b>Search</b>
                        </a>&nbsp;
                        <a href="domain_bulk_search_login.html" class="btn btn-primary caps">
                            <i class="fa fa-lg fa-search"></i>
                            <b>Bulk Search</b>
                        </a>&nbsp;

                    </div>

                </form>
            </div>
            <!-- end cforms -->
            <div class="clearfix"></div>
            <div class="divider_line7"></div>
            <div class="clearfix"></div>

            <div class="alertymes4">
                <h3 class="light">
                    <i class="fa fa-times-circle"></i>Sorry!
                    <strong>webqom.com</strong> is already taken!</strong>
                </h3>
            </div>
            <!-- end section -->
            <div class="clearfix margin_bottom3"></div>

            <div>You might also be interested in the following alternative names...</div>
            <div class="clearfix margin_bottom1"></div>
            <div class="table-responsive">

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="1%">
                                <input type="checkbox" />
                            </th>
                            <th>Domain Name</th>
                            <th>Status</th>
                            <th>More Info</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="alicent">
                                <i class="fa fa-times red"></i>
                            </td>
                            <td>webqom.com</td>
                            <td>
                                <span class="label label-sm label-red">Unavailable</span>
                            </td>
                            <td>
                                <a href="http://webqom.com" target="_blank">WWW</a> |
                                <a href="whois.html">WHOIS</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="alicent">
                                <input type="checkbox" />
                            </td>
                            <td>webqom.net</td>
                            <td>
                                <span class="label label-sm label-success">Available</span>
                            </td>
                            <td>
                                <select class="form-control input-medium">
                                    <option value="1 year">1 year(s) @ RM 38.00</option>
                                    <option value="2 years" selected="selected">2 year(s) @ RM 69.00</option>
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


            <div class="alertymes5">
                <h3 class="light">
                    <i class="fa fa-check-circle"></i>Congratulations!
                    <strong>webqom.co</strong> is available!</h3>
            </div>
            <!-- end section -->
            <div class="clearfix margin_bottom3"></div>
            <form action="{{route('frontend.domain.configuration')}}" method="GET">
            <div class="table-responsive">

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="1%">
                                <input type="checkbox" />
                            </th>
                            <th>Domain Name</th>
                            <th>Status</th>
                            <th>More Info</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="alicent">
                                <input type="checkbox" checked="checked" />
                            </td>
                            <td>webqom.co</td>
                            <td>
                                <span class="label label-sm label-success">Available</span>
                            </td>
                            <td>
                                <select class="form-control input-medium">
                                    <option value="1 year">1 year(s) @ RM 38.00</option>
                                    <option value="2 years" selected="selected">2 year(s) @ RM 69.00</option>
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
                        </tr>
                        <tr>
                            <td class="alicent">
                                <input type="checkbox" />
                            </td>
                            <td>webqom.net</td>
                            <td>
                                <span class="label label-sm label-success">Available</span>
                            </td>
                            <td>
                                <select class="form-control input-medium">
                                    <option value="1 year">1 year(s) @ RM 38.00</option>
                                    <option value="2 years" selected="selected">2 year(s) @ RM 69.00</option>
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
                        </tr>
                        <tr>
                            <td class="alicent">
                                <i class="fa fa-times red"></i>
                            </td>
                            <td>webqom.com</td>
                            <td>
                                <span class="label label-sm label-red">Unavailable</span>
                            </td>
                            <td>
                                <a href="http://webqom.com" target="_blank">WWW</a> |
                                <a href="whois.html">WHOIS</a>
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


            <div class="clearfix"></div>
            <div class="divider_line7"></div>
            <div class="clearfix"></div>
            <div class="alicent">
                <button type="submit" class="btn btn-danger caps">
                    <i class="fa fa-arrow-circle-right"></i>
                    <b>Order Now</b>
                </button>&nbsp;
            </div>
            </form>

        </div>
        <!-- end section -->



    </div>
</div>
<!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>


<div class="clearfix"></div>
@endsection()