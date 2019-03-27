<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Country;
use App\Models\DomainPricing;
use App\Models\DomainPricingList;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Response;
use Session;

class DomainPricingController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $view_folder = "admin/domain_pricing.";
    protected $page_name = "Single Domain Pricing";

    public function index($per_page = 10, $type = 'single') {
        $domain_addons = "";
        $page_name = $this->page_name;
        $recent_update = $this->recent_update_time();
        $countries = Country::all();
        if ($type == 'single') {
            $view_file = 'list';
        } else if ($type == 'addons') {
            $view_file = 'list_addons';
        } else if ($type == 'bulk') {
            $view_file = 'list_bulk';
            $domain_addons = DomainPricing::where('type', 'addons')->get();
        } else {
            return abort(404);
        }
        $domain_pricing = DomainPricing::where('type', $type)->paginate($per_page);
        return view($this->view_folder . $view_file, ['domain_pricing' => $domain_pricing,
            'page_name' => $page_name,
            'domain_addons' => $domain_addons,
            'per_page' => $per_page,
            'recent_update' => $recent_update]
        );
    }

    public function addonsList($per_page = 10) {
        return $this->index($per_page, "addons");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type = 'single') {

        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        $record = new DomainPricing;
        $record->title = $request->title;
        $record->status = isset($request->status) ? 1 : 0;
        if ($type == 'addons') {
            $record->price = $request->price;
            $record->pricing_type = $request->price_type;
            $record->type = 'Addons';
        }
        $record->save();

        Session::flash('success', 'Information was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $clients = User::where("id", $id)->first();
        $clients->recent_update = date("d M,Y", strtotime($clients->client->updated_at)) . " @ " . date("h:i a", strtotime($clients->updated_at));
        $countries = Country::all();
        return view("admin.clients.edit", ['clients' => $clients,
            'countries' => $countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type = 'Single') {
        //return $request->all();

        $id = $request->id;
        $this->validate($request, [
            'title' => 'required|max:255',
        ]);
        if ($type == 'addons') {
            $this->validate($request, [
                'price' => 'required|numeric',
            ]);
        }
        $record = DomainPricing::find($id);
        $record->title = $request->title;
        $record->status = $request->status;
        if ($type == 'addons') {
            $record->price = $request->price;
            $record->pricing_type = $request->pricing_type;
        }
        $record->save();
        Session::flash('success', 'Information was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
        $id = $request->id;
        if (is_array($id)) {
            foreach ($id as $i) {
                DomainPricing::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            DomainPricing::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
        }
    }

    public function recent_update_time($type = 'Single') {
        $recent_date_timestamp = DomainPricing::select('updated_at')->where("type", 'Single')->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }

    public function recent_update_time_list($id) {
        $recent_date_timestamp = DomainPricingList::select('updated_at')->where('domain_pricing_id', $id)->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }

    public function search_clients(Request $request) {
        $recent_update = $this->recent_update_time();
        $formated_date = "";
        if ($request->created_date != "") {
            $created_date = explode('/', $request->created_date);
            $formated_date = $created_date[2] . "-" . $created_date[1] . "-" . $created_date[0];
        }
        $countries = Country::all();
        if ($request->client_name == "" && $request->client_id == "") {
            $clients = User::from('users as u')
                    ->where('u.role', "=", "Client")
                    ->orderBy('u.created_at', 'desc')
                    ->get();

            return view("admin.clients.list", ['clients' => $clients,
                'countries' => $countries,
                'recent_update' => $recent_update,
                'search_error' => 'Either "client ID" or "Client Name" field is mandatory.',
            ]);
        } else {
            $clients = User::from('users as u')
                    ->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', "%" . $request->client_name . "%")
                    ->where('c.client_id', 'like', "%$request->client_id%")
                    ->where('u.email', 'like', "%$request->email%")
                    ->where('c.company', 'like', "%$request->company%")
                    ->whereDate("u.created_at", 'like', "%$formated_date%")
                    ->where('c.account_type', 'like', "%$request->account_type%")
                    ->where('u.role', "=", "Client")
                    ->join('client_registration_info as c', 'c.user_id', '=', 'u.id')
                    ->orderBy('u.created_at', 'desc')
                    ->get();
            if (count($clients) > 0) {
                $search_msg = "search_success";
            } else {
                $search_msg = "search_error";
            }
            return view("admin.clients.list", ['clients' => $clients,
                'countries' => $countries,
                'recent_update' => $recent_update,
                $search_msg => count($clients) . ' client(s) found',
            ]);
        }
    }

    public function export_csv() {
        $table = User::where('role', 'Client')->get();
        $filename = "clients_" . time() . ".csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Client_ID', 'Name', 'Email', 'Company', 'Postal Code', 'Address', 'Account Type', 'Phone', 'Mobile', 'Status', 'News Letter', 'created at'));

        foreach ($table as $row) {
            if ($row->client) {
                if ($row->client->city_id > 0) {
                    $city_name = $row->client->city->name;
                } else {
                    $city_name = "";
                }
                fputcsv($handle, array($row->client->client_id,
                    $row->client['first_name'] . " " . $row->client['last_name'],
                    $row['email'],
                    $row->client['company'],
                    $row->client['postal_code'],
                    $row->client->address1 . " " . $row->client->address2 . ", " .
                    $city_name . ", " .
                    $row->client->state->name . ", " .
                    $row->client->country->name,
                    $row->client->account_type,
                    $row->client->phone_number,
                    $row->client->mobile_number,
                    $row->client->status == 1 ? "Active" : "Inactive",
                    $row->client->status == 1 ? "Subscribed" : "Unsubscribed",
                    $row->client['created_at']));
            }
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, $filename, $headers);
    }

    public function delelte_all(Request $request) {
        if ($request->user()->role == 'Admin') {
            $clients = User::where('role', 'Client')->get();
            foreach ($clients as $i) {
                User::find($i->id)->delete();
            }
            Session::flash('success', 'Deleted successfully');
            return response('success', 200);
        } else {
            return response("unauthorized", 'delete');
        }
    }

    public function get_details(Request $request) {
        $id = $request->id;
        if ($id != null) {
            if (is_array($id)) {
                $data = DomainPricing::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

}
