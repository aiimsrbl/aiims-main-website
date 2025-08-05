<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AnnualReportRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\AnnualReport;

class AnnualReportController extends Controller
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
        return view('admin.annual-report.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.annual-report.add');
    }

    private function uploadFile($reqData,$edit=false)
    {   
        try{
            $file   = $reqData['file'];
            $ext    = $file->getClientOriginalExtension();
            $name   = "annual_report_".md5(time()).".".$ext;
            $path   = $file->storeAs(
                'public/annual-report',$name
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
    public function store(AnnualReportRequest $request)
    {
        try
        {
            $data = $request->getData();    
            $obj = new AnnualReport;
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
    public function show(AnnualReport $viewObj)
    {
        $this->data['viewObj']  = $viewObj;
        return view('admin.annual-report.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AnnualReport $editObj)
    {   
        $this->data['editObj']  = $editObj;
        return view('admin.annual-report.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnualReport $editObj,AnnualReportRequest $request)
    {
        try{
            $data                   = $request->getData();
            $editObj->title         = $data['title'];
            $editObj->updated_by    = my_id();
            $editObj->status        = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/annual-report/$editObj->file");
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
    public function destroy(AnnualReport $deleteObj,Request $req)
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

            return redirect()->route('admin.annual.report.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    function getListAjax(Request $request){
        
        if($request->ajax()) {
            $data = AnnualReport::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.annual.report.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.annual.report.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.annual.report.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('file', function ($obj) {
                    if($obj->file && file_exists(storage_path().'/app/public/annual-report/'.$obj->file)){

                        $link = route('image.displayImage',['p'=>'annual-report/'.$obj->file]);

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
