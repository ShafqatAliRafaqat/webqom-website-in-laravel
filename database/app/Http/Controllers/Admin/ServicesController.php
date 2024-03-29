<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DomainPricing;
use App\Models\FAQ;
use App\Models\GeneralFeature;
use App\Models\Email88SpecialFeature;
use App\Models\Web88irSpecialFeature;
use App\Models\IndexPlan;
use App\Models\Page;
use App\Models\PageCms;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\PlanFeatureNew;
use App\Models\PlanFeatureDetail;
use App\Models\ServicesFreeDomain;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use Storage;

class ServicesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    private $page_name = 'co cloud hosting';
    private $view_folder = 'admin.services.';

    public function __construct() {
        $this->middleware('admin');
    }

    public function index($page_slug) {
        $page_name = strtolower(str_replace('_', ' ', $page_slug));
        $this->page_name = $page_name;
        $page_cms = Page::where('name', $page_name)->first();
        if (!$page_cms) {
            return "this page is not found in database";
        }
        $plan_features = PlanFeature::where('page', $page_name)->paginate(55);
        $hosting_plan = Plan::where('page', $page_name)->paginate(55);
        $general_features = GeneralFeature::where('page', $page_name)->paginate(55);
        $email88_special_features = Email88SpecialFeature::where('page', $page_name)->paginate(55);
        $web88ir_special_features = Web88irSpecialFeature::where('page', $page_name)->paginate(55);
        $faq = FAQ::where('page', $page_name)->get();
        $recent_update = $this->recent_update_time();
        $page_name = ucwords($page_name);
       // print_r($this->view_folder);exit;
        return view($this->view_folder . 'list', compact('plan_features', 'recent_update', 'general_features', 'email88_special_features', 'web88ir_special_features', 'page_cms', 'faq', 'page_slug', 'page_name', 'hosting_plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function add_hosting_plan($page_slug) {
        $page_name = ucwords(str_replace('_', ' ', $page_slug));
        $single_domains = DomainPricing::where('type', 'single')->get();
        $page_cms = Page::where('name', $page_name)->first();
        $is_ssl_page = $page_cms->is_ssl_page;
        $plan_features = PlanFeature::where('page', strtolower($page_name))->paginate(55);
        $plan_features_details = DB::table('plan_feature_details as pfd')->select("pfd.description as description", 'pfd.status as status', 'pf.title as title', 'pfd.id as id', 'pfd.plan_feature_id as plan_feature_id', 'pfd.select_yes_no as select_yes_no')->where('pfd.page', strtolower($page_name))
                ->join('plan_features as pf', 'pfd.plan_feature_id', '=', 'pf.id')
                ->paginate(55);
        //$plan_feature_details=PlanFeatureDetail::where('page',strtolower($page_name))->get();
        $categories = Category::where('parent', 0)->orderBy('sort_order')->get();
        foreach ($categories as $i) {
            if ($i->sub_categories) {
                $i->childs = $i->sub_categories->sortBy('sort_order');
            }
        }
        $categories;
        $service_free_domains = ServicesFreeDomain::where('page', $page_name)->first();
        if (count($service_free_domains) > 0) {
            $service_free_domains->tlds_array = unserialize($service_free_domains->tlds);
        }
        return view($this->view_folder . 'create', compact('service_free_domains', 'categories', 'single_domains', 'page_name', 'page_slug', 'plan_features', 'is_ssl_page', 'plan_features_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store($page_slug, Request $request) {
        $page_name = strtolower(str_replace('_', ' ', $page_slug));
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $cloud_hosting = new PlanFeature;
        $cloud_hosting->page = $page_name;
        $cloud_hosting->title = $request->title;
        $cloud_hosting->status = isset($request->status) ? 1 : 0;
        if (empty($request->plan_id)) {
            $cloud_hosting->plan_id = '0';
        } else {
            $cloud_hosting->plan_id = $request->plan_id;
        }
        $cloud_hosting->save();

        Session::flash('success', 'The information has been saved/updated successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $indexplan = IndexPlan::findOrFail($id);

        return view('admin.index-plan.show', compact('indexplan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id, $page_slug) {
        $page_name = ucwords(str_replace('_', ' ', $page_slug));
        $plan = Plan::findOrFail($id);
        if ($plan->page != str_replace('_', ' ', $page_slug)) {
            return Redirect::back();
        }
        $categories = Category::where('parent', 0)->where('status', 1)->get();
        $page_name = ucwords(str_replace('_', ' ', $page_slug));
        $single_domains = DomainPricing::where('type', 'single')->get();
        $page_cms = Page::where('name', $page_name)->first();
        $is_ssl_page = $page_cms->is_ssl_page;

        // $plan_features_details = DB::table('plan_feature_details as pfd')->select("pfd.description as description", 'pfd.status as status', 'pf.title as title', 'pfd.id as id', 'pfd.plan_feature_id as plan_feature_id', 'pfd.select_yes_no as select_yes_no')
        //     ->where('plan_feature_id', $id)
        //     ->join('plan_features as pf', 'pfd.plan_feature_id', '=', 'pf.id')
        //     ->paginate(55);
        $plan_feature_details = PlanFeatureDetail::where('plan_id', $id)->paginate(55);
        $used_plan_features = [];
        foreach ($plan_feature_details as $i) {
            $used_plan_features[] = $i->plan_feature_id;
        }
        $plan_features = PlanFeature::where('page', strtolower($page_name))->whereNotIn('id', $used_plan_features)->paginate(55);

        $categories = Category::where('parent', 0)->orderBy('sort_order')->get();
        foreach ($categories as $i) {
            if ($i->sub_categories) {
                $i->childs = $i->sub_categories->sortBy('sort_order');
            }
        }
        $service_free_domains = ServicesFreeDomain::where('plan_id', $id)->first();
        if (count($service_free_domains) > 0) {
            $service_free_domains->tlds_array = unserialize($service_free_domains->tlds);
        }
        if ($page_cms->is_ssl_page == 1) {
            $plan_features = PlanFeature::where('plan_id', $id)->paginate(55); //PlanFeature::paginate(55);
        }
        return view($this->view_folder . 'edit', compact('plan', 'service_free_domains', 'categories', 'single_domains', 'page_name', 'page_slug', 'plan_features', 'is_ssl_page', 'plan_feature_details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request) {
        //$page_name=strtolower(str_replace('_', ' ', $page_slug));
        //return $request->all();
        $id = $request->id;
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $plan = PlanFeature::find($id);
        $plan->title = $request->title;
        $plan->status = $request->status;
        $plan->save();
        Session::flash('success', 'The information has been saved/updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        IndexPlan::destroy($id);

        Session::flash('flash_message', 'IndexPlan deleted!');

        return redirect('admin/index-plan');
    }

    public function feature_plan_delete(Request $request) {
        //$page_name=strtolower(str_replace('_', ' ', $page_slug));
        //return $request->all();
        $id = $request->id;
        if (is_array($id)) {
            foreach ($id as $i) {
                PlanFeature::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            PlanFeature::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
            //return redirect('admin/index-plan');
        }
    }

    public function delete_hp(Request $request) {

        //return $request->all();
        $id = $request->id_hp;

        if (is_array($id)) {
            foreach ($id as $i) {
                Plan::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            Plan::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
            //return redirect('admin/index-plan');
        }
    }

    public function delete_faq(Request $request) {

        //return $request->all();
        $id = $request->id;

        if (is_array($id)) {
            foreach ($id as $i) {
                FAQ::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            FAQ::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
            //return redirect('admin/index-plan');
        }
    }

    public function deleteBulkFaqs(Request $request) {
        $IDs = $_POST['ids'];
        $IDs = ltrim($IDs, ',');
        $IDs = explode(',', $IDs);
        foreach ($IDs as $i) {
            FAQ::find($i)->delete();
        }
        Session::flash('success', 'Deleted successfully');
    }

    public function image_update(Request $request) {
        //return $request->id;
        $this->validate($request, [
            'image_file' => 'max:2000|mimes:png',
        ]);
        $icon_image = Input::file('image_file');
        $extension = $icon_image->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111, 99999) . '.' . $extension;
        Storage::disk('index-plan')->putFileAs('icon_images', $icon_image, $fileName);
        $index_plan = IndexPlan::find($request->id);
        $index_plan->icon_image = $fileName;
        $index_plan->save();
        return $fileName;
    }

    public function recent_update_time() {

        $recent_date_timestamp = Page::select('updated_at')->where('name', $this->page_name)->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }

    public function get_index_plan_details(Request $request) {
        $id = $request->id;
        if ($id != null) {
            if (is_array($id)) {
                $indexplans = IndexPlan::whereIn('id', $id)->get();
                return $indexplans;
            }
        }
    }

    public function update_sort(Request $request) {
        //return $request->data;
        if (!empty($request->data)) {
            foreach ($request->data as $key) {
                $indexplan = Plan::find($key['id']);
                $indexplan->sort_order = $key['sort_order'];
                $indexplan->save();
            }
        }
    }

    public function cms_update(Request $request) {
        //return $request->left_header;
        $cms = PageCms::where('page_id', 1)->where('slug', 'title')->first();
        $cms->content = $request->title;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'left_header')->first();
        $cms->content = $request->left_header;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'left_content')->first();
        $cms->content = $request->left_content;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_header')->first();
        $cms->content = $request->right_header;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_content')->first();
        $cms->content = $request->right_content;
        $cms->save();
        return $cms;
    }

    public function right_section(Request $request) {
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_section')->first();
        $cms->content = $request->data;
        $cms->save();
        return $cms;
    }

    public function left_section(Request $request) {

        $cms = PageCms::where('page_id', 1)->where('slug', 'left_section')->first();
        $cms->content = $request->title;
        $cms->save();
        return $cms;
    }

    public function get_details(Request $request) {
        $id = $request->id;
        if ($id != null) {
            if (is_array($id)) {
                $data = PlanFeature::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

    public function get_details_hp(Request $request) {
        $id = $request->id_hp;
        if ($id != null) {
            if (is_array($id)) {
                $data = Plan::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

    public function delete_all_plans(Request $request) {
        if ($request->user()->role == 'Admin') {
            $data = PlanFeature::all();
            foreach ($data as $i) {
                PlanFeature::find($i->id)->delete();
            }
            Session::flash('success', 'Deleted successfully');
            return response('success', 200);
        } else {
            return response("unauthorized", 'delete');
        }
    }

    /*
      @post request for new cloud hosting plan
     */

    public function hosting_plan(Request $request) {
        //return $request->is_ssl_page;
        $current_currency_other = $request->current_currency_other;
        if ($current_currency_other == "") {
            $current_currency_other = 0;
        }
        $page_name = strtolower($request->page);
        //return $current_currency_other;
        $this->validate($request, [
            'plan_name' => 'required|max:255',
            'service_code' => 'required|max:255',
            'category' => 'required|max:255',
            'enable_plan_button_other' => 'required_if:enable_plan_button,other',
            'promo_behaviour_other' => 'required_if:promo_behaviour,other',
            'sort_order' => 'numeric|required|max:255',
        ]);
        if (strtolower($request->pricing_type) != "free") {
            $this->validate($request, [
                'current_currency' => 'required',
                'current_currency_other' => 'required_if:current_currency,USD,other|numeric',
                'recurring_first_year' => 'numeric',
                'recurring_first_month' => 'numeric',
                /* 'recurring_first_month'=>'required_if:pricing_type,Recurring|numeric', */
                /* PRICING TABLE FIELDS for price type one time */
                'setup_fee_one_time' => 'required|numeric',
                'setup_fee_monthly' => 'numeric',
                'price_one_time' => 'numeric',
                'price_monthly' => 'required|numeric',
                /* PRICING TABLE FIELDS for price type recurring */
                'setup_fee_annually' => 'numeric',
                'setup_fee_biennially' => 'numeric',
                'setup_fee_triennially' => 'numeric',
                'price_annually' => 'required_if:pricing_type,Recurring|numeric',
                'price_biennially' => 'numeric',
                'price_triennially' => 'numeric',
                    ], [
                "current_currency.required" => "please select currency RM or USD",
                "current_currency_other.required_if" => "please specify the conversion rate to RM",
            ]);
        }
        if ($request->is_ssl_page == 1) {
            $this->validate($request, [
                'icon_image' => 'required|max:2000|mimes:png',
            ]);
        }
        if ($request->is_ssl_page == 1) {
            $icon_image = Input::file('icon_image');
            $extension = $icon_image->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension;
            Storage::disk('ssl')->putFileAs('icon_images', $icon_image, $fileName);
        }
        $plan = new Plan;

        $plan->plan_name = $request->plan_name;
        $plan->service_code = $request->service_code;
        $plan->promo_behaviour = $request->promo_behaviour;
        $plan->enable_plan_button = $request->enable_plan_button;
        $plan->enable_plan_button_other = $request->enable_plan_button_other;
        $plan->promo_behaviour_other = $request->promo_behaviour_other;
        $plan->category = $request->category;
        $plan->apply_gst = $request->apply_gst;
        if ($request->is_ssl_page == 1) {
            $plan->icon_image = $fileName;
        }
        $plan->sort_order = ($request->sort_order) != "" ? $request->sort_order : 0;
        $plan->price_type = $request->pricing_type;
        if (strtolower($request->pricing_type) != "free") {
            $plan->currency = $request->current_currency;
            $plan->currency_other = $current_currency_other;
            $plan->setup_fee_one_time = $request->setup_fee_one_time;
            $plan->setup_fee_monthly = !empty($request->setup_fee_monthly) ? $request->setup_fee_monthly : 0;
            $plan->price_monthly = !empty($request->price_monthly) ? $request->price_monthly : 0;
            $plan->price_one_time = !empty($request->price_one_time) ? $request->price_one_time : 0;
            if (strtolower($request->pricing_type) == "one time") {
                $plan->pricing_currency = $request->pricing_currency;
                $plan->pricing_currency_other = !empty($request->pricing_currency_other) ? $request->pricing_currency_other : 0;
            } else if (strtolower($request->pricing_type) == "recurring") {
                $plan->recurring_currency = $request->recurring_currency;
                $plan->recurring_currency_other = !empty($request->recurring_currency_other) ? $request->recurring_currency_other : 0;

                $plan->recurring_first_month = !empty($request->recurring_first_month) ? $request->recurring_first_month : 0;
                $plan->recurring_first_year = !empty($request->recurring_first_year) ? $request->recurring_first_year : 0;
                /* prcing fields */
                $plan->setup_fee_annually = !empty($request->setup_fee_annually) ? $request->recurring_currency_fee_annually : 0;
                $plan->setup_fee_biennially = !empty($request->setup_fee_biennially) ? $request->recurring_currency_fee_biennially : 0;
                $plan->setup_fee_triennially = !empty($request->setup_fee_triennially) ? $request->setup_fee_triennially : 0;
                $plan->price_annually = !empty($request->price_annually) ? $request->price_annually : 0;
                $plan->price_biennially = !empty($request->price_biennially) ? $request->price_biennially : 0;
                $plan->price_triennially = !empty($request->price_triennially) ? $request->price_triennially : 0;
            }
        }
        $plan->status = isset($request->status) ? 1 : 0;
        $plan->page = $page_name;
        $plan->save();
        Session::flash('success', 'Plan added successfully');
        return $plan->id;
    }

    public function update_hosting_plan(Request $request, $id) {
        //return $request->all();
        //echo $request->is_ssl_page;
        $current_currency_other = $request->current_currency_other;
        if ($current_currency_other == "") {
            $current_currency_other = 0;
        }
        $page_name = strtolower($request->page);
        //return $current_currency_other;
        $this->validate($request, [
            'plan_name' => 'required|max:255',
            'service_code' => 'required|max:255',
            'category' => 'required|max:255',
            'enable_plan_button_other' => 'required_if:enable_plan_button,other',
            'promo_behaviour_other' => 'required_if:promo_behaviour,other',
            'sort_order' => 'numeric|required|max:255',
        ]);
        if (strtolower($request->pricing_type) != "free") {
            $this->validate($request, [
                'current_currency' => 'required',
                'current_currency_other' => 'required_if:current_currency,USD,other|numeric',
                'recurring_first_year' => 'numeric',
                'recurring_first_month' => 'numeric',
                /* PRICING TABLE FIELDS for price type one time */
                'setup_fee_one_time' => 'required|numeric',
                'setup_fee_monthly' => 'numeric',
                'price_one_time' => 'numeric',
                'price_monthly' => 'required|numeric',
                /* PRICING TABLE FIELDS for price type recurring */
                'setup_fee_annually' => 'numeric',
                'setup_fee_biennially' => 'numeric',
                'setup_fee_triennially' => 'numeric',
                'price_annually' => 'required_if:pricing_type,Recurring|numeric',
                'price_biennially' => 'numeric',
                'price_triennially' => 'numeric',
                    ], [
                "current_currency.required" => "please select currency RM or USD",
                "current_currency_other.required_if" => "please specify the conversion rate to RM",
            ]);
        }
        if ($request->is_ssl_page == 1) {
            $this->validate($request, [
                'icon_image' => 'max:2000|mimes:png',
            ]);
        }
        if ($request->is_ssl_page == 1) {
            $icon_image = Input::file('icon_image');
            if ($icon_image != "") {
                $extension = $icon_image->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111, 99999) . '.' . $extension;
                Storage::disk('ssl')->putFileAs('icon_images', $icon_image, $fileName);
            }
        }
        $plan = Plan::find($id);
        $plan->plan_name = $request->plan_name;
        $plan->service_code = $request->service_code;
        $plan->promo_behaviour = $request->promo_behaviour;
        $plan->enable_plan_button = $request->enable_plan_button;
        $plan->enable_plan_button_other = $request->enable_plan_button_other;
        $plan->category = $request->category;
        $plan->apply_gst = $request->apply_gst;
        if ($request->is_ssl_page == 1 && $icon_image != "") {
            //echo "fie nemae is".$fileName;
            $plan->icon_image = $fileName;
        }
        $plan->promo_behaviour_other = $request->promo_behaviour_other;
        $plan->sort_order = ($request->sort_order) != "" ? $request->sort_order : 0;
        $plan->price_type = $request->pricing_type;
        if (strtolower($request->pricing_type) != "free") {
            $plan->currency = (float) $request->current_currency;
            $plan->currency_other = (float) $current_currency_other;
            $plan->setup_fee_one_time = (float) $request->setup_fee_one_time;
            $plan->setup_fee_monthly = (float) $request->setup_fee_monthly;
            $plan->price_monthly = (float) $request->price_monthly;
            $plan->price_one_time = ($request->price_one_time != "") ? $request->price_one_time : 0;
            if (strtolower($request->pricing_type) == "one time") {
                $plan->pricing_currency = $request->pricing_currency;
                $plan->pricing_currency_other = (float) $request->pricing_currency_other;
            } else if (strtolower($request->pricing_type) == "recurring") {
                $plan->recurring_currency = $request->recurring_currency;
                //$plan->recurring_currency= $request->recurring_currency;
                $plan->recurring_currency_other = (float) $request->recurring_currency_other;
                $plan->recurring_first_month = ($request->recurring_first_month != "") ? $request->recurring_first_month : 0;
                $plan->recurring_first_year = ($request->recurring_first_year != "") ? $request->recurring_first_year : 0;
                /* prcing fields */
                $plan->setup_fee_annually = ($request->setup_fee_annually != "") ? $request->setup_fee_annually : 0;
                $plan->setup_fee_biennially = ($request->setup_fee_biennially != "") ? $request->setup_fee_biennially : 0;
                $plan->setup_fee_triennially = ($request->setup_fee_triennially != "") ? $request->setup_fee_triennially : 0;
                $plan->price_annually = $request->price_annually;
                $plan->price_biennially = ($request->price_biennially != "") ? $request->price_biennially : 0;
                $plan->price_triennially = ($request->price_triennially != "") ? $request->price_triennially : 0;
            }
        }
        $plan->status = isset($request->status) ? 1 : 0;
        $plan->page = $page_name;
        $plan->save();
        return $plan->icon_image;
    }

    public function preview($page_slug) {
        $page_name = strtolower(str_replace('_', ' ', $page_slug));

        $cms = Page::where('name', $page_name)->first();
        $plans = Plan::where('page', $page_name)->where('status', 1)->orderby('sort_order')->take(3)->get();
        if (!$cms) {
            return abort(404);
        }
        $featured_plans = PlanFeature::where('page', $page_name)->where('status', 1)->get();
        $general_features = GeneralFeature::where('page', $page_name)->get();
        $recent_update = $this->recent_update_time();
        $page_header = "";
        $sub_header = "";
        switch ($page_slug) {
            case 'vps_hosting':
                $page_header = "VPS HOSTING";
                $sub_header = "Dedicated control and functionality, on a scalable environment!";
                break;
            case 'cloud_hosting':
                $page_header = "Cloud HOSTING";
                $sub_header = "A cloud for everyone";
                break;
            case 'shared_hosting':
                $page_header = "Shared HOSTING";
                $sub_header = "Web Hosting Made Easy And Affordable!";
                break;
            case 'dedicated_servers':
                $page_header = "DEDICATED SERVERS";
                $sub_header = "We provide web hosting include a free domain name registration.";
                break;
            case 'co_cloud_hosting':
                $page_header = "CO-LOCATION Hosting";
                $sub_header = "Dedicated control and functionality, on a scalable environment!";
                break;
            default:
                # code...
                break;
        }
        return view('frontend.services', compact('page_header', 'sub_header', 'indexplans', 'general_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug'));
    }

    public function show_icons() {
        return view('admin.icons');
    }

    public function delete_pf_detail(Request $request) {


        $id = $request->id_pf_detail;

        if (is_array($request->id)) {
            foreach ($request->id as $i) {
                PlanFeatureNew::find($i)->delete();
            }
            Session::flash('success', 'Selected items deleted successefully');
            return;
        } else {
            PlanFeatureNew::find($id)->delete();
            Session::flash('success', 'Item deleted successfully');
        }
    }

    public function delete_feature_plan(Request $request) {
        //return $request->all();
        $id = $request->id;

        if (is_array($id)) {
            foreach ($id as $i) {
                PlanFeature::find($i)->delete();
            }
        } else {
            PlanFeature::find($id)->delete();
        }
        Session::flash('success', 'Deleted successfully');
    }

    public function delete_feature_plan_detail(Request $request) {
        //return $request->all();
        $id = $request->id_pf_detail;

        if (is_array($id)) {
            foreach ($id as $i) {
                PlanFeatureDetail::find($i)->delete();
            }
        } else {
            PlanFeatureDetail::find($id)->delete();
        }
        Session::flash('success', 'Deleted successfully');
    }

    public function get_details_pf_detail(Request $request) {
        $id = $request->id_pf_detail;
        if (!is_array($id)) {
            return PlanFeatureDetail::find($id);
        }
        if ($id != null) {
            if (is_array($id)) {
                $data = PlanFeatureDetail::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

    public function save_feature_plan_detail(Request $request) {
        //return $request->all();

        $this->validate($request, [
            //'description'=>'required|max:250',
            'plan_feature' => 'required|numeric',
        ]);
        if ($request->id > 0) {
            $message = 'Updated successfully';
            $record = PlanFeatureDetail::find($request->id);
        } else {
            $message = 'Added successfully';
            $record = new PlanFeatureDetail;
        }
        $record->description = $request->description;
        $record->plan_feature_id = $request->plan_feature;
        $record->status = isset($request->status) ? 1 : 0;
        $record->select_yes_no = $request->select;
        $record->plan_id = $request->plan_id;
        $record->page = strtolower($request->page);
        $record->save();
        Session::flash('success', $message);
    }

    public function save_service_free_domain(Request $request) {
        //return $request->all();
        $this->validate($request, [
            'tlds' => 'required',
        ]);
        if ($request->id > 0) {
            $message = 'Updated successfully';
            $record = ServicesFreeDomain::find($request->id);
        } else {
            $message = 'Added successfully';
            $record = new ServicesFreeDomain;
        }
        $record->type = $request->type;
        $record->fee = $request->fee;
        $record->plan_id = $request->plan_id;
        $record->tlds = serialize($request->tlds);
        $record->page = strtolower($request->page);
        $record->save();
        Session::flash('success', 'Saved successfully');
        return $record->id;
    }

    public function new_faq(Request $request) {
        //return $request->all();

        if ($request->id > 0) {
            $message = 'Updated successfully';
            $record = FAQ::find($request->id);
        } else {
            $message = 'Added successfully';
            $record = new FAQ;
        }
        $record->title = $request->title;
        $record->page = $request->page;
        $record->content = ($request->content);
        $record->status = isset($request->status) ? 1 : 0;
        $record->page = strtolower($request->page);
        $record->save();
        Session::flash('success', 'Saved successfully');
        return $record->id;
    }

    public function get_faq(Request $request) {
        $id = $request->id;
        return FAQ::find($id);
    }

}
