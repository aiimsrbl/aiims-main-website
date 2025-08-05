<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TelephoneDirectory;
use App\Models\Quotation;
use App\Models\News;
use App\Models\OfficeOrder;
use App\Models\Tender;
use App\Models\Spotlight;
use App\Models\Otp;
use App\Models\Event;
use App\Models\Workshop;
use App\Models\User;
use App\Models\HospitalStatistics;
use Carbon\Carbon;
use File;
use Response;
use \Exception;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordOTP;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{   
    use ApiResponseTrait;

    private $data = [];
    public function telephoneDirectory(Request $request)
    {   
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;

        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;

        $this->data['data'] = TelephoneDirectory::where('status','active')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
            return view('web.pages.telephone-directory.table',$this->data);
    	}
        else
        {
            return view('web.pages.telephone-directory.listing',$this->data);
        }
    }
    
    private function getStatsData($data_type,$reqType=''){
        try{

            if($reqType == 'dbget'){
                $fData = [
                    'today_opd' => 0,
                    'total_opd' => 0,
                    'today_lab_reporting' => 0,
                    'total_lab_reporting' => 0,
                    'today_radiology_reporting'=>0,
                    'total_radiology_reporting'=>0,
                    'today_ipd' => 0,
                    'total_ipd' => 0,
                    'emg_today_admissions' => 0,
                    'emg_total_admissions' =>0,
                    'today_ot_cases' => 0,
                    'total_ot_cases' => 0,
                ];
                //'EMERGENCY_TRAUMA','IPD','LAB';

                $resp1 =  \DB::table('stats_data')->where('type','LAB')->first();
                if($resp1){
                    $dt = json_decode($resp1->data,true);
                    if(isset($dt[0]['OPD']['todayPatientCount'])){
                        $fData['today_opd'] = $dt[0]['OPD']['todayPatientCount'];
                    }
                    if(isset($dt[0]['OPD']['totalPatientCount'])){
                        $fData['total_opd'] = $dt[0]['OPD']['totalPatientCount'];
                    }
                    if(isset($dt[0]['Report']['todayReports'])){
                        $fData['today_lab_reporting'] = $dt[0]['Report']['todayReports'];
                    }
                    if(isset($dt[0]['Report']['totalReports'])){
                        $fData['total_lab_reporting'] = $dt[0]['Report']['totalReports'];
                    }
                    if(isset($dt[0]['Radiology']['todayReports'])){
                        $fData['today_radiology_reporting'] = $dt[0]['Radiology']['todayReports'];
                    }
                    if(isset($dt[0]['Radiology']['totalReports'])){
                        $fData['total_radiology_reporting'] = $dt[0]['Radiology']['totalReports'];
                    }
                }

                $resp2 =  \DB::table('stats_data')->where('type','IPD')->first();
                if($resp2){
                    $dt2 = json_decode($resp2->data,true);
                    if(isset($dt2['ipdPatientVisitData']['data'][0]['Today_IPD_Admissions'])){
                        $fData['today_ipd'] = $dt2['ipdPatientVisitData']['data'][0]['Today_IPD_Admissions'];
                    }
                    if(isset($dt2['ipdPatientVisitData']['data'][0]['Total_IPD_Admissions'])){
                        $fData['total_ipd'] = $dt2['ipdPatientVisitData']['data'][0]['Total_IPD_Admissions'];
                    }
                }

                $resp3 =  \DB::table('stats_data')->where('type','EMERGENCY_TRAUMA')->first();
                if($resp3){
                    $dt3 = json_decode($resp3->data,true);
                    if(isset($dt3['EmgPatientVisitData']['data'][0]['Today_Emg_Admissions'])){
                        $fData['emg_today_admissions'] = $dt3['EmgPatientVisitData']['data'][0]['Today_Emg_Admissions'];
                    }
                    if(isset($dt3['EmgPatientVisitData']['data'][0]['Total_Emg_Admissions'])){
                        $fData['emg_total_admissions'] = $dt3['EmgPatientVisitData']['data'][0]['Total_Emg_Admissions'];
                    }
                }
                return (object)$fData;exit;
            }

            switch ($data_type) {
                case 'EMERGENCY_TRAUMA':
                    $endpoint = "https://aiimsrbl.dcservices.in/HISServices/service/ipdHospitalStats/todayemg?hospCode=99912";
                break;
                case 'IPD':
                    $endpoint = "https://aiimsrbl.dcservices.in/HISServices/service/ipdHospitalStats/todayipd?hospCode=93911";
                break;
                case 'LAB':
                    $endpoint = "https://aiimsrbl.dcservices.in/GETCOUNTAPIS/getcountapi/v1/getCount";
                break;
            }
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $endpoint);
        
            $statusCode = $response->getStatusCode();
            
            $response_body = '';
            if($statusCode == 200){
                $response_body = json_decode($response->getBody(),true);
            }
            return $response_body;
        }
        catch(\Exception $e){
            return throw new \Exception($e->getMessage());
        }
    }

    public function cronToUpdateStatsData(){
        try{

            $dt = ['EMERGENCY_TRAUMA','IPD','LAB'];
            foreach ($dt as $val){
                $resp =  $this->getStatsData($val);
                if($resp){
                    $resp = json_encode($resp);

                    \DB::table('stats_data')->UpdateOrinsert(['type'=>$val],['data'=>$resp]);
                }
            }
            return true;
        }
        catch(\Exception $e){
            return $this->failedResponse($e->getMessage());
        }
    }

    public function index(Request $req)
    {   
        if($req->type == 'stats_update'){
            $resp =  $this->cronToUpdateStatsData();
            die('success');
        }

        $this->data['hospital_statistics'] = $this->getStatsData($req->type_data,'dbget');
        
        $tenderExpiryDate = Carbon::now()->sub(TENDER_EXPIRY_DAYS,'day')->toDateString();

        // news
        $this->data['news'] = News::orderBy("release_date",'desc')->where('status','active')->take(10)->get();

        // office order
        $this->data['office_order'] = OfficeOrder::orderBy("release_date",'desc')->where(['status'=>'active','record_type'=> 'office_order'])->take(10)->get();
        
        // ternders 
        $this->data['tenders']     = Tender::with('corrigendum')->orderBy("start_date",'desc')->where('status','active')->where('end_date','>=',$tenderExpiryDate)->take(10)->get();

        $this->data['quotations']     = Quotation::where('status','active')->where('end_date','>=',$tenderExpiryDate)->orderBy("start_date",'desc')->take(10)->get();

        //$this->data['hospital_statistics'] = HospitalStatistics::orderBy("id", "DESC")->first();

        $this->data['spotlights'] = Spotlight::orderBy("id", "DESC")->where('status','active')->get();

        $this->data['events'] = Event::orderBy("event_date", "DESC")->where('status','active')->take(4)->get();
        $this->data['workshop'] = Workshop::orderBy("start_date", "DESC")->where('status','active')->take(4)->get();

        return view('web.pages.home.index',$this->data);
    }

    public function eventGallery($eventId = null){

        $id = $eventId ? base64_decode($eventId) :false;

        $this->data['event_id'] = $id;

        $this->data['events'] = Event::orderBy("event_date", "DESC")->where('status','active')->get();

        return view('web.pages.event-gallery',$this->data);
    }

    public function displayImage()
    {   
        $path = request()->get('p');
        $download = request()->get('d');

        if($path){
            $path = "app/public/".$path;
    
            $path = storage_path($path);

            if (!File::exists($path)) {
                abort(404);
            }
            

            if(isset($download) && $download == true)
            {
                return Response::download($path);
            }
            else
            {                
                $file = File::get($path);
        
                $type = File::mimeType($path);
        
                $response = Response::make($file, 200);
        
                $response->header("Content-Type", $type);
                
                return $response;
            }
        }
    }

    public function forgotPasswordEmail(Request $request){
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|max:100',
        ]);

        if($validator->fails()) {
            $error  = $this->iterateValidationError($validator->errors());
            return $this->failedResponse(INVALID_ERR_MSG,BAD_REQUEST,$error);
        }

        $email = $request->get('email');

        $obj = User::where(['status'=>'active','email' => $email])->first();

        if(!$obj){
            return $this->failedResponse(INVALID_ERR_MSG,BAD_REQUEST,['email'=>"That email address doesn't exist. Enter a different email"]);
        }

        $num = rand(100000,999999);

        // delete previous OTPs 
        $affectedRows = Otp::where('email', '=', $obj->email)->delete();

        $otp = new Otp();
        
        $otp->otp = $num;
        $otp->email = $obj->email;
        $otp->created_at = Carbon::now()->toDateTimeString(); // 10 mins otp will get expire
        $otp->save();

        if($otp->save())
        {
            Mail::to(FROM_EMAIL)->send(new ResetPasswordOTP(['otp' => $num,'username' => $obj->name]));
            
            return $this->successResponse('We have sent an OTP to reset password. Please check your email',SUCCESS,['email'=>$obj->email]);
        }
    }

    function adminPasswordChange(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'otp'               => 'required|max:10',
                'email_new'         => 'required|email',
                'password'          => 'required|min:5|max:16|confirmed',
            ]);

            if($validator->fails())
            {
                $error  = $this->iterateValidationError($validator->errors());
                return $this->failedResponse(INVALID_ERR_MSG,BAD_REQUEST,$error);
            }
            
            $otp        = $request->get('otp');
            $email      = $request->get('email_new');
            $password   = $request->get('password');

            $expiryTime = Carbon::now()->sub(10,'minutes')->toDateTimeString(); // 10 mins otp will get expire
            
            $obj = Otp::where('created_at','>',$expiryTime)->where(['otp'=>$otp,'email'=>$email])->orderBy('id','desc')->first();
            
            if(!$obj){
                return $this->failedResponse(INVALID_ERR_MSG,BAD_REQUEST,['otp'=>'Invalid or expired OTP']);
            }

            $email = $obj->email;

            $objUser            = User::where(['email' => $email])->orderBy('id','desc')->first();
            $objUser->password  = bcrypt($password);

            if($objUser->save())
            {   
                $obj->delete();
                return $this->successResponse('Password changed successfully');
            }
            else
            {
                return $this->failedResponse(SERVER_ERROR_MSG);
            }
        }
        catch(Exception $e)
        {   
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    public function workshops(Request $request)
    {
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;

        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;

        $this->data['data'] = Workshop::where('status','active')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
            return view('web.pages.workshop.include',$this->data);
    	}
        else
        {
            return view('web.pages.workshop.event-and-workshop',$this->data);
        }
        
    }
}
