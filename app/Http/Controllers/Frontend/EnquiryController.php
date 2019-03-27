<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FreequoteEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use Storage;

class EnquiryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function __construct() {
        /* $this->middleware('Frontend'); */
    }

    public function index(Request $request) {
        if (!empty($request->inputName)) {
            $form = new FreequoteEnquiry;
            $form->service = $request->inputService;
            $form->name = $request->inputName;
            $form->email = $request->inputEmail;
            $form->company = $request->inputCompany;
            $form->phone = $request->inputPhone;
            $form->website = $request->inputWebsite;
            $form->message = $request->inputMessage;
            $form->save();
            $htmlContent = '
    <h4>'.$request->inputService.' Enquiry request has submitted, details are given below.</h4>
    <table cellspacing="0" style="width: 300px; height: 200px;">
        <tr>
            <th>Service:</th><td>' . $request->inputService . '</td>
        </tr>    
        <tr style="background-color: #e0e0e0;">
            <th>Name:</th><td>' . $request->inputName . '</td>
        </tr>
        <tr>
            <th>Email:</th><td>' . $request->inputEmail . '</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Phone:</th><td>' . $request->inputPhone . '</td>
        </tr>
        <tr>
            <th>Company:</th><td>' . $request->inputCompany . '</td>
        </tr>
        <tr style="background-color: #e0e0e0;">
            <th>Website:</th><td>' . $request->inputWebsite . '</td>
        </tr>
        <tr>
            <th>Message:</th><td>' . $request->inputMessage . '</td>
        </tr>        
    </table>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $subject = $request->inputService.' enquiry request';
            // Additional headers
            $headers .= 'From:'.$request->inputName . "\r\n";
            $to = 'caroline@webqom.com,adam@webqom.com';
            // Send email
            if (mail($to, $subject, $htmlContent, $headers)) {
                $status = 'ok';
            } else {
                $status = 'err';
            }
        }
    }

}
