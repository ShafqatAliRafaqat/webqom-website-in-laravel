<?php $page = 'categories';
$breadcrumbs = [
    array('url' => false, 'name' => 'CMS Pages'),
    array('url' => false , 'name' => 'Domains'),
    array('url' => 'javascript:void', 'name' =>  'Single Domain Transfer Page - Edit'),
];
?>
@extends('layouts.admin_layout')
@section('title','Admin | Single Domain Transfer Page - Edit')
@section('content')
@section('page_header','CMS Pages')
<!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Single Domain Transfer Page <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
              @if(Session::has('success'))
                <div class="alert alert-success alert-dismissable">
                  <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                  <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                  <p>The information has been saved/updated successfully.</p>
                </div>
              @endif
              @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved/updated. Please correct the errors.</p>
              </div>
              @endif
              <div class="pull-left"> Last updated: <span class="text-blue">{{$recent_update}}</span> </div>
              <div class="clearfix"></div>
              <p></p>
              <div class="clearfix"></div>
            </div>
            <!-- end col-lg-12 -->
            
            <div class="col-lg-12">
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Info</div>
                  <div class="clearfix"></div>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                	note to programmer: pls use the ckeditor version 4.5.4 version or newer. The css style and layout should follow 100% as shown in front end. 
                    <div class="feature_section102">

                        <div class="plan">
                        <div class="container">
                            
                            <div class="onecol_sixty">
                                <div class="clearfix margin_bottom3"></div>
                                <div contenteditable="true">
                                	{!! $transferPage->editor1 !!}
                                </div>
                                <div contenteditable="true">
                                	{!! $transferPage->editor2 !!}
                                </div>
                                <div contenteditable="true">       	
                                  {!! $transferPage->editor3 !!}
                                	<div class="clearfix"></div>
                               </div>
                                
                                <div class="clearfix margin_bottom3"></div>
                            </div><!-- end section -->
                            
                            <div contenteditable="true">
                            	{!! $transferPage->editor4 !!}
                            </div>
                            
                        </div>    
                        </div>
                        <!-- end plan one -->
                    
                    </div><!-- end featured section 102 -->
                    
                    
                    <div class="clearfix"></div>
                        
                    <div class="feature_section102 parallax_section4">

                        <div class="plan four">
                        <div class="container">
                            <div contenteditable="true">
                            	{!! $transferPage->editor5 !!}
    						</div>                      
			                             
                            <div class="onecol_sixty last">
                                <div contenteditable="true">
                                	{!! $transferPage->editor6 !!}
                                </div>
                                <div contenteditable="true">
                                	{!! $transferPage->editor7 !!}
                                </div>
                                <div contenteditable="true"> 
                                  {!! $transferPage->editor8 !!}
                                </div>
                                <div contenteditable="true">
                                	{!! $transferPage->editor9 !!}
                               </div>
                               
                               <div contenteditable="true"> 
                                {!! $transferPage->editor10 !!}
                               </div>
                               <div contenteditable="true"> 
                                {!! $transferPage->editor11 !!}
                               </div>
                            </div><!-- end section -->
                            
                    
                            
                        </div>    
                        </div>
                        <!-- end plan 4 -->
                        
                    </div><!-- end featured section 102 -->
                    
                    
                    <div class="clearfix"></div>
                            
                            
                            <div class="feature_section11">
                                <div class="container">
                                	<div contenteditable="true">
                                    {!! $transferPage->editor12 !!}
                                    </div>
                                    <div contenteditable="true">
                                    	{!! $transferPage->editor13 !!}
                                    </div>
                               </div>
                            </div><!-- end feature section 11-->
                            <div class="clearfix"></div>

                        
                        
                </div><!-- end portlet body -->
                <!-- save button start -->
                <div class="form-actions none-bg"> <a href="#" class="btn btn-red preview-page">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <a href="#" class="btn btn-blue save-page">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                <!-- save button end -->
                
              </div><!-- end portlet -->
            
            </div><!-- end col-lg-12 -->
            
            <div class="col-lg-12">
              
              <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">Feature Heading Edit</div>
                       
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive mtl">
                        <table class="table table-hover table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Feature Heading</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>1</td>
                              <td><span class="label label-xs label-success">Active</span></td>
                              <td>{{$transferPage->featureHead}}</td>
                              <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-feature-title" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                  <!--Modal Edit feature heading text start-->
                                  <div id="modal-edit-feature-title" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Feature Heading Text</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form">
                                            <form class="form-horizontal">
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Status</label>
                                                <div class="col-md-6">
                                                  <div data-on="success" data-off="primary" class="make-switch">
                                                    <input type="checkbox" checked="checked"/>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Feature Heading <span class="text-red">*</span> </label>
                                                <div class="col-md-6">
                                                   <input type="text" name="featureHead" class="form-control" value="{{$transferPage->featureHead}}"> 
                                                </div>
                                              </div>
                                              
                                              <div class="form-actions">
                                                <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red save-page">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!--END MODAL Edit feature heading text-->
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                            </tr>
                          </tfoot>
                        </table>
                        <div class="clearfix"></div>
                      </div>
                      <!-- end table responsive -->
                    </div>
                  </div>
                  <!-- End porlet -->
                  
                  <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">General Features Listing</div>
                      <p class="margin-top-10px"></p>
                      <a href="#" data-target="#modal-add-general-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                      <div class="btn-group">
                        <button type="button" class="btn btn-primary">Delete</button>
                        <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                        <ul role="menu" class="dropdown-menu">
                          <li><a href="#" onclick="deleteSelected()" data-target="#modal-delete-selected-general-feature" data-toggle="modal">Delete selected item(s)</a></li>
                          <li class="divider"></li>
                          <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                        </ul>
                      </div>
                      <!--Modal delete all items start-->
                      <div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
                            </div>
                            <div class="modal-body">
                              <div class="form-actions">
                                <form action="single-domain-transfer-update-feature" method="post">
                                  {{csrf_field()}}
                                  <input type="hidden" name="deleteAll" value="1">
                                <div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete all items end -->
                      
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      
                      <!--Modal Add new general ffeature start-->
                      <div id="modal-add-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog modal-wide-width">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label3" class="modal-title">Add New General Feature</h4>
                            </div>
                            <div class="modal-body">
                              <div class="form">
                                <form action="{{route('add_feature_single_transfer_page')}}" class="form-horizontal" method="POST">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <div class="col-md-6">
                                      <div data-on="success" data-off="primary" class="make-switch">
                                        <input type="checkbox" checked="checked"/>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Title <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <input name="title" type="text" class="form-control" placeholder="eg. Competitive Price">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Feature Description</label>
                                    <div class="col-md-6">
                                      <textarea name="description" class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                    <div class="col-md-6">
                                    	<div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                      <div class="margin-top-5px"></div>
                                      <input name="icon" type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor">
                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                    <div class="col-md-9">
                                    	<div class="xs-margin"></div>
                                        <input id="exampleInputFile2" type="file"/>
                                        <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                    </div>
                                  </div>
                                  <div class="form-actions">
                                    <div class="col-md-offset-5 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--END MODAL Add New general Feature-->
                      <!--Modal delete selected items start-->
                      <div id="modal-delete-selected-general-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                              <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                            </div>
                            <div class="modal-body">
                              <p><strong>#1:</strong> Competitive Price</p>
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- modal delete selected items end -->
                      
                    </div>
                    <div class="portlet-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Title</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach((array)json_decode($transferPage->featureList) as $feature)
                              <tr>
                                <td><input type="checkbox" id="selectFeature" data-indexNum="123"></td>
                                <td>{{$loop->index}}</td>
                                <td><span class="label label-xs label-success">Active</span></td>
                                <td>{{$feature->title}}</td>
                                <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-general-feature-{{$loop->index}}" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-general-feature-1-{{$loop->index}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                  <div id="modal-edit-general-feature-{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                      <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                            <h4 id="modal-login-label3" class="modal-title">General Feature Edit</h4>
                                          </div>
                                          <div class="modal-body">
                                            <div class="form">
                                              <form class="form-horizontal" method="POST" action="{{route('update_feature_single_transfer_page')}}">
                                                {{ csrf_field() }}
                                                <input name="index" type="hidden" value="{{$loop->index}}">
                                                <div class="form-group">
                                                  <label class="col-md-3 control-label">Status</label>
                                                  <div class="col-md-6">
                                                    <div data-on="success" data-off="primary" class="make-switch">
                                                      <input type="checkbox" checked="checked"/>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Feature Title <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                      <input name="title" type="text" class="form-control" placeholder="eg. Competitive Price" value="{{$feature->title}}">
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Feature Description</label>
                                                    <div class="col-md-6">
                                                      <textarea name="description" class="form-control">{{$feature->description}}</textarea>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Insert CSS Icon or </label>
                                                    <div class="col-md-6">
                                                        <div class="text-blue border-bottom">Please choose <strong>ONE</strong> of the following options for "Feature Icon".</div>
                                                      <div class="margin-top-5px"></div>
                                                      <input name="icon" type="text" class="form-control" id="inputContent" placeholder="eg. fa-rocket or icon-anchor" value="{{$feature->icon}}">
                                                      <div class="help-block">Please refer here for complete <a href="icons_sevices.html" target="_blank">icon options.</a></div>
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label class="col-md-3 control-label">Upload Icon Image</label>
                                                    <div class="col-md-9">
                                                        <div class="xs-margin"></div>
                                                        <img src="../../resources/assets/frontend/images/about_us/icon_cloud_app.png" alt="Competitive Price" class="img-responsive"><br/>
                                                        <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-icon" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                                        <!--Modal delete icon start-->
                                                        <div id="modal-delete-icon" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                                          <div class="modal-dialog">
                                                            <div class="modal-content">
                                                              <div class="modal-header">
                                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this icon image? </h4>
                                                              </div>
                                                              <div class="modal-body">
                                                                <p><img src="../images/about_us/icon_cloud_app.png" alt="Competitive Price" class="img-responsive"></p>
                                                                <div class="form-actions">
                                                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                      </div>
                                                      <!-- modal delete end -->
                                                      <div class="xs-margin"></div> 
                                                            
                                                        <input id="exampleInputFile2" type="file"/>
                            
                                                        <span class="help-block">(Image dimension: 64 x 64 pixels, PNG only, Max. 1MB) </span>
                                                    </div>
                                                  </div>
                                                
                                                <div class="form-actions">
                                                  <div class="col-md-offset-5 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                  </div>
                                  <!--END MODAL Edit general feature -->
                                  <!--Modal delete start-->
                                  <div id="modal-delete-general-feature-1-{{$loop->index}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                              </div>
                                              <div class="modal-body">
                                                <p><strong>#{{$loop->index}}:</strong> {{ $feature->title }}</p>
                                                <div class="form-actions">
                                                  <form action="{{route('delete_feature_single_transfer_page')}}" method="POST">
                                                    {{ csrf_field()}}
                                                    <input type="hidden" name="index" value="{{$loop->index}}">
                                                  <div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- modal delete general feature end -->
                                </td> 
                              </tr>
                              @endforeach()
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="5"></td>
                              </tr>
                            </tfoot>
                          </table>
                          <div class="clearfix"></div>
                       </div><!-- end table responsive -->
                    </div>
                  </div><!-- end portlet -->
            
            </div><!-- end col-lg-12 -->
          
          </div><!-- end row -->
        </div>
        <!-- InstanceEndEditable -->


        <!--Modal Edit general feature start-->
  @endsection
  @section('custom_scripts')
  <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-nestable/nestable.css">
  <script src="{{url('').'/resources/assets/admin/'}}vendors/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}vendors/ckeditor/ckeditor.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}js/ui-tabs-accordions-navs.js"></script>
  <!-- webqom frontend style css -->
  <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style_webqom_front.css">
  <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/reset.css">
  <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/responsive-leyouts_webqom_front.css">
  <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/shortcodes.css">

  <script type="text/javascript">
    $('.save-page').click((e)=>{
        e.preventDefault();
        transferPage = {'_token':csrf_token};
        transferPage['featureHead'] = $('input[name=featureHead]').val();
        $.each(window.CKEDITOR.instances,function(instance){
          transferPage[instance] = window.CKEDITOR.instances[instance].getData()
        })
        $.ajax({
          url: base_url+'/admin/services/single-domain-tranfser-edit',
          type: 'POST',
          data: transferPage,
        }).always(()=>{
            window.location.reload();
        })
    })

    var previewHtml;
    $('.preview-page').click((e)=>{
      e.preventDefault();
      transferPage = {'_token':csrf_token}
      $.each(window.CKEDITOR.instances,function(instance){
        transferPage[instance] = window.CKEDITOR.instances[instance].getData()
      })
      $.ajax({
        url: base_url+'/admin/services/single-domain-tranfser-preview',
        type: 'POST',
        data: transferPage,
        success: function(result){
          var w = window.open();
          $(w.document.body).html(result);
        }
      }).fail(function(error) {
        var w = window.open();
          $(w.document.body).html(error.responseText);
      })
    })

    function deleteSelected(){
      var inputes = $('input#selectFeature:checked[type=checkbox]');
      console.log(inputes);
      console.log(inputes.data("indexNum"));
    }
</script>
@if(isset($_GET['tab']))
<?php $tab_name = $_GET['tab'];?>
<script>
  $('.nav-tabs a[href="#' + '{{$tab_name}}' + '"]').tab('show');
</script>
@endif
@endsection