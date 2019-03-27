<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use Response;
use Session;

class ArtisanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    function __construct() {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $message = '';
        
        if ($request->isMethod('post')) {
            if ($request->has('action')) {
                try {
                    switch($request->action) {
                        case 'migrations_status':
                            Artisan::call('migrate:status');
                            break;
                        case 'regenerate_migrations':
                            Artisan::call('migrate:generate');
                            break;
                        case 'migrate':
                            Artisan::call('migrate');
                            break;
                        case 'rollback':
                            Artisan::call('migrate:rollback');
                            break;
                        case 'cache_clear':
                            Artisan::call('cache:clear');
                            break;
                        case 'route_clear':
                            Artisan::call('route:clear');
                            break;
                        case 'route_cache':
                            Artisan::call('route:cache');
                            break;
                        case 'route_list':
                            Artisan::call('route:list');
                            break;
                        default:
                            return view('admin.develop.index');
                            break;
                    }

                    $message = Artisan::output();

                } catch (\Exception $e) {
                    $message = $e->getMessage();
                }
            }

            return redirect()->back()->with('message', nl2br($message));
        }


        return view('admin.develop.index');

    }
}
