<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pac;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PACRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use DataTables;

class PACController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pac.listing');
    }

    function getPACsAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = Pac::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.pac.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.pac.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.pac.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('end_date', function ($data) {
                    return display_date($data->end_date);
                })
                ->addColumn('file',function($obj){

                    if($obj->file && file_exists(storage_path().'/app/public/pacs/'.$obj->file)){

                        $link = route('image.displayImage',['p'=>'pacs/'.$obj->file]);

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
                ->editColumn('start_date', function ($data) {
                    return display_date($data->start_date);
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
        return view('admin.pac.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "pac_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/pacs',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PACRequest $request)
    {
        try{
            $data = $request->getData();
    
            $obj = new Pac;
            $obj->category      = $data['category'];
            $obj->title         = $data['title'];
            $obj->start_date    = get_date_db_format($data['start_date']);
            $obj->end_date      = get_date_db_format($data['end_date']);
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
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function show(pac $pac)
    {
        $this->data['pac'] = $pac;
        return view('admin.pac.view',$this->data);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function edit(Pac $pac)
    {
        $this->data['pac'] = $pac;
        return view('admin.pac.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function update(PACRequest $request, Pac $pac)
    {
        try{
            $data                = $request->getData();
            $pac->category       = $data['category'];
            $pac->title          = $data['title'];
            $pac->start_date     = get_date_db_format($data['start_date']);
            $pac->end_date       = get_date_db_format($data['end_date']);
            $pac->updated_by     = my_id();
            $pac->status         = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/pacs/$pac->file");
                $pac->file  = $this->uploadFile($data);
            }

            $pac->save();

            if($pac->id > 0)
            {
                return $this->successResponse(UPDATE_REC_MSG);
            }
            else
            {
                return $this->failedResponse(SERVER_ERROR_MSG);
            }
        }
        catch(\Exception $e){
            return $this->failedResponse($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pac  $pac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pac $pac,Request $req)
    {
        try{

            $resp = $pac->delete();

            if($resp)
            {  
                $pac->updated_by = my_id();
                $pac->save();
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.pac.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
