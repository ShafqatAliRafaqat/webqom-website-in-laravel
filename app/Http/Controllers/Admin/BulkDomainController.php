<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\BulkDomain;

use App\Models\Page;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\GeneralFeature;
use App\Models\Country;
use App\Models\DomainPricing;
use App\Models\DomainPricingList;
use Session;
use Storage;
use Illuminate\Html\Form;
use Illuminate\Pagination\Paginator;


class BulkDomainController extends Controller
{
    protected $RMSALE = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->RMSALE[]['duration'] = '1-5';
        $this->RMLIST[]['duration'] = '1-5';
        $this->RMSALE[]['duration'] = '6-20';
        $this->RMLIST[]['duration'] = '6-20';
        $this->RMSALE[]['duration'] = '21-49';
        $this->RMLIST[]['duration'] = '21-49';
        $this->RMSALE[]['duration'] = '50-100';
        $this->RMLIST[]['duration'] = '50-100';
        $this->RMSALE[]['duration'] = '101-200';
        $this->RMLIST[]['duration'] = '101-200';
        $this->RMSALE[]['duration'] = '201-500';
        $this->RMLIST[]['duration'] = '201-500';

        $this->middleware('admin');
    }

    public function index($per_page = 10)
    {

        // $recent_update=$this->recent_update_time();
        //       $domains=BulkDomain::paginate($per_page);

        // $RMLIST = $this->RMLIST;
        // $RMSALE = $this->RMSALE;

        //     return view("admin.bulk_domain.list",compact('domains','recent_update', 'RMSALE', 'RMLIST', 'per_page'));

        $domain_addons = DomainPricing::where('type', 'addons')->where('status', '1')->get();

        $page_name = "Bulk Domain Pricing";
        $recent_update = $this->recent_update_time();
        $countries = Country::all();
        $view_file = 'list';
        $domain_pricing = DomainPricing::with('listing', 'bulk_pricing')->where('type', 'single')->paginate($per_page);
        return view("admin/bulk_domain.new_list", ['domain_pricing' => $domain_pricing,
                'page_name' => $page_name,
                'domain_addons' => $domain_addons,
                'per_page' => $per_page,
                'RMLIST' => $this->RMLIST,
                'RMSALE' => $this->RMSALE,
                'recent_update' => $recent_update]
        );


    }

    public function pricing($id = 0, $per_page = 10)
    {

        $recent_update = $this->recent_update_time();
        $domains = BulkDomain::where('domain_pricing_id', $id)->paginate($per_page);

        $RMLIST = $this->RMLIST;
        $RMSALE = $this->RMSALE;

        return view("admin.bulk_domain.list", compact('domains', 'recent_update', 'RMSALE', 'RMLIST', 'per_page'));
    }

    public function store(Request $request)
    {

        foreach ($this->RMSALE as $key => $RMSALE) {
            $domains = [];
            if ($_POST['year_sale_1' . $key] == '' || $_POST['year_list_1' . $key] == '') continue;

            $domains['domain_pricing_id'] = $_POST['domain_pricing_id'];
            $domains['status'] = $request->get('status');
            $domains['addons'] = !empty($request->get('addons')) ? implode(';', $request->get('addons')) : '';
            $pricing = $domains;
            $pricing['epp_code'] = $request->get('epp_code');
            $pricing['tld'] = $request->get('tld');
            $pricing = DomainPricingList::updateOrCreate(['domain_pricing_id' => $pricing['domain_pricing_id']], $pricing);

            $domains['duration'] = $this->RMSALE[$key]['duration'];

            $domains['year_sale_1'] = $_POST['year_sale_1' . $key];
            $domains['year_list_1'] = $_POST['year_list_1' . $key];
            $domains['year_sale_2'] = $_POST['year_sale_2' . $key];
            $domains['year_list_2'] = $_POST['year_list_2' . $key];
            $domains['year_sale_3'] = $_POST['year_sale_3' . $key];
            $domains['year_list_3'] = $_POST['year_list_3' . $key];
            $domains['year_sale_4'] = $_POST['year_sale_4' . $key];
            $domains['year_list_4'] = $_POST['year_list_4' . $key];
            $domains['year_sale_5'] = $_POST['year_sale_5' . $key];
            $domains['year_list_5'] = $_POST['year_list_5' . $key];
            $domains['year_sale_6'] = $_POST['year_sale_6' . $key];
            $domains['year_list_6'] = $_POST['year_list_6' . $key];
            $domains['year_sale_7'] = $_POST['year_sale_7' . $key];
            $domains['year_list_7'] = $_POST['year_list_7' . $key];
            $domains['year_sale_8'] = $_POST['year_sale_8' . $key];
            $domains['year_list_8'] = $_POST['year_list_8' . $key];
            $domains['year_sale_9'] = $_POST['year_sale_9' . $key];
            $domains['year_list_9'] = $_POST['year_list_9' . $key];
            $domains['year_sale_10'] = $_POST['year_sale_10' . $key];
            $domains['year_list_10'] = $_POST['year_list_10' . $key];

            // create or update price for domain and duration
            BulkDomain::updateOrCreate([
                'domain_pricing_id' => $domains['domain_pricing_id'],
                'duration' => $domains['duration']
            ], $domains);

        }

        Session::flash('success', 'Information was added successfully');
    }

    public function update(Request $request, $page_id)
    {
        $currentPage = $page_id; // You can set this to any page you want to paginate to

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });


        $domains = BulkDomain::paginate(5);


        foreach ($domains as $index => $domain) {
            $bdp_id = $domain->bdp_id;

            $post = new BulkDomain();


            $post->exists = true;
            $post->bdp_id = $bdp_id; //already exists in database.
            $post->year_sale_1 = str_replace('*', '', $_POST['year_sale_1' . $bdp_id]);
            $post->year_list_1 = str_replace('*', '', $_POST['year_list_1' . $bdp_id]);
            $post->year_sale_2 = str_replace('*', '', $_POST['year_sale_2' . $bdp_id]);
            $post->year_list_2 = str_replace('*', '', $_POST['year_list_2' . $bdp_id]);
            $post->year_sale_3 = str_replace('*', '', $_POST['year_sale_3' . $bdp_id]);
            $post->year_list_3 = str_replace('*', '', $_POST['year_list_3' . $bdp_id]);
            $post->year_sale_4 = str_replace('*', '', $_POST['year_sale_4' . $bdp_id]);
            $post->year_list_4 = str_replace('*', '', $_POST['year_list_4' . $bdp_id]);
            $post->year_sale_5 = str_replace('*', '', $_POST['year_sale_5' . $bdp_id]);
            $post->year_list_5 = str_replace('*', '', $_POST['year_list_5' . $bdp_id]);
            $post->year_sale_6 = str_replace('*', '', $_POST['year_sale_6' . $bdp_id]);
            $post->year_list_6 = str_replace('*', '', $_POST['year_list_6' . $bdp_id]);
            $post->year_sale_7 = str_replace('*', '', $_POST['year_sale_7' . $bdp_id]);
            $post->year_list_7 = str_replace('*', '', $_POST['year_list_7' . $bdp_id]);
            $post->year_sale_8 = str_replace('*', '', $_POST['year_sale_8' . $bdp_id]);
            $post->year_list_8 = str_replace('*', '', $_POST['year_list_8' . $bdp_id]);
            $post->year_sale_9 = str_replace('*', '', $_POST['year_sale_9' . $bdp_id]);
            $post->year_list_9 = str_replace('*', '', $_POST['year_list_9' . $bdp_id]);
            $post->year_sale_10 = str_replace('*', '', $_POST['year_sale_10' . $bdp_id]);
            $post->year_list_10 = str_replace('*', '', $_POST['year_list_10' . $bdp_id]);


            $post->save();


        }


        Session::flash('success', 'Information was updated successfully');
    }

    public function show($page)
    {
        //echo $page;
    }


    public function delete_selected(Request $request)
    {
        $selected_items = $request->get('bdp_id');


        if (!empty($selected_items)) {
            BulkDomain::whereIn('bdp_id', $selected_items)->delete();
            Session::flash('success', 'Information was deleted successfully');

        }
        Session::flash('success', 'Selected information was deleted successfully');

    }

    public function delete_all(Request $request)
    {
        BulkDomain::truncate();
        Session::flash('success', 'Information was deleted successfully');

    }

    public function recent_update_time()
    {
        $recent_date_timestamp = BulkDomain::select('updated_at')->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));

        }
        return $recent_update;
    }
}
