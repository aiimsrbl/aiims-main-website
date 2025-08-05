<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\DepartmentFaculty;


class DepartmentController extends Controller
{   
    private $data = [];

    public function departmentListing()
    {   
        $this->data['data'] = Department::orderBy('name')->where('status','active')->get();
        return view('web.pages.departments.listing',$this->data);
    }

    public function departmentDetail($deptId = null)
    {   
        $data       = [];
        
        if($deptId)
        {   
            $data = Department::with(['detail','activity','faculties'])->where(['status'=>'active','id'=>$deptId])->first();
            
            if(!$data)
            {
                request()->session()->flash('error','Department not found');
                return redirect()->route('web.departments');
            }

            if(request()->ajax() && request()->get('type')=='faculty')
            {
                $this->data['faculties'] = $data->faculties()->paginate(RECORD_PER_PAGE);
                return view('web.pages.departments.includes.faculty',$this->data);
            }
            if(request()->ajax() && request()->get('type')=='staff')
            {
                $this->data['staff']     = $data->staff()->paginate(RECORD_PER_PAGE);
                return view('web.pages.departments.includes.staff',$this->data);
            }
            else
            {
                $this->data['faculties'] = $data->faculties()->paginate(RECORD_PER_PAGE);
                $this->data['staff']     = $data->staff()->paginate(RECORD_PER_PAGE);
                $this->data['activity']  = $data->activity;
            }
        }

        $this->data['data'] = $data;
        return view('web.pages.departments.detail',$this->data); 
    }

    public function departmentFacultyDetail($facultyId)
    {   
        $facultyId = base64_decode($facultyId);
        
        $this->data['obj'] = DepartmentFaculty::findOrFail($facultyId);

        return view('web.pages.departments.faculty_detail',$this->data);
    }
}
