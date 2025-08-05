<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spotlight;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\SpotlightRequest;

class SpotlightController extends Controller
{
    use ApiResponseTrait;

    private $data = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.spotlight.listing');
    }

    function listingAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = Spotlight::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.spotlight.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.spotlight.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.spotlight.delete',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
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

                        if($data->file && file_exists(storage_path().'/app/public/spotlights/'.$data->file))
                        {

                            $link = route('image.displayImage',['p'=>'spotlights/'.$data->file]);
    
                            $row =  '<a target="_blank" href="'.$link.'">
                                    <button title="View" type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                </a>';
                        }
                    }

                    return $row;
                })
                ->editColumn('created_at', function ($data) {
                    return display_date_time($data->created_at);
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
        return view('admin.spotlight.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['file'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "spotlight_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/spotlights',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpotlightRequest $request)
    {
        try{
            
            $data = $request->getData();

            $obj = new Spotlight;
            $obj->link_type     = $data['link_type'];
            $obj->title         = $data['title'];
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];

            if($data['link_type'] == 'file'){
                $obj->file      = $this->uploadFile($data);
            }

            if($data['link_type'] == 'url'){
                $obj->url      = $data['url'];
            }

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
     * @param  \App\Models\Spotlight  $spotlight
     * @return \Illuminate\Http\Response
     */
    public function show(Spotlight $viewObj)
    {
        $this->data['view'] = $viewObj;
        return view('admin.spotlight.view',$this->data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spotlight  $spotlight
     * @return \Illuminate\Http\Response
     */
    public function edit(Spotlight $editObj)
    {   
        $this->data['edit'] = $editObj;
        return view('admin.spotlight.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spotlight  $spotlight
     * @return \Illuminate\Http\Response
     */
    public function update(SpotlightRequest $request, Spotlight $editObj)
    {
        try{
            
            $data = $request->getData();

            $editObj->link_type     = $data['link_type'];
            $editObj->title         = $data['title'];
            $editObj->updated_by    = my_id();
            $editObj->status        = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/spotlights/$editObj->file");
                $editObj->file      = $this->uploadFile($data);
                $editObj->url = '';
            }

            if($data['link_type'] == 'url'){
                $editObj->url      = $data['url'];
                $editObj->file = '';

            }

            $editObj->save();

            if($editObj->id > 0){
                return $this->successResponse(UPDATE_REC_MSG);
            }else{
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
     * @param  \App\Models\Spotlight  $spotlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spotlight $deleteObj,Request $req)
    {
        try{

            $resp = $deleteObj->delete();

            if($resp)
            {  
                Storage::delete("public/spotlights/$deleteObj->file");
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.spotlight.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
