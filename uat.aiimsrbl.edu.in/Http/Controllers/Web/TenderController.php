<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\Corrigendum;
use Response;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class TenderController extends Controller
{   
    public function getTenders(Request $request,$type)
    {
        $tenderExpiryDate = Carbon::now()->sub(TENDER_EXPIRY_DAYS,'day')->toDateString();

        $page                   = $request->get('page');
        $offset                 = ($page - 1) * RECORD_PER_PAGE;
        $this->data['page']     = $page??1;
        $this->data['offset']   = $offset;

        if($type == 'archived'){
            $this->data['data']     = Tender::with('corrigendum')->where('status','active')->where('end_date','<',$tenderExpiryDate)->orderBy('end_date','desc')->paginate(RECORD_PER_PAGE);
            $this->data['active']       = 'at';
        }
        else
        {
            $this->data['data']     = Tender::with('corrigendum')->where('status','active')->orderBy('start_date','desc')->where('end_date','>=',$tenderExpiryDate)->paginate(RECORD_PER_PAGE);
            $this->data['active']       = 'ct';
        }

        if($request->ajax())
    	{
            return view('web.pages.tenders.table',$this->data);
    	}

        $this->data['type'] = $type;
        $this->data['left_data'] = Tender::procurementLeftMenuData();
        
        return view('web.pages.tenders.listing',$this->data);
    }

    public function downloadTender(Tender $tender)
    {
        $path = storage_path().'/app/public/tenders/'.$tender->file;

        if(file_exists($path))
        {
            return Response::download($path);
        }
    }

    public function downloadCorrigendum(Corrigendum $corrigendum){

        $path = storage_path().'/app/public/tenders/corrigendum/'.$corrigendum->refrence_file;

        if(file_exists($path))
        {
            return Response::download($path);
        }
    }  
}
