<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DomainPricing;
use App\Models\FAQ;
use App\Models\GeneralFeature;
use App\Models\FreequoteEnquiry;
use App\Models\Email88SpecialFeature;
use App\Models\Web88irSpecialFeature;
use App\Models\IndexPlan;
use App\Models\Page;
use Carbon\Carbon;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\ServicesFreeDomain;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;
//use App\Models\DomainPricing; // For index page domain pricing || Added by mrloffel
use App\Models\DomainPricingList; // For index page domain pricing || Added by mrloffel


class ServicesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        /* $this->middleware('admin'); */
    }

    public function index(Request $request, $page_slug, $preview = false)
    {
        $page_name = strtolower(str_replace('_', ' ', $page_slug));
        $cms = Page::where('name', $page_name)->first();
        if ($preview != false) {
            if (Auth::user()->role != "Admin") {
                return "you are not authorized to view this page in preview mode";
            }
            $cms->content = $cms->temp;
        }
        $plans = Plan::where('page', $page_name)->where('status', 1)->orderby('sort_order')->take(3)->get();
        if (!$cms) {
            return abort(404);
        }

        $featured_plans = PlanFeature::where('page', $page_name)->where('status', 1)->get();
        $faq = FAQ::where('page', $page_name)->where('status', 1)->get();
        $general_features = GeneralFeature::where('page', $page_name)->where('status', 1)->get();
        $email88_special_features = Email88SpecialFeature::where('page', $page_name)->get();
        $web88ir_special_features = Web88irSpecialFeature::where('page', $page_name)->get();
        $recent_update = $this->recent_update_time();
        $service_free_domains = ServicesFreeDomain::where('page', $page_name)->first();
        $page_header = strtoupper(str_replace('_', ' ', $page_slug));
        $sub_header = "";
        $duplicate_from = $cms->duplicate_from;
        if ($cms->is_ssl_page) {
            $featured_plans = PlanFeature::where('page', $page_name)->where('status', 1)->get();
        }
        if ($cms->is_ssl_page) {
            return view('frontend.ssl', compact('faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
        }
        if ($cms->is_ecomerce_page) {
            return view('frontend.econmerece', compact('faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
        }

        if ($page_name == 'bulk domain search') {
//            $mainPageData = DomainMainPage::first();
            $domainPricing = DomainPricing::where('type', 'single')->get();
            $domainPricingList = DomainPricingList::all();
            $domain_pricing = DomainPricing::with('listing', 'bulk_pricing')->where('type', 'single')->get();
            $bulkDomains = trim($request->input('bulk_domains'));
            $response = $this->bulkSearch($bulkDomains);
            $RMSALE = array();
            $RMSALE[]['duration'] = '1-5';
            $RMLIST[]['duration'] = '1-5';
            $RMSALE[]['duration'] = '6-20';
            $RMLIST[]['duration'] = '6-20';
            $RMSALE[]['duration'] = '21-49';
            $RMLIST[]['duration'] = '21-49';
            $RMSALE[]['duration'] = '50-100';
            $RMLIST[]['duration'] = '50-100';
            $RMSALE[]['duration'] = '101-200';
            $RMLIST[]['duration'] = '101-200';
            $RMSALE[]['duration'] = '201-500';
            $RMLIST[]['duration'] = '201-500';
            return view('frontend.services', compact('mainPageData', 'bulkDomains', 'RMSALE', 'RMLIST', 'domainPricing', 'domain_pricing', 'domainPricingList', 'response', 'faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'email88_special_features', 'web88ir_special_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
        }

        if ($page_name == 'single domain search') {
            $domainPricing = DomainPricing::where('type', 'single')->get();
            $domainPricingList = DomainPricingList::all();
            $domain_pricing = DomainPricing::with('listing', 'bulk_pricing')->where('type', 'single')->get();
            $search_domain = trim($request->input('search_domain'));
            $response = $this->singleSearch($search_domain);
            return view('frontend.services', compact('mainPageData', 'search_domain', 'domainPricing', 'domain_pricing', 'domainPricingList', 'response', 'faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'email88_special_features', 'web88ir_special_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
        }
        if ($page_name == 'bulk domain transfer') {
            $domainPricing = DomainPricing::where('type', 'single')->get();
            $domainPricingList = DomainPricingList::all();
            $domain_pricing = DomainPricing::with('listing', 'bulk_pricing')->where('type', 'single')->get();
            $transferDomains = $request->transfer_domains;
            if (!empty($transferDomains))
                $response = $this->bulkTransfer($transferDomains);
            $RMSALE = array();
            $RMSALE[]['duration'] = '1-5';
            $RMLIST[]['duration'] = '1-5';
            $RMSALE[]['duration'] = '6-20';
            $RMLIST[]['duration'] = '6-20';
            $RMSALE[]['duration'] = '21-49';
            $RMLIST[]['duration'] = '21-49';
            $RMSALE[]['duration'] = '50-100';
            $RMLIST[]['duration'] = '50-100';
            $RMSALE[]['duration'] = '101-200';
            $RMLIST[]['duration'] = '101-200';
            $RMSALE[]['duration'] = '201-500';
            $RMLIST[]['duration'] = '201-500';
            return view('frontend.services', compact('response', 'transfer_domains', 'mainPageData', 'bulkDomains', 'RMSALE', 'RMLIST', 'domainPricing', 'domain_pricing', 'domainPricingList', 'response', 'faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'email88_special_features', 'web88ir_special_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
        }
        if ($page_name == 'single domain transfer') {
            $domainPricing = DomainPricing::where('type', 'single')->get();
            $domainPricingList = DomainPricingList::all();
            $domain_pricing = DomainPricing::with('listing', 'bulk_pricing')->where('type', 'single')->get();
            $search_domain = trim($request->input('transfer_domain'));
            $response = $this->singleTransfer($search_domain);
            return view('frontend.services', compact('mainPageData', 'search_domain', 'domainPricing', 'domain_pricing', 'domainPricingList', 'response', 'faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'email88_special_features', 'web88ir_special_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
        }

        return view('frontend.services', compact('faq', 'page_header', 'service_free_domains', 'sub_header', 'indexplans', 'general_features', 'email88_special_features', 'web88ir_special_features', 'plans', 'featured_plans', 'cms', 'page_name', 'page_slug', 'duplicate_from'));
    }

    private function bulkSearch($bulkDomains)
    {
        $bulkDomains = str_replace("\r\n", "\n", $bulkDomains);
        $bulks = explode("\n", $bulkDomains);
        $success = array();
        $error = array();
        $available = "";
        $taken = "";
        foreach ($bulks as $bulk) {
            $bulk = trim($bulk);
            $bulk = str_replace("www.", "", $bulk);
//            $extension = strstr($bulk, '.');
            $result = [];

            if (!empty($bulk)) {
                $resp = (new DomainsController)->checkDomainAPI($bulk);

                if ($resp[0] == 0) {
                    $success[$bulk] = ['status' => $resp[0]];
                    $success[$bulk] = (object)$success[$bulk];
                    $available .= ",$bulk";

                } else {
                    $error[$bulk] = [
                        'status' => $resp[0]
                    ];
                    $error[$bulk] = (object)$error[$bulk];
                    $taken .= ",$bulk";
                }
            }
        }
        $available = ltrim($available, ',');
        $taken = ltrim($taken, ',');

        return (object)['success' => $success, 'error' => $error, 'available' => $available, 'taken' => $taken];
    }

    private function bulkTransfer($bulkDomains)
    {
        $bulkDomains = trim($bulkDomains);
        $bulkDomains = str_replace("\r\n", "\n", $bulkDomains);
        $bulks = explode("\n", $bulkDomains);
        $response = array();
        foreach ($bulks as $bulk) {
            $bulk = trim($bulk);
            $bulk = str_replace("www.", "", $bulk);
            if (!empty($bulk)) {
                $controller = (new DomainsController);
                $apiResponse = $controller->checkDomainAPI($bulk);
                $whoisData = $controller->whoisapi($bulk);
                $response[$bulk] = [
                    'status' => $apiResponse[0],
                    'domain' => $bulk,
                    'status_code' => $whoisData['status'],
                    'privacy' => $whoisData['privacy'],
                    'reg_days' => Carbon::now()->diffInDays(new Carbon($whoisData['date'])),
                ];
                $response[$bulk] = (object)$response[$bulk];
            }
        }

        return (object)$response;
    }

    private function singleTransfer($bulk)
    {
        $response = array();
        $bulk = trim($bulk);
        $bulk = str_replace("www.", "", $bulk);
        if (!empty($bulk)) {
            $controller = (new DomainsController);
            $apiResponse = $controller->checkDomainAPI($bulk);
            $whoisData = $controller->whoisapi($bulk);

            $response = [
                'status' => $apiResponse[0],
                'domain' => $bulk,
                'status_code' => $whoisData['status'],
                'privacy' => $whoisData['privacy'],
                'reg_days' => Carbon::now()->diffInDays(new Carbon($whoisData['date'])),
            ];
            return (object)$response;
        }
        return null;
    }

    private function singleSearch($domain)
    {
        $success = array();
        $error = array();
        $available = "";
        $taken = "";
        $bulk = trim($domain);
        $bulk = str_replace("www.", "", $bulk);
        $bulk = $this->validateUserDomainSearchInput($bulk);

        $result = [];
        if (!empty($bulk)) {
            $resp = (new DomainsController)->checkDomainAPI($bulk);
            if ($resp[0] == 0) {
                $success[$bulk] = ['status' => $resp[0]];
                $success[$bulk] = (object)$success[$bulk];
                $available = "$bulk";

            } else {
                $error[$bulk] = [
                    'status' => $resp[0]
                ];
                $error[$bulk] = (object)$error[$bulk];
                $taken = "$bulk";
            }
        }
        return (object)['success' => $success, 'error' => $error, 'available' => $available, 'taken' => $taken];
    }


    private function validateUserDomainSearchInput($domain)
    {
        $spaces = '/\s/';
        $noneUrlChars = '/[!\@\[#$%^&*()+?<>=~\,\?\`\?\;\'\"|_\{\\\}]/';
        $domain = preg_replace($spaces, '', $domain);
        $domain = strtolower(preg_replace($noneUrlChars, '', $domain));
        $domainName = strstr($domain, '.', true);
        if ($domainName == false) {
            $domainName = $domain;
            $domainTld = 'com';
        } else {
            $domainTld = str_replace($domainName . '.', '', $domain);
        }

        //check if such tld exist in Database
        $tldExist = DomainPricingList::where('tld', $domainTld)->first();
        $domainTld = $tldExist ? $domainTld : 'com';
        return $domainName . '.' . $domainTld;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.index-plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        //return $request->all();
        $requestData = $request->all();

        Page::create($requestData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $indexplan = IndexPlan::findOrFail($id);

        return view('admin.index-plan.show', compact('indexplan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $indexplan = IndexPlan::findOrFail($id);

        return view('admin.index-plan.edit', compact('indexplan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $index_plan = IndexPlan::findOrFail($id);
        $this->validate($request, [
            'name_line1' => 'required|max:255',
            'name_line2' => 'required|max:255',
            'enable_plan_button_other' => 'required_if:enable_plan_button,other',
            'sort_order' => 'required|numeric|max:255',
            'url' => 'required|url|max:255',
        ]);
        if (strtolower($request->pricing_type) != "free") {
            $this->validate($request, [
                'pricing_currency_other' => 'required_if:pricing_currency,USD,other',
                'recurring_currency_other' => 'required_if:recurring_currency,USD,other',
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
            ]);
        }
        $index_plan->name_line1 = $request->name_line1;
        $index_plan->name_line2 = $request->name_line2;
        $index_plan->url = $request->url;
        $index_plan->enable_plan_button = $request->enable_plan_button;
        $index_plan->enable_plan_button_other = $request->enable_plan_button_other;
        $index_plan->sort_order = ($request->sort_order) != "" ? $request->sort_order : 0;
        $index_plan->price_type = $request->pricing_type;
        if (strtolower($request->pricing_type) != "free") {
            $index_plan->setup_fee_one_time = $request->setup_fee_one_time;
            $index_plan->setup_fee_monthly = $request->setup_fee_monthly;
            $index_plan->price_monthly = $request->price_monthly;
            $index_plan->price_one_time = $request->price_one_time;
            if (strtolower($request->pricing_type) == "one time") {
                $index_plan->pricing_currency = $request->pricing_currency;
                $index_plan->pricing_currency_other = $request->pricing_currency_other;
            } else if (strtolower($request->pricing_type) == "recurring") {
                $index_plan->recurring_currency = $request->recurring_currency;
                $index_plan->recurring_currency = $request->recurring_currency;
                $index_plan->recurring_currency_other = $request->recurring_currency_other;
                $index_plan->recurring_first_month = $request->recurring_first_month;
                $index_plan->recurring_first_year = $request->recurring_first_year;
                /* prcing fields */
                $index_plan->setup_fee_annually = $request->setup_fee_annually;
                $index_plan->setup_fee_biennially = $request->setup_fee_biennially;
                $index_plan->setup_fee_triennially = $request->setup_fee_triennially;
                $index_plan->price_annually = $request->price_annually;
                $index_plan->price_biennially = $request->price_biennially;
                $index_plan->price_triennially = $request->price_triennially;
            }
        }
        $index_plan->status = isset($request->status) ? 1 : 0;
        $index_plan->save();
        return date("d M,Y", strtotime($index_plan->updated_at)) . " @ " . date("h:i a", strtotime($index_plan->updated_at));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        IndexPlan::destroy($id);

        Session::flash('flash_message', 'IndexPlan deleted!');

        return redirect('admin/index-plan');
    }

    public function delete(Request $request)
    {

        //return $request->all();
        $id = $request->id;
        if (is_array($id)) {
            foreach ($id as $i) {
                IndexPlan::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            IndexPlan::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
            return redirect('admin/index-plan');
        }
    }

    public function image_update(Request $request)
    {
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

    public function recent_update_time()
    {
        $recent_date_timestamp = IndexPlan::select('updated_at')->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }

    public function get_index_plan_details(Request $request)
    {
        $id = $request->id;
        if ($id != null) {
            if (is_array($id)) {
                $indexplans = IndexPlan::whereIn('id', $id)->get();
                return $indexplans;
            }
        }
    }

    public function update_sort(Request $request)
    {
        if (!empty($request->data)) {
            foreach ($request->data as $key) {
                $indexplan = IndexPlan::find($key['id']);
                $indexplan->sort_order = $key['sort_order'];
                $indexplan->save();
            }
        }
    }

    public function cms_update(Request $request)
    {
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

    public function right_section(Request $request)
    {
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_section')->first();
        $cms->content = $request->data;
        $cms->save();
        return $cms;
    }

    public function left_section(Request $request)
    {

        $cms = PageCms::where('page_id', 1)->where('slug', 'left_section')->first();
        $cms->content = $request->title;
        $cms->save();
        return $cms;
    }

    public function enquiry(Request $request)                //Receiving AJAX Request Data here
    {
        if (!empty($request->inputName)) {
            $form = new FreequoteEnquiry;
            $form->service = $request->inputService;
            $form->name = $request->inputName;
            $form->email = $request->inputEmail;
            $form->company = $request->inputCompany;
            $form->phone = $request->inputPhone;
            $form->website = $request->inputWebsite;
            $form->message = $request->inputMessage;
            $form->save();
        }
    }
}
