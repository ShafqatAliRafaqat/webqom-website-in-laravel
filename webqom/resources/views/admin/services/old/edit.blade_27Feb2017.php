   <?php $page = 'categories';
$breadcrumbs = [
    array('url' => false, 'name' => 'Services'),
    array('url' => url('admin/categories'), 'name' => 'Categories'),
    array('url' => url('admin/services/' . $page_slug), 'name' => $page_name . ' Page'),
    array('url' => 'javascript:void', 'name' => $page_name . '- Edit'),
];
?>

        @extends('layouts.admin_layout')
        @section('title','Admin | '.$page_name.'-Edit')
        @section('content')
        @section('page_header','Services')

        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>{{$page_name}} Plan<i class="fa fa-angle-right"></i> Edit</h2>
              @include('admin.partials.messages')
              <div class="clearfix"></div>
              <div hidden="" id="success_message" class="messages alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>The information has been saved/updated successfully.</p>
              </div>
              <div hidden="" id="error_message" class="messages alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved/updated. Please correct the errors.</p>
              </div>
              <div class="clearfix"></div>
              @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
              <p></p>
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#general-pricing" data-toggle="tab">General/Pricing</a></li>
                @if($is_ssl_page==0)<li><a href="#plan-feature-details" data-toggle="tab">Plan Feature Details</a></li>@endif
                @if($is_ssl_page==1)<li><a href="#plan-feature-details" data-toggle="tab">Plan Feature Listing</a></li>@endif
                <li><a href="#free-domain" data-toggle="tab">Free Domain</a></li>
              </ul>
              <div  class="tab-content">

                <div id="general-pricing" class="tab-pane fade in active">
                  <form id="frm_genrel" class="form-horizontal" action="{{url('/admin/index-plan/')}}" method="POST" enctype="multipart/form-data">
                    <div class="portlet">
                    <div class="portlet-header">
                      <div class="caption">General</div>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

                    </div>
                    <input type="hidden" name="page" value="{{$page_name}}">

                    <div class="portlet-body">
                      <div class="row">
                            <div class="col-md-12">

                                <div id="frm_genrel" class="form-horizontal" >
                                            <div class="form-group">
                                                {{csrf_field()}}
                                                <label class="col-md-3 control-label">Status <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <div data-on="success" data-off="primary" class="make-switch">
                                                    <input type="checkbox" name="status"  @if($plan->status==1) checked="checked" @endif/>
                                                </div>
                                                <p class="red_error" id="status"></p>
                                            </div>
                                            </div>
                                            <!--<div class="form-group">
                                                <label class="col-md-3 control-label">Service Code <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="eg. LCL-1">
                                                </div>
                                            </div>-->
                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Service Code <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input type="text" value="{{$plan->service_code}}" name="service_code" class="form-control" placeholder="eg. LCL-1">
                                                  <p class="red_error" id="service_code"></p>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                                <label for="inputFirstName" class="col-md-3 control-label">Plan Name <span class="text-red">*</span></label>
                                                <div class="col-md-6">
                                                  <input value="{{$plan->plan_name}}" name="plan_name" type="text" class="form-control" placeholder="eg. L Cloud">
                                                  <p class="red_error" id="plan_name"></p>
                                                </div>
                                            </div>
                                            <input type="hidden" name="is_ssl_page" value="{{$is_ssl_page}}">
                                             @if($is_ssl_page==1)
                                        <div class="form-group">
                                                <label class="col-md-3 control-label">Upload Icon Image <span class="text-red">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="xs-margin"></div>
                                                    <input  accept="image/png" name="icon_image" type="file"/>
                                                    <span class="help-block">(Image dimension: 70 x 70 pixels, PNG only, Max. 1MB) </span>
                                                    <p class="red_error" id="icon_image"></p>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Upload Icon Image <span class="text-red">*</span></label>
                                                <div class="col-md-9">
                                                    <img id="icon_img_src" src="{{url('').'/storage/ssl/icon_images/'.$plan->icon_image}}" width="80px" alt="Protect One Website" />
                                                </div>
                                             </div>
                                        @endif
                                            <div class="clearfix"></div>
                                            <div class="form-group">
                                              <label class="col-md-3 control-label">Promo Behaviour</label>

                                                <div class="col-md-6">
                                                    <div class="xss-margin"></div>
                                                    <div class="radio-list">
                                                        <label><input @if($plan->promo_behaviour=='none') checked="checked" @endif name="promo_behaviour" id="promo_radio" type="radio" value="none" />&nbsp; None</label>
                                                        <label><input @if($plan->promo_behaviour=='hot') checked="checked" @endif name="promo_behaviour" id="inlineCheckbox1" type="radio" value="hot"/>&nbsp; Hot</label>
                                                        <label><input @if($plan->promo_behaviour=='new') checked="checked" @endif name="promo_behaviour" id="inlineCheckbox2" type="radio" value="new"/>&nbsp; New</label>
                                                        <label><input @if($plan->promo_behaviour=='sale') checked="checked" @endif name="promo_behaviour" id="inlineCheckbox3" type="radio" value="sale"/>&nbsp; Sale</label>
                                                        <label><input @if($plan->promo_behaviour=='best value') checked="checked" @endif name="promo_behaviour" id="inlineCheckbox4" type="radio" value="best value"/>&nbsp; Best Value</label>
                                                        <label><input @if($plan->promo_behaviour=='other') checked="checked" @endif name="promo_behaviour" id="inlineCheckbox4" type="radio" value="other"/>&nbsp; Others, please specify:</label>
                                                        <input name="promo_behaviour_other" type="text" value="{{$plan->promo_behaviour_other}}" class="form-control">
                                                        <p class="red_error" id="promo_behaviour_other"></p>
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <label for="inputFirstName" class="col-md-3 control-label">Category <span class="text-red">*</span></label>
                                                <div class="col-md-6">

                                                      <select name="category" class="form-control">
                                            <option value="">- Please select -</option>
                                            @if(count($categories)>0)
                                            @foreach($categories as $i)
                                            <option @if($plan->category==$i->id) selected="" @endif  style="font-weight: bolder;" value="{{$i->id}}">{{$i->title}}</option>
                                              @if(!empty($i->childs))
                                                @foreach($i->childs as $child)
                                                  <option @if($plan->category==$child->id) selected="" @endif  value="{{$child->id}}">  -{{$child->title}}</option>
                                                @endforeach
                                              @endif
                                            @endforeach
                                            @endif
                                          </select>
                                                        <p class="red_error" id="category"></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputFirstName" class="col-md-3 control-label">Display Order</label>
                                                <div class="col-md-6">
                                                    <input type="text" value="{{$plan->sort_order}}" name="sort_order" class="  form-control" placeholder="eg. 1">
                                                    <p class="red_error" id="sort_order"></p>
                                                    <div class="xss-margin"></div>
                                                    <div class="text-blue text-12px">The display order of the plan positioning in front end from Left to Right.</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Enable Plan Button</label>

                                                <div class="col-md-6">
                                                    <div class="xss-margin"></div>
                                                    <div class="radio-list">
                                                        <label><input id="inlineCheckbox1" @if($plan->enable_plan_button=='None') checked="checked" name="enable_plan_button"  @endif  name="enable_plan_button" type="radio" value="None"/>&nbsp; None</label>
                                                        <!-- <label><input id="inlineCheckbox1" name="enable_plan_button" type="radio" value="Get Started!" checked="checked"/>&nbsp; Get Started!</label> -->
                                                        <label><input id="inlineCheckbox1" @if($plan->enable_plan_button=='Ask for Quote') checked="checked" @endif  name="enable_plan_button" type="radio" value="Ask for Quote"/>&nbsp; Ask for Quote</label>
                                                        <label><input id="inlineCheckbox1" @if($plan->enable_plan_button=='Order Now') checked="checked"   @endif name="enable_plan_button" type="radio" value="Order Now"/>&nbsp; Order Now</label>

                                                        <label><input @if($plan->enable_plan_button=='other') checked="checked" @endif id="inlineCheckbox4" type="radio" name="enable_plan_button" value="other"/>&nbsp; Others, please specify:</label>
                                                        <input name="enable_plan_button_other" value="{{$plan->enable_plan_button_other}}" type="text" class="form-control">
                                                        <p class="red_error" id="enable_plan_button_other"></p>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label for="inputFirstName" class="col-md-3 control-label">Tax <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="xss-margin"></div>
                                                        <input @if($plan->apply_gst=='1') checked="checked" @endif checked="" name="apply_gst" value="1" type="radio"> Apply GST <br/>
                                                        <input @if($plan->apply_gst=='0') checked="checked" @endif name="apply_gst" value="0" type="radio"> Do Not Apply GST
                                                    </div>

                                            </div>

                                          </div><!-- div form end -->


                            </div><!-- end col-md-12 -->

                          </div><!-- end row -->

                      <div class="clearfix"></div>
                    </div><!-- end portlet body -->

                  </div><!-- end portlet -->
                  <!-- end general -->

                  <div class="portlet">

                        <div class="portlet-header">
                          <div class="caption">Pricing</div>
                          <div class="tools"> <i class="fa fa-chevron-up"></i> </div>

                        </div>

                        <div class="portlet-body">
                          <div class="row">
                                <div class="col-md-12">

                                    <div class="form-horizontal" id="frm_pricing">

                                                <div class="form-group">
                                                    <label for="inputFirstName" class="col-md-3 control-label">Pricing Type <span class="text-red">*</span></label>
                                                    <div class="col-md-6">
                                                        <div class="xss-margin"></div>
                                                        <div class="radio-list">
                                                            <label><input name="pricing_type" @if($plan->price_type=='Free') checked="" @endif  id="inlineCheckbox1" type="radio" value="Free" checked="checked"/>&nbsp; Free</label>
                                                            <label><input name="pricing_type" @if($plan->price_type=='One Time') checked="" @endif id="pricing_one_time" type="radio" value="One Time"/>&nbsp; One Time</label>
                                                            <label><input name="pricing_type" @if($plan->price_type=='Recurring') checked="" @endif id="inlineCheckbox2" type="radio" value="Recurring" />&nbsp; Recurring</label>
                                                        </div>
                                                        <p class="red_error" id="pricing_type"></p>
                                                     <input type="hidden"  name="current_currency" id="current_currency" value="{{$plan->currency}}">
                                                      <input type="hidden" name="current_currency_other" id="current_currency_other_txt" value="{{$plan->currency_other}}">

                                                     </div>

                                                </div>
                                                <div class="clearfix"></div>
                                                note to programmer: if choose "free", hide both pricing tables below. If choose "one time", display "one time" pricing table and hide "recurring" pricing table. If choose "recurring" pricing table, hide the "one time" pricing table.
                                                <!-- one time price start -->
                                                <div hidden="" class="one_time_price">
                                                <h5 class="block-heading border-bottom">One Time</h5>
                                                <div class="text-blue">If you select currency to "RM", the price you have entered in below pricing table will be set to "RM".  If you select currency to "USD", the price you have entered in below pricing table will be set to "USD". Please also enter the conversion rate for USD, the system will auto-calculate the pricing to RM and display it in front end plan pricing table.</div>
                                                <div class="xs-margin"></div>
                                                <div class="form-group ">
                                                    <label for="inputFirstName" class="col-md-3 control-label">Currency</label>
                                                    <div class="col-md-6">
                                                        <div class="xss-margin"></div>
                                                        <div class="radio-list">
                                                            <label><input id="one_time_rm" type="radio"  onblur="select_currency()" name="pricing_currency" value="RM" @if($plan->currency=='RM') checked="checked" @endif/>&nbsp; RM</label>
                                                            <label><input id="one_time_usd" @if($plan->currency=='USD') checked="" @endif onchange="select_currency()" type="radio" value="USD" name="pricing_currency" />&nbsp; USD, please specify the conversion rate below to RM </label>
                                                            <input   name="pricing_currency_other" value="{{$plan->currency_other}}" type="text" onblur="usd_to_rm(this.value)" class=" curreny_other_class form-control">
                                                            <div class="xss-margin"></div>
                                                            <div class="text-blue text-12px">eg. 1 USD = 3.50 RM</div>
                                                            <p class="red_error" id="pricing_currency_other"></p>
                                                            <p class="red_error" id="current_currency"></p>
                                                      <p class="red_error" id="current_currency_other"></p>
                                                        </div>
                                                     </div>
                                                </div>
                                                <!-- end table responsive -->
                                                  <!-- one time price end -->

                                                  <!-- recurring price start -->
                                                  </div>
                                                <div hidden="" class="recurring_price">
                                                    <h5 class="block-heading border-bottom">Recurring</h5>
                                                <div class="text-blue">If you select currency to "RM", the price you have entered in below pricing table will be set to "RM".  If you select currency to "USD", the price you have entered in below pricing table will be set to "USD". Please also enter the conversion rate for USD, the system will auto-calculate the pricing to RM and display it in front end plan pricing table.</div>
                                                <div class="xs-margin"></div>
                                                <div class="form-group">
                                                    <label for="inputFirstName" class="col-md-3 control-label">Currency</label>
                                                    <div class="col-md-6">
                                                        <div class="xss-margin"></div>
                                                        <div class="radio-list">
                                                            <label><input id="recurring_currency_rm" onchange="select_currency_recurring()"  type="radio" name="recurring_currency" value="RM" @if($plan->currency=='RM') checked="" @endif />&nbsp; RM</label>
                                                            <label>
                                                            <input @if($plan->currency=='USD') checked="" @endif id="recurring_currency_usd" type="radio" name="recurring_currency" onchange="select_currency_recurring()" value="USD" />&nbsp; USD, please specify the conversion rate below to RM </label>
                                                            <input @if($plan->currency=='USD') checked="" @endif name="recurring_currency_other" value="{{$plan->currency_other}}" type="text" onchange="usd_to_rm(this.value)" class="curreny_other_class form-control">
                                                            <div class="xss-margin"></div>
                                                            <div class="text-blue text-12px">eg. 1 USD = 3.50 RM</div>
                                                            <p class="red_error" id="recurring_currency_other"></p>

                                                        </div>
                                                     </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">First Month</label>
                                                    <div class="col-md-6">
                                                       <input name="recurring_first_month" value="{{$plan->recurring_first_month}}" type="text" class="form-control" placeholder="0.00">
                                                       <p class="red_error" id="recurring_first_month"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">First Year</label>
                                                    <div class="col-md-6">
                                                       <input name="recurring_first_year" value="{{$plan->recurring_first_year}}" type="text" class="form-control" placeholder="0.00">
                                                       <p class="red_error" id="recurring_first_year"></p>
                                                    </div>
                                                </div>
                                                <!-- end table responsive -->
                                                  <!-- recurring price end -->
                                                </div>
                                                <div id="pricing_table" hidden="" class="table-responsive mtl">
                                                <table class="table table-hover table-striped">
                                                  <thead>
                                                    <tr>
                                                      <th width="15%"></th>
                                                      <th width="15%">One Time</th>
                                                      <th width="15%">Monthly</th>
                                                      <th class="recurring_price_fields" width="15%">Annually</th>
                                                      <th class="recurring_price_fields" width="15%">Biennially</th>
                                                      <th class="recurring_price_fields" width="15%">Triennially</th>
                                                      <th></th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <tr>
                                                      <td>Setup Fee</td>
                                                      <td><input type="text" value="{{$plan->setup_fee_one_time}}" name="setup_fee_one_time" class="form-control" placeholder="0.00"></td>
                                                      <td><input type="text" value="{{$plan->setup_fee_monthly}}" name="setup_fee_monthly" class="form-control" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"><input value="{{$plan->setup_fee_annually}}"  name="setup_fee_annually" type="text" class="form-control" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"><input value="{{$plan->setup_fee_biennially}}" name="setup_fee_biennially" type="text" class="form-control" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"><input value="{{$plan->setup_fee_triennially}}" name="setup_fee_triennially" type="text" class="form-control" placeholder="0.00"></td>
                                                      <td></td>
                                                    </tr>
                                                    <tr>
                                                      <td>Price</td>
                                                      <td><input type="text" name="price_one_time" value="{{$plan->price_one_time}}" class="form-control" placeholder="0.00"></td>
                                                      <td><input type="text"  class="form-control"  value="{{$plan->price_monthly}}" name="price_monthly" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"><input type="text"  value="{{$plan->price_annually}}" name="price_annually" class="form-control" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"><input type="text"  value="{{$plan->price_biennially}}" class="form-control" name="price_biennially" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"><input type="text"  value="{{$plan->price_triennially}}" name="price_triennially" class="form-control" placeholder="0.00"></td>
                                                      <td class="recurring_price_fields"></td>
                                                    </tr>
                                                  </tbody>
                                                  <tfoot>
                                                    <tr>
                                                      <td colspan="7"></td>
                                                    </tr>
                                                  </tfoot>
                                                </table>
                                                <div class="clearfix"></div>
                                              </div>
                                            <p class="red_error" id="setup_fee_one_time"></p>
                                            <p class="red_error" id="setup_fee_monthly"></p>
                                            <p class="red_error" id="setup_fee_triennially"></p>
                                            <p class="red_error" id="setup_fee_biennially"></p>
                                            <p class="red_error" id="setup_fee_annually"></p>

                                            <p class="red_error" id="price_one_time"></p>
                                            <p class="red_error" id="price_monthly"></p>
                                            <p class="red_error" id="price_annually"></p>
                                            <p class="red_error" id="price_triennially"></p>
                                            <p class="red_error" id="price_biennially"></p>


                                                <div class="form-actions">
                                                  <div class="col-md-offset-5 col-md-7"> <a href="javascript:void" onclick="submit_data()" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                </div>

                                              </div>


                                </div><!-- end col-md-12 -->

                              </div><!-- end row -->

                      <div class="clearfix"></div>
                    </div><!-- end portlet body -->

                  </div><!-- end portlet -->
                  <!-- end pricing -->
                  </form>

                </div><!-- end tab general/pricing -->



                <div id="plan-feature-details" class="tab-pane fade">
                    @if($is_ssl_page==0)
                    <div class="portlet">
                      <div class="portlet-header">
                        <div class="caption">Plan Features Details</div>
                        <p style="margin-top: 40px" class="margin-top-10px"></p>
                        <a href="javascript:void" data-target="#modal-add-plan-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary">Delete</button>
                          <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                          <ul role="menu" class="dropdown-menu">
                            <li><a href="javascript:void" onclick="open_modal_delete_selected_pfd()" >Delete selected item(s)</a></li>
                            <li class="divider"></li>
                            <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                          </ul>
                        </div>
                        <!--Modal Add New plan feature start-->
                        <div id="modal-add-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                          <div class="modal-dialog modal-wide-width">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label3" class="modal-title">Add New Plan Feature Detail</h4>
                              </div>
                              <div class="modal-body">
                                <div class="form">
                                  <form id="plan_feature_details_frm" class="form-horizontal">
                                    {!!csrf_field()!!}
                                    <input type="hidden" name="plan_id" id="" value="{{$plan->id}}">
                                    <input type="hidden" name="id" id="pfd_id" value="0">
                                    <input type="hidden" name="page" id="" value="{{$page_name}}">
                                    <div class="form-group">
                                      <label class="col-md-3 control-label">Status</label>
                                      <div class="col-md-6">
                                        <div data-on="success" data-off="primary" class="make-switch">
                                          <input name="status" type="checkbox" checked="checked"/>
                                        </div>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                    <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                    <div class="col-md-6">
                                      <select name="plan_feature" class="form-control">
                                          <option value="">-- Please select --</option>
                                            @if(count($plan_features)>0)
                                            @foreach($plan_features as $i)
                                                <option value="{{$i->id}}">{{$i->title}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <p class="red_error" id="pfd_err_plan_feature"></p>
                                    </div>
                                  </div>
                                   <div class="form-group">
                                      <label class="col-md-3 control-label">Description<span class="text-red">*</span></label>
                                      <div class="col-md-6">
                                        <input name="description" type="text" class="form-control" placeholder="eg. RAM">
                                        <p class="red_error" id="pfd_err_description"></p>

                                      </div>
                                    </div>
                                     <div class="form-group">
                                    <label class="col-md-3 control-label" for="select">Icon</label>
                                    <div class="col-md-6">
                                        <select name="select" id="select" class="form-control">
                                          <option value="">Without icon</option>
                                          <option value="yes">Blue check</option>
                                          <option value="no">Red cross</option>
                                        </select>
                                      </div>
                                  </div>
                                    <div class="form-actions">
                                      <div class="col-md-offset-5 col-md-8"> <button   class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--END MODAL Add New plan feature -->
                        <!--Modal delete selected items plan feature start-->
                        <div id="modal-delete-selected-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                              </div>
                              <div class="modal-body">
                                <p><strong>#1:</strong> RAM</p>
                                <div class="form-actions">
                                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- modal delete selected items plan feature end -->
                        <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      </div>

                      <div class="portlet-body">
                        <div class="table-responsive mtl">
                          <form id="delete_selected_pfd" class="form-horizontal">
                                    {!!csrf_field()!!}
                          <table class="table table-hover table-striped" id="pfd_table">
                            <thead>
                              <tr>
                                <th width="1%"><input id="pfd_checkbox"  onchange="check_all('pfd_checkbox')"  type="checkbox"/></th>
                                <th>#</th>
                                <th>Status</th>
                                <th>Plan Feature</th>
                                <th>Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @if ($plan_feature_details->count() > 0)
                                <?php $count_plan_features = 0;?>
                                @foreach($plan_feature_details as $i)
                                <?php $count_plan_features++;?>
                                <tr>
                                  <td><input name="id_pf_detail[]" value="{{$i->id}}" class="pfd_checkbox" type="checkbox"/></td>
                                  <td>{{$count_plan_features}}</td>
                                  <td><span class="label label-xs label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span></td>

                                  <td>{{ $i->plan_feature['title'] }}</td>
                                  <td>{{$i->description}}</td>
                                  <td><a href="javascript:void" data-target="#modal-edit-plan-feature-{{$i->id}}" data-toggle="modal"  title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                   <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                   <!--Modal Edit plan feature start-->

                                   <!--Modal delete start-->
                                   <div id="modal-delete-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                                        </div>
                                        <div class="modal-body">
                                          <p><strong>#{{$i->id}}:</strong> {{$i->description}}</p>
                                          <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <button id="delete_single_button_pfd{{$i->id}}" onclick="delete_single({{$i->id}}, event)" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- modal delete end -->

                                  <div id="modal-edit-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                          <h4 id="modal-login-label3" class="modal-title">Edit Plan Feature Details</h4>
                                        </div>
                                        <div class="modal-body">
                                          <div class="form form-horizontal"  id="pfd_edit_frm_{{$i->id}}">
                                         {{csrf_field()}}
                                         <input type="hidden" name="plan_id" id="" value="{{$plan->id}}">
                                         <input type="hidden" name="id" value="{{$i->id}}">
                                         <input type="hidden" name="page" value="{{$page_name}}">
                                            <div class="form-group">
                                              <label class="col-md-3 control-label">Status</label>
                                              <div class="col-md-6">
                                                <div data-on="success" data-off="primary" class="make-switch">
                                                  <input id="edit_pfd_err_status_{{$i->id}}" name="status" type="checkbox" @if($i->status==1) checked="checked" @endif />
                                                </div>
                                              </div>
                                            </div>
                                            <div class="form-group">
                                         <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                      <div class="col-md-6">
                                        <select  id="edit_pfd_plan_feature_{{$i->id}}" name="plan_feature" class="form-control">

                                            <option value="">-- Please select --</option>
                                              @foreach($plan_features as $j)
                                                  <option value="{{$j->id}}">{{$j->title}}</option>
                                              @endforeach
                                              @if ($i->plan_feature_id && $i->plan_feature)
                                                <option value="{{ $i->plan_feature['id']}}" selected>
                                                  {{ $i->plan_feature['title']}}
                                                </option>
                                              @endif
                                          </select>
                                          <p class="red_error" id="edit_pfd_err_plan_feature_{{$i->id}}"></p>
                                      </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Description<span class="text-red">*</span></label>
                                        <div class="col-md-6">
                                          <input value="{{$i->description}}"  id="edit_pfd_description_{{$i->id}}"  name="description" type="text" class="form-control" placeholder="eg. RAM">
                                          <p class="red_error" id="edit_pfd_err_description_{{$i->id}}"></p>

                                        </div>
                                      </div>
                                       <div class="form-group">
                                        <label class="col-md-3 control-label">Select Yes/No</label>
                                        <div class="col-md-6">
                                          <div class="radio-list">
                                            <select name="select" id="select" class="form-control">
                                              <option value="">Without icon</option>
                                              <option value="yes" {{ $i->select_yes_no === 'yes' ? 'selected' : ''}}>Blue check</option>
                                              <option value="no" {{ $i->select_yes_no === 'no' ? 'selected' : ''}}>Red cross</option>
                                            </select>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                      <div class="col-md-offset-5 col-md-8"> <button type="button"  onclick="edit_pfd({{$i->id}})" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                    </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!--END MODAL Edit plan feature -->
                                </td>
                              </tr>
                              @endforeach
                              @endif

                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="6"></td>
                            </tr>
                          </tfoot>
                        </table>
                        </form>
                        <div class="clearfix"></div>
                        <span>Showing  {{$plan_feature_details->firstItem()}} to {{$plan_feature_details->lastItem()}} of {{$plan_feature_details->total()}}</span>
                        <span class="pull-right">{{$plan_feature_details->links()}}</span>
                      </div>
                      <!-- end table responsive -->
                    </div>
                  </div>
                  @else
                      <div @if($is_ssl_page==1) style="display:block" @endif class="portlet">
      <div class="portlet-header">
        <div class="caption">Plan Feature Listing</div>
        <p style="margin-top: 32px" class="margin-top-10px"></p>
        <a href="javascript:void" data-target="#modal-add-plan-feature" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Delete</button>
          <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
          <ul role="menu" class="dropdown-menu">
            <li><a href="javascript:void" onclick="open_modal_delete_selected()" >Delete selected item(s)</a></li>
            <li class="divider"></li>
            <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
          </ul>
        </div>
        <!--Modal Add New plan feature start-->
        <div id="modal-add-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
          <div class="modal-dialog modal-wide-width">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label3" class="modal-title">Add New Plan Feature</h4>
              </div>
              <div class="modal-body">
                <div class="form">
                  <form id="plan_feature_frm" class="form-horizontal">
                    {!!csrf_field()!!}
                    <input type="hidden" name="plan_id" id="" value="{{$plan->id}}">
                    <div class="form-group">
                      <label class="col-md-3 control-label">Status</label>
                      <div class="col-md-6">
                        <div data-on="success" data-off="primary" class="make-switch">
                          <input name="status" type="checkbox" checked="checked"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                      <div class="col-md-6">
                        <input name="title" type="text" class="form-control" placeholder="eg. RAM">
                        <p class="red_error" id="title"></p>

                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" id="save_feature_plan" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--END MODAL Add New plan feature -->
        <!--Modal delete selected items plan feature start-->
        <div id="modal-delete-selected-plan-feature" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
              </div>
              <div class="modal-body">
                <p><strong>#1:</strong> RAM</p>
                <div class="form-actions">
                  <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- modal delete selected items plan feature end -->
        <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
      </div>

      <div class="portlet-body">
        <div class="table-responsive mtl">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th width="1%"><input type="checkbox"/></th>
                <th>#</th>
                <th>Status</th>
                <th>Plan Feature</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <form id="delete_client">
                 {!!csrf_field()!!}
                                @if($plan_features)
                                <?php $count_plan_features = 0;?>
                                @foreach($plan_features as $i)
                                <?php $count_plan_features++;?>
                                <tr>
                                  <td><input name="id[]" value="{{$i->id}}" type="checkbox"/></td>
                                  <td>{{$count_plan_features}}</td>
                  <td><span class="label label-xs label-{{$i->status?'success':'danger'}}">{{$i->status?'Active':'Inactive'}}</span></td>
                  <td>{{$i->title}}</td>
                  <td><a href="javascript:void" data-target="#modal-edit-plan-feature-{{$i->id}}" data-toggle="modal"  title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                   <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-plan-feature-{{$i->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                    <!--Modal Edit plan feature start-->

                    <!--Modal delete start-->
                    <div id="modal-delete-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                            <h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this? </h4>
                          </div>
                          <div class="modal-body">
                            <p><strong>#{{$i->id}}:</strong> {{$i->title}}</p>
                            <div class="form-actions">
                              <div class="col-md-offset-4 col-md-8"> <a href="javascript:void" onclick="delete_single({{$i->id}})" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- modal delete end -->
                    <div id="modal-edit-plan-feature-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label3" class="modal-title">Edit Plan Feature</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form-horizontal">

                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-6">
                                              <div data-on="success" data-off="primary" class="make-switch">
                                                <input id="edit_pf_status_{{$i->id}}" type="checkbox" @if($i->status) checked="checked" @endif/>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Plan Feature <span class="text-red">*</span></label>
                                            <div class="col-md-6">
                                              <input type="text" id="edit_pf_title_{{$i->id}}" class="form-control" placeholder="eg. RAM" value="{{$i->title}}">
                                              <p class="red_error" id="pf_error_title{{$i->id}}"></p>
                                            </div>
                                          </div>
                                          <div class="form-actions">
                                            <div class="col-md-offset-5 col-md-8"> <a href="javascript:void" onclick="edit_plan_feature({{$i->id}})" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>

                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    <!--END MODAL Edit plan feature -->
                  </td>
                </tr>
                @endforeach
                @endif
              </form>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5"></td>
              </tr>
            </tfoot>
          </table>
          <div class="clearfix"></div>
          <span>Showing  {{$plan_features->firstItem()}} to {{$plan_features->lastItem()}} of {{$plan_features->total()}}</span>
          <span class="pull-right">{{$plan_features->links()}}</span>
        </div>
        <!-- end table responsive -->
      </div>
    </div>
                  @endif
                  <!-- end portlet -->


                </div><!-- end tab plan feature details -->


                <div id="free-domain" class="tab-pane fade">
                  <div class="portlet">

                    <div class="portlet-header">
                      <div class="caption">Free Domain</div>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>

                    <div class="portlet-body">
                      <div class="row">
                        <div class="col-md-12">

                          <form id="frm_free_domains" class="form-horizontal">
                          {{csrf_field()}}
                          <input type="hidden" id="service_free_domains_id" name="id" value="{{isset($service_free_domains)?$service_free_domains->id:'0'}}">
                          <input type="hidden" name="page" value="{{$page_name}}">
                          <input type="hidden" name="plan_id" id="" value="{{$plan->id}}">
                            <div class="form-group">
                              <label for="inputFirstName" class="col-md-3 control-label">Free Domain <span class="text-red">*</span></label>
                              <div class="col-md-8">
                                <div class="xss-margin"></div>
                                <div class="radio-list">
                                  <label><input @if(isset($service_free_domains) && $service_free_domains->type==1) checked @endif  name="type" id="inlineCheckbox1" type="radio" value="1" checked="checked"/>&nbsp; None</label>
                                  <label><input  @if(isset($service_free_domains) && $service_free_domains->type==2) checked @endif name="type"  id="inlineCheckbox2" type="radio" value="2"/>&nbsp; Offer a free domain registration/transfer only (renew as normal)</label>
                                  <label><input @if(isset($service_free_domains) && $service_free_domains->type==3) checked @endif  name="type"  id="inlineCheckbox3" type="radio" value="3"/>&nbsp; Offer a discounted domain registration/transfer only (renew as normal), please enter the first year fee (RM) below:</label>
                                  <input type="text" name="fee" id="service_free_domains_fee"  class="form-control numOnly" @if(isset($service_free_domains) && $service_free_domains->type==3) value="{{$service_free_domains->fee}}" @endif placeholder="0.00" value="0.00">
                                  <label><input @if(isset($service_free_domains) && $service_free_domains->type==4) checked @endif name="type"  id="inlineCheckbox4" type="radio" value="4"/>&nbsp; Offer a free domain registration/transfer and free renewal (if product is renewed)</label>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="inputFirstName" class="col-md-3 control-label">Free Domain TLD's</label>
                              <div class="col-md-5">
                                <select name="tlds[]" multiple="multiple" class="form-control" style="height: 400px;">
                                   @if(count($single_domains)>0)
                                          @foreach($single_domains as $i)
                                            <option value="{{$i->id}}" @if(isset($service_free_domains)) @if(in_array($i->id,$service_free_domains->tlds_array)) selected @endif @endif>{{$i->title}}</option>
                                          @endforeach
                                  @endif

                                </select>
                                <p class="red_error" id="service_free_domains_tlds"></p>
                                <div class="xss-margin"></div>
                                <div class="text-blue text-12px">Use Ctrl + Click to select multiple payment terms and TLD's</div>
                                note to programmer: the free domain list is dynamic, fetched from domains setup page.
                              </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-actions">
                              <div class="col-md-offset-5 col-md-7"> <button class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                            </div>

                          </form>
                        </div><!-- end col-md-12 -->
                      </div><!-- end row -->

                      <div class="clearfix"></div>
                    </div><!-- end portlet body -->
                  </div><!-- end portlet -->
                </div><!-- end tab free domain -->




              </div>
              <!-- end tab content -->
              <div class="clearfix"></div>
            </div>
            <!-- end col-lg-12 -->
          </div>
          <!-- end row -->
        </div>
        @endsection
        @section('custom_scripts')

   <div id="modal-delete-selected-pfd" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
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
                        <div class="col-md-offset-4 col-md-8"> <button type="button" onclick="delete_bulk_videos()" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                      </div>
                    </div>
                  </div>
                    </div>
                  </div>
                  <!-- modal delete selected items end -->
        <script type="text/javascript">
        function submit_data() {
            $("#frm_genrel").submit();
        }
        $("input[name='pricing_type']").change(function () {
            var selectec_price=$("input[name='pricing_type']:checked").val().toLowerCase();
            if (selectec_price=="free") {
                $("#pricing_table").hide();
                $(".one_time_price").hide();
                $(".recurring_price").hide();
            }else if(selectec_price=='one time'){
                $("#pricing_table").show();
                $(".recurring_price_fields").hide();
                $(".one_time_price").show();
                $(".recurring_price").hide();
            }else if(selectec_price=="recurring"){
                $(".recurring_price_fields").show();
                $("#pricing_table").show();
                $(".one_time_price").hide();
                $(".recurring_price").show();
            }
        });
        $(document).on('submit', '#frm_genrel', function(event) {
            $('.red_error').html("");
            $('.messages').hide();
            event.preventDefault();
            var formData = new FormData(this)
            $.ajax({
                url: base_url+'/admin/services/update_hosting_plan/{{$plan->id}}',
                type: 'POST',
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false

            })
            .done(function(response) {
                 $('#success_message').show();
                 $('#icon_img_src').attr('src',"{{url('').'/storage/ssl/icon_images/'}}"+response);
                $('body,html').animate({
                                  scrollTop: $(".page-content").offset().top
                }, 700);
            })
            .fail(function(response) {
                validation_errors=response.responseJSON;
                 console.log(validation_errors);
                $.each(validation_errors, function(k, v) {
                    //display the key and value pair
                    //console.log(k + ' is ' + v);
                    $('#'+k).html(v)

                });
                /*$('#status').html(validation_errors.status);
                $('#name_line1').html(validation_errors.name_line1);
                $('#name_line2').html(validation_errors.name_line2);
                $('#url').html(validation_errors.url);
                $('#sort_order').html(validation_errors.sort_order);
                $('#enable_plan_button_other').html(validation_errors.enable_plan_button_other);*/
                $('#error_message').show();
                $('body,html').animate({
                                  scrollTop: $(".page-content").offset().top
                }, 700);
            })
            .always(function(response) {

            });

        });
        function select_currency() {
            var value=$('input[name="pricing_currency"]:checked').val();
            $('#current_currency').val(value);
            if (value=='RM') {
              //$('#recurring_currency_rm').val($('input[name="pricing_currency"]:checked').val());
              $('#recurring_currency_rm').prop('checked',true);
            }else{

              $('#recurring_currency_usd').prop('checked',true);
            }
        }
        function select_currency_recurring() {
            var value=$('input[name="recurring_currency"]:checked').val();
            $('#current_currency').val(value);
            if (value=='RM') {
              $('#one_time_rm').prop('checked',true);
              //$('#recurring_currency_rm').val($('input[name="pricing_currency"]:checked').val());
            }else{
              $('#one_time_usd').prop('checked',true);
            }
        }
        function usd_to_rm(value) {
            $('#current_currency_other_txt').val(value);
            $('.curreny_other_class').val(value);
        }
        function show_pricing_div() {
            var selectec_price='{{$plan->price_type}}';
            //alert("called"+selectec_price);
            if (selectec_price=="Free") {
                $("#pricing_table").hide();
                $(".one_time_price").hide();
                $(".recurring_price").hide();
            }else if(selectec_price=='One Time'){
                $("#pricing_table").show();
                $(".recurring_price_fields").hide();
                $(".one_time_price").show();
                $(".recurring_price").hide();
            }else if(selectec_price=="Recurring"){
                $(".recurring_price_fields").show();
                $("#pricing_table").show();
                $(".one_time_price").hide();
                $(".recurring_price").show();
            }
        }
        show_pricing_div();function edit_plan_feature(id) {
      $('.red_error').html("");
      var status=0;
      if ($('#edit_pf_status_'+id).is(":checked"))
      {
        status=1;
      }
      var title=$('#edit_pf_title_'+id).val();
      $.ajax({
        url: page_url+'update',
        type: 'POST',
        data: {'id': id,'status' : status ,'title' : title,'_token':csrf_token},
      })
      .done(function() {
        location.reload();
      })
      .fail(function(response) {
        $("#pf_error_title"+id).html(response.responseJSON.title);
      })
      .always(function() {
        console.log("complete");
      });


    }
    $(document).on('click', '#edit_plan_feature', function(event) {
      $.ajax({
        url: page_url+'update/{{$page_slug}}',
        type: 'POST',
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
          url: base_url+'/admin/cloud_hosting/get_details',
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
    $(document).on('click', '#delete_bulk', function(event,form_id) {
      var selected=$('input[name="id[]"]:checked').length;


      event.preventDefault();
      if (selected<1) {
        $('#delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
      }else{

        $('#delete_bulk').attr("disabled",true);
        $.ajax({
          url: base_url+'/admin/cloud_hosting/delete',
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
      $(document).on('submit', '#plan_feature_details_frm', function(event) {
        event.preventDefault();
        $('.red_error').html("");
        $.ajax({
          url: base_url+'/admin/save_feature_plan_detail',
          type: 'POST',
          data: $("#plan_feature_details_frm").serialize(),
        })
        .done(function() {
          window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
        })
         .fail(function(response) {
              validation_errors=response.responseJSON;
          $.each(validation_errors, function(k, v) {
          //display the key and value pair
          //console.log(k + ' is ' + v);
          $('#pfd_err_'+k).html(v)

        });
        })
        .always(function() {
          console.log("complete");
        });

      });
      function edit_pfd(id) {

        $('.red_error').html("");
        $.ajax({
          url: base_url+'/admin/save_feature_plan_detail',
          type: 'POST',
          data: $("#pfd_edit_frm_"+id).find("select, textarea, input, radio, checkbox").serialize(),
        })
        .done(function() {
          window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
        })
         .fail(function(response) {
              validation_errors=response.responseJSON;
          $.each(validation_errors, function(k, v) {
          //display the key and value pair
          //console.log(k + ' is ' + v);
          $('#edit_pfd_err_'+k+'_'+id).html(v)

        });
        })
        .always(function() {
          console.log("complete");
        });

      }
      $(document).on('submit', '#frm_free_domains', function(event) {
        event.preventDefault();
        $.ajax({
          url: base_url+'/admin/services/save_service_free_domain',
          type: 'POST',
          data: $("#frm_free_domains").serialize(),
        })
        .done(function(response) {

          $('#service_free_domains_id').val(response);
          $('#service_free_domains_fee').val("0.00");
          $('#success_message').show();
             $('body,html').animate({
              scrollTop: $(".page-content").offset().top
            }, 700);
        })
        .fail(function(response) {
          validation_errors=response.responseJSON;
              console.log(validation_errors);
              $.each(validation_errors, function(k, v) {
          //display the key and value pair
          //console.log(k + ' is ' + v);
          $('#service_free_domains_'+k).html(v);

        });
               $('#error_message').show();
      $('body,html').animate({
        scrollTop: $(".page-content").offset().top
      }, 700);
        })
        .always(function() {
          console.log("complete");
        });

      });
      $(".numOnly").keypress(function (e) {
    //if the letter is not digit then display error and don't type anything
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
        return false;
    }
  });
      /*feature plan*/
        page_url=base_url+'/admin/services/';
  $(document).on('click', '#save_feature_plan', function(event) {
  $('#plan_feature_frm').submit();
  });
  $(document).on('submit', '#plan_feature_frm', function(event) {
  event.preventDefault();
  $.ajax({
    url: page_url+'new/{{$page_slug}}',
    type: 'POST',
    data: $('#plan_feature_frm').serialize(),
  })
  .done(function() {
    window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
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
  function edit_plan_feature(id) {
  $('.red_error').html("");
  var status=0;
  if ($('#edit_pf_status_'+id).is(":checked"))
  {
    status=1;
  }
  var title=$('#edit_pf_title_'+id).val();
  $.ajax({
    url: page_url+'update',
    type: 'POST',
    data: {'id': id,'status' : status ,'title' : title,'_token':csrf_token},
  })
  .done(function() {
    window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
  })
  .fail(function(response) {
    $("#pf_error_title"+id).html(response.responseJSON.title);
  })
  .always(function() {
    console.log("complete");
  });


  }
  $(document).on('click', '#edit_plan_feature', function(event) {
  $.ajax({
    url: page_url+'update/{{$page_slug}}',
    type: 'POST',
    data: $('#plan_feature_edit_frm').serialize(),
  })
  .done(function() {
    window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
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
  function delete_single(id, e) {
    e.preventDefault();
    $('#delete_single_button_pfd'+id).attr("disabled", true);
    $.ajax({
      url: page_url+'delete_pf_detail',
      type: 'POST',
      data: {'_token':csrf_token,'id_pf_detail':id,}
    })
    .done(function(response) {
      window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
    });
  }
  $('#pfd_table').DataTable({
              "bPaginate": false,
              "bInfo" : false,
              "bFilter": false,
            });
      /*feature plan end*/

  function open_modal_delete_selected_pfd() {
      var model_id='modal-delete-selected-pfd';
       $('#'+model_id).modal('show');
       $('#'+model_id+' #delete-selected-body-information').html("");
       var selected=$('input[name="id_pf_detail[]"]:checked').length;
       $('#count-seleted').html(selected);
              if (selected<1) {
                $('#'+model_id+' #selected_zero').show()
                $('#'+model_id+' #delete-selected-buttons').hide()
              }else{
                /*get seleccted users details*/
                $.ajax({
                  url: base_url+'/admin/services/get_details_pf_detail',
                  type: 'POST',
                  data: $("#delete_selected_pfd").serialize()
                })
                .done(function(response) {
                  console.log(response);
                  for (var i=0; i <response.length; i++) {
                      $('#'+model_id+' #delete-selected-body-information').prepend('<p>'+
                        '<strong>#'+response[i].id+'</strong>:<span>'+response[i].description+'  </span>'+
                        '</p>');
                  }
                  })
                .fail(function() {
                  console.log("error");
                })
                .always(function() {
                  $('#'+model_id+' #selected_zero').hide()
                  $('#'+model_id+' #delete-selected-buttons').show();

                });

                /*End*/

              }
   }
    function check_all(section) {
    var radio_btn=$("#"+section);
     if(radio_btn. prop("checked") == true){
        $("."+section).each(function(){
          this.checked=true;
        })
      }else{
        $("."+section).each(function(){
          this.checked=false;
        })
      }
   }
   function delete_bulk_videos() {
    var model_id='modal-delete-selected-pfd';
      var selected=$('input[name="id_pf_detail[]"]:checked').length;
              if (selected<1) {
                $('#'+model_id+' #delete-selected-body').prepend('<p class="alert alert-danger">Please select items</p>');
              }else{
                $(this).attr("disabled",true);
                $.ajax({
                  url: base_url+'/admin/delete_feature_plan_detail',
                  type: 'POST',
                  data: $("#delete_selected_pfd").serialize(),
                })
                .done(function() {
                   window.location.href=base_url+"/admin/services/edit/{{$plan->id}}/{{$page_slug}}?tab=plan-feature-details";
                })
                .fail(function() {
                  $('#'+model_id).modal('hide');
                   alert("Error: no record was selected to delete");
                })
                .always(function() {
                  $(this).attr("disabled",false);
                });
              }
   }
  </script>



  @if(isset($_GET['tab']))
  <?php $tab_name = $_GET['tab'];?>
  <script>
  $('.nav-tabs a[href="#' + '{{$tab_name}}' + '"]').tab('show');
  </script>
  @endif
  @endsection