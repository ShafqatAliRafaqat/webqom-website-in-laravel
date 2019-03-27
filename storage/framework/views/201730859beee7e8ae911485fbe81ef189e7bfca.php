<div class="page_title1 sty7">

    <h1>FIND YOUR PERFECT DOMAIN NAME
        <!--<em>Huge Choice. Low Prices. Register your perfect domain name today.</em>
        <span class="line2"></span>-->
    </h1>
    <div class="serch_area">
        <form method="get" action="<?php echo e(route('frontend.domain.search')); ?>">
            <div>
                <input class="enter_email_input" name="search_domain" id="samplees"
                       placeholder="Enter your domain name here..." required
                       onFocus="if(this.value == 'Enter your domain name here...') {this.value = '';}"
                       oninvalid="this.setCustomValidity('Please fill out this field')" oninput="setCustomValidity('')"
                       type="text">
                <input name="" value="Search Domain" class="input_submit" type="submit">
                <input type="hidden" name="ajax_domain_search_route" value="<?php echo e(route('frontend.domain.ajax_search')); ?>">
            </div>
        </form>

        <br/>
        <div class="molinks"><a href="domain_bulk_search.html"><i class="fa fa-caret-right"></i> Bulk Domain Search</a>
            <a href="domain_bulk_transfer.html"><i class="fa fa-caret-right"></i> Bulk Transfer</a></div>
    </div><!-- end section -->

</div><!-- end page title -->


<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

<div class="one_full stcode_title9">
    <h1 class="caps"><strong>Domain Search Result</strong></h1>
    <div class="loader"></div>
</div>

<div class="clearfix"></div>


<div class="feature_section102">

    <div class="plan">
        <div class="container">
            <div class="search_results">

            </div>
        </div>
    </div>
    <!-- end plan 1 -->


    <div class="clearfix"></div>


</div><!-- end featured section 102 -->

<div class="clearfix"></div>
<div class="margin_bottom5"></div>