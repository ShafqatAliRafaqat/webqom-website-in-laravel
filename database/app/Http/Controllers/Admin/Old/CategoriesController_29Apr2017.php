<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryImage;
use App\Models\Page;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlanFeature;
use App\Models\GeneralFeature;
use Session;
use Storage;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct() {
    $this->middleware('admin');
  }
    public function index()
    {
        $recent_update=$this->recent_update_time();
        $categories=Category::where('parent',0)->orderBy('sort_order')->paginate(10);
        return view("admin.categories.list",compact('categories','recent_update'));
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
        $id = $request->id;
        $old_cat = Category::findorfail($id);
        $cat = new Category;
        $cat->title = $old_cat->title." new";
        $cat->description = $old_cat->description;
        $cat->icon = $old_cat->icon;
        $cat->slug = $old_cat->slug."_new";
        $cat->parent = $old_cat->parent;
        $cat->sort_order = $old_cat->sort_order+1;
        $cat->status = $old_cat->status?'1':'0';

        $oldPageName = strtolower(str_replace('_', ' ', $old_cat->slug));
        $oldPage = Page::where('name', $oldPageName)->first();
        $page = new Page;
        $page->name = $oldPageName . ' new';
        $page->content= $oldPage->content;
        $page->temp= $oldPage->temp;
        $page->is_ssl_page=$oldPage->is_ssl_page?'1':'0';
        $page->save();
        $cat->save();

        Session::flash('success','Information was saved successfully');
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
        //return strtolower(str_replace(' ', '_', $request->title));;
         $this->validate($request,array(

      'title'=>'required|max:250|unique:categories',
      //'titles'=>'required|max:250|unique:categories',
      ));
        $cat=new Category;
        $cat->title=$request->title;
        $cat->slug=strtolower(str_replace(' ', '_', $request->title));
        $cat->status=$request->status?'1':'0';
        $cat->save();
       
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
         $this->validate($request,array(

      'title'=>"required|max:250|unique:categories,title,$id",
      ));
        $cat=Category::find($id);
        echo strtolower($cat->title);
        $page=Page::where('name','=',strtolower($cat->title))->first();
        $plans=Plan::where('page','=',strtolower($cat->title))->get();
        $plans_features=PlanFeature::where('page','=',strtolower($cat->title))->get();
        $general_features=GeneralFeature::where('page','=',strtolower($cat->title))->get();
        //return $page;
        if (!$page) {
          $page=new Page;
        }
        $cat->title=$request->title;
        $cat->slug=strtolower(str_replace(' ', '_', $request->title));
        $cat->status=$request->status?'1':'0';
        $cat->save();
        $page->name=strtolower($request->title);
        $page->is_ssl_page=$request->is_ssl_page?'1':'0';
        $page->is_ecomerce_page=$request->is_ecomerce_page?'1':'0';

        $page->save();
        if (count($plans)>0) {
          foreach ($plans as $i) {
            $i->page=strtolower($request->title);
            $i->save();
          }
        }
        if (count($plans_features)>0) {
          foreach ($plans_features as $i) {
            $i->page=strtolower($request->title);
            $i->save();
          }
        }
        if (count($general_features)>0) {
          foreach ($general_features as $i) {
            $i->page=strtolower($request->title);
            $i->save();
          }
        }
        Session::flash('success','Information was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=Category::find($id);
        Page::where('name','=',strtolower($cat->title))->delete();
        Category::find($id)->delete();
       Session::flash('success','Deleted successfully'); 
    }
    public function update_sort(Request $request)
    {
           $request->data;
        foreach ($request->data as $index=> $categories) {
            foreach ($categories as $parent=>$j) {
               if (!is_array($j)) {
                //echo "order of parent cats $j--$index";
                    $parent_id=$j;
                    $cat=Category::find($j);
                    $cat->sort_order=$index;
                    $cat->parent=0;
                    $cat->save();
               }else{
                    foreach($j as $order=>$child)/*j is parent category*/
                    {
                        //echo "**parent $parent_id**";
                        $child_id=$child['id'];
                        echo "**child $child_id*** order $order";
                        $cat=Category::find($child_id);
                        $cat->sort_order=$order;
                        $cat->parent=$parent_id;
                        $cat->save();
                    }
               }
            }
        }
        $order=0;
    }
    public function recent_update_time()
      {
        $recent_date_timestamp=Category::select('updated_at')->orderBy('updated_at','desc')->first();
        $recent_update=date("d M,Y")." @ ".date("h:i a");
        if ($recent_date_timestamp) {
          $recent_update=date("d M,Y",strtotime($recent_date_timestamp->updated_at))." @ ".date("h:i a",strtotime($recent_date_timestamp->updated_at));

        }
        return $recent_update;
      }
      public function rename_slug()
      {
          $categories=Category::all();
          foreach($categories as $i){
            $cat=Category::find($i->id);
            $cat->slug=strtolower(str_replace(' ', '_', $cat->title));
            $cat->save();
          }
      }
    public function upload_images(Request $request)
      {

        print_r($request->all()); exit;
        $images=Input::file('upload_images');
        $banner=Input::file('upload_banner');
        $pdf=Input::file('upload_pdf');
        $upload_alt_text=$request->upload_alt_text;
        $upload_sort_order=$request->upload_display_order;
        $upload_url=$request->upload_web_url;
        $upload_start_date=$request->upload_start_date;
        $upload_end_date=$request->upload_end_date;
        $id=$request->id;
        for ($i=0; $i <count($upload_alt_text) ; $i++) {
            if($id[$i]==""){
                $category_images=new CategoryImage;
            }else{
                $category_images=CategoryImage::find($id[$i]);
            } 
            
            if(isset($images[$i])){
                $extension = $images[$i]->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension;
                Storage::disk('categories')->putFileAs('images', $images[$i],$fileName); 
                $category_images->image=$fileName;   
            }
            if(isset($banner[$i])){
                $extension = $banner[$i]->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension;
                Storage::disk('categories')->putFileAs('banner', $banner[$i],$fileName);  
                $category_images->banner=$fileName;            
            }
            if(isset($pdf[$i])){
                $extension = $pdf[$i]->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension;
                Storage::disk('categories')->putFileAs('pdf', $pdf[$i],$fileName);
                $category_images->pdf=$fileName;   
            }
            $category_images->status=$request->upload_status[$i]?1:0;   
            $category_images->image_alt_text=$upload_alt_text[$i];   
            $category_images->sort_order=$upload_sort_order[$i];   
            $category_images->category_id=$request->category_id;   
            $category_images->url=$upload_url[$i];   
            $category_images->image_start_date=date("Y-m-d", strtotime($upload_start_date[$i]));   
            $category_images->image_end_date=date("Y-m-d", strtotime($upload_end_date[$i]));   
            $category_images->save();

            
        }
    }
    public function get_category_images($category_id)
      {
         return CategoryImage::where('category_id',$category_id)->get();
      }
    public function category_images_delete(Request $request)
      {
        $cat_img=CategoryImage::where('id',$request->id)->first();
        if ($request->type=='image') {
            $cat_img->image="";
        }
        if ($request->type=='banner') {
            $cat_img->banner="";
        }
        if ($request->type=='pdf') {
            $cat_img->pdf="";
        }
        $cat_img->save();
        return $cat_img;
      }  
}
