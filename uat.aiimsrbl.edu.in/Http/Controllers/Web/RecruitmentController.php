<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\RecruitmentOtherInfo;
use Response;

class RecruitmentController extends Controller
{   
    private $data = [];

    public function index(Request $request)
    {   
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;

        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;

        $this->data['data'] = Recruitment::with('OtherInfo')->where('status','active')->orderBy('start_date','desc')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
    		return view('web.pages.recruitments.table',$this->data);
    	}

        return view('web.pages.recruitments.listing',$this->data);
    }

    public function downloadOtherInfo(RecruitmentOtherInfo $obj)
    {   
        $path = storage_path().'/app/public/recruitments/other-info/'.$obj->file;

        if(file_exists($path))
        {
            return Response::download($path);
        }
        else{
            return redirect()->back();
        }
    }

    public function download(Recruitment $obj)
    {   
        $path = storage_path().'/app/public/recruitments/'.$obj->file;

        if(file_exists($path))
        {
            return Response::download($path);
        }
        else{
            return redirect()->back();
        }
    }
}
