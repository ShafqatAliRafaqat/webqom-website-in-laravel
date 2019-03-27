<?php $page='categories';
$breadcrumbs=[
array('url'=>url('admin/categories'),'name'=>'Services'),
array('url'=>url('admin/categories'),'name'=>'All Categories -Listing'),

];
?>
<style type="text/css">
  .drag-handle{
    cursor: move !important;
  }
</style>
@extends('layouts.admin_layout')
@section('title','Admin | Categories')
@section('content')
@section('page_header','Services')
<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>All Categories <i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>
              @include('admin.partials.messages')
              
              <div class="pull-left"> Last updated: <span class="text-blue">{{$recent_update}}</span> </div>
              <div class="clearfix"></div>
              <p></p>
              
              
              <div class="clearfix"></div>
            </div>
            <!-- end col-lg-12 -->
            
                    
                    <div class="col-lg-12">
                      <div class="portlet">
                            <div class="portlet-header">
                              <div class="caption">Categories Listing</div>                    
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                            </div>
                            <div class="portlet-body">
                              <div class="text-blue text-15px" style="line-height: 150%">You can drag and drop the categories. To add a new category/sub category, please click the "Duplicate" icon to edit it. Then drag and drop the position according to your preference. Add/upload/edit "Menu Image" is only applicable for the second level of the category, eg. Cloud Hosting, Co-location Hosting etc...</div>
                                
                                note to programmer: pls make the menu drag and drop its position.
                                <div class="sm-margin"></div>
                              <div id="nestable" class="dd">
                                    <ol class="dd-list">
                                    @if(!empty($categories))
                                      @foreach($categories as $i)
                                        <li data-id="{{$i->id}}" class="dd-item">
                                            <div class="dd-handle"> <span class="drag-handle">{{$i->title}} 
                                            <span class="label label-sm label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span>
                                            </span>
                                            
                                              <div class="pull-right">
                                                  <a href="{{url('admin/index-plan')}}" data-hover="tooltip" data-placement="top" title="Add Plan &amp; Page Edit"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a>                                                 
                                                </div>
                                            </div>
                                            @if($i->sub_categories)
                                              <ol class="dd-list">
                                              @foreach($i->sub_categories->sortBy('sort_order') as $j)
                                                <li data-id="{{$j->id}}" class="dd-item">
                                                    <div class="dd-handle"><span class="drag-handle">{{$j->title}} 
                                                    <span class="label label-sm label-{{$j->status?'success':'danger'}}">{{$j->status?'Active':'Inactive'}}</span>
                                                    </span>
                                                      <div class="pull-right">
                                                          <a href="javascript:void" onclick="duplicate({{$j->id}})" data-hover="tooltip" data-placement="top" title="Duplicate/New Category"><span class="label label-sm label-blue"><i class="fa fa-copy"></i></span></a>
                                                            <a href="javascript:void" onclick="edit_plan_feature({{$j->id}},{{$j->status}},'{{$j->title}}')" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                                            <a href="{{url('admin/index-plan')}}" data-hover="tooltip" data-placement="top" title="Add Plan &amp; Page Edit"><span class="label label-sm label-warning"><i class="fa fa-plus"></i></span></a>   
                                                            <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$j->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>                                                        </div>
                                                    </div>
  
                                                </li>
                                                <div id="modal-delete-{{$j->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                                  <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <p>{{$j->title}}</p>
                                                                  <div class="form-actions">
                                                                    <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_single({{$j->id}})" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>  
                                              @endforeach
                                            </ol>
                                            @endif
                                        </li>
                                      @endforeach
                                    @endif
                                   
                                        
                                        
                                    </ol>
                                </div>
                                <div class="clearfix"></div>   
                            </div>
                            <!-- end portlet body -->
                        </div>
                        <!-- end porlet -->
                    </div>
                    <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
        <!-- InstanceEndEditable -->
        <!--END CONTENT-->
                                <!--Modal delete selected items start-->
                  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the ssselected <span id="count-seleted"></span> item(s)? </h4>
                        </div>
                        <div class="modal-body" id="delete-selected-body">
                        <div id="delete-selected-body-information"></div>
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select aleast one record for delete</p>
                          <div class="form-actions" id="delete-selected-buttons">
                            <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
  
                <!-- modal delete selected items end -->
                                                        <div id="modal-edit-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Plan Feature</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form">
                                            <form id="plan_feature_edit_frm" class="form-horizontal">
                                            <input type="hidden" id="edit_id" name="id">
                                            {!!csrf_field()!!}
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Status</label>
                                                <div class="col-md-6">
                                                  <div data-on="success" style="    height: 6%;" data-off="primary" class="make-switch">
                                                    <input id="edit_status" name="status" type="checkbox" checked="checked"/>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label class="col-md-3 control-label">Category <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input id="edit_title" name="title" type="text" class="form-control" placeholder="eg. RAM" value="RAM">
                                                  <p id="error_edit_title" class="red_error"></p>
                                                </div>
                                              </div>
                                              <div class="form-actions">
                                                <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" id="edit_plan_feature" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!--Modal delete selected items start-->
@endsection
@section('custom_scripts')
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}vendors/jquery-nestable/nestable.css">
  <script src="{{url('').'/resources/assets/admin/'}}vendors/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}vendors/ckeditor/ckeditor.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}js/ui-tabs-accordions-navs.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}vendors/jquery-nestable/jquery.nestable.js"></script>
  <script src="{{url('').'/resources/assets/admin/'}}js/ui-nestable-list.js"></script>
  <!-- webqom frontend style css -->
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/style_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/reset.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/responsive-leyouts_webqom_front.css">
<link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/admin/'}}css/shortcodes.css">

