<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tender;
use App\Models\Quotation;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Response;


class QuotationController extends Controller
{
    private $data = [];
    public function listing(Request $request, $type){
        
        $tenderExpiryDate = Carbon::now()->sub(TENDER_EXPIRY_DAYS,'day')->toDateString();

        $page                   = $request->get('page');
        $offset                 = ($page - 1) * RECORD_PER_PAGE;
        $this->data['page']     = $page??1;
        $this->data['offset']   = $offset;

        if($type == 'archived')
        {
            $this->data['data']     = Quotation::where('status','active')->where('end_date','<',$tenderExpiryDate)->orderBy('end_date','desc')->paginate(RECORD_PER_PAGE);
            $this->data['active']       = 'aq';
        }
        else
        {
            $this->data['data']     = Quotation::where('status','active')->where('end_date','>=',$tenderExpiryDate)->orderBy('start_date','desc')->paginate(RECORD_PER_PAGE);
            $this->data['active']       = 'cq';
        }

        if($request->ajax())
    	{
            return view('web.pages.quotations.table',$this->data);
    	}
        
        
        $this->data['type']         = $type;
        $this->data['left_data']    = Tender::procurementLeftMenuData();
        return view('web.pages.quotations.listing',$this->data);
    }
    
    public function downloadQuotation(Quotation $quotation)
    {   
        $path = storage_path().'/app/public/quotation/'.$quotation->file;

        if(file_exists($path))
        {
            return Response::download($path);
        }
    }
}
