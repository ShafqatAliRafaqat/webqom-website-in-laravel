<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\CmsPages;
use App\Http\Requests;
use Session;
use Storage;
use Datatables;
use DB;
use Response;
use App\Http\Controllers\Controller;


/**
 * Class UserController.
 */
class CmsPagesController extends Controller {

    function __construct() {
        $this->middleware('admin');
    }

    public function index() {print_r('test');exit;
        return view('admin.cmspages.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatable() {
        return view('admin.cmspages.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPosts() {
        $cmspages = DB::table('cmspages')->get();
        return Datatables::of($cmspages)->make(true);
    }

    public function create() {
        return view('admin.cmspages.create');
    }

    public function store(Request $request) {
        $cmspages = CmsPages::create($request->all());
        return \Redirect::route('cmspages')->with('message', 'Page saved correctly!!!');
    }
    public function show(Request $request)
    {
        $cmspages = CmsPages::create($request->all());
        return \Redirect::route('cmspages')->with('message', 'Page saved correctly!!!');
    }    

}
