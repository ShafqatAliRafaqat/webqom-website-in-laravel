@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <h3 class="light red"><i class="fa fa-times-circle"></i> {{ $error }}</h3>
    @endforeach
@else
    @if($response->status == 0)
        <h3 class="light green"><i class="fa fa-check-circle"></i> Congratulations! <strong>{{$response->domain}}</strong> is available!</h3>
        <div class="table-responsive mtl">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="1%"><input type="checkbox"/></th>
                        <th>Domain Name</th>
                        <th>Status</th>
                        <th>More Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td class="alicent">
                                <input type="checkbox" checked="checked"/>
                            </td>
                            <td>{{$response->domain}}</td>
                            <td>
                                <span class="label label-sm label-success">Available</span>
                            </td>
                            <td>
                                <select class="form-control input-medium">
                                    @foreach(json_decode($findedDomainPrice->pricing) as $price)
                                        <option value="{{$loop->index + 1}} year" {{ $loop->index == 1 ? 'selected="selected"':''}}>{{$loop->index + 1}} year(s) @ RM {{$price->l}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <a href="shopping_cart.html" class="btn-sm btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Add</b></a>&nbsp;
                                {{--  <a href="#" class="btn-sm btn-primary caps"><i class="fa fa-times"></i> <b>Remove</b></a>  --}}
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

        {{--  <a href="#" data-target="#notification" data-toggle="modal">note to programmer: pop up notification example of not choosing any hosting plan, remove this text once is done.</a>  --}}
    <!--Modal notification start-->
        <div id="notification" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>-->
                        <h4 id="modal-login-label3" class="modal-title"><i class="fa fa-exclamation-triangle"></i> You have not chosen any hosting plan yet</h4>
                    </div>
                    <div class="modal-body">

                        <div data-dismiss="modal" aria-hidden="true" class="plainmodal-close"></div>
                        <form>
                            <div class="cforms alileft">
                                <p>You have not chosen any hosting plan yet. Are you sure you wish to continue?</p>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning"><b>GET A HOSTING FOR DOMAIN</b></button>
                                    <button type="button" data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                    <ul role="menu" class="dropdown-menu alileft">
                                        <li><a href="cloud_hosting.html">Cloud Hosting</a></li>
                                        <li><a href="co-location_hosting.html">Co-location Hosting</a></li>
                                        <li><a href="dedicated_servers.html">Dedicated Servers</a></li>
                                        <li><a href="reseller_hosting.html">Reseller Hosting</a></li>
                                        <li><a href="shared_hosting.html">Shared Hosting</a></li>
                                        <li><a href="vps_hosting.html">VPS Hosting</a></li>
                                    </ul>
                                </div>
                            </div><!-- end cforms -->


                            <div class="clearfix margin_bottom1"></div>
                            <div class="divider_line2"></div>
                            <div class="clearfix margin_bottom1"></div>


                            <div class="clearfix"></div>

                            <div class="alicent">
                                <a href="#" class="btn btn-danger caps"><i class="fa fa-plus"></i> <b>Add Hosting</b></a>&nbsp;
                                <a href="#" data-dismiss="modal" class="btn btn-primary caps"><i class="fa fa-ban"></i> <b>No, thank you</b></a>&nbsp;
                            </div>

                            <div class="clearfix margin_bottom1"></div>

                        </form>

                    </div><!-- end modal-body -->
                </div>
            </div>
        </div>
    <!--END MODAL notification -->
        <div class="alicent">
            <div class="btn-group">
                <button type="button" class="btn btn-warning"><b>GET A HOSTING FOR DOMAIN</b></button>
                <button type="button" data-toggle="dropdown" class="btn btn-warning dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                <ul role="menu" class="dropdown-menu alileft">
                    <li><a href="cloud_hosting.html">Cloud Hosting</a></li>
                    <li><a href="co-location_hosting.html">Co-location Hosting</a></li>
                    <li><a href="dedicated_servers.html">Dedicated Servers</a></li>
                    <li><a href="reseller_hosting.html">Reseller Hosting</a></li>
                    <li><a href="shared_hosting.html">Shared Hosting</a></li>
                    <li><a href="vps_hosting.html">VPS Hosting</a></li>
                </ul>
            </div>
            <a href="shopping_cart.html" class="btn btn-danger caps"><i class="fa icon-basket-loaded"></i> <b>Proceed to checkout</b></a>&nbsp;
        </div>
        <!-- end domain search result -->
        <div class="clearfix margin_bottom3"></div>

        <!-- end section -->
    @elseif($response->status == 4)
        <h3 class="light red"><i class="fa fa-times-circle"></i> Invalid domain name/extension!</h3>
    @elseif($response->status == 5)
        <h3 class="light red"><i class="fa fa-times-circle"></i> Something went wrong!</h3>
    @else
        <h3 class="light red"><i class="fa fa-times-circle"></i> Sorry! <strong>{{$response->domain}}</strong> is already taken!</h3>
        <div class="table-responsive mtl">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th width="1%"><input type="checkbox"/></th>
                        <th>Domain Name</th>
                        <th>Status</th>
                        <th>More Info</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        <tr>
                            <td class="alicent">
                                <i class="fa fa-times red"></i>
                            </td>
                            <td>{{$response->domain}}</td>
                            <td>
                                <span class="label label-sm label-red">Unavailable</span>
                            </td>
                            <td>
                                <a href="http://{{$response->domain}}" target="_blank">WWW</a> | <a href="{{ route('frontend.domain.whois', $response->domain) }}">WHOIS</a>
                            </td>
                            <td>
                                <a href="#" class="btn-sm btn-danger caps disabled"><i class="fa icon-basket-loaded"></i> <b>Add</b></a>
                                {{--  <a href="#" class="btn-sm btn-primary caps"><i class="fa fa-times"></i> <b>Remove</b></a>  --}}
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
    @endif
@endif
