
<div class="clearfix"></div>
<div class="margin_bottom5"></div>


<div class="accordion">

<div class="container">

    
    <div id="st-accordion-four" class="st-accordion-four alileft">
    
    	<h2><strong>Frequently Asked Questions</strong></h2>
        <ul>
                @if(!empty($faq))
                @foreach($faq as $i)
            <li>
                <a href="#">{{$i->title}}<span class="st-arrow">Open or Close</span></a>
                <div class="st-content">
              		{!!$i->content!!}         
                </div>
            </li>
              @endforeach
         @endif
     
    	</ul>
        
    </div>
    
    
</div>

</div><!-- faq end -->
