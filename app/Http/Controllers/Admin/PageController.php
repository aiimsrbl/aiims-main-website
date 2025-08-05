<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\PageRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\Page;

class PageController extends Controller
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
        return view('admin.page.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['file'];
        $title  = $reqData['title'];
        $description  = $reqData['description'];
        $slug  = $reqData['slug'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "news_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/page',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        try
        {
            $data = $request->getData();
    
            $obj = new Page;
            $obj->title         = $data['title'];
            $obj->slug          = $data['slug'];
            $obj->description   = $data['description'];
            
           
            $obj->created_by    = my_id();
            $obj->status        = $data['status'];
            $obj->file          = $this->uploadFile($data);
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
    public function show(Page $page)
    {
        $this->data['page']  = $page;
        return view('admin.page.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {   
        $this->data['page']  = $page;
        return view('admin.page.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Page $page,PageRequest $request)
    {
        try{

            $data                 = $request->getData();

            $page->title         = $data['title'];
            $page->description   = $data['description'];
            $page->slug          = $data['slug'];
            $page->updated_by    = my_id();
            $page->status        = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/page/$page->file");
                $page->file  = $this->uploadFile($data);
            }

            $page->save();

            if($page->id > 0)
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
    public function destroy(Page $page,Request $req)
    {
        try{

            $resp = $page->delete();

            if($resp)
            {
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.page.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    function getPageAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = Page::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.page.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.page.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.page.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('release_date', function ($data) {
                    return display_date($data->release_date);
                })
                ->make(true);

        }
    }
}
