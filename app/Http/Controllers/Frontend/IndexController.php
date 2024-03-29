<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Client_billing_info;
use App\Models\Country;
use App\Models\domain;
use App\Models\GeneralFeature;
use App\Models\IndexPlan;
use App\Models\OfferSerivce;
use App\Models\Page;
use App\Models\State;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Video;
use App\Models\Banner;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Storage;

class IndexController extends Controller {
	function __construct() {

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function index(Request $request) {
		//return Self::get_categories();
		$page_cms = Page::where('name', 'index plan')->first();
		$videos = Video::where('status', '1')->first();
		$testimonial = Testimonial::where('status', '1')->get();
		$offer_services = OfferSerivce::where('status', '1')->orderBy('sort_order', 'asc')->get();
		$indexplans = IndexPlan::where('status', 1)->orderBy('sort_order')->take(4)->get();
		$categories = Category::where('parent', 0)->orderBy('sort_order')->get();
		
		//added by Altaf Hossain Limon start
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
		//$banners = Banner::where('banner_status', 'active')->where('banner_start_date', '<',date('Y-m-d'))->where('banner_end_date','>',date('Y-m-d'))->orWhereNull('banner_start_date')->orWhereNull('banner_end_date')->orderBy('banner_display_order')->get();
		$banners = Banner::where('banner_status', 'active')->get();
		//Added By Altaf Hossain limon ended
		
		$general_features = GeneralFeature::where('page', 'index plan')->get()->chunk(3);
		foreach ($categories as $i) {
			if ($i->sub_categories) {
				$i->childs = $i->sub_categories->sortBy('sort_order')->chunk(3);
			}
		}

		$search = $request->input('samplees');
		$search_result = [];
		$search_result['is_search'] = false;
		if ($search && $search != 'Enter your domain name here...') {
			$search_result['is_search'] = true;
			$search_result['valid_domain'] = !domain::where('name', $search)->exists();
		}

		return view("frontend.index", compact('indexplans', 'offer_services', 'page', 'page_cms', 'videos', 'testimonial', 'general_features', 'search_result','banners'));
	}
	public static function get_categories() {
		$categories = Category::where('parent', 0)->where('status', 1)->orderBy('sort_order')->get();
		foreach ($categories as $i) {
			if ($i->sub_categories) {
				$i->childs = $i->sub_categories->where('status', 1)->sortBy('sort_order')->chunk(3);
			}
			if ($i->category_images) {
				$i->category_images = $i->category_images
					->where('status', 1)
					->filter(function ($image) {
						if ($image->image_end_date >= date("Y-m-d") or $image->image_end_date == null) {
							return $image;
						}
					})
					->sortBy('sort_order');
			}
		}
		return $categories;
	}
    public static function get_children_by_parent_slug($category){
        $category = Category::with('sub_categories')->where('slug', $category)->first();
        return $category->sub_categories->where('status', 1)->sortBy('sort_order')->all();
    }
	public function client_dashboard() {
		$user = Auth::user();
		if ($user) {
			if ($user->role == 'Admin') {
				return redirect('/web88/admin');
			} else {
				return view("frontend.client_dashboard", ['user' => $user]);
			}

		} else {
			return redirect('/login');
		}
	}
	public function client_register() {
		$user = Auth::user();

		if ($user) {
			if (Auth::user()->role == 'Admin') {
				return redirect('/web88/admin');
			} else if (Auth::user()->role == 'Client') {
				return redirect('/my_account');
			}
		}
		$countries = Country::all();
		return view("frontend.registeration", ['countries' => $countries]);
	}

	public function client_update() {
		$user = Auth::user();
		if (!$user) {

			return redirect('/login');
		}
		if ($user->role == 'Admin') {
			return redirect('web88/admin');
		}
		$countries = Country::all();
		return view("frontend.client_update_information", ['user' => $user, 'countries' => $countries]);
	}

	public function client_registeration(Request $request) {

		$this->validate($request, array(

			'first_name' => 'required|max:250',
			'last_name' => 'required|max:250',
			'address_1' => 'required|max:250',
			'address_2' => 'max:250',
			'country' => 'required|max:250',
			'state' => 'required|max:250',
			'city' => 'required_if:num_of_cities,1',
			'postal_code' => 'required|number_length',
			'account_type' => 'required|max:250',
			'mobile_phone_number' => 'numeric|required|number_length',
			'phone_number' => 'numeric|number_length',
			'company' => 'required_if:account_type,Business Account|max:250',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:12',
			'terms_and_conditions' => 'required',

		), [
			'city.required_if' => 'City field is required',
		]);

		$captcha = Input::get('g-recaptcha-response');
		if (env('APP_VERSION') != 'local') {
			if ($captcha == null) {
				return Response(['captcha', "captcha is required"], 422);
			}
		}

		if ($request->strength != 100) {
			return Response(['password' => array('Password is not strong enough')], 422);
		}
		$city_id = 0;
		if ($request->city != '') {
			$city_id = $request->city;
		}
		DB::beginTransaction();
		try {
			$user = new User;
			$user->role = "Client";
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->name = "";
			$user->save();

			$country_code = Country::find($request->country)->sortname;
			$client_id = "I-" . str_pad($user->id, 5, '0', STR_PAD_LEFT) . "-$country_code";
			if ($request->account_type == "Business Account") {
				$client_id = "B-" . str_pad($user->id, 5, '0', STR_PAD_LEFT) . "-$country_code";
			}
			$client = new Client;
			$client->user_id = $user->id;
			$client->client_id = $client_id;
			$client->first_name = $request->first_name;
			$client->last_name = $request->last_name;
			$client->company = $request->company;
			$client->phone_number = $request->phone_number;
			$client->mobile_number = $request->mobile_phone_number;
			$client->address1 = $request->address_1;
			$client->address2 = $request->address_2;
			$client->country_id = $request->country;
			$client->state_id = $request->state;
			$client->city_id = $city_id;
			$client->postal_code = $request->postal_code;
			$client->account_type = $request->account_type;
			$client->status = 1;
			$client->news_letter = isset($request->news_letter) ? "1" : "0";
			$client_billing_info = new Client_billing_info;
			$client_billing_info->user_id = $user->id;
			$client_billing_info->billing_first_name = "";
			$client_billing_info->billing_last_name = "";
			$client_billing_info->billing_company = "";
			$client_billing_info->billing_email = "";
			$client_billing_info->billing_phone_number = $request->phone_number;
			$client_billing_info->billing_mobile_number = $request->mobile_phone_number;
			$client_billing_info->billing_address_1 = "";
			$client_billing_info->billing_address_2 = "";
			$client_billing_info->billing_country_id = 0;
			$client_billing_info->billing_state_id = 0;
			$client_billing_info->billing_city_id = 0;
			$client_billing_info->billing_postal_code = $request->postal_code;
			$client_billing_info->save();
			$client->save();
			DB::commit();
			$success = true;
		} catch (\Exception $e) {
			$success = false;
			DB::rollback();
		}
		if ($success) {
			return Response('saved', 200);
		} else {
			return Response('not saved', 500);
		}

	}
	public function client_account_update(Request $request) {
		$id = $request->id;
		$city_id = 0;
		if ($request->city != '') {
			$city_id = $request->city;
		}
		/*return $request->strength;   */
		$this->validate($request, array(

			'first_name' => 'required|max:250',
			'last_name' => 'required|max:250',
			'address_1' => 'required|max:250',
			'address_2' => 'max:250',
			'country' => 'required|max:250',
			'state' => 'required|max:250',
			'city' => 'required_if:num_of_cities,1',
			'postal_code' => 'required|number_length',
			//'account_type'=>'required|max:250',
			'mobile_phone_number' => 'numeric|required|number_length',
			'phone_number' => 'numeric|number_length',
			'company' => 'required_if:account_type,Business Account|max:250',
			'email' => "required|email|max:255|unique:users,email,$id",
		), [
			'city.required_if' => 'City field is required',
		]);
		$user = User::find($id);
		$user->role = "Client";
		$user->email = $request->email;
		$user->name = "";
		//$user->account_type=isset($request->account_type);
		//$user->news_letter=isset($request->news_letter);
		$user->save();
		$client = Client::where('user_id', $user->id)->first();
		$client->first_name = $request->first_name;
		$client->last_name = $request->last_name;
		$client->company = $request->company;
		$client->phone_number = $request->phone_number;
		$client->mobile_number = $request->mobile_phone_number;
		$client->address1 = $request->address_1;
		$client->address2 = $request->address_2;
		$client->country_id = $request->country;
		$client->state_id = $request->state;
		$client->city_id = $city_id;
		$client->postal_code = $request->postal_code;
		$client->status = 1;
		$client->save();

		if ($user->save()) {
			return Response(["succes" => "updated"], 200);
		}
	}
	public function get_countries() {
		return Country::all();
	}
	public function get_state($country_id) {
		return State::where('country_id', $country_id)->orderBy('name', 'asc')->get();
	}
	public function get_city($city_id) {
		return City::where('state_id', $city_id)->orderBy('name', 'asc')->get();
	}
	public function change_profile_pic(Request $req) {
		$this->validate($req, array(

			'image_file' => 'required|max:2000|mimes:jpeg,bmp,png',
		));
		$image = input::file('image_file');
		//return $req->all();
		$id = input::get('id');
		Storage::disk('profiles')->makeDirectory($id, 777, true);
		$filename = time() . '.' . $image->getClientOriginalExtension();
		$move = Storage::disk('profiles')->put($id . "/" . $filename, file_get_contents($image));
		$user = User::find($id);
		$user->profile_pic = url("/storage/profiles/$id/$filename");
		if ($user->save()) {
			return Response(url("/storage/profiles/$id/$filename"), 200);
		}
	}
	public function client_reset_password() {
		return view('frontend.reset_password');
	}
	public function unsubscribe_news_letter() {
		$user_id = Auth::user()->id;
		if ($user_id) {
			$client = Client::where('user_id', $user_id)->first();
			$client->news_letter = 0;
			if ($client->save()) {
				return Response(["status" => "ok", "news_letter" => $client->news_letter], 200);
			} else {
				return Response("error", 500);
			}
		} else {
			return Response("unauthorized", 403);
		}
	}
	public function subscribe_news_letter() {
		$user_id = Auth::user()->id;
		if ($user_id) {
			$client = Client::where('user_id', $user_id)->first();
			$client->news_letter = 1;
			if ($client->save()) {
				return Response(["status" => "ok", "news_letter" => $client->news_letter], 200);
			} else {
				return Response("error", 500);
			}
		} else {
			return Response("unauthorized", 403);
		}
	}
	public function makeadmin() {
		$user = new User;
		$user->name = "xAdmin";
		$user->email = "xadmin@gmail.com";
		$user->role = "Admin";
		$user->password = bcrypt("12345");
		$user->save();
	}

}
