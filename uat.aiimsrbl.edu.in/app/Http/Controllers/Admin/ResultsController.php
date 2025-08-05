<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Results;
use App\Http\Requests\Admin\ResultsRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DataTables;


class ResultsController extends Controller
{   
    private $data = [];
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $this->data['results'] = Results::orderBy('id','desc')->get();
        return view('admin.result.listing',$this->data);
        
    }
     
 public function getResult(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Results::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    
                    $actionBtn = '';
                    $actionBtn .= 
                        '<a href="'.route('admin.result.edit',[$obj->id]).'">
                            <button title="Edit Results" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                        ';

                    $actionBtn.='
                        <a href="'.route('admin.result.view',[$obj->id]).'">
                            <button title="View Results" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';

                    $actionBtn.='
                            <button title="Delete Results" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.result.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';

                   
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('start_date', function ($data) {
                    return display_date($data->start_date);
                })
                ->editColumn('end_date', function ($data) {
                    return display_date($data->end_date);
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
        return view('admin.result.add');
    }

    private function uploadFile($reqData,$edit=false){

        $file   = $reqData['file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "exam_result_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/results',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ResultRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultsRequest $request)
    {
        try{
            $data = $request->getData();
    
            $obj = new Results;
            $obj->category      = $data['category'];
            $obj->title         = $data['title'];
            
            $obj->publish_date      = get_date_db_format($data['publish_date']);
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];
            $obj->file          = $this->uploadFile($data);
            $obj->save();

            if($obj->id > 0){
                return $this->successResponse(ADD_REC_MSG);
            }else{
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
     * @param  \App\Models\Results  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Results $result)
    {
        $this->data['result'] = $result;
        return view('admin.result.view',$this->data);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Results  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Results $result)
    {   
        $this->data['result'] = $result;
        return view('admin.result.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ResultsRequest  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(ResultsRequest $request, Result $result)
    {
        try{
            $data                   = $request->getData();
            $result->category       = $data['category'];
            $result->title          = $data['title'];
            $result->publish_date     = get_date_db_format($data['publish_date']);
           
            $result->updated_by     = my_id();
            $result->status         = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/results/$result->file");
                $result->file  = $this->uploadFile($data);
            }

            $result->save();

            if($result->id > 0)
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
     * @param  \App\Models\Results  $result
     * @return \Illuminate\Http\Response
     */
    
    
    public function destroy(Results $result,Request $req)
    {
        try{

            $resp = $result->delete();

            if($resp)
            {   
                Results::where('result_id',$result->id)->delete();

                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.result.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
    
}
