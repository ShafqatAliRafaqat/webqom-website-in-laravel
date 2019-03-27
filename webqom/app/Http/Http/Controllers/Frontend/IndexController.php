<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\Client;
class IndexController extends Controller
{
    function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("frontend.index");
        return view("frontend.login");
    }
    public function client_dashboard()
    {
        $user=Auth::user();
        if ($user) {
            return view("frontend.client_dashboard",['user'=>$user]);
            
        }else{
            return redirect('/login');
        }
    }
      public function client_register()
    {
        $countries=Country::all();
        return view("frontend.registeration",['countries'=>$countries]);    
    }
    
      public function client_update()
    {
        $user=Auth::user();
        $countries=Country::all();
        return view("frontend.client_update_information",['user'=>$user,'countries'=>$countries]);    
    }

    public function client_registeration(Request $request)
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
                'company'=>'required_if:account_type,Business Account|max:250',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
                'terms_and_conditions' => 'required',

                
            ));
         if ($request->strength!=100) {
                return Response(['password'=>array('Password is not strong enough')],422);
            }
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
         $client->billing_first_name="";
         $client->billing_last_name="";
         $client->billing_company="";
         $client->billing_email="";
         $client->billing_phone_number=$request->phone_number;
         $client->billing_mobile_number=$request->mobile_phone_number;
         $client->billing_address_1="";
         $client->billing_address_2="";
         $client->billing_country_id=$request->country;
         $client->billing_state_id=$request->state;
         $client->billing_city_id=$request->state;
         $client->billing_postal_code=$request->postal_code;
         $client->save();
         
        
    }
     public function get_countries()
    {
        return Country::all();
    }
    public function get_state($country_id)
    {
        return State::where('country_id',$country_id)->get();
    }
    public function get_city($city_id)
    {
        return City::where('state_id',$city_id)->get();
    }
  
}
