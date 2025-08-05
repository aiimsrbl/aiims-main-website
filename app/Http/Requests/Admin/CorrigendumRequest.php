<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CorrigendumRequest extends FormRequest
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
            'title'         => "required|min:2",
            'release_date'  => "required",
            'status'        => "required",
            'refrence_file' => "required|mimes:pdf,jpg,jpeg,png|max:".(MAX_FILE_SIZE*1024)
        ];

        if(request()->corrigendum) //edit case
        {
            unset($rules['refrence_file']);
        }

        if(request()->file('refrence_file'))
        {
           $rules['refrence_file'] = "required|mimes:pdf,jpg,jpeg,png|max:".(MAX_FILE_SIZE*1024);
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
        $data = $this->only(['title', 'release_date', 'refrence_file', 'status']);

        return $data;
    }
}
