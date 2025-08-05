<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{   
    private $data = [];

    public function index(Request $request)
    {   
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;

        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;

        $this->data['data'] = Employee::where('status','active')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
    		return view('web.pages.employee.table',$this->data);
    	}

        return view('web.pages.employee.employee-list',$this->data);
    }
}
