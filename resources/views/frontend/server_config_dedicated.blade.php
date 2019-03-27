@extends('layouts.frontend_layout')
@section('title','Home | - Webqom Technologies')
@section('content')

<div class="clearfix"></div>

<div class="site_wrapper">

<div class="top_nav">
<div class="container">
        
    <div class="left">
          
    </div><!-- end left -->
    
    <div class="right">
    
        <a href="#" class="tpbut two"><i class="fa fa-cart-plus"></i>&nbsp; 0</a>
        <a href="registration.html" class="tpbut three"><i class="fa fa-edit"></i>&nbsp; FREE Sign Up</a>
        <a href="login.html" class="tpbut"><i class="fa fa-user"></i>&nbsp; Login</a> 
        
        
        <ul class="tplinks">
            <li><a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/site-icon2.png" alt="Live Chat" /> Live Chat</a></li>
            <li><a href="support.html"><img src="{{url('').'/resources/assets/frontend/'}}images/site-icon3.png" alt="Support" /> Support</a></li>
        </ul>
             
    </div><!-- end right -->
        
</div>
</div><!-- end top navigation links -->


<div class="clearfix"></div>


<header class="header">
 
	<div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="index.html" id="logo"></a></div>
		
	<!-- Navigation Menu -->
    <div class="menu_main">
    
      <div class="navbar yamm navbar-default">
        
          <div class="navbar-header">
            <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  >
              <button type="button" > <i class="fa fa-bars"></i></button>
            </div>
          </div>
          
          {{-- <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
          
            <nav>
            
              <ul class="nav navbar-nav">
              
               
                
                <li class="dropdown yamm-fw"><a href="#" class="dropdown-toggle">Hosting</a>
                    <ul class="dropdown-menu">
                    <li> 
                    <div class="yamm-content">
                      <div class="row">
                                          
                     	<div class="mega-menu-contnew">
                        
                        	<div class="section-box">
                            
                            	<a href="cloud_hosting.html"><i class="fa fa-cloud"></i> <strong>Cloud Hosting</strong> Powerful performance, &amp; control</a>
                                <p class="clearfix margin_bottom2"></p>
                                
                                <a href="co-location_hosting.html"><i class="fa fa-database"></i> <strong>Co-location Hosting</strong> Powerful performance, &amp; control</a>
                                <p class="clearfix margin_bottom2"></p>
                                
                                <a href="dedicated_servers.html"><i class="fa fa-server"></i> <strong>Dedicated Servers</strong> Powerful performance, &amp; control</a>
                                <p class="clearfix margin_bottom2"></p>
                                      
							</div><!-- -->
                            
                            <div class="section-box">
                            
                            	<a href="reseller_hosting.html"><span aria-hidden="true" class="icon-like"></span> <strong>Reseller Hosting</strong> Earn money with reseller hosting</a>
                                <p class="clearfix margin_bottom2"></p>
                                
                                <a href="shared_hosting.html"><span aria-hidden="true" class="icon-users"></span> <strong>Shared Hosting</strong> Easy &amp; affordable web hosting</a>
                            	<p class="clearfix margin_bottom2"></p>
                            	<a href="vps_hosting.html"><span aria-hidden="true" class="icon-layers"></span> <strong>VPS Hosting</strong> Power at the right price with VPS</a>
                                <p class="clearfix margin_bottom2"></p>
							</div><!-- -->
                            
                            <ul class="col-sm-6 col-md-3 last list-unstyled">
                                <li>
                                     <div class="menu-sepbox">
                                        
                                        
                                        <div id="owl-demo11" class="owl-carousel">
                                        
                                            <a href="#"><img src="images/menu/img_hosting1.jpg" alt="" /></a> 
                                            <a href="#"><img src="images/menu/img_hosting2.jpg" alt="" /></a>
                                            <a href="#"><img src="images/menu/img_hosting3.jpg" alt="" /></a>
                                            <a href="#"><img src="images/menu/img_hosting4.jpg" alt="" /></a>
                                            <a href="#"><img src="images/menu/img_hosting5.jpg" alt="" /></a>
                                            <a href="#"><img src="images/menu/img_hosting6.jpg" alt="" /></a>
                                            <a href="#"><img src="images/menu/img_hosting7.jpg" alt="" /></a>
                                        </div>
                                        
                                    </div>  
                                </li>
                            </ul>
                            
						</div>
                        
					</div>
                    </div>
                    </li>
                    </ul>
                </li>
 
                <li class="dropdown yamm-fw"><a href="#" class="dropdown-toggle">Applications</a>
                    <ul class="dropdown-menu">
                    <li> 
                    <div class="yamm-content">
                      <div class="row">
                                          
                     	<div class="mega-menu-contnew">
                        
                        	<div class="section-box">
                            
                            	<a href="ecommerce.html"><span aria-hidden="true" class="icon-basket-loaded"></span> <strong>E-commerce Packages</strong> Limitless online retailing</a>
                                
                            	<p class="clearfix margin_bottom2"></p>
                                
                                <a href="package_p.html"><span aria-hidden="true" class="icon-bulb"></span> <strong>Package P</strong> Driving business differentiation</a>
                                
                                <p class="clearfix margin_bottom2"></p>
                                
                                <a href="web88.html"><i class="fa fa-laptop"></i> <strong>Web88 CMS</strong> Flexible platform that supports all</a>
                                <p class="clearfix margin_bottom2"></p>
                                
							</div><!-- -->
                            
                            <div class="section-box">
                            
                            	<a href="mobile_web_applications.html"><span aria-hidden="true" class="icon-screen-smartphone"></span> <strong>Mobile &amp; Web Apps</strong> Scalable, integrated &amp; innovative</a>
                                
                            	<p class="clearfix margin_bottom2"></p>
                                
                                <a href="social_media.html"><span aria-hidden="true" class="icon-social-facebook"></span> <strong>Social Media</strong> Grow your online presence</a>
                                
                                <p class="clearfix margin_bottom2"></p>
                                
                                <a href="responsive_web_design.html"><i class="fa fa-desktop"></i> <strong>Responsive Web Design</strong> First impressions last</a>
                                <p class="clearfix margin_bottom2"></p>
                                
							</div><!-- -->
                             
                            
                            <ul class="col-sm-6 col-md-3 last list-unstyled">
                                <li>
                                     <div class="menu-sepbox">
                                        
                                        
                                        <div id="owl-demo12" class="owl-carousel">
                                        
                                            <a href="#"><img src="images/menu/img_ir.jpg" alt="" /></a>
                                            
                                            <a href="#"><img src="images/menu/img_rwd.jpg" alt="" /></a>
                                            
                                            <a href="#"><img src="images/menu/img_services1.jpg" alt="" /></a>
                                            
                                            <a href="#"><img src="images/menu/img_services2.jpg" alt="" /></a>
                                            
                                        </div>
                                        
                                    </div>  
                                </li>
                            </ul>
                            
						</div>
                        
					</div>
                    </div>
                    </li>
                    </ul>
                </li>
                
                <li><a href="domains.html" class="dropdown-toggle">Domains</a></li>
                
                <li><a href="ssl.html" class="dropdown-toggle">SSL Certificates</a></li>
                
                <li class="dropdown yamm-fw"><a href="#" class="dropdown-toggle">Online Marketing</a>
                    <ul class="dropdown-menu">
                    <li> 
                    <div class="yamm-content">
                      <div class="row">
                                          
                     	<div class="mega-menu-contnew">
                        
                        	<div class="section-box">
                            
                            	<a href="email88.html"><i class="fa fa-send-o"></i> <strong>Email Marketing (Email88)</strong> Smarter sending starts here</a>
                                <p class="clearfix margin_bottom2"></p>
                                
                                <a href="seo88.html"><span aria-hidden="true" class="icon-magnifier"></span> <strong>SEO (SEO88)</strong> Next generation marketing</a>
                                
                                <p class="clearfix margin_bottom2"></p>
      
							</div><!-- -->
                            
                            <ul class="col-sm-6 col-md-3 list-unstyled">
                                <li>
                                     <div class="menu-sepbox">

                                        <div id="owl-demo13" class="owl-carousel">
                                        
                                            <a href="email88.html"><img src="images/menu/img_email88.jpg" alt="" /></a>
                                            
                                        </div>
                                       
                                        
                                    </div>  
                                </li>
                            </ul>
                            
                            <ul class="col-sm-6 col-md-3 last list-unstyled">
                                <li>
                                     <div class="menu-sepbox">
   
                                        <div id="owl-demo14" class="owl-carousel">
                                        
											<a href="seo88.html"><img src="images/menu/img_seo.jpg" alt="" /></a>
                                            
                                        </div>
                                        
                                    </div>  
                                </li>
                            </ul>

						</div>
                        <!-- end mega menu -->
                        
                        
                        
                        
                        
					</div>
                    </div>
                    </li>
                    </ul>
                </li>
                               
                <li>
                	<a href="#menu" class="menu-link lessp"><span>toggle menu</span></a>
                    <div id="menu" class="panel">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about_us.html">About Us</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="business_partner.html">Business Partner</a></li>
                            <li><a href="careers.html">Careers</a></li>
                            <li><a href="data_center.html">Data Center</a></li>
                            <li><a href="contact_us.html">Contact Us</a></li>
                        </ul>
                    
                        <div class="sidesocial">
                            <div class="facebook"><a href="http://www.facebook.com/webqomtechnologies"><i class="fa fa-facebook"></i></a></div>
                            <div class="twitter"><a href="https://twitter.com/webqom"><i class="fa fa-twitter"></i></a></div>
                            <div class="youtube"><a href="https://www.youtube.com/user/Webqom"><i class="fa fa-youtube-play"></i></a></div>
                        </div>
                    </div>
                </li>
                
              </ul>
              
            </nav>
            
          </div>  --}}
        
      </div>
    </div>
	<!-- end Navigation Menu -->
    
    
	</div>
    
