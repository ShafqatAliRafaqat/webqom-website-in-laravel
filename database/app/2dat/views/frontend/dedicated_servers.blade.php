@extends('layouts.frontend_layout')
@section('title','Home | - Webqom Technologies')
@section('content')


<div class="clearfix"></div>


<div class="page_title1 sty2">

	<h1>Dedicated Servers
	<em>We provide web hosting include a free domain name registration.</em>
    <span class="line2"></span>
    </h1>

</div><!-- end page title -->


<div class="clearfix"></div>


<div class="price_compare">
<div class="container">

   <div class="one_full stcode_title9">
    	<h1 class="caps"><strong>Dedicated Hosting Plans</strong>
			<em>High Performance at Unbeatable Price</em>
    		<span class="line"></span>
    	</h1>
    </div>
<div class="clearfix margin_bottom5"></div>
    
<table>
  <tr>
    <td class="first rowfirst">
    	<div class="title">
        	<div class="arrow_box">
            <h5>All Dedicated Hosting Features</h5>
        	<h3 class="caps">Choose Your Plan</h3>
            </div>
        </div>
    </td>
    <td class="rowsremain">    
        <div class="prices">
            <h2 class="caps">Enterprise 1</h2>
            <strong><i>RM</i>549<i>.00/mo</i></strong><b></b>
            <a href="server_configuration_dedicated.html">Order Now</a>
        </div>
    </td>
    <td class="rowsremain center">
    	<div class="prices">
        	<h3><span>best value</span></h3>
            <h2 class="caps white">Enterprise 2</h2>
            <strong><i>RM</i>809<i>.00/mo</i></strong><b></b>
            <a href="server_configuration_dedicated.html">Order Now</a>
        </div>
    </td>
    <td class="rowsremain">
    	<div class="prices">
            <h2 class="caps">Enterprise 3</h2>
            <strong><i>RM</i>1,079<i>.00/mo</i></strong><b></b>
            <a href="server_configuration_dedicated.html">Order Now</a>
        </div>
    </td>
  </tr>
  <tr>
    <th class="alileft">CPU [Dual Processors]</th>
    <th>Dual Intel&reg;  Xeon&reg; E5-2620 V3</th>
    <th>Dual Intel&reg;  Xeon&reg; E5-2630 V3</th>
    <th>Dual Intel&reg;  Xeon&reg; E5-2650 V3</th>
  </tr>
  <tr>
    <td class="alileft">No. of Processors</td>
    <td>2 processors</td>
    <td>2 processors</td>
    <td>2 processors</td>
  </tr>
  <tr>
    <th class="alileft">Memory</th>
    <th>64GB</th>
    <th>64GB</th>
    <th>64GB</th>
  </tr>
  <tr>
    <td class="alileft">Fast Hard Disk</td>
    <td>2 x 2TB HDD</td>
    <td>2 x 2TB HDD</td>
    <td>2 x 2TB HDD</td>
  </tr>
  <tr>
    <th class="alileft">No. of IP addresses (IPv4)</th>
    <th>1 x IPv4 Address</th>
    <th>1 x IPv4 Address</th>
    <th>1 x IPv4 Address</th>
  </tr>
  <tr>
    <td class="alileft">Bandwidth</td>
    <td>35TB</td>
    <td>35TB</td>
    <td>35TB</td>
  </tr>
  <tr>
    <th class="alileft">Control Panel</th>
    <th>Webmin / cPanel WHM / zPanel</th>
    <th>Webmin / cPanel WHM / zPanel</th>
    <th>Webmin / cPanel WHM / zPanel</th>
  </tr>
  <tr>
    <td class="alileft">Server OS</td>
    <td>Linux Centos</td>
    <td>Linux Centos</td>
    <td>Linux Centos</td>
  </tr>
  <tr>
    <th class="alileft">Firewall</th>
    <th>High Availability: Juniper</th>
    <th>High Availability: Juniper</th>
    <th>High Availability: Juniper</th>
  </tr>
  <tr>
    <td class="alileft">Fully Managed Server</td>
    <td>Optional</td>
    <td>Optional</td>
    <td>Optional</td>
  </tr>
  <tr>
    <th class="alileft">Free Setup</th>
    <th><i class="fa fa-check sitecolor"></i></th>
    <th><i class="fa fa-check sitecolor"></i></th>
    <th><i class="fa fa-check sitecolor"></i></th>
  </tr>
  
  
<tr>
    <td class="first rowfirst"></td>
    <td class="rowsremain">    
        <div class="prices">
            <strong><i>RM</i>549<i>.00/mo</i></strong> <b></b>
            <a href="server_configuration_dedicated.html">Order Now</a>
        </div>
    </td>
    <td class="rowsremain center">
    	<div class="prices">
            <strong><i>RM</i>809<i>.00/mo</i></strong> <b></b>
            <a href="server_configuration_dedicated.html">Order Now</a>
        </div>
    </td>
    <td class="rowsremain">
    	<div class="prices">
            <strong><i>RM</i>1,079<i>.00/mo</i></strong> <b></b>
            <a href="server_configuration_dedicated.html">Order Now</a>
        </div>
    </td>
  </tr>

</table>

</div>
</div><!-- end choose plans -->


<div class="clearfix"></div>


{!!$cms->content!!}


<div class="clearfix"></div>




<!-- end featured section 9 -->


<div class="clearfix"></div>


@endsection
@section('custom_scripts')

    <!-- MasterSlider -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/masterslider/style/masterslider.css" />
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/masterslider/skins/default/style.css" />
    
    <!-- owl carousel -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.transitions.css" rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.css" rel="stylesheet">
    
    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/accordion/style.css" />
    
    <!-- tabs 2 -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/tabacc.css" rel="stylesheet" />
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/detached.css" rel="stylesheet" />
    
    <!-- loop slider -->
    <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/loopslider/style.css">
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
