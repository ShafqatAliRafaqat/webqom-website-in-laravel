

        <!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]--><head>
    <title>@yield('title')</title>
    <?php $user=Auth::user(); ?>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="web hosting, domain names, web site, search engine optimization, hosting, servers">
    <meta name="description" content="" />

    
    <!-- Favicon --> 
    <link rel="shortcut icon" href="{{url('').'/resources/assets/frontend/'}}images/favicon.png">
    
    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dancing+Script:400,700' rel='stylesheet' type='text/css'>
    
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!-- ######### CSS STYLES ######### -->
    
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}css/reset.css" type="text/css" />
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}css/style.css" type="text/css" />
    
    <!-- font awesome icons -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/tabs/assets/css/responsive-tabs.css">
    <!-- simple line icons -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}css/simpleline-icons/simple-line-icons.css" media="screen" />
        
    <!-- animations -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/animations/css/animations.min.css" rel="stylesheet" type="text/css" media="all" />
    
    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="{{url('').'/resources/assets/frontend/'}}css/responsive-leyouts.css" type="text/css" />
    
    <!-- shortcodes -->
    <link rel="stylesheet" media="screen" href="{{url('').'/resources/assets/frontend/'}}css/shortcodes.css" type="text/css" /> 

  
    <!-- mega menu -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/mainmenu/demo.css" rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/mainmenu/menu.css" rel="stylesheet">
    
    <!-- side menu -->
    <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/sidemenu/style.css">
    

    <style type="text/css">
        .select_height{
                height: 39px;
        }
    </style>
    
</head>

<body>
<style type="text/css">
   
#overlay { 
display: none;  
opacity:    0.5; 
  background: #000; 
  width:      100%;
  height:     100%; 
  z-index:    10;
  top:        0; 
  left:       0; 
  position:   fixed; 
}
#img-load {
    width: 50px;
    height: 57px;
    position: absolute;
    top: 50%;
    left: 50%;
    margin: -28px 0 0 -25px;
}
</style>
<div id="overlay">
  <img src="{{url('').'/resources/assets/frontend/images/loading.svg'}}" 
    id="img-load" />
</div>
<div class="site_wrapper">

<div class="top_nav">
<div class="container">
        
    <div class="left">
        
    <!--<div class="select-style">
      <select>
        <option value="language">Language</option>
        <option value="english">English</option>
      </select>
    </div>-->
          
    </div><!-- end left -->
    
    <div class="right">
    <?php $pic=url('').'/resources/assets/admin/images/profile/image_hock.jpg'; ?>
        <a href="#" class="tpbut two"><i class="fa fa-cart-plus"></i>&nbsp; 0</a>
        @if(!$user)
        <a href="{{url('/register')}}" class="tpbut three"><i class="fa fa-edit"></i>&nbsp; FREE Sign Up</a>
        <a href="{{url('/login')}}" class="tpbut"><i class="fa fa-user"></i>&nbsp; Login</a>
        @else
        <?php $pic=url('').'/resources/assets/admin/images/profile/image_hock.jpg';
        if($user->profile_pic!=''){
            $pic=$user->profile_pic;
          } ?>
        <a href="javascript:void(0)" id="logout" class="tpbut"><img src="{{url('').'/resources/assets/admin/images/profile/image_hock.jpg'}}">  {{$user->client->first_name or "Admin"}}, Logout</a> 
        @endif
        
        <ul class="tplinks">
            <li><a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/site-icon2.png" alt="Live Chat" /> Live Chat</a></li>
            <li><a href="support.html"><img src="{{url('').'/resources/assets/frontend/'}}images/site-icon3.png" alt="Support" /> Support</a></li>
        </ul>
             
    </div><!-- end right -->
        
</div>
</div><!-- end top navigation links -->
<?php if (Route::getCurrentRoute()->getPath()!="/") { ?>
<div class="clearfix">
  <div class="page_title1 sty9">
    <div class="container">
       <h1>@yield('page_header')</h1>
    <div class="pagenation">&nbsp;<a href="{{url('')}}">Home</a> <i>/</i> @yield('breadcrumbs')</div>
    </div>
    
  </div>
</div>
<?php } ?>
<div class="clearfix"></div>


