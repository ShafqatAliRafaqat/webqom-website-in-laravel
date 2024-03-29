<?php $currentURL = url()->current(); $baseURL= url('/');$basePath=str_replace($baseURL, '', $currentURL) ?>
@if(strpos($basePath,'ecommerce') !== false) 
@include('frontend.ecommerce')
@elseif(strpos($basePath,'email88') !== false)
@include('frontend.email88')
@elseif(strpos($basePath,'web88ir') !== false)
@include('frontend.web88ir')
@else
@extends('layouts.frontend_layout')
@section('title', ucwords($page_name).' | - Webqom Technologies')
@section('content')

<div class="clearfix"></div>


<div class="page_title1 sty2">
    <h1>{{$page_header}}
    <em>{{$sub_header}}</em>
    <span class="line2"></span>
    </h1>

</div><!-- end page title -->


<div class="clearfix"></div>


<div class="price_compare">
<div class="container">

   <div class="one_full stcode_title9">
        <h1 class="caps"><strong>{{$page_name}} Plans</strong>
            <em>Get Started Today!</em>
            <span class="line"></span>
        </h1>
    </div>
<div class="clearfix margin_bottom5"></div>


<div class="clearfix"></div>
@if(count($plans)>0)
@include("frontend._hosting_plans")
@else
<p>No Plans found</p>
@endif
</div>
</div><!-- end choose plans -->



<div class="clearfix"></div>
@if($page_slug=='co_cloud_hosting' || $page_slug=='shared_hosting' || $duplicate_from=='co_cloud_hosting' || $duplicate_from=='shared_hosting')
<div class="feature_section7">

<div class="container">

    <h1 class="caps"><strong>@if(count($general_features)>0)<h1 class="caps"><strong>
{{$general_features[0]['heading'] or ''}} </strong></h1>@endif</strong></h1>


 @if(!empty($general_features))
        <?php $count = 0;?>
        @foreach($general_features as $i)
        <?php
$count++;
?>
        <div class="one_fifth_less @if($count%5==0) last @endif">
        <h5 class="caps">
            @if($i->icon != "")
            <i class="fa {{$i->icon}}"></i> 
            @elseif($i->icon_image != "")
            <img src="{{ asset('/storage/general_features/icon_images/'.$i->icon_image) }}" style="display: block;margin-left: auto;margin-right: auto;" />
            @endif   
            
            {{$i->title}}</h5>
        </div><!-- end -->
        <?php if ($count % 5 == 0) {?>
            <div class="clearfix margin_bottom2"></div>
        <?php }
?>


    @endforeach
    @endif

</div>
</div><!-- end featured section 7 -->

@endif

<div class="clearfix"></div>


    {!!$cms->content!!}


@if($page_slug!='co_cloud_hosting' && $page_slug!='shared_hosting' && $duplicate_from!='co_cloud_hosting' &&$duplicate_from!='shared_hosting')
<div class="feature_section103">
<div class="container">

    @if(count($general_features)>0)<h1 class="caps white"><strong>{{$general_features[0]
['heading'] or ''}} </strong></h1>@endif

    <div class="clearfix margin_bottom2"></div>

     @if(count($general_features)>0)
     <?php $count = 0;?>
        @foreach($general_features->where('ssl_page', 0) as $i)
         <?php
$count++;
?>
        <div class="box four  last animate" data-anim-type="fadeIn" data-anim-delay="300">
            <i class="fa {{$i->icon}}"></i>
            <h4>{{$i->title}}<div class="line"></div></h4>
            <p class="sky-blue">{{$i->description}}.</p>
        </div><!-- end box -->
         <?php if ($count % 4 == 0) {?>
            <div class="clearfix margin_bottom2"></div>
        <?php }?>

    @endforeach
    @endif


</div>
</div>
@endif
<!-- end featured section 103 -->


<div class="clearfix"></div>



<!-- end featured section 9 -->


<div class="clearfix"></div>


@endsection
@section('custom_scripts')

    <!-- MasterSlider -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}
js/masterslider/style/masterslider.css" />
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}
js/masterslider/skins/default/style.css" />

    <!-- owl carousel -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.transitions.css" 
rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.css" 
rel="stylesheet">

    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}
js/accordion/style.css" />

    <!-- tabs 2 -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/tabacc.css" rel="stylesheet" />
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/detached.css" rel="stylesheet" />

    <!-- loop slider -->
    <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}
js/loopslider/style.css">
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
@endif
