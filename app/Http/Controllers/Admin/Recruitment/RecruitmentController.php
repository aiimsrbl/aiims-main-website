<?php

namespace App\Http\Controllers\Admin\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\RecruitmentOtherInfo;
use App\Http\Requests\Admin\RecruitmentRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DataTables;

class RecruitmentController extends Controller
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
        return view('admin.recruitment.listing',$this->data);
    }

    public function listingAjax(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Recruitment::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    
                    $actionBtn = '';
                    $actionBtn .= 
                        '<a href="'.route('admin.recruitment.edit',[$obj->id]).'">
                            <button title="Edit Recruitment" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                        ';

                    $actionBtn.='
                        <a href="'.route('admin.recruitment.view',[$obj->id]).'">
                            <button title="View Recruitment" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';

                    $actionBtn.='
                            <button title="Delete Recruitment" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.recruitment.delete',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';

                    $actionBtn.='
                        <a href="'.route('admin.recruitment.other_info.add',['id'=>$obj->id]).'">
                            <button  title="Add Other Info" type="button" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            </button>
                        </a>';
                    return $actionBtn;
                })
                ->addColumn('file',function($obj){

                    if($obj->file && file_exists(storage_path().'/app/public/recruitments/'.$obj->file)){

                        $link = route('image.displayImage',['p'=>'recruitments/'.$obj->file]);

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
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('start_date', function ($data) {
                    return display_date($data->start_date);
                })
                ->editColumn('end_date', function ($data) {
                    return display_date($data->end_date);
                })
                ->rawColumns(['file','action'])
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
        return view('admin.recruitment.add');
    }

    private function uploadFile($reqData,$edit=false){

        $file   = $reqData['file'];
        $ext    = $file->getClientOriginalExtension();
        $name   = "recruitment_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/recruitments',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RecruitmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentRequest $request)
    {
        try{
            $data = $request->getData();    
            $obj = new Recruitment;
            $obj->title         = $data['title'];
            $obj->reference_no  = $data['reference_no'];
            $obj->description   = $data['description'];
            $obj->start_date    = get_date_db_format($data['start_date']);
            $obj->end_date      = get_date_db_format($data['end_date']);
            $obj->link          = $data['link'];
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
     * @param  \App\Models\Recruitment  $viewObj
     * @return \Illuminate\Http\Response
     */
    public function show(Recruitment $viewObj)
    {
        $this->data['view'] = $viewObj;
        return view('admin.recruitment.view',$this->data);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recruitment  $objEdit
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruitment $editObj)
    {   
        $this->data['edit'] = $editObj;
        return view('admin.recruitment.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RecruitmentRequest  $request
     * @param  \App\Models\Recruitment  $editObj
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentRequest $request, Recruitment $editObj)
    {
        try{
            $data                       = $request->getData();
            $editObj->title             = $data['title'];
            $editObj->reference_no      = $data['reference_no'];
            $editObj->description       = $data['description'];
            $editObj->start_date        = get_date_db_format($data['start_date']);
            $editObj->end_date          = get_date_db_format($data['end_date']);
            $editObj->updated_by        = my_id();
            $editObj->status            = $data['status'];
            $editObj->link          = $data['link'];


            if(isset($data['file']))
            {   
                Storage::delete("public/recruitments/$editObj->file");
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
     * @param  \App\Models\Recruitment  $deleteObj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recruitment $deleteObj,Request $req)
    {
        try
        {
            $resp = $deleteObj->delete();

            if($resp)
            {   
                RecruitmentOtherInfo::where('recruitment_id','=',$deleteObj->id)->delete();

                $deleteObj->updated_by        = my_id();
                $deleteObj->save();

                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.recruitment.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
