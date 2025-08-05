<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WorkshopRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title'   => "required|min:2|max:500|unique:workshops",
            'start_date'    => "required",
            'end_date'    => "required",
            'status'        => "required",
            'image'          => "mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024),
            'file'          => "mimes:pdf,gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024)
        ];

        if(request()->editObj) //edit case
        {   
            $id = request()->editObj->id; 
            unset($rules['image']);
            unset($rules['file']);
            $rules['title'] = "required|unique:workshops,title,{$id},id,deleted_at,NULL";
        }

        if(request()->file('image'))
        {
           $rules['image'] = "mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024);
        }

        if(request()->file('file'))
        {
           $rules['file'] = "mimes:pdf,gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024);
        }


        return $rules;
    }

    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['title', 'start_date','end_date','description', 'image','file', 'status']);

        return $data;
    }
}
