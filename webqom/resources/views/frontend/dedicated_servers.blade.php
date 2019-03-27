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
    
@include("frontend._hosting_plans")
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
