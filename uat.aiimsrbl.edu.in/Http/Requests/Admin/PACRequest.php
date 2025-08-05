<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PACRequest extends FormRequest
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
            'category'      => "required|min:2",
            'title'         => "required|min:2",
            'discription'         => "required|min:2",
            'start_date'    => "required",
            'end_date'      => "required",
           
            'status'        => "required",
            'file'          => "required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:".(MAX_FILE_SIZE*1024)
        ];

        if(request()->pac) //edit case
        {
            unset($rules['file']);
        }

        if(request()->file('file'))
        {
           $rules['file'] = "required|mimes:doc,docx,xlsx,pdf,jpg,jpeg,png|max:".(MAX_FILE_SIZE*1024);
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
        $data = $this->only(['category', 'title','discription', 'start_date', 'end_date','po_date', 'file', 'status']);

        return $data;
    }
}
