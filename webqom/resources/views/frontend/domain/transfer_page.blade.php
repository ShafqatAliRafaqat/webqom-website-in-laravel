<?php $currentURL = url()->current(); $baseURL= url('/');$basePath=str_replace($baseURL, '', $currentURL) ?>
@if(strpos($basePath,'ecommerce') !== false) 
@include('frontend.ecommerce')
@elseif(strpos($basePath,'email88') !== false)
@include('frontend.email88')
@elseif(strpos($basePath,'web88ir') !== false)
@include('frontend.web88ir')
@else
@extends('layouts.frontend_layout')
@section('title','Domains | - Webqom Technologies')
@section('content')
<div class="clearfix"></div>


<div class="page_title1 sty7">

        <h1>TRANSFER YOUR DOMAIN
        <!--<em>Huge Choice. Low Prices. Register your perfect domain name today.</em>
        <span class="line2"></span>-->
        </h1>
        
        <div class="serch_area">    	
            <form method="get" action="#">
                <input class="enter_email_input" name="samplees" id="samplees" value="" onFocus="if(this.value == '') {this.value = '';}" onBlur="if (this.value == '') {this.value = '';}" type="text" placeholder="www.transferyourdomain">
                <input name="" value="Transfer" class="input_submit" type="submit">
            </form>
            <br />
            <div class="molinks"><a href="domain_bulk_search.html"><i class="fa fa-caret-right"></i> Bulk Domain Search</a> <a href="domain_bulk_transfer.html"><i class="fa fa-caret-right"></i> Bulk Transfer</a></div>
        </div><!-- end section -->
        
    </div><!-- end page title -->
    
    
    <div class="clearfix"></div>
    <div class="clearfix margin_bottom5"></div>
    
     <div class="one_full stcode_title9">
            <h1 class="caps"><strong>Available Domain for Transfer </strong>    	</h1>
        </div>
    
    <div class="clearfix"></div>
    
    
    <div class="feature_section102">
    
        <div class="plan">
        <div class="container">
            
            <h3 class="light red"><i class="fa fa-times-circle"></i> Sorry! Your domain is <strong>LOCKED</strong> and cannot be transferred without being unlocked.</h3>
            <h3 class="light red"><i class="fa fa-times-circle"></i> Sorry! <strong>webqom.net does not appear to be registered yet.</strong> Try registering this domain instead.</h3>
            <h3 class="light green"><i class="fa fa-check-circle"></i> Congratulations! <strong>webqom.net</strong> is eligible for transfer!</h3>         
            <div class="alertymes6">
                    <h3 class="light alileft"><i class="fa fa-list-alt"></i><strong>Domain Transfer Checklist</strong></h3>
                    <div class="clearfix margin_bottom1"></div>
                    <div class="one_half_less">
                            <div class="alileft">
                                <ul>
                                    <li><i class="fa fa-long-arrow-right dark"></i><span class="text-18px dark light">Is Domain Privacy disabled?</span>&nbsp; <span class="text-18px green"><b>Yes</b></span></li>
                                    <li><i class="fa fa-long-arrow-right dark"></i><span class="text-18px dark light">Is the domain older than 60 days?</span>&nbsp; <span class="text-18px red"><b>No</b></span></li>
                                </ul>
                            </div>
                        </div>
                        
            </div><!-- end section -->
            <div class="clearfix margin_bottom3"></div>
              
            <div class="table-responsive mtl">
                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"/></th>
                                <th>Domain Name</th>
                                <th>Enter Domain Password</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
    
                              <tr>
                                <td class="alicent"><input type="checkbox"/></td>
                                <td>webqom.net</td>
                                <td>
                                       <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Enter domain password">
                                    </div>
                               </td>
                               <td><a href="#" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Add</b></a></td>
                              </tr>
                              
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="4"></td>
                              </tr>
                            </tfoot>
                          </table>
                          <div class="clearfix"></div>
                          
                          </div>
            
            <div class="clearfix"></div>
    
            <div class="alicent">
                <a href="shopping_cart.html" class="btn btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Add to cart</b></a>&nbsp;
            </div>
            <!-- end domain search result --> 
    
            <!-- end section -->
    
            
        </div>    
        </div>
        <!-- end plan 1 -->
        
        
        <div class="clearfix"></div>
        
        
    </div><!-- end featured section 102 -->
    
    <div class="clearfix"></div>
    
    
    <div class="feature_section103">
    <div class="container">
    
        <h1 class="caps white"><strong>{{$transferPage->featureHead}}</strong></h1>
        
        <div class="clearfix margin_bottom2"></div>

        @foreach((array)json_decode($transferPage->featureList) as $feature)
        <div class="box animate" data-anim-type="fadeIn" data-anim-delay="100">
            <i class="fa {{$feature->icon}}"></i>
            <h4>{{$feature->title}}<div class="line"></div></h4>
            <p class="sky-blue">{{$feature->description}}</p>
        </div><!-- end box -->
        @endforeach
        
        <div class="clearfix"></div>
        
        
    </div>
    </div><!-- end featured section 103 -->
    
    <div class="clearfix"></div>
    
    
    <div class="feature_section102">
    
        <div class="plan">
        <div class="container">
            
            <div class="onecol_sixty">
                <div class="clearfix margin_bottom3"></div>
                {!!$transferPage->editor1!!}
                {!!$transferPage->editor2!!}       	
                {!!$transferPage->editor3!!}
                <div class="clearfix"></div>
                
                <div class="clearfix margin_bottom3"></div>
            </div><!-- end section -->
            
            {!!$transferPage->editor4!!}
            
        </div>    
        </div>
        <!-- end plan one -->
    
    </div><!-- end featured section 102 -->
    
    
    <div class="clearfix"></div>
    
    
    <div class="feature_section102 parallax_section4">
    
        <div class="plan four">
        <div class="container">
            
                {!!$transferPage->editor5!!}
            
            <div class="onecol_sixty last">
                {!!$transferPage->editor6!!}
                {!!$transferPage->editor7!!}
                {!!$transferPage->editor8!!}
                {!!$transferPage->editor9!!}                
                {!!$transferPage->editor10!!}
                {!!$transferPage->editor11!!}
            </div><!-- end section -->
            
    
            
        </div>    
        </div>
        <!-- end plan 4 -->
        
    </div><!-- end featured section 102 -->