</header>


<div class="clearfix"></div>


<div class="page_title1 sty9">
<div class="container">

	<h1>Order</h1>
    <div class="pagenation">&nbsp;<a href="index.html">Home</a> <i>/</i> <a href="dedicated_servers.html">Dedicated Servers</a> <i>/</i> Configure Your Server</div>
    <div class="clearfix"></div>
 
</div>	    
</div><!-- end page title -->

<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

 <div class="one_full stcode_title9">
 	<h1 class="caps"><strong>Configure Your Server</strong></h1>
 </div>

<div class="clearfix"></div>

<div class="content_fullwidth">
	<div class="container">
        
        <div class="two_third_less">
        @foreach($plans as $plan)
           <div class="one_half_less last">
           	  	<h4>{{ $plan->title }}</h4>
           		<div>
                	<input type="radio" name="{{ $plan->details->description }}" value="{{ $plan->details->description }}"> {{ $plan->details->description }}
                    <div class="clearfix"></div>
                </div>
           </div>
           <div class="divider_line7"></div>
        @endforeach
        </div>
        <div class="one_third_less last">
          	 <div class="alertymes7">
                 <h2 class="aliright">Order Summary</h2>
                 <div class="divider_line"></div>
                 <div class="clearfix margin_bottom1"></div>
                 <h4>Your Dedicated Server Plan:</h4>
                 <div class="text-16px light sitecolor caps">Enterprise 1</div>
                 <div class="clearfix margin_bottom1"></div>
                 
                 <h4>Service Code:</h4> 
                 <div class="text-16px light sitecolor caps">DS1x4-4-2x1TB</div>
                 <div class="clearfix margin_bottom1"></div>
                 
                 <h4>Your Configuration:</h4>
                 <ul>
                 	<li><i class="fa icon-arrow-right"></i> CPU: 1 x 4-cores Intel Xeon</li>
                    <li><i class="fa icon-arrow-right"></i> No. of Processors: 1 processor</li>
                    <li><i class="fa icon-arrow-right"></i> RAM: 4GB</li>
                    <li><i class="fa icon-arrow-right"></i> Hard Disk: 2 x 1TB SATA</li>
					<li><i class="fa icon-arrow-right"></i> No. of IP addresses (IPv4): 1 x IPv4 Address</li>
                    <li><i class="fa icon-arrow-right"></i> Bandwidth: 10Mbps</li>
                    <li><i class="fa icon-arrow-right"></i> Control Panel: Webmin</li>
                    <li><i class="fa icon-arrow-right"></i> Fully Managed Server (Optional): Complete Management</li>
                 </ul>
                 <div class="pull-left caps"><b>Subtotal</b></div>
                 <div class="pull-right"><b>RM 6,588.00</b></div>
                 <div class="clearfix"></div>
                 <div class="pull-left caps"><b>Initial Setup</b></div>
                 <div class="pull-right"><b>RM 0.00</b></div>
                 <div class="clearfix"></div>
                 <div class="divider_line"></div>

                 <div class="clearfix margin_bottom2"></div>
                 <h2 class="red aliright" style="margin-bottom: 0px;"><b>RM 6,588.00</b></h2><span class="pull-right red caps aliright">Total</span>
                 <div class="clearfix margin_bottom2"></div>
                 <a href="{{ route('domainConfig') }}" class="btn btn-lg btn-danger caps pull-right"><i class="fa fa-lg fa-arrow-circle-right"></i> <b>Continue</b></a>
                 
			 </div> 
          </div><!-- end one half less last -->
    
    

    </div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>


<div class="clearfix"></div>





</div>

    
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
</body>
</html>
