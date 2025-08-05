<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\OfficeOrderRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\OfficeOrder;

class OfficeOrderController  extends Controller
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
        return view('admin.office-orders.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.office-orders.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "order_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/office-orders',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeOrderRequest $request)
    {
        try
        {
            $data = $request->getData();
    
            $obj                = new OfficeOrder;
            $obj->title         = $data['title'];
            $obj->record_type   = $data['record_type'];
            $obj->link_type     = $data['link_type'];
            $obj->release_date  = get_date_db_format($data['release_date']);
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];

            if($data['link_type'] == 'file')
            {
                $obj->file      = $this->uploadFile($data);
            }

            if($data['link_type'] == 'url')
            {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeOrder $officeOrder)
    {
        $this->data['show_data']  = $officeOrder;
        return view('admin.office-orders.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeOrder $officeOrder)
    {  
        $this->data['edit']  = $officeOrder;
        return view('admin.office-orders.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeOrder $officeOrder,OfficeOrderRequest $request)
    {
        try
        {
            $data                           = $request->getData();
            $officeOrder->title             = $data['title'];
            $officeOrder->release_date      = get_date_db_format($data['release_date']);
            $officeOrder->updated_by        = my_id();
            $officeOrder->status            = $data['status'];
            $officeOrder->link_type         = $data['link_type'];
            $officeOrder->record_type       = $data['record_type'];

            if(isset($data['file']))
            {   
                Storage::delete("public/office-orders/$officeOrder->file");
                $officeOrder->file  = $this->uploadFile($data);
                $officeOrder->url = '';
            }

            if($data['link_type'] == 'url')
            {
                if($officeOrder->file && file_exists(storage_path().'/app/public/office-orders/'.$officeOrder->file))
                {
                    Storage::delete("public/office-orders/$officeOrder->file");
                }

                $officeOrder->url = $data['url'];
                $officeOrder->file = '';
            }

            $officeOrder->save();

            if($officeOrder->id > 0)
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
    public function destroy(OfficeOrder $officeOrder,Request $req)
    {
        try{

            $resp = $officeOrder->delete();

            if($resp)
            {
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.office_order.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    function getListAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = OfficeOrder::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.office_order.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.office_order.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.office_order.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('record_type', function ($data) {
                    return ucwords(str_replace('_',' ',$data->record_type));
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

                        if($data->file && file_exists(storage_path().'/app/public/office-orders/'.$data->file))
                        {

                            $link = route('image.displayImage',['p'=>'office-orders/'.$data->file]);
    
                            $row =  '<a target="_blank" href="'.$link.'">
                                    <button title="View" type="button" class="btn btn-default btn-sm">
                                    <i class="fa fa-eye"></i>
                                    </button>
                                </a>';
                        }
                    }

                    return $row;
                })
                ->editColumn('release_date', function ($data) {
                    return display_date($data->release_date);
                })
                ->rawColumns(['link_type','action'])
                ->make(true);

        }
    }
}