<div class="clearfix"></div>


<div class="feature_section11">
<div class="container">

    {!! $transferPage->editor12 !!}
    {!! $transferPage->editor13 !!}
    <div class="divider_line7"></div>
    <form type="POST" id="gsr-contact" onSubmit="return valid_datas( this );">
        <label class="text-16px dark"><b>Show the Domain Pricing for:</b></label>
            <div class="radiobut text-16px light dark">
                <input type="radio" id="all" checked="checked" name="tld"> <span class="onelb">All TLD</span>&nbsp;
                <input type="radio" id="general" name="tld"> <span class="onelb">General TLD</span>&nbsp;
                <input type="radio" id="america" name="tld"> <span class="onelb">America TLD</span>&nbsp;
                <input type="radio" id="asia" name="tld"> <span class="onelb">Asia Pacific TLD</span>&nbsp;
                <input type="radio" id="europe" name="tld"> <span class="onelb">Europe TLD</span>&nbsp;
            </div>
    </form>
    <div class="clearfix margin_bottom5"></div>
    
    note to programmer: show the TLD pricing list based on the selection above. If selected America TLD, then display the America TLD pricing table below.
    
    <ul class="tabs">
        <li class="active">New Registrations</li>
        <li>Renewals</li>
        <li>Transfers</li>
    </ul>

    <ul class="tab__content">
    
        <li class="active">
            <div class="content__wrapper">
                <h4>All TLD - New</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'new')
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                      
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 1 -->
        
        <li>
            <div class="content__wrapper">
                <h4>All TLD - Renewals</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'renewal')
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 2 -->
        
        <li>
            <div class="content__wrapper">
                <h4>All TLD - Transfers</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'transfer')
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 3 -->
 
        <li>
            <div class="content__wrapper">
                <h4>General TLD - New</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'new' && $dpl->domain_pricing_id == 11)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 4 -->
        <li>
            <div class="content__wrapper">
                <h4>General TLD - Renewals</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'renewal' && $dpl->domain_pricing_id == 11)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 5 -->
            <li>
                <div class="content__wrapper">
                    <h4>General TLD - Transfers</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domainPricingList as $dpl)
                                    @if($dpl->type == 'transfer' && $dpl->domain_pricing_id == 11)
                                        <tr>
                                            @php
                                            $prices = json_decode($dpl->pricing, true);
                                            $prices = (array)$prices;
                                            @endphp
    
                                            <td><b>{{ $dpl->tld }}</b></td>
                                            @for($i = 1; $i <= count($prices); $i++)
                                                @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                    <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                        <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                    </td>
                                                @endif
                                            @endfor
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>                                      
                                            
                    </div><!-- end table responsive -->
                </div>
            </li><!-- end tab 6 -->
            <li>
                <div class="content__wrapper">
                    <h4>America TLD - New</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domainPricingList as $dpl)
                                    @if($dpl->type == 'new' && $dpl->domain_pricing_id == 13)
                                        <tr>
                                            @php
                                            $prices = json_decode($dpl->pricing, true);
                                            $prices = (array)$prices;
                                            @endphp
    
                                            <td><b>{{ $dpl->tld }}</b></td>
                                            @for($i = 1; $i <= count($prices); $i++)
                                                @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                    <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                        <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                    </td>
                                                @endif
                                            @endfor
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>                                      
                                            
                    </div><!-- end table responsive -->
                </div>
            </li><!-- end tab 7 -->
            <li>
                <div class="content__wrapper">
                    <h4>America TLD - Renewals</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domainPricingList as $dpl)
                                    @if($dpl->type == 'renewal' && $dpl->domain_pricing_id == 13)
                                        <tr>
                                            @php
                                            $prices = json_decode($dpl->pricing, true);
                                            $prices = (array)$prices;
                                            @endphp
    
                                            <td><b>{{ $dpl->tld }}</b></td>
                                            @for($i = 1; $i <= count($prices); $i++)
                                                @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                    <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                        <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                    </td>
                                                @endif
                                            @endfor
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>                                      
                                            
                    </div><!-- end table responsive -->
                </div>
            </li><!-- end tab 8 -->
            <li>
                <div class="content__wrapper">
                    <h4>America TLD - Transfers</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domainPricingList as $dpl)
                                    @if($dpl->type == 'transfer' && $dpl->domain_pricing_id == 13)
                                        <tr>
                                            @php
                                            $prices = json_decode($dpl->pricing, true);
                                            $prices = (array)$prices;
                                            @endphp
    
                                            <td><b>{{ $dpl->tld }}</b></td>
                                            @for($i = 1; $i <= count($prices); $i++)
                                                @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                    <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                        <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                    </td>
                                                @endif
                                            @endfor
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>                                      
                                            
                    </div><!-- end table responsive -->
                </div>
            </li><!-- end tab 9 -->
            <li>
                <div class="content__wrapper">
                    <h4>Asia TLD - New</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domainPricingList as $dpl)
                                    @if($dpl->type == 'new' && $dpl->domain_pricing_id == 14)
                                        <tr>
                                            @php
                                            $prices = json_decode($dpl->pricing, true);
                                            $prices = (array)$prices;
                                            @endphp
    
                                            <td><b>{{ $dpl->tld }}</b></td>
                                            @for($i = 1; $i <= count($prices); $i++)
                                                @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                    <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                        <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                    </td>
                                                @endif
                                            @endfor
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>                                      
                                            
                    </div><!-- end table responsive -->
                </div>
            </li><!-- end tab 10 -->
            <li>
                <div class="content__wrapper">
                    <h4>Asia TLD - Renewals</h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="alicent">Per Year Pricing</th>
                                    <th class="alicent">1 Year</th>
                                    <th class="alicent">2 Years</th>
                                    <th class="alicent">3 Years</th>
                                    <th class="alicent">5 Years</th>
                                    <th class="alicent">10 Years</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($domainPricingList as $dpl)
                                    @if($dpl->type == 'renewal' && $dpl->domain_pricing_id == 14)
                                        <tr>
                                            @php
                                            $prices = json_decode($dpl->pricing, true);
                                            $prices = (array)$prices;
                                            @endphp
    
                                            <td><b>{{ $dpl->tld }}</b></td>
                                            @for($i = 1; $i <= count($prices); $i++)
                                                @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                    <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                        <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                    </td>
                                                @endif
                                            @endfor
                                            <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="clearfix"></div>                                      
                                            
                    </div><!-- end table responsive -->
                </div>
            </li><!-- end tab 11 -->
        <li>
            <div class="content__wrapper">
                <h4>Asia TLD - Transfers</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'renewal' && $dpl->domain_pricing_id == 14)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 11 -->
        <li>
            <div class="content__wrapper">
                <h4>Asia TLD - Transfers</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'transfer' && $dpl->domain_pricing_id == 14)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 12 -->
        <li>
            <div class="content__wrapper">
                <h4>Europe TLD - New</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'new' && $dpl->domain_pricing_id == 16)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 13 -->
        <li>
            <div class="content__wrapper">
                <h4>Europe TLD - Renewals</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'renewal' && $dpl->domain_pricing_id == 16)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 14 -->
        <li>
            <div class="content__wrapper">
                <h4>Europe TLD - Transfers</h4>
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="alicent">Per Year Pricing</th>
                                <th class="alicent">1 Year</th>
                                <th class="alicent">2 Years</th>
                                <th class="alicent">3 Years</th>
                                <th class="alicent">5 Years</th>
                                <th class="alicent">10 Years</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($domainPricingList as $dpl)
                                @if($dpl->type == 'transfer' && $dpl->domain_pricing_id == 16)
                                    <tr>
                                        @php
                                        $prices = json_decode($dpl->pricing, true);
                                        $prices = (array)$prices;
                                        @endphp

                                        <td><b>{{ $dpl->tld }}</b></td>
                                        @for($i = 1; $i <= count($prices); $i++)
                                            @if($i == 1 || $i == 2 || $i == 3 || $i == 5 || $i == 10)
                                                <td class="alicent"><span class="red">RM {{ $prices[$i]['s'] }}*</span><br/>
                                                    <span class="strike">RM {{$prices[$i]['l']}}*</span>
                                                </td>
                                            @endif
                                        @endfor
                                        <td><a href="#shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Buy</b></a></td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="clearfix"></div>                                      
                                        
                </div><!-- end table responsive -->
            </div>
        </li><!-- end tab 15 -->
    </ul>
    <div class="clearfix"></div>
    
    <p class="alileft red">* Plus ICANN fee of RM0.82 per domain name year. Certain TLD's only.<br/>
    ± com.au, net.au, and org.au domain names can only be registered for 2 years.</p>

