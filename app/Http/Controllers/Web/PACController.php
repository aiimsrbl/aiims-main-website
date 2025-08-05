<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Response;
use App\Models\Tender;
use App\Models\Pac;

class PACController extends Controller
{   
    private $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.pages.pac');
    }

    public function listing(Request $request, $type)
    {    
        $tenderExpiryDate = Carbon::now()->sub(TENDER_EXPIRY_DAYS,'day')->toDateString();

        $page                   = $request->get('page');
        $offset                 = ($page - 1) * RECORD_PER_PAGE;
        $this->data['page']     = $page??1;
        $this->data['offset']   = $offset;

        if($type == 'archived')
        {
            $this->data['data']     = Pac::where('status','active')->where('end_date','<',$tenderExpiryDate)->orderBy('end_date','desc')->paginate(RECORD_PER_PAGE);
        }
        else
        {
            $this->data['data']     = Pac::where('status','active')->where('end_date','>=',$tenderExpiryDate)->orderBy('start_date','desc')->paginate(RECORD_PER_PAGE);
        }

        if($request->ajax())
    	{
            return view('web.pages.pac.table',$this->data);
    	}
        
        $this->data['type']         = $type;
        $this->data['active']       = 'pac';
        $this->data['left_data']    = Tender::procurementLeftMenuData();
        return view('web.pages.pac.listing',$this->data);
    }
    
    public function downloadPac(Pac $pac)
    {   
        $path = storage_path().'/app/public/pacs/'.$pac->file;

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
