@extends('layouts.frontend_layout')
@section('title','Home | - Webqom Technologies')
@section('content')



<div class="clearfix"></div>

<!-- Slider
======================================= -->

<div class="slidermar">
<div class="master-slider ms-skin-default" id="masterslider">

    <div class="ms-slide slide-1" data-delay="5">

        <div class="slide-pattern"></div>

        <img src="{{url('').'/resources/assets/frontend/'}}js/masterslider/blank.gif" data-src="{{url('').'/resources/assets/frontend/'}}images/index/banner1.jpg" alt="" />

        <a href="#" class="ms-layer sbut1 white"
			style="left: 105px; top: 540px;"
			data-type="text"
			data-delay="700"
			data-ease="easeOutExpo"
			data-duration="1800"
			data-effect="scale(1.5,1.6)"
		>
			Explore More

		</a>

	</div><!-- end slide 1 -->


    <div class="ms-slide slide-2" data-delay="5">

        <div class="slide-pattern"></div>

        <img src="{{url('').'/resources/assets/frontend/'}}js/masterslider/blank.gif" data-src="{{url('').'/resources/assets/frontend/'}}images/index/banner2.jpg" alt="" />

	</div><!-- end slide 1 -->


    <!--<div class="ms-slide slide-3" data-delay="5">

        <div class="slide-pattern"></div>

        <img src="js/masterslider/blank.gif" data-src="images/sliders/master/23.jpg" alt="" />

        <h3 class="ms-layer text1 white caps"
        	style="left: 115px; top: 290px;"
            data-type="text"
            data-effect="right(45)"
            data-duration="1800"
            data-delay="0"
            data-ease="easeOutExpo"
        >
            <strong>Build Your Dream Website with</strong>

        </h3>

        <h4 class="ms-layer text2 white caps"
        	style="left: 115px; top: 326px;"
            data-type="text"
            data-effect="left(45)"
            data-duration="1800"
            data-delay="300"
            data-ease="easeOutExpo"
        >
            <strong>Multi Purpose</strong>

        </h4>

        <h5 class="ms-layer text3 white"
        	style="left: 115px; top: 425px;"
            data-type="text"
            data-effect="bottom(45)"
            data-duration="1800"
            data-delay="500"
            data-ease="easeOutExpo"
        >
            Powerful and Cheap Web Hosting and Domains for your Website. <br /> Get Web Hosting and Receive a <strong>FREE Domain Name!</strong>

        </h5>

        <a href="#" class="ms-layer sbut1 white"
			style="left: 115px; top: 520px;"
			data-type="text"
			data-delay="700"
			data-ease="easeOutExpo"
			data-duration="1800"
			data-effect="scale(1.5,1.6)"
		>
			Get Started Now!

		</a>

	</div>--><!-- end slide 1 -->


</div>
</div>
<!-- end of masterslider -->


<div class="clearfix"></div>


<div class="domain_search">
    @if($search_result['is_search'])
        @if($search_result['valid_domain'])
        <div class="badge-green">
            <label>Avalible</label>
        </div>
        @else
        <div class="badge-red">
            <label class="white">Not - Avalible</label>
        </div>
        @endif
    @endif
	<div class="serch_area">
        <div class="container">
            <h5 class="white caps">Find your Perfect Domain Name:</h5>
            <form method="get" action="/">
            {{-- <form method="get" action="index.html"> --}}
                <input class="enter_email_input" name="samplees" id="samplees" value="Enter your domain name here..." onFocus="if(this.value == 'Enter your domain name here...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter your domain name here...';}" type="text">
                <input name="" value="Search Domain" class="input_submit" type="submit">
            </form>
        </div>
	</div><!-- end section -->

    <div class="offers">
    <div class="container">
    	<ul>
            <li><strong>.com</strong> RM 5.75</li>
            <li><strong>.com</strong> RM 5.75</li>
            <li><strong>.net</strong> RM 9.45</li>
            <li><strong>.org</strong> RM 7.50</li>
            <li><strong>.us</strong> RM 5.99</li>
            <li><strong>.biz</strong> RM 9.99</li>
            <li class="last">* All prices per annum</li>
        </ul>
    </div>
    </div>

