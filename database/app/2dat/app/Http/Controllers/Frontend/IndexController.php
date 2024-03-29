<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Storage;
use DB;
use Session;
use App\Models\IndexPlan;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\Client;
use App\Models\Category;
use App\Models\Page;
use App\Models\Client_billing_info;
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
        $page = Page::find(1);
        $indexplans=IndexPlan::where('status',1)->orderBy('sort_order')->take(4)->get();
        $categories=Category::where('parent',0)->orderBy('sort_order')->get();
        foreach ($categories as $i) {
            if($i->sub_categories){
                $i->childs=$i->sub_categories->chunk(3);
            }
        }
         print_r($categories);
        return;
        //return view("frontend.index",compact('indexplans','page'));
    }
    public function client_dashboard()
    {
        $user=Auth::user();
        if ($user) {
            if ($user->role=='Admin') {
                return redirect('/web88/admin');
            }
            else{
                return view("frontend.client_dashboard",['user'=>$user]);
            }
            
        }else{
            return redirect('/login');
        }
    }
    public function client_register()
    {
        $user=Auth::user();

        if ($user) {
            if (Auth::user()->role=='Admin') {
               return redirect('/web88/admin');
           }else if (Auth::user()->role=='Client') {
               return redirect('/my_account');
           } 
       }
       $countries=Country::all();
       return view("frontend.registeration",['countries'=>$countries]);    
   }

   public function client_update()
   {
    $user=Auth::user();
    if (!$user) {

        return redirect('/login');
    }
    if ($user->role=='Admin') {
        return redirect('web88/admin');
    }
    $countries=Country::all();
    return view("frontend.client_update_information",['user'=>$user,'countries'=>$countries]);    
}

