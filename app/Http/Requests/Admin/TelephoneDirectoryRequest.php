<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TelephoneDirectoryRequest extends FormRequest
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
            'phone_no'      => "required|max:100",
            'designation'   => "required|max:100",
            'name'          => "required|max:255",
            'status'        => "required"
        ];

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
        $data = $this->only(['phone_no', 'designation', 'name', 'status']);

        return $data;
    }
}
