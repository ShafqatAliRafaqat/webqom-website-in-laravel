<?php
$page = 'blog';
$breadcrumbs = [
    array('url' => false, 'name' => 'CMS Pages'),
    array('url' => route('admin.articles.index'), 'name' => 'Blog Articles Listing'),
    array('url' => '', 'name' => 'Blog Articles - View Comments / Add Reply'),
];
?>
@extends('layouts.new_admin_layout')
@section('custom_style')
<!-- webqom frontend style css -->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/reset.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/responsive-leyouts_webqom_front.css">
@endsection
@section('title','Admin | Articles list')
@section('content')
@section('page_header','CMS Pages')
<div class="page-content">
    <div class="row">
      <div class="col-lg-12">
        <h2>Blog Articles <i class="fa fa-angle-right"></i> View Comments / Add Reply</h2>
        <div class="clearfix"></div>
        @include('admin.partials.messages')
		 @if(!$comments->isEmpty())
                        @foreach($comments as $comment)
						<?php $date = $comment->created_at_fronted_format; ?>
                          @endforeach
                      @endif
		 <?php 
		if(isset($date)){ 
		$data = explode(date('Y'), $date); ?>
        <div class="pull-left"> Last updated: <span class="text-blue"><?php echo $data[0].date('Y'); ?> at <?php echo $data[1]; ?></span> </div>
		<?php } else { ?>
		
		<?php } ?>
        <div class="clearfix"></div>
        <p></p>
        <div class="clearfix"></div>
      </div>
      <!-- end col-lg-12 -->
      
      
      <div class="col-lg-12">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#client-info" data-toggle="tab">Add Reply</a></li>
        </ul> 

          <div id="myTabContent" class="tab-content">
          <div id="client-info" class="tab-pane fade in active">

            <div class="portlet">
                  <div class="portlet-header">
                    <div class="caption">Blog Article</div>
                    <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                  </div><!-- end porlet header -->
                  
                  <div class="portlet-body">
                    <div class="row">
                    
                      <form class="form-horizontal">
                           
                          <div class="col-md-6">
                              <div class="form-group">
                                      <label class="col-md-4 control-label">Article Title:</label>
                                      <div class="col-md-8">
                                        <p class="form-control-static">{!! $article->title !!}</p>
                                      </div>
                                </div>
                                <div class="form-group">
                                      <label class="col-md-4 control-label">Author:</label>
                                      <div class="col-md-8">
                                        <p class="form-control-static">{!! $article->author !!}</p>
                                      </div>
                                </div>
                                  
                              </div><!-- end col-md 6 -->
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label class="col-md-4 control-label">Status: </label>
                                      <div class="col-md-8">
                                        <p class="form-control-static">{{($article->status == 1) ? 'Active': 'InActive'}}</p>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                      <label class="col-md-4 control-label">Post Date: </label>
                                      <div class="col-md-8">
                                         <p class="form-control-static">{!! $article->post_date_month_in_middle !!}</p>
                                      </div>
                                    </div>
                                    
                                    
                                </div><!-- end col-md-6 -->
                              </form>
                    </div><!-- end row -->
                  </div><!-- end porlet-body -->
               </div><!-- end portlet -->
              
                <div class="portlet">
                  
                  <div class="portlet-header">
                    <div class="caption">Add Reply</div>
                    <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                  </div><!-- end porlet header -->
                     
                  <div class="portlet-body">
                    <div class="row">

                       <form class="form-horizontal" method="POST" action="{{ route('admin.articles.comment.store', [$article->id]) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group">
                            <label class="col-md-2 control-label">Reply Message </label>
                              <div class="col-md-9">
                                 <textarea class="form-control" rows="5" name="message"></textarea>
                              </div>
                          </div> 
                       <div class="clearfix"></div>
                    </div>
                    <!-- end row -->

                 </div><!-- end porlet-body -->   
                 <div class="clearfix"></div>
                 
                 
                 <div class="form-actions">
                    <div class="col-md-offset-5 col-md-7"> <button type="submit" class="btn btn-red">Reply &nbsp;<i class="fa fa-reply"></i></button>&nbsp; <a href="{{ route('admin.articles.index') }}"  class="btn btn-green">Back &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                 </div>
                 </form>
            </div><!-- End porlet -->
          </div><!-- end tab add reply -->

        </div><!-- end all tabs -->              

      </div><!-- end col-lg-12 -->
      
      <div class="col-lg-12">
      
        <div class="portlet">
                  
                  <div class="portlet-header">
                    <div class="caption">Comments</div>
                    <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                  </div><!-- end porlet header -->
                     
                  <div class="portlet-body">
                    <div class="row">
                      @if(!$comments->isEmpty())
                        @foreach($comments as $comment)
                       <div class="comment_wrap">
                          <div class="gravatar"><img src="{!! $comment->author->profile_pic !!}" alt="Webqom Admin" /></div>
                              <div class="comment_content">
                                  <div class="comment_meta">
                  
                                      <div class="comment_author">{!! $comment->author->name !!} - <i>{!! $comment->created_at_fronted_format !!}</i></div>
                                      
                                  </div>
                                  <div class="comment_text">
                                      <p>{!! $comment->message !!}</p>
                                   
                                  </div>
                              </div>
                          </div><!-- end section -->
                          @endforeach
                      @endif
                    </div><!-- end row -->
                    <div class="md-margin"></div>    
                 </div><!-- end porlet-body -->   
                 
                 <div class="clearfix"></div>
                 
                 
                 
            </div><!-- end portlet -->
        
      </div><!-- end col-lg-12 -->
      
      
      
    </div>
    <!-- end row -->
    </div>
    <!-- InstanceEndEditable -->
    <!--END CONTENT-->
@endsection
