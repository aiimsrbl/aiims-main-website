<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Department_detail;
use App\Traits\ApiResponseTrait;
use DataTables;

class DepartmentController extends Controller
{   
    use ApiResponseTrait;

    private $data  = [];
    public function index(){
        return view('admin.departments.listing');
    }

    function getListingAjax(Request $request)
    {
        
        if($request->ajax()) {
            
            $data = Department::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn='
                        <a href="'.route('admin.department.manage.data',[$obj->id]).'">
                            <button title="Manage Department" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-cog"></i>
                            </button>
                        </a>';

                    if($obj->activity){
                        $actionBtn.='
                            <a href="'.route('admin.department.activity.view',[$obj->id]).'">
                                <button title="View Department Activity" type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-eye"></i>
                                </button>
                            </a>';
                    }else{
                        $actionBtn.='
                            <a href="'.route('admin.department.activity.view',[$obj->id]).'">
                                <button title="Add Department Activity" type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i>
                                </button>
                            </a>';
                    }

                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->make(true);

        }
    }

    function manageData(Department $department)
    {
        $this->data['department'] = $department;

        return view('admin.departments.mange-data',$this->data);
    }

    function updateIntroduction($department)
    {
        $introduction = request()->get('introduction');

        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['introduction' => $introduction]
        );

        return $resp->id;
    }

    function updateGoal($department)
    {
        $goal = request()->get('goal');
        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['goal' => $goal]
        );

        return $resp->id;
    }

    function updateFuturePlanning($department){

        $future_planning = request()->get('future_planning');

        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['future_planning' => $future_planning]
        );

        return $resp->id;
    }

    function updateFacilities($department)
    {
        $facilities = request()->get('facilities');

        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['facilities' => $facilities]
        );

        return $resp->id;
    }

    function updateFaculty($department){

        $faculty = request()->get('faculty');

        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['faculty' => $faculty]
        );

        return $resp->id;
    }

    function updateStaffResidents($department){

        $staff_residents = request()->get('staff_residents');

        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['staff_residents' => $staff_residents]
        );

        return $resp->id;
    }

    function updateOpdSchedule($department){
        $opd_schedule = request()->get('opd_schedule');

        $resp = Department_detail::updateOrCreate(
            ['department_id' => $department->id],
            ['opd_schedule' => $opd_schedule]
        );

        return $resp->id;
    }

    function updateData(Department $department,Request $request)
    {    
        $form = $request->get('form');

        $status = false;
        
        switch($form)
        {  
            case 'introduction':
                $status = $this->updateIntroduction($department);
            break;
            case 'goal':
                $status = $this->updateGoal($department);
            break;
            case 'facilities':
                $status = $this->updateFacilities($department);
                break;
            case 'opd_schedule':
                $status = $this->updateOpdSchedule($department);
                break;
            case 'future_planning':
                $status = $this->updateFuturePlanning($department);
            break;

            case 'faculty_ind':
                $status = $this->updateFaculty($department);
            break;

            case 'staff_residents':
                $status = $this->updateStaffResidents($department);
            break;
        }

        if($status)
        {
            return $this->successResponse(UPDATE_REC_MSG);
        }
        else
        {
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    } 
}