<script type="text/javascript">
  $(document).on('click', '#save_feature_plan', function(event) {
    $('#plan_feature_frm').submit();
   });
  $(document).on('submit', '#plan_feature_frm', function(event) {
    event.preventDefault();
    $.ajax({
      url: base_url+'/admin/plan_features/new',
      type: 'POST',
      data: $('#plan_feature_frm').serialize(),
    })
    .done(function() {
      location.reload();
    })
    .fail(function(response) {
                validation_errors=response.responseJSON;
                 console.log(validation_errors);
                $.each(validation_errors, function(k, v) {
                    //display the key and value pair
                    //console.log(k + ' is ' + v);
                    $('#'+k).html(v)
                   
                });
    })
    .always(function() {
      console.log("complete");
    });
  });
 function edit_plan_feature(id,status,title) {
    
    if (status==1) {
      $('#edit_status').prop('checked',true);
    }else{
      $('#edit_status').prop('checked',false);
    }
    $('#edit_title').val(title);
    $('#edit_id').val(id);
    $('#modal-edit-plan-feature').modal('show');
    
  }
  $(document).on('click', '#edit_plan_feature', function(event) {
    alert($('#edit_id').val());
      $.ajax({
      url: base_url+'/admin/categories/'+$('#edit_id').val(),
      type: 'PATCH',
      data: $('#plan_feature_edit_frm').serialize(),
      })
      .done(function() {
        location.reload();
      })
      .fail(function(response) {
                  validation_errors=response.responseJSON;
                   console.log(validation_errors);
                  $.each(validation_errors, function(k, v) {
                      //display the key and value pair
                      //console.log(k + ' is ' + v);
                      $('#error_edit_'+k).html(v)
                     
                  });
      })
      .always(function() {
        console.log("complete");
      });
  });
  function save_content(publish) {
    /*var left_header = CKEDITOR.instances.left_header.getData();
    var right_header = CKEDITOR.instances.right_header.getData();
    */var left_content = CKEDITOR.instances.left_content.getData();
    var right_content = CKEDITOR.instances.right_content.getData();
    //var left_content = CKEDITOR.instances.cms_section.getData();
    console.log(left_content)
     $.ajax({
       url: base_url+'/admin/pages/new',
       type: 'POST',
       data: {'_token':'{{csrf_token()}}',
               'name':'cloud hosting', 
               'left_content':left_content, 
               'right_content':right_content, 
               'publish':0, 
            },
         })
         .done(function(response) {
           $('#success_message_cms').show();
           setTimeout(function() {
            $('#success_message_cms').hide();
           }, 3000);
         })
         .fail(function() {
           console.log("error");
         })
         .always(function() {
           console.log("complete");
         });
     }
     function delete_single(id) {
                      $('#delete_single_button').attr("disabled",true);
                      $.ajax({
                      url: base_url+'/admin/categories/'+id,
                      type: 'DELETE',
                      
                      data: {'_token':csrf_token,'id':id}
                    })
                    .done(function() {
                        location.reload();
                    })
                    .fail(function() {
                      alert("some error");
                    })
                    .always(function() {
                      console.log("complete");
                    });
                    } 
                    function open_modal_delete_selected() {
                  $('#delete-selected-body-information').html("");
                  $("#modal-delete-selected").modal('show');
                  var selected=$('input[name="id[]"]:checked').length;
                  if (selected<1) {
                    $('#selected_zero').show()
                    $('#delete-selected-buttons').hide()
                  }else{
                    /*get seleccted users details*/
                    $.ajax({
                      url: base_url+'/admin/plan_features/get_details',
                      type: 'POST',
                      data: $("#delete_client").serialize()
                    })
                    .done(function(response) {
                      console.log(response);
                      for (var i=0; i <response.length; i++) {
                          $('#delete-selected-body-information').prepend('<p>'+
                            '<strong>#'+response[i].id+'</strong>:<span>'+response[i].title+'</p>');                      
                      }
                      })
                    .fail(function() {
                      console.log("error");
                    })
                    .always(function() {
                      $('#selected_zero').hide()
                      $('#delete-selected-buttons').show();
                      $('#count-seleted').html(selected);
                    });
                    
                    /*End*/
                    
                  }
                } 
$(function () {
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    
    // activate Nestable for list 2
    $('#nestable2').nestable({
        group: 1
    }).on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
    updateOutput($('#nestable2').data('output', $('#nestable2-output')));

    $('#nestable-menu').on('click', function (e) {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

});
     $('#nestable').nestable({
        group: 1,
        handleClass: 'drag-handle',
        /*maxDepth :2,*/
    }).on('change', function () {
      $.ajax({
        url: base_url+'/admin/categories/update_sort',
        type: 'POST',
        data: {'_token': csrf_token, 'data':$('#nestable').nestable('serialize')},
      })
      .done(function() {
        location.reload();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
       console.log();
    });

    // output initial serialised data

    $(document).on('submit', '#frm_new_category', function(event) {
      event.preventDefault();
        $.ajax({
          url: base_url+'/admin/categories',
          type: 'POST',
          data: $('#frm_new_category').serialize(),
        })
        .done(function() {
          location.reload();
        })
        .fail(function(response) {
                validation_errors=response.responseJSON;
                 console.log(validation_errors);
                $.each(validation_errors, function(k, v) {
                    //display the key and value pair
                    //console.log(k + ' is ' + v);
                    $('#err_catrgory_'+k).html(v)
                   
                });
    })
        .always(function() {
          console.log("complete");
        });
        
    });
    function duplicate(id) {
      $.ajax({
        url: base_url+'/admin/categories',
        type: 'POST',
        data: {'_token': csrf_token, 'id':id},
      })
      .done(function() {
        location.reload();
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    }
   
</script>
@endsection