<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use App\Models\News;

class NewsController extends Controller
{   
    private $data = [];

    public function index(Request $request)
    {   
        $page   = $request->get('page');
        $offset = ($page - 1) * RECORD_PER_PAGE;

        $this->data['page'] = $page??1;
        $this->data['offset'] = $offset;

        $this->data['data'] = News::where('status','active')->orderBy('release_date','desc')->paginate(RECORD_PER_PAGE);

        if($request->ajax())
    	{
    		return view('web.pages.news-circulars.table',$this->data);
    	}

        return view('web.pages.news-circulars.listing',$this->data);
    }

    public function downloadNews(News $news)
    {
        $path = storage_path().'/app/public/news/'.$news->file;

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
