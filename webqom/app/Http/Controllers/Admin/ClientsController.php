<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Country;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class ClientsController extends Controller
{
    function __construct() {
        $this->middleware('admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $clients=User::where("role",'Client')->get();
        $countries=Country::all();
        return view("admin.clients.list",['clients'=> $clients,
                                        'countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        /*return $request->strength;   */
         $this->validate($request,array(
                
                'first_name'=>'required|max:250',
                'last_name'=>'required|max:250',
                'address_1'=>'required|max:250',
                'address_2'=>'max:250',
                'country'=>'required|max:250',
                'state'=>'required|max:250',
                'city'=>'required|max:250',
                'postal_code'=>'numeric|required',
                'account_type'=>'required|max:250',
                'mobile_phone_number'=>'numeric|required',
                'phone_number'=>'numeric',
                'company'=>'max:250',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',

                'billing_first_name'=>'required|max:250',
                'billing_last_name'=>'required|max:250',
                'billing_address_1'=>'required|max:250',
                'billing_address_2'=>'max:250',
                'billing_country'=>'required|max:250',
                'billing_state'=>'required|max:250',
                'billing_city'=>'required|max:250',
                'billing_postal_code'=>'numeric|required',
                'billing_mobile_phone'=>'numeric|required',
                'billing_phone_number'=>'numeric',
                'billing_company'=>'max:250',
                'billing_email' => 'required|email|max:255',
            ));
         $user=new User;
         $user->first_name=$request->first_name;
         $user->name="";
         $user->last_name=$request->last_name;
         $user->company=$request->company;
         $user->email=$request->email;
         $user->phone_number=$request->phone_number;
         $user->mobile_number=$request->mobile_phone_number;
         $user->password=bcrypt($request->password);
         $user->role="Client";
         $user->address1=$request->address_1;
         $user->address2=$request->address_2;
         $user->country_id=$request->country;
         $user->state_id=$request->state;
         $user->city_id=$request->city;
         $user->postal_code=$request->postal_code;
         $user->account_type=isset($request->account_type);
         $user->status=isset($request->status);
         $user->news_letter=isset($request->news_letter);
         $user->save();
         
        $country_code=Country::find($request->country)->sortname;
        $client_id="I-".str_pad($user->id, 5, '0', STR_PAD_LEFT)."-$country_code";
        if ($request->account_type=="Business Account") {
             $client_custom_id="B-".str_pad(25, 5, '0', STR_PAD_LEFT)."-$country_code";
         }
         $client=new Client;
         $client->user_id=$user->id;
         $client->client_id=$client_id;
         $client->billing_first_name=$request->billing_first_name;
         $client->billing_last_name=$request->billing_last_name;
         $client->billing_company=$request->billing_company;
         $client->billing_email=$request->billing_email;
         $client->billing_phone_number=$request->billing_phone_number;
         $client->billing_mobile_number=$request->billing_mobile_phone;
         $client->billing_address_1=$request->billing_address_1;
         $client->billing_address_2=$request->billing_address_2;
         $client->billing_country_id=$request->billing_country;
         $client->billing_state_id=$request->billing_state;
         $client->billing_city_id=$request->billing_city;
         $client->billing_postal_code=$request->billing_postal_code;
         $client->save();
         Session::flash('success','Information was saved successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;    
        /*return $request->strength;   */
         $this->validate($request,array(
                
                'first_name'=>'required|max:250',
                'last_name'=>'required|max:250',
                'address_1'=>'required|max:250',
                'address_2'=>'max:250',
                'country'=>'required|max:250',
                'state'=>'required|max:250',
                'city'=>'required|max:250',
                'postal_code'=>'numeric|required',
                //'account_type'=>'required|max:250',
                'mobile_phone_number'=>'numeric|required',
                'phone_number'=>'numeric',
                'company'=>'required_if:account_type,Business Account|max:250',
                'email' => "required|email|max:255|unique:users,email,$id",


                
            ));
         
         $user=User::find($id);
         $user->first_name=$request->first_name;
         $user->name="";
         $user->last_name=$request->last_name;
         $user->company=$request->company;
         $user->email=$request->email;
         $user->phone_number=$request->phone_number;
         $user->mobile_number=$request->mobile_phone_number;
         $user->password=bcrypt($request->password);
         $user->role="Client";
         $user->address1=$request->address_1;
         $user->address2=$request->address_2;
         $user->country_id=$request->country;
         $user->state_id=$request->state;
         $user->city_id=$request->city;
         $user->postal_code=$request->postal_code;
         //$user->account_type=isset($request->account_type);
         $user->status=isset($request->status);
         $user->news_letter=isset($request->news_letter);
         $user->save();
         
        
         if ($user->save()) {
             return Response(["succes"=>"updated"],200);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id=$request->id;
         if (is_array($id)) {
             foreach ($id as $i) {
                 User::find($i)->delete();
             }
            Session::flash('success','Deleted successfully'); 
         }else{
            User::find($id)->delete();
            Session::flash('success','Deleted successfully');
         }
    }

}
