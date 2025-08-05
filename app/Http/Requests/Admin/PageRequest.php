<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title'         => "required|min:2|max:500",
            'slug'=> "required|min:2|max:1000",
            'status'        => "required",
            'file'          => "required|mimes:jpg,jpeg,png,webp|max:".(MAX_FILE_SIZE*1024)
        ];

        if(request()->page) //edit case
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
        $data = $this->only(['title','slug', 'description', 'file', 'status']);

        return $data;
    }
}
