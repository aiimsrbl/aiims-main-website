<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\EventRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\Event;

class EventController extends Controller
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
        return view('admin.event.listing');
    }

    function getEventAjax(Request $request)
    {    
        if($request->ajax()) {
            
            $data = Event::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.event.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.event.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.event.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    
                    if(isset($obj->galleries) && $obj->galleries->count())
                    {    
                        $actionBtn.='
                            <a href="'.route('admin.event.gallery.view',[$obj->id]).'">
                                <button title="View Gallery" type="button" class="btn btn-info btn-sm">
                                <i class="fa fa-photo"></i>
                                </button>
                            </a>';
                    }
                    else
                    {
                        $actionBtn.='
                            <a href="'.route('admin.event.gallery.add',[$obj->id]).'">
                                <button title="Add Gallery" type="button" class="btn btn-info btn-sm">
                                <i class="fa fa-plus"></i>
                                </button>
                            </a>';
                    }
                    

                    return $actionBtn;
                })
                ->addColumn('file',function($obj){

                    if($obj->image && file_exists(storage_path().'/app/public/events/'.$obj->image)){

                        $link = route('image.displayImage',['p'=>'events/'.$obj->image]);

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
                ->editColumn('event_date', function ($data) {
                    return display_date($data->event_date);
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
        return view('admin.event.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['image'];
        $ext    = $file->getClientOriginalExtension();
        $name   = "event_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/events',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        try
        {
            $data = $request->getData();

            $obj = new Event;
            $obj->title         = $data['title'];
            $obj->event_date    = get_date_db_format($data['event_date']);
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];
            $obj->image         = $this->uploadFile($data);
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
            return $this->failedResponse($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $viewObj)
    {
        $this->data['view']  = $viewObj;
        return view('admin.event.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $editObj)
    {   
        $this->data['edit']  = $editObj;
        return view('admin.event.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Event $editObj,EventRequest $request)
    {
        try{
            
            $data                  = $request->getData();
            $editObj->title        = $data['title'];
            $editObj->event_date   = get_date_db_format($data['event_date']);
            $editObj->updated_by   = my_id();
            $editObj->status       = $data['status'];

            if(isset($data['image']))
            {   
                Storage::delete("public/events/$editObj->image");
                $editObj->image  = $this->uploadFile($data);
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
    public function destroy(Event $deleteObj,Request $req)
    {
        try{

            $resp = $deleteObj->delete();

            if($resp)
            {
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.event.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    
}
