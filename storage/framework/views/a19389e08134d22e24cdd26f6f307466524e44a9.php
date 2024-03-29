 <?php if ($domain_pricing instanceof \Illuminate\Pagination\LengthAwarePaginator): ?>
<?php $per_page=$domain_pricing->perPage(); ?>
<?php else: ?>
<?php $per_page=10; ?>
<?php endif ?>
<?php $page='domains';
 $sub_page='domain_addons';
$breadcrumbs=[
array('url'=>false,'name'=>'Services'),
array('url'=>false,'name'=>'Domains'),
array('url'=>'javascript:void','name'=>'Domain Addons Pricing- Listing'),
];
?>

<?php $__env->startSection('title','Admin | Domain Addons Pricing- Listing'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','Services'); ?>

<div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Domain Addons Pricing<i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>
              <?php echo $__env->make('admin.partials.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              
              <div class="pull-left"> Last updated: <span class="text-blue"><?php echo e($recent_update); ?></span> </div>
              <div class="clearfix"></div>
              <p></p>
              <div class="clearfix"></div>
            </div>
           
            <!-- end col-md-6 -->
            <div class="col-lg-12">
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Domain Addons Pricing Listing</div>
                  <p style="margin-top:30px" class="margin-top-10px"></p>
                  <a href="javascript:void(0)" class="btn btn-success" onclick="add_new_modal()">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                 <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="javascript:voi" onclick="open_modal_delete_selected()">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>&nbsp;
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                  <!--Modal add new client start-->
                  <!--Modal Add New plan feature start-->
                            <div id="modal-add-form" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title">Add New Domain Addon</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form">
                                      <form id="add_new_frm" class="form-horizontal">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Status</label>
                                          <div class="col-md-6">
                                            <div data-on="success" data-off="primary" class="make-switch">
                                              <input name="status" type="checkbox" checked="checked"/>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label"> Domain Addon <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <input name="title" type="text" class="form-control" placeholder="eg. DNS Management">
                                            <p class="red_error" id="title"></p>

                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label"> Pricing <span class="text-red">*</span></label>
                                          <div class="col-md-6">
                                            <input name="price" type="text" class="form-control" placeholder="eg. 0.00">
                                            <p class="red_error" id="price"></p>

                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label"> </label>
                                          <div class="col-md-6">
                                            
                                            <select class="form-control" name="price_type">
                                              <option>One Time</option>
                                              <option>/yr</option>
                                              <option>/mo</option>
                                            </select>

                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8">
                                              <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>
                                              &nbsp;
                                              <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;
                                                  <i class="glyphicon glyphicon-ban-circle"></i>
                                              </a>
                                          </div>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                  <!--END MODAL add new client -->
                  <!--Modal delete selected items start-->
                  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected <span id="count-seleted"></span> item(s)? </h4>
                        </div>
                        <div class="modal-body" id="delete-selected-body">
                        <div id="delete-selected-body-information"></div>
                          <p id="selected_zero" style="display:none" class="alert alert-danger">Please select at least one item for delete</p>
                          <div class="form-actions" id="delete-selected-buttons">
                            <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_bulk" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete selected items end -->
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
                            <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_all()" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete all items end -->
                </div>
                <div class="portlet-body">
                 
                  <div class="clearfix"></div>
                  <div class="table-responsive mtl">
                    <div class="form-group col-md-2">
                      <select class="form-control" id="per_page_select" onchange="per_page_change()">
                        <option value="10" <?php if($per_page==10): ?> selected="" <?php endif; ?>>Show 10</option>
                        <option value="15" <?php if($per_page==15): ?> selected="" <?php endif; ?>>Show 15</option>
                        <option value="20" <?php if($per_page==20): ?> selected="" <?php endif; ?>>Show 20</option>
                      </select>
                    </div>
                       <div class="clearfix"></div>
                      <form id="delete_client">

                    <table id="clients_list" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th width="1%"><input type="checkbox" class="all_checked"/></th>
                          <th>#</th>
                          <th>Domain Addons</th>
                          <th>Pricing (RM)</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php if(!empty($domain_pricing)): ?>
                             <?php if ($domain_pricing instanceof \Illuminate\Pagination\LengthAwarePaginator){ ?>
                                <?php $count=$domain_pricing->firstItem(); ?>
                              <?php }else{ ?>
                                <?php $count=1; ?>
                              <?php } ?>
                            <?php $__currentLoopData = $domain_pricing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                               
                               
                                    <tr id="clienttbl_row_<?php echo e($i->id); ?>">
                                      <td><input name="id[]" value="<?php echo e($i->id); ?>" type="checkbox"/></td>
                                      <td><?php echo e($count); ?></td>
                                      <td><?php echo e($i->title); ?></td>
                                      <td><?php echo e($i->price); ?></td>
                                      
                                      <td><span class="label label-xs label-<?php echo  $i->status==1 ? "success" :"red" ?>"><?php echo  $i->status==1 ? "Active" :"Inactive" ?></span></td>
                                      <td><a href="#" data-hover="tooltip" data-placement="top" title="Edit" data-target="#modal-edit-form-<?php echo e($i->id); ?>" data-toggle="modal"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-<?php echo e($i->id); ?>" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                          <!--Modal delete start-->
                                          <div id="modal-delete-<?php echo e($i->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                  <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this record? </h4>
                                                </div>
                                                <div class="modal-body">
                                                  <p><strong>#<?php echo e(isset($i->id) ? $i->id : ""); ?>:</strong> <?php echo e($i->title); ?> </p>
                                                  <div class="form-actions">
                                                    <div class="col-md-offset-4 col-md-8"> <button type="button" id="delete_single_button" class="btn btn-red" onclick="delete_single(<?php echo e($i->id); ?>)">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div id="modal-edit-form-<?php echo e($i->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog modal-wide-width">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                              <h4 id="modal-login-label3" class="modal-title">Edit Domain Addon</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div class="form">

                                                <div class="form-group">
                                                  <label class="col-md-3 control-label">Status</label>
                                                  <div class="col-md-6">
                                                    <div data-on="success" data-off="primary" class="make-switch">
                                                      <input id="edit_pf_status_<?php echo e($i->id); ?>" type="checkbox" <?php if($i->status==1): ?> checked="checked" <?php endif; ?> />
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="clearfix"></div>
                                                <div style="margin-top: 8px" class="form-group">
                                                  <label class="col-md-3 control-label">Domain Addon <span class="text-red">*</span></label>
                                                  <div class="col-md-6">
                                                    <input type="text" id="edit_pf_title_<?php echo e($i->id); ?>" class="form-control" placeholder="eg. RAM" value="<?php echo e($i->title); ?>" />
                                                    <p class="red_error" id="pf_error_title<?php echo e($i->id); ?>"></p>
                                                  </div>
                                                </div>

                                                <div class="clearfix"></div>
                                                <div class="form-group">
                                                <label class="col-md-3 control-label"> Pricing <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input name="price" type="text" value="<?php echo e($i->price); ?>" id="edit_price<?php echo e($i->id); ?>" class="form-control" placeholder="eg. 0.00">
                                                  <p class="red_error" id="err_edit_price<?php echo e($i->id); ?>"></p>

                                                </div>
                                        </div>
                                                <div class="clearfix"></div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label"> </label>
                                          <div class="col-md-6">
                                            
                                            <select id="edit_pricing_type<?php echo e($i->id); ?>" class="form-control" name="price_type">
                                              <option value="One Time" <?php if($i->pricing_type=='One Time'): ?> selected="" <?php endif; ?>>One Time</option>
                                              <option value="/yr" <?php if($i->pricing_type=='/yr'): ?> selected="" <?php endif; ?>>/yr</option>
                                              <option value="/mo" <?php if($i->pricing_type=='/mo'): ?> selected="" <?php endif; ?>>/mo</option>
                                            </select>

                                          </div>
                                        </div>
                                        <br>
                                                <br>  
                                                <div class="form-actions">
                                                  <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" onclick="edit_plan_feature(<?php echo e($i->id); ?>)" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                </div>

                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div> 
                                        <!-- modal delete end -->
                                      </td>
                                    </tr>
                                     <?php $count++; ?>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <?php endif; ?>
                        </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="10"></td>
                        </tr>
                      </tfoot>
                    </table>

                    <?php if ($domain_pricing instanceof \Illuminate\Pagination\LengthAwarePaginator){ ?>
                      <span>Showing  <?php echo e($domain_pricing->firstItem()); ?> to <?php echo e($domain_pricing->lastItem()); ?> of <?php echo e($domain_pricing->total()); ?></span>
                      <span class="pull-right"><?php echo e($domain_pricing->links()); ?></span>
                    <?php }else{ ?>
                      <span>Total records: <?php echo e(count($domain_pricing)); ?></span>
                    <?php } ?>
                      
                  <?php echo e(csrf_field()); ?>

                        </form>
                        
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <!-- end portlet -->
            </div>
            <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('custom_scripts'); ?>
            <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/bootstrap-switch/css/bootstrap-switch.css">
            <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>
            <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/bootstrap-datepicker/css/datepicker.css">
            <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
            <script type="text/javascript">
            page_url=base_url+'/admin/domain_pricing/';
              $(".all_checked").on("click",function(){
                if($(this).is(":checked")){
                  $("input[name='id[]']").each(function(i,item){
                    $(item).prop("checked",true);
                  })
                }else{
                  $("input[name='id[]']").each(function(i,item){
                    $(item).prop("checked",false);
                  })
                }
              });

                $('#add_new_frm').submit(function(event) {
                  $('.red_error').html('');
                  $('#msg_error').hide();
                     event.preventDefault();

                    $.ajax({
                        url:page_url+'new/addons',
                        type: 'POST',
                        data: $("#add_new_frm").serialize(),
                            success: function (data) {
                                window.location.reload();
//                                $('#modal-add-form').modal('hide');
//                                $('#modal-add-form').removeData();
                            },
                            error: function (response) {
                              $('#title').html(response.responseJSON.title);
                              $('#price').html(response.responseJSON.price);
                            }
                    });
                });
                
                
                $(document).on('click', '#delete_bulk', function(event) {
                  var selected=$('input[name="id[]"]:checked').length;
                  

                  event.preventDefault();
                  if (selected<1) {
                    $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
                  }else{
                    
                    $('#delete_bulk').attr("disabled",true);
                    $.ajax({
                      url: page_url+'delete',
                      type: 'POST',
                      
                      data: $("#delete_client").serialize(),
                    })
                    .done(function() {
                      location.reload();
                    })
                    .fail(function() {
                      $('#modal-delete-selected').modal('hide');
                       alert("Error: no client was selected to delete");
                    })
                    .always(function() {
                      $('#delete_bulk').attr("disabled",false);
                    });
                  }
                      
                });
                function delete_single(id) {
                      $('#delete_single_button').attr("disabled",true);
                      $.ajax({
                      url: page_url+'delete',
                      type: 'POST',
                      
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

            $(document).ready(function(){
                $(this).scrollTop(0);
            });
            window.onbeforeunload = function() {window.scrollTo(0,0);}
        $("#created_date").datepicker();
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
                      url: page_url+'get_details',
                      type: 'POST',
                      data: $("#delete_client").serialize()
                    })
                    .done(function(response) {
                      console.log(response);
                      for (var i=0; i <response.length; i++) {
                          $('#delete-selected-body-information').prepend('<p>'+
                            '<strong>#'+response[i].id+'</strong>:<span>'+response[i].title+'</span>'+
                            '</p>');                      
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
                
             function delete_all() {
               $.ajax({
                 url:base_url+'/clients/delete_all_clients',
                 type: 'POST',
                 data: {'_token': csrf_token},
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
             function per_page_change() {
                per_page=$("#per_page_select").find(":selected").val();
                console.log(page_url+per_page);
                window.location.href=page_url+'addons/'+per_page;
             }
            function add_new_modal() {
              /*$("#modal-add-client").modal('show');*/
              $('#modal-add-form').modal({
                  backdrop: 'static',
                  keyboard: false
              })
            }
            function edit_plan_feature(id) {
            $('.red_error').html("");
            var status=0;
            if ($('#edit_pf_status_'+id).is(":checked"))
            {
              status=1;
            }
            var title=$('#edit_pf_title_'+id).val();
            var price=$('#edit_price'+id).val();
            var pricing_type=$('#edit_pricing_type'+id).val();
            $.ajax({
              url: page_url+'update/addons',
              type: 'POST',
              data: {'_token':csrf_token,'price':price, 'pricing_type':pricing_type,'id': id,'status' : status ,'title' : title},
            })
            .done(function() {
              location.reload();
            })
            .fail(function(response) {
              $("#pf_error_title"+id).html(response.responseJSON.title);
              $("#err_edit_price"+id).html(response.responseJSON.price);
            })
            .always(function() {
              console.log("complete");
            });


          }
            </script>
<style type="text/css">

            /***********************************************/
/************ Jquery Bootstrap Switch *********/
.has-switch {
    border-color: #e5e5e5;
}

.has-switch span.switch-left {
    text-shadow: none;
    background-color: #ed5565;
    background-image: none;
    border: 1px solid #e5e5e5;
}

.has-switch label {
    border-left: 1px solid #e5e5e5;
    border-right: 1px solid #e5e5e5;
    text-shadow: none;
    background-image: none;
    border-color: #e5e5e5;
}

.has-switch span.switch-right {
    text-shadow: none;
    background-color: #f0f0f0;
    background-image: none;
    border-color: #e5e5e5;
    color: #999999;
}

.has-switch span.switch-primary:hover,
.has-switch span.switch-left:hover,
.has-switch span.switch-primary:focus,
.has-switch span.switch-left:focus,
.has-switch span.switch-primary:active,
.has-switch span.switch-left:active,
.has-switch span.switch-primary.active,
.has-switch span.switch-left.active,
.has-switch span.switch-primary.disabled,
.has-switch span.switch-left.disabled,
.has-switch span.switch-primary[disabled],
.has-switch span.switch-left[disabled] {
    background-color: #ed5565;
}

.has-switch span.switch-info:hover,
.has-switch span.switch-info:focus,
.has-switch span.switch-info:active,
.has-switch span.switch-info.active,
.has-switch span.switch-info.disabled,
.has-switch span.switch-info[disabled] {
    background: #5bc0de;
}

/************ Jquery Bootstrap Switch *********/
/*********************************************/
              .datepicker table tr td.active:hover, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active:active, .datepicker table tr td.active:hover:active, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.active, .datepicker table tr td.active:hover.active, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled:hover.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active:hover.disabled, .datepicker table tr td.active.disabled.disabled, .datepicker table tr td.active.disabled:hover.disabled, .datepicker table tr td.active[disabled], .datepicker table tr td.active:hover[disabled], .datepicker table tr td.active.disabled[disabled], .datepicker table tr td.active.disabled:hover[disabled]{
                background-color: #b8312f;
              }
            </style>
            <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>