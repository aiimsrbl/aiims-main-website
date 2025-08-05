<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'event_date'    => "required",
            'status'        => "required",
            'image'          => "required|mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024)
        ];

        if(request()->editObj) //edit case
        {
            unset($rules['image']);
        }

        if(request()->file('image'))
        {
           $rules['image'] = "required|mimes:gif,jpg,jpeg,png|max:".(MAX_IMAGE_SIZE*1024);
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
        $data = $this->only(['title', 'event_date', 'image', 'status']);

        return $data;
    }
}
