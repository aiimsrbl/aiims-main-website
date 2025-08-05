<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventGallery;
use App\Http\Requests\Admin\EventGalleryRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;



class EventGalleryController extends Controller
{
    use ApiResponseTrait;
    private $data = [];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event)
    {
        $this->data['events'] = Event::pluck('title','id');
        $this->data['event'] = $event;
        return view('admin.event.gallery.add',$this->data);
    }

    private function uploadImages()
    {
        try
        {
            $post = request()->all();

            $activityData = [];

            foreach ($post['temp'] as $index => $val)
            {   
                $arr = [];
                if(isset($post["image_$index"]))
                {
                    $file = $post["image_$index"];

                    $ext    = $file->getClientOriginalExtension();
                    $name   = "gallery_".md5(time()).$index.".".$ext;
                    $path   = $file->storeAs(
                        'public/events/gallery/',$name
                    );
                    $arr['image'] = $name;
                    
                    if(isset($post["title_$index"]))
                    {
                        $arr['title'] = $post["title_$index"];
                    }

                    $arr['event_id'] = $post["event"];

                }

                $activityData[] = $arr;
                
            }

            return $activityData;
        }
        catch(\Exception $e)
        {   
            throw new \Exception(SERVER_ERROR_MSGf);
        }
    }

    private function uploadSingleFile($file,$index)
    {
        $ext    = $file->getClientOriginalExtension();
        $name   = "gallery_".md5($index.time()).".".$ext;
        $path   = $file->storeAs(
            'public/events/gallery',$name
        );
        return $name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventGalleryRequest $request)
    {
        try
        {
            $data = $this->uploadImages();

            if($data)
            {
                EventGallery::insert($data);

                return $this->successResponse(ADD_REC_MSG,SUCCESS,['event_id' => request()->get('event')]);
            }
            else
            {
                return $this->failedResponse(SERVER_ERROR_MSG);
            }
        }
        catch(\Exception $e)
        {
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {   
        $this->data['view'] = $event;
        return view('admin.event.gallery.view',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {   
        //$eventIds = EventGallery::where('event_id','!=',$event->event_id)->pluck('event_id');

        $this->data['events'] = Event::pluck('title','id');
        $this->data['edit'] = $event;
        return view('admin.event.gallery.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventGalleryRequest $request ,  Event $event)
    {   
        try{
            $post       = request()->all();
            $event_id   = $post['event'];

            if($post['temp']){
                
                foreach($post['temp'] as $index =>  $galleryId){
                    
                    if($galleryId)
                    {
                        $obj = EventGallery::find($galleryId);  
                    }
                    else{
                        $obj = new EventGallery;  
                        $obj->event_id = $event_id;
                    }

                    if(isset($post["title_$index"])){
                        $obj->title = $post["title_$index"];
                    }

                    
                    if(isset($post["image_$index"])){
                        
                        $file = $post["image_$index"];

                        $img = $this->uploadSingleFile($file,$index);

                        if($img){

                            if($galleryId && $obj->image && file_exists(storage_path().'/app/public/events/gallery/'.$obj->image)){

                                Storage::delete("public/events/gallery/$obj->image");
                            }

                            $obj->image  = $img;
                        }
                    }
                    $obj->save(); 
                }
            }

            return $this->successResponse(UPDATE_REC_MSG,SUCCESS,['event_id' => $event_id]);
        }
        catch(\Exception $e)
        {
            return $this->failedResponse(SERVER_ERROR_MSG);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventGallery $obj)
    {
        try{

            $resp = $obj->delete();
            
            if($resp)
            {
                if($obj->image && file_exists(storage_path().'/app/public/events/gallery/'.$obj->image)){

                    Storage::delete("public/events/gallery/$obj->image");
                }
            }
        }
        catch(\Exception $e){
            
        }
    }
}
