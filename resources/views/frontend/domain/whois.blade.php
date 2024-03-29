@extends('layouts.frontend_layout')
@section('title','WhoIs | - Domain description')
@section('page_header','Domains')
@section('content')
    <div class="clearfix"></div>
    <div class="page_title1 sty7">

        <h1>FIND YOUR PERFECT DOMAIN NAME
            <!--<em>Huge Choice. Low Prices. Register your perfect domain name today.</em>
            <span class="line2"></span>-->
        </h1>

        <div class="serch_area">
            <form action="{{route('frontend.domain.searchLogin')}}" method="get">
                <input class="enter_email_input" name="login_domain" id="samplees" placeholder="Enter your domain name here..." oninvalid="$(this).setCustomValidity('Please fill out this field')" oninput="setCustomValidity('')" type="text" required="">
                <input name="" value="Search Domain" class="input_submit" type="submit">
            </form>
            <br />
            <div class="molinks"><a href="domain_bulk_search.html"><i class="fa fa-caret-right"></i> Bulk Domain Search</a> <a href="domain_bulk_transfer.html"><i class="fa fa-caret-right"></i> Bulk Transfer</a></div>
        </div><!-- end section -->

    </div>
    <div class="clearfix"></div>
    <div class="clearfix margin_bottom5"></div>

    <div class="one_full stcode_title9">
        @if(isset($response->message))
            <h1 class="light red"><i class="fa fa-times-circle"></i> {{$response->message}}</h1>
        @else
            <h1><strong>{{$domain}}</strong>
                @if($response->last_updated)
                    <em>Last updated on: {{date("Y-m-d h:i:s A",strtotime($response->last_updated))}}</em>
                @endif
            </h1>
        @endif
    </div>

    <div class="clearfix"></div>
    @if(!isset($response->message))
        <div class="content_fullwidth">
        <div class="container">
            <!-- left sidebar starts -->
            <div class="left_sidebar">
                <div class="sidebar_widget">

                    <div class="imgframe6">
                        <a href="http://{{$response->domain_name}}" target="_blank">
                            <img src="{{$response->image}}" alt="site"></a>
                        </a>
                    </div>
                    <div class="clearfix margin_bottom3"></div>
                    <h3 class="caps"><strong>Registration Info</strong></h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <td width="92">Name</td>
                                <td width="307">{{$response->domain_name}}</td>
                            </tr>
                            <tr>
                                <td width="92">Registrar</td>
                                <td width="307">
                                    <p class="pull-left">{{$response->registrar->name}}</p>
                                    <p class="pull-left sitecolor">Transfer to Webqom now!<br>Get</span> <span class="red"><strong>FREE</strong></span> Premium DNS</p>
                                    <p class="pull-right"><a href="/domain_transfer_login">Transfer</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="92">Address</td>
                                <td width="307">
                                    <div class="pull-left">{{$response->registrant->address}}</div>
                                    <div class="pull-right"><a href="#">Set Private</a></div>
                                </td>
                            </tr>
                            <tr>
                                <td width="92">Phone</td>
                                <td width="307">{{$response->registrant->phone}}</td>
                            </tr>
                            <tr>
                                <td width="92">Status</td>
                                <td width="307">
                                    @foreach($response->domain_status as $status)
                                        {{$status}}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td width="92">Created:</td>
                                <td width="307">{{date("Y-M-d",strtotime($response->creation_date))}}</td>
                            </tr>
                            @if(isset($response->updated_date))
                            <tr>
                                <td width="92">Updated:</td>
                                <td width="307">{{date("Y-M-d",strtotime($response->updated_date))}}</td>
                            </tr>
                            @endif
                            <tr>
                                <td width="92">Expires:</td>
                                <td width="307">
                                    <div class="pull-left">{{date("Y-M-d",strtotime($response->expiry_date))}}</div>
                                    <div class="pull-right"><a href="#">Back Order</a></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- end responsive table -->

                    <div class="clearfix margin_top2"></div>

                    <h3 class="caps"><strong>Name Servers</strong></h3>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            @foreach($response->name_server as $server)
                                <tr>
                                    <td width="172">{{$server}}</td>
                                    <td width="227">{{gethostbyname($server)}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- end responsive table -->
                    {{--<div class="clearfix margin_top2"></div>--}}

                    {{--<h3 class="caps"><strong>Search Rank</strong></h3>--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-hover table-striped">--}}
                            {{--<tr>--}}
                                {{--<td width="172">Google Page Rank:</td>--}}
                                {{--<td width="227">--}}
                                    {{--<div class="pull-left">2</div>--}}
                                    {{--<div class="pull-right"><a class="upgradeTextLink" href="#">Increase Rank</a></div></td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td width="172">Alexa Rank:</td>--}}
                                {{--<td width="227">Not Available</td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td width="172">Domain Age:</td>--}}
                                {{--<td width="227">9 Years 11 Months 15 Days </td>--}}
                            {{--</tr>--}}
                            {{--<tr>--}}
                                {{--<td width="172">Total Views:</td>--}}
                                {{--<td width="227">5</td>--}}
                            {{--</tr>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                    <!-- end responsive table -->
                </div><!-- end section -->
            </div><!-- end left sidebar -->
            <div class="content_right">

                <h2><strong>Raw Registrar Data</strong></h2>
                <?= $response->raw ?>
            </div><!-- end content right side -->

        </div>
    </div>
    @endif
    <div class="clearfix"></div>

@endsection