<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdministrationRequest extends FormRequest
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
            'name'         => "required|min:2|max:150",
            'slug'         => "required|min:2|max:500",
            
            'designation'         => "required|min:2|max:150",
            
            
            'joining_date'    => "required",
            'status'        => "required",
            'file'          => "required|mimes:jpg,jpeg,png,webp|max:".(MAX_FILE_SIZE*1024)
        ];

        if(request()->nirf) //edit case
        {
            unset($rules['file']);
        }

        if(request()->file('file'))
        {
           $rules['file'] = "required|mimes:jpg,jpeg,png,webp|max:".(MAX_FILE_SIZE*1024);
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
        $data = $this->only(['name', 'speciality','designation' ,'phone','email'  , 'type','slug', 'joining_date', 'file', 'status']);

        return $data;
    }
}
