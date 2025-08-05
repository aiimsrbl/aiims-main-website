<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
        return [
            'name'      =>  'required|min:2|max:100',
            'email'     =>  'email|required|min:2|max:100',
            'phone'     =>  'required|numeric|digits_between:10,13',
            'message'   =>  'required|min:2|max:255'
        ];
    }

    public function getData(){
        return $this->only(['name','email','phone','message']);
    }
}
