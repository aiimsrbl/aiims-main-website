<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SpotlightRequest extends FormRequest
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
            'link_type'     => "required",
            'title'         => "required|min:2",
            'status'        => "required"
        ];

        $link_type = request()->get('link_type');

        if($link_type == 'url')
        {
           $rules['url'] = 'required'; 
        }
        else if($link_type == 'file')
        {
           $rules['file'] = "required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:".(12*1024); 
        }

        if(request()->editObj && $link_type == 'file')
        {   
            unset($rules['file']);
            
            if(empty(request()->editObj->file))
            {
               $rules['file'] = "required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:".(MAX_FILE_SIZE*1024);
            }
            else if(request()->file('file'))
            {
               $rules['file'] = "required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:".(MAX_FILE_SIZE*1024);
            }
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
        $data = $this->only(['title', 'link_type', 'url', 'file', 'status']);

        return $data;
    }
}
