<?php $page = 'categories';
$breadcrumbs = [
    array('url' => false, 'name' => 'CMS Pages'),
    array('url' => false , 'name' => 'Domains'),
    array('url' => 'javascript:void', 'name' =>  'Domains Main Page- Edit'),
];
?>

<?php $__env->startSection('title','Admin | Domain Main Page - Edit'); ?>
<?php $__env->startSection('content'); ?>
<?php $__env->startSection('page_header','CMS Pages'); ?>
<!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Domains Main Page <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
                <?php if(Session::has('success')): ?>
              <div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>The information has been saved/updated successfully.</p>
              </div>
                <?php endif; ?>
                <?php if(Session::has('error')): ?>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved/updated. Please correct the errors.</p>
              </div>
                <?php endif; ?>
              <div class="pull-left"> Last updated: <span class="text-blue"><?php echo e($recent_update); ?></span> </div>
              <div class="clearfix"></div>
              <p></p>
              <div class="clearfix"></div>

            </div><!-- end col-lg-12 -->
            
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
                    <div class="feature_section10">
                        <div class="container">
                            
                            <div class="one_fifth_less">
                            <div class="box">
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor1; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor2; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor3; ?>

                                </div>
                            </div>
                            </div>
                            
                            <div class="one_fifth_less">
                            <div class="box">
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor4; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor5; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor6; ?>

                                </div>
                            </div>
                            </div>
                            
                            <div class="one_fifth_less">
                            <div class="box">
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor7; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor8; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor9; ?>

                                </div>
                            </div>
                            </div>
                            
                            <div class="one_fifth_less">
                            <div class="box">
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor10; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor11; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor12; ?>

                                </div>
                            </div>
                            </div>
                            
                            <div class="one_fifth_less last">
                            <div class="box">
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor13; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor14; ?>

                                </div>
                                <div contenteditable="true">
                                  <?php echo $mainPageData->editor15; ?>

                                </div>
                            </div>
                            </div>
                        
                        </div>
                        </div><!-- end featured section 10 -->
                        
                      <div class="clearfix"></div>
                        
                        <div class="feature_section12">
                            <div class="container">
                                
                                <div class="one_full stcode_title9">
                                  <div contenteditable="true">
                                        <?php echo $mainPageData->editor16; ?>

                                    </div>
                                </div>
                            
                                <div class="one_full_less alileft">
                                  <div contenteditable="true">
                                        <?php echo $mainPageData->editor17; ?>

                                    </div>
                                    
                                </div><!-- end section -->
                                
                                <div class="one_full stcode_title9">
                                    <div contenteditable="true">
                                      <?php echo $mainPageData->editor18; ?>

                                    </div>
                                </div>
                                
                                <div class="one_full_less alileft">
                                  <div contenteditable="true">  
                                      <?php echo $mainPageData->editor19; ?>

                                    </div>
                               
                                </div><!-- end section -->
                                
                                
                            
                            </div>
                            </div><!-- end featured section 12 -->
                            <div class="clearfix"></div>
                            
                            
                            <div class="feature_section11">
                                <div class="container">
                                  <div contenteditable="true">
                                      <?php echo $mainPageData->editor20; ?>

                                    </div>
                                    <div contenteditable="true">
                                      <?php echo $mainPageData->editor21; ?>

                                    </div>
                               </div>
                            </div><!-- end feature section 11-->
                            <div class="clearfix"></div>

                        
                        
                </div><!-- end portlet body -->
                <!-- save button start -->
                <div class="form-actions none-bg"><a href="#" class="btn btn-red preview-page">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a> <a href="#" class="btn btn-blue save-page">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></a>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                <!-- save button end -->
                
              </div>
            
            </div><!-- end col-lg-12 -->
            
            
          </div>
          <!-- end row -->
        </div>
        <!-- InstanceEndEditable -->
  <!--END MODAL Edit general feature -->
  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('custom_scripts'); ?>
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/jquery-nestable/nestable.css">
  <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/tinymce/js/tinymce/tinymce.min.js"></script>
  <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>vendors/ckeditor/ckeditor.js"></script>
  <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>js/ui-tabs-accordions-navs.js"></script>

  <!-- For jQuery redirect || Added by mrloffel -->
  <script src="<?php echo e(url('').'/resources/assets/admin/'); ?>js/jquery.redirect.js"></script>
  <!-- webqom frontend style css -->
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/style_webqom_front.css">
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/reset.css">
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/responsive-leyouts_webqom_front.css">
  <link type="text/css" rel="stylesheet" href="<?php echo e(url('').'/resources/assets/admin/'); ?>css/shortcodes.css">

  <script type="text/javascript">
    $('.save-page').click((e)=>{
        e.preventDefault();
        mainPageData = {'_token':csrf_token}
        $.each(window.CKEDITOR.instances,function(instance){
            mainPageData[instance] = window.CKEDITOR.instances[instance].getData()
        })
        $.ajax({
          url: base_url+'/admin/services/domain-main-page',
          type: 'POST',
          data: mainPageData,
        }).always(()=>{
            window.location.reload();
        })
    })

    console.log(csrf_token);

    var previewHtml;
    $('.preview-page').click((e)=>{
      e.preventDefault();
      mainPageData = {'_token':csrf_token}
      $.each(window.CKEDITOR.instances,function(instance){
          mainPageData[instance] = window.CKEDITOR.instances[instance].getData()
      });

      
      $.redirect(base_url+'/admin/services/domain-main-page-preview', {'mainPageData': mainPageData, '_token':csrf_token}, "POST", "_blank");

      
  })
</script>
<?php if(isset($_GET['tab'])): ?>
<?php $tab_name = $_GET['tab'];?>
<script>
  $('.nav-tabs a[href="#' + '<?php echo e($tab_name); ?>' + '"]').tab('show');
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>