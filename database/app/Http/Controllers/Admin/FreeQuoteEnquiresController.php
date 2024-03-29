<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FreequoteEnquiry;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

/**
 *
 */
class FreeQuoteEnquiresController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index($per_page = 10)
    {
        $enquiry = FreequoteEnquiry::orderBy('id', 'desc')->paginate($per_page);
        return view("admin.enquiry.list", compact('enquiry', 'per_page'));
    }

    public function deleteEnquires($id)
    {
        $enquiry = FreequoteEnquiry::destroy($id);
        return redirect()->back()->with([
            'flash_message' => 'Enquiry has been deleted successfully.',
        ]);
    }

    public function getEnquiryDetails(Request $request)
    {
        $id = $request->id;
        if ($id != null) {
            if (is_array($id)) {
                $enquiry = FreequoteEnquiry::whereIn('id', $id)->get();
                return response($enquiry);
            }
        }
    }

    public function deleteEnquiryByID(Request $request)
    { 
        $id = $request->id;
        if ($id != null) {
            if (is_array($id)) {
                $enquiry = FreequoteEnquiry::destroy($id);
                Session::flash('flash_message', 'Deleted successfully');
                return response($enquiry);
            }
        }
    }

    public function deleteEnquiryAll(Request $request)
    {

        $aEnquiry = FreequoteEnquiry::pluck('id')->toArray();
        FreequoteEnquiry::destroy($aEnquiry);
        Session::flash('flash_message', 'Deleted successfully');
        return response();
    }

    public function exportEnquiry(Request $request)
    {
//        dd($request);
        $reviews = FreequoteEnquiry::get();
//        dd($reviews);
//        return Excel::create('Enqueries', function($excel) use ($reviews) {
//            $excel->sheet('mySheet', function($sheet) use ($reviews)
//            {
//                $sheet->fromArray($reviews);
//            });
//        })->download("excel");

        $CsvData=array('id,service,name,email,company,phone,website,message,created_at,updated_at');
        foreach($reviews as $value){
            $CsvData[]=$value->id.','.$value->service.','.$value->name.','.$value->email.','.$value->company.','.$value->phone.','.$value->website.','.$value->message.','.$value->created_at.','.$value->updated_at;
        }


        $filename=date('Y-m-d').".csv";
        $file_path=base_path().'/storage/'.$filename;
        $file = fopen($file_path,"w+");
        foreach ($CsvData as $exp_data){
            fputcsv($file,explode(',',$exp_data));
        }
        fclose($file);







        ###############################################################
# File Download 1.31
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
###############################################################
# Sample call:
#    download.php?f=phptutorial.zip
#
# Sample call (browser will try to save with new file name):
#    download.php?f=phptutorial.zip&fc=php123tutorial.zip
###############################################################

// Allow direct file download (hotlinking)?
// Empty - allow hotlinking
// If set to nonempty value (Example: example.com) will only allow downloads when referrer contains this text
        define('ALLOWED_REFERRER', '');

// Download folder, i.e. folder where you keep all files for download.
// MUST end with slash (i.e. "/" )
        define('BASE_DIR','storage');

// log downloads?  true/false
        define('LOG_DOWNLOADS',true);

// log file name
        define('LOG_FILE','downloads.log');

// Allowed extensions list in format 'extension' => 'mime type'
// If myme type is set to empty string then script will try to detect mime type
// itself, which would only work if you have Mimetype or Fileinfo extensions
// installed on server.
        $allowed_ext = array (

            // archives
            'zip' => 'application/zip',
            'csv' => 'application/csv',

            // documents
            'pdf' => 'application/pdf',
            'doc' => 'application/msword',
            'xls' => 'application/vnd.ms-excel',
            'ppt' => 'application/vnd.ms-powerpoint',

            // executables
            'exe' => 'application/octet-stream',
            'apk' => 'application/vnd.android.package-archive',

            // images
            'gif' => 'image/gif',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',

            // audio
            'mp3' => 'audio/mpeg',
            'wav' => 'audio/x-wav',

            // video
            'mpeg' => 'video/mpeg',
            'mpg' => 'video/mpeg',
            'mpe' => 'video/mpeg',
            'mov' => 'video/quicktime',
            'avi' => 'video/x-msvideo'
        );



####################################################################
###  DO NOT CHANGE BELOW
####################################################################

// If hotlinking not allowed then make hackers think there are some server problems
        if (ALLOWED_REFERRER !== ''
            && (!isset($_SERVER['HTTP_REFERER']) || strpos(strtoupper($_SERVER['HTTP_REFERER']),strtoupper(ALLOWED_REFERRER)) === false)
        ) {
            die("Internal server error. Please contact system administrator.");
        }

// Make sure program execution doesn't time out
// Set maximum script execution time in seconds (0 means no limit)
        set_time_limit(0);

        if (!isset($file_path) || empty($file_path)) {
            die("Please specify file name for download.");
        }

// Nullbyte hack fix
        if (strpos($file_path, "\0") !== FALSE) die('');

// Get real file name.
// Remove any path info to avoid hacking by adding relative path, etc.
        $fname = basename($file_path);

// Check if the file exists
// Check in subfolders too
        function find_file ($dirname, $fname, &$file_path) {

            $dir = opendir($dirname);

            while ($file = readdir($dir)) {
                if (empty($file_path) && $file != '.' && $file != '..') {
                    if (is_dir($dirname.'/'.$file)) {
                        find_file($dirname.'/'.$file, $fname, $file_path);
                    }
                    else {
                        if (file_exists($dirname.'/'.$fname)) {
                            $file_path = $dirname.'/'.$fname;
                            return;
                        }
                    }
                }
            }

        } // find_file

// get full file path (including subfolders)
        $file_path = '';
        find_file(BASE_DIR, $fname, $file_path);

        if (!is_file($file_path)) {
            die("File does not exist. Make sure you specified correct file name.");
        }

// file size in bytes
        $fsize = filesize($file_path);

// file extension
        $fext = strtolower(substr(strrchr($fname,"."),1));

// check if allowed extension
        if (!array_key_exists($fext, $allowed_ext)) {
            die("Not allowed file type.");
        }

// get mime type
        if ($allowed_ext[$fext] == '') {
            $mtype = '';
            // mime type is not set, get from server settings
            if (function_exists('mime_content_type')) {
                $mtype = mime_content_type($file_path);
            }
            else if (function_exists('finfo_file')) {
                $finfo = finfo_open(FILEINFO_MIME); // return mime type
                $mtype = finfo_file($finfo, $file_path);
                finfo_close($finfo);
            }
            if ($mtype == '') {
                $mtype = "application/force-download";
            }
        }
        else {
            // get mime type defined by admin
            $mtype = $allowed_ext[$fext];
        }

// Browser will try to save file with this filename, regardless original filename.
// You can override it if needed.

        if (!isset($_GET['fc']) || empty($_GET['fc'])) {
            $asfname = $fname;
        }
        else {
            // remove some bad chars
            $asfname = str_replace(array('"',"'",'\\','/'), '', $_GET['fc']);
            if ($asfname === '') $asfname = 'NoName';
        }

// set headers
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Type: $mtype");
        header("Content-Disposition: attachment; filename=\"$asfname\"");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: " . $fsize);

// download
// @readfile($file_path);
        $file = @fopen($file_path,"rb");
        if ($file) {
            while(!feof($file)) {
                print(fread($file, 1024*8));
                flush();
                if (connection_status()!=0) {
                    @fclose($file);
                    die();
                }
            }
            @fclose($file);
        }

// log downloads
        if (!LOG_DOWNLOADS) die();

        $f = @fopen(LOG_FILE, 'a+');
        if ($f) {
            @fputs($f, date("m.d.Y g:ia")."  ".$_SERVER['REMOTE_ADDR']."  ".$fname."\n");
            @fclose($f);
        }




//        $headers = [
//            'Content-Type' => 'application/csv',
//            'Access-Control-Allow-Origin' => '*',
//            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
//            'Access-Control-Allow-Headers' => "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Authorization , Access-Control-Request-Headers"
//        ];
//
//        return response()->download($file_path,$filename,$headers );
    }

    public function add()
    {
        $enquiry = FreequoteEnquiry::create();
        return view("admin.enquiry.add", ['enquiry' => $enquiry]);
    }

    public function edit($id)
    {
        $enquiry = FreequoteEnquiry::find($id);
        return view("admin.enquiry.edit", ['enquiry' => $enquiry]);
    }

    public function create(Request $request)
    {
        $enquiry = FreequoteEnquiry::create();
        $enquiry->service = $request->input('service');
        $enquiry->name = $request->input('name');
        $enquiry->email = $request->input('email');
        $enquiry->company = $request->input('company');
        $enquiry->phone = $request->input('phone');
        $enquiry->website = $request->input('website');
        $enquiry->message = $request->input('message');
        $enquiry->save();

        return redirect()->route("enquires-list")->with('status', 'Enquires added!');
    }

    public function update($id, Request $request)
    {
        $enquiry = FreequoteEnquiry::find($id);
        $enquiry->service = $request->input('service');
        $enquiry->name = $request->input('name');
        $enquiry->email = $request->input('email');
        $enquiry->company = $request->input('company');
        $enquiry->phone = $request->input('phone');
        $enquiry->website = $request->input('website');
        $enquiry->message = $request->input('message');
        $enquiry->save();

        return redirect()->route("enquires-list")->with('status', 'Enquires updated!');
    }
}
