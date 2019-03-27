<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\PlanFeature;
use App\Models\IndexPlan;
use App\Models\Plan;
use App\Models\Page;
use App\Models\PageCms;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;

class EcommerceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    protected $page = 'ecommerce';
    protected $view_folder = 'admin.ecommerce.';

    function __construct() {
        $this->middleware('admin');
    }

    public function index() {

        $page_cms = Page::where('name', $this->page)->first();
        $plan_features = PlanFeature::where('page', $this->page)->paginate(5);
        $hosting_plan = Plan::where('page', $this->page)->paginate(5);
        $recent_update = $this->recent_update_time();
        return view($this->view_folder . 'list', compact('plan_features', 'recent_update', 'page_cms', 'hosting_plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $categories = Category::where('parent', 0)->where('status', 1)->get();
        return view($this->view_folder . 'create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        //return $request->all();
        //return $request->all();
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $cloud_hosting = new PlanFeature;
        $cloud_hosting->title = $request->title;
        $cloud_hosting->status = isset($request->status) ? 1 : 0;
        $cloud_hosting->page = $this->page;
        $cloud_hosting->save();

        Session::flash('success', 'Information was saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $plan = Plan::findOrFail($id);
        $categories = Category::where('parent', 0)->where('status', 1)->get();

        return view($this->view_folder . 'edit', compact('plan', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request) /* updating plan features here */ {
        //return $request->all();
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $cloud_hosting = PlanFeature::find($request->id);
        $cloud_hosting->title = $request->title;
        $cloud_hosting->status = isset($request->status) ? 1 : 0;
        $cloud_hosting->save();
        Session::flash('success', 'Information was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        
    }

    public function delete(Request $request) {

        //return $request->all();
        $id = $request->id;
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
        $recent_date_timestamp = IndexPlan::select('updated_at')->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }

    public function get_index_plan_details(Request $request) {
        $id = $request->id;
        if ($id != NULL) {
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

    public function get_details(Request $request) {
        $id = $request->id;
        if ($id != NULL) {
            if (is_array($id)) {
                $data = PlanFeature::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

    public function get_details_hp(Request $request) {
        $id = $request->id_hp;
        if ($id != NULL) {
            if (is_array($id)) {
                $data = Plan::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

    function delete_all_plans(Request $request) {
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
        //return $request->promo_behaviour;
        $current_currency_other = $request->current_currency_other;
        if ($current_currency_other == "") {
            $current_currency_other = 0;
        }
        //return $current_currency_other;
        $this->validate($request, [
            'plan_name' => 'required|max:255',
            'service_code' => 'required|max:255',
            'category' => 'required|max:255',
            'enable_plan_button_other' => 'required_if:enable_plan_button,other',
            'promo_behaviour_other' => 'required_if:promo_behaviour,other',
            'sort_order' => 'required|max:255',
        ]);
        if (strtolower($request->pricing_type) != "free") {
            $this->validate($request, [
                'current_currency' => 'required',
                'current_currency_other' => 'required_if:current_currency,USD,other|numeric',
                'recurring_first_year' => 'required_if:pricing_type,Recurring|numeric',
                'recurring_first_month' => 'required_if:pricing_type,Recurring|numeric',
                /* PRICING TABLE FIELDS for price type one time */
                'setup_fee_one_time' => 'required|numeric',
                'setup_fee_monthly' => 'required|numeric',
                'price_one_time' => 'required|numeric',
                'price_monthly' => 'required|numeric',
                /* PRICING TABLE FIELDS for price type recurring */
                'setup_fee_annually' => 'required_if:pricing_type,Recurring|numeric',
                'setup_fee_biennially' => 'required_if:pricing_type,Recurring|numeric',
                'setup_fee_triennially' => 'required_if:pricing_type,Recurring|numeric',
                'price_annually' => 'required_if:pricing_type,Recurring|numeric',
                'price_biennially' => 'required_if:pricing_type,Recurring|numeric',
                'price_triennially' => 'required_if:pricing_type,Recurring|numeric',
                    ], [
                "current_currency.required" => "please select currency RM or USD",
                "current_currency_other.required_if" => "please specify the conversion rate to RM"
            ]);
        }
        $plan = new Plan;
        $plan->plan_name = $request->plan_name;
        $plan->service_code = $request->service_code;
        $plan->promo_behaviour = $request->promo_behaviour;
        $plan->enable_plan_button = $request->enable_plan_button;
        $plan->enable_plan_button_other = $request->enable_plan_button_other;
        $plan->category = $request->category;
        $plan->apply_gst = $request->apply_gst;
        $plan->sort_order = ($request->sort_order) != "" ? $request->sort_order : 0;
        $plan->price_type = $request->pricing_type;
        if (strtolower($request->pricing_type) != "free") {
            $plan->currency = $request->current_currency;
            $plan->currency_other = $current_currency_other;
            $plan->setup_fee_one_time = $request->setup_fee_one_time;
            $plan->setup_fee_monthly = $request->setup_fee_monthly;
            $plan->price_monthly = $request->price_monthly;
            $plan->price_one_time = $request->price_one_time;
            if (strtolower($request->pricing_type) == "one time") {
                //$plan->pricing_currency= $request->pricing_currency;
                //$plan->pricing_currency_other= $request->pricing_currency_other;
            } else if (strtolower($request->pricing_type) == "recurring") {
                //$plan->recurring_currency= $request->recurring_currency;
                //$plan->recurring_currency= $request->recurring_currency;  
                $plan->recurring_currency_other = $request->recurring_currency_other;
                $plan->recurring_first_month = $request->recurring_first_month;
                $plan->recurring_first_year = $request->recurring_first_year;
                /* prcing fields */
                $plan->setup_fee_annually = $request->setup_fee_annually;
                $plan->setup_fee_biennially = $request->setup_fee_biennially;
                $plan->setup_fee_triennially = $request->setup_fee_triennially;
                $plan->price_annually = $request->price_annually;
                $plan->price_biennially = $request->price_biennially;
                $plan->price_triennially = $request->price_triennially;
            }
        }
        $plan->status = isset($request->status) ? 1 : 0;
        $plan->page = $this->page;
        $plan->save();
    }

    public function update_hosting_plan(Request $request, $id) {
        //return $request->promo_behaviour;
        $current_currency_other = $request->current_currency_other;
        if ($current_currency_other == "") {
            $current_currency_other = 0;
        }
        //return $current_currency_other;
        $this->validate($request, [
            'plan_name' => 'required|max:255',
            'service_code' => 'required|max:255',
            'category' => 'required|max:255',
            'enable_plan_button_other' => 'required_if:enable_plan_button,other',
            'promo_behaviour_other' => 'required_if:promo_behaviour,other',
            'sort_order' => 'required|max:255',
        ]);
        if (strtolower($request->pricing_type) != "free") {
            $this->validate($request, [
                'current_currency' => 'required',
                'current_currency_other' => 'required_if:current_currency,USD,other|numeric',
                'recurring_first_year' => 'required_if:pricing_type,Recurring|numeric',
                'recurring_first_month' => 'required_if:pricing_type,Recurring|numeric',
                /* PRICING TABLE FIELDS for price type one time */
                'setup_fee_one_time' => 'required|numeric',
                'setup_fee_monthly' => 'required|numeric',
                'price_one_time' => 'required|numeric',
                'price_monthly' => 'required|numeric',
                /* PRICING TABLE FIELDS for price type recurring */
                'setup_fee_annually' => 'required_if:pricing_type,Recurring|numeric',
                'setup_fee_biennially' => 'required_if:pricing_type,Recurring|numeric',
                'setup_fee_triennially' => 'required_if:pricing_type,Recurring|numeric',
                'price_annually' => 'required_if:pricing_type,Recurring|numeric',
                'price_biennially' => 'required_if:pricing_type,Recurring|numeric',
                'price_triennially' => 'required_if:pricing_type,Recurring|numeric',
                    ], [
                "current_currency.required" => "please select currency RM or USD",
                "current_currency_other.required_if" => "please specify the conversion rate to RM"
            ]);
        }
        $plan = Plan::find($id);
        $plan->plan_name = $request->plan_name;
        $plan->service_code = $request->service_code;
        $plan->promo_behaviour = $request->promo_behaviour;
        $plan->enable_plan_button = $request->enable_plan_button;
        $plan->enable_plan_button_other = $request->enable_plan_button_other;
        $plan->category = $request->category;
        $plan->apply_gst = $request->apply_gst;
        $plan->sort_order = ($request->sort_order) != "" ? $request->sort_order : 0;
        $plan->price_type = $request->pricing_type;
        if (strtolower($request->pricing_type) != "free") {
            $plan->currency = $request->current_currency;
            $plan->currency_other = $current_currency_other;
            $plan->setup_fee_one_time = $request->setup_fee_one_time;
            $plan->setup_fee_monthly = $request->setup_fee_monthly;
            $plan->price_monthly = $request->price_monthly;
            $plan->price_one_time = $request->price_one_time;
            if (strtolower($request->pricing_type) == "one time") {
                //$plan->pricing_currency= $request->pricing_currency;
                //$plan->pricing_currency_other= $request->pricing_currency_other;
            } else if (strtolower($request->pricing_type) == "recurring") {
                //$plan->recurring_currency= $request->recurring_currency;
                //$plan->recurring_currency= $request->recurring_currency;  
                $plan->recurring_currency_other = $request->recurring_currency_other;
                $plan->recurring_first_month = $request->recurring_first_month;
                $plan->recurring_first_year = $request->recurring_first_year;
                /* prcing fields */
                $plan->setup_fee_annually = $request->setup_fee_annually;
                $plan->setup_fee_biennially = $request->setup_fee_biennially;
                $plan->setup_fee_triennially = $request->setup_fee_triennially;
                $plan->price_annually = $request->price_annually;
                $plan->price_biennially = $request->price_biennially;
                $plan->price_triennially = $request->price_triennially;
            }
        }
        $plan->status = isset($request->status) ? 1 : 0;
        $plan->save();
    }

}
