<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\IndexPlan;
use App\Models\Page;
use App\Models\PageCms;
use App\Models\PlanFeature;
use App\Models\GeneralFeature;
use App\Models\ServicesFreeDomain;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;
class EcommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = 'ecommerce';
        $cms = Page::where('name',$page_name)->first();
        $plans = Plan::where('page', $page_name)->where('status', 1)->orderby('sort_order')->take(3)->get();
        $indexplans = IndexPlan::paginate(10);
        $general_features = GeneralFeature::where('page', $page_name)->get();
        $service_free_domains = ServicesFreeDomain::where('page', $page_name)->first();
        $featured_plans = PlanFeature::where('page', $page_name)->where('status', 1)->get();
        
        return view('frontend.ecommerce', compact('indexplans','cms','plans','general_features','page_name','service_free_domains','featured_plans'));
    
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
        //
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
}
