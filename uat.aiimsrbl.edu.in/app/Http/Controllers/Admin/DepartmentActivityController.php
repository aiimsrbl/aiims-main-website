<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Department;
use App\Models\DepartmentActivity;
use App\Models\DepartmentActivityImage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DepartmentActivityRequest;
use DataTables;
use Illuminate\Support\Facades\Storage;
use App\Traits\ApiResponseTrait;

class DepartmentActivityController extends Controller
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
        return view('admin.departments.activity.listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $deptIds = DepartmentActivity::pluck('department_id');

        $this->data['department'] = Department::whereNotIn('id',$deptIds)->pluck('name','id');

        $this->data['sDeptId'] = $request->get('dept');

        return view('admin.departments.activity.add',$this->data);
    }

    public function edit(DepartmentActivity $editObj)
    {
        $deptIds = DepartmentActivity::where('department_id','!=',$editObj->department_id)->pluck('department_id');
        $this->data['department'] = Department::whereNotIn('id',$deptIds)->pluck('name','id');

        $this->data['edit']         = $editObj;
        return view('admin.departments.activity.edit',$this->data);
    }

    public function storeActivityImageData($objDepartmentActivity,$data)
    {
        $objDepartmentActivity->images()->saveMany($data);
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
                    $name   = "activity_".md5(time()).$index.".".$ext;
                    $path   = $file->storeAs(
                        'public/department/activity/',$name
                    );
                    $arr['image'] = $name;
                    
                    if(isset($post["title_$index"]))
                    {
                        $arr['title'] = $post["title_$index"];
                    }
                }

                if($arr){
                    $activityData[] = new DepartmentActivityImage($arr);
                }
            }

            return $activityData;
        }
        catch(\Exception $e)
        {   
            throw new \Exception(SERVER_ERROR_MSGf);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentActivityRequest $request)
    {   
        try
        {
            $post = request()->all();


            $obj = new DepartmentActivity;
            $obj->created_by    = my_id();
            $obj->status        = $post['status'];
            $obj->content       = $post['content'];    
            $obj->department_id = $post['department']; 
            $obj->save();
            
            if($obj->id > 0)
            {   
                $imageData = $this->uploadImages();

                if($imageData)
                {
                    $this->storeActivityImageData($obj,$imageData);
                }

                return $this->successResponse(ADD_REC_MSG,SUCCESS,['id'=>$obj->department_id]);
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
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Department $viewObj)
    {   
        if(!$viewObj->activity){
           return redirect()->route('admin.department.activity.add',['dept'=>$viewObj->id]);
        }
        else
        {
            $this->data['view'] = $viewObj->activity;
            return view('admin.departments.activity.view',$this->data);
        }

    }

    private function deleteExistingImage($editObj){
        
        $images = $editObj->images;

        $post  = request()->all();

        $prevImgArr  = $prevImgArr1 = $changedImage = [];
        $prevImgArr1 = [];
        
        foreach($post['temp'] as $index => $obj)
        {   
            if(isset($post["image_$index"])){
                $prevImgArr[] = $post["image_$index"];
            }

            if(isset($post["file_$index"])){
                $prevImgArr1[] = $post["file_$index"];
            }
        }

        $edit_elids = $post['edit_elid'];

        if($edit_elids){
            $changedImage = explode(',',$edit_elids);
        }

        foreach($images as $obj)
        {   
            if(in_array($obj->image,$prevImgArr))
            {
                if($obj->image && file_exists(storage_path().'/app/public/department/activity/'.$obj->image))
                {
                    Storage::delete("public/department/activity/$obj->image");
                }

                $obj->delete();
            }
            else if(!in_array($obj->image,$prevImgArr1))
            {
                if($obj->image && file_exists(storage_path().'/app/public/department/activity/'.$obj->image))
                {
                    Storage::delete("public/department/activity/$obj->image");
                }

                $obj->delete();
            }
            else if(in_array($obj->id,$changedImage))
            {
                if($obj->image && file_exists(storage_path().'/app/public/department/activity/'.$obj->image))
                {
                    Storage::delete("public/department/activity/$obj->image");
                }

                $obj->delete();
            }
        }
    }

    public function updateActivityTitleOnly(){
        
        $data = request()->get('title_id');
        
        if($data)
        {   
            $arr = [];

            foreach($data as $id => $value)
            {
                $obj =  DepartmentActivityImage::find($id);
                
                if($obj)
                {
                    $obj->title = $value;
                    $obj->save();
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentActivityRequest $request, DepartmentActivity $editObj)
    {
        try
        {
            $post = request()->all();

            $this->deleteExistingImage($editObj);

            $editObj->updated_by    = my_id();
            $editObj->status        = $post['status'];
            $editObj->content       = $post['content'];    
            $editObj->department_id = $post['department']; 
            $editObj->save();
            
            if($editObj->id > 0)
            {   
                $imageData = $this->uploadImages();

                $this->updateActivityTitleOnly();
                
                if($imageData)
                {
                    $this->storeActivityImageData($editObj,$imageData);
                }

                return $this->successResponse(UPDATE_REC_MSG,SUCCESS,['id'=>$editObj->department_id]);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
