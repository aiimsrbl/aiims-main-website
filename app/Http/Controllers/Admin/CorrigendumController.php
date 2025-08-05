<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\Corrigendum;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\Admin\CorrigendumRequest;
use Illuminate\Support\Facades\Storage;
use DataTables;

class CorrigendumController extends Controller
{   
    use ApiResponseTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tender $tender)
    {
        $this->data['tender'] = $tender;
        return view('admin.tender.corrigendum.add',$this->data);
    }

    public function getCoggigendum(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Corrigendum::with('tender')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){

                    $actionBtn = 
                        '<a href="'.route('admin.corrigendum.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';

                    $actionBtn.='
                        <a href="'.route('admin.corrigendum.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';

                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.corrigendum.destroy',[$obj->id])."'".')">
                                <i class="fa fa-trash"></i>
                            </button>';

                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->escapeColumns('status')
                ->editColumn('release_date', function ($data) {
                    return display_date($data->release_date);
             })->make(true);

        }
    }

    private function uploadFile($reqData,$edit=false){

        $file   = $reqData['refrence_file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "corrigendum_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/tenders/corrigendum',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CorrigendumRequest $request,Tender $tender)
    {
        try{
            $data = $request->getData();
            $obj                = new Corrigendum;
            $obj->tender_id     = $tender->id;
            $obj->title         = $data['title'];
            $obj->release_date  = get_date_db_format($data['release_date']);
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];
            $obj->refrence_file = $this->uploadFile($data);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Corrigendum $corrigendum)
    {

        $this->data['corrigendum'] = $corrigendum;
        return view('admin.tender.corrigendum.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Corrigendum $corrigendum)
    {
        $this->data['corrigendum'] = $corrigendum;
        return view('admin.tender.corrigendum.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Corrigendum $corrigendum,CorrigendumRequest $request)
    {
        try{

            $data                       = $request->getData();
            $corrigendum->title         = $data['title'];
            $corrigendum->release_date  = get_date_db_format($data['release_date']);
            $corrigendum->updated_by    = my_id();
            $corrigendum->status        = $data['status'];

            if(isset($data['refrence_file']))
            {   
                Storage::delete("public/tenders/corrigendum/$corrigendum->refrence_file");
                $corrigendum->refrence_file  = $this->uploadFile($data);
            }

            $corrigendum->save();

            if($corrigendum->id > 0)
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
    public function destroy(Corrigendum $corrigendum,Request $req)
    {
        try{

            $resp = $corrigendum->delete();

            if($resp)
            {
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.tender.listing',['tab'=>'c']);
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
