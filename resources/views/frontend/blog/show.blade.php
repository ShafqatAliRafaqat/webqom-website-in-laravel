@extends('layouts.frontend_layout')
@section('title',$article->title . ' | - Webqom Technologies')
@section('custom_style')
    <!-- owl carousel -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.transitions.css" rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.css" rel="stylesheet">
    
    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/accordion/style.css" />
  
    
    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}js/tabs/tabwidget/tabwidget.css" />
    
    <!-- timeline -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}js/timeline/timeline.css">
@endsection
@section('content')
<div class="clearfix"></div>


<div class="page_title1 sty13">
<div class="container">

    <h1>Blog</h1>
    <div class="pagenation">&nbsp;<a href="{{ route('frontend.index') }}">Home</a> <i>/</i> <a href="{{ route('frontend.articles.index') }}">Blog</a> <i>/</i> {!! $article->title !!}</div>
 
    </div>      
</div><!-- end page title -->


<div class="content_fullwidth">
<div class="container">

<div class="three_fourth">
            
        <div class="blog_post"> 
            <div class="blog_postcontent">
                <h2>{!! $article->title !!}</h2>
                <ul class="post_meta_links">
                    <li><span class="date">{!! $article->post_date_month_in_middle !!}</span></li>
                    <li><i>by:</i> {!! $article->author !!}</li>
                    <li><i>note:</i> {{$article->comments()->count()}} Comments</li>
                </ul>
                <div class="clearfix"></div>
                <div class="margin_top1"></div>
                {!! $article->content !!}
            </div>
        </div><!-- /# end post -->
            
            <div class="clearfix divider_line9"></div>

            
            <div class="sharepost">
                <h5 class="caps">Share this Post</h5>
                    <ul>
                        <li><a href="#">&nbsp;<i class="fa fa-facebook fa-lg"></i>&nbsp;</a></li>
                        <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-html5 fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-linux fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-android fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss fa-lg"></i></a></li>
                    </ul>
                
                </div><!-- end share post links -->
                
                <div class="clearfix"></div>
  
                <div class="one_half"> 
                     <div class="popular-posts-area">
                        <h5 class="caps">Recent Posts</h5>
                            <div class="clearfix margin_bottom1"></div>
                            
                            <ul class="recent_posts_list">
                                @if(!$recent_post->isEmpty())
                                @foreach($recent_post as $rp)
                                <li>
                                    <span><a href="{{ route('frontend.articles.show', [ $rp->id ])}}"><img src="{{url('').'/storage/articles/front_image/'. $rp->front_image}}" alt="" height="100px" width="100px" /></a></span>
                                    <a href="{{ route('frontend.articles.show', [ $rp->id ])}}">{!! $rp->title !!}</a>
                                     <i>{!! $rp->post_date_month_in_middle !!}</i> 
                                </li>
                                @endforeach
                                @endif
                            </ul>
                            
                        </div>
                   </div><!-- end recent posts -->
                   
                   
                   <div class="one_half last"> 
                     <div class="popular-posts-area">
                        <h5 class="caps">Popular Posts</h5>
                            <div class="clearfix margin_bottom1"></div>
                            
                            <ul class="recent_posts_list">
                                @if(!$popular_post->isEmpty())
                                @foreach($popular_post as $pop_post)
                                <li>
                                    <span><a href="{{ route('frontend.articles.show', [ $pop_post->id ])}}"><img src="{{url('').'/storage/articles/front_image/'. $pop_post->front_image}}" alt=""  height="100px" width="100px" /></a></span>
                                    <a href="{{ route('frontend.articles.show', [ $pop_post->id ])}}">{!! $pop_post->title !!}</a>
                                     <i>{!! $pop_post->post_date_month_in_middle !!}</i> 
                                </li>
                                @endforeach
                                @endif
                            </ul>
                            
                        </div>
                   </div><!-- end popular posts -->
                            
                <div class="clearfix"></div>
       
               <h5>Comments</h5>
                <div class="mar_top_bottom_lines_small3"></div>
                @if(!$article->comments->isEmpty())
                @foreach($article->comments as $comment)
                <div class="comment_wrap">
                    <div class="gravatar"><img src="{!! $comment->author->profile_pic !!}" alt="{!! $comment->author->name !!}" /></div>
                        <div class="comment_content">
                            <div class="comment_meta">
            
                                <div class="comment_author">{!! $comment->author->name !!} - <i>{!! $comment->created_at_fronted_format !!}</i></div>
                                
                            </div>
                            <div class="comment_text">
                                <p>{!! $comment->message !!}</p>
                                <a href="#comment-section"">Reply</a>
                            </div>
                        </div>
                </div><!-- end section -->
                @endforeach
                @endif

                    <div class="cforms alileft" id="comment-section">
                        
                        <h5>Leave a Comment</h5>
                        
                        <form action="{{route('frontend.articles.comment.store', [$article->id])}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <label for="name">Comments <em>*</em></label>
                            <textarea name="message" class="comment_textarea_bg" rows="20" cols="7" ></textarea>
                            <div class="clearfix"></div> 
                            
                            <div class="clearfix margin_bottom1"></div>
                            <!--<div class="g-recaptcha" data-sitekey="{{Config::get('services.google-recaptcha.site-key')}}"></div>-->
                            <div class="g-recaptcha" data-sitekey="6LfiDxATAAAAALssDu-lX0bE7a6pOOwqWPxUojxX"></div>
                            <div class="clearfix margin_top3"></div>
                            @if($user)
                            <button type="submit" class="but_medium1 caps">Submit</button>
                            @else
                            <a href="/login" class="but_medium1 caps">Please login</a>
                            @endif
                            
                        </form>
                        
                    </div><!-- end cform -->
                        
                <div class="clearfix"></div>  
                        
            </div><!-- end content left side -->


            <!-- right sidebar starts -->
            <div class="one_fourth last">
            
                <div class="sidebar_widget">
                
                    <div class="sidebar_title"><h4 class="caps">View By Year</h4></div>
                    <ul class="arrows_list1">
                        @if(!$grouped_articles->isEmpty())
                        @php
                        $x=1;
                        @endphp
                        @foreach($grouped_articles as $ga)
                        <li><a href="blog.html#tab-{{$x}}"><i class="fa fa-caret-right"></i>{{$ga->post_date->format('Y')}}</a></li>
                        @php
                        $x++;
                        @endphp
                        @endforeach
                        @endif
                    </ul>
                    
                </div><!-- end section -->
                
                <div class="margin_top4"></div>
                <div class="clearfix"></div>
                
                <div class="sidebar_widget">
                
                    <div id="tabs">
                    
                        <ul class="tabs">  
                            <li style="width: 130px;" class="active"><a href="#tab1">Popular</a></li>
                            <li style="width: 130px;"><a href="#tab2">Recent</a></li>
                        </ul><!-- /# end tab links --> 
             
                    <div class="tab_container"> 
                        <div id="tab1" class="tab_content"> 
                        
                            <ul class="recent_posts_list">
                                @if(!$popular_post->isEmpty())
                                @foreach($popular_post as $pp)
                                <li>
                                    <span><a href="{{ route('frontend.articles.show', [$pp->id])}}"><img src="{{url('').'/storage/articles/front_image/'. $pp->front_image}}" alt="" width="100px" height="100px" /></a></span>
                                    <a href="{{ route('frontend.articles.show', [$pp->id])}}">{!! $pp->title !!}</a>
                                     <i>{!! $pp->post_date_month_in_middle !!}</i> 
                                </li>
                                @endforeach
                                @endif
                            </ul>
                             
                        </div><!-- end popular posts --> 
                        
                        <div id="tab2" class="tab_content">  
                            <ul class="recent_posts_list">
                                @if(!$recent_post->isEmpty())
                                @foreach($recent_post as $rec_post)
                                <li>
                                    <span><a href="{{ route('frontend.articles.show', [ $rec_post->id ])}}"><img src="{{url('').'/storage/articles/front_image/'. $rec_post->front_image}}" alt="" height="100px" width="100px" /></a></span>
                                    <a href="{{ route('frontend.articles.show', [ $rec_post->id ])}}">{!! $rec_post->title !!}</a>
                                     <i>{!! $rec_post->post_date_month_in_middle !!}</i> 
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div><!-- end popular articles --> 
                    </div>
                    
                    </div>
                            
                </div><!-- end section -->
                
                <div class="clearfix margin_top4"></div>
                
                
                
            </div><!-- end right sidebar -->


    </div>
</div><!-- end content fullwidth -->

<div class="clearfix divider_line"></div>


<div class="clearfix"></div>
<div class="container feature_section107"><br /><h1 class="caps light">Learn more about <b>Web88 CMS System</b>  <a href="web88.html">Go!</a></h1></div>
@endsection
@section('custom_scripts')
<script src="{{url('').'/resources/assets/frontend/'}}js/scrolltotop/totop.js" type="text/javascript"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/sticky.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/mainmenu/modernizr.custom.75180.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/cubeportfolio/main.js"></script>

<script src="{{url('').'/resources/assets/frontend/'}}js/aninum/jquery.animateNumber.min.js"></script>
<script src="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.js"></script>
<script type="text/javascript" src="{{url('').'/resources/assets/frontend/'}}js/tabs/tabwidget/tabwidget.js"></script>
@endsection