<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\NewsRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;
use App\Models\News;

class NewsController extends Controller
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
        return view('admin.news.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.add');
    }

    private function uploadFile($reqData,$edit=false)
    {
        $file   = $reqData['file'];
        $title  = $reqData['title'];

        $ext    = $file->getClientOriginalExtension();
        $name   = "news_".md5(time()).".".$ext;
        $path   = $file->storeAs(
            'public/news',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        try
        {
            $data = $request->getData();
    
            $obj = new News;
            $obj->title         = $data['title'];
            $obj->release_date  = get_date_db_format($data['release_date']);
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
    public function show(News $news)
    {
        $this->data['news']  = $news;
        return view('admin.news.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {   
        $this->data['news']  = $news;
        return view('admin.news.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $news,NewsRequest $request)
    {
        try{

            $data                 = $request->getData();

            $news->title         = $data['title'];
            $news->release_date  = get_date_db_format($data['release_date']);
            $news->updated_by    = my_id();
            $news->status        = $data['status'];

            if(isset($data['file']))
            {   
                Storage::delete("public/news/$news->file");
                $news->file  = $this->uploadFile($data);
            }

            $news->save();

            if($news->id > 0)
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
    public function destroy(News $news,Request $req)
    {
        try{

            $resp = $news->delete();

            if($resp)
            {
                $req->session()->flash('success_notify',DEL_REC_MSG);
            }
            else
            {
                $req->session()->flash('error',SERVER_ERROR_MSG);
            }

            return redirect()->route('admin.news.listing');
        }
        catch(\Exception $e){
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    function getNewsAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = News::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.news.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.news.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.news.destroy',[$obj->id])."'".')">
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
