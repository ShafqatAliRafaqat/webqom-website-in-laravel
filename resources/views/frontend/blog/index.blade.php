@extends('layouts.frontend_layout')
@section('title','Blog | - Webqom Technologies')
@section('custom_style')
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/tabs/assets/css/responsive-tabs.css">
<!-- owl carousel -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.transitions.css" rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.css" rel="stylesheet">
    
    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/accordion/style.css" />
    
    <!-- tabs 2 -->
    <!-- <link href="{{url('').'/resources/assets/frontend/'}}css/tabs2/tabacc.css" rel="stylesheet" /> -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/detached.css" rel="stylesheet" />
    
    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/tabs/assets/css/responsive-tabs2.css">
    
    <!-- timeline -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/timeline/timeline.css">
@endsection
@section('content')

<div class="clearfix"></div>

<div class="page_title1 sty13">
<div class="container">

    <h1>Blog</h1>
    <div class="pagenation">&nbsp;<a href="{{ route('frontend.index') }}">Home</a> <i>/</i> Blog</div>
 
    </div>      
</div><!-- end page title -->

<div class="feature_section16">

    <div class="one_full stcode_title9">
        <h1 class="caps"><strong>Blog Articles</strong></h1>
    </div>
    
    <div class="container">
        @if(!$articles->isEmpty())
        <div class="one_full_less">
            <ul class="tabs2 clearfix">
                @php
                $x = 1;
                @endphp
                @foreach($articles as $article)
                <li><a href="#tab-{{ $x }}" target="_self">{{ $article->post_date_year }}</a></li>
                @php
                $x++;
                @endphp
                @endforeach
            </ul>
            
            
            <div class="tabs-content2 fullw">
                @php
                $y= 1;
                @endphp
                @foreach($articles as $article)
                <div id="tab-{{ $y}}" class="tabs-panel2">
                
                    <div id="cd-timeline" class="cd-container">
        
                    @foreach($article->list_articles as $list)
                      <div class="cd-timeline-block">
                        <div class="cd-timeline-img cd-picture"> <img src="{{url('').'/storage/articles/author_thumbnail/'. $list->author_thumbnail}}" alt="{{ $list->author }}" /> </div>
                        <!-- cd-timeline-img -->
                        
                        <div class="cd-timeline-content">
                          <h2><a href="{{ route('frontend.articles.show', [$list->id])}}">{{$list->title}}</a></h2>
                          <p class="text">{{ str_limit($list->description, 100, '...')}}</p>
                          <a href="{{ route('frontend.articles.show', [$list->id]) }}" class="cd-read-more">Read more</a> <span class="cd-date"><strong>{{ $list->PostDateMonthInMiddle }}</strong></span> </div>
                        <!-- cd-timeline-content --> 
                      </div>
                      <!-- cd-timeline-block -->
                    @endforeach
                    </div>
                </div><!-- end tab 1 -->
                @php
                $y++;
                @endphp
                @endforeach
            </div><!-- end tabs2 content fullw -->
            
        </div><!-- end one full less -->
    </div><!-- end container -->
    @endif
    
    

</div><!-- end feature section 16 -->


<div class="clearfix"></div>
<div class="container feature_section107"><br /><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>
@endsection
@section('custom_scripts')
<script src="{{url('').'/resources/assets/frontend/'}}js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
<script>
(function($) {
 "use strict";

jQuery(document).ready(function($){
    var currentUrl = window.location.href;
    var specificUrl = currentUrl.split('#');
    if (specificUrl.length > 1) {
        $('.tabs2 li').each(function(i,y){
            //check if the object has active class
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                //get the attr href from the a inside li, then hide the content that related to the li a
                $('#'+$('a', $(this)).attr('href').split('#')[1]).removeAttr('style').css('display', 'none');
            }
            if ($('a', $(this)).attr('href') == '#'+ currentUrl.split('#')[1]) {
                $(this).addClass('active');
                $('#'+$('a', $(this)).attr('href').split('#')[1]).removeAttr('style').css('display', 'block');
            }
        });
    }

    var $timeline_block = $('.cd-timeline-block');

    //hide timeline blocks which are outside the viewport
    $timeline_block.each(function(){
        if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
            $(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
        }
    });

    //on scolling, show/animate timeline blocks when enter the viewport
    $(window).on('scroll', function(){
        $timeline_block.each(function(){
            if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
                $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
            }
        });
    });
});

})(jQuery);
</script>
@endsection