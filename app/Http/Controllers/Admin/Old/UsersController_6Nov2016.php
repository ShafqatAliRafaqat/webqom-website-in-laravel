<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
class UsersController extends Controller
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
        //return User::all();
        $user=Auth::user();
        $new_clients=User::where("role",'Client')->orderBy('created_at','desc')->take(5)->get();
        return view("admin.dashboard",['user'=>$user,'new_clients'=>$new_clients]);
    }
    public function admin_login()
    {
        
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
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->address_1=$request->address_1;
        $user->address_2=$request->address_2;
        $user->country_id=$request->country;
        $user->state_id=$request->state;
        $user->city_id=$request->city;
        $user->zip_code=$request->zip_code;
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function generate_password() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $special = '!%&@#$^*?_~';
    $pass = array(); //remember to declare $pass as an array
    $pass_special = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    $specialLength = strlen($special) - 1; //put the length -1 in cache
    for ($i = 0; $i < 11; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    for ($i = 0; $i < 2; $i++) {
        $n = rand(0, $specialLength);
        $pass_special[] = $special[$n];
    }
    return implode($pass).implode($pass_special); //turn the array into a string
    }
    public function get_users(Request $request)
    {
        $id=$request->id;
        if ($id!=NULL) {
            if (is_array($id)) {
                $users=User::whereIn('id', $id)->get();
                $data=[];
                foreach ($users as $i) {
                    $data[]=$i->client;
                }
                return $data;
            }
        }
    }
   
    
}
