<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DepartmentFaculty;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\Admin\DepartmentFacultyRequest;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;

class DepartmentFacultyController extends Controller
{
    use ApiResponseTrait;
    private $data = [];
    public function index(){
        return view('admin.departments.faculty.listing');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listingAjax(Request $request)
    {
        if($request->ajax()) {
            
            $data = DepartmentFaculty::with('department')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.department.faculty.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.department.faculty.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.department.faculty.delete',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('email', function ($data) {
                    return $data->email??"--";
                })
                ->editColumn('phone', function ($data) {
                    return $data->phone??"--";
                })
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->data['department'] = Department::pluck('name','id');
        $this->data['designation'] = Designation::pluck('name','id');
        return view('admin.departments.faculty.add',$this->data);
    }

    private function uploadFile($reqData)
    {
        try{
            $file   = $reqData['image'];
    
            $ext    = $file->getClientOriginalExtension();
            $name   = "faculty_profile_".md5(time()).".".$ext;
            $resp   = $file->storeAs('public/faculty_profile',$name);

            //dd($resp);
            return $name;
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentFacultyRequest $request)
    {
        try{
            $data               = $request->getData();
            $obj                = new DepartmentFaculty;
            $obj->name          = $data['name'];
            $obj->department_id = $data['department']; 
            $obj->designation_id = $data['designation']; 
            $obj->description    = $data['description']; 
            $obj->email         = $data['email'];
            $obj->phone         = $data['phone'];
            $obj->facebook      = $data['facebook'];
            $obj->twitter       = $data['twitter'];
            $obj->linkedin      = $data['linkedin'];
            $obj->type          = $data['type'];
            
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];

            if(isset($data['image']))
            {
                $obj->image  = $this->uploadFile($data);
            }

            $obj->save();

            if($obj->id > 0)
            {
                return $this->successResponse(ADD_REC_MSG);
            }
            else
            {
                return $this->failedResponse(SERVER_ERROR_MSG);
            }
        }
        catch(\Exception $e){
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepartmentFaculty  $departmentFaculty
     * @return \Illuminate\Http\Response
     */
    public function show(DepartmentFaculty $viewObj)
    {   
        $path = storage_path('public/faculty_profile/' . $viewObj->image);
        $this->data['view'] = $viewObj;
        return view('admin.departments.faculty.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepartmentFaculty  $departmentFaculty
     * @return \Illuminate\Http\Response
     */
    public function edit(DepartmentFaculty $editObj)
    {
        $this->data['department']   = Department::pluck('name','id');
        $this->data['designation'] = Designation::pluck('name','id');
        $this->data['edit_data']    = $editObj;
        return view('admin.departments.faculty.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepartmentFaculty  $departmentFaculty
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentFaculty $editObj,DepartmentFacultyRequest $request)
    {
        try{
            $data                       = $request->getData();
            $editObj->name              = $data['name'];
            $editObj->department_id     = $data['department'];
            $editObj->designation_id        = $data['designation']; 
            $editObj->description = $data['description']; 
            $editObj->email             = $data['email'];
            $editObj->phone             = $data['phone'];
            $editObj->facebook          = $data['facebook'];
            $editObj->twitter           = $data['twitter'];
            $editObj->linkedin          = $data['linkedin'];
            $editObj->type              = $data['type'];
           
            $editObj->updated_by        = my_id();
            $editObj->status            = $data['status'];

            if(isset($data['image']))
            {   
                Storage::delete("public/faculty_profile/$editObj->image");
                $editObj->image  = $this->uploadFile($data);
            }

            $editObj->save();

            if($editObj->id > 0)
            {
                return $this->successResponse(UPDATE_REC_MSG);
            }
            else
            {
                return $this->failedResponse(SERVER_ERROR_MSG);
            }
        }
        catch(\Exception $e){
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepartmentFaculty  $departmentFaculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepartmentFaculty $deleteObj,Request $req)
    {
        if($deleteObj->delete())
        {
            $deleteObj->updated_by  = my_id();
            $deleteObj->save();

            $req->session()->flash('success_notify',DEL_REC_MSG);
        }
        else
        {
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
        
        return redirect()->route('admin.department.faculty.listing');
    }
}
