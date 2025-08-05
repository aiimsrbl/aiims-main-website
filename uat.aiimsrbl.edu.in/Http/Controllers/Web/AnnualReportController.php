<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AnnualReport;
use Response;
use Illuminate\Http\Request;

class AnnualReportController extends Controller
{
    private $data = [];
    public function listing(Request $request)
    {
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;
        
        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;
        
        $this->data['data'] = AnnualReport::where('status','active')->orderBy('id','desc')->paginate(RECORD_PER_PAGE);
        
        if($request->ajax())
    	{
            return view('web.pages.annual-report.table',$this->data);
    	}

        return view('web.pages.annual-report.listing',$this->data);

    }

    public function downloadFile(AnnualReport $obj)
    {
        $path = storage_path().'/app/public/annual-report/'.$obj->file;

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