<header class="header">
 
    <div class="container">
    
    <!-- Logo -->
    <div class="logo"><a href="{{url('/')}}" id="logo"></a></div>
        
    <!-- Navigation Menu -->
    <div class="menu_main">
    
      <div class="navbar yamm navbar-default">
        
          <div class="navbar-header">
            <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  >
              <button type="button" > <i class="fa fa-bars"></i></button>
            </div>
          </div>
          
          <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
          
            <nav>
            
              <ul class="nav navbar-nav">
              
               
                @if(!empty($categories))
                @foreach($categories as $i)
                <li class="dropdown yamm-fw"><a href="#" class="dropdown-toggle">{{$i->title}}</a>
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
                                        
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting1.jpg" alt="" /></a> 
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting2.jpg" alt="" /></a>
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting3.jpg" alt="" /></a>
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting4.jpg" alt="" /></a>
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting5.jpg" alt="" /></a>
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting6.jpg" alt="" /></a>
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_hosting7.jpg" alt="" /></a>
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
                @endforeach
                @endif
 
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
                                        
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_ir.jpg" alt="" /></a>
                                            
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_rwd.jpg" alt="" /></a>
                                            
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_services1.jpg" alt="" /></a>
                                            
                                            <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_services2.jpg" alt="" /></a>
                                            
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
                                        
                                            <a href="email88.html"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_email88.jpg" alt="" /></a>
                                            
                                        </div>
                                       
                                        
                                    </div>  
                                </li>
                            </ul>
                            
                            <ul class="col-sm-6 col-md-3 last list-unstyled">
                                <li>
                                     <div class="menu-sepbox">
   
                                        <div id="owl-demo14" class="owl-carousel">
                                        
                                            <a href="seo88.html"><img src="{{url('').'/resources/assets/frontend/'}}images/menu/img_seo.jpg" alt="" /></a>
                                            
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
                            <li><a href="{{url('/login')}}">Login</a></li>
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
            
          </div>
        
      </div>
    </div>
    <!-- end Navigation Menu -->
    
    
    </div>
    
</header>

    <!-- page contents here -->
    @yield('content')
<footer>

<div class="footer">

<div class="ftop">
<div class="container">

    <div class="left">
        <h4 class="caps light"><strong>Need Help?</strong> Chat with us:</h4>
        <h1 class="caps"><a href="#">Live Chat <i class="fa fa-comments-o"></i></a></h1>
    </div><!-- end left -->
    
    <div class="right">
        <p>Sign up for our great deals</p>
        <form method="get" action="index.html">
            <input class="newsle_eminput" name="samplees" id="samplees" value="Please enter your email..." onFocus="if(this.value == 'Please enter your email...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Please enter your email...';}" type="text">
            <input name="" value="Sign Up" class="input_submit" type="submit">
        </form>
    </div><!-- end right -->
</div>
</div>
<!-- end top section -->

<div class="clearfix"></div>

<div class="secarea">
<div class="container">
    
    <div class="one_fifth">
        <h4 class="white">Hosting Packages</h4>
        <ul class="foolist">
            <li><a href="cloud_hosting.html">Cloud Hosting</a></li>
            <li><a href="co-location_hosting.html">Co-location Hosting</a></li>
            <li><a href="dedicated_servers.html">Dedicated Servers</a></li>
            <li><a href="reseller_hosting.html">Reseller Hosting</a></li>
            <li><a href="shared_hosting.html">Shared Hosting</a></li>
            <li><a href="vps_hosting.html">VPS Hosting</a></li>  
        </ul>
    </div><!-- end section -->
    
    <div class="one_fifth">
        <h4 class="white">Applications</h4>
        <ul class="foolist">
            <li><a href="ecommerce.html">E-commerce Packages</a></li>
            <li><a href="mobile_web_applications.html">Mobile &amp; Web Application</a></li>
            <li><a href="package_p.html">Package P</a></li>
            <li><a href="social_media.html">Social Media</a></li>
            <li><a href="responsive_web_design.html">Responsive Web Design</a></li>
            <li><a href="web88.html">Web88 CMS</a></li>
        </ul>
    </div><!-- end section -->
    
    <div class="one_fifth">
        <h4 class="white">Services</h4>
        <ul class="foolist">
            <li><a href="domains.html">Domains</a></li>
            <li><a href="email88.html">Email88</a></li>
            <li><a href="seo88.html">SEO</a></li>
            <li><a href="ssl.html">SSL Certificates</a></li>
        </ul>
    </div><!-- end section -->
    
    <div class="one_fifth">
        <h4 class="white">Business Partner</h4>
        <ul class="foolist">
            <li><a href="business_partner.html">Business Partner Program</a></li>
            <li><a href="registration.html">Sign Up Today!</a></li>
        </ul>
    </div><!-- end section -->
    
    <div class="one_fourth last aliright">
        <div class="address">
            <img src="{{url('').'/resources/assets/frontend/'}}images/index/logo_footer.png" alt="Webqom Technologies Sdn Bhd" />
            <br /><br />
            B2-2-2, Solaris Dutamas, No. 1, Jalan Dutamas 1, 50480 Kuala Lumpur, Wilayah Persekutuan, Malaysia.
            <div class="clearfix margin_bottom1"></div>
            <strong>Phone:</strong> <b>+603-2630 5562</b>
            <br />
            <strong>Mail:</strong> <a href="mailto:enquiry@webqom.com">enquiry@webqom.com</a>
            <br /><br/>
            <img src="{{url('').'/resources/assets/frontend/'}}images/payment-logos.png" alt="" />
            
        </div>
        
    </div><!-- end section -->
    
    
    <!--<div class="clearfix margin_bottom3"></div>-->
    
    <div class="one_fifth">
        <h4 class="white">Company</h4>
        <ul class="foolist">
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="careers.html">Careers</a></li>
            <li><a href="data_center.html">Data Center</a></li>
        </ul>
    </div><!-- end section -->
    
    
    <div class="one_fifth">
        <h4 class="white">Support</h4>
        <ul class="foolist">
            <li><a href="support.html">Support Center</a></li>
            <li><a href="#">Live Chat</a></li>
            <li><a href="support_open_new_ticket.html">Submit Ticket</a></li>  
        </ul>
    </div><!-- end section -->
    
    <div class="one_fifth">
        <h4 class="white">Contacts</h4>
        <ul class="foolist">
            <li><a href="contact_us.html">Contact Us</a></li>
        </ul>
    </div><!-- end section -->
    
    <div class="one_fifth">
        <h4 class="white">Follow Us</h4>
        <ul class="foosocial">
            <li class="faceboox animate" data-anim-type="zoomIn" data-anim-delay="100"><a href="http://www.facebook.com/webqomtechnologies"><i class="fa fa-facebook"></i></a></li>
            <li class="twitter animate" data-anim-type="zoomIn" data-anim-delay="150"><a href="https://twitter.com/webqom"><i class="fa fa-twitter"></i></a></li>
            <li class="youtube animate" data-anim-type="zoomIn" data-anim-delay="200"><a href="https://www.youtube.com/user/Webqom"><i class="fa fa-youtube-play"></i></a></li>
            
        </ul>
    </div><!-- end section -->
    
    <div class="one_fourth last aliright">
        <p class="clearfix margin_bottom1"></p>
        
    </div><!-- end section -->
    
