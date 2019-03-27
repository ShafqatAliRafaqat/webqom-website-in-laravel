<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Support\Facades\Log;
use Session;

class BannersController extends Controller
{
    public function index(Request $request)
    {	
		  
		//for activating the future scheduled banner on scheduled date
		$checkIndatedBanners = Banner::where('banner_start_date', '<',date('Y-m-d'))->orWhere('banner_end_date','>',date('Y-m-d'))->get();
		if(count($checkIndatedBanners)>0){
			foreach($checkIndatedBanners as $checkIndatedBanner){
				Banner::where('id',$checkIndatedBanner->id)->update([
					'banner_status'=>'active',
				]);
			}
		}
		//for de-activating out dated banner;
		$checkOutdatedBanners = Banner::where('banner_start_date', '>',date('Y-m-d'))->orWhere('banner_end_date','<',date('Y-m-d'))->get();
		if(count($checkOutdatedBanners)>0){
			foreach($checkOutdatedBanners as $checkOutdatedBanner){
				Banner::where('id',$checkOutdatedBanner->id)->update([
					'banner_status'=>'inactive',
				]);
			}
		}
		
        $banners = Banner::orderBy('created_at','desc')->paginate(8);
        return view('admin.banners.index', ['banners' => $banners]);
    }
    /**
     * Modified by Narek
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // return $request->all();
		 
		 
		$this->validate($request, [
            'banner_image' => 'required|dimensions:width=1920,height=630|max:1024|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'banner_enlarge_image' => 'max:2048|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'banner_enlarge_pdf' => 'mimes:pdf,PDF',
            'banner_display_order' => 'required',
        ]);
		
            $bannerImage= time().'.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(storage_path('banners/images'),$bannerImage);
			
			
            if ($request->hasfile('banner_enlarge')) {
				$bannerEnlargeImage= time().'.'.$request->banner_enlarge->getClientOriginalExtension();
				$request->banner_enlarge->move(storage_path('banners/enlarge'),$bannerEnlargeImage);
				$bannerEnlargePdf='';
            }else if($request->hasfile('banner_pdf')){
				$bannerEnlargePdf= time().'.'.$request->banner_pdf->getClientOriginalExtension();
				$request->banner_pdf->move(storage_path('banners/enlarge'),$bannerEnlargePdf);
				$bannerEnlargeImage='';
			}else{
				$bannerEnlargeImage='';
				$bannerEnlargePdf='';
			}
			
			if ($request->has('banner_status')) {
                $bannerStatus= 'active';
            }else{
                $bannerStatus = 'inactive';
			}
			
            Banner::insert([
				'banner_title' => $request->banner_title,
				'banner_image' => $bannerImage,
				'banner_link' => $request->banner_link,
				'banner_alt' => $request->banner_alt,
				'banner_display_order' => $request->banner_display_order,
				'banner_status' => $bannerStatus,
				'banner_start_date' =>date('Y-m-d', strtotime($request->banner_start_date)),
				'banner_end_date' =>date('Y-m-d', strtotime($request->banner_end_date)),
				'banner_enlarge_image' => $bannerEnlargeImage,
				'banner_enlarge_pdf' => $bannerEnlargePdf,
			]);
            return back()->with('message', 'The information has been saved successfully');
    }

    public function updateOrder(Request $request)
    {	
		//return $request->all();
		foreach($request->updateOrder as $id=>$order){
			Banner::where('id',$id)->update([
				'banner_display_order' =>$order,
			]);
		}
        return back()->with('message', 'The banner Orders updated successfully');
    }
	
	public function edit($id)
    {
        $bannerById = Banner::where('id',$id)->first();
        return view('admin.banners.edit', ['bannerById' =>$bannerById ]);
    }

    public function update(Request $request)
    {
        //return $request->all();
		
		$this->validate($request, [
            'banner_image' => 'dimensions:width=1920,height=630|max:1024|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'banner_enlarge_image' => 'max:2048|mimes:jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF',
            'banner_enlarge_pdf' => 'mimes:pdf,PDF',
            'banner_display_order' => 'required',
        ]);
		
			$bannerById=Banner::where('id',$request->id)->first();
			
           if($request->banner_image != ''){
				//storing image location to database
				$bannerImage= time().'.'.$request->banner_image->getClientOriginalExtension();

				//move the image to respective directories
				$request->banner_image->move(storage_path('banners'),$bannerImage);
				$bannerById->update([
					'banner_image' => $bannerImage,
				]);
			}
			
            if ($request->hasfile('banner_enlarge')) {
				$bannerEnlargeImage= time().'.'.$request->banner_enlarge->getClientOriginalExtension();
				$request->banner_enlarge->move(storage_path('banners/enlarge'),$bannerEnlargeImage);
				$bannerById->update([
					'banner_enlarge_image' => $bannerEnlargeImage,
					'banner_enlarge_pdf' => '',
				]);
            }else if($request->hasfile('banner_pdf')){
				$bannerEnlargePdf= time().'.'.$request->banner_pdf->getClientOriginalExtension();
				$request->banner_pdf->move(storage_path('banners/enlarge'),$bannerEnlargePdf);
				$bannerById->update([
					'banner_enlarge_pdf' => $bannerEnlargePdf,
					'banner_enlarge_image' => '',
				]);
			}
			
			if($request->has('banner_status')) {
                $bannerStatus= 'active';
            }else{
                $bannerStatus = 'inactive';
			}
			
            $bannerById->update([
				'banner_title' => $request->banner_title,
				'banner_link' => $request->banner_link,
				'banner_alt' => $request->banner_alt,
				'banner_display_order' => $request->banner_display_order,
				'banner_status' => $bannerStatus,
				'banner_start_date' =>date('Y-m-d', strtotime($request->banner_start_date)),
				'banner_end_date' =>date('Y-m-d', strtotime($request->banner_end_date)),
			]);
            return redirect('/admin/banners')->with('message', 'The banner Updated successfully');
    }
	
	public function delete($id)
    {
        $bannerById = Banner::where('id',$id)->first();
		$bannerById->delete();
        return back()->with('message', 'The banner  Deleted successfully');
    }
	public function deleteEnlargeImage($id)
    {
        Banner::where('id',$id)->update([
			'banner_enlarge_image' => '',
		]);
        return back()->with('message', 'The banner  Enlarge image is deleted successfully');
    }
	public function deleteEnlargePdf($id)
    {
        Banner::where('id',$id)->update([
			'banner_enlarge_pdf' => '',
		]);
        return back()->with('message', 'The banner  Enlarge PDF is deleted successfully');
    }
	
	public function deleteSelected(Request $request)
    {
		//return $request->all();
		if($request->id != ''){
		   foreach($request->id as $id){
				Banner::where('id',$id)->delete();
		   }
		 }else{
			return back()->with('error', 'select some item first');
			 
		 }
        return back()->with('message', 'The selected banners are Deleted successfully');
    }
	
	public function destroy()
    {
        Banner::truncate();
        return back()->with('message', 'All Banners Deleted successfully');
    }

}
