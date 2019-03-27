<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\IndexPlan;
use App\Models\Page;
use App\Models\PlanFeature;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\GeneralFeature;
use App\Models\PageCms;
use App\Models\OfferSerivce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;


class IndexPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    function __construct() {
    $this->middleware('admin');
  }

  public function saveFeature(Request $request){
      $plan_id = $request->route()->parameter('plan_id');


      $plan_feature = PlanFeature::create();
      $feature_id = $request->get('feature_id');
      $status = $request->get('status');

//      dd($status);

      if(isset($feature_id) and !empty($feature_id)){
          $plan_feature = PlanFeature::find($feature_id);
      }

      $plan_feature->title = $request->get('title');
      $plan_feature->page = "";
      $plan_feature->status = (isset($status) and $status == "on")? 1: 0;
      $plan_feature->plan_id = $plan_id;
      $plan_feature->save();

      Session::flash('success','Information was saved successfully');

      return redirect()->route("index-plan.edit",['index_plan' => $plan_id]);
  }

    public function deleteFeature(Request $request){
        $plan_id = $request->route()->parameter('plan_id');
        $feature_id = $request->get('feature_id');

        PlanFeature::where('id',$feature_id)->delete();

        Session::flash('success','Information was deleted successfully');

        return redirect()->route("index-plan.edit",['index_plan' => $plan_id]);
    }

    public function index()
    {
      $page_name="index plan";
        $general_features = GeneralFeature::where('page',$page_name)->paginate(20);
        $page_cms =Page::where('name','index plan')->first();
        $indexplans = IndexPlan::paginate(20);
        $testimonials = Testimonial::all();
        $recent_update=$this->recent_update_time();
        $videos = Video::all();
        $offer_services=OfferSerivce::all();
        return view('admin.index-plan.list', compact('indexplans','offer_services','testimonials','videos','general_features','recent_update','page_name','page_cms'));
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
           
        $this->validate($request,[
                'name_line1'=>'required|max:255',
                'name_line2'=>'required|max:255',
                'enable_plan_button_other'=>'required_if:enable_plan_button,other',
                'sort_order'=>'required|numeric|max:255',
                'url'=>'required|url|max:255',
                'icon_image'=>'required|max:2000|mimes:png',
            ]);
        if (strtolower($request->pricing_type) !="free") {
            $this->validate($request,[
                'pricing_currency_other'=>'required_if:pricing_currency,USD,other',
                'recurring_currency_other'=>'required_if:recurring_currency,USD,other',
                'recurring_first_year'=>'required_if:pricing_type,Recurring|numeric',
                'recurring_first_month'=>'required_if:pricing_type,Recurring|numeric',
                /*PRICING TABLE FIELDS for price type one time*/
                'setup_fee_one_time'=>'required|numeric',
                'setup_fee_monthly'=>'required|numeric',
                'price_one_time'=>'required|numeric',
                'price_monthly'=>'required|numeric',
                /*PRICING TABLE FIELDS for price type recurring*/
                'setup_fee_annually'=>'required_if:pricing_type,Recurring|numeric',
                'setup_fee_biennially'=>'required_if:pricing_type,Recurring|numeric',
                'setup_fee_triennially'=>'required_if:pricing_type,Recurring|numeric',
                'price_annually'=>'required_if:pricing_type,Recurring|numeric',
                'price_biennially'=>'required_if:pricing_type,Recurring|numeric',
                'price_triennially'=>'required_if:pricing_type,Recurring|numeric',
            ]);
        }
        $icon_image=Input::file('icon_image');
        $extension = $icon_image->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension;
        Storage::disk('index-plan')->putFileAs('icon_images', $icon_image,$fileName);
        $index_plan=new IndexPlan;
        $index_plan->name_line1= $request->name_line1;
        $index_plan->name_line2= $request->name_line2;
        $index_plan->url= $request->url;
        $index_plan->icon_image= $fileName;
        $index_plan->enable_plan_button= $request->enable_plan_button;
        $index_plan->enable_plan_button_other= $request->enable_plan_button_other;
        $index_plan->sort_order= ($request->sort_order)!=""?$request->sort_order:0;
        $index_plan->price_type= $request->pricing_type;
        if (strtolower($request->pricing_type) !="free") {
                $index_plan->setup_fee_one_time= $request->setup_fee_one_time;
                $index_plan->setup_fee_monthly= $request->setup_fee_monthly;
                $index_plan->price_monthly= $request->price_monthly;
                $index_plan->price_one_time= $request->price_one_time;
            if (strtolower($request->pricing_type)== "one time") {
                $index_plan->pricing_currency= $request->pricing_currency;
                $index_plan->pricing_currency_other= $request->pricing_currency_other;
                
            }else if(strtolower($request->pricing_type)== "recurring"){
                $index_plan->recurring_currency= $request->recurring_currency;
                $index_plan->recurring_currency= $request->recurring_currency;  
                $index_plan->recurring_currency_other= $request->recurring_currency_other;
                $index_plan->recurring_first_month= $request->recurring_first_month;
                $index_plan->recurring_first_year= $request->recurring_first_year;
                /*prcing fields*/
                $index_plan->setup_fee_annually= $request->setup_fee_annually;
                $index_plan->setup_fee_biennially= $request->setup_fee_biennially;
                $index_plan->setup_fee_triennially= $request->setup_fee_triennially;
                $index_plan->price_annually= $request->price_annually;
                $index_plan->price_biennially= $request->price_biennially;
                $index_plan->price_triennially= $request->price_triennially;
                
            }
        }
        $index_plan->status= isset($request->status)?1:0;
        $index_plan->save();
        

        Session::flash('success','Information was saved successfully');


        return $index_plan;
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
        $indexplan = IndexPlan::where('id',$id)->with('featured_plans')->first();

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
        $index_plan = IndexPlan::findOrFail($id);
       $this->validate($request,[
                'name_line1'=>'required|max:255',
                'name_line2'=>'required|max:255',
                'enable_plan_button_other'=>'required_if:enable_plan_button,other',
                'sort_order'=>'required|numeric|max:255',
                'url'=>'required|url|max:255',
            ]);
        if (strtolower($request->pricing_type) !="free") {
            $this->validate($request,[
                'pricing_currency_other'=>'required_if:pricing_currency,USD,other',
                'recurring_currency_other'=>'required_if:recurring_currency,USD,other',
                'recurring_first_year'=>'required_if:pricing_type,Recurring|numeric',
                'recurring_first_month'=>'required_if:pricing_type,Recurring|numeric',
                /*PRICING TABLE FIELDS for price type one time*/
                'setup_fee_one_time'=>'required|numeric',
                'setup_fee_monthly'=>'required|numeric',
                'price_one_time'=>'required|numeric',
                'price_monthly'=>'required|numeric',
                /*PRICING TABLE FIELDS for price type recurring*/
                'setup_fee_annually'=>'required_if:pricing_type,Recurring|numeric',
                'setup_fee_biennially'=>'required_if:pricing_type,Recurring|numeric',
                'setup_fee_triennially'=>'required_if:pricing_type,Recurring|numeric',
                'price_annually'=>'required_if:pricing_type,Recurring|numeric',
                'price_biennially'=>'required_if:pricing_type,Recurring|numeric',
                'price_triennially'=>'required_if:pricing_type,Recurring|numeric',
            ]);
        }
        $index_plan->name_line1= $request->name_line1;
        $index_plan->name_line2= $request->name_line2;
        $index_plan->url= $request->url;
        $index_plan->enable_plan_button= $request->enable_plan_button;
        $index_plan->enable_plan_button_other= $request->enable_plan_button_other;
        $index_plan->sort_order= ($request->sort_order)!=""?$request->sort_order:0;
        $index_plan->price_type= $request->pricing_type;
        if (strtolower($request->pricing_type) !="free") {
                $index_plan->setup_fee_one_time= $request->setup_fee_one_time;
                $index_plan->setup_fee_monthly= $request->setup_fee_monthly;
                $index_plan->price_monthly= $request->price_monthly;
                $index_plan->price_one_time= $request->price_one_time;
            if (strtolower($request->pricing_type)== "one time") {
                $index_plan->pricing_currency= $request->pricing_currency;
                $index_plan->pricing_currency_other= $request->pricing_currency_other;
                
            }else if(strtolower($request->pricing_type)== "recurring"){
                $index_plan->recurring_currency= $request->recurring_currency;
                $index_plan->recurring_currency= $request->recurring_currency;  
                $index_plan->recurring_currency_other= $request->recurring_currency_other;
                $index_plan->recurring_first_month= $request->recurring_first_month;
                $index_plan->recurring_first_year= $request->recurring_first_year;
                /*prcing fields*/
                $index_plan->setup_fee_annually= $request->setup_fee_annually;
                $index_plan->setup_fee_biennially= $request->setup_fee_biennially;
                $index_plan->setup_fee_triennially= $request->setup_fee_triennially;
                $index_plan->price_annually= $request->price_annually;
                $index_plan->price_biennially= $request->price_biennially;
                $index_plan->price_triennially= $request->price_triennially;
                
            }
        }
        $index_plan->status= isset($request->status)?1:0;
        $index_plan->save();
        return date("d M,Y",strtotime($index_plan->updated_at))." @ ".date("h:i a",strtotime($index_plan->updated_at));
        
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
      $id=$request->id_index;
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
    $page_name="index plan";
    $recent_date_timestamp=Page::select('updated_at')->where('name',$page_name)->first();
    $recent_update=date("d M,Y")." @ ".date("h:i a");
    if ($recent_date_timestamp) {
      $recent_update=date("d M,Y",strtotime($recent_date_timestamp->updated_at))." @ ".date("h:i a",strtotime($recent_date_timestamp->updated_at));

    }
    return $recent_update;
  }
  public function get_index_plan_details(Request $request)
    {
        //return $request->all();
      $id=$request->id_index;
        if ($id!=NULL) {
            if (is_array($id)) {
                $indexplans=IndexPlan::whereIn('id', $id)->get();
                return $indexplans;
            }
        }
    }
     public function get_testimonial_details(Request $request)
    {
        //return $request->all();
      $id=$request->id_testimonial;
        if ($id!=NULL) {
            if (is_array($id)) {
                $indexplans=Testimonial::whereIn('id', $id)->get();
                return $indexplans;
            }else{
               $indexplans=Testimonial::where('id', $id)->first();
                return $indexplans;
            }
        }
    }
    public function get_videos_details(Request $request)
    {
        //return $request->all();
      $id=$request->id_video;
        if ($id!=NULL) {
            if (is_array($id)) {
                $indexplans=Video::whereIn('id', $id)->get();
                return $indexplans;
            }else{
               $indexplans=Video::where('id', $id)->first();
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
    public function update_sort_offer_services(Request $request)
    {

      if (!empty($request->update_so_of)) {

          foreach ($request->update_so_of as $key => $value) {
              $indexplan=OfferSerivce::find($key);
              $indexplan->sort_order=$value;
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
    public function new_testimonial(Request $request)
    {
        $this->validate($request,[
                'client_name'=>'required|max:255',
                'company'=>'required|max:255',
                'testimonial_content'=>'required|max:255',
                'service'=>'required|max:255',
                'client_image'=>'max:2000|mimes:jpeg,bmp,png',
            ]);
        $icon_image=Input::file('client_image');
        if ($icon_image!="") {
          $extension = $icon_image->getClientOriginalExtension(); // getting image extension
          $fileName = rand(11111,99999).'.'.$extension;
          Storage::disk('general_features')->putFileAs('testimonials', $icon_image,$fileName);
        }
        
        //return $request->all();
         if ($request->id>0) {
          $item=Testimonial::find($request->id);
        }else{
            $item=new Testimonial;
        }
        $item->client_name=$request->client_name;
        $item->status=$request->status?1:0;
        if ($icon_image!="") {
          $item->client_image=$fileName;
        }
        $item->company=$request->company;
        $item->content=$request->testimonial_content;
        $item->service=$request->service;
        $item->save();
        Session::flash('success','Information was saved successfully');


    }
  public function save_video(Request $request)
    {
      $current_active_videos=Video::where('status',1)->count();
      if ($current_active_videos>0 && $request->video_status) {
          return response("activated_count_error",422);
      }
        //return $request->all();
        $this->validate($request,[
                'video_heading'=>'required|max:255',
                'video_title'=>'required|max:255',
                //'video_link'=>'|max:255',
            ]);
        if ($request->video_id>0) {
          $item=Video::find($request->video_id);
        }else{
            $item=new Video;
        }
        $item->heading=$request->video_heading;
        $item->status=$request->video_status?1:0;
        $item->video_title=$request->video_title;
        $item->link=$request->video_link;
        $item->save();
        Session::flash('success','Information was saved successfully');

    }
    public function new_service(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
                'title'=>'required|max:255',
                'content'=>'required',
                'display_order'=>'required|numeric',
            ]);
        if ($request->id>0) {
          $item=OfferSerivce::find($request->id);
        }else{
            $item=new OfferSerivce;
        }
        $item->title=$request->title;
        $item->status=$request->status?1:0;
        $item->sort_order=$request->display_order;
        $item->content=$request->content;
        $item->save();
Session::flash('success','Information was saved successfully');

    }
    public function  get_video($id)
    {
      return Video::find($id);
    }
    public function delete_video(Request $request)
    {

      //return $request->all();
      $id=$request->id_video;
      if (is_array($id)) {
       foreach ($id as $i) {
         Video::find($i)->delete();
       }
       Session::flash('success','Deleted successfully'); 
     }else{
      Video::find($id)->delete();
      Session::flash('success','Deleted successfully');
      //return redirect('admin/index-plan');
    }

  }
    public function delete_service(Request $request)
    {

      //return $request->all();
      $id=$request->id_os;
      if (is_array($id)) {
       foreach ($id as $i) {
         OfferSerivce::find($i)->delete();
       }
       Session::flash('success','Deleted successfully'); 
     }else{
      OfferSerivce::find($id)->delete();
      Session::flash('success','Deleted successfully');
      return redirect('admin/index-plan');
    }

  }
    public function delete_testimonial(Request $request)
    {

      //return $request->all();
      $id=$request->id_testimonial;
      if (is_array($id)) {
       foreach ($id as $i) {
         Testimonial::find($i)->delete();
       }
       Session::flash('success','Deleted successfully'); 
     }else{
      Testimonial::find($id)->delete();
      Session::flash('success','Deleted successfully');
      
    }

  }
  public function get_service(Request $request)
    {

     
       $id=$request->id;
        if ($id!=NULL) {
            if (is_array($id)) {
                $indexplans=OfferSerivce::whereIn('id', $id)->get();
                return $indexplans;
            }else{
               $indexplans=OfferSerivce::where('id', $id)->first();
                return $indexplans;
            }
        }
    }
    

  
  public function heading_edit(Request $request,$type='offer_services')
    {   
       $request->all();
       if ($type=='offer_services') {
          $old_offer_services=OfferSerivce::all();   
       }elseif($type=='testimonials'){
          $old_offer_services=Testimonial::all();   
       }
      if (count($old_offer_services)<1) {
        return response(["heading"=>'Please Enter at least 1 general feature first'],422);
      }
      $this->validate($request,[
                'heading'=>'required|max:255',
                
            ]);
      foreach ($old_offer_services as $i) {
        if ($type=='offer_services') {
         $gf=OfferSerivce::find($i->id);
       }elseif($type=='testimonials'){
         $gf=Testimonial::find($i->id);

       }
              
              $gf->heading=$request->heading;
              $gf->heading_status=$request->status?1:0;
              $gf->save();
        }
      Session::flash('success','Heading saved successfully');    
    }
}
