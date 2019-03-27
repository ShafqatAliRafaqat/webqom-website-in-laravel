<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Client_billing_info;
use App\Models\Country;
use App\Http\Requests;
use Session;
use DB;
use Response;
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
    public function index($per_page=10)
    {
      $recent_update=$this->recent_update_time();
      $clients=User::where("role",'Client')->orderBy('created_at','desc')->paginate($per_page);
      $countries=Country::all();
      return view("admin.clients.list",['clients'=> $clients,
        'countries'=>$countries,
        'recent_update'=>$recent_update]
        );
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

      'billing_first_name'=>'required|max:250',
      'billing_last_name'=>'required|max:250',
      'billing_address_1'=>'required|max:250',
      'billing_address_2'=>'max:250',
      'billing_country'=>'required|max:250',
      'billing_state'=>'required|max:250',
      'billing_city'=>'required_if:num_of_bcities,1',
      'billing_company'=>'required_if:account_type,Business Account|',
      'billing_postal_code'=>'required|number_length',
      'billing_mobile_phone'=>'numeric|required|number_length',
      'billing_phone_number'=>'numeric|number_length',
      'billing_company'=>'max:250',
      'billing_email' => 'required|email|max:255',

      ),[
     'city.required_if' => 'City field is required',
     'billing_city.required_if' => 'Billing city field is required',
     ]);
     if ($request->strength!=100) {
      return Response(['password'=>array('Password is not strong enough')],422);
    }
    $city_id=0;
    if ($request->city!='') {
      $city_id=$request->city;
    }  
    $b_city_id=0;
    if ($request->billing_city!='') {
      $b_city_id=$request->billing_city;
    }   
    $user=new User;
    $user->name="";
    $user->role="Client";
    $user->email=$request->email;
    $user->profile_pic='';
    $user->password=bcrypt($request->password);
    $user->added_by_admin=1;
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
   $client->status=isset($request->status);
   $client->news_letter=isset($request->news_letter);
   $client_billing_info=new Client_billing_info;
   $client_billing_info->user_id=$user->id;
   $client_billing_info->billing_first_name=$request->billing_first_name;
   $client_billing_info->billing_last_name=$request->billing_last_name;
   $client_billing_info->billing_company=$request->billing_company;
   $client_billing_info->billing_email=$request->billing_email;
   $client_billing_info->billing_phone_number=$request->billing_phone_number;
   $client_billing_info->billing_mobile_number=$request->billing_mobile_phone;
   $client_billing_info->billing_address_1=$request->billing_address_1;
   $client_billing_info->billing_address_2=$request->billing_address_2;
   $client_billing_info->billing_country_id=$request->billing_country;
   $client_billing_info->billing_state_id=$request->billing_state;
   $client_billing_info->billing_city_id=$b_city_id;
   $client_billing_info->billing_postal_code=$request->billing_postal_code;
   
   $client_billing_info->save();
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
      $clients=User::where("id",$id)->first();
      $clients->recent_update=date("d M,Y",strtotime($clients->client->updated_at))." @ ".date("h:i a",strtotime($clients->updated_at));
      $countries=Country::all();
      return view("admin.clients.edit",['clients'=> $clients,
        'countries'=>$countries]);
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
     $id=$request->client_id;    
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

      'billing_first_name'=>'required|max:250',
      'billing_last_name'=>'required|max:250',
      'billing_address_1'=>'required|max:250',
      'billing_address_2'=>'max:250',
      'billing_country'=>'required|max:250',
      'billing_state'=>'required|max:250',
      'billing_city'=>'required_if:num_of_bcities,1',
      'billing_postal_code'=>'required',
      'billing_mobile_phone'=>'numeric|required',
      'billing_phone_number'=>'numeric',
      'billing_company'=>'max:250',
      'billing_email' => 'required|email|max:255',
      ),[
     'city.required_if' => 'City field is required',
     'billing_city.required_if' => 'Billing city field is required',
     ]);
     if ($request->strength>0) {
      /*User entered password*/
      $this->validate($request,array(

        'password' => 'required|confirmed|min:12',
        'strength' => 'required|numeric|min:100',

        ), [
      'strength.min' => 'Password is not strong enough',
      ]);

    }
    $city_id=0;
    if ($request->city!='') {
      $city_id=$request->city;
    }  
    $b_city_id=0;
    if ($request->billing_city!='') {
      $b_city_id=$request->billing_city;
    }    

    $user=User::find($id);
    if ($request->strength>0) {
      $user->password=bcrypt($request->password);
    }
    $user->email=$request->email;
    $user->name="";
    $user->role="Client";
    $user->save();

    $client=Client::where('user_id',$user->id)->first();
    $client->user_id=$user->id;
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
     //$client->account_type=isset($request->account_type);
    $client->status=isset($request->status);
    $client->news_letter=isset($request->news_letter);
    $client_billing_info=Client_billing_info::where('user_id',$user->id)->first();
    $client_billing_info->billing_first_name=$request->billing_first_name;
    $client_billing_info->billing_last_name=$request->billing_last_name;
    $client_billing_info->billing_company=$request->billing_company;
    $client_billing_info->billing_email=$request->billing_email;
    $client_billing_info->billing_phone_number=$request->billing_phone_number;
    $client_billing_info->billing_mobile_number=$request->billing_mobile_phone;
    $client_billing_info->billing_address_1=$request->billing_address_1;
    $client_billing_info->billing_address_2=$request->billing_address_2;
    $client_billing_info->billing_country_id=$request->billing_country;
    $client_billing_info->billing_state_id=$request->billing_state;
    $client_billing_info->billing_city_id=$b_city_id;
    $client_billing_info->billing_postal_code=$request->billing_postal_code;

    if ($client->save() && $client_billing_info->save() ) {
      Session::flash('success','The information has been saved/updated successfully.');
      return redirect('/clients/edit/'.$id);
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
  public function recent_update_time()
  {
    $recent_date_timestamp=User::select('updated_at')->where("role",'Client')->orderBy('updated_at','desc')->first();
    $recent_update=date("d M,Y")." @ ".date("h:i a");
    if ($recent_date_timestamp) {
      $recent_update=date("d M,Y",strtotime($recent_date_timestamp->updated_at))." @ ".date("h:i a",strtotime($recent_date_timestamp->updated_at));

    }
    return $recent_update;
  }
  public function search_clients(Request $request)
  {
   $recent_update=$this->recent_update_time();
   $formated_date="";
   if($request->created_date!=""){
    $created_date= explode('/', $request->created_date);
    $formated_date=$created_date[2]."-".$created_date[1]."-".$created_date[0];
  }
  $countries=Country::all();                
  if ($request->client_name == "" && $request->client_id == "") {
    $clients=User::from('users as u')
    ->where('u.role',"=","Client")
    ->orderBy('u.created_at','desc')
    ->get();

    return view("admin.clients.list",['clients'=> $clients,
      'countries'=>$countries,
      'recent_update'=>$recent_update,
      'search_error'=>'Either "client ID" or "Client Name" field is mandatory.'
      ]);  
  }
  else{
   $clients=User::from('users as u')
   ->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', "%".$request->client_name."%")
   ->where('c.client_id','like',"%$request->client_id%")
   ->where('u.email','like',"%$request->email%")
   ->where('c.company','like',"%$request->company%")
   ->whereDate("u.created_at",'like',"%$formated_date%")
   ->where('c.account_type','like',"%$request->account_type%")
   ->where('u.role',"=","Client")
   ->join('client_registration_info as c','c.user_id','=','u.id')
   ->orderBy('u.created_at','desc')
   ->get();
   if(count($clients)>0){
    $search_msg="search_success";
  }else{
    $search_msg="search_error";
  }
  return view("admin.clients.list",['clients'=> $clients,
    'countries'=>$countries,
    'recent_update'=>$recent_update,
    $search_msg=>count($clients).' client(s) found',

    ]); 
}
}
public function export_csv()
{
  $table = User::where('role','Client')->get();
  $filename = "clients_".time().".csv";
  $handle = fopen($filename, 'w+');
  fputcsv($handle, array('Client_ID','Name', 'Email', 'Company', 'Postal Code','Address','Account Type','Phone','Mobile','Status','News Letter','created at'));

  foreach($table as $row) {
    if ($row->client) {
      if ($row->client->city_id>0) {
        $city_name=$row->client->city->name;
      }else{
        $city_name="";
      }
      fputcsv($handle, array($row->client->client_id,
      $row->client['first_name']." ".$row->client['last_name'],
      $row['email'], 
      $row->client['company'],
      $row->client['postal_code'],
      $row->client->address1." ".$row->client->address2.", ".
      $city_name. ", ".
      $row->client->state->name.", ".
      $row->client->country->name,
      $row->client->account_type,
      $row->client->phone_number,
      $row->client->mobile_number,
      $row->client->status==1?"Active":"Inactive",
      $row->client->status==1?"Subscribed":"Unsubscribed",
      $row->client['created_at']));
    }
  }

  fclose($handle);

  $headers = array(
    'Content-Type' => 'text/csv',
    );

  return Response::download($filename, $filename, $headers);
}
public function delelte_all(Request $request)
{
  if ($request->user()->role=='Admin') {
    $clients=User::where('role','Client')->get();
    foreach ($clients as $i) {
      User::find($i->id)->delete();
    }
    Session::flash('success','Deleted successfully');
    return response('success',200);
  }else{
    return response("unauthorized",'delete');
  }
}

}
