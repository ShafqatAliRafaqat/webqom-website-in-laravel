<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\IndexPlan;
use App\Models\Page;
use App\Models\PageCms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    function __construct() {
    $this->middleware('admin');
  }
    public function index()
    {
        $page_cms = Page::find(1);
        $indexplans = IndexPlan::paginate(10);
        $recent_update=$this->recent_update_time();
        return view('admin.index-plan.list', compact('indexplans','recent_update','page_cms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.index-plan.create');
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
     //return $request->all();
       $requestData = $request->all();
       $page=Page::where('name',$request->name)->first();
        if ($page) {
            
            $page->update($requestData);
         } 
         else{
            Page::create($requestData);
             
         }
        //return $page->updated_at;
        $recent_update=date("d M,Y")." @ ".date("h:i a");
        if ($page) {
          $recent_update=date("d M,Y",strtotime($page->updated_at))." @ ".date("h:i a",strtotime($page->updated_at));

        }
        return $recent_update;

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
    public function edit($id)
    {
        $indexplan = IndexPlan::findOrFail($id);

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
    public function update($id, Request $request)
    {
        
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
        IndexPlan::destroy($id);

        Session::flash('flash_message', 'IndexPlan deleted!');

        return redirect('admin/index-plan');
    }
    public function delete(Request $request)
    {

      //return $request->all();
      $id=$request->id;
      if (is_array($id)) {
       foreach ($id as $i) {
         IndexPlan::find($i)->delete();
       }
       Session::flash('success','Deleted successfully'); 
     }else{
      IndexPlan::find($id)->delete();
      Session::flash('success','Deleted successfully');
      return redirect('admin/index-plan');
    }

  }
  public function image_update(Request $request)
  {
        //return $request->id;
     $this->validate($request,[
                'image_file'=>'max:2000|mimes:png',
            ]);
        $icon_image=Input::file('image_file');
        $extension = $icon_image->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension;
        Storage::disk('index-plan')->putFileAs('icon_images', $icon_image,$fileName);
        $index_plan=IndexPlan::find($request->id);
        $index_plan->icon_image=$fileName;
        $index_plan->save();
        return $fileName;
  }
  public function recent_update_time()
  {
    $recent_date_timestamp=IndexPlan::select('updated_at')->orderBy('updated_at','desc')->first();
    $recent_update=date("d M,Y")." @ ".date("h:i a");
    if ($recent_date_timestamp) {
      $recent_update=date("d M,Y",strtotime($recent_date_timestamp->updated_at))." @ ".date("h:i a",strtotime($recent_date_timestamp->updated_at));

    }
    return $recent_update;
  }
  public function get_index_plan_details(Request $request)
    {
         $id=$request->id;
        if ($id!=NULL) {
            if (is_array($id)) {
                $indexplans=IndexPlan::whereIn('id', $id)->get();
                return $indexplans;
            }
        }
    }
    public function update_sort(Request $request)
    {
      if (!empty($request->data)) {
          foreach ($request->data as $key) {
              $indexplan=IndexPlan::find($key['id']);
              $indexplan->sort_order=$key['sort_order'];
              $indexplan->save();
          }
      }
    }
    public function cms_update(Request $request)
    {
       //return $request->left_header;
      $cms=PageCms::where('page_id',1)->where('slug','title')->first();
      $cms->content=$request->title;
      $cms->save();
      $cms=PageCms::where('page_id',1)->where('slug','left_header')->first();
      $cms->content=$request->left_header;
      $cms->save();
      $cms=PageCms::where('page_id',1)->where('slug','left_content')->first();
      $cms->content=$request->left_content;
      $cms->save();
      $cms=PageCms::where('page_id',1)->where('slug','right_header')->first();
      $cms->content=$request->right_header;
      $cms->save();
       $cms=PageCms::where('page_id',1)->where('slug','right_content')->first();
      $cms->content=$request->right_content;
      $cms->save();
      return $cms;
    }
    public function right_section(Request $request)
    {
      $cms=PageCms::where('page_id',1)->where('slug','right_section')->first();
      $cms->content=$request->data;
      $cms->save();
      return $cms;
    }
    public function left_section(Request $request)
    {

      $cms=PageCms::where('page_id',1)->where('slug','left_section')->first();
      $cms->content=$request->title;
      $cms->save();
      return $cms;
    }
}
