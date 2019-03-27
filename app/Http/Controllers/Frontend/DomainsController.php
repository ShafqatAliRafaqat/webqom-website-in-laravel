<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DomainMainPage;
use App\Models\SingleTransferPage;
use App\Models\IndexPlan;
use App\Models\Page;
use App\Models\PageCms;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use App\Models\DomainPricing; // For index page domain pricing || Added by mrloffel
use App\Models\DomainPricingList; // For index page domain pricing || Added by mrloffel
use Carbon\Carbon; // For transfer login page || Added by mrloffel
use Illuminate\Support\Facades\Validator;
use Session;
use Storage;
use App\Libs\Transport;

class DomainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct()
    {
        //require login
        $this->transport = new Transport;
        $this->middleware('auth')->except('index', 'transferPage', 'search', 'ajaxDomainSearch');
    }

    public function index()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://my.webnic.cc/jsp/pn_whoisprivacyquery.jsp?source=webcc-webqomtec1&domain=ATHENATODD.COM&otime=',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        // ========
        $mainPageData = DomainMainPage::first();
        $domainPricing = DomainPricing::where('type', 'single')->get();
        $domainPricingList = DomainPricingList::all();
        return view('frontend.domain.index', compact(['mainPageData', 'domainPricing', 'domainPricingList']));
    }

    public function searchLogin(Request $request)
    {
        $request->session()->forget('failed');
        if (isset($request->login_domain)) {
            $validateData = Validator::make($request->all(), [
                'login_domain' => ['required', 'regex:/^(?!:\/\/)([a-zA-Z0-9-_]+\.)*[a-zA-Z0-9][a-zA-Z0-9-_]+\.[a-zA-Z]{2,11}?$/']
            ]);

            if ($validateData->fails()) {
                Session::flash('failed', 'The domains name is incorrect');
                return view('frontend.domain.transfer_login');
            }


            $response = $this->checkDomainAPI($request->login_domain);

            $response = [
                'status' => $response[0],
                'domain' => $request->login_domain
            ];
            $response = (object)$response;
            $domainPricingList = DomainPricingList::all();
            return view('frontend.domain.transfer_login', compact(['response', 'domainPricingList']));
        }
        return view('frontend.domain.transfer_login');
    }

    public function transferLogin(Request $request)
    {

        if (isset($request->transfer_domain)) {
//            if (!$this->is_valid($request->transfer_domain)) {
//                Session::flash('failed', 'The domains name is invalid');
//                return view('frontend.domain.transfer_login');
//            }
            $domainPricingList = DomainPricingList::all();
            $response = $this::checkDomainAPI($request->transfer_domain);
            $response = [
                'status' => $response[0],
                'domain' => $request->transfer_domain
            ];

            $whoisData = $this::whoisDomainAPI($response['domain']);
            $response['privacy_code'] = 0;
            if ($whoisData['status_code'] == 0) {
                $response['status_code'] = $whoisData['status'];
                $response['privacy_code'] = 1;
                $response['reg_days'] = Carbon::now()->diffInDays(new Carbon($whoisData['creation date']));
            } else {
                $response['status_code'] = -1;
                $response['reg_days'] = -1;
            }

            $response = (object)$response;//print_r($response);exit;
            return view('frontend.domain.transfer_login', compact('response', 'domainPricingList'));
        }

        return view('frontend.domain.transfer_login');
    }


    function is_valid($domain_name)
    {
        return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
            && preg_match("/^.{1,253}$/", $domain_name) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)); //length of each label
    }

    public function transferPage(Request $request)
    {
        $transferPage = SingleTransferPage::first();
        $domainPricing = DomainPricing::where('type', 'single')->get();
        $domainPricingList = DomainPricingList::all();
        $domain = $request->transfer_domain;
        if (isset($request->transfer_domain)) {

            $validateData = Validator::make($request->all(), [
                'transfer_domain' => ['required', 'regex:/^(?!:\/\/)([a-zA-Z0-9-_]+\.)*[a-zA-Z0-9][a-zA-Z0-9-_]+\.[a-zA-Z]{2,11}?$/']
            ]);

            if ($validateData->fails()) {
                Session::flash('failed', 'The domains name is incorrect');
                return view('frontend.domain.transfer_page', compact('transferPage', 'domainPricing', 'domainPricingList'));
            }

            $response = $this->checkDomainAPI($request->transfer_domain);

            $response = [
                'status' => $response[0],
                'domain' => $request->transfer_domain
            ];


            $whoisData = $this::whoisapi($domain);
            $response['status_code'] = $whoisData['status'];
            $response['privacy'] = $whoisData['privacy'];
            $response['reg_days'] = Carbon::now()->diffInDays(new Carbon($whoisData['date']));

            $response = (object)$response;

            return view('frontend.domain.transfer_page', compact(['transferPage', 'domainPricingList', 'domainPricing', 'response']));
        }

        return view('frontend.domain.transfer_page', compact(['transferPage', 'domainPricingList', 'domainPricing']));
    }

    public function registerNewLogin(Request $request)
    {
        if (isset($request->login_domain)) {
            $response = $this::checkDomainAPI($request->login_domain);
            $response = [
                'status' => $response[0],
                'domain' => $request->login_domain
            ];
            $response = (object)$response;
            $domainPricingList = DomainPricingList::all();
            return view('frontend.domain.register_new_login', compact(['response', 'domainPricingList']));
        }
        return view('frontend.domain.register_new_login');
    }

    public function domainRenewal(Request $request)
    {
        // $response = $this::whoisDomainAPI('fohsan.com.my');

        $domains = auth()->user()->domains;

        if (count($domains) > 0) {
            foreach ($domains as $domain) {
                $domain->exp_date = $this::whoisDomainAPI($domain->name)['expire date'];
            }
        }

        return view('frontend.domain.domain_renewal', compact('domains'));
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_domain' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('frontend.domain.search')
                ->withErrors($validator)
                ->withInput();
        }

        list($filteredDomain, $tld) = $this->validateUserDomainSearchInput($request->search_domain);

        $mainPageData = DomainMainPage::first();
        $domainPricing = DomainPricing::where('type', 'single')->get();
        $domainPricingList = DomainPricingList::all();

        $response = $this->checkDomainAPI($filteredDomain);


        $response = [
            'status' => $response[0],
            'domain' => $filteredDomain
        ];

        $response = (object)$response;

        $type = 'new';
        $findedDomainPrice = DomainPricingList::where([['type', $type], ['tld', $tld]])->first();

        return view('frontend.domain.search', compact(
            [
                'domainPricingList',
                'findedDomainPrice',
                'mainPageData',
                'domainPricing',
                'response'
            ]
        ));
    }

    public function bulkSearch(Request $request, $page_name)
    {
        $validator = Validator::make($request->all(), [
            'bulk_domains' => 'required'
        ]);

        if ($validator->fails()) {
            return 'false';
//            return redirect()->route('frontend.services.bulk_search')
//                ->withErrors($validator)
//                ->withInput();
        }

//        $mainPageData = DomainMainPage::first();
//        $domainPricing = DomainPricing::where('type', 'single')->get();
//        $domainPricingList = DomainPricingList::all();

        $bulkDomains = trim($request->input('bulk_domains'));
        $bulkDomains = str_replace("\r\n", "\n", $bulkDomains);
        $bulks = explode("\n", $bulkDomains);

        $response = array();
        foreach ($bulks as $bulk) {
            $bulk = trim($bulk);
            if (!empty($bulk)) {
                $resp = $this->checkDomainAPI($bulk);
                $response[$bulk] = [
                    'status' => $resp[0]
                ];
            }
        }

        return $response = (object)$response;
    }

    public function ajaxDomainSearch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_domain' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $view = view("frontend.domain.partials.search_results", compact(['errors']))->render();
            return response()->json(['content' => $view]);
        }

        list($filteredDomain, $tld) = $this->validateUserDomainSearchInput($request->search_domain);
        $response = $this->checkDomainAPI($filteredDomain);

        $response = [
            'status' => $response[0],
            'domain' => $filteredDomain
        ];
        $response = (object)$response;

        $type = 'new';
        $findedDomainPrice = DomainPricingList::where([['type', $type], ['tld', $tld]])->first();
        $view = view("frontend.domain.partials.search_results", compact(['findedDomainPrice', 'response']))->render();
        return response()->json(['content' => $view, 'filteredDomain' => $filteredDomain]);
    }

    public function validateUserDomainSearchInput($domain)
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

        return [$domainName . '.' . $domainTld, $domainTld];
    }

    // API function to check available domain || Added by mrloffel
    public function checkDomainAPI($url)
    {

        // example of request for get method https://my.webnic.cc/jsp/pn_qry.jsp?source=webcc-webqomtec1&domain=mail.com
        $method = 'GET';
        $baseUrl = 'https://my.webnic.cc';
        $resource = '/jsp/pn_qry.jsp';
        $payload = [
            'source' => 'webcc-webqomtec1',
            'domain' => $url,
        ];

        $result = $this->transport->request($method, $baseUrl, $resource, $payload);

        return explode("\t", $result);
    }

    public function whois($domain)
    {
        $domain = str_replace("www.", "", $domain);
        $site = "http://www." . $domain;
        $dd = "https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=$site&screenshot=true";

        try {
            $image = file_get_contents($dd);
            $image = json_decode($image, true);
            $image = "data:image/jpeg;base64," . $image['screenshot']['data'];
            $image = str_replace(array('_', '-'), array('/', '+'), $image);
        } catch (\Exception $exception) {
            $image = '';
        }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://iwhois.webnic.cc/jsp/whois.jsp?source=webcc-webqomtec1&domain=' . $domain,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            dd("cURL Error #:" . $err);
        } else {
            $lines = [];
            function getArr($arr)
            {
                $string = (isset($arr[1])) ? $arr[1] : '';
                return $string;
            }

            function getMultipleParam($param_str, $resp, $exclude_char = null)
            {
                $array = [];
                $res = explode($param_str, $resp);
                foreach ($res as $key => $val) {
                    if ($key > 0) {
                        $v = explode('<br>', $val)[0];
                        if (!in_array(strtoupper($v), $array)) {
                            if ($exclude_char) {
                                if (strpos($v, $exclude_char) === false) {
                                    $array[] = $v;
                                }
                            } else {
                                $array[] = $v;
                            }
                        }
                    }
                }
                return $array;
            }

            function arrayToObject($array)
            {
                $json = json_encode($array);
                $object = json_decode($json);
                return $object;
            }

            //print_r($response);exit;
            if (strpos($response, 'No match for domain') === false) {
                if (strpos($response, "SEARCH BY DOMAIN NAME") === false) {
                    $lines["image"] = $image;
                    $lines["last_updated"] = explode(" <<<", getArr(explode(">>> Last update of whois database: ", $response)))[0];
                    $lines["domain_name"] = explode("<br>", getArr(explode("Domain Name: ", $response)))[0];
                    $lines["registry_domain_id"] = explode("<br>", getArr(explode("Registry Domain ID: ", $response)))[0];
                    $lines["registrar"] = [];
                    $lines["registrar"]["whois_server"] = explode("<br>", getArr(explode("Registrar WHOIS Server: ", $response)))[0];
                    $lines["registrar"]["url"] = explode("<br>", getArr(explode("Registrar URL: ", $response)))[0];
                    $lines["updated_date"] = explode("<br>", getArr(explode("Updated Date: ", $response)))[0];
                    $lines["creation_date"] = explode("<br>", getArr(explode("Creation Date: ", $response)))[0];
                    $lines["expiry_date"] = explode("<br>", getArr(explode("Registry Expiry Date: ", $response)))[0];
                    $lines["registrar"]["name"] = explode("<br>", getArr(explode("Registrar: ", $response)))[0];
                    $lines["registrar"]["iana_id"] = explode("<br>", getArr(explode("Registrar IANA ID: ", $response)))[0];
                    $lines["registrar"]["phone"] = explode("<br>", getArr(explode("Registrar Abuse Contact Phone: ", $response)))[0];
                    $lines["registry_registrant_id"] = explode("<br>", getArr(explode("Registry Registrant ID: ", $response)))[0];
                    $lines["registrant"] = [];
                    $lines["registrant"]["organization"] = explode("<br>", getArr(explode("Registrant Organization: ", $response)))[0];
                    $lines["registrant"]["street"] = explode("<br>", getArr(explode("Registrant Street: ", $response)))[0];
                    $lines["registrant"]["city"] = explode("<br>", getArr(explode("Registrant City: ", $response)))[0];
                    $lines["registrant"]["state"] = explode("<br>", getArr(explode("Registrant State/Province: ", $response)))[0];
                    $lines["registrant"]["postcode"] = explode("<br>", getArr(explode("Registrant Postal Code: ", $response)))[0];
                    $lines["registrant"]["country"] = explode("<br>", getArr(explode("Registrant Country: ", $response)))[0];
                    $lines["registrant"]["phone"] = explode("<br>", getArr(explode("Registrant Phone: ", $response)))[0];
                    $lines["registrant"]["address"] = "Not available";
                    if (
                        $lines["registrant"]["street"] != '' and
                        $lines["registrant"]["city"] != '' and
                        $lines["registrant"]["state"] != '' and
                        $lines["registrant"]["postcode"] != '' and
                        $lines["registrant"]["country"]
                    ) {
                        $lines["registrant"]["address"] = $lines["registrant"]["country"] . ", " . $lines["registrant"]["state"] . ", " . $lines["registrant"]["city"] .
                            ", " . $lines["registrant"]["street"] . ", " . $lines["registrant"]["postcode"];
                    }
                    $lines["registrant"]["fax"] = explode("<br>", getArr(explode("Registrant Fax: ", $response)))[0];
                    $lines["registrant"]["email"] = explode("<br>", getArr(explode("Registrant Email: ", $response)))[0];
                    $lines["domain_status"] = getMultipleParam("Domain Status: ", $response, "www.");
                    $lines["name_server"] = getMultipleParam("Name Server: ", $response);
                } else {
                    $lines["name_server"][] = str_replace(["<br>", " "], ['', ''], explode("<br>
  ", getArr(explode("k [Primary Name Server]              ", $response)))[1]);
                    $lines["name_server"][] = str_replace(["<br>", " "], ['', ''], explode("<br>
  ", getArr(explode("l [Secondary Name Server]            ", $response)))[1]);
                    $lines["image"] = $image;
                    $lines["registrar"] = [];
                    $lines["registrant"] = [];
                    $lines["domain_status"][0] = "Not available";
                    $extra_registrar_info = explode("<br>", getArr(explode("f [Invoicing Party]                            ", $response)));
                    $lines["registrar"]["name"] = $extra_registrar_info[2];
                    $lines["registrant"]["address"] = $extra_registrar_info[3] . ", " . $extra_registrar_info[4] . ", " . $extra_registrar_info[5] . ", " . $extra_registrar_info[6] . ", " . $extra_registrar_info[7];
                    $lines["last_updated"] = null;
                    $lines["domain_name"] = explode("<br>", getArr(explode("a [Domain Name]                 ", $response)))[0];
                    $lines["updated_date"] = explode("<br>", getArr(explode("e [Record Last Modified]        ", $response)))[0];
                    $lines["creation_date"] = explode("<br>", getArr(explode("c [Record Created]              ", $response)))[0];
                    $lines["expiry_date"] = explode("<br>", getArr(explode("d [Record Expired]              ", $response)))[0];
                    $lines["registrant"]["phone"] = explode("  <br>", getArr(explode("(Tel) ", $response)))[0];
                }
            } else {
                $lines['message'] = "No match for domain \"" . $domain . "\"";
                $lines['last_updated'] = explode(" <<<", getArr(explode(">>> Last update of whois database: ", $response)))[0];
            }
        }
        $lines['raw'] = $response;
        $response = arrayToObject($lines);
        return view('frontend.domain.whois', ["response" => $response, "domain" => $domain]);
    }

    public function whoisapi($domain)
    {
        $date = new Carbon();
        $status = 4;
        $privacy = 0;
        $domain = str_replace("www.", "", $domain);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://iwhois.webnic.cc/jsp/whois.jsp?source=webcc-webqomtec1&domain=' . $domain,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
        } else {
            $response = (explode("\n", $response));
//            dd($response);
            foreach ($response as $line) {
                $trim = trim($line);
                $trim = str_replace("<br>", "", $trim);
                if (!empty($trim)) {
                    if (substr($trim, 0, 14) === "Creation Date:") {
                        $status = 1;
                        $trim = str_replace("Creation Date: ", "", $trim);
                        $date = new Carbon($trim);
//                        break;
                    } else if (substr($trim, 0, 19) === "No match for domain") {
                        $status = 0;
//                        break;
                    } else if (strpos(strtolower($trim), 'whoisprotection') !== false) {
                        $privacy = 1;
//                        dd('hh');
                    } elseif (strpos(($trim), "clientTransferProhibited") !== false) {
                        $status = 5;
//                        dd('h');
                    }
                }
            }
        }
        return array(
            'status' => $status, 'date' => $date, 'privacy' => $privacy
        );
    }

    /**
     * Info: API function to get webnic whois data about domain || Added by mrloffel
     * Status:
     *        -A = Active
     *        -N = ??
     *        -E = Expired
     */
    public function whoisDomainAPI($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://my.webnic.cc/jsp/pn_whois.jsp?source=webcc-webqomtec1&domain=' . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            dd("cURL Error #:" . $err);
        } else {
            $lines = [];

            if (strlen($response) > 60) {
                foreach (preg_split("/((\r?\n)|(\r\n?))/", $response) as $line) {
                    $temp = explode("\t", $line);
                    if (isset($temp[2])) {
                        $lines['status_code'] = $temp[0];
                        $lines[$temp[1]] = $temp[2];
                        continue;
                    }

                    if (isset($temp[1])) {
                        $lines[$temp[0]] = $temp[1];
                    } else {
                        $lines[$temp[0]] = '';
                    }
                }
                unset($lines['']);
            } else {
                $response = explode("\t", str_replace("\n", "", $response));
                $lines['status_code'] = $response[0];
                $lines['message'] = $response[1];
            }
            return $lines;
        }
    }
}
