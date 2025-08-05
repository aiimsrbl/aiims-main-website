<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TelephoneDirectory;
use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\Admin\TelephoneDirectoryRequest;

class TelephoneDirectoryController extends Controller
{
    private $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.telephone-directory.listing');
    }

    function getListingAjax(Request $request){
        
        if($request->ajax()) {
            
            $data = TelephoneDirectory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($obj){
                    $actionBtn = 
                        '<a href="'.route('admin.tp_directory.edit',[$obj->id]).'">
                            <button title="Edit" type="button" class="btn btn-success btn-sm">
                            <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    ';
                    $actionBtn.='
                        <a href="'.route('admin.tp_directory.view',[$obj->id]).'">
                            <button title="View" type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                            </button>
                        </a>';
                    $actionBtn.='
                            <button title="Delete" type="button" class="btn btn-danger btn-sm" onclick="confirm_popup('."'".route('admin.tp_directory.destroy',[$obj->id])."'".')">
                            <i class="fa fa-trash"></i>
                            </button>
                    ';
                    return $actionBtn;
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
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
        return view('admin.telephone-directory.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TelephoneDirectoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TelephoneDirectoryRequest $request)
    {
        $data = $request->getData();
    
        $obj = new TelephoneDirectory;
        $obj->name          = $data['name'];
        $obj->phone_no      = $data['phone_no'];
        $obj->designation   = $data['designation'];
        $obj->created_by    = my_id();
        $obj->status        = $data['status'];
        $obj->save();

        if(isset($obj->id) && $obj->id > 0)
        {   
            $request->session()->flash('success_notify',ADD_REC_MSG);
            return redirect()->route('admin.tp_directory.listing');
        }
        else
        {
            $request->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TelephoneDirectory  $telephoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function show(TelephoneDirectory $telephoneDirectory)
    {
        $this->data['view'] = $telephoneDirectory;
        return view('admin.telephone-directory.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TelephoneDirectory  $telephoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function edit(TelephoneDirectory $telephoneDirectory)
    {
        $this->data['edit'] = $telephoneDirectory;
        return view('admin.telephone-directory.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TelephoneDirectoryRequest  $request
     * @param  \App\Models\TelephoneDirectory  $telephoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function update(TelephoneDirectoryRequest $request, TelephoneDirectory $telephoneDirectory)
    {
        $data = $request->getData();

        $telephoneDirectory->name          = $data['name'];
        $telephoneDirectory->phone_no      = $data['phone_no'];
        $telephoneDirectory->designation   = $data['designation'];
        $telephoneDirectory->updated_by    = my_id();
        $telephoneDirectory->status        = $data['status'];
        $telephoneDirectory->save();

        if(isset($telephoneDirectory->id) && $telephoneDirectory->id > 0)
        {   
            $request->session()->flash('success_notify',UPDATE_REC_MSG);
            return redirect()->route('admin.tp_directory.listing');
        }
        else
        {
            $request->session()->flash('error',SERVER_ERROR_MSG);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TelephoneDirectory  $telephoneDirectory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelephoneDirectory $telephoneDirectory,Request $req)
    {

        if($telephoneDirectory->delete())
        {
            $req->session()->flash('success_notify',DEL_REC_MSG);
        }
        else{
            $req->session()->flash('error',SERVER_ERROR_MSG);
        }

        return redirect()->route('admin.tp_directory.listing');
    }
}
