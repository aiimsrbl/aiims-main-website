<?php

namespace App\Http\Controllers\Admin\Recruitment;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use App\Models\RecruitmentOtherInfo;
use App\Http\Requests\Admin\RecruitmentOtherInfoRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DataTables;

class OtherInfoController extends Controller
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
        return view('admin.recruitment.other-info.listing',$this->data);
    }

    public function listingAjax(Request $request)
    {
        if ($request->ajax()) {
            
            $data = RecruitmentOtherInfo::with('recruitment')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    
                    $actionBtn = '';
                    $actionBtn .= 
                        '<a href="'.route('admin.recruitment.other_info.edit',[$obj->id]).'">
                            <button title="Edit Recruitment" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                        ';

                    $actionBtn.='
                        <a href="'.route('admin.recruitment.other_info.view',[$obj->id]).'">
                            <button title="View Recruitment" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';

                    $actionBtn.='
                            <button title="Delete Recruitment" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.recruitment.other_info.delete',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('link_type', function ($data) {
                    $row = '--';

                    if($data->link_type == 'url'){
                        $row =  '<a target="_blank" href="'.$data->url.'">
                                    <button title="Click View" type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                </a>';
                    }
                    else if($data->link_type == 'file'){

                        if($data->file && file_exists(storage_path().'/app/public/recruitments/other-info/'.$data->file))
                        {

                            $link = route('image.displayImage',['p'=>'recruitments/other-info/'.$data->file]);
    
                            $row =  '<a target="_blank" href="'.$link.'">
                                    <button title="View" type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                </a>';
                        }
                    }

                    return $row;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('release_date', function ($data) {
                    return display_date($data->release_date);
                })
                ->rawColumns(['link_type','action'])
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
        $this->data['recruitments'] = Recruitment::pluck('title','id');

        $recruitment_id = request()->get('id');

        if(!$recruitment_id){

            request()->session()->flash('error_notify','Recruitment is required');
            return redirect()->route('admin.recruitment.listing');
        }

        $obj = Recruitment::find($recruitment_id);

        if(!$obj){

            request()->session()->flash('error_notify','Valid recruitment is required');
            return redirect()->route('admin.recruitment.listing');
        }
        
        $this->data['recruitment_id'] = request()->get('id');
        return view('admin.recruitment.other-info.add',$this->data);
    }

    private function uploadFile($reqData)
    {
        $file   = $reqData['file'];
        $ext    = $file->getClientOriginalExtension();
        $name   = "other_info_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/recruitments/other-info',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\RecruitmentOtherInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecruitmentOtherInfoRequest $request)
    {
        try{
            $data = $request->getData();
            $obj                    = new RecruitmentOtherInfo;
            $obj->recruitment_id    = $data['recruitment'];
            $obj->link_type         = $data['link_type'];
            $obj->title         = $data['title'];
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];
            $obj->release_date  = get_date_db_format($data['release_date']);

            
            if($data['link_type'] == 'file'){
                $obj->file      = $this->uploadFile($data);
            }

            if($data['link_type'] == 'url'){
                $obj->url      = $data['url'];
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
        catch(\Exception $e)
        {
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recruitment  $viewObj
     * @return \Illuminate\Http\Response
     */
    public function show(RecruitmentOtherInfo $viewObj)
    {
        $this->data['view'] = $viewObj;
        return view('admin.recruitment.other-info.view',$this->data);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecruitmentOtherInfo  $objEdit
     * @return \Illuminate\Http\Response
     */
    public function edit(RecruitmentOtherInfo $editObj)
    {   
        $this->data['edit'] = $editObj;
        $this->data['recruitments'] = Recruitment::pluck('title','id');
        return view('admin.recruitment.other-info.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RecruitmentOtherInfoRequest  $request
     * @param  \App\Models\RecruitmentOtherInfo  $editObj
     * @return \Illuminate\Http\Response
     */
    public function update(RecruitmentOtherInfoRequest $request, RecruitmentOtherInfo $editObj)
    {
        try{

            $data = $request->getData();

            $editObj->recruitment_id    = $data['recruitment'];
            $editObj->link_type         = $data['link_type'];
            $editObj->title             = $data['title'];
            $editObj->updated_by        = my_id();
            $editObj->status            = $data['status'];
            $editObj->release_date      = get_date_db_format($data['release_date']);

            if(isset($data['file']))
            {
                Storage::delete("public/recruitments/other-info/$editObj->file");
                $editObj->file     = $this->uploadFile($data);
                $editObj->url      = '';
            }

            if($data['link_type'] == 'none')
            {
                $editObj->url   = '';
                $editObj->file  = '';
            }

            if($data['link_type'] == 'url')
            {   
                if($editObj->file && file_exists(storage_path().'/app/public/recruitments/other-info/'.$editObj->file))
                {
                    Storage::delete("public/recruitments/other-info/$editObj->file");
                }

                $editObj->url      = $data['url'];
                $editObj->file     = '';
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
     * @param  \App\Models\RecruitmentOtherInfo  $deleteObj
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecruitmentOtherInfo $deleteObj,Request $req)
    {
        try{

            $resp = $deleteObj->delete();

            if($resp)
            {   
                $deleteObj->updated_by        = my_id();
                $deleteObj->save();

                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.recruitment.other_info.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
