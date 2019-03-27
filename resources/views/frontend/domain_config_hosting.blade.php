@extends('layouts.frontend_layout')
@section('title','Admin | Domain Configuration')
@section('content')

<div class="page_title1 sty9">
<div class="container">

	<h1>Order</h1>
    <div class="pagenation">&nbsp;<a href="index.html">Home</a> <i>/</i> <a href="shared_hosting.html">Shared Hosting</a> <i>/</i> Choose a Domain</div>
    <div class="clearfix"></div>
    note to programmer: the section "shared hosting" in breadcrumb is dynamic, it will display to the page where user selects product/plan from. eg. it could be in vps hosting, cloud hosting, responsive web design, etc...
 
</div>	    
</div><!-- end page title -->

<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

 <div class="one_full stcode_title9">
 	<h1 class="caps"><strong>Choose a Domain</strong></h1>
 </div>

<div class="clearfix"></div>

<div class="content_fullwidth">
	<div class="container">
    
        <div class="one_full_less">

            <div class="cforms alileft">
 
                <div id="form_status"></div>
                <form type="POST" id="gsr-contact" onSubmit="return valid_datas( this );">
                    
                    <h4>Please Enter Your Domain:</h4>
                    <div class="radiobut">
                       <input type="radio" checked="checked"> <span class="onelb">I want to register a new domain</span>
                       <div class="clearfix"></div>
                       <input type="radio"><span class="onelb"> I already have a domain</span>
                    </div>
                    <div class="clearfix"></div>
                    
                     note to programmer: if user selects "I want to register a new domain", please display the "check availability" button and hide the "continue" button next to it. And display the search result below. If user selects "I already have a domain", please hide the "check availability" button and display the "continue button" next to it. Hide the below search result information.
                    
                    <div class="one_full_less">
                        <input type="text" name="domain" id="domain" placeholder="eg. yourdomain.com">
                        <div class="alicent">
                            <a href="#when clicked, display results in below tables" class="btn btn-danger caps"><i class="fa fa-lg fa-spinner"></i> <b>Check Availability</b></a>&nbsp;
                            <a href="shopping_cart.html" class="btn btn-danger caps"><i class="fa fa-arrow-circle-right"></i> <b>Continue</b></a>&nbsp;
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="divider_line7"></div>
                    <div class="clearfix"></div>
                    
                    <div class="alertymes4">
                        <h3 class="light"><i class="fa fa-times-circle"></i>Sorry! <strong>webqom.com</strong> is already taken!</strong></h3>
                    </div><!-- end section -->
                    <div class="clearfix margin_bottom3"></div>
                    
                    
                   <div>You might also be interested in the following alternative names...</div>
                   <div class="clearfix margin_bottom1"></div>
                   <div class="table-responsive">
                              
                        <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th width="1%"><input type="checkbox"/></th>
                                    <th>Domain Name</th>
                                    <th>Status</th>
                                    <th>More Info</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <td class="alicent"><i class="fa fa-times red"></i></td>
                                    <td>webqom.com</td>
                                    <td><span class="label label-sm label-red">Unavailable</span></td>
                                    <td><a href="http://webqom.com" target="_blank">WWW</a> | <a href="whois.html">WHOIS</a></td>
                                  </tr>
                                  <tr>
                                    <td class="alicent"><input type="checkbox"/></td>
                                    <td>webqom.net</td>
                                    <td><span class="label label-sm label-success">Available</span></td>
                                    <td>
                                        <select class="form-control input-medium">
                                            <option value="1 year" selected="selected">1 year(s) @ RM 38.00</option>
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
                                  </tr>
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="4"></td>
                                  </tr>
                                </tfoot>
                              </table>
                        
                        <div class="clearfix"></div>
                                 
                    </div><!-- end table responsive -->
                    
                    
                   <div class="alertymes5">
                        <h3 class="light"><i class="fa fa-check-circle"></i>Congratulations! <strong>webqom.co</strong> is available!</h3>
                   </div><!-- end section -->
                   <div class="clearfix margin_bottom3"></div> 
                   <div class="table-responsive">
                              
                        <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                    <th width="1%"><input type="checkbox"/></th>
                                    <th>Domain Name</th>
                                    <th>Status</th>
                                    <th>More Info</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                                  <tr>
                                    <td class="alicent"><input type="checkbox" checked="checked"/></td>
                                    <td>webqom.co</td>
                                    <td><span class="label label-sm label-success">Available</span></td>
                                    <td>
                                        <select class="form-control input-medium">
                                            <option value="1 year" selected="selected">1 year(s) @ RM 38.00</option>
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
                                  </tr>
                                  
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="4"></td>
                                  </tr>
                                </tfoot>
                              </table>
                        
                        <div class="clearfix"></div>
                                 
                    </div><!-- end table responsive -->

                    
                </form>
           </div>
            
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           <div class="clearfix"></div>
           <div class="alicent">
                <a href="shopping_cart.html" class="btn btn-danger caps"><i class="fa fa-arrow-circle-right"></i> <b>Continue</b></a>&nbsp;
            </div>
            
            
        </div><!-- end section -->
    
    

    </div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>
</body>

<div class="clearfix"></div>
<!-- ######### JS FILES ######### -->
<!-- get jQuery used for the theme -->
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/universal/jquery.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/universal/jquery.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/animations/js/animations.min.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/bootstrap.min.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/customeUI.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/masterslider/jquery.easing.min.js" />

<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/scrolltotop/totop.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/sticky.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/modernizr.custom.75180.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cubeportfolio/jquery.cubeportfolio.min.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cubeportfolio/main.js" />

<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/aninum/jquery.animateNumber.min.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.js" />

<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/accordion/jquery.accordion.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/accordion/custom.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cform/form-validate.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/universal/custom.js" />
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/sidemenu/menuFullpage.min.js" />
<script>
	smoothScroll.init();
	$(document).ready(function() {
			$('.menu-link').menuFullpage();
	});
</script>

<script>
(function($) {
 "use strict";

    $('.accordion, .tabs').TabsAccordion({
        hashWatch: true,
        pauseMedia: true,
        responsiveSwitch: 'tablist',
        saveState: sessionStorage,
    });

})(jQuery);
</script>
@endsection