</div>
</div>
    

<div class="clearfix"></div>


<div class="copyrights">
<div class="container">

    <div class="three_fourth">Copyright © 2015 Webqom Technologies Sdn Bhd (809009-A). All rights reserved. <a href="#">Sitemap</a>|<a href="#">Terms of Service</a>|<a href="#">Privacy Policy</a></div>
    <div class="one_fourth last">
        
    </div>

</div>
</div><!-- end copyrights -->

<form id="logout_form" action="{{url('/logout')}}" method="post">{{csrf_field()}} </form>
</div>

</footer><!-- end footer -->


<div class="clearfix"></div>


<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->


</div>


     
<!-- ######### JS FILES ######### -->
<!-- get jQuery used for the theme -->

<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/universal/jquery.js"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/animations/js/animations.min.js" type="text/javascript"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/bootstrap.min.js"></script> 
<script src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/customeUI.js"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/masterslider/jquery.easing.min.js"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/masterslider/masterslider.min.js"></script>
<script type="text/javascript">
(function($) {
 "use strict";
    var slider = new MasterSlider();
    // adds Arrows navigation control to the slider.
    slider.control('arrows');
    slider.control('bullets');
    
    slider.setup('masterslider' , {
         width:1400,    // slider standard width
         height:480,   // slider standard height
         space:0,
         speed:45,
         layout:'fullwidth',
         loop:true,
         preload:0,
         overPause: true,
         autoplay:true,
         view:"parallax"
    });
})(jQuery);
</script>

<script type="text/javascript">
(function($) {
 "use strict";
    var slider = new MasterSlider();
        slider.setup('masterslider2' , {
         width:1400,    // slider standard width
         height:580,   // slider standard height
         space:1,
         layout:'fullwidth',
         loop:true,
         preload:0,
         autoplay:true
    });
})(jQuery);
</script>

<script src="{{url('').'/resources/assets/frontend/'}}js/scrolltotop/totop.js" type="text/javascript"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/sticky.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/modernizr.custom.75180.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cubeportfolio/main.js"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/tabs2/index.js"></script>


<script src="{{url('').'/resources/assets/frontend/'}}js/loopslider/jquery.loopslider.js"></script>
<script>
$('#slider').loopSlider({
    autoMove : true,
    mouseOnStop : true,
    turn : 9000,
    motion : 'swing',
    delay: 500,
    width : 500,
    height : 330,
    marginLR : 5,
    viewSize : 100,
    viewOverflow : 'visible',
    navPositionBottom : 30,
    navibotton : true,
    navbtnImage : ''
});
</script>


<script src="{{url('').'/resources/assets/frontend/'}}js/aninum/jquery.animateNumber.min.js"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.js"></script>
    <script src="{{url('').'/resources/assets/frontend/'}}js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>

<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/accordion/jquery.accordion.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/accordion/custom.js"></script>

<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/universal/custom.js"></script>

<script src="{{url('').'/resources/assets/frontend/'}}js/sidemenu/menuFullpage.min.js"></script>
<script>
    smoothScroll.init();
    $(document).ready(function() {
            $('.menu-link').menuFullpage();
    });
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript">
  base_url='{{url("")}}';
  csrf_token='{{csrf_token()}}';
  
</script>
@yield('custom_scripts')
<script type="text/javascript">
  $(document).on('click', '#logout', function(event) {
   
    $('#logout_form').submit();

  });
  $(document).on('click', '#btn_change_password', function(event) {
    
    $('#change_password_form').submit();
    


  });
  
</script>   

</body>
</html> 
