<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use App\Models\Corrigendum;
use App\Http\Requests\Admin\TenderRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DataTables;


class TenderController extends Controller
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
        $this->data['corrigendum'] = Corrigendum::with('tender')->orderBy('id','desc')->get();
        $this->data['tab'] = request()->get('tab');
        $this->data['tenders'] = Tender::orderBy('id','desc')->get();
        return view('admin.tender.listing',$this->data);
    }

    public function getTender(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Tender::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    
                    $actionBtn = '';
                    $actionBtn .= 
                        '<a href="'.route('admin.tender.edit',[$obj->id]).'">
                            <button title="Edit Tender" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                        ';

                    $actionBtn.='
                        <a href="'.route('admin.tender.view',[$obj->id]).'">
                            <button title="View Tender" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';

                    $actionBtn.='
                            <button title="Delete Tender" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.tender.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';

                    $actionBtn.='
                        <a href="'.route('admin.corrigendum.create',[$obj->id]).'">
                            <button  title="Add Corrigendum" type="button" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i>
                            </button>
                        </a>';
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
        return view('admin.tender.add');
    }

    private function uploadFile($reqData,$edit=false){

        $file   = $reqData['file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "tender_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/tenders',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TenderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TenderRequest $request)
    {
        try{
            $data = $request->getData();
    
            $obj = new Tender;
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
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show(Tender $tender)
    {
        $this->data['tender'] = $tender;
        return view('admin.tender.view',$this->data);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function edit(Tender $tender)
    {   
        $this->data['tender'] = $tender;
        return view('admin.tender.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TenderRequest  $request
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function update(TenderRequest $request, Tender $tender)
    {
        try{
            $data                   = $request->getData();
            $tender->category       = $data['category'];
            $tender->title          = $data['title'];
            $tender->start_date     = get_date_db_format($data['start_date']);
            $tender->end_date       = get_date_db_format($data['end_date']);
            $tender->updated_by     = my_id();
            $tender->status         = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/tenders/$tender->file");
                $tender->file  = $this->uploadFile($data);
            }

            $tender->save();

            if($tender->id > 0)
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
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tender $tender,Request $req)
    {
        try{

            $resp = $tender->delete();

            if($resp)
            {   
                Corrigendum::where('tender_id',$tender->id)->delete();

                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.tender.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