</div>
</div><!-- end feature section 11 -->



<div class="clearfix"></div>


@endsection
@section('custom_scripts')

    <!-- MasterSlider -->
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}
js/masterslider/style/masterslider.css" />
    <link rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}
js/masterslider/skins/default/style.css" />

    <!-- owl carousel -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.transitions.css" 
rel="stylesheet">
    <link href="{{url('').'/resources/assets/frontend/'}}js/carouselowl/owl.carousel.css" 
rel="stylesheet">

    <!-- accordion -->
    <link rel="stylesheet" type="text/css" href="{{url('').'/resources/assets/frontend/'}}
js/accordion/style.css" />

    <!-- tabs 2 -->
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/tabacc.css" rel="stylesheet" />
    <link href="{{url('').'/resources/assets/frontend/'}}js/tabs2/detached.css" rel="stylesheet" />

    <!-- loop slider -->
    <link type="text/css" rel="stylesheet" href="{{url('').'/resources/assets/frontend/'}}
js/loopslider/style.css">
<script>
        $(document).ready(function(){
            var clickedTab = $(".tabs > .active");
            var tabWrapper = $(".tab__content");
            var activeTab = tabWrapper.find(".active");
            var activeTabHeight = activeTab.outerHeight();
            var tldID;
            var tmpNum;

            $('input[name="tld"]').on("click", function(){
                tldID = $(this).attr('id');
                $(".tabs > li.active").click();
            });

            // Show tab on page load
            activeTab.show();
            
            // Set height of wrapper on page load
            tabWrapper.height(activeTabHeight);
            
            $(".tabs > li").on("click", function() {
                // Remove class from active tab
                $(".tabs > li").removeClass("active");

                // Add class active to clicked tab
                $(this).addClass("active");

                // Update clickedTab variable
                clickedTab = $(".tabs .active");
                
                // fade out active tab
                activeTab.fadeOut(250, function() {
                    
                    // Remove active class all tabs
                    $(".tab__content > li").removeClass("active");
                    
                    // Get index of clicked tab
                    tldID = $('input:checked[name="tld"]').attr('id');

                    switch(tldID){
                        case 'all':
                        tmpNum = 0;
                        break;
                        case 'general':
                        tmpNum = 3;
                        break;
                        case 'america':
                        tmpNum = 6;
                        break;
                        case 'asia':
                        tmpNum = 9;
                        break;
                        case 'europe':
                        tmpNum = 13;
                        break;
                    }
                    var clickedTabIndex = clickedTab.index() + tmpNum;

                    // Add class active to corresponding tab
                    $(".tab__content > li").eq(clickedTabIndex).addClass("active");
                    
                    // update new active tab
                    activeTab = $(".tab__content > .active");
                    
                    // Update variable
                    activeTabHeight = activeTab.outerHeight();
                    
                    // Animate height of wrapper to new tab height
                    tabWrapper.stop().delay(50).animate({
                        height: activeTabHeight
                    }, 500, function() {
                        $(".tab__content > li:not(.active)").css("display", "none");
                        
                        // Fade in active tab
                        activeTab.delay(50).fadeIn(250);
                        
                    });
                });
            });
        });

</script>
@endsection
@endif
