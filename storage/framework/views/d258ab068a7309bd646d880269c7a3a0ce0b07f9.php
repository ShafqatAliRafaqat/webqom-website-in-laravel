
<div class="clearfix"></div>
<div class="margin_bottom5"></div>


<div class="accordion">

<div class="container">

    
    <div id="st-accordion-four" class="st-accordion-four alileft">
    
    	<h2><strong>Frequently Asked Questions</strong></h2>
        <ul>
                <?php if(!empty($faq)): ?>
                <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <li>
                <a href="#"><?php echo e($i->title); ?><span class="st-arrow">Open or Close</span></a>
                <div class="st-content">
              		<?php echo $i->content; ?>         
                </div>
            </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
         <?php endif; ?>
     
    	</ul>
        
    </div>
    
    
</div>

</div><!-- faq end -->
