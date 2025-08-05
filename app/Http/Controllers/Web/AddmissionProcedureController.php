<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AdmissionProcedure;
use Response;
use Illuminate\Http\Request;

class AddmissionProcedureController extends Controller
{
    private $data = [];
    public function listing(Request $request)
    {
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;
        
        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;
        
        $this->data['data'] = AdmissionProcedure::where('status','active')->orderBy('id','desc')->paginate(RECORD_PER_PAGE);
        
        if($request->ajax())
    	{
            return view('web.pages.addmission.table',$this->data);
    	}

        return view('web.pages.addmission.listing',$this->data);

    }

    public function downloadFile(AdmissionProcedure $obj)
    {
        $path = storage_path().'/app/public/admission-procedure/'.$obj->file;

        if(file_exists($path))
        {
            return Response::download($path);
        }
        else
        {
            return redirect()->back();
        }
    }
}
