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

        //print_r($request->all()); exit;
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
	
	public function reloadSwitcher(){
		$URL = url('');
		$File = '<link href="'.$URL.'/resources/assets/admin/vendors/bootstrap-switch/css/bootstrap-switch.css" rel="stylesheet">';
		$File1 = '<script src="'.$URL.'/resources/assets/admin/js/jquery.js"></script>'; 
		$File2 = '<script src="'.$URL.'/resources/assets/admin/vendors/bootstrap/js/bootstrap.min.js"></script>';
		$File3 = '<script src="'.$URL.'/resources/assets/admin/vendors/bootstrap-switch/js/bootstrap-switch.min.js"></script>'; 
		$Var = '<label class="col-md-3 control-label">Status1</label>
									<div class="col-md-6">
										<div data-on="success" data-off="primary" class="make-switch">
											<input name="upload_status[]" type="checkbox" checked="checked"/>
										</div>
									</div>';
		$HTML = '<div id="statusdiv" class="form-group">
								<label class="col-md-3 control-label">Status1</label>
									<div class="col-md-6">
										<div data-on="success" data-off="primary" class="make-switch">
											<input name="upload_status[]" type="checkbox" checked="checked"/>
										</div>
									</div>
								</div>  

								<div class="form-group">
									<label class="col-md-3 control-label">Upload Menu Image <span class="text-red">*</span></label>
									<div class="col-md-9">
										<div class="text-15px margin-top-10px"> <img width="80px" src="../images/menu/img_hosting1.jpg" alt="" class="upload_images img-responsive"><br/>
											<a href="javascript:void" class="delete_image_button" data-hover="tooltip"  data-placement="top" title="Delete" ></a>
											<div class="xs-margin"></div>
											<input id="exampleInputFile2" name="upload_images[]"  class="upload_images_browse" type="file"/>
											<br/>
											<span class="help-block">(Image dimension: 663 x 464 pixels, JPEG, GIF, PNG only, Max. 1MB) </span> </div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Image Alt Text</label>
										<div class="col-md-6">
											<input type="text"  name="upload_alt_text[]"  class="upload_alt_text form-control" placeholder="" >
											<input type="hidden"  name="id[]"  class="id form-control" placeholder="" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Start Date to End Date</label>
										<div class="col-md-6">
											<div class="input-group input-daterange">
												<input type="text" name="upload_start_date[]" class="upload_start_date form-control" placeholder="mm/dd/yyyy"/>
												<span class="input-group-addon">to</span>
												<input type="text" name="upload_end_date[]" class="upload_end_date form-control" placeholder="mm/dd/yyyy"/>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Display Order <span class="text-red">*</span></label>
										<div class="col-md-2">
											<input type="text" name="upload_display_order[]"  class="upload_display_order form-control" placeholder="" value="1">
										</div>
										<div class="col-md-9 pull-right"> <span class="help-block">Display order is to determine the item appearing sequence in the website.</span> </div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Upload Enlarge Banner or</label>
										<div class="col-md-9">
											<p class="text-blue margin-top-10px border-bottom">Please choose <strong>ONE</strong> of the following options when clicking on the banner for enlarge/detailed view.</p>
											<div class="text-15px margin-top-10px"> <img width="80px" src="../images/menu/img_hosting1.jpg" alt="Cyber Monday" class="upload_banner img-responsive"><br/>
												<a href="javascript:void" data-hover="tooltip" class="delete_baner_button" data-placement="top" title="Delete" ><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
											 
												
												<!-- modal delete end -->
												<div class="xs-margin"></div>
												<input id="exampleInputFile2" class="upload_images_browse"  name="upload_banner[]"  type="file"/>
												<br/>
												<span class="help-block">(JPEG/GIF/PNG only, Max. 2MB) </span> </div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Upload PDF or</label>
											<div class="col-md-9"> 
												<div class="margin-top-5px"></div>
												<a href="filename.pdf" class="pdf_path" target="_blank">filename.pdf</a><br/>
												<a href="javascript:void" data-hover="tooltip" data-placement="top" title="Delete" class="delete_pdf_button"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
												 
												<div id="modal-delete-pdf" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
													<div class="modal-dialog">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
																<h4 id="modal-login-label4" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this PDF? </h4>
															</div>
															<div class="modal-body">
																<p>filename.pdf</p>
																<div class="form-actions">
																	<div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- modal delete end -->
												<div class="xs-margin"></div>
												<div class="text-15px margin-top-10px">
													<input id="exampleInputFile2" class="upload_pdf_browse"  name="upload_pdf[]"  type="file"/>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-3 control-label">Website URL</label>
											<div class="col-md-6">
												<div class="input-icon"><i class="fa fa-link"></i>
													<input type="text"  name="upload_web_url[]"  placeholder="http://" class="form-control" value="http://www.webqom.com"/>
													<span class="help-block">Please enter the page link to link it to the sub page.</span> </div>
												</div>
											</div>



											<div class="clearfix border-bottom"></div>
											<div class="xs-margin"></div>
										</div>';							
		
		$Ret = $File3.' '.$File.' '.$HTML;
		return $Ret;
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
