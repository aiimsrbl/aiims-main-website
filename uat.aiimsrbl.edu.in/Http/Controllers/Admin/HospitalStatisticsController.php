<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\HospitalStatistics;

class HospitalStatisticsController extends Controller
{   
    private $data = [];
    function listing(){
        return view('admin.hospital-statistics.listing');
    }

    function listingAjax(Request $request){

        if($request->ajax()){
            
            $data = HospitalStatistics::latest()->get();

            $lastId = HospitalStatistics::max('id');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj) use($lastId){

                    $actionBtn = '--';
                    if($lastId == $obj->id){
                        
                        $actionBtn='
                                <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.hospital.delete',[$obj->id])."'".')">
                                <i class="fa fa-trash"></i>
                                </button>
                        ';
                    }
                    return $actionBtn;
                })
                ->editColumn('created_at', function ($data) {
                    return display_date($data->created_at);
                })
             ->make(true);
        }
    }

    public function add()
    {
        $total_opd = $total_ipd = $total_lab_reporting = $total_radiology_reporting = 0;

        $data = HospitalStatistics::orderBY('id','desc')->first();

        if($data)
        {
            $total_opd                  = $data->total_opd; 
            $total_ipd                  = $data->total_ipd;
            $total_lab_reporting        = $data->total_lab_reporting;
            $total_radiology_reporting  = $data->total_radiology_reporting;
        }

        $this->data['total_opd'] = $total_opd;
        $this->data['total_ipd'] = $total_ipd;
        $this->data['total_lab_reporting'] = $total_lab_reporting;
        $this->data['total_radiology_reporting'] = $total_radiology_reporting;
        
        return view('admin.hospital-statistics.add',$this->data);
    }

    public function store(Request $req){
        $validate = $req->validate([
            'today_opd'                         => 'required|numeric',
            'today_admission'               => 'required|numeric',
            'today_lab_reporting'         => 'required|numeric',
            'today_radiology_reporting'                    => 'required|numeric',
            'today_ot_cases'                    => 'required|numeric',
            'total_ot_cases'                    => 'required|numeric',
            'trauma_and_rmergency_occupied_bed' => 'required|numeric',
            'trauma_and_emergency_vacant_Bed'   => 'required|numeric',
        ]);

        $total_opd = $total_ipd = $total_lab_reporting = $total_radiology_reporting = 0;

        $data = HospitalStatistics::orderBY('id','desc')->first();

        if($data){
            $total_opd = ($data->total_opd + $req->get('today_opd'));
            
            $total_ipd = ($data->total_ipd + $req->get('today_admission'));
            
            $total_lab_reporting = ($data->total_lab_reporting + $req->get('today_lab_reporting'));
            
            $total_radiology_reporting = ($data->total_radiology_reporting + $req->get('today_radiology_reporting'));
        }

        $obj = new HospitalStatistics();

        $obj->today_opd = $req->get('today_opd');
        $obj->total_opd = $total_opd;

        $obj->today_ipd = $req->get('today_admission');
        $obj->total_ipd = $total_ipd;

        $obj->today_lab_reporting = $req->get('today_lab_reporting');
        $obj->total_lab_reporting = $total_lab_reporting;

        $obj->today_radiology_reporting = $req->get('today_radiology_reporting');
        $obj->total_radiology_reporting = $total_radiology_reporting;

        $obj->today_ot_cases    = $req->get('today_ot_cases');
        $obj->total_ot_cases    = $req->get('total_ot_cases');
        $obj->te_occupied_beds  = $req->get('trauma_and_rmergency_occupied_bed');
        $obj->te_vacant_beds    = $req->get('trauma_and_emergency_vacant_Bed');
        $obj->created_by        = my_id();
        $obj->save();

        if(isset($obj->id) && $obj->id > 0)
        {   
            $req->session()->flash('success_notify',ADD_REC_MSG);
            return redirect()->route('admin.hospital.listing');
        }
        else
        {
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    public function deleteLastRecord(HospitalStatistics $deleteObj){

        $lastId = HospitalStatistics::max('id');

        if($deleteObj->id !== $lastId){
            request()->session()->flash('error','You can delete only last record');
        }
        else{
            $deleteObj->delete();
            request()->session()->flash('success_notify',DEL_REC_MSG);
        }
        
        
        return redirect()->back();
    }
}
