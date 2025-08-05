<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdmissionProcedureRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\AdmissionProcedure;

class AdmissionProcedureController extends Controller
{
    use ApiResponseTrait;

    private $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admission-procedure.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admission-procedure.add');
    }

    private function uploadFile($reqData,$edit=false)
    {   
        try{
            $file   = $reqData['file'];
            $ext    = $file->getClientOriginalExtension();
            $name   = "admission_procedure_".md5(time()).".".$ext;
            $path   = $file->storeAs(
                'public/admission-procedure',$name
            );
            return $name;
        }
        catch(\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdmissionProcedureRequest $request)
    {
        try
        {
            $data = $request->getData();    
            $obj = new AdmissionProcedure;
            $obj->title         = $data['title'];
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];
            $obj->file          = $this->uploadFile($data);
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
        catch(\Exception $e)
        {
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AdmissionProcedure $viewObj)
    {
        $this->data['viewObj']  = $viewObj;
        return view('admin.admission-procedure.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdmissionProcedure $editObj)
    {   
        $this->data['editObj']  = $editObj;
        return view('admin.admission-procedure.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdmissionProcedure $editObj,AdmissionProcedureRequest $request)
    {
        try{
            $data                   = $request->getData();
            $editObj->title         = $data['title'];
            $editObj->updated_by    = my_id();
            $editObj->status        = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/admission-procedure/$editObj->file");
                $editObj->file  = $this->uploadFile($data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdmissionProcedure $deleteObj,Request $req)
    {
        try{
            $resp = $deleteObj->delete();

            if($resp)
            {
                $deleteObj->updated_by = my_id();
                $deleteObj->save();
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.admission.procedure.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    function getAddMissionListAjax(Request $request){
        
        if($request->ajax()) {
            $data = AdmissionProcedure::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.admission.procedure.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.admission.procedure.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.admission.procedure.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('file', function ($obj) {
                    if($obj->file && file_exists(storage_path().'/app/public/admission-procedure/'.$obj->file)){

                        $link = route('image.displayImage',['p'=>'admission-procedure/'.$obj->file]);

                        return '<a target="_blank" href="'.$link.'">
                                <button title="View" type="button" class="btn btn-default btn-sm">
                                <i class="fa fa-eye"></i>
                                </button>
                            </a>';
                    }
                    else{
                        return '--';
                    }
                })
                ->rawColumns(['file','action'])
                ->make(true);

        }
    }
}
