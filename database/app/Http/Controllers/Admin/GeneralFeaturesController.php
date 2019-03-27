<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\IndexPlan;
use App\Models\GeneralFeature;
use App\Models\Page;
use App\Models\PageCms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;

class GeneralFeaturesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $page_cms = Page::where('name', 'index plan')->first();
        $indexplans = IndexPlan::paginate(10);
        $recent_update = $this->recent_update_time();
        return view('admin.index-plan.list', compact('indexplans', 'recent_update', 'page_cms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('admin.index-plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        //return $request->all();
        $old_general_feature = GeneralFeature::where('page', $request->page)->first();
        if ($old_general_feature) {
            $old_heading_status = $old_general_feature->heading_status;
            $old_heading = $old_general_feature->heading;
        } else {
            $old_heading_status = 0;
            $old_heading = '';
        }
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255',
                //'icon'=>'required|max:255',
                //'icon_image'=>'required_without:foo,bar|max:2000|mimes:png',
        ]);
        if ($request->icon_image == "") {
            $this->validate($request, [
                'icon' => 'required|max:255',
            ]);
        }
        if ($request->icon == "") {
            $this->validate($request, [
                'icon_image' => 'required_without:foo,bar|max:2000|mimes:png',
            ]);
        }
        $icon_image = Input::file('icon_image');
        if ($icon_image != "") {
            $extension = $icon_image->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension;
            Storage::disk('general_features')->putFileAs('icon_images', $icon_image, $fileName);
        } else {
            $fileName = "";
        }

        $general_feature = new GeneralFeature;
        $general_feature->title = $request->title;
        $general_feature->description = $request->description;
        $general_feature->icon = $request->icon;
        $general_feature->icon_image = $fileName;
        $general_feature->ssl_page = $request->ssl_page;
        $general_feature->heading = $old_heading;
        $general_feature->heading_status = $old_heading_status;
        $general_feature->status = isset($request->status) ? 1 : 0;
        $general_feature->page = $request->page ? $request->page : " ";
        $general_feature->save();


        Session::flash('success', 'Information was saved successfully');


        return $general_feature;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $indexplan = IndexPlan::findOrFail($id);

        return view('admin.index-plan.show', compact('indexplan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        return GeneralFeature::findOrFail($id);

        return view('admin.index-plan.edit', compact('indexplan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request) {
        //return $request->all();
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'max:255',
                //'icon'=>'required|max:255',
                //'icon_image'=>'required_without:foo,bar|max:2000|mimes:png',
        ]);
        if ($request->icon_image == "") {
            $this->validate($request, [
                'icon' => 'required|max:255',
                    ], [
                'icon.required' => 'Either CSS icon or icon image is required',
            ]);
        }
        if ($request->icon == "") {
            $this->validate($request, [
                'icon_image' => 'required_without:foo,bar|max:2000|mimes:png',
                    ], [
                'icon_image.required' => 'Either CSS icon or icon image is required',
            ]);
        }
        $icon_image = Input::file('icon_image');
        $general_feature = GeneralFeature::find($request->id);
        $general_feature->title = $request->title;
        $general_feature->description = $request->description;
        $general_feature->icon = $request->icon;
        $general_feature->status = isset($request->status) ? 1 : 0;
        if ($icon_image != "") {
            $extension = $icon_image->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111, 99999) . '.' . $extension;
            Storage::disk('general_features')->putFileAs('icon_images', $icon_image, $fileName);
            $general_feature->icon_image = $fileName;
        }
        $general_feature->save();
        Session::flash('success', 'Information was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        IndexPlan::destroy($id);

        Session::flash('flash_message', 'IndexPlan deleted!');

        return redirect('admin/index-plan');
    }

    public function delete(Request $request) {

        //return $request->all();
        $id = $request->id_gf;
        if (is_array($id)) {
            foreach ($id as $i) {
                GeneralFeature::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            GeneralFeature::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
            //return redirect('admin/index-plan');
        }
    }

    public function image_update(Request $request) {
        //return $request->id;
        $this->validate($request, [
            'image_file' => 'max:2000|mimes:png',
        ]);
        $icon_image = Input::file('image_file');
        $extension = $icon_image->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111, 99999) . '.' . $extension;
        Storage::disk('index-plan')->putFileAs('icon_images', $icon_image, $fileName);
        $index_plan = IndexPlan::find($request->id);
        $index_plan->icon_image = $fileName;
        $index_plan->save();
        return $fileName;
    }

    public function recent_update_time() {
        $recent_date_timestamp = IndexPlan::select('updated_at')->orderBy('updated_at', 'desc')->first();
        $recent_update = date("d M,Y") . " @ " . date("h:i a");
        if ($recent_date_timestamp) {
            $recent_update = date("d M,Y", strtotime($recent_date_timestamp->updated_at)) . " @ " . date("h:i a", strtotime($recent_date_timestamp->updated_at));
        }
        return $recent_update;
    }

    public function get_index_plan_details(Request $request) {
        return $request->all();
        if ($id != NULL) {
            if (is_array($id)) {
                $indexplans = IndexPlan::whereIn('id', $id)->get();
                return $indexplans;
            }
        }
    }

    public function update_sort(Request $request) {
        if (!empty($request->data)) {
            foreach ($request->data as $key) {
                $indexplan = IndexPlan::find($key['id']);
                $indexplan->sort_order = $key['sort_order'];
                $indexplan->save();
            }
        }
    }

    public function cms_update(Request $request) {
        //return $request->left_header;
        $cms = PageCms::where('page_id', 1)->where('slug', 'title')->first();
        $cms->content = $request->title;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'left_header')->first();
        $cms->content = $request->left_header;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'left_content')->first();
        $cms->content = $request->left_content;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_header')->first();
        $cms->content = $request->right_header;
        $cms->save();
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_content')->first();
        $cms->content = $request->right_content;
        $cms->save();
        return $cms;
    }

    public function right_section(Request $request) {
        $cms = PageCms::where('page_id', 1)->where('slug', 'right_section')->first();
        $cms->content = $request->data;
        $cms->save();
        return $cms;
    }

    public function left_section(Request $request) {

        $cms = PageCms::where('page_id', 1)->where('slug', 'left_section')->first();
        $cms->content = $request->title;
        $cms->save();
        return $cms;
    }

    public function heading_edit(Request $request) {

        //$request->all();
        $old_general_feature = GeneralFeature::where('page', $request->page)->get();
        if (count($old_general_feature) > 0) {
            foreach ($old_general_feature as $i) {
                $gf = GeneralFeature::find($i->id);
                $gf->heading = $request->heading;
                $gf->page = $request->page;
                $gf->heading_status = $request->status ? 1 : 0;
                $gf->save();
            }
        } else {
            $gf = new GeneralFeature;
            $gf->heading = $request->heading;
            $gf->page = $request->page;
            $gf->heading_status = $request->status ? 1 : 0;
            $gf->save();
        }
        Session::flash('success', 'The information has been saved/updated successfully.');
    }

    public function get_details(Request $request) {
        $id = $request->id_gf;
        if ($id != NULL) {
            if (is_array($id)) {
                $data = GeneralFeature::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

}