public function client_registeration(Request $request)
{


   $this->validate($request,array(

    'first_name'=>'required|max:250',
    'last_name'=>'required|max:250',
    'address_1'=>'required|max:250',
    'address_2'=>'max:250',
    'country'=>'required|max:250',
    'state'=>'required|max:250',
    'city'=>'required_if:num_of_cities,1',
    'postal_code'=>'required|number_length',
    'account_type'=>'required|max:250',
    'mobile_phone_number'=>'numeric|required|number_length',
    'phone_number'=>'numeric|number_length',
    'company'=>'required_if:account_type,Business Account|max:250',
    'email' => 'required|email|max:255|unique:users',
    'password' => 'required|confirmed|min:12',
    'terms_and_conditions' => 'required',


    ),[
   'city.required_if' => 'City field is required',
   ]);
   
   $captcha= Input::get('g-recaptcha-response');
   if (env('APP_VERSION')!='local') {
       if ($captcha==null) {
        return Response(['captcha',"captcha is required"],422);
    }
}

if ($request->strength!=100) {
    return Response(['password'=>array('Password is not strong enough')],422);
}
$city_id=0;
if ($request->city!='') {
    $city_id=$request->city;
}   
DB::beginTransaction();
    try {
        $user=new User;
        $user->role="Client";
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->name="";
        $user->save();

        $country_code=Country::find($request->country)->sortname;
        $client_id="I-".str_pad($user->id, 5, '0', STR_PAD_LEFT)."-$country_code";
        if ($request->account_type=="Business Account") {
           $client_id="B-".str_pad($user->id, 5, '0', STR_PAD_LEFT)."-$country_code";
        }
        $client=new Client;
        $client->user_id=$user->id;
        $client->client_id=$client_id;
        $client->first_name=$request->first_name;
        $client->last_name=$request->last_name;
        $client->company=$request->company;
        $client->phone_number=$request->phone_number;
        $client->mobile_number=$request->mobile_phone_number;
        $client->address1=$request->address_1;
        $client->address2=$request->address_2;
        $client->country_id=$request->country;
        $client->state_id=$request->state;
        $client->city_id=$city_id;
        $client->postal_code=$request->postal_code;
        $client->account_type=$request->account_type;
        $client->status=1;
        $client->news_letter=isset($request->news_letter)? "1" :"0";
        $client_billing_info=new Client_billing_info;
        $client_billing_info->user_id=$user->id;
        $client_billing_info->billing_first_name="";
        $client_billing_info->billing_last_name="";
        $client_billing_info->billing_company="";
        $client_billing_info->billing_email="";
        $client_billing_info->billing_phone_number=$request->phone_number;
        $client_billing_info->billing_mobile_number=$request->mobile_phone_number;
        $client_billing_info->billing_address_1="";
        $client_billing_info->billing_address_2="";
        $client_billing_info->billing_country_id=0;
        $client_billing_info->billing_state_id=0;
        $client_billing_info->billing_city_id=0;
        $client_billing_info->billing_postal_code=$request->postal_code;
        $client_billing_info->save();
        $client->save();
        DB::commit();
        $success = true;
    } catch (\Exception $e) {
        $success = false;
        DB::rollback();
    }
    if ($success) {
       return Response('saved',200);
    }    else{
        return Response('not saved',500);
    }

}
public function client_account_update(Request $request)
{
    $id=$request->id;    
    $city_id=0;
    if ($request->city!='') {
        $city_id=$request->city;
    }    
    /*return $request->strength;   */
    $this->validate($request,array(

        'first_name'=>'required|max:250',
        'last_name'=>'required|max:250',
        'address_1'=>'required|max:250',
        'address_2'=>'max:250',
        'country'=>'required|max:250',
        'state'=>'required|max:250',
        'city'=>'required_if:num_of_cities,1',
        'postal_code'=>'required|number_length',
                //'account_type'=>'required|max:250',
        'mobile_phone_number'=>'numeric|required|number_length',
        'phone_number'=>'numeric|number_length',
        'company'=>'required_if:account_type,Business Account|max:250',
        'email' => "required|email|max:255|unique:users,email,$id",
        ),[
    'city.required_if' => 'City field is required',
    ]);
    $user=User::find($id);
    $user->role="Client";
    $user->email=$request->email;
    $user->name="";
             //$user->account_type=isset($request->account_type);
             //$user->news_letter=isset($request->news_letter);
    $user->save();
    $client=Client::where('user_id',$user->id)->first();
    $client->first_name=$request->first_name;
    $client->last_name=$request->last_name;
    $client->company=$request->company;
    $client->phone_number=$request->phone_number;
    $client->mobile_number=$request->mobile_phone_number;
    $client->address1=$request->address_1;
    $client->address2=$request->address_2;
    $client->country_id=$request->country;
    $client->state_id=$request->state;
    $client->city_id=$city_id;
    $client->postal_code=$request->postal_code;
    $client->status=1;
    $client->save();

    if ($user->save()) {
       return Response(["succes"=>"updated"],200);
   }
}
public function get_countries()
{
    return Country::all();
}
public function get_state($country_id)
{
    return State::where('country_id',$country_id)->orderBy('name', 'asc')->get();
}
public function get_city($city_id)
{
    return City::where('state_id',$city_id)->orderBy('name', 'asc')->get();
}
public function change_profile_pic(Request $req)
{
    $this->validate($req,array(

        'image_file'=>'required|max:2000|mimes:jpeg,bmp,png',
        ));
    $image=input::file('image_file');
        //return $req->all();
    $id=input::get('id');
    Storage::disk('profiles')->makeDirectory($id,777, true);
    $filename  = time() . '.' . $image->getClientOriginalExtension();
    $move=Storage::disk('profiles')->put($id."/".$filename, file_get_contents($image));
    $user=User::find($id);
    $user->profile_pic=url("/storage/profiles/$id/$filename");
    if ($user->save()) {
        return Response(url("/storage/profiles/$id/$filename"),200);
    }
}
public function client_reset_password()
{
    return view('frontend.reset_password');
}
public function unsubscribe_news_letter()
{
    $user_id=Auth::user()->id;
    if ($user_id) {
        $client=Client::where('user_id',$user_id)->first();
        $client->news_letter=0;
        if ($client->save()) {
            return Response(["status"=>"ok","news_letter"=>$client->news_letter],200);
        }
        else{
            return Response("error",500);
        }
    }else{
        return Response("unauthorized",403);
    }
}
public function subscribe_news_letter()
{
    $user_id=Auth::user()->id;
    if ($user_id) {
        $client=Client::where('user_id',$user_id)->first();
        $client->news_letter=1;
        if ($client->save()) {
            return Response(["status"=>"ok","news_letter"=>$client->news_letter],200);
        }
        else{
            return Response("error",500);
        }
    }else{
        return Response("unauthorized",403);
    }
}



}
