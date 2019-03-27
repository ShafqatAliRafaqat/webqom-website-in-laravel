<?php

namespace App\Http\Middleware;

use Closure;
use Log;
use Auth;

class MustBeAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user=Auth::user();
        if($user){
            
            if($user->role=='Admin'){
                return $next($request);
            }
            else if($user->role=='Client'){
                return redirect('web88/admin/login');
            } else {
                return redirect('web88/admin/login');
            }
        }
        else{
            return redirect('web88/admin/login');
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return abort(401);
            }
            //return redirect()->guest('login');
        }
    }
}
