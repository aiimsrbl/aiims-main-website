<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\EventRequest;
use App\Http\Requests\Admin\WorkshopRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\Event;
use App\Models\Workshop;



class WorkshopController extends Controller
{
    use ApiResponseTrait;
    private $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->ajax()) {
            
            $data = Workshop::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.event.workshop.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.event.workshop.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.event.workshop.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->addColumn('image',function($obj){

                    if($obj->image && file_exists(storage_path().'/app/public/workshops/'.$obj->image))
                    {
                        $link = route('image.displayImage',['p'=>'workshops/'.$obj->image]);

                        return '<a target="_blank" href="'.$link.'">
                                <img src="'.$link.'">
                            </a>';
                    }
                    else
                    {
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
                ->rawColumns(['image','action'])
                ->make(true);

        }
        return view('admin.workshop.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workshop.add');
    }

    private function uploadFile($file)
    {
        $ext    = $file->getClientOriginalExtension();
        $name   = "file_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/workshops',$name
        );
        return $name;
    }

    private function uploadImage($file)
    {
        $ext    = $file->getClientOriginalExtension();
        $name   = "image_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/workshops',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkshopRequest $request)
    {
        try
        {
            $data               = $request->getData();
            $obj                = new Workshop;
            $obj->title         = $data['title'];
            $obj->slug         = slug_url($data['title']);
            $obj->description   = $data['description'];
            $obj->start_date    = get_date_db_format($data['start_date']);
            $obj->end_date      = get_date_db_format($data['end_date']);
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];

            if(isset($data['image']))
            {
                $obj->image  = $this->uploadImage($data['image']);
            }

            if(isset($data['file']))
            {
                $obj->file  = $this->uploadFile($data['file']);
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
            return $this->failedResponse($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $viewObj)
    {
        $this->data['view']  = $viewObj;
        return view('admin.workshop.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop $editObj)
    {   
        $this->data['edit']  = $editObj;
        return view('admin.workshop.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Workshop $editObj,WorkshopRequest $request)
    {
        try{
            $data               = $request->getData();
            $obj                = $editObj;
            $obj->title         = $data['title'];
            $obj->slug          = slug_url($data['title']);
            $obj->description   = $data['description'];
            $obj->start_date    = get_date_db_format($data['start_date']);
            $obj->end_date      = get_date_db_format($data['end_date']);
            $obj->updated_by    = my_id();
            $obj->status        = $data['status'];

            
            if(isset($data['image']))
            {
                
                if($obj->image && file_exists(storage_path().'/app/public/workshops/'.$obj->image))
                {
                    Storage::delete("public/workshops/$editObj->image");
                }

                $obj->image  = $this->uploadImage($data['image']);
            }
            
            if(isset($data['file']))
            {
                
                if($obj->file && file_exists(storage_path().'/app/public/workshops/'.$obj->file))
                {
                    Storage::delete("public/workshops/$editObj->file");
                }

                $obj->file  = $this->uploadFile($data['file']);
            }

            $obj->save();

            if($obj->id > 0)
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
    public function destroy(Workshop $deleteObj,Request $req)
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

            return redirect()->route('admin.event.workshop.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }   
}
