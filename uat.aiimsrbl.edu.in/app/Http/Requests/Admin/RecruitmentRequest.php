<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;



class RecruitmentRequest extends FormRequest
{
    private $messages  = [];

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
            'reference_no'  => "required|min:2",
            'start_date'    => "required",
            'end_date'      => "required",
            'status'        => "required",
            'file'          => "required|mimes:pdf,jpg,jpeg,png,gif|max:".(MAX_FILE_SIZE*1024)
        ];

        if(request()->editObj) //edit case
        {
            unset($rules['file']);
        }

        if(request()->file('file'))
        {   

            if(request()->file('file')->getMimeType() == 'application/octet-stream'){
                $this->messages["file.mimes"] = 'File is corrupted please re-generate again';
            }

            $this->messages["file.max"] = 'The file must not be greater than '.MAX_FILE_SIZE.' MB';

            $rules['file'] = "required|mimes:pdf,jpg,jpeg,png,gif|max:".(MAX_FILE_SIZE*1024);
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
        $data = $this->only(['reference_no', 'title', 'start_date', 'end_date', 'file', 'status','description','link']);

        return $data;
    }

    public function messages()
    {  
        return $this->messages;
    }
}
