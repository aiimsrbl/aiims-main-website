<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\Admin\EmployeeRequest;

class EmployeeController extends Controller
{
    private $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employees.listing');
    }

    function getListingAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = Employee::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.employee.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.employee.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.employee.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
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
        return view('admin.employees.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->getData();
    
        $obj = new Employee;
        $obj->name          = $data['name'];
        $obj->email         = $data['email'];
        $obj->designation   = $data['designation'];
        $obj->created_by    = my_id();
        $obj->status        = $data['status'];
        $obj->save();

        if(isset($obj->id) && $obj->id > 0)
        {   
            $request->session()->flash('success_notify',ADD_REC_MSG);
            return redirect()->route('admin.employee.listing');
        }
        else
        {
            $request->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $this->data['view'] = $employee;
        return view('admin.employees.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $this->data['edit'] = $employee;
        return view('admin.employees.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $data = $request->getData();

        $employee->name         = $data['name'];
        $employee->email        = $data['email'];
        $employee->designation  = $data['designation'];
        $employee->updated_by   = my_id();
        $employee->status       = $data['status'];
        $employee->save();

        if(isset($employee->id) && $employee->id > 0)
        {   
            $request->session()->flash('success_notify',UPDATE_REC_MSG);
            return redirect()->route('admin.employee.listing');
        }
        else
        {
            $request->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee,Request $req)
    {   
        if($employee->delete())
        {
            $req->session()->flash('success_notify',DEL_REC_MSG);
        }
        else
        {
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }

        return redirect()->route('admin.employee.listing');
    }
}
