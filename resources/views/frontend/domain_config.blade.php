@extends('layouts.frontend_layout')
@section('title','Admin | Domain Configuration')
@section('content')
@section('page_header','Services')

<div class="clearfix"></div>
<div class="content_fullwidth">
    <div class="container">

        @include('layouts.frontend_menu_login')
        {{--  <div class="one_fourth_less">
            <h4>Status Filter</h4>
            <div class="list-group">
                <a href="#" class="list-group-item active">All Domains<span class="badge badge-dark pull-right">4</span></a>
                <a href="#" class="list-group-item caps">Active<span class="badge badge-success pull-right">1</span></a>
                <a href="#" class="list-group-item caps">Expired<span class="badge badge-danger pull-right">1</span></a>
                <a href="#" class="list-group-item caps">Pending<span class="badge badge-warning pull-right">1</span></a>
            </div>
            note to programmer: when clicked, filter the table in "my domains" table by status and only showed the filtered data.

            <h4>Client Area</h4>
            <ul class="list-group">
                <li class="list-group-item"><h5 class="white">Quick Links</h5></li>
                <li class="list-group-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-caret-right"></i> Dashboard</a></li>
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
                <li class="list-group-item"><a href="{{ url('/my_account') }}"><i class="fa fa-caret-right"></i> Edit Account Details</a></li>
                <li class="list-group-item"><a href="{{ url('/my_account?change-password')  }}"><i class="fa fa-caret-right"></i> Change Password</a></li>


            </ul>

        </div><!-- end section -->  --}}

        <div class="three_fourth_less last">

            <div class="text-18px dark light">Please review your domain name selections and any addons that are available for them.</div>
            <div class="clearfix margin_bottom1"></div>

            @if(isset($info))
            <div class="stcode_title12">
                <h4 class="sitecolor"><span class="line"></span><span class="text">{{$info->domain}}</span></h4>
            </div>

            <div class="table-responsive">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Registration Period</th>
                        <th>Hosting</th>
                        <th>Domain Addons</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$info->duration}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-danger"><b>ADD HOSTING</b></button>
                                <button type="button" data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                <ul role="menu" class="dropdown-menu alileft">
                                    <li><a href="cloud_hosting1">Cloud Hosting</a></li>
                                    <li><a href="co-location_hosting.html">Co-location Hosting</a></li>
                                    <li><a href="dedicated_servers.html">Dedicated Servers</a></li>
                                    <li><a href="reseller_hosting.html">Reseller Hosting</a></li>
                                    <li><a href="shared_hosting.html">Shared Hosting</a></li>
                                    <li><a href="vps_hosting.html">VPS Hosting</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            @foreach($domain_pricings as $dprice)
                                <input type="checkbox" name="domain_price" value="{{$dprice->id}}"> {{$dprice->title}} (RM {{$dprice->price}})
                                <div class="clearfix"></div>
                            @endforeach

                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                    </tfoot>
                </table>

                <div class="clearfix"></div>

            </div><!-- end table responsive -->
            @endif

            <a href="#" data-target="#notification" data-toggle="modal">note to programmer: pop up notification example of not choosing any hosting plan, remove this text once is done.</a>
            <!--Modal notification start-->
            <div id="notification" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>-->
                            <h4 id="modal-login-label3" class="modal-title"><i class="fa fa-exclamation-triangle"></i> You have not chosen any hosting plan yet</h4>
                        </div>
                        <div class="modal-body">

                            <div data-dismiss="modal" aria-hidden="true" class="plainmodal-close"></div>
                            <form>
                                <div class="cforms alileft">
                                    <p>You have not chosen any hosting plan yet. Are you sure you wish to continue?</p>

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning"><b>GET A HOSTING FOR DOMAIN</b></button>
                                        <button type="button" data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                        <ul role="menu" class="dropdown-menu alileft">
                                            <li><a href="cloud_hosting.html">Cloud Hosting</a></li>
                                            <li><a href="co-location_hosting.html">Co-location Hosting</a></li>
                                            <li><a href="dedicated_servers.html">Dedicated Servers</a></li>
                                            <li><a href="reseller_hosting.html">Reseller Hosting</a></li>
                                            <li><a href="shared_hosting.html">Shared Hosting</a></li>
                                            <li><a href="vps_hosting.html">VPS Hosting</a></li>
                                        </ul>
                                    </div>
                                </div><!-- end cforms -->


                                <div class="clearfix margin_bottom1"></div>
                                <div class="divider_line2"></div>
                                <div class="clearfix margin_bottom1"></div>


                                <div class="clearfix"></div>

                                <div class="alicent">
                                    <a href="#" class="btn btn-danger caps"><i class="fa fa-plus"></i> <b>Add Hosting</b></a>&nbsp;
                                    <a href="#" data-dismiss="modal" class="btn btn-primary caps"><i class="fa fa-ban"></i> <b>No, thank you</b></a>&nbsp;
                                </div>

                                <div class="clearfix margin_bottom1"></div>

                            </form>

                        </div><!-- end modal-body -->
                    </div>
                </div>
            </div><!--END MODAL notification -->

            <div class="clearfix"></div>
            <div class="divider_line7"></div>
            <div class="clearfix"></div>

            <div class="text-18px dark light">By default, new domains will use our nameservers for hosting on our network. If you want to use custom nameservers then enter them below.</div>
            <div class="clearfix margin_bottom1"></div>

            <h4>Nameservers</h4>

            <div class="cforms alileft">

                <div id="form_status"></div>
                <form type="POST" id="gsr-contact" onSubmit="return valid_datas( this );">
                    <div class="one_third">
                        <label><b>Nameserver1</b></label>
                        <input type="text" name="nameserver1" id="nameserver1" value="ns1.webqomhosting1.com">
                    </div>

                    <div class="one_third">
                        <label><b>Nameserver2</b></label>
                        <input type="text" name="nameserver2" id="nameserver2" value="ns2.webqomhosting1.com">
                    </div>

                    <div class="one_third last">
                        <label><b>Nameserver3</b></label>
                        <input type="text" name="nameserver3" id="nameserver3">
                    </div>

                    <div class="one_third">
                        <label><b>Nameserver4</b></label>
                        <input type="text" name="nameserver4" id="nameserver4">
                    </div>

                    <div class="one_third">
                        <label><b>Nameserver5</b></label>
                        <input type="text" name="nameserver5" id="nameserver5">
                    </div>
                </form>
            </div><!-- end cforms-->




            <div class="clearfix"></div>
            <div class="divider_line7"></div>
            <div class="clearfix"></div>
            <div class="alicent">
                <a href="shopping_cart_login.html" class="btn btn-danger caps"><i class="fa fa-arrow-circle-right"></i> <b>Continue</b></a>&nbsp;
            </div>


        </div><!-- end section -->



    </div>
</div><!-- end content fullwidth -->


<div class="clearfix"></div>
<div class="container feature_section107"><br /><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>

@endsection