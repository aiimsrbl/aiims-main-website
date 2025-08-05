<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\QuotationRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use DataTables;

class QuotationController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.quotation.listing');
    }

    function getQuotationAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = Quotation::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.quotation.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.quotation.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.quotation.destroy',[$obj->id])."'".')">
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
                ->editColumn('start_date', function ($data) {
                    return display_date($data->start_date);
             })->make(true);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quotation.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "quotation_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/quotation',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationRequest $request)
    {
        try{
            $data = $request->getData();
    
            $obj = new Quotation;
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
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        $this->data['quotation'] = $quotation;
        return view('admin.quotation.view',$this->data);  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        $this->data['quotation'] = $quotation;
        return view('admin.quotation.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationRequest $request, Quotation $quotation)
    {
        try{
            $data                   = $request->getData();
            $quotation->category       = $data['category'];
            $quotation->title          = $data['title'];
            $quotation->start_date     = get_date_db_format($data['start_date']);
            $quotation->end_date       = get_date_db_format($data['end_date']);
            $quotation->updated_by     = my_id();
            $quotation->status         = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/quotation/$quotation->file");
                $quotation->file  = $this->uploadFile($data);
            }

            $quotation->save();

            if($quotation->id > 0)
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
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation,Request $req)
    {
        try{

            $resp = $quotation->delete();

            if($resp)
            {  
                $quotation->updated_by = my_id();
                $quotation->save();
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.quotation.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }
}
