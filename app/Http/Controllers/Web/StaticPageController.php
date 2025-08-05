<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;





class StaticPageController extends Controller
{
    public function index(Request $req){
        
        $slug = $req->route('slug');
        $resp = Page::where(['slug'=>$slug,'status'=>'active'])->first();

        if(!$resp){
            abort(404);
        }

        return view('web.pages.static-page',['data'=>$resp]);
    }
}