</div><!-- end domain search -->


<div class="clearfix"></div>


<div class="host_plans_sty3">
<div class="container">

	@if($indexplans)
        @foreach($indexplans as $i)
            <div class="one_fourth animate" data-anim-type="fadeInLeft" data-anim-delay="600">
        <img src="{{url('').'/storage/index-plan/icon_images/'.$i->icon_image}}" width="70px" style="padding: 0px;" alt="Shared Hosting" />
        <h1 class="caps"><strong>{{$i->name_line1}}</strong> <span>{{$i->name_line2}}</span></h1>
        <ul>
            @foreach($i->featured_plans as $feature)
            <li><i class="fa fa-check"></i>{{$feature->title}}</li>
            @endforeach
        </ul>
        <div class="price">
            <em>Starting At</em>
            @if($i->price_type=='Recurring') <h1><span>RM</span><strong>{{$i->price_annually or 'undefined'}}</strong><span>/yr</span></h1>@endif
            @if($i->price_type=='One Time')
            <h1><span>RM</span><strong>{{$i->price_monthly or 'undefined'}} </strong><span>/mo</span></h1>
            @endif
            @if($i->price_type=='Free')
            <h1><strong>Free</strong><span></span></h1>
            @endif
        </div>
        <a href="{{$i->url}}" class="but">Get Started!</a>
    </div><!-- end section -->

        @endforeach
    @endif


</div>
</div><!-- end hosting plans -->


<div class="clearfix"></div>


<div class="feature_section1 sty2">
<div class="container">


    <div class="one_full stcode_title9">
    	<h1 class="caps"><strong>@if(count($general_features)>0) @if($general_features[0][0]['heading_status']==1) {{$general_features[0][0]['heading']}} @endif @endif</strong>
			<em>Stable, Fast &amp; Reliable! </em>
    		<span class="line"></span>
    	</h1>
    </div>

	<div class="clearfix margin_bottom3"></div>
    @if(count($general_features)>0)
            @foreach($general_features as $chunks)

            <div class="one_third animate" data-anim-type="fadeIn" data-anim-delay="200">
                @foreach($chunks as $i)
                @if($i->icon!="")<i class="fa {{$i->icon}}"></i>@else
                <i class="fa {{$i->icon}}"><img style="width: 100%;" src="{{url('').'/storage/general_features/icon_images/'.$i->icon_image}}"  alt="" /></i> @endif
                <h4 class="light text-blue">{{$i->title}}</h4>
                <p>{{$i->description}}</p>

                <div class="clearfix margin_bottom5"></div>
                 @endforeach
            </div><!-- end section -->
            @endforeach
            @endif



</div>
</div><!-- end feature section 1 -->


<div class="clearfix"></div>

{!!$page_cms->content!!}

<div class="feature_section3">
<div class="container">

	<div class="one_half">

		<h2 class="caps">{{$videos->video_title or 'No video title'}}</h2>

        <div class="clearfix margin_bottom1"></div>
        {!!$videos->link or 'No Video link added' !!}

    </div>
    <!-- end video -->



    <div class="one_half last">

    	<h2 class="caps">Blogs</h2>

        <div class="clearfix margin_bottom1"></div>


        <div id="owl-demo13" class="owl-carousel">

        	<div class="lstblogs">
            <div>
                <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/site-img1.jpg" alt="" /></a>
                <a href="#" class="date"><strong>22</strong> Sep</a>
                <h4 class="white light"><a href="#" class="tcont">How to create a staging account in sub-domain in zpanel?</a> <div class="hline"></div></h4>
            </div>
            </div><!-- end this slide -->

            <div class="lstblogs">
            <div>
                <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/site-img2.jpg" alt="" /></a>
                <a href="#" class="date"><strong>15</strong> Nov</a>
                <h4 class="white light"><a href="#" class="tcont">Web Hosting Tip: Check, unblock and whitelist your IP in APF</a> <div class="hline"></div></h4>
            </div>
            </div><!-- end this slide -->

            <div class="lstblogs">
            <div>
                <a href="#"><img src="{{url('').'/resources/assets/frontend/'}}images/site-img3.jpg" alt="" /></a>
                <a href="#" class="date"><strong>03</strong> Nov</a>
                <h4 class="white light"><a href="#" class="tcont">Managed Services: The Complete End to End Solution</a> <div class="hline"></div></h4>
            </div>
            </div><!-- end this slide -->

		</div>

    </div><!-- end latest news / blogs section -->




