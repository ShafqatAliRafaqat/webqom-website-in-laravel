<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\IndexPlan;
use App\Models\GeneralFeature;
use App\Models\Web88irSpecialFeature;
use App\Models\Page;
use App\Models\PageCms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;

class Web88irController extends Controller {

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
        $old_email88_new_special = Web88irSpecialFeature::where('page', $request->page)->first();
        if ($old_email88_new_special) {
            $old_heading_status = $old_email88_new_special->heading_status;
            $old_heading = $old_email88_new_special->heading;
        } else {
            $old_heading_status = 0;
            $old_heading = '';
        }
//        $this->validate($request, [
//            'title' => 'required|max:255',
//            'description' => 'max:255',
//                //'icon'=>'required|max:255',
//                //'icon_image'=>'required_without:foo,bar|max:2000|mimes:png',
//        ]);
        //$icon_image = Input::file('icon_image');
        $files = $request->file('icon_image');
        if (!empty($files)):
            foreach ($files as $file):
              $extension = $file->getClientOriginalExtension(); // getting image extension
              $fileNames[] = $file->getClientOriginalName();
              Storage::disk('general_features')->put($file->getClientOriginalName(), file_get_contents($file));           
              //Storage::disk('general_features')->put($file->getClientOriginalName(), file_get_contents($file));
            endforeach;
        endif;        
//        if ($icon_image != "") {
//            $extension = $icon_image->getClientOriginalExtension(); // getting image extension
//            $fileName = rand(11111, 99999) . '.' . $extension;
//            Storage::disk('general_features')->putFileAs('icon_images', $icon_image, $fileName);
//        } else {
//            $fileName = "";
//        }

        $email88_new_special = new Web88irSpecialFeature;
        $email88_new_special->title = $request->title;
        $email88_new_special->description = $request->description;
        $email88_new_special->icon = $request->icon;
        $email88_new_special->icon_image = implode(",",$fileNames);
        $email88_new_special->ssl_page = $request->ssl_page;
        $email88_new_special->heading = $old_heading;
        $email88_new_special->heading_status = $old_heading_status;
        $email88_new_special->status = isset($request->status) ? 1 : 0;
        $email88_new_special->page = $request->page ? $request->page : " ";
        $email88_new_special->save();


        Session::flash('success', 'The information has been saved/updated successfully.');


        return $email88_new_special;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
//    public function show($id)
//    {
//        $indexplan = IndexPlan::findOrFail($id);
//
//        return view('admin.index-plan.show', compact('indexplan'));
//    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        return Web88irSpecialFeature::findOrFail($id);

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
        //$icon_image = Input::file('icon_image');
        $files = $request->file('icon_image');        
        $email88_new_special = Web88irSpecialFeature::find($request->id);
        $email88_new_special->title = $request->title;
        $email88_new_special->description = $request->description;
        $email88_new_special->icon = $request->icon;
        $email88_new_special->status = isset($request->status) ? 1 : 0;
        if (!empty($files)):
            foreach ($files as $file):
              $extension = $file->getClientOriginalExtension(); // getting image extension
              $fileNames[] = $file->getClientOriginalName();
              Storage::disk('general_features')->put($file->getClientOriginalName(), file_get_contents($file));           
              //Storage::disk('general_features')->put($file->getClientOriginalName(), file_get_contents($file));
            endforeach;
        endif;
//        if ($icon_image != "") {
//            $extension = $icon_image->getClientOriginalExtension(); // getting image extension
//            $fileName = rand(11111, 99999) . '.' . $extension;
//            Storage::disk('general_features')->putFileAs('icon_images', $icon_image, $fileName);
//            $email88_new_special->icon_image = $fileName;
//        }
        $email88_new_special->icon_image = implode(",",$fileNames);
        $email88_new_special->save();
        
        Session::flash('success', 'The information has been saved/updated successfully.');
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
        $id = $request->id_email88;
        if (is_array($id)) {
            foreach ($id as $i) {
                Web88irSpecialFeature::find($i)->delete();
            }
            Session::flash('success', 'Deleted successfully');
        } else {
            Web88irSpecialFeature::find($id)->delete();
            Session::flash('success', 'Deleted successfully');
            //return redirect('admin/index-plan');
        }
    }

    public function image_update(Request $request) {
        //return $request->id;
//        $this->validate($request, [
//            'image_file' => 'max:2000|mimes:png',
//        ]);
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
        $old_general_feature = Web88irSpecialFeature::where('page', $request->page)->get();
        if (count($old_general_feature) > 0) {
            foreach ($old_general_feature as $i) {
                $gf = Web88irSpecialFeature::find($i->id);
                $gf->heading = $request->heading;
                $gf->sub_heading = $request->sub_heading;
                $gf->content = $request->content;
                $gf->page = $request->page;
                $gf->heading_status = $request->status ? 1 : 0;
                $gf->save();
            }
        } else {
            $email88 = new Web88irSpecialFeature;
            $email88->heading = $request->heading;
            $email88->sub_heading = $request->sub_heading;
            $email88->content = $request->content;
            $email88->page = $request->page;
            $email88->heading_status = $request->status ? 1 : 0;
            $email88->save();
        }
        Session::flash('success', 'The information has been saved/updated successfully.');
    }

    public function get_details(Request $request) {
        $id = $request->id_email88;
        if ($id != NULL) {
            if (is_array($id)) {
                $data = GeneralFeature::whereIn('id', $id)->get();

                return $data;
            }
        }
    }

}
