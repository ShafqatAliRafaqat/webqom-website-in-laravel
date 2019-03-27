@php
$breadcrumbs = [
    array('url' => '/dashboard', 'name' => 'Dashboard'),
    array('url' => '/my_account' , 'name' => 'My Domains'),
    array('url' => false, 'name' =>  'Register A New Domain'),
];
@endphp
@extends('layouts.frontend_layout')
@section('title','Domain Search | Webqom Technologies')
@section('page_header','Domains')
@section('content')
<div class="clearfix"></div>
<div class="clearfix margin_bottom5"></div>

 <div class="one_full stcode_title9">
 	<h1 class="caps"><strong>Register A New Domain</strong></h1>
 </div>

<div class="clearfix"></div>

<div class="content_fullwidth">
	<div class="container">
    
    	@include('layouts.frontend_menu_login')

        <div class="three_fourth_less last">
             
           <div class="text-18px dark light">Find your new domain name. Enter your domain name to check for availability.</div>
           <div class="clearfix margin_bottom1"></div>
     
           <div class="cforms alileft">
            <h4>Check Availability of a New Domain</h4>
              	<form type="GET" id="gsr-contact">
                   	<input type="text" name="login_domain" id="domain" placeholder="eg. yourdomain.com">
                    <div class="alicent margin_top1">
                      <button class="btn btn-danger caps">
                        <i class="fa fa-lg fa-spinner"></i>
                        <b>Check Availability</b>
                      </button>&nbsp;
            		 </div>

               	</form>
           </div><!-- end cforms -->
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           <div class="clearfix"></div>
            
           @if(isset($response))
            @if($response->status != 0)
              <div class="alertymes4">
                  <h3 class="light">
                      <i class="fa fa-times-circle"></i>Sorry!
                      <strong>{{$response->domain}}</strong> is already taken!</strong>
                  </h3>
              </div>
              @else
              <div class="alertymes5">
                  <h3 class="light">
                      <i class="fa fa-check-circle"></i>Congratulations!
                      <strong>{{$response->domain}}</strong> is available!
                  </h3>
              </div>
              @endif
           <div class="clearfix margin_bottom3"></div> 
            
           {{-- <div>Other domains you might be interested in...</div> --}}
           <div class="clearfix margin_bottom1"></div>
           <form action="{{route('frontend.domain.configuration')}}" method="get">
           <div class="table-responsive">
                      
                <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%"><input type="checkbox"/></th>
                                <th>Domain Name</th>
                                <th>Registration Period</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              <tr>
                                <td class="alicent">
                                    @if($response->status == 0)
                                    <input type="checkbox" checked="checked"/>
                                    @else
                                    <i class="fa fa-times red"></i>
                                    @endif
                                </td>
                                <td>{{$response->domain}}</td>
                                <td>
                                    @if($response->status == 0)
                                    @foreach($domainPricingList as $dpl)
                                        @if($dpl->type == 'new' && $dpl->tld == '.'.explode('.',$response->domain)[1])
                                            <select class="form-control input-medium">
                                            @foreach(json_decode($dpl->pricing) as $price)
                                                <option value="{{$loop->index + 1}} year" {{ $loop->index == 1 ? 'selected="selected"':''}}>{{$loop->index + 1}} year(s) @ RM {{$price->l}}.00</option>
                                            @endforeach
                                            </select>
                                        @endif
                                    @endforeach
                                @else
                                <a href="http://{{$response->domain}}" target="_blank">WWW</a> | <a href="whois.html">WHOIS</a>
                                @endif
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
                         
            </div><!-- end table responsive -->
            
            
           <div class="clearfix"></div>
           <div class="divider_line7"></div>
           <div class="clearfix"></div>
           @if($response->status == 0)
           <div class="alicent">
                <a href="{{route('frontend.domain.configuration')}}" class="btn btn-danger caps"><i class="fa fa-arrow-circle-right"></i> <b>Continue</b></a>&nbsp;
            </div>
            @endif
          </form>
          @endif
            
        </div><!-- end section -->
    
    

    </div>
</div><!-- end content fullwidth -->

<div class="clearfix"></div>
<div class="divider_line"></div>


<div class="clearfix"></div>
@endsection()