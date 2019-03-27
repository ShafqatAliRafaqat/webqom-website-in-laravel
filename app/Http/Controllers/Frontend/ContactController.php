<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FreequoteEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;
use Validator;
use App\Mail\EnquiryMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {

	public function index() {
		return view('frontend.contact_us');  
	}

	public function ValidateForm($fields, $rules){
        $validator = Validator::make($fields, $rules)->validate();
    }
	public function contactEnquiry(Request $request,FreequoteEnquiry $enquiry){
		$rules = [
            'name' => 'required',
            'email' => 'required',
            'service' => 'required',
            'company' => 'required',
            'phone' => 'required',
            'website' => 'required',
            'message' => 'required'
        ];
        $this->ValidateForm($request->all(), $rules);

        $enquiry->name  = $request->name;
        $enquiry->email  = $request->email;
        $enquiry->service = $request->service;
        $enquiry->company  = $request->company;
        $enquiry->phone  = $request->phone;
        $enquiry->website  = $request->website;
        $enquiry->message  = $request->message;

        if($enquiry->save()) {
            $mail_data = [
                'name' => $enquiry->name,
                'email' => $enquiry->email,
                'service' => $enquiry->service,
                'company' => $enquiry->company,
                'phone' => $enquiry->phone,
                'website' => $enquiry->website,
                'message' => $enquiry->message,
            ];
            Mail::to('mayurpanchal1278@gmail.com')->send(new EnquiryMail($mail_data));
        }
        return redirect()->route('contact');
	}
}