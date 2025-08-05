<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HospitalStatistics;
use App\Models\Contactus_inquiry;

class DashboardController extends Controller
{
    private $data = [];
    public function index()
    {
        $this->data['hospital_statistics'] = HospitalStatistics::orderBy("id", "DESC")->first();

        $this->data['contactus_inquiry'] = Contactus_inquiry::latest()->take(5)->get();
        
        return view('admin.dashboard',$this->data);
    }
}
