<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GstRate;
use Illuminate\Http\Request;
use Session;

class GstRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $gstrates = GstRate::paginate(25);

        return view('admin.gst-rates.index', compact('gstrates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.gst-rates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        GstRate::create($requestData);

        Session::flash('flash_message', 'GstRate added!');

        return redirect('admin/gst-rates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $gstrate = GstRate::findOrFail($id);

        return view('admin.gst-rates.show', compact('gstrate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $gstrate = GstRate::findOrFail($id);

        return view('admin.gst-rates.edit', compact('gstrate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $gstrate = GstRate::findOrFail($id);
        $gstrate->update($requestData);

        Session::flash('flash_message', 'GstRate updated!');

        return redirect('admin/gst-rates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        GstRate::destroy($id);

        Session::flash('flash_message', 'GstRate deleted!');

        return redirect('admin/gst-rates');
    }
}
