<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\OfficeOrder;

class OfficeOrderController extends Controller
{
    public function office_orders(Request $request)
    {
        $page                   = $request->get('page');
        $offset                 = ($page - 1) * RECORD_PER_PAGE;
        $this->data['page']     = $page??1;
        $this->data['offset']   = $offset;

        $this->data['data']     = OfficeOrder::where(['status'=>'active','record_type'=> 'office_order'])->orderBy('release_date','desc')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
            return view('web.pages.office-order.table',$this->data);
    	}

        return view('web.pages.office-order.listing',$this->data);
    }

    public function official_downloads(Request $request)
    {
        $page                   = $request->get('page');
        $offset                 = ($page - 1) * RECORD_PER_PAGE;
        $this->data['page']     = $page??1;
        $this->data['offset']   = $offset;

        $this->data['data']     = OfficeOrder::where(['status'=>'active','record_type'=> 'official_downloads'])->orderBy('release_date','desc')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
            return view('web.pages.official-downloads.table',$this->data);
    	}

        return view('web.pages.official-downloads.listing',$this->data);
    }

    function downloadOfficeOrder(OfficeOrder $obj){
        
        $path = storage_path().'/app/public/office-orders/'.$obj->file;

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
