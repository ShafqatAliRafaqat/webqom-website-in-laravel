<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomainPricing;
use App\Models\DomainPricingList;
use Illuminate\Http\Request;

class DomainPricingListController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $item = DomainPricing::findOrFail($id);
        $recentUpdate = $this->getRecentUpdateTime($id);
        $perPage = $request->get('per_page') ?: 100;
        $type = $request->get('type') ?: 'new';
        return view('admin.domain_pricing_list.show', compact('item', 'recentUpdate', 'perPage', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->generateData($request);
        DomainPricingList::create($data);
        return redirect()->back()->with('success', 'Information was saved successfully');
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
        $item = DomainPricingList::find($id);
        $data = $this->generateData($request);
        $item->update($data);
        return redirect()->back()->with('success', 'Information was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DomainPricingList::destroy($id);
        return redirect()->back()->with('success', 'Item was deleted successfully');
    }

    public function destroyAll(Request $request)
    {
        $type = $request->type;
        DomainPricingList::where('type', $type)->delete();
        return redirect()->back()->with('success', 'All items were deleted successfully');
    }

    public function destroySelected(Request $request)
    {
        $ids = explode(',', $request->ids);
        DomainPricingList::destroy($ids);
        return redirect()->back()->with('success', 'Selected items were deleted successfully');
    }

    private function generateData(Request $request)
    {
        $data = $request->all();
        // Checkboxes fix
        $data['status'] = isset($data['status']) ? '1' : '0';
        $data['addons'] = isset($data['addons']) ? implode(';', $data['addons']) : '';
        // Generate pricing
        $data['pricing'] = [];
        for ($i = 1; $i <= 10; $i++) {
            $data['pricing'][$i]['s'] = (int) $data['sale_price'][$i];
            $data['pricing'][$i]['l'] = (int) $data['list_price'][$i];
        }
        $data['pricing'] = json_encode($data['pricing']);
        return $data;
    }

    private function getRecentUpdateTime($id)
    {
        $recent_date_timestamp = DomainPricingList::select('updated_at')
            ->where('domain_pricing_id', $id)
            ->orderBy('updated_at', 'desc')
            ->first();
        $recent_update = date('d M,Y') . ' @ ' . date('h:i a');
        if ($recent_date_timestamp) {
            $recent_update =
            date('d M,Y', strtotime($recent_date_timestamp->updated_at)) .
            ' @ ' .
            date('h:i a', strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }
}
