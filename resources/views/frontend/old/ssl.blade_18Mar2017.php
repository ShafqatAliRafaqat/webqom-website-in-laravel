@extends('layouts.frontend_layout')
@section('title', ucwords($page_name). ' | - Webqom Technologies')
@section('content')




<div class="clearfix"></div>


<div class="page_title1 sty2">
    <h1>SSL Certificates
    <em>Want customers to come back? Protect them.</em>
    <span class="line2"></span>
    </h1>

</div><!-- end page title -->


<div class="clearfix"></div>


<div class="host_plans_sty3">
<div class="container">

    <div class="one_full stcode_title9">
        <h1 class="caps"><strong>SSL Certificates Plans</strong>
            <em>Get Started Today!</em>
            <span class="line"></span>
        </h1>
    </div>
<div class="clearfix margin_bottom5"></div>
    @if(!empty($plans))
    @foreach($plans as $i)
        <div class="one_third animate" data-anim-type="fadeInRight" data-anim-delay="200">
        <img src="{{url('').'/storage/ssl/icon_images/'.$i->icon_image}}" width="80px" alt="Protect One Website" />
        <h1 class="caps"><strong>{{$i->plan_name}}</strong></h1>
        @if(!empty($featured_plans))
            <ul>
            @foreach($featured_plans as $j)
                <li><i class="fa fa-check"></i> {{$j->title}}</li>
            @endforeach
            </ul>
        @endif
        </ul>
        <div class="price">
            <div class="cforms">
                <select>
                    <option>3 Years @ </span> {{$i->price_triennially or '0'}}<span>/yr</option>
                    <option>2 Years @ </span> {{$i->price_biennially or '0'}}<span>/yr</option>
                    <option selected="selected">1 Years @ </span> {{$i->price_annually or '0'}}<span>/yr</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <em>Starting At</em>
            <h1><span>RM</span><strong>{{$i->price_annually or '0'}}</strong><span>/yr</span></h1>
        </div>
        @if($i->enable_plan_button!='other')
                <a class="but" href="domain_configuration_hosting.html">{{$i->enable_plan_button}}</a>
                @else
                <a class="but" href="domain_configuration_hosting.html">{{$i->enable_plan_button_other}}</a>
            @endif
    </div><!-- end section -->
    @endforeach
  @endif




</div>
</div><!-- end hosting plans -->

<div class="clearfix"></div>


    {!!$cms->content!!}

<div class="clearfix"></div>


<div class="feature_section7">

<div class="container">

    <h1 class="caps"><strong>All Our plans include</strong></h1>

    <div class="clearfix margin_bottom2"></div>
     @if(count($general_features->where('ssl_page',1))>0)
     <?php $count = 0;?>
        @foreach($general_features->where('ssl_page',1) as $i)
         <?php
$count++;
?>

        <div class="one_fifth_less @if ($count%5==0) last @endif">
            <h5 class="caps"><i class="fa {{$i->icon}}"></i> {{$i->title}}</h5>
        </div><!-- end -->
         @if ($count%5==0)
            <div class="clearfix margin_bottom3"></div>
         @endif
    @endforeach
    @else
        <p>No Items found</p>
    @endif





    <div class="clearfix margin_bottom3"></div>






</div>
</div><!-- end featured section 7 -->
 <div class="clearfix"></div>
     {!!$cms->content2!!}
  <div class="clearfix"></div>


@include("frontend._faq")


<div class="clearfix"></div>
<div class="container feature_section107"><br/><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>



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