</div>
</div><!-- end feature section 3 -->


<div class="clearfix"></div>


<div class="parallax_section4">
<div class="container">
     @if(count($offer_services)>0 && $offer_services[0]['heading_status']==1)

    <h1 class="caps white"><strong>{{$offer_services[0]['heading']}}</strong></h1>
    @else
	<h1 class="caps white"><strong></strong></h1>
    @endif

	<div class="clearfix margin_bottom1"></div>
    <div class="tabs detached hide-title cross-fade">
     @if(count($offer_services)>0)
		 @foreach($offer_services as $index=>$i)
		 <section>
        	<h1><span>{{$i->title}}</span></h1>
    		<img src="{{Storage::disk('index-plan')->url('index-plan/service-side-images/'.$i->image)}}" alt="" />
            <h2>{{$i->header}}</h2>
            <p class="bigtfont dark">{!!$i->content!!}</p>
            <br />
            <a href="{{$i->link}}" class="button two">Learn More</a>
		</section>
		@endforeach
    @endif

    	<!-- <section>
        	<h1><span>Domains</span></h1>
    		<img src="{{url('').'/resources/assets/frontend/'}}images/site-img7.png" alt="" />
            <h2>Domain packages provide quality web hosting with unlimited resources.</h2>
            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
            <br />
            <a href="#" class="button two">Learn More</a>
		</section><!-- end section -->

    	<!-- <section>
        	<h1><span>eCommerce</span></h1>
    		<img src="{{url('').'/resources/assets/frontend/'}}images/site-img8.png" alt="" />
            <h2>eCommerce packages provide quality web hosting with unlimited resources.</h2>
            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
            <br />
            <a href="#" class="button two">Learn More</a>
		</section> --><!-- end section -->

        <!-- <section>
        	<h1><span>Mobile</span></h1>
    		<img src="{{url('').'/resources/assets/frontend/'}}images/site-img9.png" alt="" />
            <h2>Mobile website packages provide quality web hosting with unlimited resources.</h2>
            <p class="bigtfont dark">Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy also the leap into electronic typesetting, remaining essentially was in the with the release of sheets versions over the years.</p>
            <br />
            <a href="#" class="button two">Learn More</a>
		</section> --><!-- end section -->

    </div>

</div>
</div><!-- end parallax section 1 -->


<div class="clearfix"></div>



<!-- end featured section 4 -->


<div class="clearfix"></div>

<!-- end parallax section 2 -->


<div class="clearfix"></div>


<!-- end portfolio works section -->

<div class="clearfix"></div>


<!-- end featured section 5-->


<div class="clearfix"></div>


<div class="feature_section6">
<div class="container">

    <h1 class="caps"><strong> @if(count($testimonial)>0) @if($testimonial[0]['heading_status']==1) {{$testimonial[0]['heading']}} @endif @endif</strong></h1>

    <div class="clearfix margin_bottom1"></div>

	<div class="less6">
    <div id="owl-demo20" class="owl-carousel">
        @if(count($testimonial)>0)
        @foreach($testimonial as $i)
        <div class="item">
        	<div class="climg"><img src="{{url('').'/storage/general_features/testimonials'}}/{{$i->client_image}}" alt="" /></div>
        	<p class="bigtfont dark">
                  {{$i->content}}
            .</p>
			<br />
        	<strong>- {{$i->client_name}}</strong> &nbsp;<em>-{{$i->company}} </em>
            <p class="clearfix margin_bottom1"></p>
        </div><!-- end slide -->
        @endforeach
        @endif


    </div>
    </div>

</div>
</div><!-- end featured section 5-->


<div class="clearfix"></div>




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
