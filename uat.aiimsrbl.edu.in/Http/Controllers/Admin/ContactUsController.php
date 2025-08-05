<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Contactus_inquiry;

class ContactUsController extends Controller
{
    public function index(){    
        return view('admin.contacts-inquiries');
    }
    public function inquiriesAjax(Request $request){
        if ($request->ajax()) {
            
            $data = Contactus_inquiry::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at',function($row){
                    return display_date_time($row->created_at);
                })
                ->make(true);
        }
    }
}
