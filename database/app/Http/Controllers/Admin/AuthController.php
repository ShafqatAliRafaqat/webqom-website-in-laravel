<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Auth;
use Log;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Session;

class AuthController extends Controller
{
    public function doLogin(Request $request)
    {
                
        if ($request->input('remember')==1) {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
                $user = Auth::user();
            } else {
                $row=User::where('email', '=', $request->input('email'))->first();
                if (empty($row)) {
                    echo -2;
                    exit;
                } else {
                    echo -1;
                    exit;
                }
                echo -1;
                exit;
            }
        } else {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $user = Auth::user();
            } else {
                $row=User::where('email', '=', $request->input('email'))->first();
                if (empty($row)) {
                    echo -2;
                    exit;
                } else {
                    echo -1;
                    exit;
                }
            }
        }
        if (Auth::viaRemember()) {
            echo 'user was remmembered';
            die();
        }
      //echo $user->name."-".$user->role;
        if ($user->role == 'Admin' || $user->role == 'Super Admin') {
            return  url('/web88/admin');
        } elseif ($user->role == 'Super Admin') {
            return  url('/admin');
        } elseif ($user->role == 'Client') {
            if ($user->client->status==1) {
                return url('/dashboard');
            } else {
                Auth::logout();
                return Response(['email'=>'This account is inactive'], 422);
            }
        }
    }
    function change_password(Request $request)
    {
        if ($request->user()) {
            $id = $request->user()->id;
            $user = User::find($id);
            if ($request->current_password=="") {
                return Response(['current_password'=>'Current Password is required'], 422);
            } elseif (Hash::check($request->current_password, $user->password)) {
            } else {
                return Response(['current_password'=>array('Current Password is not correct')], 422);
                /*Session::flash('danger', 'Your current password does not correct');
	            return redirect('admin/myPrefrences');*/
            }
            

            $this->validate($request, array(
                'password' => 'required|confirmed|min:12',
            ));
            if ($request->strength!=100) {
                return Response(['password'=>array('New Password is not strong enough')], 422);
            }

            $user->password = bcrypt($request->password);
            $user->save();
            return Response(['ok'=>array('Password is changed')], 200);
            /*Session::flash('success', 'Password changed successfully');
	        return redirect('admin/myPrefrences');*/
        } else {
            return Response(['unauthorized'=>array('No permission')], 422);
        }
    }
    public function admin_login(Request $request)
    {
        if (!Auth::user()) {
                return view("admin.admin_login");
        } else {
            return redirect('/web88/admin');
        }
    }
    public function admin_logout(Request $request)
    {
        Auth::logout();
        return  redirect('/web88/admin');
    }
    function reset_password(Request $request)
    {
        return $request->all();
        if ($request->user()) {
            $id = $request->user()->id;
            $user = User::find($id);
            if ($request->current_password=="") {
                return Response(['current_password'=>'Current Password is required'], 422);
            } elseif (Hash::check($request->current_password, $user->password)) {
            } else {
                return Response(['current_password'=>array('Current Password is not correct')], 422);
                /*Session::flash('danger', 'Your current password does not correct');
	            return redirect('admin/myPrefrences');*/
            }
            

            $this->validate($request, array(
                'password' => 'required|confirmed|min:12',
            ));
            if ($request->strength!=100) {
                return Response(['password'=>array('New Password is not strong enough')], 422);
            }

            $user->password = bcrypt($request->password);
            $user->save();
            return Response(['ok'=>array('Password is changed')], 200);
            /*Session::flash('success', 'Password changed successfully');
	        return redirect('admin/myPrefrences');*/
        } else {
            return Response(['unauthorized'=>array('No permission')], 422);
        }
    }
}
