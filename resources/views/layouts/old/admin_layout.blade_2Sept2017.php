<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
  .red_error{
    color:#ef0f0a;
  }

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
<title>@yield('title')</title>
<?php $user = Auth::user(); ?>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{url('').'/resources/assets/admin/'}}images/icons/favicon.ico" rel="shortcut icon">
    <link href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic%7CPT+Gudea:400,700,400italic%7CPT+Oswald:400,700,300" rel="stylesheet" id="googlefont">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    
 <!--Loading bootstrap css-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap/css/bootstrap.min.css">
    
<!--LOADING SCRIPTS FOR PAGE-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/css/datepicker.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/css/bootstrap-switch.css">
    
    <!--Loading style vendors-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/animate.css/animate.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-pace/pace.css">

<!--Loading style-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style.css">  
<!--<link type="text/css" rel="stylesheet" href="css/style.css">-->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style-mango.css" id="theme-style">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/vendors.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/themes/grey.css" id="color-style">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style-responsive.css">

</head>
<body>
<div>
<?php $pic=url('').'/resources/assets/admin/images/profile/image_hock.jpg';
if($user->profile_pic!=''){
    $pic=$user->profile_pic;
  } ?>
<!--BEGIN TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
  <div id="wrapper"><!--BEGIN TOPBAR-->
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" class="navbar navbar-default navbar-static-top">
          <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <a id="logo" href="{{url('/')}}" target="_blank" class="navbar-brand"><img src="{{url('').'/resources/assets/admin/'}}images/logo_web88.png"></a>          </div>
            
            	<div class="topbar-main">
                	<a id="logo" href="#" class="navbar-brand"><img src="{{url('').'/resources/assets/admin/'}}images/logo.jpg"></a>
                    <a id="menu-toggle" href="#" class="btn hidden-xs"><i class="fa fa-bars"></i></a>
                    
                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control"/></div>
                </form>
                <ul class="nav navbar-top-links navbar-right">
                    <li><a data-toggle="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-shopping-cart fa-fw"></i><span class="badge badge-blue">3</span></a></li> 
                    <li class="dropdown"><a data-toggle="dropdown" href="#" id="profile_pic_dd" class="dropdown-toggle"><img src="{{$pic}}" alt="" class="img-responsive img-circle"/>&nbsp;
                        {{$user->name}}
                        &nbsp;<span class="caret"></span></a>
          <ul class="dropdown-menu dropdown-user pull-right animated bounceInLeft">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5">
                                        
                                        <img src="{{$pic}}" id="profile_pic_ee" alt="" class="img-responsive img-circle"/>

                                            <p class="text-center mtm">
                                            	<a href="#" data-target="#modal-change-avatar" data-toggle="modal" class="change-avatar">
                                                <small>Change Avatar</small> 
                                                                                               </a></p>
                                      </div>
                                        <div class="col-md-7 col-xs-5"><span>Support Webqom</span>

                                            <p class="text-muted small">support@webqom.com</p>

                                            <div class="divider"></div>
                                            <!--<a href="#" class="btn btn-primary btn-sm">View Profile</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-sm" data-target="#modal-change-password" data-toggle="modal">Change Password</a></div>
                                            <div class="col-md-6 col-xs-6">
                                              
                                              <a href="{{url('web88/admin/logout')}}"  class="btn btn-default btn-sm pull-right">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                      </ul>
                  </li>
                </ul>
          </div>
        </nav>
        <!--Modal Change Avatar start-->
                            <div id="modal-change-avatar" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">Change Avatar</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form">
                                        <div id="admin_profile_pic_err" hidden="" class="alert alert-danger alert-dismissable">
                                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                                            <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                                            <div id="admin_profile_pic_err_text"></div>
                                          </div>
                                          <div id="admin_profile_pic_success" hidden="" class="alert alert-success alert-dismissable">
                                                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                                                    <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                                                    <div id="admin_profile_pic_success_text"></div>
                                        </div>
                                        <div id="progress_upload_div" hidden="" data-hover="tooltip" data-placement="top"  class="progress progress-striped active">
                                                  <div id="progress_bar_upload"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" class=" ">
                                                      <span class="sr-only" ></span>
                                                      <span class="progress-completed" id="progress_bar_upload_text"></span>
                                                  </div>
                                        </div>
                                        
                                              
                                        <div class="form-group">
                                          <label class="col-md-4 control-label">Upload Avatar Image </label>
                                          
                                          <div class="col-md-8">
                                          <form id="frm_change_pic">
                                            
                                            <input type="hidden" value="{{$user->id}}" name="id">
                                            <input type="hidden" class="csrf"  name="_token">
                                            <div class="text-15px margin-top-10px"> 
                                            	<img id="profile_pic_popup" width="100px" 
                                              src="{{$pic}}" alt="Avatar" class="img-responsive"><br/>
                                                <input id="browse_image" name="image_file" type="file"/>
                                              <br/>
                                                <span class="help-block">(Image dimension: 100 x 100 pixels, JPEG/GIF/PNG only, Max. 2MB) </span>
                                                 </div>
                                            </form>
                                          </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                          <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" id="submit_frm_change_pic" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                        </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <!--END MODAL Change Avatar-->
        
        <!--Modal Change Password start-->
                <div id="modal-change-password" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Change Password</h4></div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal" id="frm_change_password">
                                        <div  id="msg_success_cp" style="display:none" class="alert alert-success alert-dismissable">
                                          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                                          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                                          <p>Account password updated successfully</p>
                                      </div>
                                        {{csrf_field()}}
                                        <div class="form-group">
                                          <label for="password" class="control-label col-md-4">Current Password</label>

                                            <div class="col-md-8">
                                              <div class="input-icon"><i class="fa fa-key"></i> <input id="current_password" name="current_password" type="password"  placeholder="Current Password" class="form-control"/>
                                              <div class="red_error" id="err_current_password"></div>                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        	<label for="password" class="control-label col-md-4">New Password</label>

                                            <div class="col-md-8">
                                            	<div class="input-icon"><i class="fa fa-key"></i> <input id="password" name="password" type="password" placeholder="New Password" class="form-control"/>
                                              <p class="dark">Password must be at least 12 characters. The combination of the password must be alphanumeric with one special character <span class="sitecolor">(eg. ! @ # $ % ^ & * ( ) _ + { } | : < > ? " \ [ ] ' ; / . ~ `)</span></p>
                                              <div class="red_error" id="err_new_password"></div>                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                          <label for="password" class="control-label col-md-4">Password Strength</label>

                                            <div class="col-md-8">
                                              
                                              <input type="hidden" name="strength" value="strength" id="strength">
                                            <div class="pro_bar">
                                              <div class="col-md-6">
                                                <div data-hover="tooltip" data-placement="top"  class="progress progress-striped active">
                                                  <div id="progress_bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" class=" ">
                                                      <span class="sr-only" ></span>
                                                      <span class="progress-completed" id="progress_bar_text"></span>
                                                  </div>
                                                </div>
                                              </div>
                                              
                                          </div>
                                            </div>

                                        </div>

                                        
                                        <div class="form-group">
                                        	<label for="password" class="control-label col-md-4">Confirm New Password</label>

                                            <div class="col-md-8">
                                            	<div class="input-icon"><i class="fa fa-key"></i> <input id="confirm_password" name="password_confirmation" type="password" placeholder="Confirm New Password" class="form-control"/><span class="text-10px">(Password length should atleast be 12 characters)</span>  
                                              <div class="red_error" id="err_confirm_password"></div>                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8">
                                               <a href="javascript:void(0)" id="submit_frm_chnage_pass" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                              <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--END MODAL CHANGE PASSWORD-->
        <!--END TOPBAR-->
        
        <!--BEGIN SIDEBAR MENU-->
        <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    <li class="clock"><strong id="get-date"></strong>

                        <div class="digital-clock">
                            <div id="getHours" class="get-time"></div>
                            <span>:</span>

                            <div id="getMinutes" class="get-time"></div>
                            <span>:</span>

                            <div id="getSeconds" class="get-time"></div>
                        </div>
                    </li>
                    <li @if(isset($page) && $page=='dashboard') class="active" @endif><a href="{{url('/web88/admin')}}"><i class="fa fa-laptop fa-fw"></i><span class="menu-title">Dashboard</span></a></li>
                    <li class="sidebar-heading"><h4>Clients</h4></li>
                    
                    <li @if(isset($page) && $page=='clients') class="active" @endif><a href="{{url('/clients/listing')}}"><i class="fa fa-user fa-fw"></i><span class="menu-title">Clients Listing</span></a></li>
                    <li class="sidebar-heading"><h4>Billing</h4></li>
                    
                  <li><a href="billing_invoices_list.html"><i class="fa fa-list fa-fw"></i><span class="menu-title">Invoices Listing</span></a></li>
                  <li><a href="billing_invoice_new.html"><i class="fa fa-plus fa-fw"></i><span class="menu-title">Add New Invoice</span></a></li>
                  <li><a href="billing_receipts_list.html"><i class="fa fa-file fa-fw"></i><span class="menu-title">Receipts Listing</span></a></li>
                  <li><a href="billing_quotes_list.html"><i class="fa fa-list-alt fa-fw"></i><span class="menu-title">Quotes Listing</span></a></li>
                  <li><a href="billing_quote_new.html"><i class="fa fa-plus fa-fw"></i><span class="menu-title">Add New Quote</span></a></li>
                    
                    <li class="sidebar-heading"><h4>Orders</h4></li>
                    <li><a href="orders_list.html"><i class="fa fa-shopping-cart fa-fw"></i><span class="menu-title">Orders</span><span class="badge badge-blue">3</span></a></li>
                    

                    <li class="sidebar-heading"><h4>Services</h4></li>
                    <li  @if(isset($page) && $page=='categories') class="active" @endif><a href="{{url('/admin/categories')}}"><i class="fa fa-cog fa-fw"></i><span class="menu-title">Categories</span></a> </li>
                    <li  @if(isset($page) && $page=='domains') class="active" @endif >
                        <a href="#"><i class="fa fa-globe fa-fw"></i>
                            <span class="menu-title">Domains</span>
                            <span class="fa arrow"></span>
                        </a>
                      <ul class="nav nav-second-level">
                          <li @if(isset($sub_page) && $sub_page=='single_domain') class="active" @endif>
                              <a href="{{url('/admin/domain_pricing')}}">Single Domain Pricing List</a>
                          </li>
						  <li>
                              <a href="bulk_domain_prices_list.html">Bulk Domain Pricing List</a>
                          </li>
                          <li  @if(isset($sub_page) && $sub_page=='domain_addons') class="active" @endif>
                              <a href="{{url('/admin/domain_pricing/addons')}}">Domain Addons Pricing List</a>
                          </li>
                      </ul>
                  	</li> 
                    <li><a href="client_schedule_notification_list.html"><i class="fa fa-bullhorn fa-fw"></i><span class="menu-title">Client Schedule Notification</span></a></li> 
					<li><a href="services_enquiry_list.html"><i class="fa fa-info-circle fa-fw"></i><span class="menu-title">Services Enquiry Listing</span></a></li>
                    
                    
                    <li class="sidebar-heading"><h4>Promotions</h4></li>
                    <li><a href="global_discounts_list.html"><i class="fa fa-cog fa-fw"></i><span class="menu-title">Global Discounts</span></a> </li>
					<li><a href="promo_codes_list.html"><i class="fa fa-qrcode fa-fw"></i><span class="menu-title">Promo Codes</span></a></li>
                  	<li><a href="newsletter_subscription_list.html"><i class="fa fa-envelope fa-fw"></i><span class="menu-title">Newsletter Subscription</span></a> </li>
                    
                    <li class="sidebar-heading"><h4>Support</h4></li>
                    <li><a href="support_tickets_list.html"><i class="fa fa-wrench fa-fw"></i><span class="menu-title">Support Tickets/Service Enquiy/Ask For Quote Listing</span></a></li>
                    
                    <li class="sidebar-heading"><h4>Banners</h4></li>
                    <li><a href="index_banner_list.html"><i class="fa fa-check-circle fa-fw"></i><span class="menu-title">Index Banners</span></a></li>
                  
                    <li class="sidebar-heading"><h4>CMS Pages</h4></li>
                    <li><a href="blog_articles_list.html"><i class="fa fa-check-circle fa-fw"></i><span class="menu-title">Blog</span></a></li>
                    <li><a href="#"><i class="fa fa-globe fa-fw"></i><span class="menu-title">Domains</span><span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                          <li><a href="domains_edit.html">Domains Main Page</a></li>
						  <li><a href="single_domain_search_edit.html">Single Domain Search</a></li>
                          <li><a href="bulk_domain_search_edit.html">Bulk Domain Search</a></li>
                          <li><a href="single_domain_transfer_edit.html">Single Domain Transfer</a></li>
                          <li><a href="bulk_domain_transfer_edit.html">Bulk Domain Transfer</a></li>
                      </ul>
                  	</li>
                    
                    <li class="sidebar-heading"><h4>Global Setup</h4></li>
                    <li><a href="gst_rate_list.html"><i class="fa fa-dollar fa-fw"></i><span class="menu-title">GST Rate Setup</span></a></li>
              </ul>
          </div>
    </nav>
        <!--END SIDEBAR MENU--><!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">@yield('page_header')</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('/web88/admin')}}">Dashboard</a>&nbsp;</li>
            @if(!empty($breadcrumbs))
              @foreach($breadcrumbs as $i)
                >
                <li>
                  @if($i['url']!=false)<a href="{{$i['url']}}" ><span style="text-transform: capitalize;">{{$i['name']}}</span></a>@endif
                  @if($i['url']==false)<span style="text-transform: capitalize;">{{$i['name']}}</span>@endif
                </li>
                @endforeach
            @endif

          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
          <!-- page content here -->

           @yield('content')
           
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
            <div class="page-footer" style="height: 62px">
                <div class="copyright"><span class="text-15px">2016 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="{{url('').'/resources/assets/admin/'}}images/logo_webqom.png" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>
  <!--END PAGE WRAPPER--></div>
</div>
<script src="{{url('').'/resources/assets/admin/'}}js/jquery.js"></script>
<!-- <script src="{{url('').'/resources/assets/admin/'}}js/jquery-migrate-1.2.1.min.js"></script> -->
<script src="{{url('').'/resources/assets/admin/'}}js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/html5shiv.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/respond.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/metisMenu/jquery.metisMenu.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/slimScroll/jquery.slimscroll.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-cookie/jquery.cookie.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/jquery.menu.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-pace/pace.min.js"></script>

<!--LOADING SCRIPTS FOR PAGE-->
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-jvectormap/gdp-data.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-knob/jquery.knob.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-animateNumber/jquery.animateNumber.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.categories.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.pie.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.tooltip.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.resize.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.fillbetween.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.stack.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/flot-chart/jquery.flot.spline.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/skycons/skycons.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-news-ticker/jquery.news-ticker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/index.js"></script>

<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/moment/moment.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-clockface/js/clockface.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-maskedinput/jquery-maskedinput.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/form-components.js"></script>

<!--CORE JAVASCRIPT-->
<script src="{{url('').'/resources/assets/admin/'}}js/main.js"></script>
<script src="{{url('').'/resources/assets/admin/'}}js/holder.js"></script>

<script type="text/javascript">
  base_url='{{url("")}}';
  csrf_token='{{csrf_token()}}';
</script>
@yield('custom_scripts')
<script type="text/javascript">

    /******************************************/
    /********** Jquery Digital Clock *********/
    window.onload = function () {
        date()
    }, setInterval(function () {
        date()
    }, 1000);
    function date() {
        var dt = new Date();
        var day = dt.getDay();
        var mm, dd, h, m, s;
        mm = (mm = dt.getMonth() + 1) < 10 ? '0' + mm : mm
        dd = (dd = dt.getDate()) < 10 ? '0' + dd : dd
        h = (h = dt.getHours()) < 10 ? '0' + h : h
        m = (m = dt.getMinutes()) < 10 ? '0' + m : m
        s = (s = dt.getSeconds()) < 10 ? '0' + s : s
        var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
        $('#get-date').html(days[day] + ', ' + dd + '.' + mm + '.' + dt.getFullYear());
        $('#getHours').html(h);
        $('#getMinutes').html(m);
        $('#getSeconds').html(s);
    }

    /********** Jquery Digital Clock *********/
    /****************************************/

  $(document).on('click', '#logout', function(event) {
   
    $('#logout_form').submit();

  });
  
  $(document).on('click', '#submit_frm_change_pic', function(event) {
    $('#admin_profile_pic_err').hide();
    $('#admin_profile_pic_err_text').html('')
    $('#admin_profile_pic_success').hide();
    $('#admin_profile_pic_success_text').html('')
    $('#frm_change_pic').submit();
    


  });
  $(document).on('submit', '#frm_change_pic', function(event) {
     event.preventDefault(); 
     $('#progress_upload_div').show();
     $('.csrf').val(csrf_token);
    
      var file_data = $('input[name=image_file]')[0].files[0];
      // Getting the properties of file from file field
      var form_data = new FormData();                  // Creating object of FormData class
      form_data.append("image_file", file_data)              // Appending parameter named file with properties of file_field to form_data
      form_data.append("id", '{{$user->id}}') 
      form_data.append("_token", csrf_token) 
      $.ajax({
        url: base_url+'/profile_pic_update',
        type: 'POST',
        processData: false,
        contentType: false,
        data: form_data,
        xhr: function()
              {
                var xhr = new window.XMLHttpRequest();
                //Upload progress
                xhr.upload.addEventListener("progress", function(evt){
                  if (evt.lengthComputable) {
                    var percentComplete = parseInt((evt.loaded * 100) / evt.total);
                    
                    $('#progress_bar_upload').removeClass();
                       $('#progress_bar_upload').addClass('progress-bar progress-bar-success');
                       $('#progress_bar_upload').css('width', percentComplete+"%");
                       $('#progress_bar_upload_text').html( percentComplete+"%");
                       
                  }
                }, false);
                
                return xhr;
              }
      })
      .done(function(response) {
        $('#admin_profile_pic_success').show();
        $('#admin_profile_pic_success_text').html('<p>profile pic is updated!</p>');
        $('#profile_pic_popup').attr('src',response);
        $('#profile_pic_ee').attr('src',response);
        $('#profile_pic_dd').attr('src',response);
        $('input[name=image_file]').val('');

      })
      .fail(function(response) {
        
        $('#admin_profile_pic_err').show();
        $('#admin_profile_pic_err_text').html('<p>'+response.responseJSON.image_file+'</p>')
      })
      .always(function() {
        $('#progress_upload_div').hide();
      })
      
  });

   $(document).on('click', '#submit_frm_chnage_pass', function(event) {
            $('#frm_change_password').submit();
        }); 
  $(document).on('submit', '#frm_change_password', function(event) {
            $('#err_current_password').html("");
            $('#err_new_password').html("");
            $('#err_confirm_password').html("");
            event.preventDefault();
            $.ajax({
              url: base_url+'/change_password',
              type: 'POST',
              datatype:"JSON",
              data: $('#frm_change_password').serialize(),
            })
            .done(function() {
              $(':input','#frm_change_password')
                 .not(':button, :submit, :reset, :hidden')
                 .val('')
                 .removeAttr('checked')
                 .removeAttr('selected');   
              $('#msg_success_cp').fadeIn('slow', function() {
                  setTimeout(function() {
                    $('#msg_success_cp').fadeOut('slow')
                  }, 5000);
              });
            })
            .fail(function(response) {
              
              $('#err_current_password').html(response.responseJSON.current_password);
              $('#err_new_password').html(response.responseJSON.password);
              $('#err_confirm_password').html(response.responseJSON.confirm_password);
            })
            .always(function() {
              
            });
        });
  $(document).on('keyup change', '#password', function(event) {
                    var password = $(this).val();
                    console.log("length: "+password);

                    strenght=0;
                    if (password.length==0) {
                       strenght=0;

                       $('#progress_bar').removeClass();
                       $('#progress_bar').addClass('progress-bar progress-bar-danger');
                       $('#progress_bar').css('width', strenght+"%");
                       $('#progress_bar_text').html( strenght+"%");
                      
                    }
                    else if (password.length>0 && password.length<12) {
                       strenght=10;
                       $('#progress_bar').removeClass();
                       $('#progress_bar').addClass('progress-bar progress-bar-danger');
                       $('#progress_bar').css('width', strenght+"%");
                       $('#progress_bar_text').html( strenght+"% Week");
                      
                    }
                    else if (password.length>=12) {
                      strenght=50;
                      $('#progress_bar').removeClass();
                       $('#progress_bar').addClass('progress-bar progress-bar-warning');
                       $('#progress_bar').css('width', strenght+"%");
                       $('#progress_bar_text').html( strenght+"% Moderate");
                     
                      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){  
                          strenght=100;
                          $('#strength').val(100);
                          $('#progress_bar').removeClass();
                            $('#progress_bar').addClass('progress-bar progress-bar-success');
                            $('#progress_bar').css('width', strenght+"%");
                            $('#progress_bar_text').html( strenght+"% Strong");
                            
                      }
                    }
                    $('#strength').val(strenght);
                });

    /***********************************/
    /************ Back To Top *********/
    $(window).scroll(function () {
        if ($(this).scrollTop() < 200) {
            $('#totop').fadeOut();
        } else {
            $('#totop').fadeIn();
        }
    });
    $('#totop').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 'fast');
        return false;
    });
    /************ Back To Top *********/
    /*********************************/
    $('.make-switch').bootstrapSwitch();

</script>


</body>
</html>